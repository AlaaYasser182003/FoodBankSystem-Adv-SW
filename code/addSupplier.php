<?php
require_once "pdo.php";
require_once "Supplier.php";

if ( isset($_POST['name']) && isset($_POST['address']) ) {
    
    $supp = new Supplier($_POST["name"], $_POST["address"]);
    $supp->add();
    header("Location: actor_proc.php");
    return;
}
?>

<p>Add Supplier</p>
<form method="post">
<p>Name:
<input type="text" name="name"></p>
<p>Address:
<input type="text" name="address"></p>
<p><input type="submit" value="Create"/>
<a href="actor_proc.php">Cancel</a></p>
</form>