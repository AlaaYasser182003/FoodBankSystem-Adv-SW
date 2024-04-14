<?php
require_once "Program.php";

if ( isset($_POST['name']) && isset($_POST['description'])) {
    
    $program = new Program($_POST["name"], $_POST['description']);
    $program->add();
    header("Location: actor_prog.php");
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
        <h1>Welcome Program Coordinator</h1>
</header>
<p>Add Program</p>
<form method="post">
<p>Name:
<input type="text" name="name"></p>
<p>Description:
<input type="text" name="description"></p>
<p><input type="submit" value="Create"/>
<a href="actor_prog.php">Cancel</a></p>
</form>
<footer>
        <p>© 2024 Food Bank</p>
</footer>
</body></html>

