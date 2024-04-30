<?php
require_once "ViewAbst.php";

class DistributorView extends ViewAbst {
    function ShowDistributorsTable($rows) {
        
        echo('<!DOCTYPE html>
            <html lang="en">
            <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="..\CSS\CRUD.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
                    <title>Distributor CRUD</title>
            </head>
            <body>
            <header>
                    <h1>Distributor Database</h1>
                    <nav>
                        <ul>
                            <li><a href="..\View\dashboard.php">Dashboard</a></li>
                        </ul>
                    </nav>
            </header>
            <div class="container">

            <div class="admin-object-form-container">

                <form action="DistributorController.php?cmd=add" method="post">
                    <h3>add a new distributor</h3>
                    <input type="text" placeholder="enter distributor name" name="name" class="box" required>
                    <input type="text" placeholder="enter distributor address" name="address" class="box" required>
                    <input type="hidden" name="cmd" value="add">
                    <input type="submit" class="btn" name="add_distributor" value="Create">
                </form>

            </div>

            <div class="object-display">
                <table class="object-display-table">
                    <thead>
                    <tr>
                        <th>Distributor ID</th>
                        <th>Distributor name</th>
                        <th>Distributor address</th>
                        <th>Action</th>
                    </tr>
                    </thead>');
        foreach($rows as $row)
            echo('<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['address'].'</td>
            <td>
            <a href="DistributorController.php?cmd=edit&id='.$row['id'].'" class="btn"> <i class="fas fa-edit"></i> Edit </a>
            <a href="DistributorController.php?cmd=delete&id='.$row['id'].'" class="btn"> <i class="fas fa-trash"></i> Delete </a>
            </td>
        </tr>');
    }

    function ChangeDistributor($succ) {
        echo('<html lang="en"><head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="..\CSS\CRUD.css">
            <title>Food Bank</title>
        </head>
        <body>
            <header>
                <h1>Food Bank</h1>
                <nav>
                    <ul>
                        <li><a href="DistributorController.php?cmd=viewAll">Return</a></li>
                    </ul>
                </nav>
        </header>');
        $this->PrintMessage($succ);
    }

    function EditDistributor($obj) {
        echo('<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="..\CSS\CRUD.css">
            </head>
            <body>
            
            <style> body{background-color: #329443;}</style>
            
            <div class="container">
            
            
            <div class="admin-object-form-container centered">
            <form method="post">
                <h3 class="title">Edit the distributor</h3>
                <input type="text" class="box" name="name" value="'.$obj->getName().'" placeholder="enter the distributor name" required>
                <input type="text" min="0" class="box" name="address" value="'.$obj->getAddress().'" placeholder="enter the distributor address" required>
                <input type="submit" value="Update" name="update_distributor" class="btn">
                <a href="DistributorController.php?cmd=viewAll" class="btn">Cancel</a>
            </form>
            </div>
            
            </div>
            
            </body>
        </html>');
    }
}