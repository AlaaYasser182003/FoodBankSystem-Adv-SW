<?php
require_once (__ROOT__."\Model\DonationModel.php");
require_once (__ROOT__."\Model\pdo.php");

class DonationsView {
    function ShowDonationsTable() {
        
        echo('
        <!DOCTYPE html>
        <html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="http://localhost\foodbank\CSS\CRUD.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
                <title>Donation CRUD</title>
        </head>
        <body>
        <header>
                <h1>Donation Database</h1>
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
                        <th>Donation ID</th>
                        <th>Donor ID</th>
                        <th>program ID</th>
                        <th>amount</th>
                        <th>action</th>
                    </tr>
                    </thead>
        ');
    }

    function ShowDonationsRows($row) {
        echo('
            <tr>
                <td>'. $row['id'].'</td>
                <td>'.$row['donor_id'].'</td>
                <td>'.$row['program_id'].'</td>
                <td>'.$row['amount'].'</td>
                <td>
                <a href="details.php?id='.$row['id'].'" class="btn"> <i class="fas fa-edit"></i> Details </a>
            </td>
        </tr>');
    }

    function AddDonation() {
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
        <p>Program ID: <?=  $_POST['program_id']?></p>
        <p>Donor ID: <?= $_SESSION['user_id'] ?></p>
        <p>Amount: <?= $_POST['quantity'] ?></p>
        <div>
          <table border="1">
             <thead>
             <tr>
                <th>Donation ID</th>
                <th>Donor Name</th>
                <th>Program Name</th>
                <th>Item Name</th>
                <th>Total Cost</th>
                <th>Date</th>
             </tr>
             </thead>
             <tr>
                <td><?php echo $Donation->getId();?></td>
                <td><?php echo $_SESSION['username']; ?></td>
                <td><?php echo $_POST['program_name']; ?></td>
                <td><?php echo $item['item_name']; ?></td>
                <td>$<?php echo $cost; ?></td>
                <td><?php echo date('y-m-d');?></td>
            </tr>
          </table>
       </div><br/>
       <a href="home.php">Return</a>
        </main>
        <footer>
            <p>© 2024 Food Bank</p>
        </footer>
    </body>
    </html>');
    }
}