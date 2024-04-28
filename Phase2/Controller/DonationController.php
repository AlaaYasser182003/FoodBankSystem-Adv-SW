<?php
require_once "..\Model\DonationModel.php";
require_once "..\View\DonationView.php";
require_once "..\Model\pdo.php";
require_once  "../Model/DonorModel.php";

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