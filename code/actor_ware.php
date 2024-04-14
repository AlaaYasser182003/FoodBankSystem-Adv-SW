<?php
require_once "pdo.php";
require_once "Item.php";
?>

<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Food Bank</title>
</head>
<body>
<header>
        <h1>Welcome Warehouse Coordinator</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>
<h1>Items</h1>

<?php

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
</table><br/>
<a href="addItem.php">Add New</a>
<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body></html>