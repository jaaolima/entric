<script src="js/bootstrap/bootstrap-input-spinner/bootstrap-input-spinner.js"></script>
<script src="js/bootstrap/bootstrap-input-spinner/custom-editors.js"></script>
<script src="js/bootstrap/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="js/jquery/select2/js/select2.full.min.js"></script>
<script src="js/jquery/select2/js/pt-BR.js"></script>
<script src="js/jquery/bootstrap-slider/bootstrap-slider.min.js"></script>
<script src="js/jquery/jquery-confirm/jquery-confirm.min.js" type="text/javascript"></script>
<script src="js/jquery/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>

<script>
(function (original) {
  jQuery.fn.clone = function () {
    var result           = original.apply(this, arguments),
        my_textareas     = this.find('textarea').add(this.filter('textarea')),
        result_textareas = result.find('textarea').add(result.filter('textarea')),
        my_selects       = this.find('select').add(this.filter('select')),
        result_selects   = result.find('select').add(result.filter('select'));

    for (var i = 0, l = my_textareas.length; i < l; ++i) $(result_textareas[i]).val($(my_textareas[i]).val());
    for (var i = 0, l = my_selects.length;   i < l; ++i) {
      for (var j = 0, m = my_selects[i].options.length; j < m; ++j) {
        if (my_selects[i].options[j].selected === true) { 
          result_selects[i].options[j].selected = true;
        }
      }
    }
    return result;
  };
}) (jQuery.fn.clone);

function disponivel(_id, _elem){
    $.ajax({
        type: "POST",
        url: "ajax/relatorio_disponivel",
        data: "&id="+_id+"&disponivel="+_elem.checked,
        cache: false,
        dataType: 'json',
        success: function( data ){
            $(".disponivel").each(function() {
                if ($(this).attr('id') !== "disponivel"+_id){
                    $(this).prop('checked', false);
                }
            });
        }
    });
}

function fc_retorno_pacientes(){
    $("#modal_retorno_pacientes tbody tr").click(function () {
        $('#id_paciente').val($(this).attr('rel'));
        var dados = $(this).find(".retorno_pacientes_relatorios").text();
        dados = JSON.parse(dados);
        var dados_json = dados;
        
        $('#cad_idade').val(dados_json.idade);

        $('#up_id').val(dados_json.id);
        $('#up_nome').val(dados_json.nome);
        $('#up_peso').val(dados_json.peso);
        $('#up_telefone').val(dados_json.telefone);
        $('#up_hospital').val(dados_json.hospital);
        $('#up_atendimento').val(dados_json.atendimento);
        $('#up_data_nascimento').val(dados_json.data_nascimento);
        //if ( dados_json.relatorios.length == 0 ) {
        if ( dados_json.relatorios === null ) {
            $('#table_lista_pacientes > tbody').empty();
            $('#table_lista_pacientes').append('<tr><td colspan="5" class="text-center">Nenhum relatório encontrado</td></tr>');
        }else{ 
            var tr = '';
            $.each(dados_json.relatorios, function(i, item) {
                var cont = (dados_json.relatorios.length) - i;
                // item.id
                var status = "";
                if (item.status == 1){
                    status = "checked='checked'";
                    var editar = "";
                }else{
                    if(item.codigo == null){
                        var editar = '<a href="javascript:void(0);" onclick="fc_editar_relatorio(\'' + item.id + '\');"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="fc_excluir_relatorio(\'' + item.id + '\', this);"><i class="fa fa-trash-o"></i></a>';
                    }else{
                        var editar = '<a target="_blank" href="https://sis.entric.com.br/relatorio_simplificada/'+item.relatorio_code+'"><i class="fa fa-file-text-o"></i></a>';
                    }
                }

                tr += '<tr><td>' + cont + '</td><td>' + item.data_criacao + '</td><td> '+ editar +' </td></tr>';
            });

            $('#table_lista_pacientes > tbody').empty();
            $('#table_lista_pacientes').append(tr);
        }
        
        $('#modal_retorno_pacientes').modal('toggle');
        $("#listar_pacientes").show();
        $("#buscar_pacientes").hide();
    });
}

function fc_cadastrar_paciente(){ 
    var frm = $("#form_cadastrar_paciente");
    frm.validate({
        errorPlacement: function(error, element) { 
            return false;
        },
        invalidHandler: function(event, validator) {
            $.alert({
                title: 'Atenção',
                icon: 'fa fa-warning',
                type: 'red',
                content: 'Por favor, preencha os campos corretamente.',
                buttons: {
                    Ok: {
                        text: 'Ok',
                        btnClass: 'btn btn-secondary btn-form'
                    }
                }
            });
        },
        submitHandler: function( form ){
            var formSerialize = frm.serialize();
            $.ajax({
                type: "POST",
                url: "ajax/cadastrar_paciente_simplificada",  
                data: formSerialize,
                cache: false,
                dataType: 'json',
                success: function( data ){
                    if (data.success){
                        $.alert({
                            title: 'Atenção',
                            icon: 'fa fa-warning',
                            type: 'green',
                            content: data.success
                        });
                        fc_iniciar_relatorio(data.paciente);
                    }
                    else{                
                        $.alert({
                            title: 'Atenção',
                            icon: 'fa fa-warning',
                            type: 'red',
                            content: data.error
                        });
                    }
                    b_res($(this).find(':submit'));
                }
            });
        }
    });
}

function fc_cadastrar_dados_gerais(){ 
    var frm = $("#form_cadastrar_dados_gerais");
    frm.validate({
        errorPlacement: function(error, element) { 
            return false;
        },
        invalidHandler: function(event, validator) {
            $.alert({
                title: 'Atenção',
                icon: 'fa fa-warning',
                type: 'red',
                content: 'Por favor, preencha os campos corretamente.',
                buttons: {
                    Ok: {
                        text: 'Ok',
                        btnClass: 'btn btn-secondary btn-form'
                    }
                }
            });
        },
        submitHandler: function( form ){
            var formSerialize = frm.serialize();
            $.ajax({
                type: "POST",
                url: "ajax/cadastrar_paciente",
                data: formSerialize,
                cache: false,
                dataType: 'json',
                success: function( data ){
                    if (data.success){
                        $.alert({
                            title: 'Atenção',
                            icon: 'fa fa-warning',
                            type: 'green',
                            content: data.success
                        });
                        fc_iniciar_relatorio(data.paciente);
                    }
                    else{                
                        $.alert({
                            title: 'Atenção',
                            icon: 'fa fa-warning',
                            type: 'red',
                            content: data.error
                        });
                    }
                    b_res($(this).find(':submit'));
                }
            });
        }
    });
}

function fc_limpar_cadastro_paciente(){
    $('#form_cadastrar_paciente').find('.form-check-input').prop('checked', false);
    $('#form_cadastrar_paciente').find('input.form-control').val('');
    $('#form_cadastrar_paciente').find('textarea').val('');
    $('#form_cadastrar_paciente').find('#up_id').val('');
    $('#form_cadastrar_paciente').find('.form-control').val(null).trigger('change');
}

function fc_atualizar_paciente(){
    var frm = $("#form_atualizar_paciente");
    frm.validate({
        errorPlacement: function(error, element) { 
            return false;
        },
        invalidHandler: function(event, validator) {
            $.alert({
                title: 'Atenção',
                icon: 'fa fa-warning',
                type: 'red',
                content: 'Por favor, preencha os campos corretamente.',
                buttons: {
                    Ok: {
                        text: 'Ok',
                        btnClass: 'btn btn-secondary btn-form'
                    }
                }
            });
        },
        submitHandler: function( form ){
            var formSerialize = frm.serialize();
            $.ajax({
                type: "POST",
                url: "ajax/atualizar_paciente_simplificada",
                data: formSerialize,
                cache: false,
                dataType: 'json',
                success: function( data ){
                    if (data.success){
                        $.alert({
                            title: 'Atenção',
                            icon: 'fa fa-warning',
                            type: 'green',
                            content: data.success
                        });                    
                    }
                    else{                
                        $.alert({
                            title: 'Atenção',
                            icon: 'fa fa-warning',
                            type: 'red',
                            content: data.error
                        });
                    }
                    b_res($(this).find(':submit'));
                }
            });
            return false;
        }
    });
}

function fc_limpar_paciente(){
    $('#form_atualizar_paciente').find('.form-check-input').prop('checked', false);
    $('#form_atualizar_paciente').find('input.form-control').val('');
    $('#form_atualizar_paciente').find('textarea').val('');
    $('#form_atualizar_paciente').find('#up_id').val('');
    $('#form_atualizar_paciente').find('.form-control').val(null).trigger('change');
    $('#listar_pacientes').hide();
    $('#buscar_pacientes').show();
}

function fc_buscar_paciente(){
    var _this = $("#prescritor_relatorioalta");
    var frm = _this.serialize();
    $.ajax({
        type: "POST",
        url: "ajax/buscar_paciente_simplificada",
        data: frm,
        cache: false,
        dataType: 'json',
        success: function( data ){
            $('#id_paciente').val('');
            $('#novo_relatorio').val('');
            if ( data.length == 0 ) {
                $('#table_retorno_pacientes > tbody').empty();
                $('#table_retorno_pacientes').append('<tr><td colspan="5" class="text-center">Nenhum paciente encontrado</td></tr>');
                $('#modal_retorno_pacientes').modal('toggle');
            }else{
                var tr = '';
                $.each(data, function(i, item) { 
                    tr += '<tr rel="'+ item.id +'"><td><div class="retorno_pacientes_relatorios" style="display: none;">' + JSON.stringify(item) + '</div>' + item.nome + '</td><td>' + item.data_nascimento + '</td></tr>';
                });
                $('#table_retorno_pacientes > tbody').empty();
                $('#table_retorno_pacientes').append(tr);
                fc_retorno_pacientes();
                $('#modal_retorno_pacientes').modal('toggle');
            }
        }
    });
}

function fc_iniciar_relatorio(id_paciente){
    $('#id_paciente').val(id_paciente);
    $('#id_relatorio').val('');
    $('#relatorio_code').val('');

    fc_salvar('calculo', false);

    $('.tabcadastro a').removeClass('active');
    $('#cadastro').removeClass('active').removeClass('show').attr('aria-expanded','false');

    $(".tabcalculo").removeClass('disabledTab');
    $('.tabcalculo a').addClass('active');
    $('#calculo').addClass('active').addClass('show').attr('aria-expanded','true');

    $(".tabsec").removeClass('disabledTab').addClass('active');

    $("#rel_gerar_relatorio").removeClass("none");
    $("#rel_imprimir_relatorio").addClass("none");
}

function fc_editar_relatorio(id_relatorio){
    $.ajax({
        type: "POST",
        url: "ajax/relatorio_abrir_simplificada",
        data: "id="+id_relatorio,
        cache: false,
        dataType: 'json',
        success: function( data ){
            $("#div_botao_atualizar_valores").show();
            $("#div_botao_cadastrar_relatorio").hide();
            if (data.relatorio){
                var relatorio = data.relatorio;

                $("#id_relatorio").val(relatorio.id);
                $("#relatorio_code").val(relatorio.relatorio_code);
                $("#enviar_email").prop("disabled", true);
                
                $(".tabcadastro a").removeClass("active");
                $("#cadastro").removeClass("active").removeClass("show").attr("aria-expanded","false");
                
                $(".tabcalculo").removeClass("disabledTab");
                $(".tabcalculo a").addClass("active");
                $("#calculo").addClass("active").addClass("show").attr("aria-expanded","true");
                
                $(".tabsec").removeClass("disabledTab").addClass("active");
                $("#rel_gerar_relatorio").removeClass("none");
                $("#rel_imprimir_relatorio").addClass("none");


                $("input[name='dispositivo'][value='"+relatorio.dispositivo+"']").attr("checked","checked");

                if(relatorio.calculo_apres_fechado){
                    $("#modal_sistema_fechado").show();
                    $("input[name='calculo_apres_fechado']").attr("checked","checked");
                    $("#h_i_dieta").val(relatorio.fra_h_i_dieta);
                    $("#h_inf_dieta").val(relatorio.fra_h_inf_dieta);

                }
                if(relatorio.calculo_apres_aberto_liquido){
                    $("#modal_sistema_aberto").show(); 
                    $("input[name='calculo_apres_aberto_liquido']").attr("checked","checked");
                    $("#qtas_horas").val(relatorio.fra_qtas_horas);
                    $("#fracionamento_dia").val(relatorio.fra_fracionamento_dia);

                    fra_dieta_horario = JSON.parse(relatorio.fra_dieta_horario);
                    horarios = '';
                    if(fra_dieta_horario){
                        for(i = 1; i < Object.keys(fra_dieta_horario).length; i++) {
                            const chave = Object.keys(fra_dieta_horario)[i - 1];
                            const valor = fra_dieta_horario[chave];
                            if (i<10){
                                var numi = "0"+ i;
                            }else{
                                var numi = i;
                            }
                            
                            horarios = horarios + '<div class="col-sm-3">Horário '+numi+':</div>'+
                                                '<div class="col-sm-3"><input value="'+valor+'" type="text" placeholder="00:00" required="required" name="dieta_horario['+numi+']" id="dieta_horario_'+numi+'" class="form-control hora"></div>';
                        }
                        $('.fracio_horario').html(horarios);
                        $('.hora').mask("99:99");
                    }
                }
                if(relatorio.calculo_apres_aberto_po){
                    $("#modal_sistema_aberto").show();
                    $("input[name='calculo_apres_aberto_po']").attr("checked","checked");
                    $("#qtas_horas").val(relatorio.fra_qtas_horas);
                    $("#fracionamento_dia").val(relatorio.fra_fracionamento_dia);

                    fra_dieta_horario = JSON.parse(relatorio.fra_dieta_horario);
                    horarios = '';
                    if(fra_dieta_horario){
                        for(i = 1; i < Object.keys(fra_dieta_horario).length; i++) {
                            const chave = Object.keys(fra_dieta_horario)[i - 1];
                            const valor = fra_dieta_horario[chave];
                            if (i<10){
                                var numi = "0"+ i;
                            }else{
                                var numi = i;
                            }
                            
                            horarios = horarios + '<div class="col-sm-3">Horário '+numi+':</div>'+
                                                '<div class="col-sm-3"><input value="'+valor+'" type="text" placeholder="00:00" required="required" name="dieta_horario['+numi+']" id="dieta_horario_'+numi+'" class="form-control hora"></div>';
                        }
                        $('.fracio_horario').html(horarios);
                        $('.hora').mask("99:99");
                    }
                }

                if(relatorio.calculo_fil_polimerico){
                    $("input[name='calculo_fil_polimerico'][value='Polimérico']").attr("checked","checked");
                }
                if(relatorio.calculo_fil_oligomerico){
                    $("input[name='calculo_fil_oligomerico'][value='Oligomérico']").attr("checked","checked");
                }
                if(relatorio.calculo_fil_pololigomerico){
                    $("input[name='calculo_fil_pololigomerico'][value='Ambos']").attr("checked","checked");
                }
                if(relatorio.calculo_fil_comfibras){
                    $("input[name='calculo_fil_comfibras'][value='Com Fibras']").attr("checked","checked");
                }
                if(relatorio.calculo_fil_semfibras){
                    $("input[name='calculo_fil_semfibras'][value='Sem Fibras']").attr("checked","checked");
                }
                if(relatorio.calculo_fil_comsemfibras){
                    $("input[name='calculo_fil_comsemfibras'][value='Ambos']").attr("checked","checked");
                }
                if(relatorio.calculo_fil_semlactose){
                    $("input[name='calculo_fil_semlactose']").attr("checked","checked");
                }
                if(relatorio.calculo_fil_100proteina){
                    $("input[name='calculo_fil_100proteina']").attr("checked","checked");
                }
                if(relatorio.calculo_fil_semsacarose){
                    $("input[name='calculo_fil_semsacarose']").attr("checked","checked");
                }

                $("#up_kcal_dia").val(relatorio.kcal_dia);
                $("#up_kcal_kg").val(relatorio.kcal_kg);
                $("#up_proteina_kg").val(relatorio.proteina_kg);
                $("#up_proteina_dia").val(relatorio.proteina_dia);
                $("#up_agua_kg").val(relatorio.agua_kg);
                $("#up_agua_dia").val(relatorio.agua_dia);
                $("#div_valores_atualizar").show();
                $("#div_botao_valores").show();

                $("#kcal_valor").val(relatorio.kcal_valor);
                $("#ptn_valor").val(relatorio.ptn_valor);

                _formula_total = relatorio.kcal_dia; 

                kcal_kg = _formula_total / parseFloat($("#up_peso").val());
                _formula_valor = numberFormatPrecision((_formula_total), 0)+" ("+numberFormatPrecision(kcal_kg)+" kcal/kg)";
                $("#presc_kcal").html(_formula_valor);

                _formula_total_ptn = relatorio.proteina_dia;

                proteina_kg = _formula_total_ptn / parseFloat($("#up_peso").val());
                _formula_valor = numberFormatPrecision((_formula_total_ptn), 0)+" ("+numberFormatPrecision(proteina_kg)+" kcal/kg)";
                $("#presc_ptn").html(_formula_valor);

                $("#hidratacao_dia").val(relatorio.fra_hidratacao_dia);
                $("#volume_horario").val(relatorio.fra_volume_horario);
                fra_hidrahorario = JSON.parse(relatorio.fra_hidrahorario);
                horarios = '';
                for(i = 0; i < Object.keys(fra_hidrahorario).length; i++) {
                    y = 1;
                    const chave = Object.keys(fra_hidrahorario)[i];
                    const valor = fra_hidrahorario[chave];
                    if (i<10){
                        var numi = "0"+ y;
                    }else{
                        var numi = y;
                    }
                    y++;
                    
                    horarios = horarios + '<div class="col-sm-3">Horário '+numi+':</div>'+
                                        '<div class="col-sm-3"><input value="'+valor+'" type="text" placeholder="00:00" required="required" name="hidrahorario['+numi+']" id="hidrahorario_'+numi+'" class="form-control hora"></div>';
                }
                $('.hidratacao_horarios').html(horarios);
                $('.hora').mask("99:99");
                volume_total_hidratacao();

                $("textarea[name='info_complementares']").val(relatorio.info_complementares);

                $(".state[rel='"+relatorio.distribuidores+"']").click();

            }
            else if (data.error){
                toastr['error'](data.error.message, '', {positionClass: 'toast-top-right' });
            }
        }
    });    
}

function fc_excluir_relatorio(id_relatorio, _this){
    $.confirm({
        title: '<strong>Atenção</strong>',
        content: 'Tem certeza que deseja excluir o relatório?',
        buttons: {
            Sim: {
                text: 'Sim',
                btnClass: 'btn btn-secondary btn-form',
                action: function(){
                    $.ajax({
                        type: "POST",
                        url: "ajax/relatorio_excluir_simplificada",
                        data: "id="+id_relatorio,
                        cache: false,
                        dataType: 'json',
                        success: function( data ){
                            trPai = $(_this).closest('tr');
                            console.log(trPai);
                            trPai.hide();
                            $.alert({
                                title: 'Atenção',
                                icon: 'fa fa-warning',
                                type: 'green',
                                content: 'Relatório excluído com sucesso!'
                            });
                        }
                    }); 
                }
            },
            Nao: {
                text: 'Não',
                btnClass: 'btn btn-default btn-form',
                action: function(){
                    
                }
            }
        }
    });
       
}

function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var $container = $(
    "<div class='row'>" +
        "<div class='col-md-6'>" + repo.text + "</div>" +  
        "<div class='col-md-3'>" + repo.detalhes + "</div>" +   
        "<div class='col-md-3'>" + repo.especificacao + "</div>" +      
    "</div>"
  );

  return $container;
}

function formatRepoSelection(repo) {

    return repo.text;
}

function select2_ajax_formula(_this){
    _this.select2({
        ajax: {
            url: "ajax/busca_formula/",
            dataType: "json",
            delay: 250,
            type: "GET",
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.descricao,
                            detalhes: item.detalhes,
                            especificacao: item.especificacao
                        }
                    })
                };
            },
            cache: false
        },
        dropdownCssClass : 'bigdrop',
        multiple: false,
        allowClear: true,
        //width: '100%',
        minimumInputLength: 3,
        placeholder: '...',
        escapeMarkup: function (markup) { return markup; },
        templateResult: formatRepo,
        templateSelection: formatRepoSelection,
        language: "pt-BR"
    });
}

function formatRepoProd (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var $container = $(
    "<div class='row'>" +
        "<div class='col-md-6'>" + repo.text + "</div>" +  
        "<div class='col-md-6'>" + repo.fabricante + "</div>" +        
    "</div>"
  );

  return $container;
}

function formatRepoProdSelection(repo) {
    return repo.text;
}

function select2_ajax_produto(_this){
    _this.select2({
        ajax: {
            url: "ajax/busca_produto/",
            dataType: "json",
            delay: 250,
            type: "GET",
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.nome,
                            fabricante: item.fabricante
                        }
                    })
                };
            },
            cache: false
        },
        dropdownCssClass : 'bigdrop',
        multiple: false,
        allowClear: true,
        //width: '100%',
        minimumInputLength: 3,
        placeholder: '...',
        escapeMarkup: function (markup) { return markup; },
        templateResult: formatRepoProd,
        templateSelection: formatRepoProdSelection,
        language: "pt-BR"
    });
}

function stickyTop_after1sec(div){
    var _this = $('#'+div).find('.sticky');    
    var stickyTop = _this.offset().top;
    $(window).scroll(function() {
        var windowTop = $(window).scrollTop();
        if (stickyTop < windowTop) {
            var stickyWidth = _this.outerWidth();
            _this.css('position', 'fixed');
            _this.css('width', stickyWidth);
        } else {
            _this.css('position', 'relative');
            _this.css('width', '');  
        }
    });
}

function stickyTop(div) {
    setTimeout(
    function() {
        stickyTop_after1sec(div);
    }, 1000);
}

function numberFormatPrecision(theform, _decimal) {
    return (Math.floor(theform * 100) / 100).toFixed(_decimal);
}

function avaliacao_antropometria(_this, _sec){
    if (_sec === true){
        var _altura = $("input[name='altura_valor']").val();
        var _peso = _this.val();
        var _imc = _this.closest(".antropometria").find(".input_imc");
        if ((_peso !== "") && (_altura !== "") && (_altura !== "0,00")){
            _peso = _peso.replace(",", ".");
            _peso = parseFloat(_peso);
            //console.log(_altura);
            _altura = _altura.replace(",", ".");
            _altura = parseFloat(_altura);
            //console.log(_altura);

            _imc.val(numberFormatPrecision((_peso / (_altura*_altura)), 2));
        }
    }
    else{
        var _altura = $("input[name='altura_valor']").val();
        $(".antropometria").each(function() {            
            var _peso = $(this).find(".input_peso_valor").val();
            var _imc = $(this).find(".input_imc");

            if ((_peso !== "") && (_altura !== "") && (_altura !== "0,00")){
                _peso = _peso.replace(",", ".");
                _peso = parseFloat(_peso);
                //console.log(_altura);
                _altura = _altura.replace(",", ".");
                _altura = parseFloat(_altura);
                //console.log(_altura);

                _imc.val(numberFormatPrecision((_peso / (_altura*_altura)), 2));
            }
        });        
    }

    checar_pesos();
}

function necessidades_peso(_this){
    $(".antropometria_col").each(function() {
        $('.select_peso option[value="'+_this.val()+'"]').each(function() {
            if ($(this).prop("selected") == true) {
                _this.parent().find(".necessidades_peso").val($(this).parent().parent().parent().find(".input_peso_valor").val());
            }
        });
    });
}

function necessidades_calorias_total(_this, _event){
    if (_this != null){
        var _calorias = _this.val();
        if ((_calorias).length >= 2){
            _event.preventDefault();
        }
    }

    var _formula_valor = $("#kcal_kg").val();
    if (_formula_valor !== ""){
        _formula_valor = _formula_valor.replace(",", ".");
        _formula_valor = parseFloat(_formula_valor);
    }

    var _formula_total = $("#kcal_dia").val();
    if (_formula_total !== ""){
        _formula_total = _formula_total.replace(",", ".");
        _formula_total = parseFloat(_formula_total);
    }else{
        _formula_total = 0;
    }
    proteina_kg = _formula_total / parseFloat($("#peso").val());

    $("#kcal_valor").val(numberFormatPrecision((_formula_total), 0));
    _formula_valor = numberFormatPrecision((_formula_total), 0)+" ("+numberFormatPrecision(proteina_kg, 0)+" kcal/kg)";
    // $("#kcal_valor").val(_formula_valor);
    $("#presc_kcal").html(_formula_valor);

    // rangeCaloria($("#kcal_valor").val());

}

function necessidades_proteinas_total(_this, _event){ 
    if ($("#peso").val() != "") {
        if (_this != null){
            var _ptnval = _this.val();
            //_ptnval = _ptnval.substr(0, 3);
            // if ((_ptnval).length >= 3){
            //     _event.preventDefault();
            // }
            var lastChar = _ptnval[_ptnval.length -1];

            if ((lastChar == ".") || (lastChar == ",")){
                if ((_ptnval.indexOf('.') > -1) && (_ptnval.indexOf(',') > -1)) {
                }
                else{
                    _event.stopPropagation();
                }
            }
        }
        var _formula_valor = $("#proteina_kg").val();
        if (_formula_valor !== ""){
            _formula_valor = _formula_valor.replace(",", ".");
            _formula_valor = parseFloat(_formula_valor);
        }

        var _formula_total = $("#proteina_dia").val();
        if (_formula_total !== ""){
            _formula_total = _formula_total.replace(",", ".");
            _formula_total = parseFloat(_formula_total);
        }else{
            _formula_total = 0;
        }
        proteina_kg = _formula_total / parseFloat($("#peso").val());
        $("#ptn_valor").val(numberFormatPrecision((_formula_total), 0));
        _formula_valor = numberFormatPrecision((_formula_total), 1)+" ("+numberFormatPrecision(proteina_kg, 1)+" g/kg)";
        // $("#ptn_valor").val(_formula_valor);
        $("#presc_ptn").html(_formula_valor);
        
        // rangeProteina($("#ptn_valor").val());
    }
}

function necessidades_agua_total(_this, _event){
    if ($("#peso").val() != "") {
        if (_this != null){
            var _agua = _this.val();
            if ((_agua).length >= 2){
                _event.preventDefault();
            }
        }

        var _formula_valor = $("#agua_kg").val();
        if (_formula_valor !== ""){
            _formula_valor = _formula_valor.replace(",", ".");
            _formula_valor = parseFloat(_formula_valor);
        }else{
            _formula_valor = 0;
        }

        var _formula_total = $("#agua_dia").val();
        if (_formula_total !== ""){
            _formula_total = _formula_total.replace(",", ".");
            _formula_total = parseFloat(_formula_total);
        }else{
            _formula_total = 0;
        }
        $("#nec_agua_total").val( numberFormatPrecision((_formula_total), 0)+" ("+numberFormatPrecision(_formula_valor, 0)+" ml/kg)" );
    }
}

function necessidades_calorias_total_atualizar(_this, _event){
    if (_this != null){
        var _calorias = _this.val();
        if ((_calorias).length >= 2){
            _event.preventDefault();
        }
    }

    var _formula_valor = $("#up_kcal_kg").val();
    if (_formula_valor !== ""){
        _formula_valor = _formula_valor.replace(",", ".");
        _formula_valor = parseFloat(_formula_valor);
    }

    var _formula_total = $("#up_kcal_dia").val();
    if (_formula_total !== ""){
        _formula_total = _formula_total.replace(",", ".");
        _formula_total = parseFloat(_formula_total);
    }else{
        _formula_total = 0;
    }
    proteina_kg = _formula_total / parseFloat($("#up_peso").val());

    $("#kcal_valor").val(numberFormatPrecision((_formula_total), 0));
    _formula_valor = numberFormatPrecision((_formula_total), 0)+" ("+numberFormatPrecision(proteina_kg)+" kcal/kg)";
    // $("#kcal_valor").val(_formula_total);
    $("#presc_kcal").html(_formula_valor);

    // rangeCaloria($("#kcal_valor").val());
}

function necessidades_proteinas_total_atualizar(_this, _event){
    if ($("#up_peso").val() != "") {
        if (_this != null){
            var _ptnval = _this.val();
            //_ptnval = _ptnval.substr(0, 3);
            // if ((_ptnval).length >= 3){
            //     _event.preventDefault();
            // }
            var lastChar = _ptnval[_ptnval.length -1];

            if ((lastChar == ".") || (lastChar == ",")){
                if ((_ptnval.indexOf('.') > -1) && (_ptnval.indexOf(',') > -1)) {
                }
                else{
                    _event.stopPropagation();
                }
            }
        }
        var _formula_valor = $("#up_proteina_kg").val();
        console.log(_formula_valor);
        if (_formula_valor !== ""){
            _formula_valor = _formula_valor.replace(",", ".");
            _formula_valor = parseFloat(_formula_valor);
        }

        var _formula_total = $("#up_proteina_dia").val();
        console.log(_formula_total);
        if (_formula_total !== ""){
            _formula_total = _formula_total.replace(",", ".");
            _formula_total = parseFloat(_formula_total);
        }else{
            _formula_total = 0;
        }
        proteina_kg = _formula_total / parseFloat($("#up_peso").val());

        $("#ptn_valor").val(numberFormatPrecision((_formula_total), 0));
        _formula_valor = numberFormatPrecision((_formula_total), 1)+" ("+numberFormatPrecision(proteina_kg, 1)+" g/kg)";
        // $("#ptn_valor").val(_formula_valor);
        $("#presc_ptn").html(_formula_valor);

        // rangeProteina($("#ptn_valor").val());
    }
}

function necessidades_agua_total_atualizar(_this, _event){
    if ($("#up_peso").val() != "") {
        if (_this != null){
            var _agua = _this.val();
            if ((_agua).length >= 2){
                _event.preventDefault();
            }
        }
 
        var _formula_valor = $("#up_agua_kg").val();
        if (_formula_valor !== ""){
            _formula_valor = _formula_valor.replace(",", ".");
            _formula_valor = parseFloat(_formula_valor);
        }else{
            _formula_valor = 0;
        }

        var _formula_total = $("#up_agua_dia").val();
        if (_formula_total !== ""){
            _formula_total = _formula_total.replace(",", ".");
            _formula_total = parseFloat(_formula_total);
        }else{
            _formula_total = 0;
        }
        $("#nec_agua_total").val( numberFormatPrecision((_formula_total), 0)+" ("+numberFormatPrecision(_formula_valor, 0)+" ml/kg)" );
    }
}

// function necessidades_peso_checar(){
//     fc_tab_formfilled();
    
//     var select_increment = 0;
//     var select_peso = "";
//     var select_peso_valor = "";
//     $('.select_peso').each(function() {
//         if ($(this).val() !== "") {
//             select_peso = $(this).val();
//             select_increment = select_increment +1;
//             var input_peso_valor = $(this).parent().parent().find(".input_peso_valor").val();
//             if (input_peso_valor !== "") {
//                 select_peso_valor = input_peso_valor;
//                 select_increment = select_increment +1;
//             }
//         }
//     });
//     if (select_increment < 2){
//         $.alert({
//                 title: 'Atenção',
//                 icon: 'fa fa-warning',
//                 type: 'red',
//                 content: 'Por favor, é necessário informar e selecionar o peso na aba Avaliação Nutricional.'
//             });

//         $("#nec_calorias_peso").find('option[value!=""]').prop('disabled', true);
//         $("#nec_proteinas_peso").find('option[value!=""]').prop('disabled', true);
//         $("#nec_agua_peso").find('option[value!=""]').prop('disabled', true);
//         $('#nec_calorias_peso option:eq(0)').prop('selected', true);
//         $('#nec_calorias_peso_valor').val(select_peso_valor);
//         $('#nec_proteinas_peso option:eq(0)').prop('selected', true);    
//         $('#nec_proteinas_peso_valor').val(select_peso_valor);
//         $('#nec_agua_peso option:eq(0)').prop('selected', true);
//         $('#nec_agua_peso_valor').val(select_peso_valor);
//     }
//     else{
//         if (select_peso !== ""){
//             $('#nec_calorias_peso option[value="'+select_peso+'"]').attr('selected','selected');
//             $('#nec_calorias_peso_valor').val(select_peso_valor);
//             $('#nec_proteinas_peso option[value="'+select_peso+'"]').attr('selected','selected');
//             $('#nec_proteinas_peso_valor').val(select_peso_valor);
//             $('#nec_agua_peso option[value="'+select_peso+'"]').attr('selected','selected');
//             $('#nec_agua_peso_valor').val(select_peso_valor);
//         }else{
//             $('#nec_calorias_peso option:eq(0)').prop('selected', true);
//             $('#nec_calorias_peso_valor').val(select_peso_valor);
//             $('#nec_proteinas_peso option:eq(0)').prop('selected', true);    
//             $('#nec_proteinas_peso_valor').val(select_peso_valor);
//             $('#nec_agua_peso option:eq(0)').prop('selected', true);
//             $('#nec_agua_peso_valor').val(select_peso_valor);
//         }        
//     }

//     necessidades_calorias_total(null, null);
//     necessidades_proteinas_total(null, null);
//     necessidades_agua_total(null, null);
// }

function volume_total_hidratacao(){
    if (($("#hidratacao_dia").val() != "") && ($("#volume_horario").val() != "")) {
        var hidratacao_dia = $("#hidratacao_dia").val();
        var volume_horario = $("#volume_horario").val();
        if (volume_horario !== ""){
            volume_horario = volume_horario.replace(",", ".");
            volume_horario = parseFloat(volume_horario);
        }else{
            volume_horario = 0;
        }
        //$("#volume_total_hidratacao .volume_ml").html(numberFormatPrecision((volume_horario / hidratacao_dia), 3));
        $("#volume_total_hidratacao .volume_ml").html(numberFormatPrecision((volume_horario * hidratacao_dia), 0));
        $("#volume_total_hidratacao #in_volume_ml").val(numberFormatPrecision((volume_horario * hidratacao_dia), 0));
        $("#volume_total_hidratacao").show();
    }
    else{
        $("#volume_total_hidratacao").hide();
    }
}

function checar_pesos(){ 
    $("#nec_calorias_peso").find('option[value!=""]').prop('disabled', true);
    $("#nec_proteinas_peso").find('option[value!=""]').prop('disabled', true);
    $("#nec_agua_peso").find('option[value!=""]').prop('disabled', true);

    $(".antropometria .select_peso").each(function() {
        $("#nec_calorias_peso").find('option[value="'+$(this).val()+'"]').prop('disabled', false);
        $("#nec_proteinas_peso").find('option[value="'+$(this).val()+'"]').prop('disabled', false);
        $("#nec_agua_peso").find('option[value="'+$(this).val()+'"]').prop('disabled', false);
    });

    var select_peso = $('.antropometria .select_peso :selected').text();
    if (select_peso !== ""){
        $('#nec_calorias_peso option[value="'+select_peso+'"]').attr('selected','selected'); 
        $('#nec_proteinas_peso option[value="'+select_peso+'"]').attr('selected','selected'); 
        $('#nec_agua_peso option[value="'+select_peso+'"]').attr('selected','selected');  
    }else{
        $('#nec_calorias_peso option:eq(0)').prop('selected', true);
        $('#nec_proteinas_peso option:eq(0)').prop('selected', true);    
        $('#nec_agua_peso option:eq(0)').prop('selected', true);
    }

    $("#nec_calorias_peso_valor").val("");
    $("#nec_proteinas_peso_valor").val("");
    $("#nec_agua_peso_valor").val("");
    $("#nec_calorias_total").val("(kcal/kg)");
    $("#nec_proteinas_total").val("(g/kg)");
    $("#nec_agua_total").val("(ml/kg)");
}

function busca_produto_relatorio(m_calorica, m_proteica){
    if (typeof m_calorica === "undefined") {
        m_calorica = new Array(0, 0);
    }
    if (typeof m_proteica === "undefined") {
        m_proteica = new Array(0, 0);
    }
    console.log(m_calorica, m_proteica); 
    //if ($("input[name='calculo_apres_aberto_po']:checked").length > 0) {
        $.ajax({
            type: "POST",
            url: "ajax/busca_produto_relatorio_simplificada",
            //data: $("#prescritor_calculo").serialize()+"&margem_calorica="+$("#margem_calorica").val()+"&margem_proteica="+$("#margem_proteica").val(),
            data: $("#prescritor_calculo").serialize()+"&margem_calorica="+m_calorica+"&margem_proteica="+m_proteica+"&fracionamento_dia="+$("#fracionamento_dia").val()+"&produto_especializado="+$("[name='produto_especializado']:checked").val(),
            cache: false,
            dataType: 'html',
            success: function( dados ){
                if (dados == ""){
                    $('#dietas_dc').empty();
                    $('#dietas_dc').append("<br><div style='text-align: center;'>Não foram encontrados produtos compatíveis com todas as características selecionadas.<br> Você pode rever a prescrição nutricional para realizar o cálculo automático <br>ou realizar uma prescrição manual.</div><br>");
                }
                else{
                    $('#dietas_dc').empty();
                    $('#dietas_dc').append(dados);

                    fc_collapsecheckbox(1);
                    $("#collapseSistema1").prop( "checked", true );
                    fc_collapsecheckbox(2);
                    $("#collapseSistema2").prop( "checked", true );
                    fc_collapsecheckbox(3);
                    $("#collapseSistema3").prop( "checked", true );
                }
            }
        });
    //}
}

function rangeCaloria(calorias){
    var perc1 = -4;
    var perc2 = 4;
    $("#var_calorica").html(calorias);
    $("#margem_calorica").slider();
    $("#margem_calorica").slider("destroy");
    $('#margem_calorica').slider({
        id: "exSliderKcal",
        tooltip: 'always',
        tooltip_split: true,
        min: -10,
        max: 10,
        step: "0.5",
        value: [perc1, perc2],
        formatter: function (val){
            var _perc1 = Math.abs(val[0]);
            var _calorias = parseFloat(calorias) * parseFloat(_perc1);
            _calorias = _calorias / 100;
            if (val[0] < 0){
                _calorias = parseFloat(calorias) - parseFloat(_calorias);
            }
            else{
                _calorias = parseFloat(calorias) + parseFloat(_calorias);   
            }
            val[0] = numberFormatPrecision(_calorias, 0)+" ("+val[0]+"%)";

            var _perc2 = Math.abs(val[1]);
            var _calorias = parseFloat(calorias) * parseFloat(_perc2);
            _calorias = _calorias / 100;
            if (val[1] < 0){
                _calorias = parseFloat(calorias) - parseFloat(_calorias);
            }
            else{
                _calorias = parseFloat(calorias) + parseFloat(_calorias);   
            }
            val[1] = numberFormatPrecision(_calorias, 0)+" ("+val[1]+"%)";
            return val; 
        }
    });
    $('#margem_calorica').on("slide", function(slideEvt) {
        busca_produto_relatorio($(this).val(), $("#margem_proteica").val());
    });
    busca_produto_relatorio($("#margem_calorica").val(), $("#margem_proteica").val());
}

function rangeProteina(proteina){
    var perc1 = -6;
    var perc2 = 6;
    $("#var_proteina").html(proteina);
    $("#margem_proteica").slider();
    $("#margem_proteica").slider("destroy");
    $('#margem_proteica').slider({
        id: "exSliderPtn",
        tooltip: 'always',
        tooltip_split: true,
        min: -20,
        max: 20,
        step: "0.5",
        value: [perc1, perc2],
        formatter: function (val){
            var _perc1 = Math.abs(val[0]);
            var _calorias = parseFloat(proteina) * parseFloat(_perc1);
            _calorias = _calorias / 100;
            if (val[0] < 0){
                _calorias = parseFloat(proteina) - parseFloat(_calorias);
            }
            else{
                _calorias = parseFloat(proteina) + parseFloat(_calorias);   
            }
            val[0] = numberFormatPrecision(_calorias, 0)+" ("+val[0]+"%)";

            var _perc2 = Math.abs(val[1]);
            var _calorias = parseFloat(proteina) * parseFloat(_perc2);
            _calorias = _calorias / 100;
            if (val[1] < 0){
                _calorias = parseFloat(proteina) - parseFloat(_calorias);
            }
            else{
                _calorias = parseFloat(proteina) + parseFloat(_calorias);
            }
            val[1] = numberFormatPrecision(_calorias, 0)+" ("+val[1]+"%)";
            return val;
        }
    });
    $('#margem_proteica').on("slide", function(slideEvt) {
        busca_produto_relatorio($("#margem_calorica").val(), $(this).val());
    });
    busca_produto_relatorio($("#margem_calorica").val(), $("#margem_proteica").val());
}

function salvar_calculo_fracionamento(_this){
    var _id_paciente = $("#id_paciente").val();
    var _id_relatorio = $("#id_relatorio").val();
    //var formSerialize = $("#modal_form_fracionamento :input:not(:hidden)").serialize();
    var formSerialize = $("#modal_form_fracionamento").serialize();
    if (_this != null)  b_lo(_this);

    $.ajax({
        type: "POST",
        url: "ajax/fracionamento_salvar_simplificada",
        data: formSerialize+"&id_paciente="+_id_paciente+"&id_relatorio="+_id_relatorio,
        cache: false,
        dataType: 'json',
        success: function( data ){
            if (_this != null) b_res(_this);
            if (_this != null){
                $('#modal_fracionamento').modal('toggle');
                $("#modal_fracionamento").on('hidden.bs.modal', function (e) {
                    
                    $("#modal_selecao").modal("toggle");
                });
                rangeCaloria($("#kcal_valor").val());
                rangeProteina($("#ptn_valor").val());
            }else{
                rangeCaloria($("#kcal_valor").val());
                rangeProteina($("#ptn_valor").val());
                $("#modal_selecao").modal("toggle");
            }

        }
    });
}

function check_dieta(_this, diluicao_id){
    if ($(_this).is(':checked')){
        $('.diluicao'+diluicao_id).each(function(){ 
            $(this).prop( "checked", true );
            $(this).attr( "disabled", false);
            $(this).removeClass( "check_apagado");
        });
    }
    else{
        $('.diluicao'+diluicao_id).each(function(){ 
            $(this).prop( "checked", false);
            $(this).attr( "disabled", true);
            $(this).addClass( "check_apagado");
        });
    }

    if($("#tipo_login").val() == 'ibranutro'){
        if($(_this).hasClass("check_dieta")){
            let tbody = $(_this).closest("tbody[id^='tbody']"); // Obtém o tbody correspondente
            let checkboxes = tbody.find(".check_dieta"); // Seleciona todos os checkboxes dentro do tbody
            let checkedCount = checkboxes.filter(":checked").length; // Conta quantos estão marcados

            if (checkedCount >= 3) {
                // Desabilita os não selecionados se já houver 3 selecionados
                checkboxes.not(":checked").prop("disabled", true);
                checkboxes.not(":checked").addClass("check_apagado");
            } else {
                // Reabilita todos se menos de 3 estiverem selecionados
                checkboxes.prop("disabled", false);
                checkboxes.removeClass( "check_apagado");
            }
        }else{
            let tbody = $(_this).closest("tbody[id^='tbody']"); // Obtém o tbody correspondente
            let checkboxes = tbody.find(".check_dieta"); // Seleciona todos os checkboxes dentro do tbody
            let checkedCount = checkboxes.filter(":checked").length; // Conta quantos estão marcados

            if (checkedCount >= 5) {
                // Desabilita os não selecionados se já houver 3 selecionados
                checkboxes.not(":checked").prop("disabled", true);
                checkboxes.not(":checked").addClass("check_apagado");
            } else {
                // Reabilita todos se menos de 3 estiverem selecionados
                checkboxes.prop("disabled", false);
                checkboxes.removeClass( "check_apagado");
            }
        }
    }
}


function fc_collapseSistema($apres_enteral_num){
    if ($("#tbody"+$apres_enteral_num).hasClass("none")) {
        $("#tbody"+$apres_enteral_num).removeClass("none");
    }
    else{
        $("#tbody"+$apres_enteral_num).addClass("none");
    }
}

function fc_collapsecheckbox( $apres_enteral_num){ 
    if ($("#tbody"+$apres_enteral_num).hasClass("checked")) {
        $("#tbody"+$apres_enteral_num).removeClass("checked");
        $("#tbody"+$apres_enteral_num+" .check_dieta").each(function() {
            $(this).prop( "checked", false);
            let diluicao_id = $(this).attr('rel');

            $("#tbody"+$apres_enteral_num+" .diluicao"+diluicao_id).each(function(){ 
                $(this).prop( "checked", false);
                $(this).attr( "disabled", true);
                $(this).addClass( "check_apagado");
            });
        });
    }
    else{
        $("#tbody"+$apres_enteral_num).addClass("checked");
        if($("#tipo_login").val() == 'ibranutro'){
            qtd = 1;
            $("#tbody"+$apres_enteral_num+" .check_dieta").each(function() {
                if(qtd < 4){
                    $(this).prop( "checked", true);
                    let diluicao_id = $(this).attr('rel');

                    $("#tbody"+$apres_enteral_num+" .diluicao"+diluicao_id).each(function(){ 
                        $(this).prop( "checked", true);
                        $(this).attr( "disabled", false);
                        $(this).removeClass( "check_apagado");
                    });
                }else{
                    $(this).attr( "disabled", true);
                    $(this).addClass( "check_apagado");
                }
                qtd++;
            });
        }else{
            qtd = 1;
            $("#tbody"+$apres_enteral_num+" .check_dieta").each(function() {
                if(qtd < 6){
                    $(this).prop( "checked", true);
                    let diluicao_id = $(this).attr('rel');

                    $("#tbody"+$apres_enteral_num+" .diluicao"+diluicao_id).each(function(){ 
                        $(this).prop( "checked", true);
                        $(this).attr( "disabled", false);
                        $(this).removeClass( "check_apagado");
                    });
                }else{
                    $(this).attr( "disabled", true);
                    $(this).addClass( "check_apagado");
                }
                qtd++;
            });
            // $("#tbody"+$apres_enteral_num+" .check_dieta").each(function() {
            //     $(this).prop( "checked", true);
            //     let diluicao_id = $(this).attr('rel');

            //     $("#tbody"+$apres_enteral_num+" .diluicao"+diluicao_id).each(function(){ 
            //         $(this).prop( "checked", true);
            //         $(this).attr( "disabled", false);
            //         $(this).removeClass( "check_apagado");
            //     });
            // });
        }
       
    }

    const total = $('#tbody'+$apres_enteral_num+' input[type="checkbox"].check_dieta').length;
    $("#count_"+$apres_enteral_num).html("("+total+")");
}

function fc_gerarelatorio(){
    $.confirm({
        boxWidth: '40%',
        useBootstrap: false,
        title: '<strong>Atenção</strong>',
        content: 'Esta ação gera o documento final para paciente. Após a confirmação <strong>não será possível</strong> editar este documento.<br><br> Será necessário gerar um novo relatório caso deseje modificar as informações posteriormente.',
        buttons: {
            Nao: {
                text: 'Cancelar',
                btnClass: 'btn btn-default btn-form',
                action: function(){
                }
            },
            Sim: {
                text: 'Gerar Relatório',
                btnClass: 'btn btn-secondary btn-form',
                action: function(){
                    fc_salvar('gerar_relatorio', true);
                }
            }
        }
    });
}

function fc_imprimir_relatorio(){
    $.confirm({
        title: '<strong>Atenção</strong>',
        content: 'Você gostaria de imprimir o relatório de alta?',
        buttons: {
            Sim: {
                text: 'Sim',
                btnClass: 'btn btn-secondary btn-form',
                action: function(){
                    var relatorio_code = $("#relatorio_code").val();
                    window.open("https://pdf.entric.com.br/"+relatorio_code, "_blank");
                }
            },
            Nao: {
                text: 'Não',
                btnClass: 'btn btn-default btn-form',
                action: function(){
                }
            }
        }
    });
}

function fc_resetar_relatorio(){
    $('.entric .tab-content .tab-pane').find('input.form-control').val('');
    $('.entric .tab-content .tab-pane').find('textarea').val('');
    $('.entric .tab-content .tab-pane').find('.form-control').val(null).trigger('change');
    $('.entric .tab-content .tab-pane').find('.form-check-input').prop('checked', false);
}

function fc_tab_formfilled(){
    $(".tabambos").hide();
    var taboknook = "tabok";
    if ($('#historia').find('textarea[name="historia"]').val() == "") taboknook = "tabnook";
    $(".tabhistoria").find('.'+taboknook).show();
    
    var taboknook = "tabok";
    if ($('#avaliacao').find('input[name="data"]').val() == "") taboknook = "tabnook";
    if ($('#avaliacao').find('input[name="imc[]"]').val() == "") taboknook = "tabnook";
    $(".tabavaliacao").find('.'+taboknook).show();
}

function fc_salvar(tab, notify){
    var _id_paciente = $("#id_paciente").val();
    var _id_relatorio = $("#id_relatorio").val();
    if (tab == "calculo"){
        var frm = $("#"+tab+" .inputs1").find('select, textarea, input').serialize();
        frm = frm + "&action="+tab;

        var tabs = $(".combinacoes .nav-item").length;      
        var combinacoes = "";
        for(i = 1; i < tabs; i++) {
            var navlink = $(".combinacoes .nav-item:nth-child("+i+") .nav-link").attr("href");
            if (combinacoes!=="") combinacoes = combinacoes+"&";
            combinacoes = combinacoes + $(""+navlink+"").find('select, textarea, input').serialize();
        }
        if(!$("#div_cadastrar_paciente").is(":hidden")){
            valores = $("#div_valores").find('input').serialize();
        }else{
            inputs_atualizar = $("#div_valores_atualizar")
            inputs_atualizar.find('input[name^="up_"]').each(function() {
                let nomeOriginal = $(this).attr('name');
                let nomeSemPrefixo = nomeOriginal.replace(/^up_/, '');
                $(this).attr('name', nomeSemPrefixo);
            });
            valores = inputs_atualizar.find('input').serialize();
        }
        frm = frm + "&"+ combinacoes + valores;

    }else{
        if (tab == "gerar_relatorio"){
            var _this = $("#relatorio form");    
        }
        else{
            var _this = $("#"+tab+" form");
        }        
        var frm = _this.serialize();   
    } 

    login_tipo = $("#login_tipo").val();

    $.ajax({
        type: "POST", 
        url: "ajax/relatorio_salvar_simplificada",
        data: frm+"&id_paciente="+_id_paciente+"&id_relatorio="+_id_relatorio+"&tab="+tab+"&login_tipo="+login_tipo,
        cache: false,
        dataType: 'json',
        success: function( data ){
            if (data.relatorio){
                $("#id_relatorio").val(data.relatorio);
                $("#relatorio_code").val(data.relatorio_code);
                if (tab == "gerar_relatorio"){

                    $("#rel_gerar_relatorio").addClass("none");
                    $("#rel_imprimir_relatorio").removeClass("none");
                    $(".tabhistoria").addClass('disabledTab');
                    $(".tabavaliacao").addClass('disabledTab');
                    $(".tabnecessidades").addClass('disabledTab');
                    $(".tabcalculo").addClass('disabledTab');
                    $(".tabobservacoes").addClass('disabledTab');
                    $(".tabdistribuidores").addClass('disabledTab');
                }
            }
            if (notify == true){
                if (data.success){
                    toastr['success'](data.success, '', {positionClass: 'toast-top-right' });
                }
                if (data.error){
                    toastr['error'](data.error.message, '', {positionClass: 'toast-top-right' });
                }
            }
        }
    });
}

function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); 
    var result = confirm("Você tem certeza que deseja recarregar esta página?");
    if (result == true) {
        window.location.reload();
    }
};

function abrirEndereco(_id){
    $.ajax({
        type: "POST",
        url: "ajax/gt_endereco_distribuidor",
        data: "&id="+_id,
        cache: false,
        dataType: 'html',
        success: function( data ){
            $("#info_endereco .modal-body").html(data);
            $('#info_endereco').modal('show');
        }
    });
}

var message = "Você tem certeza que deseja sair deste módulo?";
window.onbeforeunload = function(event) {
    var e = e || window.event;
    if (e) {
        e.returnValue = message;
    }
    return message;
};

function maxLengthCheck(object) {
    if (object.value.length > object.max.length)
        object.value = object.value.slice(0, object.max.length)
}
    
function isNumeric(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode (key);
    var regex = /[0-9]|\./;
    if ( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
}

$(function(){
    //$(document).on("keydown", disableF5);
    $('#avaliacao .data').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        autoclose: true
    });

    $('#kcal_kg').mask("9?9");
    $('#kcal_dia').mask("9?999");
    $('#proteina_kg').mask("9?,99");
    $('#proteina_dia').mask("9?99,9");
    $('#agua_kg').mask("9?9");
    $('#agua_dia').mask("9?999");
    $('#telefone').mask("(99)99999-9999");

    $('#up_kcal_kg').mask("9?9");
    $('#up_kcal_dia').mask("9?999");
    $('#up_proteina_kg').mask("9?,99");
    $('#up_proteina_dia').mask("9?99,9");
    $('#up_agua_kg').mask("9?9");
    $('#up_agua_dia').mask("9?999");
    $('#up_telefone').mask("(99)99999-9999");

    // $("#kcal_kg").on('blur', function(){
    //     peso = $("#peso").val();
    //     kcal = $(this).val();
    //     if(peso != '' && kcal != ''){
    //         total = parseFloat(peso) * parseFloat(kcal);
    //         $("#kcal_dia").val(total);
    //     }
    // });

    // $("#proteina_kg").on('blur', function(){
    //     peso = $("#peso").val();
    //     proteina = $(this).val();
    //     if(peso != '' && proteina != ''){
    //         proteina = proteina.replace(",", ".");
    //         total = parseFloat(peso) * parseFloat(proteina);
    //         $("#proteina_dia").val(total);
    //     }
    // });

    // $("#agua_kg").on('blur', function(){
    //     peso = $("#peso").val();
    //     agua = $(this).val();
    //     if(peso != '' && agua != ''){
    //         total = parseInt(peso) * parseInt(agua);
    //         $("#agua_dia").val(total);
    //     }
    // });

    // $("#up_kcal_kg").on('blur', function(){
    //     peso = $("#up_peso").val();
    //     kcal = $(this).val();
    //     if(peso != '' && kcal != ''){
    //         total = parseFloat(peso) * parseFloat(kcal);
    //         $("#up_kcal_dia").val(total);
    //     }
    // });

    // $("#up_proteina_kg").on('blur', function(){
    //     peso = $("#up_peso").val();
    //     proteina = $(this).val();
    //     if(peso != '' && proteina != ''){
    //         proteina = proteina.replace(",", ".");
    //         total = parseFloat(peso) * parseFloat(proteina);
    //         $("#up_proteina_dia").val(total);
    //     }
    // });

    // $("#up_agua_kg").on('blur', function(){
    //     peso = $("#up_peso").val();
    //     agua = $(this).val();
    //     if(peso != '' && agua != ''){
    //         total = parseInt(peso) * parseInt(agua);
    //         $("#up_agua_dia").val(total);
    //     }
    // });

    $("#btn_realizar_calculo").on("click", function(){
        $("#div_valores").show();
        $(".div_calculo").show();
        $("#kcal_dia").attr("readonly", true);
        $("#proteina_dia").attr("readonly", true);
        $("#agua_dia").attr("readonly", true);
    });

    $("#btn_valores_manualmente").on("click", function(){
        $("#div_valores").show();
        $(".div_calculo").hide();
        $("#kcal_dia").attr("readonly", false);
        $("#proteina_dia").attr("readonly", false);
        $("#agua_dia").attr("readonly", false);
    });

    $("#btn_realizar_calculo").on("click", function(){
        $("#div_valores").show();
        $(".div_calculo").show();
        $("#kcal_dia").attr("readonly", true);
        $("#proteina_dia").attr("readonly", true);
        $("#agua_dia").attr("readonly", true);
    });

    $("#btn_valores_manualmente_atualizar").on("click", function(){
        $("#div_valores_atualizar").show();
        $(".div_calculo_atualizar").hide();
        $("#up_kcal_dia").attr("readonly", false);
        $("#up_proteina_dia").attr("readonly", false);
        $("#up_agua_dia").attr("readonly", false);
    });

    $("#btn_realizar_calculo_atualizar").on("click", function(){
        $("#div_valores_atualizar").show();
        $(".div_calculo_atualizar").show();
        $("#up_kcal_dia").attr("readonly", true);
        $("#up_proteina_dia").attr("readonly", true);
        $("#up_agua_dia").attr("readonly", true);
    });

    $("#cadastrar_novo_relatorio").on("click", function(){
        fc_cadastrar_paciente();
    });

    $('.numcomma').keypress(function(event) {
        var $this = $(this);
        if ((event.which != 44 || $this.val().indexOf(',') != -1) &&
           ((event.which < 48 || event.which > 57) &&
           (event.which != 0 && event.which != 8))) {
               event.preventDefault();
        }
        var text = $(this).val();
        if ((event.which == 44) && (text.indexOf(',') == -1)) {
            setTimeout(function() {
                if ($this.val().substring($this.val().indexOf(',')).length > 3) {
                    $this.val($this.val().substring(0, $this.val().indexOf(',') + 3));
                }
            }, 1);
        }
        if ((text.indexOf(',') != -1) &&
            (text.substring(text.indexOf(',')).length > 5) &&
            (event.which != 0 && event.which != 8) &&
            ($(this)[0].selectionStart >= text.length - 5)) {
                event.preventDefault();
        }
    });

    $(".plusminus").inputSpinner();  

    // cadastro   =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $("input[name=cpf_possui]").change(function() {
        if(this.checked) {
            $("#cpf").removeClass("error");
            $("#cpf").prop('required', false);
            $("#cpf").prop('disabled', true);
        }else{
            $("#cpf").prop('disabled', false);
            $("#cpf").prop('required', true);
        }
    });
    $("input[name=mae_possui]").change(function() {
        if(this.checked) {
            $("#mae").removeClass("error");
            $("#mae").prop('required', false);
            $("#mae").prop('disabled', true);
        }else{
            $("#mae").prop('disabled', false);
            $("#mae").prop('required', true);
        }
    });
    $(".tabsec").removeClass('active').addClass('disabledTab');  //tirar 2023-05-11 ---------------------------------------------------------------
    $("#cadastrar_paciente").on("click", function(e) {
        $(this).removeClass( "btn-secondary" ).addClass( "btn-warning" );
        $("#buscar_paciente").removeClass( "btn-warning" ).addClass( "btn-secondary" );
        $("#div_cadastrar_paciente").show();
        $("#div_buscar_paciente").hide();
    });
    $("#buscar_paciente").on("click", function(e) {
        $(this).removeClass( "btn-secondary" ).addClass( "btn-warning" );
        $("#cadastrar_paciente").removeClass( "btn-warning" ).addClass( "btn-secondary" );
        $("#div_cadastrar_paciente").hide();
        $("#div_buscar_paciente").show();
    });
    $("input[name=up_cpf_possui]").change(function() {
        if(this.checked) {
            $("#up_cpf").removeClass("error");
            $("#up_cpf").prop('required', false);
            $("#up_cpf").prop('disabled', true);
        }else{
            $("#up_cpf").prop('disabled', false);
            $("#up_cpf").prop('required', true);
        }
    });
    $("input[name=up_mae_possui]").change(function() {
        if(this.checked) {
            $("#up_mae").removeClass("error");
            $("#up_mae").prop('required', false);
            $("#up_mae").prop('disabled', true);
        }else{
            $("#up_mae").prop('disabled', false);
            $("#up_mae").prop('required', true);
        }
    });
    $("#gerar_relatorio").on("click", function(e) {
        $("#div_botao_valores").show();
        $("#div_valores_atualizar").hide();
        $("#div_valores_atualizar input").val('');
        $("#div_botao_cadastrar_relatorio").show();
        $("#div_botao_atualizar_valores").hide();
    });

    $("#iniciar_nova_prescricao").on("click", function(){
        $("#div_botao_atualizar_valores").show();
        $("#div_botao_cadastrar_relatorio").hide();
        $('#id_relatorio').val('');
        $('#relatorio_code').val('');

        fc_salvar('calculo', false);        

        $('.tabcadastro a').removeClass('active');
        $('#cadastro').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabcalculo").removeClass('disabledTab');
        $('.tabcalculo a').addClass('active');
        $('#calculo').addClass('active').addClass('show').attr('aria-expanded','true');

        $(".tabsec").removeClass('disabledTab').addClass('active');

        $("#rel_gerar_relatorio").removeClass("none");
        $("#rel_imprimir_relatorio").addClass("none");
    })
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // historico  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $("#historia_salvar").on("click", function(e) {
        fc_salvar('historia', true);
    });
    $("#historia_voltar").on("click", function(e) {
        $(".tabhistoria").addClass('disabledTab');
        $('.tabhistoria a').removeClass('active');
        $('#historia').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabcadastro a').addClass('active');
        $('#cadastro').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $("#historia_avancar").on("click", function(e) {
        fc_salvar('historia', false);
        $('.tabhistoria a').removeClass('active');
        $('#historia').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabavaliacao").removeClass('disabledTab');
        $('.tabavaliacao a').addClass('active');
        $('#avaliacao').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // avaliação nutricional  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $("#avaliacao_salvar").on("click", function(e) {
        fc_salvar('avaliacao', true);
    });
    $("#avaliacao_voltar").on("click", function(e) {
        $(".tabavaliacao").addClass('disabledTab');        
        $('.tabavaliacao a').removeClass('active');
        $('#avaliacao').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabhistoria a').addClass('active');
        $('#historia').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $("#avaliacao_avancar").on("click", function(e) {
        fc_salvar('avaliacao', false);
        necessidades_peso_checar();
        $('.tabavaliacao a').removeClass('active');
        $('#avaliacao').removeClass('active').removeClass('show').attr('aria-expanded','false');

        $(".tabnecessidades").removeClass('disabledTab'); 
        $('.tabnecessidades a').addClass('active');
        $('#necessidades').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $("input[name='altura_valor']").on("keypress keyup", function(e) {
        if (($("#altura").val() != "") && ($("#altura_valor").val() != "") && ($("#altura_valor").val() != "0.00") && ($(".antropometria").find(".select_peso").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "0.000")){
            avaliacao_antropometria($(this), false);
        }
    });
    $(".select_altura").on("change", function(e) {
        if (($("#altura").val() != "") && ($("#altura_valor").val() != "") && ($("#altura_valor").val() != "0.00") && ($(".antropometria").find(".select_peso").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "0.000")){
            avaliacao_antropometria($(this).parent().parent().find("input[name='altura_valor']"), false);
        }
    });
    $(".input_peso_valor").on("keypress keyup", function(e) {
        if (($("#altura").val() != "") && ($("#altura_valor").val() != "") && ($("#altura_valor").val() != "0.00") && ($(".antropometria").find(".select_peso").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "0.000")){
            avaliacao_antropometria($(this), true);            
        }
    });
    $(".select_peso").on("change", function(e) {
        if (($("#altura").val() != "") && ($("#altura_valor").val() != "") && ($("#altura_valor").val() != "0.00") && ($(".antropometria").find(".select_peso").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "0.000")){
            avaliacao_antropometria($(this).parent().parent().find(".input_peso_valor"), true);            
        }
    });
    $(".select_peso").on("click", function(e) {
        var _this = $(this);
        var _id = _this.attr("id");
        var _option = _this.find(':selected').val();
        $("select[id='"+_id+"'] option").removeAttr("disabled");
        $(".antropometria .select_peso").each(function() {
            if ($(this).attr("id") != _id){
                var __option = $(this).find(':selected').val();
                if (__option != ""){
                    $("select[id='"+_id+"'] option:contains('"+__option+"')").attr("disabled","disabled");
                }                
            }
        });
    });
    $('.acalorias').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        $("#tab_calorias").val(target);
    });
    $(".btn_peso_mc_add").on("click", function(e) {
        if (($("#altura").val() != "") && ($("#altura_valor").val() != "") && ($("#altura_valor").val() != "0.00") && ($(".antropometria").find(".select_peso").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "0.000")){
            var antropometria = $(this).closest(".antropometria");
            var divClone = antropometria.clone(true);
            var p = $.now();
            divClone.find(".input_peso_valor").val("");
            divClone.find(".input_imc").val("");
            divClone.find(".select_peso").val("").change();
            divClone.find(".btn_peso_mc_add").remove();
            divClone.find('.select_peso').attr('name', 'peso[' + p +']').end();
            divClone.find('.select_peso').attr('id', 'peso[' + p +']').end();
            divClone.find(".btn_peso_mc_rm").removeClass("none");
            $(".antropometria_col").append(divClone);          
        }
    });
    $(".btn_peso_mc_rm").on("click", function(e) {
        $(this).closest(".antropometria").remove();
    });

    $(".btn_circunferencias_add").on("click", function(e) {
        if ( ($(".circunferencias").find(".select_circunferencias").val() != "") && 
             ($(".circunferencias").find(".input_circunferencias_valor").val() != "") && 
             ($(".circunferencias").find(".input_circunferencias_valor").val() != "0.00")
            ){
            
            var liberar = true;
            if ($(".circunferencias").find(".select_circunferencias").val() != "Circunferência da cintura"){
                if ($('.circunferencia_lado').is(':checked')){
                    liberar = true;
                }
                else{
                    liberar = false;
                }
            }
            if (liberar){
                var circunferencias = $(this).closest(".circunferencias");
                var divClone = circunferencias.clone(true);            
                var p = $.now();
                divClone.find(".input_circunferencias_valor").val("");
                divClone.find(".select_circunferencias").val("").change();
                divClone.find('.select_circunferencias').attr('name', 'circunferencias[' + p +']').end();
                divClone.find('.select_circunferencias').attr('id', 'circunferencias[' + p +']').end();
                divClone.find('input:radio').attr('name', 'circunferencia_lado[' + p +']').end();
                divClone.find('.circunferencia_lado_direito').attr('id', 'circunferencia_lado_direito[' + p +']').end();
                divClone.find('.circunferencia_lado_esquerdo').attr('id', 'circunferencia_lado_esquerdo[' + p +']').end();
                divClone.find('.circunferencia_lado_direito').prop('checked', false);
                divClone.find('.circunferencia_lado_esquerdo').prop('checked', false);
                divClone.find('.circunferencia_lado_direito_label').attr('for', 'circunferencia_lado_direito[' + p +']').end();
                divClone.find('.circunferencia_lado_esquerdo_label').attr('for', 'circunferencia_lado_esquerdo[' + p +']').end();
                divClone.find(".btn_circunferencias_add").remove();
                divClone.find(".btn_circunferencias_rm").removeClass("none");
                $(".circunferencias_col").append(divClone);
            }
        }
    });
    $(".btn_circunferencias_rm").on("click", function(e) {
        $(this).closest(".circunferencias").remove();
    });
    $(".select_circunferencias").on("click", function(e) {
        var _this = $(this);
        var _id = _this.attr("id");        
        var _option = _this.find(':selected').val();
        var _select_array = [];
        $("select[id='"+_id+"'] option").removeAttr("disabled");
        $(".circunferencias .select_circunferencias").each(function() {
            if ($(this).attr("id") != _id){
                var __option = $(this).find(':selected').val();
                radio_lado = $(this).parent().parent().find('input.circunferencia_lado[type=radio]:checked').val();
                _select_array.push(__option+"_"+radio_lado);
            }
        });
        $(".circunferencias .select_circunferencias").each(function() {
            if ($(this).attr("id") != _id){
                var __option = $(this).find(':selected').val();
                if (($.inArray(__option+'_Direito', _select_array) != -1) && ($.inArray(__option+'_Esquerdo', _select_array) != -1)){
                    $("select[id='"+_id+"'] option:contains('"+__option+"')").attr("disabled","disabled");
                }
                else if ((__option =="Circunferência da cintura") && ($.inArray(__option+'_undefined', _select_array) != -1)){
                    $("select[id='"+_id+"'] option:contains('"+__option+"')").attr("disabled","disabled");
                }
            }
        });
        console.log(_select_array);
    });
    $(".select_circunferencias").on("change", function(e) {
        var _this = $(this);
        var _id = _this.attr("id");
        var _select_array = [];
        $(".circunferencias .select_circunferencias").each(function() {
            if ($(this).attr("id") != _id){
                var __option = $(this).find(':selected').val();
                radio_lado = $(this).parent().parent().find('input.circunferencia_lado[type=radio]:checked').val();
                _select_array.push(__option+"_"+radio_lado);
            }
        });
        if ($(this).val() == "Circunferência da cintura"){
            $(this).parent().parent().find(".circunferencia_lados").css({ "opacity": "0", "pointer-events": "none" });
        }
        else{
            if ($.inArray($(this).val()+'_Direito', _select_array) != -1){
                $(this).parent().parent().find('input.circunferencia_lado[type=radio][value="Direito"]').attr("disabled","disabled");
            }
            else{
                $(this).parent().parent().find('input.circunferencia_lado[type=radio][value="Direito"]').removeAttr("disabled");
            }
            if ($.inArray($(this).val()+'_Esquerdo', _select_array) != -1){
                $(this).parent().parent().find('input.circunferencia_lado[type=radio][value="Esquerdo"]').attr("disabled","disabled");
            }
            else{
                $(this).parent().parent().find('input.circunferencia_lado[type=radio][value="Esquerdo"]').removeAttr("disabled"); 
            }
            $(this).parent().parent().find(".circunferencia_lados").css({ "opacity": "1", "pointer-events": "auto" });
        }
    });

    $("#atualizar_valores").on("click", function(){
        fc_salvar("calculo");

        $('.tabcadastro a').removeClass('active');
        $('#cadastro').removeClass('active').removeClass('show').attr('aria-expanded','false');

        $(".tabcalculo").removeClass('disabledTab');
        $('.tabcalculo a').addClass('active');
        $('#calculo').addClass('active').addClass('show').attr('aria-expanded','true');

        $(".tabsec").removeClass('disabledTab').addClass('active');
    })

    $(".btn_dobras_add").on("click", function(e) {
        if ( ($(".dobras").find(".select_dobras").val() != "") && ($(".dobras").find(".input_dobras_valor").val() != "") && ($(".dobras").find(".input_dobras_valor").val() != "0.00") && ($('.dobras_lado').is(':checked')) ){
            var dobras = $(this).closest(".dobras");
            var divClone = dobras.clone(true);
            var p = $.now();
            divClone.find(".input_dobras_valor").val("");
            divClone.find(".select_dobras").val("").change();
            divClone.find('.select_dobras').attr('name', 'dobras[' + p +']').end();
            divClone.find('.select_dobras').attr('id', 'dobras[' + p +']').end();
            divClone.find('input:radio').attr('name', 'dobras_lado[' + p +']').end();            
            divClone.find('.dobras_lado_direito').attr('id', 'dobras_lado_direito[' + p +']').end();
            divClone.find('.dobras_lado_esquerdo').attr('id', 'dobras_lado_esquerdo[' + p +']').end();
            divClone.find('.dobras_lado_direito').prop('checked', false);
            divClone.find('.dobras_lado_esquerdo').prop('checked', false);
            divClone.find('.dobras_lado_direito_label').attr('for', 'dobras_lado_direito[' + p +']').end();
            divClone.find('.dobras_lado_esquerdo_label').attr('for', 'dobras_lado_esquerdo[' + p +']').end();
            divClone.find(".btn_dobras_add").remove();
            divClone.find(".btn_dobras_rm").removeClass("none");
            $(".dobras_col").append(divClone);
        }
    });
    $(".btn_dobras_rm").on("click", function(e) {
        $(this).closest(".dobras").remove();
    });
    $(".select_dobras").on("click", function(e) {
        var _this = $(this);
        var _id = _this.attr("id");
        var _select_array = [];
        $("select[id='"+_id+"'] option").removeAttr("disabled");
        $(".dobras .select_dobras").each(function() {
            if ($(this).attr("id") != _id){
                var __option = $(this).find(':selected').val();
                radio_lado = $(this).parent().parent().find('input.dobras_lado[type=radio]:checked').val();
                _select_array.push(__option+"_"+radio_lado);
            }
        });
        $(".dobras .select_dobras").each(function() {
            if ($(this).attr("id") != _id){            
                var __option = $(this).find(':selected').val();
                if (($.inArray(__option+'_Direito', _select_array) != -1) && ($.inArray(__option+'_Esquerdo', _select_array) != -1)){
                    $("select[id='"+_id+"'] option:contains('"+__option+"')").attr("disabled","disabled");
                }
                else if ((__option =="Dobra abdominal") && ($.inArray(__option+'_undefined', _select_array) != -1)){
                    $("select[id='"+_id+"'] option:contains('"+__option+"')").attr("disabled","disabled");
                }
            }
        });
    });
    $(".select_dobras").on("change", function(e) {
        var _this = $(this);
        var _id = _this.attr("id");
        var _select_array = [];
        $(".dobras .select_dobras").each(function() {
            if ($(this).attr("id") != _id){
                var __option = $(this).find(':selected').val();
                radio_lado = $(this).parent().parent().find('input.dobras_lado[type=radio]:checked').val();
                _select_array.push(__option+"_"+radio_lado);
            }
        });
        if ($(this).val() == "Dobra abdominal"){
            $(this).parent().parent().find(".dobras_lados").css({ "opacity": "0", "pointer-events": "none" });
        }
        else{
            if ($.inArray($(this).val()+'_Direito', _select_array) != -1){
                $(this).parent().parent().find('input.dobras_lado[type=radio][value="Direito"]').attr("disabled","disabled");
            }
            else{
                $(this).parent().parent().find('input.dobras_lado[type=radio][value="Direito"]').removeAttr("disabled");
            }
            if ($.inArray($(this).val()+'_Esquerdo', _select_array) != -1){
                $(this).parent().parent().find('input.dobras_lado[type=radio][value="Esquerdo"]').attr("disabled","disabled");
            }
            else{
                $(this).parent().parent().find('input.dobras_lado[type=radio][value="Esquerdo"]').removeAttr("disabled"); 
            }
            $(this).parent().parent().find(".dobras_lados").css({ "opacity": "1", "pointer-events": "auto" });
        }
    });
    $('#data').change(function () {
        var dateEntered = $(this).val();
        var d_date = dateEntered.substring(0, 2);
        var d_month = dateEntered.substring(3, 5);
        var d_year = dateEntered.substring(6, 10);
        var dateToCompare = new Date(d_year, d_month - 1, d_date);

        var currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0);

        if (dateToCompare <= currentDate) {
        }else {            
            $('#data').val("");
            $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: 'Por favor, não informar data superior à atual.'
                });
        }
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // necessidades nutricionais  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $(".plusminus_ptn").inputSpinner({
        /*template:   '<div class="input-group ${groupClass}">' +
                    '<button style="min-width: ${buttonsWidth}" class="btn btn-decrement ${buttonsClass} btn-minus" type="button">${decrementButton}</button>' +
                    '<input type="text" inputmode="decimal" style="text-align: ${textAlign}" class="form-control ddd form-control-text-input" />' +
                    '<button style="min-width: ${buttonsWidth}" class="btn btn-increment ${buttonsClass} btn-plus" type="button">${incrementButton}</button>' +
                    '</div>'*/
    }); 
    $('a[data-toggle="tab"][href="#necessidades"]').on('shown.bs.tab', function (e) {
        necessidades_peso_checar();
    });
    $("#necessidades_salvar").on("click", function(e) {
        fc_salvar('necessidades', true);
    });
    $("#necessidades_voltar").on("click", function(e) {
        $(".tabnecessidades").addClass('disabledTab');    
        $('.tabnecessidades a').removeClass('active');
        $('#necessidades').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabavaliacao a').addClass('active');
        $('#avaliacao').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $("#necessidades_avancar").on("click", function(e) {
        fc_salvar('necessidades', false);
        necessidades_peso_checar();
        $('.tabnecessidades a').removeClass('active');
        $('#necessidades').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabcalculo").removeClass('disabledTab');
        $('.tabcalculo a').addClass('active');
        $('#calculo').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $('#nec_calorias_peso').on('change', function() {
        $("#nec_calorias_peso_valor").val( $("#peso_valor").val() );
    });
    $('#nec_proteinas_peso').on('change', function() {
        $("#nec_proteinas_peso_valor").val( $("#peso_valor").val() );
    });
    $('#nec_agua_peso').on('change', function() {
        $("#nec_agua_peso_valor").val( $("#peso_valor").val() );
    });
    $("#nec_calorias_peso").on("change", function(e) {
        necessidades_peso($(this));        
    });
    $("#nec_proteinas_peso").on("change", function(e) {
        necessidades_peso($(this));        
    });
    $("#nec_agua_peso").on("change", function(e) {
        necessidades_peso($(this));        
    });
    $("#kcal_dia").on("change keypress keyup", function(e) {
        necessidades_calorias_total($(this), e);
    });
    $("#proteina_dia").on("change keypress keyup", function(e) {
        necessidades_proteinas_total($(this), e);
    });
    $("#agua_dia").on("change keypress keyup", function(e) {
        necessidades_agua_total($(this), e);
    });

    $("#kcal_kg").on("change keypress keyup", function(e) {
        peso = $("#peso").val();
        kcal = $(this).val();
        if(peso != '' && kcal != ''){
            total = parseFloat(peso) * parseFloat(kcal);
            $("#kcal_dia").val(total);
        }
        necessidades_calorias_total($(this), e);
    });
    $("#proteina_kg").on("change keypress keyup", function(e) {
        peso = $("#peso").val();
        proteina = $(this).val();
        if(peso != '' && proteina != ''){
            proteina = proteina.replace(",", ".");
            total = parseFloat(peso) * parseFloat(proteina);
            $("#proteina_dia").val(total);
        }
        necessidades_proteinas_total($(this), e);
    });
    $("#agua_kg").on("change keypress keyup", function(e) {
        peso = $("#peso").val();
        agua = $(this).val();
        if(peso != '' && agua != ''){
            total = parseInt(peso) * parseInt(agua);
            $("#agua_dia").val(total);
        }
        necessidades_agua_total($(this), e);
    });

    $("#up_kcal_dia").on("change keypress keyup", function(e) {
        necessidades_calorias_total_atualizar($(this), e);
    });
    $("#up_proteina_dia").on("change keypress keyup", function(e) {
        necessidades_proteinas_total_atualizar($(this), e);
    });
    $("#up_agua_dia").on("change keypress keyup", function(e) {
        necessidades_agua_total_atualizar($(this), e);
    });

    $("#up_kcal_kg").on("change keypress keyup", function(e) {
        peso = $("#up_peso").val();
        kcal = $(this).val();
        if(peso != '' && kcal != ''){
            total = parseFloat(peso) * parseFloat(kcal);
            $("#up_kcal_dia").val(total);
        }
        necessidades_calorias_total_atualizar($(this), e);
    });
    $("#up_proteina_kg").on("change keypress keyup", function(e) {
        peso = $("#up_peso").val();
        proteina = $(this).val();
        if(peso != '' && proteina != ''){
            proteina = proteina.replace(",", ".");
            total = parseFloat(peso) * parseFloat(proteina);
            $("#up_proteina_dia").val(total);
        }
        necessidades_proteinas_total_atualizar($(this), e);
    });
    $("#up_agua_kg").on("change keypress keyup", function(e) {
        peso = $("#up_peso").val();
        agua = $(this).val();
        if(peso != '' && agua != ''){
            total = parseInt(peso) * parseInt(agua);
            $("#up_agua_dia").val(total);
        }
        necessidades_agua_total_atualizar($(this), e);
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    



    // cálculo de terapia nutricional =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $("#calculo_salvar").on("click", function(e) {
        fc_salvar('calculo', true);
    });
    $('a[data-toggle="tab"][href="#calculo"]').on('shown.bs.tab', function (e) {
        // necessidades_peso_checar();
    });
    $("#calculo_voltar").on("click", function(e) {
        $(".tabcalculo").addClass('disabledTab');    
        $('.tabcalculo a').removeClass('active');
        $('#calculo').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabcadastro a').addClass('active');
        $('#cadastro').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $('#calculo_avancar').on('click', function() {
        if ((!$("input[name='dispositivo']:checked").val()) && ($("input[name='tipo_produto']:checked").val() != "Suplemento") ) {
            $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: 'Por favor, é necessário selecionar o dispositivo.'
                });
            return false;
        }if ((!$("input[name='dispositivo']:checked").val()) && ($("input[name='tipo_produto']:checked").val() != "Suplemento") ) {
            $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: 'Por favor, é necessário selecionar o dispositivo.'
                });
            return false;
        }
        else{
            if ($( "input[name*='calculo_apres_']" ).is(':checked') ){
                fc_salvar('calculo', false);

                if ($("input[name='tipo_produto']:checked").val() == 'Suplemento') {
                    salvar_calculo_fracionamento(null);
                }
                else{
                    $('#modal_fracionamento').modal('toggle');
                }                
            }
            else{
                $.alert({
                        title: 'Atenção',
                        icon: 'fa fa-warning',
                        type: 'red',
                        content: 'Por favor, é necessário selecionar uma apresentação.'
                    });
                return false;
            }
        }
    });
    $('input[name="produto_especializado"]').on("click", function(e) {
        busca_produto_relatorio($("#margem_calorica").val(), $("#margem_proteica").val());
    });

    $('input[name="calculo_fil_semsacarose"]').on("click", function(e) {
        if($(this).is(":checked")){
            if($("#calculo_produto_especializado").is(":checked")){
                return;
            }else{
                $("label[for='calculo_produto_especializado']").click();
            }
        }
    });

    $('input[name="calculo_fil_semsacarose2"]').on("click", function(e) {
        if($(this).is(":checked")){
            if($("#calculo_produto_especializado").is(":checked")){
                return;
            }else{
                $("label[for='calculo_produto_especializado']").click();
            }
        }
    });

    $('.entric_query input[type=radio], #apresentacao input[type=checkbox], #fracionamento_dia').on("keyup change", function(e) {
        busca_produto_relatorio();
    });
    $("#salvar_alteracoes").on("click", function(e) {
        isValidFrac = true;
        $('.fracio_horario .hora').each(function(index) {
            const horario = $(this).val().trim();
            if (!horario) {
                isValidFrac = false;
                $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: 'O horário ' + (index + 1) + ' é obrigatório.'
                });
            } 
        });

        if($("#calculo_apres_fechado").filter(":checked").length > 0){
            if(isValidFrac){
                if($("#h_i_dieta").val() == ""){
                    isValidFrac = false;
                    $.alert({
                        title: 'Atenção',
                        icon: 'fa fa-warning',
                        type: 'red',
                        content: 'O campo "Horário de Início da dieta:" é obrigatório.'
                    });
                }
            }

            if(isValidFrac){
                if($("#h_inf_dieta").val() == ""){
                    isValidFrac = false;
                    $.alert({
                        title: 'Atenção',
                        icon: 'fa fa-warning',
                        type: 'red',
                        content: 'O campo "Quantas horas de infusão da dieta por dia?" é obrigatório.'
                    });
                }
            }
        }

        if($("#calculo_apres_aberto_liquido").filter(":checked").length > 0 || $("#calculo_apres_aberto_po").filter(":checked").length > 0){
            if(isValidFrac){
                if($("#fracionamento_dia").val() == ""){
                    isValidFrac = false;
                    $.alert({
                        title: 'Atenção',
                        icon: 'fa fa-warning',
                        type: 'red',
                        content: 'O campo "Fracionamento / Dia:" é obrigatório.'
                    });
                }
            }

            if(isValidFrac){
                if($("#qtas_horas").val() == ""){
                    isValidFrac = false;
                    $.alert({
                        title: 'Atenção',
                        icon: 'fa fa-warning',
                        type: 'red',
                        content: 'O campo "Em quantas horas cada dieta deve correr?" é obrigatório.'
                    });
                }
            }
        }




        isValidHid = true;
        $('.hidratacao_horarios .hora').each(function(index) {
            const horario = $(this).val().trim();
            if (!horario) {
                isValidHid = false;
                $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: 'O horário ' + (index + 1) + ' é obrigatório.'
                });
            } 
        });

        if($("#hidratacao_dia").val() != '' && $("#hidratacao_dia").val() != '0'){
            if($("#volume_horario").val() == ""){
                isValidHid = false;
                $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: 'O volume por horário é obrigatório.'
                });
            }
        }

        if (isValidFrac && isValidHid) {
            salvar_calculo_fracionamento($(this));
        }
        
    });
    $("#salvar_selecao").on("click", function(e) {
        if ($(".check_dieta").filter(":checked").length === 0) {
            $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: 'Por favor, é necessário selecionar pelo menos um produto.'
                });
            return false;
        }else{
            var _this = $(this);
            var _id_paciente = $("#id_paciente").val();
            var _id_relatorio = $("#id_relatorio").val();
            var formSerialize = $("#modal_form_selecao").serialize();
            b_lo(_this);

            $.ajax({
                type: "POST",
                url: "ajax/selecao_salvar_simplificada",
                data: formSerialize+"&id_paciente="+_id_paciente+"&id_relatorio="+_id_relatorio,
                cache: false,
                dataType: 'json',
                success: function( data ){
                    b_res(_this);

                    fc_salvar('calculo', false);
                    $('#modal_selecao').modal('toggle');
                    $('.tabcalculo a').removeClass('active');
                    $('#calculo').removeClass('active').removeClass('show').attr('aria-expanded','false');
            
                    $(".tabdistribuidores").removeClass('disabledTab');
                    $('.tabdistribuidores a').addClass('active');
                    $('#distribuidores').addClass('active').addClass('show').attr('aria-expanded','true');
                }
            });
        }
        

    });
    $('#calculo_apres_fechado').change(function () {
        if ($("input[name='calculo_apres_fechado']:checked").val() == 'Fechado') {
            $("#modal_sistema_fechado").show();
            if($('#modal_sistema_aberto').css('display') == 'block'){
                $('#modal_sistema_aberto').removeClass("col-sm-12").addClass("col-sm-6");
                $('#modal_sistema_fechado').removeClass("col-sm-12").addClass("col-sm-6");
                $('#modal_id').removeClass("modal-md").addClass("modal-lg");
            }
            else{
                $('#modal_sistema_fechado').removeClass("col-sm-6").addClass("col-sm-12");
                $('#modal_id').removeClass("modal-lg").addClass("modal-md");
            }
        }else{
            $("#modal_sistema_fechado").hide();
            if($('#modal_sistema_aberto').css('display') == 'block'){
                $('#modal_sistema_aberto').removeClass("col-sm-6").addClass("col-sm-12");
            }
            $('#modal_id').removeClass("modal-lg").addClass("modal-md");
        }
    });
    $('#calculo_apres_aberto_liquido').change(function () {
        if ($("input[name='calculo_apres_aberto_liquido']:checked").val() == 'Aberto (Líquido)') {
            $("#modal_sistema_aberto").show();

            if($('#modal_sistema_fechado').css('display') == 'block'){
                $('#modal_sistema_aberto').removeClass("col-sm-12").addClass("col-sm-6");
                $('#modal_sistema_fechado').removeClass("col-sm-12").addClass("col-sm-6");
                $('#modal_id').removeClass("modal-md").addClass("modal-lg");
            }
            else{
                $('#modal_sistema_aberto').removeClass("col-sm-6").addClass("col-sm-12");
                $('#modal_id').removeClass("modal-lg").addClass("modal-md");
            }

        }else{
            if ($("input[name='calculo_apres_aberto_po']:checked").val() == 'Aberto (Pó)'){
                if($('#modal_sistema_fechado').css('display') == 'block'){
                    $('#modal_sistema_aberto').removeClass("col-sm-12").addClass("col-sm-6");
                    $('#modal_sistema_fechado').removeClass("col-sm-12").addClass("col-sm-6");
                    $('#modal_id').removeClass("modal-md").addClass("modal-lg");
                }
                else{
                    $('#modal_sistema_aberto').removeClass("col-sm-6").addClass("col-sm-12");
                    $('#modal_id').removeClass("modal-lg").addClass("modal-md");
                }

            }else{
                $("#modal_sistema_aberto").hide();
                if($('#modal_sistema_fechado').css('display') == 'block'){
                    $('#modal_sistema_fechado').removeClass("col-sm-6").addClass("col-sm-12");
                }
                $('#modal_id').removeClass("modal-lg").addClass("modal-md");
            }
        }
    });    
    $('#calculo_apres_aberto_po').change(function () {
        if ($("input[name='calculo_apres_aberto_po']:checked").val() == 'Aberto (Pó)') {
            $("#modal_selecaoTitle").html("Seleção da dieta e diluição");
            $("#modal_sistema_aberto").show();

            if($('#modal_sistema_fechado').css('display') == 'block'){
                $('#modal_sistema_aberto').removeClass("col-sm-12").addClass("col-sm-6");
                $('#modal_sistema_fechado').removeClass("col-sm-12").addClass("col-sm-6");
                $('#modal_id').removeClass("modal-md").addClass("modal-lg");
            }
            else{
                $('#modal_sistema_aberto').removeClass("col-sm-6").addClass("col-sm-12");
                $('#modal_id').removeClass("modal-lg").addClass("modal-md");
            }

        }else{
            $("#modal_selecaoTitle").html("Seleção da dieta");

            if ($("input[name='calculo_apres_aberto_liquido']:checked").val() == 'Aberto (Líquido)'){
                if($('#modal_sistema_fechado').css('display') == 'block'){
                    $('#modal_sistema_aberto').removeClass("col-sm-12").addClass("col-sm-6");
                    $('#modal_sistema_fechado').removeClass("col-sm-12").addClass("col-sm-6");
                    $('#modal_id').removeClass("modal-md").addClass("modal-lg");
                }
                else{
                    $('#modal_sistema_aberto').removeClass("col-sm-6").addClass("col-sm-12");
                    $('#modal_id').removeClass("modal-lg").addClass("modal-md");
                }

            }else{
                $("#modal_sistema_aberto").hide();

                if($('#modal_sistema_fechado').css('display') == 'block'){
                    $('#modal_sistema_fechado').removeClass("col-sm-6").addClass("col-sm-12");
                }
                $('#modal_id').removeClass("modal-lg").addClass("modal-md");
            }
        }
    });
    $('.calculo_fil_todos').change(function () {
        var calculo_fil_todos = null;
        if ($(this).is(':checked')){
            calculo_fil_todos = $(this).val();
        }
        if ($("input[name='tipo_produto']:checked").val() == 'Suplemento') {
            if (calculo_fil_todos == 'Todos') {
                $('#apresentacao .filtros_oral .filtros').not(this).prop('checked', true);

            }else{
                $('#apresentacao .filtros_oral .filtros').not(this).prop('checked', false);
            }
        }else{
            if (calculo_fil_todos == 'Todos') {
                $('#apresentacao .filtros_nooral .filtros').not(this).prop('checked', true);

            }else{
                $('#apresentacao .filtros_nooral .filtros').not(this).prop('checked', false);
            }
        }
    });
    $('.filtros').change(function () {
        if ($(this).is(':checked')){
        }else{
            $('.calculo_fil_todos').prop( "checked", false);
        }
    });
    $('input:radio[name=tipo_produto]').change(function () {
        if ($("input[name='tipo_produto']:checked").val() == 'Suplemento') {
            $("#dispositivos").hide();
            $(".apres_oral").show();
            $(".apres_nooral").hide();
        }else{
            $("#dispositivos").show();
            $(".apres_nooral").show();
            $(".apres_oral").hide();
        }
    });
    $('input:radio[name=tipo_prescricao]').change(function () {
        if ($("input[name='tipo_prescricao']:checked").val() == 'Prescrição Manual') {
            $("#apresentacao").hide();
            $("#prescricao_nutricional").hide();
            $("#dietaenteral").show();
            stickyTop('combinacao1');

        }else{
            $("#apresentacao").show();
            $("#prescricao_nutricional").show();
            $("#dietaenteral").hide();
        }
    });
    $("#editar_prescricao").on("click", function(e) {    
        $(".tabcalculo").addClass('disabledTab');    
        $('.tabcalculo a').removeClass('active');
        $('#calculo').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabcadastro a').addClass('active');
        $('#cadastro').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    // -------------------------------------------------------------------------------------------------
    $(".btn_outra_dieta_add").on("click", function(e) {
        var divClone = $(this).parent().parent().parent().find(".div_nova_dieta:first").clone(true);
        var p = $.now();

        divClone.removeAttr("id");
        divClone.find(".div_formula_rm").removeClass("none");
        divClone.find("input:radio").attr('name', 'dieta_infusao[' + p +']').end();
        divClone.find("input[type='radio'][name='dieta_infusao[" + p +"]'][value='Contínua']").attr('id', 'infusao_continua[' + p +']').end();
        divClone.find("input[type='radio'][name='dieta_infusao[" + p +"]'][value='Fracionada']").attr('id', 'infusao_fracionada[' + p +']').end();
        divClone.find(".radio_continua").attr('for', 'infusao_continua[' + p +']').end();
        divClone.find(".radio_fracionada").attr('for', 'infusao_fracionada[' + p +']').end();
        divClone.find(".horario_inicio").attr('name', 'dieta_horario_inicio[' + p +']').end();
        divClone.find(".label_horario_inicio").attr('for', 'dieta_horario_inicio[' + p +']').end();
        divClone.find(".horario_administracao").attr('name', 'dieta_horario_administracao[' + p +']').end();
        divClone.find(".label_horario_administracao").attr('for', 'dieta_horario_administracao[' + p +']').end();
        divClone.find(".select2_ajax_formula").attr('name', 'dieta_formula[' + p +']').end();
        divClone.find(".select2_ajax_formula").parent().find(".select2-container--below").remove();
        divClone.find(".select2_ajax_formula").parent().find(".select2-container--default").remove();  

        divClone.find(".campos_limpar").val('');
        divClone.find(".hora").unbind();
        divClone.find(".numeros").unbind();
        $(this).parent().parent().parent().find(".nova_dieta").append(divClone);

        $('.hora').mask("99:99");
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
        var selector = $("select[name='dieta_formula[" + p +"]']");
        selector.removeAttr('data-live-search')
                .removeAttr('data-select2-id')
                .removeAttr('aria-hidden')
                .removeAttr('tabindex')
                .removeClass('select2-hidden-accessible');
        selector.find('option[value]').remove();
        selector.empty();
        selector.removeData();
        select2_ajax_formula(selector);
    });
    $(".btn_formula_rm").on("click", function(e) {
        $(this).closest(".div_nova_dieta").remove();
    });
    $('.radio_infusao').on("change", function(e) {
        if ($(this).filter(':checked').val() == 'Fracionada') {
            $(this).parent().parent().parent().find(".div_infusao_continua").hide();
            $(this).parent().parent().parent().find(".div_infusao_fracionada").show();
        }else{
            $(this).parent().parent().parent().find(".div_infusao_continua").show();
            $(this).parent().parent().parent().find(".div_infusao_fracionada").hide();
        }
        $('.hora').mask("99:99");
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
    });
    // -------------------------------------------------------------------------------------------------
    $(".btn_modulo_add").on("click", function(e) {
        var divClone = $(this).parent().parent().parent().find(".div_modulo:first").clone(true);
        var p = $.now();

        divClone.removeAttr("id").attr("id","modulo"+p);
        divClone.find(".div_produto_rm").removeClass("none");
        divClone.find(".modulo_horario").attr('name', 'horario[' + p +']').end();
        divClone.find(".modulo_volume_total").attr('name', 'modulo_volume_total[' + p +']').end();
        divClone.find(".select2_ajax_produto").attr('name', 'modulo_produto[' + p +']').end();
        divClone.find(".select2_ajax_produto").parent().find(".select2-container--below").remove();  
        divClone.find(".select2_ajax_produto").parent().find(".select2-container--default").remove();        
        
        divClone.find(".div_volume_total").not(':first').remove();
        divClone.find(".campos_limpar").val('');
        divClone.find(".hora").unbind();
        divClone.find(".numeros").unbind();
        $(this).parent().parent().parent().find(".modulo").append(divClone);

        $('.hora').mask("99:99");
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
        var selector = $("#modulo"+p).find("select[name='modulo_produto[" + p +"]']");
        selector.removeAttr('data-live-search')
                .removeAttr('data-select2-id')
                .removeAttr('aria-hidden')
                .removeAttr('tabindex')
                .removeClass('select2-hidden-accessible');
        selector.find('option[value]').remove();
        selector.empty();
        selector.removeData();
        select2_ajax_produto(selector);
    });
    $(".btn_produto_rm").on("click", function(e) {
        $(this).closest(".div_modulo").remove();
    });
    $(".btn_volume_total_add").on("click", function(e) {
        var divClone = $(this).closest(".div_volume_total").clone(true);
        var p = $.now();
        divClone.find(".btn_volume_total_add").remove();
        divClone.find(".btn_volume_total_rm").removeClass("none");

        divClone.find(".modulo_horario").attr('name', 'horario[' + p +']').end();
        divClone.find(".modulo_volume_total").attr('name', 'volume_total[' + p +']').end();

        divClone.find(".campos_limpar").val('');
        divClone.find(".hora").unbind();
        divClone.find(".numeros").unbind();

        $(this).closest(".div_volume_total_col").append(divClone);
        $('.hora').mask("99:99");
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
    });
    $(".btn_volume_total_rm").on("click", function(e) {
        $(this).closest(".div_volume_total").remove();
    });
    // -------------------------------------------------------------------------------------------------
    $(".btn_suplemento_add").on("click", function(e) {
        var divClone = $(this).parent().parent().parent().find(".div_suplemento:first").clone(true);
        var p = $.now();

        divClone.removeAttr("id");
        divClone.find(".div_suplemento_rm").removeClass("none");
        divClone.find(".suplemento_horario").attr('name', 'suplemento_horario[' + p +']').end();
        divClone.find(".suplemento_volume_total").attr('name', 'suplemento_volume_total[' + p +']').end();
        divClone.find(".select2_ajax_produto").attr('name', 'suplemento_produto[' + p +']').end();
        divClone.find(".select2_ajax_produto").parent().find(".select2-container--below").remove();
        divClone.find(".select2_ajax_produto").parent().find(".select2-container--default").remove();    
        
        divClone.find(".div_volume_total").not(':first').remove();
        divClone.find(".campos_limpar").val('');
        divClone.find(".hora").unbind();
        divClone.find(".numeros").unbind();
        $(this).parent().parent().parent().find(".suplemento").append(divClone);

        $('.hora').mask("99:99");
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
        var selector = $("select[name='suplemento_produto[" + p +"]']");
        selector.removeAttr('data-live-search')
                .removeAttr('data-select2-id')
                .removeAttr('aria-hidden')
                .removeAttr('tabindex')
                .removeClass('select2-hidden-accessible');
        selector.find('option[value]').remove();
        selector.empty();
        selector.removeData();
        select2_ajax_produto(selector);
    });
    $(".btn_suplemento_rm").on("click", function(e) {
        $(this).closest(".div_suplemento").remove();
    });
    $(".btn_suplemento_total_add").on("click", function(e) {
        var divClone = $(this).closest(".div_volume_total").clone(true);
        var p = $.now();

        divClone.find(".btn_suplemento_total_add").remove();
        divClone.find(".btn_suplemento_total_rm").removeClass("none");
        divClone.find(".suplemento_horario").attr('name', 'suplemento_horario[' + p +']').end();
        divClone.find(".suplemento_volume_total").attr('name', 'suplemento_volume_total[' + p +']').end();

        divClone.find(".campos_limpar").val('');
        divClone.find(".hora").unbind();
        divClone.find(".numeros").unbind();
        $(this).closest(".div_volume_total_col").append(divClone);

        $('.hora').mask("99:99");
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
    });
    $(".btn_suplemento_total_rm").on("click", function(e) {
        $(this).closest(".div_volume_total").remove();
    });
    select2_ajax_formula($(".select2_ajax_formula"));
    select2_ajax_produto($(".select2_ajax_produto"));
    $("#tab-combinacoes").on("click", "a", function(e) {
        e.preventDefault();
        $(this).tab('show');
    })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".combinacoes .nav-tabs li").children('a').first().click();
    });
    $('.nova-combinacao').click(function(e) {
        var tabs = $("#tab-combinacoes .nav-item").length-1;
        var navlink = $("#tab-combinacoes .nav-item:nth-child("+(tabs-1)+") .nav-link").attr("href");
        navlink = navlink.replace('#combinacao','');
        var id = parseInt(navlink)+1;

        var p = $.now();
        $('#li-nova-combinacao').before('<li class="nav-item"><span style="position: absolute;top: 6px; padding-left: 5px;color: #ee3900;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span><a href="#combinacao'+id+'" class="nav-link combinacao'+id+'" data-toggle="tab">Combinação '+id+'</a> </li>');

        // https://stackoverflow.com/questions/47577966/does-not-capture-events-after-cloning-jquery-bootstrap
        var divClone = $("#combinacao1").clone();
        
        divClone.removeClass("show active");
        divClone.removeAttr("id").attr("id","combinacao"+id);

        divClone.find('.accor_dietal').attr("id","accor_dietal"+id);
        divClone.find('.accor_dietal_head').attr("id","accor_dietal_head"+id);
        divClone.find('.accor_dietal_head a').addClass("collapsed");
        divClone.find('.accor_dietal_head a').attr("data-parent","#accor_body"+id);
        divClone.find('.accor_dietal_head a').attr("data-target","#accor_body"+id);
        divClone.find('.accor_dietal_head a').attr("aria-expanded","false");
        divClone.find('.accor_dietal_head a').attr("aria-controls","accor_body"+id);
        divClone.find('.accor_body').attr("id","accor_body"+id);
        divClone.find('.accor_body').attr("aria-labelledby","accor_dietal_head"+id);
        divClone.find('.accor_body').attr("data-parent","#accor_dietal"+id);
        divClone.find('.accor_body').removeClass("show");

        divClone.find('.accor_modulo').removeAttr("id").attr("id","accor_modulo"+id);
        divClone.find('.accor_modulo_head').removeAttr("id").attr("id","accor_modulo_head"+id);
        divClone.find('.accor_modulo_head a').addClass("collapsed");
        divClone.find('.accor_modulo_head a').attr("data-target","#accor_modulo_body"+id);
        divClone.find('.accor_modulo_head a').attr("aria-expanded","false");
        divClone.find('.accor_modulo_head a').attr("aria-controls","accor_modulo_body"+id);
        divClone.find('.accor_modulo_body').removeAttr("id").attr("id","accor_modulo_body"+id);
        divClone.find('.accor_modulo_body').attr("aria-labelledby","accor_modulo_head"+id);
        divClone.find('.accor_modulo_body').attr("data-parent","#accor_modulo"+id);
        divClone.find('.accor_modulo_body').removeClass("show");

        divClone.find('.accor_suplemento').removeAttr("id").attr("id","accor_suplemento"+id);
        divClone.find('.accor_suplemento_head').removeAttr("id").attr("id","accor_suplemento_head"+id);
        divClone.find('.accor_suplemento_head a').addClass("collapsed");
        divClone.find('.accor_suplemento_head a').attr("data-target","#accor_suplemento_body"+id);
        divClone.find('.accor_suplemento_head a').attr("aria-expanded","false");
        divClone.find('.accor_suplemento_head a').attr("aria-controls","accor_suplemento_body"+id);
        divClone.find('.accor_suplemento_body').removeAttr("id").attr("id","accor_suplemento_body"+id);
        divClone.find('.accor_suplemento_body').attr("aria-labelledby","accor_suplemento_head"+id);
        divClone.find('.accor_suplemento_body').attr("data-parent","#accor_suplemento"+id);
        divClone.find('.accor_suplemento_body').removeClass("show");

        divClone.find('.accor_hidratacao').removeAttr("id").attr("id","accor_hidratacao"+id);
        divClone.find('.accor_hidratacao_head').removeAttr("id").attr("id","accor_hidratacao_head"+id);
        divClone.find('.accor_hidratacao_head a').addClass("collapsed");
        divClone.find('.accor_hidratacao_head a').attr("data-target","#accor_hidratacao_body"+id);
        divClone.find('.accor_hidratacao_head a').attr("aria-expanded","false");
        divClone.find('.accor_hidratacao_head a').attr("aria-controls","accor_hidratacao_body"+id);
        divClone.find('.accor_hidratacao_body').removeAttr("id").attr("id","accor_hidratacao_body"+id);
        divClone.find('.accor_hidratacao_body').attr("aria-labelledby","accor_hidratacao_head"+id);
        divClone.find('.accor_hidratacao_body').attr("data-parent","#accor_hidratacao"+id);
        divClone.find('.accor_hidratacao_body').removeClass("show");

        divClone.find('.div_nova_dieta').not(':first').remove();
        divClone.find('.div_modulo').not(':first').remove();
        divClone.find('.div_modulo').find('.div_volume_total').not(':first').remove();
        divClone.find('.div_suplemento').not(':first').remove();
        divClone.find('.div_suplemento').find('.div_volume_total').not(':first').remove();
        divClone.find(".campos_limpar").val('');
        divClone.find(".select2_formula").attr('name', 'dieta_formula[' + p +']').end();
        divClone.find(".select2_formula").parent().find(".select2-container--below").remove();  
        divClone.find(".select2_formula").parent().find(".select2-container--default").remove(); 
        divClone.find(".select2_produto").attr('name', 'modulo_produto[' + p +']').end();
        divClone.find(".select2_produto").parent().find(".select2-container--below").remove();  
        divClone.find(".select2_produto").parent().find(".select2-container--default").remove();       
        divClone.find(".select2_suplemento_produto").attr('name', 'suplemento_produto[' + p +']').end();
        divClone.find(".select2_suplemento_produto").parent().find(".select2-container--below").remove();  
        divClone.find(".select2_suplemento_produto").parent().find(".select2-container--default").remove();
        divClone.find(".hidratacao_agua_livre").attr('name', 'hidratacao_agua_livre[' + p +']').end();

        divClone.find("input.radio_infusao").attr('name', 'dieta_infusao[' + p +']').end();
        divClone.find('input.infusao_continua').removeAttr("id").attr("id","infusao_continua[" + p +"]");
        divClone.find('label.infusao_continua').removeAttr("for").attr("for","infusao_continua[" + p +"]");
        divClone.find('input.infusao_fracionada').removeAttr("id").attr("id","infusao_fracionada[" + p +"]");
        divClone.find('label.infusao_fracionada').removeAttr("for").attr("for","infusao_fracionada[" + p +"]");
        divClone.find('.entric_ofertotal').removeAttr("style");

        $('.combinacoes .tab-content').append(divClone);
        $('.combinacoes .nav-tabs a[href="#combinacao'+id+'"]').tab('show');
        $('.hora').mask("99:99");
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
        var selector = $("#combinacao"+id).find("select[name='dieta_formula[" + p +"]']");
        selector.removeAttr('data-live-search')
                .removeAttr('data-select2-id')
                .removeAttr('aria-hidden')
                .removeAttr('tabindex')
                .removeClass('select2-hidden-accessible');
        selector.find('option[value]').remove();
        selector.empty();
        selector.removeData();
        select2_ajax_formula(selector);
        var selector = $("#combinacao"+id).find("select[name='modulo_produto[" + p +"]']");
        selector.removeAttr('data-live-search')
                .removeAttr('data-select2-id')
                .removeAttr('aria-hidden')
                .removeAttr('tabindex')
                .removeClass('select2-hidden-accessible');
        selector.find('option[value]').remove();
        selector.empty();
        selector.removeData();
        select2_ajax_produto(selector);
        var selector = $("#combinacao"+id).find("select[name='suplemento_produto[" + p +"]']");
        selector.removeAttr('data-live-search')
                .removeAttr('data-select2-id')
                .removeAttr('aria-hidden')
                .removeAttr('tabindex')
                .removeClass('select2-hidden-accessible');
        selector.find('option[value]').remove();
        selector.empty();
        selector.removeData();
        select2_ajax_produto(selector);

        $('.radio_infusao').on("change", function(e) {
            if ($(this).filter(':checked').val() == 'Fracionada') {
                $(this).parent().parent().parent().find(".div_infusao_continua").hide();
                $(this).parent().parent().parent().find(".div_infusao_fracionada").show();
            }else{
                $(this).parent().parent().parent().find(".div_infusao_continua").show();
                $(this).parent().parent().parent().find(".div_infusao_fracionada").hide();
            }
            $('.hora').mask("99:99");
            $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
        });

        stickyTop('combinacao'+id);
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $('#fracionamento_dia').on('click', function() {
        $(this).select();
    });
    $('#fracionamento_dia').on('keyup', function() {
        $('.fracio_horario').empty();
        var horarios = '';
        for(i = 1; i <= parseInt($(this).val()); i++) {
            if (i<10){
                var numi = "0"+i;
            }else{
                var numi = i;
            }            
            horarios = horarios + '<div class="col-sm-3">Horário '+numi+':</div>'+
                                  '<div class="col-sm-3"><input type="text" placeholder="00:00" required="required" name="dieta_horario['+numi+']" id="horario_'+numi+'" class="form-control hora"></div>';
        }
        $('.fracio_horario').html(horarios);
        $('.hora').mask("99:99");
    });
    $('#hidratacao_dia').on('click', function() {
        $(this).select();
    });
    $('#hidratacao_dia').on('keyup', function() {
        $('.hidratacao_horarios').empty();
        var horarios = '';
        for(i = 1; i <= parseInt($(this).val()); i++) {
            if (i<10){
                var numi = "0"+i;
            }else{
                var numi = i;
            }
            
            horarios = horarios + '<div class="col-sm-3">Horário '+numi+':</div>'+
                                  '<div class="col-sm-3"><input type="text" placeholder="00:00" required="required" name="hidrahorario['+numi+']" id="hidrahorario_'+numi+'" class="form-control hora"></div>';
        }
        $('.hidratacao_horarios').html(horarios);
        $('.hora').mask("99:99");

        volume_total_hidratacao();
    });    
    $("#volume_horario").on("keypress keyup", function(e) {
        volume_total_hidratacao();
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // observacoes  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $("#observacoes_salvar").on("click", function(e) {
        fc_salvar('observacoes', true);
    });
    $("#observacoes_voltar").on("click", function(e) {
        $(".tabobservacoes").addClass('disabledTab');    
        $('.tabobservacoes a').removeClass('active');
        $('#observacoes').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabcalculo a').addClass('active');
        $('#calculo').addClass('active').addClass('show').attr('aria-expanded','true');
    });

    $("#observacoes_avancar").on("click", function(e) {
        fc_salvar('observacoes', false);
        $('.tabobservacoes a').removeClass('active');
        $('#observacoes').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabdistribuidores").removeClass('disabledTab');
        $('.tabdistribuidores a').addClass('active');
        $('#distribuidores').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // distribuidores =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $("#distribuidores_salvar").on("click", function(e) {
        fc_salvar('distribuidores', true);
    });
    $("#distribuidores_voltar").on("click", function(e) {
        $(".tabdistribuidores").addClass('disabledTab');    
        $('.tabdistribuidores a').removeClass('active');
        $('#distribuidores').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabobservacoes a').addClass('active');
        $('#observacoes').addClass('active').addClass('show').attr('aria-expanded','true');
    });

    $("#distribuidores_avancar").on("click", function(e) {
        fc_salvar('distribuidores', false);
        $('.tabdistribuidores a').removeClass('active');
        $('#distribuidores').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabrelatorio").removeClass('disabledTab');
        $('.tabrelatorio a').addClass('active');
        $('#relatorio').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $('.state').on("click", function(e) {
        $(".state").removeClass("state_selected");
        $(this).addClass("state_selected");
        $("#cad_distribuidores").val($(this).attr("rel"));
        $.ajax({
            type: "POST",
            url: "ajax/distribuidores",
            data: "uf="+$(this).attr("rel"),
            cache: false,
            dataType: 'json',
            success: function( dados ){
                var rows = '';
                $.each(dados, function (key, item) {
                    var _distribuidor = '<i class="fa fa-check-circle-o icon-vermelho" aria-hidden="true"></i> ';
                    if (item.distribuidor == 1){
                        _distribuidor = '<i class="fa fa-check-circle-o icon-verde" aria-hidden="true"></i>';
                    }
                    var _cupom = '<i class="fa fa-check-circle-o icon-vermelho" aria-hidden="true"></i> ';
                    if (item.cupom !== ""){
                        _cupom = item.cupom;
                    }

                    rows = rows + '<tr class="tabrow" rel="'+item.id+'">'+ 
                                '<td>'+item.distribuidor+'</td>'+
                                '<td>'+item.fabricante+'</td>'+
                                '<td class="text-center"><a href="javascript:void();" onclick="abrirEndereco('+item.id+');" class="mr-4 tb-action"><i class="fa fa-home" aria-hidden="true"></i></a></td>'+
                                '<td class="text-center">'+_distribuidor+'</td>'+
                                '<td class="text-center">'+_cupom+'</td>'+
                            '</tr>';  
                    
                });
                if (rows == ""){
                    rows = '<tr><td colspan="5" class="text-center">Nenhum dado encontrado</td></tr>';
                }
                $("#distribuidores tbody").html(rows);
            }
        });
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-



    // relatorio =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $("#rel_visualizar_relatorio").on("click", function(e) {
        var error_alert = "";

        // if (($("#altura").val() != "") && ($("#altura_valor").val() != "") && ($("#altura_valor").val() != "0.00") && ($(".antropometria").find(".select_peso").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "0.000")){
        // }else{
        //     error_alert = 'Por favor, informe a "antropometria" na aba "Avaliação Nutricional".';
        // }

        // if ($("#nec_calorias_peso_valor").val() != ""){
        // }else if (error_alert == ""){
        //     error_alert = 'Por favor, informe o valor do peso em calorias e proteínas na aba "Necessidades Nutricionais".';
        // }

        if ($("input[name='calculo_apres_fechado']:checked").val() == 'Fechado') {
            if ($("#hidratacao_dia").val() != ""){
            }
            else if (error_alert == ""){
                error_alert = 'Por favor, informe o valor de Fracionamento / Dia no pop-up "Fracionamento e Hidratação".';
            }
        }

        if (($("input[name='calculo_apres_aberto_liquido']:checked").val() == 'Aberto (Líquido)') || ($("input[name='calculo_apres_aberto_po']:checked").val() == 'Aberto (Pó)')) {
            if ($("#fracionamento_dia").val() != ""){
            }
            else if (error_alert == ""){
                error_alert = 'Por favor, informe o valor de "Fracionamento / Dia" no pop-up "Fracionamento e Hidratação".';
            }
        }


        if (error_alert == ""){
            var _this = $("#relatorio form");
            var frm = _this.serialize();   
            var _id_paciente = $("#id_paciente").val();
            var _id_relatorio = $("#id_relatorio").val();
            login_tipo = $("#login_tipo").val();


            $.ajax({
                type: "POST",
                url: "ajax/relatorio_salvar_simplificada",
                data: frm+"&id_paciente="+_id_paciente+"&id_relatorio="+_id_relatorio+"&login_tipo="+login_tipo,
                cache: false,
                dataType: 'json',
                success: function( data ){
                    if (data.relatorio){
                        $("#id_relatorio").val(data.relatorio);
                        $("#relatorio_code").val(data.relatorio_code);
                    }
                    if (data.success){
                        var relatorio_code = $("#relatorio_code").val();
                        window.open("relatorio_simplificada/"+relatorio_code, "_blank");
                    }
                    if (data.error){
                        toastr['error'](data.error.message, '', {positionClass: 'toast-top-right' });
                    }
                }
            });
        }
        else{
            $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: error_alert
                });
        }
    });
    $("#rel_gerar_relatorio").on("click", function(e) {
        if ($("input[name='rel_distribuidores']:checked").val() == 'Distribuidores') {
            fc_gerarelatorio();
        }
        else{
            $.confirm({
                title: '<strong>Atenção</strong>',
                content: 'Tem certeza que deseja gerar o relatório sem incluir os <strong>distribuidores</strong>?',
                buttons: {
                    Sim: {
                        text: 'Sim',
                        btnClass: 'btn btn-secondary btn-form',
                        action: function(){
                            fc_gerarelatorio();
                        }
                    },
                    Nao: {
                        text: 'Não',
                        btnClass: 'btn btn-default btn-form',
                        action: function(){
                            
                        }
                    }
                }
            });
        }
    });
    $("#rel_imprimir_relatorio").on("click", function(e) {        
        var relatorio_code = $("#relatorio_code").val(); 
        window.open("https://sis.entric.com.br/relatorio_simplificada/imprimir/?url="+relatorio_code, "_blank");
    });
    $("#enviar_email").on("click", function(e) {
        var _email_paciente = $("#email_paciente").val();
        var _id_paciente = $("#id_paciente").val();
        var _id_relatorio = $("#id_relatorio").val();
        $.ajax({
            type: "POST",
            url: "ajax/relatorio_enviar_email",
            data: "&id_paciente="+_id_paciente+"&id_relatorio="+_id_relatorio+"&email_paciente="+_email_paciente,
            cache: false,
            dataType: 'json',
            success: function( data ){
                $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'green',
                    content: 'E-mail enviado para o paciente.'
                });
            }
        });
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
});
</script>