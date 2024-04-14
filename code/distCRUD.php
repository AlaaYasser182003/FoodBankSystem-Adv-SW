<?php
require_once "pdo.php";
require_once "Distributor.php";

if ( isset($_POST['name']) && isset($_POST['address']) ) {
    
    $supp = new Distributor($_POST["name"], $_POST["address"]);
    $supp->add();
    header("Location: distCRUD.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CRUD.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <title>Distributor CRUD</title>
</head>
<body>
<header>
        <h1>Distributor Database</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
</header>
<div class="container">

   <div class="admin-object-form-container">

      <form  method="post">
         <h3>add a new distributor</h3>
         <input type="text" placeholder="enter distributor name" name="name" class="box" required>
         <input type="text" placeholder="enter distributor address" name="address" class="box" required>
         <input type="submit" class="btn" name="add_distributor" value="Create">
      </form>

   </div>

   <div class="object-display">
      <table class="object-display-table">
         <thead>
         <tr>
            <th>Distributor ID</th>
            <th>Distributor name</th>
            <th>Distributor address</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php 
         $stmt = Distributor::view_all();
         while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
               <a href="editDist.php?id=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
               <a href="deleteDist.php?id=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
            </td>
        </tr>
         
      <?php } ?>
      </table>
   </div>

</div>

<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body>
</html>