<html>
<body>
<?php
require_once "DonationDetails.php";
$details = new DonationDetails();
$details->setId($_GET['id']);
$row = $details->read();

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
      <h3 class="title">Donation Details</h3>
      <input type="number" class="box" name="id" value="<?php echo $row['id']; ?>">
      <input type="text" class="box" name="donor_name" value="<?php echo $row['donor_name']; ?>">
      <input type="text" class="box" name="program_name" value="<?php echo $row['program_name']; ?>">
      <input type="number" class="box" name="total_cost" value="<?php echo $row['total_cost']; ?>">
      <input type="text" class="box" name="donation_date" value="<?php echo $row['donation_date']; ?>">
      <a href="donationCRUD.php" class="btn">Back</a>
   </form>
</div>

</div>

</body>
</html>