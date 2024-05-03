<?php
require_once "..\View\CartView.php";
require_once "..\Model\pdo.php";
session_start();

$cartView = new CartView();
$command = $_GET['cmd'];

if($command == 'showcart'){
    $cartView->ShowCart();
}

if ($command == 'addToCart') {
    session_start();
    if(empty($_SESSION['cart']))
        $_SESSION['cart']=array();
    $_SESSION['cart'][$_POST['item']] = $_POST['quantity'];
    /*foreach ($_SESSION['cart'] as $item => $quantity) {
        echo "Item: $item, Quantity: $quantity <br>";
    }*/
    header("Location: ProgramController.php?cmd=showtouser&id=".$_GET['id']);
    return;
}

if($command == 'removeitem'){
    $item = $_GET['item'];
    unset($_SESSION['cart'][$item]);
    $cartView->ShowCart();
}

if($command == 'removeall'){
    $_SESSION['cart'] = array();
    header("Location: CartController.php?cmd=showcart");
}

$cartView->PrintFooter();

