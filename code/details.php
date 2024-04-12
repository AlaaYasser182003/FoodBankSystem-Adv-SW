<?php
require_once "pdo.php";
require_once "DonationDetails.php";
?>

<html>
<head>Donation Details</head><br></br>

<body>
<?php
$details = new DonationDetails();
$details->setId($_GET['id']);
$row = $details->read();
echo('<table border="1">
<thead><tr>
<th>ID</th>
<th>Donor Name</th>
<th>Program Name</th>
<th>Total Cost</th>
<th>Donation Date</th>
</tr></thead>');
echo "<tr><td>";
echo(htmlentities($row['Id']));
echo("</td><td>");
echo(htmlentities($row['donor_name']));
echo("</td><td>");
echo(htmlentities($row['program_name']));
echo("</td><td>");
echo(htmlentities($row['total_cost']));
echo("</td><td>");
echo(htmlentities($row['donation_date']));
echo("</td></tr>\n");
?>
</table><br/>
<a href="actor_ex.php?">Back</a>