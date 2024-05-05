<?php
require_once "../Model/DonationModel.php";
require_once "../View/DonationView.php";

$command = $_GET['cmd'];
$donationView = new DonationsView();

if ($command == 'viewAll') {
    $stmt = DonationModel::view_all();
    $donationView->ShowDonationsTable($stmt);
}
if ($command == 'add') {
    session_start();
    $donationModel = new DonationModel(md5($_SESSION['user_id']), $_GET['cost'], date('y-m-d'));
    $donationModel->add(); 

    $donationid = DonationModel::getDonationId(md5($_SESSION['user_id']), date('y-m-d'));
    
    header("Location: DonationDetailsController.php?cmd=add&id=".$donationid); 
    return;
}
