<?php
require_once 'Program.php';
$donation = new Program();
$donation->setId($_GET['id']);
$donation->remove();
header("Location: actor_prog.php");
exit;
?>