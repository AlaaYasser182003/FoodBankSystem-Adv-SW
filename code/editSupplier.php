<?php
require_once "Supplier.php";

if ( isset($_POST['name']) &&  isset($_POST['address']) ) {
    
    $supp = new Supplier($_POST["name"], $_POST["address"]);
    $supp->setId($_GET["id"]);
    $supp->edit();
    header("Location: suppCRUD.php");
    return;
}

$supp = new Supplier();
$supp->setId($_GET["id"]);
$row = $supp->read();

$n = htmlentities($row['name']);
$a = htmlentities($row['address']);
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
      <h3 class="title">Edit the supplier</h3>
      <input type="text" class="box" name="name" value="<?php echo $row['name']; ?>" placeholder="enter the supplier name" required>
      <input type="text" min="0" class="box" name="address" value="<?php echo $row['address']; ?>" placeholder="enter the supplier address" required>
      <input type="submit" value="Update" name="update_supplier" class="btn">
      <a href="suppCRUD.php" class="btn">Cancel</a>
   </form>
</div>

</div>

</body>
</html>