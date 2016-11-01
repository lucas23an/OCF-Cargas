function rota(rota){
    var dados = '&rota=' + rota;
    $.ajax({
        url: 'colossus/config/Colossus.php',
        type: 'post',
        data: dados,
        beforeSend: function(){
            $('#conteudo').remove();
            $('#rota').append('<div id="conteudo"></div>');
            $("#conteudo").css({
                "background":"url(colossus/img/LoaderIcon.gif) no-repeat 50%",
                "width":"248px",
                "height":"248px",
                "margin":"0 auto",
                "display":"table",
                "margin-top":"100px"
            });
        },
        success: function(resp){
            $('#conteudo').remove();
            $('#rota').append('<div id="conteudo"></div>');

            $('#conteudo').html(resp);
        },
        error: function(resp){
            $('#mensagem').html('" Erro ao carragar os dados! "').addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}

function login(local,form){
    var dados = $(form).serialize();
    $.ajax({
        url: 'app/colossus/config/' + local + '.php',
        type: 'post',
        dataType: 'html',
        data: dados,
        success: function(resp){
            if(resp == 'incorreto'){
                $('#mensagem').html('Login ou senha incorreto!').css({
                    'color' : 'red'
                });
            } else if(resp == 'inativo'){
                $('#mensagem').html('Você está inativo!').css({
                    'color' : 'red'
                });
            } else {
                $('#mensagem').html('Você será redirecionado...').css({
                    'color' : 'green'
                });
                window.location.href = 'app/';
            }
        },
        error: function(resp){
            $('#mensagem').html('Login ou senha incorreto!').css({
                'color' : 'red'
            });
        }
    });
}

function recover(local,form){
    $('#aguarde').html(' Aguarde! ');
    var dados = $(form).serialize();
    $.ajax({
        url: 'app/colossus/config/' + local + '.php',
        type: 'post',
        dataType: 'html',
        data: dados,
        success: function(resp){
            $('#aguarde').remove();
            $('#mensagemRecover').html(resp);
        },
        error: function(resp){
            $('#mensagemRecover').html(' Usuário não encontrado!').css({
                'color' : 'red'
            });
        }
    });
}

function formAjax(local,form){
    var dados = $(form).serialize();
    $.ajax({
        url: 'action/' + local + '.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            rota('');
            $('#mensagem').html(resp.msg).addClass('mensagem sucesso').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        },
        error: function(resp){
            console.log(resp);
            $('#mensagem').html(resp.msg).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}

function formMomentoAjax(local,form){
    var dados = $(form).serialize();
    $.ajax({
        url: 'action/' + local + '.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            $('#mensagem').html(resp.msg).addClass('mensagem sucesso').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        },
        error: function(resp){
            $('#mensagem').html(resp.msg).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}

function deleteAjax(local,acao,id){
    var confirmar = confirm("Deseja realmente excluir?");
    if(confirmar) {
        var dados = '&acao=' + acao + '&id=' + id;
        $.ajax({
            url: 'action/' + local + '.php',
            type: 'post',
            dataType: 'json',
            data: dados,
            success: function(resp){
                $('#alterar').modal('hide');
                rota('');
                $('#mensagem').html(resp.msg).addClass('mensagem sucesso').fadeTo(3000, 500).slideUp(500, function () {
                    $(this).find("#mensagem").alert('close');
                });
            },
            error: function(resp){
                $('#mensagem').html(resp.msg).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                    $(this).find("#mensagem").alert('close');
                });
            }
        });
    }
}


function deleteProdutoAjax(local,acao,id,id_cobranca){
    var confirmar = confirm("Deseja realmente excluir?");
    if(confirmar) {
        var dados = '&acao=' + acao + '&id=' + id;
        $.ajax({
            url: 'action/' + local + '.php',
            type: 'post',
            dataType: 'json',
            data: dados,
            success: function(resp){
                listarMomentoProduto(id_cobranca);
                $('#mensagem').html(resp.msg).addClass('mensagem sucesso').fadeTo(3000, 500).slideUp(500, function () {
                    $(this).find("#mensagem").alert('close');
                });
            },
            error: function(resp){
                $('#mensagem').html(resp.msg).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                    $(this).find("#mensagem").alert('close');
                });
            }
        });
    }
}

function listarAjax(local,id){
    var dados = '&acao=listar' + '&id=' + id;
    $.ajax({
        url: 'action/' + local + '.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            $('#tudo').remove();
            $('#tudoTudo').append('<div id="tudo"></div>');
            resp.forEach(function(obj) {
                if(obj.data_vistoria != null) {
                    obj.data_vistoria = convertDate(obj.data_vistoria);
                }else{
                    obj.data_vistoria = '';
                }
                if(obj.data_fechamento != null) {
                    obj.data_fechamento = convertDate(obj.data_fechamento);
                }else{
                    obj.data_fechamento = '';
                }
                if(obj.relogio_anterior == null) {
                    obj.relogio_anterior = '';
                }
                if(obj.relogio_atual == null) {
                    obj.relogio_atual = '';
                }
                if(obj.valor_cobranca == null) {
                    obj.valor_cobranca = '';
                }
                if(obj.valor_pago == null) {
                    obj.valor_pago = '';
                }
                if(obj.recibo_cobranca == null) {
                    obj.recibo_cobranca = '';
                }
                if(obj.debito_anterior == null) {
                    obj.debito_anterior = '';
                }
                if(obj.desconto_cobranca == null) {
                    obj.desconto_cobranca = '';
                }
                if(obj.acrescimo_cobranca == null) {
                    obj.acrescimo_cobranca = '';
                }
                if(obj.observacao_cobranca == null) {
                    obj.observacao_cobranca = '';
                }
                var total = obj.relogio_atual - obj.relogio_anterior;
                var as = '"';
                $("#tudo").append("<div class='modal modal-primary' id='alterarTudo"+obj.id_cobranca+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"+
                    "<div class='modal-dialog' style='max-width: 600px'><div class='modal-content row'><div class='modal-header'>"+
                    "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>"+
                    "<h4 class='modal-title' id='myModalLabel'>Cobrança da Locação "+obj.id_locacao+" com a Mesa "+obj.numero_mesa+"</h4></div>"+
                    "<form id='form-alterar"+obj.id_cobranca+"' method='post'>"+
                    "<input type='hidden' name='acao' value='alterar'>"+
                    "<input type='hidden' name='where[id_cobranca]' value='"+obj.id_cobranca+"'>"+
                    "<input type='hidden' name='obj[status_cobranca]' value='2'>"+
                    "<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>"+
                    "<label>Data Vistoria<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[data_vistoria]' value='"+obj.data_vistoria+"' type='text' maxlength='10' placeholder='dd/mm/aaaa' class='form-control trigger-date' data-date-format='dd/mm/yyyy'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>"+
                    "<label>Data Fechamento<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[data_fechamento]' value='"+obj.data_fechamento+"' type='text' maxlength='10' placeholder='dd/mm/aaaa' class='form-control trigger-date' data-date-format='dd/mm/yyyy'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>"+
                    "<label>Recibo<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[recibo_cobranca]' value='"+obj.recibo_cobranca+"' type='text' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>"+
                    "<label>Relogio Anterior<span class='obrig-nao'>*</span></label>"+
                    "<input id='relogio_anterior"+obj.id_cobranca+"' onblur='calcular("+obj.id_cobranca+","+obj.preco_ficha+")' name='obj[relogio_anterior]' value='"+obj.relogio_anterior+"' type='number' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>"+
                    "<label>Relogio Atual<span class='obrig-nao'>*</span></label>"+
                    "<input id='relogio_atual"+obj.id_cobranca+"' onblur='calcular("+obj.id_cobranca+","+obj.preco_ficha+")' name='obj[relogio_atual]' value='"+obj.relogio_atual+"' type='number' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>"+
                    "<label>Total Jogado<span class='obrig-nao'>*</span></label>"+
                    "<input id='totalJogado"+obj.id_cobranca+"' value='"+total+"' type='text' class='form-control' disabled/>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>"+
                    "<label>Preç.Ficha<span class='obrig-nao'>*</span></label>"+
                    "<input id='preco_ficha"+obj.id_cobranca+"' disabled name='locacao[preco_ficha]' value='"+obj.preco_ficha+"' type='text' class='form-control' maxlength='15' onkeydown='Mascara(this,Valor);' onkeypress='Mascara(this,Valor);' onkeyup='Mascara(this,Valor);'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>"+
                    "<label>Deb.Anterior<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[debito_anterior]' value='"+obj.debito_anterior+"' type='text' class='form-control' maxlength='15' onkeydown='Mascara(this,Valor);' onkeypress='Mascara(this,Valor);' onkeyup='Mascara(this,Valor);'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>"+
                    "<label>Valor<span class='obrig-nao'>*</span></label>"+
                    "<input id='valor_cobranca"+obj.id_cobranca+"' name='obj[valor_cobranca]' value='"+obj.valor_cobranca+"' type='text' class='form-control' maxlength='15' onkeydown='Mascara(this,Valor);' onkeypress='Mascara(this,Valor);' onkeyup='Mascara(this,Valor);'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>"+
                    "<label>Desconto<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[desconto_cobranca]' value='' type='text' class='form-control' maxlength='15' onkeydown='Mascara(this,Valor);' onkeypress='Mascara(this,Valor);' onkeyup='Mascara(this,Valor);'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>"+
                    "<label>Acrescimo<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[acrescimo_cobranca]' value='' type='text' class='form-control' maxlength='15' onkeydown='Mascara(this,Valor);' onkeypress='Mascara(this,Valor);' onkeyup='Mascara(this,Valor);'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>"+
                    "<label>Valor Pago<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[valor_pago]' value='' type='text' class='form-control' maxlength='15' onkeydown='Mascara(this,Valor);' onkeypress='Mascara(this,Valor);' onkeyup='Mascara(this,Valor);'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>"+
                    "<label>Observação<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[observacao_cobranca]' value='"+obj.observacao_cobranca+"' type='text' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'><br>"+
                    "<div id='divproduto"+obj.id_cobranca+"'><div id='produto"+obj.id_cobranca+"'></div></div>"+
                    "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 div-input-modal'>"+
                    "<label>Produto <span class='obrig'>*</span></label>"+
                    "<input type='button' class='btn btn-padrao' value='+' onclick='addNew"+obj.id_cobranca+"(new Date().getTime());'><br><br>"+
                    "<table class='col-xs-12 col-sm-12 col-md-12 col-lg-12' id='multi"+obj.id_cobranca+"'></table>"+
                    "</div>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>"+
                    "<div style='text-align: right' class='right'><input type='submit' class='btn btn-padrao' value='Salvar'></div>"+
                    "</div>"+
                    "</form>"+
                    "</div></div></div>"+
                    "<script>$('#form-alterar"+obj.id_cobranca+"').submit(function (e) {"+
                    "e.preventDefault();$('#alterarTudo"+obj.id_cobranca+"').modal('hide');"+
                    "formMomentoAjax('Cobranca','#form-alterar"+obj.id_cobranca+"');});"+
                    "$('.trigger-date').datepicker();"+
                    "function addNew"+obj.id_cobranca+"(time) {"+
                    "$('#multi"+obj.id_cobranca+"').append("+as+"<tr id='multi"+as+"+ time + "+as+"'>"+
                    "<td width='70%'><div id='produtoNovo"+as+"+ time + "+as+"'></div>"+
                    "</td><td width='30%'><input placeholder='quantidade' type='number' name='produtoNew[quantidade_produto][]' class='form-control' required>"+
                    "</td><td style='width: 35px;'><button type='button' class='btn btn-padrao-danger' onclick='tiraNew"+obj.id_cobranca+"("+as+"+ time + "+as+");'><i class='fa fa-minus' aria-hidden='true'></i></button>"+
                    "</td></tr>"+as+");"+
                    "listarMomentoProdutoNovo(time);}"+
                    "function tiraNew"+obj.id_cobranca+"(time) {"+
                    "document.getElementById('multi'+ time +'').remove();"+
                    "}function calcular(id,preco){"+
                    "var valor1 = document.getElementById('relogio_anterior'+id+'').value;"+
                    "var valor2 = document.getElementById('relogio_atual'+id+'').value;"+
                    "document.getElementById('totalJogado'+id+'').value = valor2 - valor1;"+
                    "document.getElementById('valor_cobranca'+id+'').value = Math.round(((valor2 - valor1) * preco) * 100) / 100;"+
                    "}"+
                    "</script>");

                listarMomentoProduto(obj.id_cobranca);

                $('#alterarTudo'+obj.id_cobranca+'').modal('show');
            })
        },
        error: function(resp){
            $('#mensagem').html(resp).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}
function listarMomentoProdutoNovo(id){
    $.ajax({
        url: 'action/Produto.php',
        type: 'post',
        dataType: 'json',
        data: '&acao=listarTudo',
        success: function(res){

            var tudo = '';

            tudo += "<select name='produtoNew[fk_id_produto][]' class='form-control' required><option value=''></option>";

            res.forEach(function(obje) {
                tudo += "<option value='" + obje.id_produto + "'>" + obje.nome_produto + "</option>";
            });

            tudo += "</select>";

            $("#produtoNovo"+id+"").append(tudo);
        }
    });
}
function listarMomentoProduto(id){
    $.ajax({
        url: 'action/Cobranca.php',
        type: 'post',
        dataType: 'json',
        data: '&acao=listarCobrancaProduto' + '&id=' + id,
        success: function(res){
            $("#produto"+id+"").remove();
            $("#divproduto"+id+"").append("<div id='produto"+id+"'></div>");
            res.forEach(function(obje) {
                var aspas = "<button onclick=";
                aspas += '"';
                aspas += "deleteProdutoAjax('Cobranca','excluirproduto'," + obje.id_cobranca_produto + "," + id + ");";
                aspas += '"';
                aspas += " title='Excluir' type='button' class='btn btn-padrao-danger'>";

                $("#produto"+id+"").append("<table style='width: 100%'>"+
                    "<tr><td style='width: 50%;'>"+
                    "<input type='hidden' name='whereProduto[id_cobranca_produto][]' value='" + obje.id_cobranca_produto + "'/>"+
                    "<select name='produto[fk_id_produto][]'class='form-control' required>"+
                    "<option value='" + obje.id_produto + "'>" + obje.nome_produto + "</option></select></td>"+
                    "<td style='width: 40%;'><input type='text' value='" + obje.quantidade_produto + "' name='produto[quantidade_produto][]' class='form-control'></td>"+
                    "<td style='width: 10%;'>" + aspas + "<i class='fa fa-times'></i></button>"+
                    "</td></tr></table>");
            });
        }
    });
}
function listarMomentoAjax(local,id){
    var dados = '&acao=listarMomento' + '&id=' + id;
    $.ajax({
        url: 'action/' + local + '.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            for(var index in resp) {
                if((index == 'data_saida')||(index == 'data_chegada')) {
                    if(resp[index] != null) {
                        resp[index] = convertDate(resp[index]);
                    }
                    $("#"+index).val(resp[index]);
                } else {
                    $("#"+index).val(resp[index]);
                }

                if(index == 'id_cobranca_momento'){
                    var fk_id_cobranca_momento = resp[index];
                }
            }
            var dados = '&acao=listarCobrancaMomentoProduto' + '&id=' + fk_id_cobranca_momento;
            $.ajax({
                url: 'action/Cobranca.php',
                type: 'post',
                dataType: 'json',
                data: dados,
                success: function(resp){
                    $('#produtoo').remove();
                    $('#produtoCobranca').append('<div id="produtoo"></div>');
                    resp.forEach(function(obj) {
                        var aspas = "<button onclick=";
                        aspas += '"';
                        aspas += "deleteAjax('Cobranca','excluirprodutomomento'," + obj.id_cobranca_momento_produto + ");";
                        aspas += '"';
                        aspas += " title='Excluir' type='button' class='btn btn-padrao-danger'>";

                        $("#produtoo").append("<table style='width: 100%'>"+
                            "<tr><td style='width: 55%'>"+
                            "<input type='hidden' name='whereProduto[id_cobranca_momento_produto][]' value='" + obj.id_cobranca_momento_produto + "'/>"+
                            "<select name='produto[fk_id_produto][]'class='form-control' required>"+
                            "<option value='" + obj.id_produto + "'>" + obj.nome_produto + "</option></select>"+
                            "</td><td style='width: 40%'>"+
                            "<input type='number' value='" + obj.quantidade_produto + "' name='produto[quantidade_produto][]' class='form-control'></td>"+
                            "<td style='width: 5%'>" + aspas + "<i class='fa fa-times'></i>"+
                            "</button>"+
                            "</td></tr></table>");
                    });
                },
                error: function(resp){
                    $('#mensagem').html(resp).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                        $(this).find("#mensagem").alert('close');
                    });
                }
            });
        },
        error: function(resp){
            $('#mensagem').html(resp).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}
function listarLocacaoAjax(local,id){
    var dados = '&acao=listarLocacao' + '&id=' + id;
    $.ajax({
        url: 'action/' + local + '.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            resp.forEach(function(obj) {                        
                //document.getElementById('debAnterior').value = obj.debito_anterior;
                document.getElementById('relogioAnterior').value = obj.relogio_atual;
                document.getElementById('precoFicha').value = obj.preco_ficha;
            });
        },
        error: function(resp){
            $('#mensagem').html(resp).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}
function listarClienteAjax(local,id){
    var dados = '&acao=listar' + '&id=' + id;
    $.ajax({
        url: 'action/' + local + '.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            $('#tudo').remove();
            $('#tudoTudo').append('<div id="tudo"></div>');
            resp.forEach(function(obj) {
                var as = '"';
                $("#tudo").append("<div class='modal modal-primary' id='alterarTudo"+obj.id_cliente+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"+
                    "<div class='modal-dialog' style='max-width: 600px'><div class='modal-content row'><div class='modal-header'>"+
                    "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>"+
                    "<h4 class='modal-title' id='myModalLabel'>Cliente</h4></div>"+
                    "<form id='form-alterar"+obj.id_cliente+"' method='post'>"+
                    "<input type='hidden' name='acao' value='alterarCliente'>"+
                    "<input type='hidden' name='where[id_cliente]' value='"+obj.id_cliente+"'>"+
                    "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>"+
                    "<label>Nome<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[nome_cliente]' value='"+obj.nome_cliente+"' type='text' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>"+
                    "<label>Telefone<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[telefone_cliente]' value='"+obj.telefone_cliente+"' type='text' class='form-control' maxlength='15' onkeydown='Mascara(this,Telefone);' onkeypress='Mascara(this,Telefone);' onkeyup='Mascara(this,Telefone);'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>"+
                    "<label>Endereço Residencial<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[endereco_residencial]' value='"+obj.endereco_residencial+"' type='text' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>"+
                    "<label>Endereço Comercial<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[endereco_comercial]' value='"+obj.endereco_comercial+"' type='text' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>"+
                    "<label>Bairro<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[bairro_cliente]' value='"+obj.bairro_cliente+"' type='text' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>"+
                    "<label>Referência<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[referencia_cliente]' value='"+obj.referencia_cliente+"' type='text' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>"+
                    "<label>Documento<span class='obrig-nao'>*</span></label>"+
                    "<input name='obj[documento_cliente]' value='"+obj.documento_cliente+"' type='text' class='form-control'>"+
                    "</div>"+
                    "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>"+
                    "<div style='text-align: right' class='right'><input type='submit' class='btn btn-padrao' value='Salvar'></div>"+
                    "</div>"+
                    "</form>"+
                    "</div></div></div>"+
                    "<script>$('#form-alterar"+obj.id_cliente+"').submit(function (e) {"+
                    "e.preventDefault();$('#alterarTudo"+obj.id_cliente+"').modal('hide');"+
                    "formAjax('Cliente','#form-alterar"+obj.id_cliente+"');});"+
                    "$('.trigger-date').datepicker();"+
                    "function addNew"+obj.id_cliente+"(time) {"+
                    "$('#multi"+obj.id_cliente+"').append("+as+"<tr id='multi"+as+"+ time + "+as+"'>"+
                    "<td width='70%'><div id='produtoNovo"+as+"+ time + "+as+"'></div>"+
                    "</td><td width='30%'><input placeholder='quantidade' type='number' name='produtoNew[quantidade_produto][]' class='form-control' required>"+
                    "</td><td style='width: 35px;'><button type='button' class='btn btn-padrao-danger' onclick='tiraNew"+obj.id_cliente+"("+as+"+ time + "+as+");'><i class='fa fa-minus' aria-hidden='true'></i></button>"+
                    "</td></tr>"+as+");"+
                    "listarMomentoProdutoNovo(time);}"+
                    "function tiraNew"+obj.id_cliente+"(time) {"+
                    "document.getElementById('multi'+ time +'').remove();"+
                    "}</script>");

                $('#alterarTudo'+obj.id_cliente+'').modal('show');
            })
        },
        error: function(resp){
            $('#mensagem').html(resp).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}
function listarSelectAjax(){
    $('#locaa').remove();
    $('#loca').append('<div id="locaa"></div>');

    var tudo = "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>"+
    "<label>Locação <span class='obrig'>*</span></label>"+
    "<input id='Id' type='hidden' name='obj[fk_id_locacao]'>"+
    "<input id='locacaoId' class='form-control' required onkeyup='buscaDinamica(this.value);'>";
    tudo += "<div id='resultadoo'></div></div>";
    $("#locaa").append(tudo);
}
function buscaDinamica(value) {
    var dados = '&acao=dinamica' + '&conteudo=' + value;
    $.ajax({
        type: "POST",
        url: "action/Cobranca.php",
        data: dados,
        beforeSend: function(){
            $("#locacaoId").css("background","#FFF url(../assets/img/LoaderIcon.gif) no-repeat 99%");
        },
        success: function(data){
            $("#resultadoo").show();
            $("#resultadoo").html(data);
            $("#locacaoId").css("background","#FFF");
        }
    });
};
function selecionaDinamica(id,val) {
    $("#locacaoId").val(val);
    $("#Id").val(id);
    $("#resultadoo").hide();
    getRelogioAnterior(id);
    getDadosLocacao(id);
    getDebitoAnterior(id);
}

function getRelogioAnterior(locacao){
    var dados = "acao=" + "getRelogioAnterior" + "&locacao=" + locacao;
    $.ajax({
        url: 'action/Locacao.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            $("#relogioAnterior").val(resp);
        },
        error: function(resp){
            
        }
    });
}

function getDebitoAnterior(locacao){
    var dados = "acao=" + "getDebitoAnterior" + "&locacao=" + locacao;
    $.ajax({
        url: 'action/Locacao.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            $("#debAnterior").val(resp);
        },
        error: function(resp){
            
        }
    });
}

function getDadosLocacao(locacao){
    var dados = "acao=" + "getDadosLocacao" + "&locacao=" + locacao;
    $.ajax({
        url: 'action/Locacao.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            $("#precoFicha").val(resp.preco_ficha);
        },
        error: function(resp){
            
        }
    });
}

function listarAllAjax(local,funcao){
    var dados = '&' + funcao + '=';
    $.ajax({
        url: 'action/' + local + '.php',
        type: 'post',
        dataType: 'html',
        data: dados,
        success: function(resp){
            rota('');
            $('#mensagem').html(resp).addClass('mensagem sucesso').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        },
        error: function(resp){
            $('#mensagem').html(resp).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}

function formGerador(local,form){
    var dados = $(form).serialize();
    $.ajax({
        url: 'config/' + local + '.php',
        type: 'post',
        dataType: 'html',
        data: dados,
        success: function(resp){},
        error: function(resp){}
    });
}

function listarCidade(id,idSelect){
    var dados = '&listarCidade=' + '&id=' + id;
    $.ajax({
        url: 'colossus/config/Colossus.php',
        type: 'post',
        dataType: 'html',
        data: dados,
        success: function(resp){
            $("#" + idSelect + "").html(resp);
        },
        error: function(resp){
            $('#mensagem').html(' Erro ao listar ').addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}

function convertDate(inputFormat) {
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    var d = new Date(inputFormat);
    return [pad(d.getDate()+1), pad(d.getMonth()+1), d.getFullYear()].join('/');
}

function getMesaLocada(id){
    var dados = 'acao=getMesaLocada' + '&id=' + id;
    $.ajax({
        url: 'action/Mesa.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            console.log(resp);
            if(resp !== false) {                
                $('#m').html("Mesa já cadastrada previamente").addClass('erro2').fadeTo(3000, 500).slideUp(500, function () {
                    $(this).find("#m").alert('close');
                });                
                $('#ja-existe').addClass('erro');                
                setTimeout(function () {
                    $('#ja-existe').removeClass('erro')
                },3000);
            }
        },
        error: function(resp){
            console.log(resp);
        }
    });
}
function getCliente(nome_cliente){
    var dados = 'acao=getCliente' + '&nome_cliente=' + nome_cliente;
    $.ajax({
        url: 'action/Cliente.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            console.log(resp);
            if(resp !== false) {
                $('#m').html("Cliente já cadastrado previamente").addClass('erro2').fadeTo(3000, 500).slideUp(500, function () {
                    $(this).find("#m").alert('close');
                });                
                $('#ja-existe').addClass('erro');                
                setTimeout(function () {
                    $('#ja-existe').removeClass('erro')
                },3000);
            }
        },
        error: function(resp){
            console.log(resp);
        }
    });
}

function imprimir(){
    var dados = "acao=" + "imprimir" + "&id_cobranca_momento=" + parseInt($("#id_cobranca_momento_imprimir").val());
    $.ajax({
        url: 'action/Linha.php',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(resp){
            rota('');
            $('#mensagem').html(resp.msg).addClass('mensagem sucesso').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        },
        error: function(resp){
            console.log(resp);
            $('#mensagem').html(resp.msg).addClass('mensagem erro').fadeTo(3000, 500).slideUp(500, function () {
                $(this).find("#mensagem").alert('close');
            });
        }
    });
}