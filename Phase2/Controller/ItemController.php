<?php
require_once "../Model/ItemModel.php";
require_once "../View/ItemView.php";

$command = $_GET['cmd'];
$itemView = new ItemView();  

if ($command == 'viewAll') {
    $stmt = ItemModel::view_all();
    $itemView->ShowItemsTable($stmt);
}

else if ($command == 'edit' ) {
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $itemModel = new ItemModel(md5(trim($_POST['program_id'])), trim($_POST['item_name']), trim($_POST['item_cost']), trim($_POST['amount']));
        $itemModel->setId($_GET['id']);
        $itemView->ChangeItem($itemModel->edit()); 
    }
    else{
        $itemModel = new ItemModel();
        $itemModel->getById($_GET['id']);
        $itemView->EditItem($itemModel);
    }
}

else if ($command == 'add' && $_GET['cmd'] == $command) {
    $itemModel = new ItemModel(md5(trim($_POST['program_id'])), trim($_POST['item_name']), trim($_POST['item_cost']), trim($_POST['amount']));
    $itemView->ChangeItem($itemModel->add()); 
}

else if ($command == 'delete')
    $itemView->ChangeItem(ItemModel::remove($_GET['id']));

$itemView->PrintFooter();