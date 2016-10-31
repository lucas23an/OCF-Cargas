<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>OCF Cargas</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../assets/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../../../assets/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="../../../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../../assets/css/dataTables.bootstrap.css">
        <link rel="stylesheet" href="../../../assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../../../assets/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="../../../assets/plugins/morris/morris.css">
        <link rel="stylesheet" href="../../../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="../../../assets/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="../../../assets/plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../../../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header ">
                <a href="index2.html" class="logo">
                    <span class="logo-mini nav-color"><b><img class="logo-img-small" src="../../../assets/img/logo1.png" alt="" /></span>
                    <span class="logo-lg nav-color"><img class="logo-img-small" src="../../../assets/img/logo1.png" alt="" /></span>
                </a>
                <nav class="navbar navbar-static-top nav-color">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav"></ul>
                    </div>
                </nav>
            </header>
            <?php include_once "menuEmpresa.php" ?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1 class="header-title">
                        Nova Remessa
                    </h1>
                </section>

                <section class="content">
                  <form class="" action="index.html" method="post">


                    <div class="row">
                        <div class="col-lg-12">
                            <form>
                                <fieldset class="forms-spaces">
                                    <legend class="legend-space">
                                        Tipo de Perfil
                                    </legend>
                                    <div class="funkyradio space-radio">
                                      <div class="row">
                                        <div class="col-xs-6">
                                          <div class="funkyradio-success">
                                              <input type="radio"  name="remetente" id="radio3" />
                                              <label for="radio3">Remetente</label>
                                          </div>
                                        </div>
                                        <div class="col-xs-6">
                                          <div class="funkyradio-success">
                                              <input type="radio" name="destinatario" id="radio4" />
                                              <label for="radio4">Destinatário</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </fieldset>

                                <fieldset class="forms-spaces">
                                    <legend class="reference-padding">
                                        Dados Remetente
                                    </legend>
                                    <div class="row form-group">
                                      <div class="col-xs-12">
                                           <button type="button" data-toggle="modal" data-target="#referencia" class="btn btn-primary">Buscar Referencias</button>
                                      </div>
                                    </div>
                                      <div class="row form-group">
                                        <div class="col-lg-4 col-xs-12 ">
                                            <label>CNPJ</label>
                                            <input type="text" name="cnpj" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-xs-12 ">
                                            <label>Nome Fantasia</label>
                                            <input type="text" name="nomefantasia" class="form-control">
                                        </div>

                                        <div class="col-lg-4 col-xs-12">
                                            <label>Razão Social</label>
                                            <input type="text" name="razaosocial" class="form-control">
                                        </div>
                                      </div>

                                      <div class="row form-group">
                                        <div class="col-lg-3 col-xs-12">
                                            <label>CEP</label>
                                            <input type="text" name="cep" class="form-control">
                                        </div>
                                        <div class="col-lg-2 col-xs-12">
                                            <label>UF</label>
                                            <select name="uf" class="form-control">
                                                <option></option>
                                                <option>GO</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-xs-12">
                                            <label>Cidade</label>
                                            <select name="cidade" class="form-control">
                                                <option></option>
                                                <option>Anápolis</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Setor</label>
                                            <input name="setor" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-1">
                                            <label>Nº</label>
                                            <input name="numero" type="text" class="form-control">
                                        </div>
                                      </div>

                                      <div class="row form-group">
                                        <div class="col-lg-5">
                                            <label>Complemento</label>
                                            <input name="complemento" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Fone</label>
                                            <input name="telefone" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Contato</label>
                                            <input name="contato" type="text" class="form-control">
                                        </div>
                                      </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="col-lg-12">

                                <fieldset class="forms-spaces">
                                    <legend>
                                        Detalhes da Carga
                                    </legend>
                                    <div class="row form-group">
                                        <div class="col-lg-4">
                                            <label>Valor NF</label>
                                            <input name="valornf" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Data de Liberação da Coleta</label>
                                            <input name="dataliberacao" type="date" class="form-control">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Horário de Coleta</label>
                                            <input name="horariocoleta" type="time" class="form-control" >
                                        </div>

                                    </div>
                                    <div class="row form-group">
                                      <div class="col-lg-6 col-xs-12">
                                          <label>Peso Bruto</label>
                                          <input name="pesobruto" type="text" class="form-control">
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                          <label>Dimensões
                                          </label>
                                          <a class="btn btn-primary form-control" data-toggle="modal" data-target="#dimensoes">Calcular Dimensões</a>
                                      </div>

                                    </div>
                                    <div class="checkbox right">
                                      <label><input name="menorlance" type="checkbox" value="">Mostrar Menor Lance</label>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12 form-div-btn--save">
                                          <button type="submit" class="btn btn-primary">Cadastrar Remessa</button>
                                      </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                                      </form>
                </section>
            </div>
            <div class="modal fade" id="referencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-size">
                    <div class="modal-content modal-automotiva">
                        <div class="modal-header modal-automotiva-header">
                            <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <center><h4 class="modal-title" id="myModalLabel">Buscar Referências</h4></center>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 campos-login">
                                  <form class="" action="index.html" method="post">

                                    <div class="col-lg-12">
                                        <h4 class="no-margin-bottom">Buscar por: </h4>
                                        <div class="funkyradio space-radio">
                                          <div class="row">
                                            <div class="col-xs-6">
                                              <div class="funkyradio-success">
                                                  <input type="radio" name="cnpjbusca" id="radio5" />
                                                  <label for="radio5">CNPJ</label>
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="funkyradio-success">
                                                  <input type="radio" name="razaobusca" id="radio6" />
                                                  <label for="radio6">Razão Social</label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <section class="modal-camps col-xs-12">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                            <select class="form-control" name="busca">
                                                <option></option>
                                                <option>Geo</option>
                                                <option>Neo</option>
                                            </select>
                                        </div>
                                    </section>
                                    <br><br>
                                    <section class="modal-camps text-right modal-lance-btn">
                                      <button  type="submit" class="btn btn-default" data-dismiss="modal" aria-label="Close">Fechar</button>
                                        <button type="submit" class="btn btn-primary"data-dismiss="modal" aria-label="Close">Buscar Referências</button>
                                                      </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="dimensoes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-size">
                    <div class="modal-content modal-automotiva">
                        <div class="modal-header modal-automotiva-header">
                            <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <center><h4 class="modal-title" id="myModalLabel">Dimensões</h4></center>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                              <form class="" action="index.html" method="post">


                                <div class="col-xs-12 campos-login">
                                    <section class="modal-camps">
                                      <div class="row form-group">
                                        <div class="col-xs-12 col-lg-6">
                                          <label>Quantidade</label>
                                          <input type="text" name="quantidade" class="form-control">
                                        </div>
                                        <div class="col-lg-12 col-xs-6">
                                            <label>Tipos de Material</label>
                                            <select class="form-control" name="tipomaterial">
                                              <option value="option">Lorem Ipsum</option>
                                            </select>
                                        </div>
                                      </div>

                                      <div class="row form-group">
                                        <div class="col-xs-12 col-md-4">
                                          <label>Altura</label>
                                          <input type="text" name="altura" class="form-control">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                          <label>Largura</label>
                                          <input type="text" name="largura" class="form-control">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                          <label>Comprimento</label>
                                          <input type="text" name="comprimento" class="form-control">
                                        </div>
                                      </div>

                                    </section>

                                    <section class="modal-camps text-right">
                                      <button type="submit" class="btn btn-default"data-dismiss="modal" aria-label="Close">Cancelar</button>
                                        <button type="submit" class="btn btn-primary"data-dismiss="modal" aria-label="Close">Calcular Dimensões</button>
                                    </section>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include_once "../footer.php"; ?>
            <script>
                $(document).ready(function() {
                    $('#cotacao').dataTable({
                        responsive: true,
                        "order": [[ 0, "asc" ]]
                    });
                });
            </script>
    </body>
</html>
