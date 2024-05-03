<?php
require_once "..\Model\ProgramModel.php";
require_once "..\View\ProgramView.php";
require_once "..\Model\pdo.php";

$command = $_GET['cmd'];
$ProgView = new ProgramView();

if ($command == 'viewAll') {
    $ProgView->ShowProgramsTable();
    $stmt = ProgramModel::view_all();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        $ProgView->ShowProgramsRows($row);
}

else if ($command == 'edit') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ProgModel = new ProgramModel(trim($_POST['name']), trim($_POST['address']));
        $ProgModel->setId($_GET['id']);
        $ProgView->ChangeProgram($ProgModel->edit());
    }
    else {
        $ProgModel = new ProgramModel();
        $ProgModel->getById($_GET['id']);
        $ProgView->EditProgram($ProgModel);
    }
}

else if ($command == 'add' && $_POST['cmd'] == $command) {
    $ProgModel = new ProgramModel(trim($_POST['name']), trim($_POST['address']));
    $ProgView->ChangeProgram($ProgModel->add());
}

else if ($command == 'delete')
    $ProgView->ChangeProgram(ProgramModel::remove($_GET['id']));

$ProgView->PrintFooter();