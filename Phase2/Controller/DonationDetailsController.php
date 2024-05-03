<?php
require_once "../Model/DonationDetailsModel.php";
require_once "../View/DonationDetailsView.php";

$command = $_GET['cmd'];
$donationkey = $_GET['id'];
$donationDetailsView = new DonationDetailsView();
$donationDetailsModel = new DonationDetailsModel();

if ($command == 'viewDetails') {
    $stmt = DonationDetailsModel::view_all_id($donationkey);
    $donationDetailsView->ShowDonationDetailsTable($stmt);
}
if($command == 'add'){
    session_start();
    foreach ($_SESSION['cart'] as $item => $quantity) {
        $itemModel = new ItemModel();
        $itemModel->getById($item);
        $x = new DonationDetailsModel($donationkey,$item,$quantity,$itemModel->getCost());
        $x->add();
    }
    $_SESSION['cart'] = array(); //to empty the cart after the donation
    $donationDetailsView->ShowReciept($donationkey,DonationDetailsModel::view_all_id($donationkey));
}
