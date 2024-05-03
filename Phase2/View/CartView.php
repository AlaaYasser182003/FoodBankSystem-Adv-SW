<?php 
require_once "ViewAbst.php";
require_once "../Model/ProgramModel.php";
require_once "../Model/ItemModel.php";

class CartView extends ViewAbst {
    function ShowCart(){
        $total=0;
        echo('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="../CSS/CRUD.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
                    <title>My Cart</title>
            </head>
            <body>
            <header>
                    <h1>My Cart</h1>
                    <nav>
                        <ul>
                            <li><a href="../Controller/HomeController.php">Back</a></li>
                        </ul>
                    </nav>
            </header>');
        if(empty($_SESSION['cart']))
            echo('<div class="message">cart is empty</div>');
        else{
            echo('
            <div class="container">
            
            <div class="object-display">
                    <table class="object-display-table">
                        <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Program Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
            ');
            foreach ($_SESSION['cart'] as $item => $quantity) {
                $itemModel = new ItemModel();
                $programModel = new ProgramModel();
                $itemModel->getById($item);
                $programModel->getById($itemModel->getProgramID());
                $total+=$quantity*$itemModel->getCost();
                echo ('
                <tr>
                    <td>'.$itemModel->getItemName().'</td>
                    <td>'.$programModel->getProgramName().'</td>
                    <td>'.$quantity.'</td>
                    <td>$'.$itemModel->getCost().'</td>
                    <td>$'.$quantity*$itemModel->getCost().'</td>
                    <td><a href="CartController.php?cmd=removeitem&item='.$item.'" class="btn"> <i class="fas fa-edit"></i> Remove </a></td>    
                </tr>');
            }
            echo ('
            <table class="object-display-table">
                <tr>
                    <td><a href="HomeController.php?" class="btn"> Back to Home </a></td>
                    <td><a href="CartController.php?cmd=removeall" class="btn"> Remove All </a></td>
                    <td><a href="DonationController.php?cmd=add&cost='.$quantity*$itemModel->getCost().'" class="btn"> Donate Now </a></td>    
                </tr>
                <div class="message">Grand Total: '.$total.'</div>'
            );

        }    
    }
}