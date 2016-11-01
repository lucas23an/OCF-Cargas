<?php

include_once __DIR__ . '/../model/Colossus.php';

class ControllerColossus {

    protected $colossus;

    public function __construct() {
        $this->colossus = new Colossus;
    }

    public function insert($table, $obj) {
        $id = $this->colossus->insert($table, $obj);
        $retorno = new stdClass;
        if ($id) {
            $retorno->id = $id;
            $retorno->msg = ' Inserido com sucesso! ';
        } else {
            $retorno->id = '0';
            $retorno->msg = ' Inserção não realizada! ';
        }
        return $retorno;
    }

    public function select($table, $columns) {
        return $this->colossus->select($table, $columns);
    }

    public function selectOrder($table, $columns, $order) {
        return $this->colossus->selectOrder($table, $columns, $order);
    }

    public function selectWhere($table, $columns, $where) {
        return $this->colossus->selectWhere($table, $columns, $where);
    }

    public function selectWhereAll($table, $columns, $where, $order, $limit) {
        return $this->colossus->selectWhereAll($table, $columns, $where, $order, $limit);
    }

    public function selectWhereOr($table, $columns, $where) {
        return $this->colossus->selectWhereOr($table, $columns, $where);
    }

    public function update($table, $obj, $where) {
        $resultado = $this->colossus->update($table, $obj, $where);
        $retorno = new stdClass;
        if ($resultado) {
            $retorno->msg = ' Alterado com sucesso! ';
        } else {
            $retorno->msg = ' Alteração não realizada! ';
        }
        return $retorno;
    }

    public function updateMulti($table, $obj, $where) {
        $resultado = $this->colossus->updateMulti($table, $obj, $where);
        $retorno = new stdClass;
        if ($resultado) {
            $retorno->msg = ' Alterado com sucesso! ';
        } else {
            $retorno->msg = ' Alteração não realizada! ';
        }
        return $retorno;
    }

    public function delete($table, $where) {
        $resultado = $this->colossus->delete($table, $where);
        $retorno = new stdClass;
        if ($resultado) {
            $retorno->msg = ' Deletado com sucesso! ';
        } else {
            $retorno->msg = ' Deleção não realizada! ';
        }
        return $retorno;
    }

    public function inverteData($data) {
        if (count(explode("-", $data)) > 1) {
            return implode("/", array_reverse(explode("-", $data)));
        } elseif (count(explode("/", $data)) > 1) {
            return implode("-", array_reverse(explode("/", $data)));
        }
    }

    public function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {

        $lmin = 'abcdefghijklmnopqrstuvwxyz';

        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $num = '1234567890';

        $simb = '!@#$%*-';

        $retorno = '';

        $caracteres = '';

        $caracteres .= $lmin;

        if ($maiusculas)
            $caracteres .= $lmai;

        if ($numeros)
            $caracteres .= $num;

        if ($simbolos)
            $caracteres .= $simb;


        $len = strlen($caracteres);

        for ($n = 1; $n <= $tamanho; $n++) {

            $rand = mt_rand(1, $len);

            $retorno .= $caracteres[$rand - 1];
        }

        return $retorno;
    }

    public function gerarCrud($banco, $tabela, $columns) {

        for ($i = 0; $i < count($tabela->nomeTabela); $i++) {
            $view = $this->colossus->geradorView($tabela->nomeTabela[$i], $columns);

            $fpView = fopen("../../view/" . $tabela->nomeTabela[$i] . ".php", "a");
            fwrite($fpView, "$view");
            fclose($fpView);

            $action = $this->colossus->geradorAction($tabela->nomeTabela[$i], $columns);

            $fpAction = fopen("../../action/" . ucfirst($tabela->nomeTabela[$i]) . ".php", "a");
            fwrite($fpAction, "$action");
            fclose($fpAction);
        }
    }

    public function selectWhereAllData($table, $columns, $mes, $ano, $where) {
        return $this->colossus->selectWhereAllData($table, $columns, $mes, $ano, $where);
    }

    public function selectWhereAllDataTables($table1, $table2, $columns, $mes, $ano, $data, $where) {
        return $this->colossus->selectWhereAllDataTables($table1, $table2, $columns, $mes, $ano, $data, $where);
    }


    public function selectWhereAllTables($table1, $table2, $columns, $where) {
        return $this->colossus->selectWhereAllTables($table1, $table2, $columns, $where);
    }

    public function selectWhereJoinAll($table, $columns, $join, $where, $order, $limit) {
        return $this->colossus->selectWhereJoinAll($table, $columns, $join, $where, $order, $limit);
    }

    public function selectWhereJoinAllData($table, $columns, $join, $where, $order, $limit) {
        return $this->colossus->selectWhereJoinAllData($table, $columns, $join, $where, $order, $limit);
    }

    public function autoCompleteDinamicoUsuario($usuario) {
        return $this->colossus->autoCompleteDinamicoUsuario($usuario);
    }
}