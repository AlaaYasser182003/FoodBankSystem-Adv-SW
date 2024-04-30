<?php
require_once "..\Model\DonationDetailsModel.php";
require_once "..\View\DonationDetailsView.php";
require_once "../Model/ProgramModel.php";
require_once "../Model/ItemModel.php";

$command = $_GET['cmd'];
$donationkey = $_GET['id'];
$donationDetailsView = new DonationDetailsView();
$donationDetailsModel = new DonationDetailsModel();
$programModel = new ProgramModel();
$itemModel = new ItemModel();

if ($command == 'viewDetails') {
    $donationDetailsView->ShowDonationDetailsTable();
    $stmt = DonationDetailsModel::view_all_id($donationkey);
    foreach($stmt as $row)
    {
        $itemModel->getById($row['item_id']);
        $programModel->getById($itemModel->getProgramID());
        $donationDetailsView->ShowDonationDetailsRows($row, $itemModel->getItemName(), $programModel->getProgramName());
    
    }    
}
if ($command == 'add') {
   echo 1; 
}