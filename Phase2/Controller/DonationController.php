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
    session_start();
    $donationModel->setDonorId($_SESSION['user_id']);
    $donationModel->setTotalCost($_GET['cost']);
    $donationModel->setDate(date('y-m-d'));
    $donationModel->add(); 
    header("Location: DonationDetailsController.php?cmd=add&id=".$pdo->lastInsertId());
    return;
}
