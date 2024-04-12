<?php
require_once "pdo.php";
require_once "Supplier.php";

?>

<html>
<head>Welcome Procurement Coordinator</head><br></br>

<body>Suppliers
<?php

echo('<table border="1">
<thead><tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Action</th>
</tr></thead>');
$stmt = Supplier::view_all();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['id']));
    echo("</td><td>");
    echo(htmlentities($row['name']));
    echo("</td><td>");
    echo(htmlentities($row['address']));
    echo("</td><td>");
    echo('<a href="editSupplier.php?id='.$row['id'].'">Edit</a> / ');
    echo('<a href="deleteSupplier.php?id='.$row['id'].'">Delete</a>');
    echo("</td></tr>\n");
}
?>
</table><br/>
<a href="addSupplier.php">Add New</a>


<br></br>Distributors
<?php
require_once "Distributor.php";

echo('<table border="1">
<thead><tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Action</th>
</tr></thead>');
$stmt = Distributor::view_all();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['id']));
    echo("</td><td>");
    echo(htmlentities($row['name']));
    echo("</td><td>");
    echo(htmlentities($row['address']));
    echo("</td><td>");
    echo('<a href="editDist.php?id='.$row['id'].'">Edit</a> / ');
    echo('<a href="deleteDist.php?id='.$row['id'].'">Delete</a>');
    echo("</td></tr>\n");
}
?>
</table><br/>
<a href="addDist.php">Add New</a>