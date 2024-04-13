<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
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
        <h1>Food Bank</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="myacc.php">My Account</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <h2>My Account</h2>
        <form action="editDonor.php" method="post">
        <label>Username: </label>
        <input type="text" id="username" name="username" value="<?= $_SESSION['username'] ?>">
        <br><br>

        <label>Password: </label>
        <input type="password" id="password" name="password" value="<?= $_SESSION['password'] ?>">
        <br><br>

        <label>Birthdate: </label>
        <input type="date" id="birthdate" name="birthdate" value="<?= $_SESSION['birthdate'] ?>">
        <br><br>

        <label>Email: </label>
        <input type="text" id="email" name="email" value="<?= $_SESSION['email'] ?>">
        <br><br>

        <label>Phone Number: </label>
        <input type="text" id="phone" name="phone" value="<?= $_SESSION['phone_number'] ?>">
        <br><br>
        
        <label>Gender: </label>
        <input type="radio" id="male" name="gender" value="0" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="1" required>
        <label for="female">Female</label>
        <br><br>

        <input type="submit" value="Update">
        <br><br>
        
    </form>

    <p class="logout-link"><a href="logout.php">Logout</a></p>
    </main>

    <footer>
        <p>© 2024 Food Bank</p>
    </footer>
</body>
</html>