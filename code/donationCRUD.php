<?php
require_once "pdo.php";
require_once "Donation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CRUD.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <title>Donation CRUD</title>
</head>
<body>
<header>
        <h1>Donation Database</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
</header>
<div class="container">

   <div class="object-display">
      <table class="object-display-table">
         <thead>
         <tr>
            <th>Donation ID</th>
            <th>Donor ID</th>
            <th>program ID</th>
            <th>amount</th>
            <th>action</th>
         </tr>
         </thead>
         <?php 
         $stmt = Donation::view_all();
         while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['donor_id']; ?></td>
            <td><?php echo $row['program_id']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td>
               <a href="details.php?id=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Details </a>
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