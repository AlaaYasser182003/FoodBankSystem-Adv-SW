<?php
include_once "../Model/DonationModel.php";
class DonationsView {
    function ShowDonationsTable() {
        
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
                    </ul>
                </nav>
        </header>
        <div class="container">
        
           <div class="object-display">
                <table class="object-display-table">
                    <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>Donor Name</th>
                        <th>Amount Donated</th>
                        <th>Donation Date</th>
                        <th>action</th>
                    </tr>
                    </thead>
        ');
    }

    function ShowDonationsRows($row, $username) {

        echo('
            <tr>
                <td>'. $row['id'].'</td>
                <td>'.$username.'</td>
                <td>'. $row['total_cost'].'</td>
                <td>'. $row['donation_date'].'</td>
                <td>
                <a href="DonationDetailsController.php?cmd=viewDetails&id='.$row['id'].'" class="btn"> <i class="fas fa-edit"></i> Details </a>
            </td>
        </tr>');
    }
}