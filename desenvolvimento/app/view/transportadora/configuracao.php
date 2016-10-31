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
            <?php include_once "menuTransportadora.php" ?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1 class="header-title">
                        Configurações
                    </h1>
                </section>

                <section class="content">

                    <div class="row">
                        <div class="col-lg-12">
                            <form>
                                <fieldset class="forms-spaces">
                                    <legend class="reference-padding">
                                        Dados da Conta
                                    </legend>
                                    <div class="row">
                                      <div class="col-xs-12 col-md-4 form-group">
                                        <label for="">Nome</label>
                                        <input type="text" name="name" class="form-control" value="Lorem Ipsum">
                                      </div>
                                      <div class="col-xs-12 col-md-4 form-group">
                                        <label for="">Senha</label>
                                        <input type="password" name="name" class="form-control" value="*********">
                                      </div>
                                      <div class="col-xs-12 col-md-4 form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="name" class="form-control" value="loremipsum@lorem.com">
                                      </div>
                                    </div>
                                      <div class="row form-group">
                                        <div class="col-lg-6 ">
                                            <label>CNPJ</label>
                                            <input type="text" class="form-control" value="999.999.999-99">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Razão Social</label>
                                            <input type="text" class="form-control" value="Lorem Ipsum">
                                        </div>
                                      </div>

                                      <div class="row form-group">
                                        <div class="col-lg-3">
                                            <label>CEP</label>
                                            <input type="text" class="form-control" value="75000-000">
                                        </div>
                                        <div class="col-lg-2">
                                            <label>UF</label>
                                            <select class="form-control">
                                                <option></option>
                                                <option selected="">GO</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Cidade</label>
                                            <select class="form-control">
                                                <option></option>
                                                <option selected="">Anápolis</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Setor</label>
                                            <input type="text" class="form-control" value="Lorem Ipsum">
                                        </div>
                                        <div class="col-lg-1">
                                            <label>Nº</label>
                                            <input type="text" class="form-control" value="2">
                                        </div>
                                      </div>

                                      <div class="row form-group">
                                        <div class="col-lg-5">
                                            <label>Complemento</label>
                                            <input type="text" class="form-control" value="Lorem Ipsum">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Fone</label>
                                            <input type="text" class="form-control" value="(99) 9999-9999">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Contato</label>
                                            <input type="text" class="form-control">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-12 form-div-btn--save">
                                            <button type="submit" class="btn btn-primary">Salvar Configurações</button>
                                        </div>
                                      </div>
                                </fieldset>
                            </form>
                        </div>
                      </div>

                </section>
            </div>
            <div class="modal fade" id="referencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-size">
                    <div class="modal-content modal-automotiva">
                        <div class="modal-header modal-automotiva-header">
                            <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <center><h4 class="modal-title" id="myModalLabel">Referência</h4></center>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 campos-login">

                                    <div class="col-lg-12">
                                        <label>Busque por: </label>
                                        <table class="table"><tr>
                                                <td><input type="radio" name="busca"> CNPJ</td>
                                                <td><input type="radio" name="busca"> Rasão Social</td>
                                            </tr></table>
                                    </div>
                                    <section class="modal-camps">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                            <select class="form-control">
                                                <option></option>
                                                <option>Geo</option>
                                                <option>Neo</option>
                                            </select>
                                        </div>
                                    </section>
                                    <br><br>
                                    <section class="modal-camps text-right">
                                        <button type="submit" style="margin-bottom: 0;margin-top: -15px" class="btn btn-primary"data-dismiss="modal" aria-label="Close">OK</button>
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
                                <div class="col-xs-12 campos-login">
                                    <section class="modal-camps">
                                      <div class="row form-group">
                                        <div class="col-xs-12">
                                          <label>Quantidade</label>
                                          <input type="text" class="form-control">
                                        </div>
                                      </div>
                                      <div class="row form-group">
                                        <div class="col-xs-12 col-md-4">
                                          <label>Altura</label>
                                          <input type="text" class="form-control">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                          <label>Largura</label>
                                          <input type="text" class="form-control">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                          <label>Comprimento</label>
                                          <input type="text" class="form-control">
                                        </div>
                                      </div>

                                    </section>

                                    <section class="modal-camps text-right">
                                      <button type="submit" class="btn btn-default"data-dismiss="modal" aria-label="Close">Cancelar</button>
                                        <button type="submit" class="btn btn-primary"data-dismiss="modal" aria-label="Close">Calcular Dimensões</button>
                                    </section>
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
