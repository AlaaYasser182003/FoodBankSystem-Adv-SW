<?php
require_once 'Item.php';
$item = new Item();
$item->setId($_GET['id']);
$item->remove();
header("Location: itemCRUD.php");
exit;
?>