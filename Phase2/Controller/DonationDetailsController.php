<?php
define('__ROOT__', dirname(dirname(__FILE__), 1));
require_once (__ROOT__."\Model\DonationDetailsModel.php");
require_once (__ROOT__."\View\DonationDetailsView.php");
require_once (__ROOT__."\Model\pdo.php");
require "../Model/ProgramModel.php";
require "../Model/ItemModel.php";

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