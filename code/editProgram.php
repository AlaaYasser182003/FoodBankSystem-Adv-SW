<?php
require_once "pdo.php";
require_once "Program.php";

if ( isset($_POST['name'])) {
    
    $program = new Program($_POST["name"]);
    $program->setId($_GET["id"]);
    $program->edit();
    header("Location: actor_prog.php");
    return;
}

$program = new Program();
$program->setId($_GET["id"]);
$row = $program->read();

$n = htmlentities($row['program_name']);
?>

<p>Edit Program</p>
<form method="post">
<p>Name:
<input type="text" name="name" value="<?= $n ?>"></p>
<p><input type="submit" value="Update"/>
<a href="actor_prog.php">Cancel</a></p>
</form>
