<?php
require_once "Item.php";

if ( isset($_POST['name']) && isset($_POST['program_id'])
     && isset($_POST['amount']) && isset($_POST['cost']) ) {
    
    $item = new Item($_POST["program_id"], $_POST["name"], $_POST["cost"], $_POST["amount"]);
    $item->add();
    header("Location: actor_ware.php");
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
        <h1>Welcome Warehouse Coordinator</h1>
</header>

<p>Add Item</p>
<form method="post">
<p>Name:
<input type="text" name="name"></p>
<p>Amount:
<input type="number" name="amount"></p>
<p>Cost:
<input type="number" step = "0.001" name="cost"></p>
<p>Program ID:
<input type="number" name="program_id"></p>
<p><input type="submit" value="Create"/>
<a href="actor_ware.php">Cancel</a></p>
</form>
<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body></html>