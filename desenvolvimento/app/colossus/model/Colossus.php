<?php

include_once __DIR__ . '/../config/Database.php';

class Colossus extends Database {

    public function __construct() {
        $this->open();
    }

    public function insert($table, $obj) {
        $i = 0;
        $coluna = '';
        $parametro = '';
        foreach ($obj as $key => $value) {
            if ($i == 1) {
                $coluna .= ',' . $key;
                $parametro .= ',:' . $key;
            } else {
                $coluna .= $key;
                $parametro .= ':' . $key;
                $i = 1;
            }
        }
        $sql = 'INSERT INTO ' . $table . ' (' . $coluna . ') VALUES(' . $parametro . ')';
        $stmt = $this->conn->prepare($sql);
        foreach ($obj as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function select($table, $columns) {
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $sql = 'SELECT ' . $colunas . ' FROM ' . $table . '';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectOrder($table, $columns, $order) {
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $sql = 'SELECT ' . $colunas . ' FROM ' . $table . ' ORDER BY ' . $order;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectWhere($table, $columns, $where) {
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $j = 0;
        $parametro = '';
        foreach ($where as $key => $value) {
            if ($j == 1) {
                $parametro .= ' AND ' . $key . ' = :' . $key;
            } else {
                $parametro .= $key . ' = :' . $key;
                $j = 1;
            }
        }
        $sql = 'SELECT ' . $colunas . ' FROM ' . $table . ' WHERE ' . $parametro . ' LIMIT 1';
        $stmt = $this->conn->prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->execute();
        return $stmt->fetch();
    }

    public function selectWhereAll($table, $columns, $where, $order, $limit) {
        if ($order == '0') {
            $ordem = '';
        } else {
            $ordem = 'ORDER BY ' . $order;
        }
        if ($limit == '0') {
            $limite = '';
        } else {
            $limite = 'LIMIT ' . $limit;
        }
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $j = 0;
        $parametro = '';
        foreach ($where as $key => $value) {
            if ($j == 1) {
                $parametro .= ' AND ' . $key . ' = :' . $key;
            } else {
                $parametro .= $key . ' = :' . $key;
                $j = 1;
            }
        }
        $sql = 'SELECT ' . $colunas . ' FROM ' . $table . ' WHERE ' . $parametro . ' ' . $ordem . ' ' . $limite . '';
        $stmt = $this->conn->prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectWhereOr($table, $columns, $where) {
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $j = 0;
        $parametro = '';
        foreach ($where as $key => $value) {
            if ($j == 1) {
                $parametro .= ' OR ' . $key . ' = :' . $key;
            } else {
                $parametro .= $key . ' = :' . $key;
                $j = 1;
            }
        }

        $sql = 'SELECT ' . $colunas . ' FROM ' . $table . ' WHERE ' . $parametro . '';
        $stmt = $this->conn->prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update($table, $obj, $where) {
        $j = 0;
        $parametro = '';
        $parametroId = '';
        foreach ($obj as $key => $value) {
            if ($j == 1) {
                $parametro .= ',' . $key . ' = :' . $key;
            } else {
                $parametro .= $key . ' = :' . $key;
                $j = 1;
            }
        }
        foreach ($where as $key => $value) {
            $parametroId .= $key . ' = :' . $key;
        }
        $sql = 'UPDATE ' . $table . ' SET ' . $parametro . ' WHERE ' . $parametroId . '';
        $stmt = $this->conn->prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        foreach ($obj as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        return $stmt->execute();
    }

    public function updateMulti($table, $obj, $where) {
        foreach ($obj as $key => $value) {
            $count = count($value);
        }
        for ($i = 0; $i < $count; $i++) {
            $j = 0;
            $parametro = '';
            $parametroId = '';
            foreach ($obj as $key => $value) {
                if ($j == 1) {
                    $parametro .= ',' . $key . ' = :' . $key;
                } else {
                    $parametro .= $key . ' = :' . $key;
                    $j = 1;
                }
            }
            foreach ($where as $key => $value) {
                $parametroId .= $key . ' = :' . $key;
            }
            $sql = 'UPDATE ' . $table . ' SET ' . $parametro . ' WHERE ' . $parametroId . '';
            $stmt = $this->conn->prepare($sql);
            foreach ($where as $key => $value) {
                $stmt->bindValue(':' . $key, $value[$i]);
            }
            foreach ($obj as $key => $value) {
                $stmt->bindValue(':' . $key, $value[$i]);
            }
            $retorno = $stmt->execute();
        }
        if ($retorno) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $where) {
        $parametroId = '';
        foreach ($where as $key => $value) {
            $parametroId .= $key . ' = :' . $key;
        }
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $parametroId . '';
        $stmt = $this->conn->prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        return $stmt->execute();
    }

    public function geradorView($tabela, $coluna) {
        $tabelaMaiuscula = ucfirst($tabela);
        $controllerColossus = '$colossusController';
        $colossusControllerSelect = '$colossusController->select';
        $colossusControllerSelectWhere = '$colossusController->selectWhere';
        $obj = '$obj';
        $objValor = '$obj->';
        $where = '$where';
        $whereValor = '$where->';
        $input = '';
        $inputId = '';
        $id = '';
        $head = '';
        $inputInserir = '';
        $objTabela = '$objTabela';
        $objTabelaValor = '$objTabela->';
        $o = '$o';
        $oValor = '$o->';
        $aspas = '"';
        for ($i = 0; $i < count($coluna->nomeColuna); $i++) {
            $tipo = $coluna->tipoColuna[$i];
            $nome = $coluna->nomeColuna[$i];
            $tabelaChave = $coluna->tabelaChave[$i];
            $idChave = $coluna->idChave[$i];
            $referenciaChave = $coluna->referenciaChave[$i];
            if ($coluna->nulo[$i] == 'null') {
                $nulo = '';
            } else {
                $nulo = 'required';
            }
            if ($i != 0) {
                if ($tabelaChave == '') {
                    $input .= "<td class='min-td'>
                    <input type='$tipo' name='obj[$nome][]' class='form-control' value='<?php echo $objValor$nome ?>' $nulo/>
                </td>
                ";
                    $inputInserir .= "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                    <label>" . ucfirst($nome) . " <span class='obrig'>*</span></label>
                    <input type='$tipo' name='obj[$nome]' class='form-control' $nulo>
                </div>
                ";
                } else {
                    $input .= "<td class='min-td'>
                    <?php
                    $where = new stdClass;
                    $whereValor$idChave = $objValor$nome;
                    $objTabela = $colossusControllerSelectWhere('$tabelaChave', '*', $where);
                    ?>
                    <select name='obj[$nome][]' class='form-control' $nulo>
                        <option value='<?php echo $objTabelaValor$idChave; ?>'><?php echo $objTabelaValor$referenciaChave; ?></option>
                        <?php
                        foreach ($colossusControllerSelect('$tabelaChave', '*') as $o) {
                            if ($oValor$idChave != $objValor$nome) {
                                ?>
                                <option value='<?php echo $oValor$idChave; ?>'><?php echo $oValor$referenciaChave ?></option>
                                <?php
                            }
                        };
                        ?>
                    </select>
                </td>";
                    $inputInserir .= "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                    <label>" . ucfirst($nome) . " <span class='obrig'>*</span></label>
                    <select name='obj[$nome]' class='form-control' $nulo>
                        <option value=''></option>
                        <?php foreach ($colossusControllerSelect('$tabelaChave', '*') as $o) { ?>
                            <option value='<?php echo $oValor$idChave; ?>'><?php echo $oValor$referenciaChave ?></option>
                        <?php }; ?>
                    </select>
                </div>
                ";
                }
                $head .= "<th class='font-table'>" . ucfirst($nome) . "</th>
                ";
            } else {
                $inputId .= "<input type='hidden' name='where[$nome][]' value='<?php echo $objValor$nome ?>'/>";
                $id .= "$objValor$nome";
            }
        }

        $retorno = "";
        $retorno .= "<?php
include_once __DIR__ . '/../colossus/controller/Colossus.php';
$controllerColossus = new ControllerColossus;
?>
  
<h1 class='page-header'>$tabelaMaiuscula</h1>
<form id='form-alterar' method='post'>
    <input type='hidden' name='acao' value='alterar'>
    <table style='width: 100%'>
        <tr>
            <td>
                <button title='Cadastrar' type='button' class='btn btn-padrao' data-toggle='modal' data-target='#cadastrar'>
                    <i class='fa fa-plus'></i> Cadastrar
                </button>
            </td>
            <td>
                <button style='float: right' title='Salvar' type='submit' class='btn btn-padrao'>
                    <i class='fa fa-save'></i>
                </button>
            </td>
        </tr>
    </table>
    <br>
    <table class='table' id='dataTables-example'>
        <thead style='background-color: #237491'>
            <tr>
                $head
                <th class='font-table'></th>
            </tr>
        </thead>
        <tbody style='background-color: #fff'>
        <?php foreach ($colossusControllerSelect('$tabela', '*') as $obj) { ?>
        $inputId
            <tr>
                $input
                <td style='max-width: 50px;'>
                    <button onclick='deleteAjax($aspas$tabelaMaiuscula$aspas,<?php echo $id ?>);'  title='Excluir' type='button' class='btn btn-padrao-danger'>
                        <i class='fa fa-times'></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</form>
     
<div class='modal modal-primary' id='cadastrar' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
    <div class='modal-dialog' style='max-width: 600px'>
        <div class='modal-content row'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                <h4 class='modal-title' id='myModalLabel'>Cadastro</h4>
            </div>
            <form id='form-inserir' method='post'>
                <input type='hidden' name='acao' value='inserir'>
                $inputInserir
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                    <div style='text-align: right' class='right'>
                        <input type='submit' class='btn btn-padrao' value='Salvar'>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#form-inserir').submit(function (e) {
            e.preventDefault();
            $('#cadastrar').modal('hide');
            formAjax('$tabelaMaiuscula','#form-inserir');
        });
        
        $('#form-alterar').submit(function (e) {
            e.preventDefault();
            formAjax('$tabelaMaiuscula','#form-alterar');
        });
    });
</script>";
        return $retorno;
    }

    public function geradorAction($tabela, $coluna) {
        $controllerColossus = '$colossusController';
        $colossusControllerInsert = '$colossusController->insert';
        $colossusControllerUpdateMulti = '$colossusController->updateMulti';
        $colossusControllerDelete = '$colossusController->delete';
        $where = '$where';
        $whereValor = '$where->';
        $acao = '$acao';
        $POST = '$_POST[';
        $id = '';
        for ($i = 0; $i < count($coluna->nomeColuna); $i++) {
            $nome = $coluna->nomeColuna[$i];
            if ($i == 0) {
                $id .= "$whereValor$nome";
            }
        }

        $retorno = "";
        $retorno .= "<?php
include_once '../colossus/controller/Colossus.php';

$acao = $POST'acao'];

switch ($acao) {
    case 'inserir':
        $controllerColossus = new ControllerColossus;

        $colossusControllerInsert('$tabela', $POST'obj']);
        break;

    case 'alterar':
        $controllerColossus = new ControllerColossus;

        $colossusControllerUpdateMulti('$tabela', $POST'obj'], $POST'where']);
        break;

    case 'excluir':
        $controllerColossus = new ControllerColossus;

        $where = new stdClass;
        $id = $POST'id'];

        $colossusControllerDelete('$tabela', $where);
        break;
}";
        return $retorno;
    }

    public function selectWhereAllData($table, $columns, $mes, $ano, $where) {
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $sql = 'SELECT ' . $colunas . ' FROM ' . $table . ' WHERE MONTH(' . $where . ') = ' . $mes . ' AND YEAR(' . $where . ') = ' . $ano . '';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectWhereAllTables($table1, $table2, $columns, $where) {
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $j = 0;
        $parametro = '';
        foreach ($where as $key => $value) {
            if ($j == 1) {
                $parametro .= ' AND ' . $table1 . '.' . $key . ' = ' . $table2 . '.' . $value;
            } else {
                $parametro .= $table1 . '.' . $key . ' = :' . $key;
                $j = 1;
            }
        }
        $sql = 'SELECT ' . $colunas . ' FROM ' . $table1 . ',' . $table2 . ' WHERE ' . $parametro . '';
        $j = 0;
        $stmt = $this->conn->prepare($sql);
        foreach ($where as $key => $value) {
            if ($j == 0) {
                $stmt->bindValue(':' . $key, $value);
                $j = 1;
            }
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectWhereAllDataTables($table1, $table2, $columns, $mes, $ano, $data, $where) {
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $j = 0;
        $parametro = '';
        foreach ($where as $key => $value) {
            if ($j == 1) {
                $parametro .= ' AND ' . $table1 . '.' . $key . ' = ' . $table2 . '.' . $value;
            } else {
                $parametro .= ' AND ' . $table1 . '.' . $key . ' = :' . $key;
                $j = 1;
            }
        }
        $sql = 'SELECT ' . $colunas . ' FROM ' . $table1 . ',' . $table2 . ' WHERE
                MONTH(' . $table2 . '.' . $data . ') = ' . $mes . ' AND 
                YEAR(' . $table2 . '.' . $data . ') = ' . $ano . ' ' . $parametro . '';
        $stmt = $this->conn->prepare($sql);
        $j = 0;
        foreach ($where as $key => $value) {
            if ($j == 0) {
                $stmt->bindValue(':' . $key, $value);
                $j = 1;
            }
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectWhereJoinAll($table, $columns, $join, $where, $order, $limit) {
        if ($order == '0') {
            $ordem = '';
        } else {
            $ordem = 'ORDER BY ' . $order;
        }
        if ($limit == '0') {
            $limite = '';
        } else {
            $limite = 'LIMIT ' . $limit;
        }
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $j = 0;
        $parametro = '';
        foreach ($where as $key => $value) {
            if ($j == 1) {
                $parametro .= ' AND ' . $key . ' = :' . $key;
            } else {
                $parametro .= $key . ' = :' . $key;
                $j = 1;
            }
        }
        $j = 0;
        $inner = '';
        foreach ($join as $key => $value) {
            $inner .= ' INNER JOIN ' . $key . ' ON ' . $value;
        }
        $sql = 'SELECT ' . $colunas . ' FROM ' . $table . ' ' . $inner . '  WHERE ' . $parametro . ' ' . $ordem . ' ' . $limite . '';
        $stmt = $this->conn->prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectWhereJoinAllData($table, $columns, $join, $where, $order, $limit) {
        if ($order == '0') {
            $ordem = '';
        } else {
            $ordem = 'ORDER BY ' . $order;
        }
        if ($limit == '0') {
            $limite = '';
        } else {
            $limite = 'LIMIT ' . $limit;
        }
        if ($columns == '*') {
            $colunas = '*';
        } else {
            $j = 0;
            $colunas = '';
            foreach ($columns as $key => $value) {
                if ($j == 1) {
                    $colunas .= ' ,' . $key;
                } else {
                    $colunas .= $key;
                    $j = 1;
                }
            }
        }
        $j = 0;
        $parametro = '';
        foreach ($where as $key => $value) {
            if ($j == 1) {
                $parametro .= ' AND ' . $key . 'da <= :' . $key;
            } else {
                $parametro .= $key . ' >= :' . $key;
                $j = 1;
            }
        }
        $j = 0;
        $inner = '';
        foreach ($join as $key => $value) {
            $inner .= ' INNER JOIN ' . $key . ' ON ' . $value;
        }
        $sql = 'SELECT ' . $colunas . ' FROM ' . $table . ' ' . $inner . '  WHERE ' . $parametro . ' ' . $ordem . ' ' . $limite . '';
        $stmt = $this->conn->prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function autoCompleteDinamicoUsuario($usuario) {
        $sql = 'SELECT * FROM mesa WHERE numero_mesa like "%' . $usuario->conteudo . '%" LIMIT 5';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}