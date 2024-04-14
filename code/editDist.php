<?php
require_once "Distributor.php";

if ( isset($_POST['name']) &&  isset($_POST['address']) ) {
    
    $distr = new Distributor($_POST["name"], $_POST["address"]);
    $distr->setId($_GET["id"]);
    $distr->edit();
    header("Location: distCRUD.php");
    return;
}


$distr = new Distributor();
$distr->setId($_GET["id"]);
$row = $distr->read();

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
      <h3 class="title">Edit the distributor</h3>
      <input type="text" class="box" name="name" value="<?php echo $row['name']; ?>" placeholder="enter the distributor name" required>
      <input type="text" min="0" class="box" name="address" value="<?php echo $row['address']; ?>" placeholder="enter the distributor address" required>
      <input type="submit" value="Update" name="update_distributor" class="btn">
      <a href="distCRUD.php" class="btn">Cancel</a>
   </form>
</div>

</div>

</body>
</html>