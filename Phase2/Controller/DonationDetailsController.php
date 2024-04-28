<?php
require_once "..\Model\DonationDetailsModel.php";
require_once "..\View\DonationDetailsView.php";
require_once "..\Model\pdo.php";
require_once "../Model/ProgramModel.php";
require_once "../Model/ItemModel.php";

$command = $_GET['cmd2'];
$donationkey = $_GET['id'];
$donationDetailsView = new DonationDetailsView();
$donationDetailsModel = new DonationDetailsModel();
$programModel = new ProgramModel();
$itemModel = new ItemModel();

if ($command == 'viewDetails') {
    $donationDetailsView->ShowDonationDetailsTable();
    $stmt = DonationDetailsModel::view_all();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        if($row['donation_id'] == $donationkey)
        {
        $itemModel->getById($row['item_id']);
        $programModel->getById($itemModel->getProgramID());
        $donationDetailsView->ShowDonationDetailsRows($row, $itemModel, $programModel);
        }
    }    
}
if ($command == 'add') {
   echo 1; 
}