<?php
require_once "..\Model\ItemModel.php";
require_once "..\View\ItemView.php";

$command = $_GET['cmd'];
$itemView = new ItemView();  //object from view

if ($command == 'viewAll') {
    $stmt = ItemModel::view_all();
    $itemView->ShowItemsTable($stmt);
}

else if ($command == 'edit') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $itemModel = new ItemModel(trim($_POST['program_id']), trim($_POST['item_name']), trim($POST['item_cost']), trim($POST['amount']));
        $itemModel->setId($_GET['id']);
       // $itemView->ChangeItem($itemModel->edit()); //eh change deh?
    }
    else {
        $itemModel = new ItemModel();
        $itemModel->getById($_GET['id']);
        $itemView->EditItem($itemModel);
    }
}

else if ($command == 'add' && $_POST['cmd'] == $command) {
    $itemModel = new ItemModel(trim($_POST['program_id']), trim($_POST['item_name']), trim($POST['item_cost']), trim($POST['amount']));
    $itemView->ChangeItem($itemModel->add()); //hya eh change dehhh
}

else if ($command == 'delete')
    $itemView->ChangeItem(ItemModel::remove($_GET['id']));

$itemView->PrintFooter();