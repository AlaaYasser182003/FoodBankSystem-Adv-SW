<?php
require_once 'Item.php';
$donation = new Item();
$donation->setId($_GET['id']);
$donation->remove();
header("Location: actor_ware.php");
exit;
?>