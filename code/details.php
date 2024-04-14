<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Food Bank</title>
</head>
<body>
<header>
        <h1>Welcome Executive Director</h1>
</header>
<body>
<h1>Donation Details</h1>
<?php
require_once "DonationDetails.php";
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
<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body></html>