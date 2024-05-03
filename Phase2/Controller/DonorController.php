<?php
require_once "../Model/DonorModel.php";
require_once "../View/DonorView.php";

$command = $_GET['cmd'];
$id = $_GET['id'];
$donorView = new DonorView();

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
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    session_start();
    $donorModel = new DonorModel($_POST['username'], $_POST['birthdate'],
      $_POST['email'], $_POST['password'], $_POST['phone'], $_POST['gender']);
    $donorModel->setId($_SESSION['user_id']);
    $donorModel->edit();
    header("Location: HomeController.php");
    exit();
  }
  else{
    $donor = new DonorModel();
    $donor->getById($id);
    $donorView->ShowDonorDetails($donor);
  }
}

if($command == 'showdonations'){

}





