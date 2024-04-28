<?php
require_once "ViewAbst.php";

class DonorView extends ViewAbst{
    function ShowDonorsTable() {
        
        echo('<!DOCTYPE html>
        <html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="http://localhost\foodbank\CSS\CRUD.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
                <title>Donor CRUD</title>
        </head>
        <body>
        <header>
                <h1>Donor Database</h1>
                <nav>
                    <ul>
                        <li><a href="dashboard.php">Dashboard</a></li>
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
                        <th>Birth Date</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                    </tr>
                    </thead>
        ');
    }

    function ShowDonorRows($row) {
        echo('<tr>
                <td>'. $row['id'].'</td>
                <td>'.$row['username'].'</td>
                <td>'.$row['birthdate'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone_number'].'</td>
                <td>'.($row['gender'] == 0)?"Male":"Female".'</td>
        </tr>');
    }

    function AddDonor() {
        echo('<!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="http://localhost\foodbank\CSS\signup.css">
                <title>Sign Up</title>
            </head>
        
            <body>
                <section class="container">
                    <header><h1>Registration Form</h1></header>
                    <form action="DonorController.php?cmd=add" method="post" class="form">
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
                                    <input type="radio" id="male" name="gender" value="0" required/>
                                    <label for="check">Male</label>
                                </div> 
                                <div class="gender">
                                    <input type="radio" id="female" name="gender" value="1" required/>
                                    <label for="check">Female</label>
                                </div> 
                            </div>    
                        </div>
                        
                        <button>Submit</button>
                        <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
                    </form>
                </section>
            </body>
        </html>');
    }

    function ShowDonorDetails($donor) {
        echo('<html lang="en"><head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="index.css">
                <title>Food Bank</title>
            </head>
            <body>
                <header>
                    <h1>Food Bank</h1>
                    <nav>
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="myacc.php">My Account</a></li>
                        </ul>
                    </nav>
                </header>
                
                <main>
                    <h2>My Account</h2>
                    <form action="editDonor.php" method="post">
                    <label>Username: </label>
                    <input type="text" id="username" name="username" value="'.$donor->getId().'">
                    <br><br>
            
                    <label>Password: </label>
                    <input type="password" id="password" name="password">
                    <br><br>
            
                    <label>Birthdate: </label>
                    <input type="date" id="birthdate" name="birthdate" value="'.$donor->getBirthdate().'">
                    <br><br>
            
                    <label>Email: </label>
                    <input type="text" id="email" name="email" value="'.$donor->getEmail().'">
                    <br><br>
            
                    <label>Phone Number: </label>
                    <input type="text" id="phone" name="phone" value="'.$donor->getPhone_number().'">
                    <br><br>
                    
                    <label>Gender: </label>
                    <input type="radio" id="male" name="gender" value="0" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="1" required>
                    <label for="female">Female</label>
                    <br><br>
            
                    <input type="submit" value="Update">
                    <br><br>
                </form>
                <p class="logout-link"><a href="logout.php">Logout</a></p>
                </main>
                <footer>
                    <p>© 2024 Food Bank</p>
                </footer>
            </body>
        </html>');
    }

}