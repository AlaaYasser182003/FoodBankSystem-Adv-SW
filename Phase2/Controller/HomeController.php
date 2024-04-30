<?php
require_once "..\View\HomeView.php";
require_once "..\Model\ProgramModel.php";
require_once "..\Model\pdo.php";
session_start();

$command = $_GET['cmd'];
$homeView = new HomeView();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['cmd'] = "verify") {
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
                header('Location: ..\Controller\HomeController.php?cmd=home');
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

else if ($command == 'login')
    $homeView->ShowLogin();

else if ($command == 'logout') {
    session_start();
    session_destroy();
    header("Location: ..\Controller\HomeController.php?cmd=home");;
}

else if ($command == 'signup') {
    header("Location: DonorController.php?cmd=signup");
    exit();
}

else {
    $stmt = ProgramModel::view_all();
    if (isset($_SESSION['user_id']))
        $homeView->ShowHome(true, $stmt);
    else 
        $homeView->ShowHome(false, $stmt);
}