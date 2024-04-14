<?php
require_once "pdo.php";
require_once "Program.php";

if ( isset($_POST['name']) && isset($_POST['description'])) {
    
    $program = new Program($_POST["name"], $_POST['description']);
    $program->add();
    header("Location: progCRUD.php");
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
        <title>Program CRUD</title>
</head>
<body>
<header>
        <h1>Program Database</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
</header>
<div class="container">

   <div class="admin-object-form-container">

      <form  method="post">
         <h3>add a new program</h3>
         <input type="text" placeholder="enter program name" name="name" class="box" required>
         <input type="text" placeholder="enter program description" name="description" class="box" required>
         <input type="submit" class="btn" name="add_program" value="Create">
      </form>

   </div>

   <div class="object-display">
      <table class="object-display-table">
         <thead>
         <tr>
            <th>program ID</th>
            <th>program name</th>
            <th>program description</th>
            <th>action</th>
         </tr>
         </thead>
         <?php 
         $stmt = Program::view_all();
         while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['program_name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
               <a href="editProgram.php?id=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
               <a href="deleteProgram.php?id=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
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