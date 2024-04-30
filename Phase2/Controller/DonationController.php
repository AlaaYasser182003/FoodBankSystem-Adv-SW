<?php
require_once "..\Model\DonationModel.php";
require_once "..\View\DonationView.php";
require_once  "../Model/DonorModel.php";

$command = $_GET['cmd'];
$donationView = new DonationsView();
$donationModel = new DonationModel();
$donorModel = new DonorModel();

if ($command == 'viewAll') {
    $donationView->ShowDonationsTable();
    $stmt = DonationModel::view_all();
    foreach($stmt as $row) {
        $donorModel->getById($row['donor_id']);
        $donationView->ShowDonationsRows($row, $donorModel->getUserName());
    }
}
if ($command == 'add') {
   echo 1; 
}