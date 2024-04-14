<?php
require_once "pdo.php";
require_once "Supplier.php";

?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Food Bank</title>
</head>
<body>
<header>
        <h1>Welcome Procurement Coordinator</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>
<h1>Suppliers</h1>

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


<br></br>
<h1>Distributors</h1>
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
<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body></html>