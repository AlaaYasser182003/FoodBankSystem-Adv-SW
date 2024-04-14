<?php
require_once "Supplier.php";

if ( isset($_POST['name']) &&  isset($_POST['address']) ) {
    
    $supp = new Supplier($_POST["name"], $_POST["address"]);
    $supp->setId($_GET["id"]);
    $supp->edit();
    header("Location: actor_proc.php");
    return;
}

$supp = new Supplier();
$supp->setId($_GET["id"]);
$row = $supp->read();

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
<p>Edit Supplier</p>
<form method="post">
<p>Name:
<input type="text" name="name" value="<?= $n ?>"></p>
<p>Address:
<input type="text" name="address" value="<?= $a ?>"></p>
<p><input type="submit" value="Update"/>
<a href="actor_proc.php">Cancel</a></p>
</form>
<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body></html>
