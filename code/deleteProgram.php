<?php
require_once 'Program.php';
$program = new Program();
$program->setId($_GET['id']);
$program->remove();
header("Location: actor_prog.php");
exit;
?>