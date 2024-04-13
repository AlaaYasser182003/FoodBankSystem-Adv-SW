<?php
include "pdo.php";
include "Program.php";
session_start();
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
                <?php
                if (isset($_SESSION['username'])) {
                    echo('<li><a href="myacc.php">My Account</a></li>');
                    echo('<li><a href="logout.php">Logout</a></li>');
                }
                else echo('<li><a href="login.php">Login</a></li>');
                ?>
            </ul>
        </nav>
    </header>
    
    <main>
        <h2>Our Programs</h2>
        <?php

        echo('<table border="1">
            <thead><tr>
            <th>Program Name</th>
            <th>Description</th>');
            if (isset($_SESSION['username']))
                echo('<th>Action</th>');  
        echo('</tr></thead>');
        $stmt = Program::view_all();
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            echo "<tr><td>";
            echo(htmlentities($row['program_name']));
            echo("</td><td>");
            echo(htmlentities($row['description']).'</td>');
            if (isset($_SESSION['username']))
                echo('<td><a href="donate.php?id='.$row['id'].'">Donate</a>');
            echo("</td></tr>\n");
        }
        ?>
        </table>
    </main>

    <footer>
        <p>© 2024 Food Bank</p>
    </footer>
</body>
</html>