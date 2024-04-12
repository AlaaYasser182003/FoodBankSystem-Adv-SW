<?php
require_once "pdo.php";
require_once "Item.php";

if ( isset($_POST['name']) && isset($_POST['program_id'])
     && isset($_POST['amount']) && isset($_POST['cost']) ) {
    
    $item = new Item($_POST["program_id"], $_POST["name"], $_POST["cost"], $_POST["amount"]);
    $item->add();
    header("Location: actor_ware.php");
    return;
}
?>

<p>Add Item</p>
<form method="post">
<p>Name:
<input type="text" name="name"></p>
<p>Amount:
<input type="number" name="amount"></p>
<p>Cost:
<input type="number" step = "0.001" name="cost"></p>
<p>Program ID:
<input type="number" name="program_id"></p>
<p><input type="submit" value="Create"/>
<a href="actor_ware.php">Cancel</a></p>
</form>


