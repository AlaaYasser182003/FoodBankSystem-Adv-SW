<?php
require_once "..\Model\DonorModel.php";
require_once "..\View\DonorView.php";

$command = $_GET['cmd'];
$id = $_GET['id'];
$donorView = new DonorView();
$donorModel = new DonorModel();

if ($command == 'signup') {
  //  $stmt = DonationModel::view_all();
    $donorView->signup();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $command =='signup') {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $birthdate = trim($_POST['birthdate']);
    $gender = trim($_POST['gender']);

    $donor = new DonorModel($username,$birthdate,$email, $password,  $phone, $gender);
    $donor->add();
    
    header("Location: ../Controller/HomeController.php?cmd=login");

   // $exists = $donorModel->checkemail($email);
   /* if($exists){
        $error = 'Account Already exists';
        $donorView->signup($error);

    }
    else {
    $donor = new DonorModel($username,$birthdate,$email, $password,  $phone, $gender);
    $donor->add();
    } 
    */
}
if ($command == 'myacc' && $id !== null)
{
   $donor = new DonorModel();
   $donor->getById($id);
   $donorView->ShowDonorDetails($donor);
}

if($command == 'showdonations'){

}





