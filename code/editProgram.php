<?php
require_once "Program.php";

if ( isset($_POST['name']) && isset($_POST['description'])) {
    
    $program = new Program($_POST["name"], $_POST['description']);
    $program->setId($_GET["id"]);
    $program->edit();
    header("Location: actor_prog.php");
    return;
}

$program = new Program();
$program->setId($_GET["id"]);
$row = $program->read();

$name = htmlentities($row['program_name']);
$description = htmlentities($row['description']);
?>

<p>Edit Program</p>
<form method="post">
<p>Name:
<input type="text" name="name" value="<?= $name ?>"></p>
<p>Description:
<input type="text" name="description" value="<?= $description ?>"></p>
<p><input type="submit" value="Update"/>
<a href="actor_prog.php">Cancel</a></p>
</form>