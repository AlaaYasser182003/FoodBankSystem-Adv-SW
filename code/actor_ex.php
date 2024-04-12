<?php
require_once "pdo.php";
require_once "Donation.php";
?>

<html>
<head>Welcome Executive Director</head><br></br>

<body>Donations
<?php

echo('<table border="1">'."\n");
$stmt = Donation::view_all();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['id']));
    echo("</td><td>");
    echo(htmlentities($row['donor_id']));
    echo("</td><td>");
    echo(htmlentities($row['program_id']));
    echo("</td><td>");
    echo(htmlentities($row['item_id']));
    echo("</td><td>");
    echo(htmlentities($row['amount']));
    echo("</td><td>");
    echo('<a href="edit.php?id='.$row['id'].'">Edit</a> / ');
    echo('<a href="deleteDonation.php?id='.$row['id'].'">Delete</a>');
    echo("</td></tr>\n");
}
?>
</table>
<a href="add.php">Add New</a><br/>

Donations Details
<?php

echo('<table border="1">'."\n");
$stmt = DonationDetails::view_all();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['id']));
    echo("</td><td>");
    echo(htmlentities($row['donor_id']));
    echo("</td><td>");
    echo(htmlentities($row['program_id']));
    echo("</td><td>");
    echo(htmlentities($row['item_id']));
    echo("</td><td>");
    echo(htmlentities($row['amount']));
    echo("</td></tr>\n");
}
?>
</table>