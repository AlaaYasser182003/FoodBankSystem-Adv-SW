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
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
    </head>

    <body>
        <section class="container">
            <header><h1>Login</h1></header>
            
                <?php if ($error): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>

                <form action="login.php" method="POST" class="form">
                    <div class = "input-box">
                        <label>Username:</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    </div>

                    <div class = "input-box">
                        <label>Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <button>Submit</button>
                <p class="login-link">First Time? <a href="signup.php">Sign Up</a> <a href="home.php">Cancel</a></p>
                </form>

        </section>
    </body>

</html>
