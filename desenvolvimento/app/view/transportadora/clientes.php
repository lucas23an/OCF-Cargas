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

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">OCF Cargas</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once "menuTransportadora.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="header-title">
        Clientes Favoritos
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12 div-add-favoritos">
              <button type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#cliente"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
            </div>
          </div>
          <table id="cotacao" class="table table-striped table-bordered table-responsive"  cellspacing="0">
          <thead>
              <tr class="table-header">
                  <th>Empresa</th>
                  <th>CNPJ</th>
                  <th>Segmento</th>
                  <th>Telefone</th>
                  <th>Contato</th>
                  <th>Ação</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>
                    <a title="Dados da remessa" href="../empresa/remessa.php" class="btn btn-primary">Visualizar</a>
                  </td>
              </tr>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>
                    <button title="Dados da remessa" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Visualizar</button>
                  </td>
              </tr>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td width="10%">
                    <button title="Dados da remessa" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Visualizar</button>
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-size">
          <div class="modal-content modal-automotiva">
              <div class="modal-header modal-automotiva-header">
                  <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <center><h4 class="modal-title" id="myModalLabel">Adicionar Empresa</h4></center>
              </div>
              <div class="modal-body">
                  <div class="row">

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 campos-login">
                          <div class="row">


                          <div class="col-lg-12">
                            <fieldset class="forms-spaces">
                                <legend class="legend-space">
                                    Buscar por:
                                </legend>
                                <div class="funkyradio space-radio">
                                  <div class="row">
                                    <div class="col-xs-6">
                                      <div class="funkyradio-success">
                                          <input type="radio" name="radio" id="radio3" />
                                          <label for="radio3">CNPJ</label>
                                      </div>
                                    </div>
                                    <div class="col-xs-6">
                                      <div class="funkyradio-success">
                                          <input type="radio" name="radio" id="radio4" />
                                          <label for="radio4">Razão Social</label>
                                      </div>
                                    </div>
                                  </div>
                            </fieldset>
                          </div>
                            </div>
                          <section class="">
                            <div class="row">
                              <div class="col-xs-12">
                                <fieldset>
                                <legend class="legend-space">
                                    Selecione..
                                </legend>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <select class="form-control">
                                        <option></option>
                                        <option>Geo</option>
                                        <option>Neo</option>
                                    </select>
                                </div>
                                </fieldset>
                              </div>
                            </div>

                          </section>
                          <br><br>
                          <section class="modal-camps text-right">
                            <button type="submit" style="margin-bottom: 0;margin-top: -15px" class="btn btn-default"data-dismiss="modal" aria-label="Close">Fechar</button>
                            <button type="submit" style="margin-bottom: 0;margin-top: -15px" class="btn btn-primary"data-dismiss="modal" aria-label="Close">Adicionar</button>
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
