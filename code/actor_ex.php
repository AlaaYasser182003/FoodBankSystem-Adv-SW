<?php
require_once "pdo.php";
require_once "Donation.php";
?>

<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Food Bank</title>
</head>
<body>
<header>
        <h1>Welcome Executive Director</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>
<h1>Donations</h1>
<?php
echo('<table border="1">
<thead><tr>
<th>Donor ID</th>
<th>Program ID</th>
<th>Amount</th>
<th>Action</th>
</tr></thead>');
$stmt = Donation::view_all();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['donor_id']));
    echo("</td><td>");
    echo(htmlentities($row['program_id']));
    echo("</td><td>");
    echo(htmlentities($row['amount']));
    echo("</td><td>");
    echo('<a href="details.php?id='.$row['id'].'">Details</a>');
    echo("</td></tr>\n");
}
?>
</table><br/>
<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body></html>