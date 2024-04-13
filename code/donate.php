<?php
include "Program.php";
include "pdo.php";
$program = new Program();
$program->setId($_GET['id']);
$row = $program->read();

$programID = htmlentities($row['id']);
$name = htmlentities($row['program_name']);
$description = htmlentities($row['description']);
?>

<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Food Bank</title>
</head>
<body>
    <header>
        <h1>Food Bank</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="myacc.php">My Account</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
    <p><?= $name ?></p>
    <p><?= $description ?></p>
    <form action="addDonation.php" method="post">
    <?php
    include "Item.php";
    echo '<label for="item"> Choose item: </label>';
    echo'<select name = "item">';
    $stmt = Item::view_all();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($row['program_id'] === (int)$programID){
        $itemName = $row['item_name'];
        $itemID = $row['id'];
        echo "<option value=\"$itemID\">$itemName</option>";}
    }
    echo'</select>';
        ?>
    <br><br>
    <label>Amount: </label>
        <input type="number" id="quantity" name="quantity" required> 

    <br><br>
    <input type="hidden" name="program_name" value="<?= $name ?>">
    <input type="hidden" name="program_id" value="<?= $_GET['id'] ?>">
    <input type="submit" value="Donate">
    <a href = "home.php">Cancel</a>
    </form> 
    </main>
    <footer>
        <p>© 2024 Food Bank</p>
    </footer>
</body>
</html>