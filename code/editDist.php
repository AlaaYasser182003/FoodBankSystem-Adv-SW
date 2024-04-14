<?php
require_once "Distributor.php";

if ( isset($_POST['name']) &&  isset($_POST['address']) ) {
    
    $distr = new Distributor($_POST["name"], $_POST["address"]);
    $distr->setId($_GET["id"]);
    $distr->edit();
    header("Location: actor_proc.php");
    return;
}


$distr = new Distributor();
$distr->setId($_GET["id"]);
$row = $distr->read();

$n = htmlentities($row['name']);
$a = htmlentities($row['address']);
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
    </header>
<p>Edit Distributor</p>
<form method="post">
<p>Name:
<input type="text" name="name" value="<?= $n ?>"></p>
<p>Address:
<input type="number" name="address" value="<?= $a ?>"></p>
<p><input type="submit" value="Update"/>
<a href="actor_proc.php">Cancel</a></p>
</form>
<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body></html>
