<?php
require_once "Donor.php";

if ( isset($_POST['username']) && isset($_POST['password'])
     && isset($_POST['birthdate']) && isset($_POST['email']) 
     && isset($_POST['phone']) && isset($_POST['gender']) ) {
    $Donor = new Donor($_POST["username"], $_POST["birthdate"], $_POST["email"], $_POST["password"], $_POST["phone"], $_POST["gender"]);
    $Donor->add();
    header("Location: login.php");
    return;
}
?>