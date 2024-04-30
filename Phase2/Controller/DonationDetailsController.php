<?php
require_once "..\Model\DonationDetailsModel.php";
require_once "..\View\DonationDetailsView.php";

$command = $_GET['cmd'];
$donationkey = $_GET['id'];
$donationDetailsView = new DonationDetailsView();
$donationDetailsModel = new DonationDetailsModel();

if ($command == 'viewDetails') {
    $stmt = DonationDetailsModel::view_all_id($donationkey);
    $donationDetailsView->ShowDonationDetailsTable($stmt);
}
if ($command == 'add') {
   echo 1; 
}