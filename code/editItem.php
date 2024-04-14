<?php
require_once "Item.php";

if ( isset($_POST['update_item'])) {
    
    $item = new Item($_POST["program_id"], $_POST["name"], $_POST["item_cost"], $_POST["amount"]);
    $item->setId($_GET["id"]);
    $item->edit();
    header("Location: itemCRUD.php");
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

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CRUD.css">
</head>
<body>

<style> body{background-color: #329443;}</style>

<div class="container">


<div class="admin-object-form-container centered">
   <form method="post">
      <h3 class="title">Edit the item</h3>
      <input type="text" class="box" name="name" value="<?php echo $row['item_name']; ?>" placeholder="enter item name">
      <input type="number" min="0" class="box" name="amount" value="<?php echo $row['amount']; ?>" placeholder="enter amount">
      <input type="number" class="box" step="0.001" name="item_cost" value="<?php echo $row['item_cost']; ?>" placeholder="enter cost">
      <input type="number" class="box" name="program_id" value="<?php echo $row['program_id']; ?>" placeholder="enter program id">
      <input type="submit" value="Update" name="update_item" class="btn">
      <a href="itemCRUD.php" class="btn">Cancel</a>
   </form>
</div>

</div>

</body>
</html>