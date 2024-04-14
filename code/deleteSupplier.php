<?php
require_once 'Supplier.php';
$supplier = new Supplier();
$supplier->setId($_GET['id']);
$supplier->remove();
header("Location: suppCRUD.php");
exit;
?>