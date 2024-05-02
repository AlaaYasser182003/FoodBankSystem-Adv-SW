<?php
require_once "..\View\HomeView.php";
require_once "..\Model\ProgramModel.php";
require_once "..\Model\DonorModel.php";
require_once "..\Model\pdo.php";
session_start();

$homeView = new HomeView();
if (!isset($_GET['cmd'])) {
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $logged = DonorModel::login($username, $password);
        if ($logged)
            header("Location: ..\Controller\HomeController.php");
        else
            header("Location: ..\Controller\HomeController.php?cmd=login");
        exit();
    }

    else {
        $stmt = ProgramModel::view_all();
        if ( isset($_SESSION['user_id']) )
            $homeView->ShowHome(true, $stmt, $_SESSION['username']);
        else
            $homeView->ShowHome(false, $stmt);
    }
    $homeView->PrintFooter();
}

else {
    $command = $_GET['cmd'];

    if ($command == 'login'){
        $error = ( (isset($_SESSION['error'])) ? $_SESSION['error'] : null); 
        $homeView->ShowLogin($error);
    }

    else if ($command == 'logout') {
        session_destroy();
        header("Location: ..\Controller\HomeController.php");
        exit();
    }

    else if ($command == 'signup') {
        header("Location: DonorController.php?cmd=add");
        exit();
    }
}

//$homeView->PrintFooter();