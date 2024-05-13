<?php
require_once "../Model/ItemModel.php";
require_once "../View/ItemView.php";

class ItemController {
    public $itemView;
    function __construct() {
        $this->itemView = new ItemView();
    }
    public function addController() {
        $itemModel = new ItemModel(md5(trim($_POST['program_id'])), trim($_POST['item_name']), trim($_POST['item_cost']), trim($_POST['amount']));
        $this->itemView->ChangeItem($itemModel->add()); 
}
    public function deleteController() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->itemView->ChangeItem(ItemModel::remove($_POST['id']));        
        }
        else $this->itemView->deleteRow();
    }
    public function view_allController() {
        $stmt = ItemModel::view_all();
        $this->itemView->ShowItemsTable($stmt);
}

    public function editController() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $itemModel = new ItemModel(md5(trim($_POST['program_id'])), trim($_POST['item_name']), trim($_POST['item_cost']), trim($_POST['amount']));
            $itemModel->setId($_GET['id']);
            $this->itemView->ChangeItem($itemModel->edit()); 
        }
        else{
            $itemModel = new ItemModel();
            $itemModel->getById($_GET['id']);
            $this->itemView->EditItem($itemModel);
        }
    }
}

$controller = new ItemController();


$command = $_GET['cmd'];
$itemView = new ItemView();  

if ($command == 'viewAll') {
    $controller->view_allController();
}

else if ($command == 'edit' ) {
    $controller->editController();
}

else if ($command == 'add' && $_GET['cmd'] == $command) {
    $controller->addController();
}

else if ($command == 'delete')
    $controller->deleteController();

$controller->itemView->PrintFooter();