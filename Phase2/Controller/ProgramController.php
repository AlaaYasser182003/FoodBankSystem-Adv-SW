<?php
require_once "..\Model\ProgramModel.php";
require_once "..\View\ProgramView.php";
require_once "..\Model\pdo.php";

class ProgramController {
    public $ProgView;
    function __construct() {
        $this->ProgView = new ProgramView();
    }
    public function addController() {
        $ProgModel = new ProgramModel(trim($_POST['name']), trim($_POST['address']));
        $this->ProgView->ChangeProgram($ProgModel->add());
    }
    public function deleteController() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->ProgView->ChangeProgram(ProgramModel::remove($_POST['id']));
        }
        else $this->ProgView->deleteRow();
    }
    public function view_allController() {
        $stmt = ProgramModel::view_all();
        $this->ProgView->ShowProgramsTable($stmt);
    }

    public function editController() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ProgModel = new ProgramModel(trim($_POST['name']), trim($_POST['address']));
            $ProgModel->setId($_GET['id']);
            $this->ProgView->ChangeProgram($ProgModel->edit());
        }
        else {
            $ProgModel = new ProgramModel();
            $ProgModel->getById($_GET['id']);
            $this->ProgView->EditProgram($ProgModel);
        }
    }
    public function show_to_user() {
        require_once "../Model/ItemModel.php";
        $programModel = new ProgramModel();
        $programkey = $_GET['id'];
        $programModel->getById($programkey);
        $stmt = ItemModel::view_all_id($programkey);
        $this->ProgView->ShowProgramToUser($programModel,$stmt);
    }
}

$command = $_GET['cmd'];
$controller = new ProgramController();

if ($command == 'viewAll') {
    $controller->view_allController();
}

else if ($command == 'edit') {
    $controller->editController();
}

else if ($command == 'add' && $_POST['cmd'] == $command) {
    $controller->addController();
}

else if ($command == 'delete')
    $controller->deleteController();

if ($command == 'showtouser')
{
    $controller->show_to_user();
}

$controller->ProgView->PrintFooter();
