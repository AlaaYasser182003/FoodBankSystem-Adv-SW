
<?php
require_once "Program.php";

if(isset($_POST['update_program'])){
    $program = new Program($_POST["name"], $_POST['description']);
    $program->setId($_GET["id"]);
    $program->edit();
    header("Location: progCRUD.php");
    return;
};

$program = new Program();
$program->setId($_GET["id"]);
$row = $program->read();

$name = htmlentities($row['program_name']);
$description = htmlentities($row['description']);
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
      <h3 class="title">Edit the program</h3>
      <input type="text" class="box" name="name" value="<?php echo $row['program_name']; ?>" placeholder="enter the program name">
      <input type="text" min="0" class="box" name="description" value="<?php echo $row['description']; ?>" placeholder="enter the program description">
      <input type="submit" value="Update" name="update_program" class="btn">
      <a href="progCRUD.php" class="btn">Cancel</a>
   </form>
</div>

</div>

</body>
</html>