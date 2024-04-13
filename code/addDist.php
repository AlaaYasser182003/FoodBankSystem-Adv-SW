<?php
require_once "Distributor.php";

if ( isset($_POST['name']) && isset($_POST['address']) ) {
    
    $distr = new Distributor($_POST["name"], $_POST["address"]);
    $distr->add();
    header("Location: actor_proc.php");
    return;
}
?>

<p>Add Distributor</p>
<form method="post">
<p>Name:
<input type="text" name="name"></p>
<p>Address:
<input type="text" name="address"></p>
<p><input type="submit" value="Create"/>
<a href="actor_proc.php">Cancel</a></p>
</form>