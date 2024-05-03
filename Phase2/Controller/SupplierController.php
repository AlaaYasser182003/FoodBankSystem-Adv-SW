<?php
require_once "../Model/SupplierModel.php";
require_once "../View/SupplierView.php";

/*
$command = $_GET['cmd'];
$suppView = new SupplierView();

if ($command == 'viewAll') {
    $stmt = SupplierModel::view_all();
    $suppView->ShowSuppliersTable($stmt);
}

else if ($command == 'edit') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $suppModel = new SupplierModel(trim($_POST['name']), trim($_POST['address']));
        $suppModel->setId($_GET['id']);
        $suppView->ChangeSupplier($suppModel->edit());
    }
    else {
        $suppModel = new SupplierModel();
        $suppModel->getById($_GET['id']);
        $suppView->EditSupplier($suppModel);
    }
}

else if ($command == 'add' && $_POST['cmd'] == $command) {
    $suppModel = new SupplierModel(trim($_POST['name']), trim($_POST['address']));
    $suppView->ChangeSupplier($suppModel->add());
}

else if ($command == 'delete')
    $suppView->ChangeSupplier(SupplierModel::remove($_GET['id']));

$suppView->PrintFooter();
*/
