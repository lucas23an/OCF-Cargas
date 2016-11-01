<?php

include_once '../controller/Colossus.php';
session_start();

if (isset($_POST['rota'])) {

    if ($_POST['rota'] != '') {
        echo "<script>
                $('#" . $_SESSION['rota'] . "').removeClass('active');
                $('#" . $_POST['rota'] . "').addClass('active');
              </script>";

        $_SESSION['rota'] = $_POST['rota'];
    }

    include '../../view/' . $_SESSION['rota'] . '.php';
} else if (isset($_POST['login'])) {

    $controllerColossus = new ControllerColossus;
    $where = new stdClass;

    $where->nome_usuario = $_POST['email'];
    $where->senha_usuario = md5($_POST['senha']);
    $resuldado = $controllerColossus->selectWhere('usuario', '*', $where);

    if ($resuldado) {
        if ($resuldado->status_usuario != '0') {
            session_start();
            $_SESSION['login'] = $resuldado;
            $_SESSION['rota'] = 'inicio';
            echo '';
        } else {
            echo 'inativo';
        }
    } else {
        echo 'incorreto';
    }
} else if (isset($_POST['recover'])) {
    $controllerColossus = new ControllerColossus;
    $obj = new stdClass;

    $obj->email_usuario = $_POST['email'];

    $resultado = $controllerColossus->selectWhere('usuario', '*', $obj);

    if ($resultado) {
        $novaSenha = $controllerColossus->geraSenha(10);

        $where = new stdClass;
        $where->id_usuario = $resultado->id_usuario;

        $objeto = new stdClass;
        $objeto->email_usuario = $resultado->email_usuario;
        $objeto->senha_usuario = md5($novaSenha);

        $resultad = $controllerColossus->update('usuario', $objeto, $where);

        if ($resultad) {

            include_once 'EmailNovaSenha.php';

            if ($mail->send()) {
                echo ' A nova senha foi enviada para o seu e-mail ';
            } else {
                echo ' Erro ao enviar o email ' . $mail->ErrorInfo;
            }
        } else {
            echo ' A nova senha foi enviada para o seu e-mail ';
        }
    } else {
        echo ' Usuário não encontrado ';
    }
} else if (isset($_POST['gerarCrud'])) {
    $controllerColossus = new ControllerColossus;

    $banco = new stdClass;
    $banco->nomeBanco = $_POST['nomeBanco'];

    $table = new stdClass;
    $table->nomeTabela = $_POST['nomeTabela'];

    $columns = new stdClass;
    $columns->nomeColuna = $_POST['nomeColuna'];
    $columns->tipoColuna = $_POST['tipoColuna'];
    $columns->tabelaChave = $_POST['tabelaChave'];
    $columns->idChave = $_POST['idChave'];
    $columns->referenciaChave = $_POST['referenciaChave'];
    $columns->nulo = $_POST['nulo'];

    $controllerColossus->gerarCrud($banco, $table, $columns);
} else if (isset($_POST['listarCidade'])) {

    $colossusController = new ControllerColossus;

    $where = new stdClass;
    $where->fk_id_estado = $_POST['id'];

    $retorno = '<option value=""></option>';
    foreach ($colossusController->selectWhereAll('cidade', '*', $where, 'nome_cidade ASC', '0') as $cidade) {
        $retorno .= '<option value="' . $cidade->id_cidade . '">' . $cidade->nome_cidade . '</option>';
    };
    echo $retorno;
}