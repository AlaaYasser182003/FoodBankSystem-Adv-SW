<?php
require_once "Program.php";

if ( isset($_POST['name']) && isset($_POST['description'])) {
    
    $program = new Program($_POST["name"], $_POST['description']);
    $program->add();
    header("Location: actor_prog.php");
    return;
}
?>

<p>Add Program</p>
<form method="post">
<p>Name:
<input type="text" name="name"></p>
<p>Description:
<input type="text" name="description"></p>
<p><input type="submit" value="Create"/>
<a href="actor_ware.php">Cancel</a></p>
</form>

