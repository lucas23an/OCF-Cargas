<?php

include_once '../colossus/controller/Colossus.php';

$acao = $_POST['acao'];

switch ($acao) {
    case 'inserir':
        $colossusController = new ControllerColossus;

        echo json_encode($colossusController->insert('remessa', $_POST['obj']));
        break;

    case 'alterar':
        $colossusController = new ControllerColossus;

        echo json_encode($colossusController->updateMulti('remessa', $_POST['obj'], $_POST['where']));
        break;

    case 'excluir':
        $colossusController = new ControllerColossus;

        $where = new stdClass;
        $where->id = $_POST['id'];

        echo json_encode($colossusController->delete('remessa', $where));
        break;
}