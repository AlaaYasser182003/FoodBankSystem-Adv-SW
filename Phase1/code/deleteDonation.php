<?php
require_once 'Donation.php';
$donation = new Donation();
$donation->setId($_GET['id']);
$donation->remove();
header("Location: actor_ex.php");
exit;
?>