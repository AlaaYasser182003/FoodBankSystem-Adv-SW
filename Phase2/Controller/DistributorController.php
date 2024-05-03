<?php
require_once "../Model/DistributorModel.php";
require_once "../View/DistributorView.php";

$command = $_GET['cmd'];
$distView = new DistributorView();

if ($command == 'viewAll') {
    $stmt = DistributorModel::view_all();
    $distView->ShowDistributorsTable($stmt);
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