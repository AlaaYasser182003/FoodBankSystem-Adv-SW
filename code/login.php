<?php
require_once 'pdo.php';

session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare('SELECT * FROM donor WHERE username = :username');
        $stmt->execute(['username' => $username]);
        
        $donor = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($donor) {
            $pass = $donor['password'];
            if ($pass === $_POST['password']) {
                $_SESSION['user_id'] = $donor['id'];
                $_SESSION['username'] = $donor['username'];
                $_SESSION['birthdate'] = $donor['birthdate'];
                $_SESSION['email'] = $donor['email'];
                $_SESSION['password'] = $donor['password'];
                $_SESSION['phone_number'] = $donor['phone_number'];
                $_SESSION['gender'] = $donor['gender'];
                header('Location: home.php');
                exit;
            } else {
                $error = 'Invalid password.';
            }
        } else {
            $error = 'User not found.';
        }
    } catch (PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Login</title>
</head>

<body>
    <header>
        <h1>Food Bank</h1>
    </header>
    <main>
    <h2>Login</h2>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label>Username: </label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label>Password: </label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <input type="submit" name="submit" value="Login">
        <br><br>

        <p class="Signup-link">First time? <a href="signup.php">Sign Up Now</a></p>
    </form>

    </main>
    <footer>
        <p>© 2024 Food Bank</p>
    </footer>
</body>

</html>
