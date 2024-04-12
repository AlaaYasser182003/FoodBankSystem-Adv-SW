<?php
require_once "pdo.php";
require_once "Program.php";

if ( isset($_POST['name']) ) {
    
    $program = new Program($_POST["name"]);
    $program->add();
    header("Location: actor_prog.php");
    return;
}
?>

<p>Add Program</p>
<form method="post">
<p>Name:
<input type="text" name="name"></p>
<p><input type="submit" value="Create"/>
<a href="actor_ware.php">Cancel</a></p>
</form>


