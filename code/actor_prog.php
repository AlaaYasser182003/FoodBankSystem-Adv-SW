<?php
require_once "pdo.php";
require_once "Program.php";
?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Food Bank</title>
</head>
<body>
    <header>
        <h1>Welcome Program Coordinator</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>
<h1>Programs</h1>

<?php

echo('<table border="1">
<thead><tr>
<th>Program ID</th>
<th>Name</th>
<th>Description</th>
<th>Action</th>
</tr></thead>');
$stmt = Program::view_all();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['id']));
    echo("</td><td>");
    echo(htmlentities($row['program_name']));
    echo("</td><td>");
    echo(htmlentities($row['description']));
    echo("</td><td>");
    echo('<a href="editProgram.php?id='.$row['id'].'">Edit</a> / ');
    echo('<a href="deleteProgram.php?id='.$row['id'].'">Delete</a>');
    echo("</td></tr>\n");
}
?>
</table><br/>
<a href="addProgram.php">Add New</a><br/>
<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body></html>