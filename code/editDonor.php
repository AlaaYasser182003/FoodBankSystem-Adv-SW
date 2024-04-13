<?php
require_once "Donor.php";
session_start();

if ( isset($_POST['username']) && isset($_POST['password'])
     && isset($_POST['birthdate']) && isset($_POST['email']) 
     && isset($_POST['phone']) && isset($_POST['gender']) ) {
    $Donor = new Donor($_POST["username"], $_POST["birthdate"], $_POST["email"], $_POST["password"], $_POST["phone"], $_POST['gender']);
    $Donor->setId($_SESSION["user_id"]);
    $Donor->edit();
    $donor = $Donor->read();
    $_SESSION['user_id'] = $donor['id'];
    $_SESSION['username'] = $donor['username'];
    $_SESSION['birthdate'] = $donor['birthdate'];
    $_SESSION['email'] = $donor['email'];
    $_SESSION['password'] = $donor['password'];
    $_SESSION['phone_number'] = $donor['phone_number'];
    $_SESSION['gender'] = $donor['gender'];
    header("Location: home.php");
    return;
}
?>