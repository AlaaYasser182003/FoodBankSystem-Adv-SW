<?php
define('__ROOT__', dirname(dirname(__FILE__), 1));
require_once (__ROOT__."\Model\DonationModel.php");
require_once (__ROOT__."\View\DonationView.php");
require_once (__ROOT__."\Model\pdo.php");

$command = $_GET['cmd'];
if ($command == 'viewAll') {
    $donationView = new DonationsView();
    $donationView->ShowDonationsTable();
    $stmt = DonationModel::view_all();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        $donationView->ShowDonationsRows($row);
}
if ($command == 'add') {
    
}