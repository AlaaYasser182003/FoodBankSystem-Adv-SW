<?php
require_once "../Model/DonationModel.php";
require_once "../View/DonationView.php";

$command = $_GET['cmd'];
$donationView = new DonationsView();
$donationModel = new DonationModel();

if ($command == 'viewAll') {
    $stmt = DonationModel::view_all();
    $donationView->ShowDonationsTable($stmt);
}
if ($command == 'add') {
   echo 1; 
}