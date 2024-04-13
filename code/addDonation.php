<?php
session_start();
require_once "Item.php";
$item = new Item();
$item->setId($_POST['item']);
$item = $item->read();

require_once "Donation.php";
$Donation = new Donation($_SESSION['user_id'], $_POST['program_id'], $_POST['quantity']);
$Donation->add();

require_once "DonationDetails.php";
$cost = $_POST['quantity'] * $item['item_cost'];
$Ddetails = new DonationDetails($_SESSION['username'], $cost, $_POST['program_name'], date('y-m-d'));
$Ddetails->setId($Donation->getId());
$Ddetails->add();
?>

<html lang="en"><head>
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
    <p>Program Name: <?= $_POST['program_name'] ?></p>
    <p>Item Name: <?= $item['item_name'] ?></p>
    <p>Amount: <?= $_POST['quantity'] ?></p>
    <p>Total Cost: $<?= $cost ?></p>
    <p>Username: <?= $_SESSION['username'] ?></p>
    <a href="home.php">Return</a>
    </main>
    <footer>
        <p>© 2024 Food Bank</p>
    </footer>
</body>
</html>