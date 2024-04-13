<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
</head>

<body>
    <header>
        <h1>Food Bank</h1>
    </header>
    <main>
    <form action="addDonor.php" method="post">
        <h2>Sign Up</h2>
        <label>Username: </label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label>Password: </label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <label>Birthdate: </label>
        <input type="date" id="birthdate" name="birthdate" required>
        <br><br>

        <label>Email: </label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label>Phone Number: </label>
        <input type="text" id="phone" name="phone" required>
        <br><br>
        
        <label>Gender: </label>
        <input type="radio" id="male" name="gender" value="0" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="1" required>
        <label for="female">Female</label>
        <br><br>
        <input type="submit" value="Sign Up">
        <br><br>

        <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
        
    </form>
    </main>
    <footer>
        <p>© 2024 Food Bank</p>
    </footer>
</body>

</html>
