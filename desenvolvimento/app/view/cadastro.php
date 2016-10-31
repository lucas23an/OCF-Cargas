<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../assets/css/login.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../assets/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../assets/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="../../assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="../../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../../assets/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8 modal-login">
            <form class="" action="index.html" method="post">
              <div class="row row-btn">
                <div class="col-xs-6 no-padding">
                  <button type="button" class="btn btn-login-cadastro login" name="button">Login</button>
                </div>
                <div class="col-xs-6 no-padding">
                    <button type="button" class="btn btn-login-cadastro cadastrar" name="button">Cadastrar</button>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-md-12 form-group">
                  <div class="funkyradio space-radio">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="funkyradio-success">
                            <input type="radio"  name="remetente" id="radio4" />
                            <label for="radio4">Empresa</label>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="funkyradio-success">
                            <input type="radio" name="destinatario" id="radio5" />
                            <label for="radio5">Transportadora</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                <div class="row form-group">
                  <div class="col-lg-6">
                      <label>Usuário</label>
                      <input name="complemento" type="text" class="form-control">
                  </div>
                  <div class="col-lg-6">
                      <label>Senha</label>
                      <input name="complemento" type="password" class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-lg-12">
                      <label>Email</label>
                      <input name="complemento" type="text" class="form-control">
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

              <div class="row">
                <div class="col-xs-12 text-center">

                  <button type="button" class="btn btn-primary btn-login" name="button">Cadastrar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-2"></div>
      </div>

    </div>
  </body>
</html>
