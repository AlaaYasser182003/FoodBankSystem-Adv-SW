<?php
require_once "Item.php";

if ( isset($_POST['name']) && isset($_POST['program_id'])
     && isset($_POST['amount']) && isset($_POST['cost']) ) {
    
    $item = new Item($_POST["program_id"], $_POST["name"], $_POST["cost"], $_POST["amount"]);
    $item->add();
    header("Location: itemCRUD.php");
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
        <title>Item CRUD</title>
</head>
<body>
<header>
        <h1>Item Database</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
</header>
<div class="container">

   <div class="admin-object-form-container">

      <form  method="post">
         <h3>add a new item</h3>
         <input type="text" placeholder="enter item name" name="name" class="box" required>
         <input type="number" placeholder="enter item amount" name="amount" class="box" required>
         <input type="number" step="0.001 "placeholder="enter item cost" name="cost" class="box" required>
         <input type="number" placeholder="enter program id" name="program_id" class="box" required>
         <input type="submit" class="btn" name="add_item" value="Create">
      </form>

   </div>

   <div class="object-display">
      <table class="object-display-table">
         <thead>
         <tr>
            <th>item ID</th>
            <th>item name</th>
            <th>item amount</th>
            <th>item cost</th>
            <th>program ID</th>
            <th>action</th>
         </tr>
         </thead>
         <?php 
         $stmt = Item::view_all();
         while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['item_name']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['item_cost']; ?></td>
            <td><?php echo $row['program_id']; ?></td>
            <td>
               <a href="editItem.php?id=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
               <a href="deleteItem.php?id=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
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