<?php
define('__ROOT__', dirname(dirname(__FILE__), 1));
require_once (__ROOT__."\Model\DonationModel.php");
require_once (__ROOT__."\View\DonationView.php");
require_once (__ROOT__."\Model\pdo.php");
//require_once (__ROOT__."\Model\DonorModel.php");
require "../Model/DonorModel.php";

$command = $_GET['cmd'];
$donationView = new DonationsView();
$donationModel = new DonationModel();
$donorModel = new DonorModel();

if ($command == 'viewAll') {
    $donationView->ShowDonationsTable();
    $stmt = DonationModel::view_all();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $donorModel->getById($row['donor_id']);
        $donationView->ShowDonationsRows($row, $donorModel);
    }
}
if ($command == 'add') {
   echo 1; 
}