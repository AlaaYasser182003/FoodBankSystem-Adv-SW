<?php
require_once "pdo.php";
require_once "Item.php";
?>

<html>
<head>Welcome Warehouse Coordinator</head><br></br>

<body>Items
<?php

echo('<table border="1">'."\n");
echo('<table border="1">
<thead><tr>
<th>Program ID</th>
<th>Name</th>
<th>Amount</th>
<th>Cost</th>
<th>Action</th>
</tr></thead>');
$stmt = Item::view_all();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['program_id']));
    echo("</td><td>");
    echo(htmlentities($row['item_name']));
    echo("</td><td>");
    echo(htmlentities($row['amount']));
    echo("</td><td>");
    echo(htmlentities($row['item_cost']));
    echo("</td><td>");
    echo('<a href="editItem.php?id='.$row['id'].'">Edit</a> / ');
    echo('<a href="deleteItem.php?id='.$row['id'].'">Delete</a>');
    echo("</td></tr>\n");
}
?>
</table>
<a href="addItem.php">Add New</a><br/>