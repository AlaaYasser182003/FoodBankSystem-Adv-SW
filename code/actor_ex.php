<?php
require_once "pdo.php";
require_once "Donation.php";
?>

<html>
<head>Welcome Executive Director</head><br></br>

<body>Donations
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