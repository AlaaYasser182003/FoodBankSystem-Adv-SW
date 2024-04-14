<?php
require_once "Distributor.php";

if ( isset($_POST['name']) && isset($_POST['address']) ) {
    
    $distr = new Distributor($_POST["name"], $_POST["address"]);
    $distr->add();
    header("Location: actor_proc.php");
    return;
}
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
<p>Add Distributor</p>
<form method="post">
<p>Name:
<input type="text" name="name"></p>
<p>Address:
<input type="text" name="address"></p>
<p><input type="submit" value="Create"/>
<a href="actor_proc.php">Cancel</a></p>
</form>
<footer>
        <p>© 2024 Food Bank</p>
</footer>