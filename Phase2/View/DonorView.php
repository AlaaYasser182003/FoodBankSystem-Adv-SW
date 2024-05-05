<?php
require_once "ViewAbst.php";
require_once "../Model/DonorModel.php";
require_once "../Model/ProgramModel.php";
require_once "../Model/ItemModel.php";
require_once "../Model/GenderEnum.php";

class DonorView extends ViewAbst{
    function signup($error = null){
        echo('<!DOCTYPE html>
        <html>
        
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../CSS/signup.css">
                <title>Sign Up</title>
            </head>
        
            <body>
                <section class="container">
                    <header><h1>Registration Form</h1></header>
                    <form action="../Controller/DonorController.php?cmd=signup" method="post" class="form">
                        <div class = "input-box">
                            <label>Username:</label>
                            <input type="text" id="username" name="username" placeholder="Enter your username" required>
                        </div>
        
                        <div class = "input-box">
                            <label>Password:</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        </div>
        
                        <div class = "input-box">
                            <label>Email Address:</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                        </div>   
        
                        <div class="column">
                            <div class = "input-box">
                                <label>Phone Number:</label>
                                <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
                            </div> 
        
                            <div class = "input-box">
                                <label>Birth Date:</label>
                                <input type="date" id="birthdate" name="birthdate" required>
                            </div> 
                        </div>
        
                        <div class="gender-box">
                            <h3>Gender</h3>
                            <div class="gender-option">
                                <div class="gender">
                                    <input type="radio" id="male" name="gender" value="'.GenderEnum::Male->value.'" required/>
                                    <label for="check">Male</label>
                                </div> 
                                <div class="gender">
                                    <input type="radio" id="female" name="gender" value="'.GenderEnum::Female->value.'" required/>
                                    <label for="check">Female</label>
                                </div> 
                            </div>    
                        </div>
                        
                        <button>Submit</button>
                        <p class="login-link">Already have an account? <a href="../Controller/HomeController.php?cmd=login">Login</a></p>');
                        if($error !== null){
                           echo('<p style="color: red;">' . $error . '</p>');
                        }

                        echo ('
                    </form>
                </section>
            </body>
        </html>
        ');
    }
    function ShowDonorsTable($rows) {
        
        echo('<!DOCTYPE html>
        <html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../CSS/CRUD.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
                <title>Donor CRUD</title>
        </head>
        <body>
        <header>
                <h1>Donor Database</h1>
                <nav>
                    <ul>
                        <li><a href="../View/dashboard.php">Dashboard</a></li>
                        <li><a href="../Controller/DonationController.php?cmd=viewAll">Back</a></li>
                    </ul>
                </nav>
        </header>
        <div class="container">
        
           <div class="object-display">
                <table class="object-display-table">
                    <thead>
                    <tr>
                        <th>Donor ID</th>
                        <th>User Name</th>
                        <th>Birthdate</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                    </tr>
                    </thead>
        ');

        foreach($rows as $row)
            echo('
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['birthdate'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone_number'].'</td>
                    <td>'.( ($row['gender'] == GenderEnum::Male->value)?"Male":"Female" ).'</td>
                </tr>
            ');
    }

    function ShowDonorDetails($donor) {
        echo('<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Food Bank</title>
            <link rel="stylesheet" href="../CSS/CRUD.css">
        </head>
        <body>
            <style> body{background-color: #329443;}</style>
            
            <div class="container">
            
            
            <div class="admin-object-form-container centered">
            <form action="" method="post">
                <h3 class="title">My Account</h3>
                <input type="text" class="box" name="username" value="'.$donor->getUserName().'" placeholder="enter your username" required>
                <input type="password" class="box" name="password" placeholder="enter the new password" required>
                <input type="date" min="0" class="box" name="birthdate" value="'.$donor->getBirthdate().'" placeholder="enter your birthdate" required>
                <input type="text" min="0" class="box" name="email" value="'.$donor->getEmail().'" placeholder="enter your email" required>
                <input type="text" min="0" class="box" name="phone" value="'.$donor->getPhoneNumber().'" placeholder="enter your phone number" required>
                <div class="gender-option">
                    <div class="gender">
                        <br/><label for="check" class="box">Male</label>
                        <input type="radio" id="male" name="gender" value="'.GenderEnum::Male->value.'" required/>
                    </div> 
                    <div class="gender">
                        <br/><br/><label for="check" class="box">Female</label>
                        <input type="radio" id="female" name="gender" value="'.GenderEnum::Female->value.'" required/>
                    </div> 
                </div>
                <br/><input type="submit" value="Update" name="update_distributor" class="btn">
                <a href="../Controller/HomeController.php" class="btn">Cancel</a>
            </form>
            </div>
            </div>
        </body>
        </html>');
    }
    function ShowMyDD($rows, $obj) {
        $programModel = new ProgramModel();
        $itemModel = new ItemModel();  
        echo('
        <!DOCTYPE html>
        <html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../CSS/CRUD.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
                <title>Donation CRUD</title>
        </head>
        <body>
        <header>
                <h1>Donation Database</h1>
                <nav>
                    <ul>
                        <li><a href="../View/dashboard.php">Dashboard</a></li>
                        <li><a href="../Controller/DonationController.php?cmd=viewAll">Back</a></li>
                    </ul>
                </nav>
        </header>
        <div class="container">
        
           <div class="object-display">
                <table class="object-display-table">
                    <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>Donor name</th>
                        <th>Item Name</th>
                        <th>Program Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
        ');

        foreach($rows as $row) {
            $itemModel->getById($row['item_id']);
            $programModel->getById($itemModel->getProgramID());
            echo('
            <tr>
                <td>'. $row['donation_id'].'</td>
                <td>'.$obj->getUserName().'</td>
                <td>'.$itemModel->getItemName().'</td>
                <td>'.$programModel->getProgramName().'</td>
                <td>'.$row['Qty'].'</td>
                <td>'.$row['price'].'EGP</td>
                <td>'.$row['Qty']*$row['price'].'EGP</td>
            </tr>');
        }
    }
}

        
    

   


