<?php
/*define('__ROOT__', dirname(dirname(__FILE__), 1));
require_once (__ROOT__."\Model\DonationModel.php");
require_once (__ROOT__."\Model\pdo.php");*/
include_once "../Model/DonationDetailsModel.php";
include_once "../Model/pdo.php";
class DonationDetailsView {
    function ShowDonationDetailsTable() {
        
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
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Program Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>action</th>
                    </tr>
                    </thead>
        ');
    }

    function ShowDonationDetailsRows($row, $itemModel, $programModel) {

        echo('
            <tr>
                <td>'. $row['donation_id'].'</td>
                <td>'. $row['item_id'].'</td>
                <td>'.$itemModel->getItemName().'</td>
                <td>'.$programModel->getProgramName().'</td>
                <td>'.$row['Qty'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['Qty']*$row['price'].'</td>
                <td>
                <a href="DonationController.php?cmd=viewAll" class="btn"> <i class="fas fa-edit"></i> Back </a>
            </td>
        </tr>');
    }
}