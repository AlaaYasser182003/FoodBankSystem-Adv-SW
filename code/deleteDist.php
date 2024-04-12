<?php
require_once 'Distributor.php';
$distr = new Distributor();
$distr->setId($_GET['id']);
$distr->remove();
header("Location: actor_proc.php");
exit;
?>