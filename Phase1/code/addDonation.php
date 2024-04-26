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
</html>