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
        Documentação
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12 div-add-favoritos">
              <button type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#documentacao"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
            </div>
          </div>
          <table id="cotacao" class="table table-striped table-bordered table-responsive"  cellspacing="0">
          <thead>
              <tr class="table-header">
                  <th>Nome</th>
                  <th>Tipo</th>
                  <th>Anexo</th>

              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
              </tr>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
              </tr>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="documentacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-size">
          <div class="modal-content modal-automotiva">
              <div class="modal-header modal-automotiva-header">
                  <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <center><h4 class="modal-title" id="myModalLabel">Nova Documentação</h4></center>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-xs-12 campos-login">
                          <section class="modal-camps">
                            <div class="row form-group">
                              <div class="col-xs-12">
                                <label>Nome</label>
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col-xs-12 col-md-6">
                                <label>Tipo</label>
                                <select class="form-control" name="">
                                  <option value="option">Documentos</option>
                                  <option value="option">Documentos</option>
                                  <option value="option">Documentos</option>
                                </select>
                              </div>
                              <div class="col-xs-12 col-md-6">
                                <label for="">Anexo</label>
                                <input type="file" class="form-control" name="name" value="">
                              </div>

                            </div>
                          </section>
                          <section class="modal-camps text-right">
                            <button type="submit" class="btn btn-default forms-spaces" data-dismiss="modal" aria-label="Close">Cancelar</button>
                              <button type="submit" class="btn btn-primary forms-spaces"data-dismiss="modal" aria-label="Close">Cadastrar Documento</button>
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
