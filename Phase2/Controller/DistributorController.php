<?php
define('__ROOT__', dirname(dirname(__FILE__), 1));
require_once (__ROOT__."\Model\DistributorModel.php");
require_once (__ROOT__."\View\DistributorView.php");
require_once (__ROOT__."\Model\pdo.php");

$command = $_GET['cmd'];
$distView = new DistributorView();

if ($command == 'viewAll') {
    $distView->ShowDistributorsTable();
    $stmt = DistributorModel::view_all();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        $distView->ShowDistributorsRows($row);
}

else if ($command == 'edit') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $distModel = new DistributorModel(trim($_POST['name']), trim($_POST['address']));
        $distModel->setId($_GET['id']);
        $distView->ChangeDistributor($distModel->edit());
    }
    else {
        $distModel = new DistributorModel();
        $distModel->getById($_GET['id']);
        $distView->EditDistributor($distModel);
    }
}

else if ($command == 'add' && $_POST['cmd'] == $command) {
    $distModel = new DistributorModel(trim($_POST['name']), trim($_POST['address']));
    $distView->ChangeDistributor($distModel->add());
}

else if ($command == 'delete')
    $distView->ChangeDistributor(DistributorModel::remove($_GET['id']));

$distView->PrintFooter();