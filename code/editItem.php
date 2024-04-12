<?php
require_once "pdo.php";
require_once "Item.php";

if ( isset($_POST['name']) && isset($_POST['program_id'])
     && isset($_POST['amount']) && isset($_POST['cost']) ) {
    
    $item = new Item($_POST["program_id"], $_POST["name"], $_POST["cost"], $_POST["amount"]);
    $item->setId($_GET["id"]);
    $item->edit();
    header("Location: actor_ware.php");
    return;
}

$item = new Item();
$item->setId($_GET["id"]);
$row = $item->read();

$n = htmlentities($row['item_name']);
$a = htmlentities($row['amount']);
$c = htmlentities($row['item_cost']);
$program_id = $row['program_id'];
?>

<p>Edit Item</p>
<form method="post">
<p>Name:
<input type="text" name="name" value="<?= $n ?>"></p>
<p>Amount:
<input type="number" name="amount" value="<?= $a ?>"></p>
<p>Cost:
<input type="number" step = "0.001" name="cost" value="<?= $c ?>"></p>
<p>Program ID:
<input type="number" name="program_id" value="<?= $program_id ?>"></p>
<p><input type="submit" value="Update"/>
<a href="actor_ware.php">Cancel</a></p>
</form>
