<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="..\CSS\CRUD.css">
</head>
<body>

<style> body{background-color: #329443;}</style>

<div class="container">


<div class="admin-object-form-container centered">
   <form method="post">
      <h3 class="title">Choose Database</h3>
      <a href="..\Controller\SupplierController.php?cmd=viewAll" class="btn">Supplier</a>
      <a href="..\Controller\DistributorController.php?cmd=viewAll" class="btn">Distributor</a>
   </form>
</div>

</div>

</body>
</html>