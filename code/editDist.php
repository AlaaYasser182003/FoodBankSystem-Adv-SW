<?php
require_once "Distributor.php";

if ( isset($_POST['name']) &&  isset($_POST['address']) ) {
    
    $distr = new Distributor($_POST["name"], $_POST["address"]);
    $distr->setId($_GET["id"]);
    $distr->edit();
    header("Location: actor_proc.php");
    return;
}

$distr = new Distributor();
$distr->setId($_GET["id"]);
$row = $distr->read();

$n = htmlentities($row['name']);
$a = htmlentities($row['address']);
?>

<p>Edit Distributor</p>
<form method="post">
<p>Name:
<input type="text" name="name" value="<?= $n ?>"></p>
<p>Address:
<input type="number" name="address" value="<?= $a ?>"></p>
<p><input type="submit" value="Update"/>
<a href="actor_proc.php">Cancel</a></p>
</form>
