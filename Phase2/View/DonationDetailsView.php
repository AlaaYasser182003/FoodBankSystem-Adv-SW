<?php
require_once "ViewAbst.php";
require_once "../Model/ProgramModel.php";
require_once "../Model/ItemModel.php";

class DonationDetailsView extends ViewAbst {
    function ShowDonationDetailsTable($rows) {
        
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
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Program Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
        ');

        $programModel = new ProgramModel();
        $itemModel = new ItemModel();        
        foreach($rows as $row) {
            $itemModel->getById($row['item_id']);
            $programModel->getById($itemModel->getProgramID());
            echo('
            <tr>
                <td>'. $row['donation_id'].'</td>
                <td>'. $row['item_id'].'</td>
                <td>'.$itemModel->getItemName().'</td>
                <td>'.$programModel->getProgramName().'</td>
                <td>'.$row['Qty'].'</td>
                <td>$'.$row['price'].'</td>
                <td>$'.$row['Qty']*$row['price'].'</td>
            </tr>');
        }
    }
}