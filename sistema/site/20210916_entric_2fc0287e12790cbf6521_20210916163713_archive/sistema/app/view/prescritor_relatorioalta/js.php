<script src="js/bootstrap/bootstrap-input-spinner/bootstrap-input-spinner.js"></script>
<script src="js/bootstrap/bootstrap-input-spinner/custom-editors.js"></script>
<script src="js/jquery/select2/js/select2.full.min.js"></script>
<script src="js/jquery/select2/js/pt-BR.js"></script>
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

function fc_retorno_pacientes(){
    $("#modal_retorno_pacientes tbody tr").click(function () {
        var dados_json = $(this).find(".retorno_pacientes_relatorios").text();
        dados_json = JSON.parse(dados_json);

        if ( dados_json.length == 0 ) {
                $('#table_lista_pacientes > tbody').empty();
                $('#table_lista_pacientes').append('<tr><td colspan="5" class="text-center">Nenhum relatório encontrado</td></tr>');
        }else{
            var tr = '';
            $.each(dados_json, function(i, item) {
                tr += '<tr><td>' + item.nome + '</td><td>' + item.data_criacao + '</td><td>' + item.codigo + '</td><td><a href="javascript:void(0);" onclick="alert(\'' + item.id + '\');"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="alert(\'' + item.id + '\');"><i class="fa fa-trash-o"></i></a></td></tr>';
            });
            $('#table_lista_pacientes > tbody').empty();
            $('#table_lista_pacientes').append(tr);
        }
        $('#modal_retorno_pacientes').modal('toggle');
        $("#listar_pacientes").show();
        $("#buscar_pacientes").hide();
    });
}

function fc_buscar_paciente(){
    var _this = $("#prescritor_relatorioalta");
    var frm = _this.serialize();
    $.ajax({
        type: "POST",
        url: "ajax/buscar_paciente",
        data: frm,
        cache: false,
        dataType: 'json',
        success: function( data ){
            if ( data.length == 0 ) {
                $('#table_retorno_pacientes > tbody').empty();
                $('#table_retorno_pacientes').append('<tr><td colspan="5" class="text-center">Nenhum paciente encontrado</td></tr>');
                $('#modal_retorno_pacientes').modal('toggle');
            }else{
                var tr = '';
                $.each(data, function(i, item) {
                    tr += '<tr><td><div class="retorno_pacientes_relatorios" style="display: none;">' + JSON.stringify(item.relatorios) + '</div>' + item.nome + '</td><td>' + item.cpf + '</td><td>' + item.mae + '</td><td>' + item.data_nascimento + '</td><td>' + item.sexo + '</td></tr>';
                });
                $('#table_retorno_pacientes > tbody').empty();
                $('#table_retorno_pacientes').append(tr);
                fc_retorno_pacientes();
                $('#modal_retorno_pacientes').modal('toggle');
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

$(function(){
    $(".plusminus").inputSpinner();  
    

    // cadastro   =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $("input[name=cpf_possui]").change(function() {
        if(this.checked) {
            $("#cpf").prop('disabled', true);
        }else{
            $("#cpf").prop('disabled', false);
        }
    });
    $("input[name=mae_possui]").change(function() {
        if(this.checked) {
            $("#mae").prop('disabled', true);
        }else{
            $("#mae").prop('disabled', false);
        }
    });
    $(".tabsec").removeClass('active').addClass('disabledTab');
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
    $("#gerar_relatorio").on("click", function(e) {
        $('.tabcadastro a').removeClass('active');
        $('#cadastro').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabhistoria").removeClass('disabledTab');
        $('.tabhistoria a').addClass('active');
        $('#historia').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // historico  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $("#historia_voltar").on("click", function(e) {
        $(".tabhistoria").addClass('disabledTab');
        $('.tabhistoria a').removeClass('active');
        $('#historia').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabcadastro a').addClass('active');
        $('#cadastro').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $("#historia_avancar").on("click", function(e) {
        $('.tabhistoria a').removeClass('active');
        $('#historia').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabavaliacao").removeClass('disabledTab');
        $('.tabavaliacao a').addClass('active');
        $('#avaliacao').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // avaliação nutricional  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $("#avaliacao_voltar").on("click", function(e) {
        $(".tabavaliacao").addClass('disabledTab');        
        $('.tabavaliacao a').removeClass('active');
        $('#avaliacao').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabhistoria a').addClass('active');
        $('#historia').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $("#avaliacao_avancar").on("click", function(e) {
        $('.tabavaliacao a').removeClass('active');
        $('#avaliacao').removeClass('active').removeClass('show').attr('aria-expanded','false');

        $(".tabnecessidades").removeClass('disabledTab'); 
        $('.tabnecessidades a').addClass('active');
        $('#necessidades').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $(".btn_peso_mc_add").on("click", function(e) {
        if (($("#altura").val() != "") && ($("#altura_valor").val() != "") && ($("#altura_valor").val() != "0.00") && ($(".antropometria").find(".select_peso").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "") && ($(".antropometria").find(".input_peso_valor").val() != "0.000")){          
            var antropometria = $(this).closest(".antropometria");
            var divClone = antropometria.clone(true);
            antropometria.find(".input_peso_valor").val("");
            antropometria.find(".input_imc").val("");
            antropometria.find(".select_peso").val("").change();
            divClone.find(".select_peso").attr("readonly", "readonly");
            divClone.find(".select_peso option:not(:selected)").prop('disabled', true);
            divClone.find(".input_peso_valor").attr("readonly", "readonly");
            divClone.find(".btn_peso_mc_add").remove();
            divClone.find(".btn_peso_mc_rm").removeClass("none");
            $(".antropometria_col").append(divClone);
        }
    });
    $(".btn_peso_mc_rm").on("click", function(e) {
        $(this).closest(".antropometria").remove();
    });
    $(".btn_circunferencias_add").on("click", function(e) {
        if ( ($(".circunferencias").find(".select_circunferencias").val() != "") && ($(".circunferencias").find(".input_circunferencias_valor").val() != "") && ($(".circunferencias").find(".input_circunferencias_valor").val() != "0.00") && ($('.circunferencia_lado').is(':checked')) ){
            var circunferencias = $(this).closest(".circunferencias");
            var divClone = circunferencias.clone(true);
            circunferencias.find(".input_circunferencias_valor").val("");
            circunferencias.find(".select_circunferencias").val("").change();
            var p = $.now();
            divClone.find(".select_circunferencias").attr("readonly", "readonly");
            divClone.find(".select_circunferencias option:not(:selected)").prop('disabled', true);
            divClone.find(".input_circunferencias_valor").attr("readonly", "readonly");
            divClone.find('input:radio').attr('name', 'circunferencia_lado[' + p +']').end();            
            divClone.find("input[type='radio'][name='circunferencia_lado[" + p +"]']:not(:checked)").attr('disabled', true);
            divClone.find(".btn_circunferencias_add").remove();
            divClone.find(".btn_circunferencias_rm").removeClass("none");
            $(".circunferencias_col").append(divClone);
        }
    });
    $(".btn_circunferencias_rm").on("click", function(e) {
        $(this).closest(".circunferencias").remove();
    });
    $(".btn_dobras_add").on("click", function(e) {
        if ( ($(".dobras").find(".select_dobras").val() != "") && ($(".dobras").find(".input_dobras_valor").val() != "") && ($(".dobras").find(".input_dobras_valor").val() != "0.00") && ($('.dobras_lado').is(':checked')) ){
            var dobras = $(this).closest(".dobras");
            var divClone = dobras.clone(true);
            dobras.find(".input_dobras_valor").val("");
            dobras.find(".select_dobras").val("").change();
            var p = $.now();
            divClone.find(".select_dobras").attr("readonly", "readonly");
            divClone.find(".select_dobras option:not(:selected)").prop('disabled', true);
            divClone.find(".input_dobras_valor").attr("readonly", "readonly");
            divClone.find('input:radio').attr('name', 'dobras_lado[' + p +']').end();            
            divClone.find("input[type='radio'][name='dobras_lado[" + p +"]']:not(:checked)").attr('disabled', true);
            divClone.find(".btn_dobras_add").remove();
            divClone.find(".btn_dobras_rm").removeClass("none");
            $(".dobras_col").append(divClone);
        }
    });
    $(".btn_dobras_rm").on("click", function(e) {
        $(this).closest(".dobras").remove();
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // necessidades nutricionais  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $("#necessidades_voltar").on("click", function(e) {
        $(".tabnecessidades").addClass('disabledTab');    
        $('.tabnecessidades a').removeClass('active');
        $('#necessidades').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabavaliacao a').addClass('active');
        $('#avaliacao').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $("#necessidades_avancar").on("click", function(e) {
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
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // cálculo de terapia nutricional =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $("#calculo_voltar").on("click", function(e) {
        $(".tabcalculo").addClass('disabledTab');    
        $('.tabcalculo a').removeClass('active');
        $('#calculo').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabnecessidades a').addClass('active');
        $('#necessidades').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $("#salvar_alteracoes").on("click", function(e) {
        $('#modal_fracionamento').modal('toggle');
        $('.tabcalculo a').removeClass('active');
        $('#calculo').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabobservacoes").removeClass('disabledTab');
        $('.tabobservacoes a').addClass('active');
        $('#observacoes').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    $('input:radio[name=tipo_prescricao]').change(function () {
        if ($("input[name='tipo_prescricao']:checked").val() == 'Prescrição Manual') {
            $("#apresentacao").hide();
            $("#prescricao_nutricional").hide();
            $("#dietaenteral").show();

            var stickyTop = $('.sticky').offset().top;          
            $(window).scroll(function() {
                var windowTop = $(window).scrollTop();
                if (stickyTop < windowTop) {
                    var stickyWidth = $('.sticky').outerWidth();
                    $('.sticky').css('position', 'fixed');
                    $('.sticky').css('width', stickyWidth);                    
                } else {
                    $('.sticky').css('position', 'relative');
                    $('.sticky').css('width', '');  
                }
            });

        }else{
            $("#apresentacao").show();
            $("#prescricao_nutricional").show();
            $("#dietaenteral").hide();
        }
    });
    /*$('#calculo_apres_aberto_po').on('change', function() {
        if ($("#calculo_apres_aberto_po").is(':checked')){
            $('#modal_selecao').modal('toggle');
        }
    });*/
    $("#editar_prescricao").on("click", function(e) {    
        $(".tabcalculo").addClass('disabledTab');    
        $('.tabcalculo a').removeClass('active');
        $('#calculo').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabnecessidades a').addClass('active');
        $('#necessidades').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    // -------------------------------------------------------------------------------------------------------------------------
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
    $("#btn_outra_dieta_add").on("click", function(e) {
        var divClone = $("#div_nova_dieta").clone(true);
        var p = $.now();

        divClone.removeAttr("id");
        divClone.find(".div_formula_rm").removeClass("none");
        divClone.find("input:radio").attr('name', 'infusao[' + p +']').end();
        divClone.find("input[type='radio'][name='infusao[" + p +"]'][value='Contínua']").attr('id', 'infusao_continua[' + p +']').end();
        divClone.find("input[type='radio'][name='infusao[" + p +"]'][value='Fracionada']").attr('id', 'infusao_fracionada[' + p +']').end();
        divClone.find(".radio_continua").attr('for', 'infusao_continua[' + p +']').end();
        divClone.find(".radio_fracionada").attr('for', 'infusao_fracionada[' + p +']').end();
        divClone.find(".horario_inicio").attr('name', 'horario_inicio[' + p +']').end();
        divClone.find(".label_horario_inicio").attr('for', 'horario_inicio[' + p +']').end();
        divClone.find(".horario_administracao").attr('name', 'horario_administracao[' + p +']').end();
        divClone.find(".label_horario_administracao").attr('for', 'label_horario_administracao[' + p +']').end();
        divClone.find(".select2_ajax_formula").attr('name', 'formula[' + p +']').end();
        divClone.find(".select2_ajax_formula").parent().find(".select2-container--below").remove();
        divClone.find(".select2_ajax_formula").parent().find(".select2-container--default").remove();  

        divClone.find(".campos_limpar").val('');
        divClone.find(".hora").unbind();
        divClone.find(".numeros").unbind();
        $(".nova_dieta").append(divClone);

        $('.hora').mask("99:99");
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
        var selector = $("select[name='formula[" + p +"]']");
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
    // -------------------------------------------------------------------------------------------------------------------------
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
    $("#btn_modulo_add").on("click", function(e) {
        var divClone = $("#div_modulo").clone(true);
        var p = $.now();

        divClone.removeAttr("id");
        divClone.find(".div_produto_rm").removeClass("none");
        divClone.find(".modulo_horario").attr('name', 'horario[' + p +']').end();
        divClone.find(".modulo_volume_total").attr('name', 'volume_total[' + p +']').end();
        divClone.find(".select2_ajax_produto").attr('name', 'produto[' + p +']').end();
        divClone.find(".select2_ajax_produto").parent().find(".select2-container--below").remove();  
        divClone.find(".select2_ajax_produto").parent().find(".select2-container--default").remove();        
        
        divClone.find(".div_volume_total").not(':first').remove();
        divClone.find(".campos_limpar").val('');
        divClone.find(".hora").unbind();
        divClone.find(".numeros").unbind();        
        $(".modulo").append(divClone);

        $('.hora').mask("99:99");
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
        var selector = $("select[name='produto[" + p +"]']");
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
    // -------------------------------------------------------------------------------------------------------------------------
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
    $("#btn_suplemento_add").on("click", function(e) {
        var divClone = $("#div_suplemento").clone(true);
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
        $(".suplemento").append(divClone);

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
    select2_ajax_formula($(".select2_ajax_formula"));
    select2_ajax_produto($(".select2_ajax_produto"));

    $(".combinacoes .nav-tabs").on("click", "a", function(e){
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
        var id = $(".combinacoes .nav-tabs").children().length;
        $(this).closest('li').before('<li class="nav-item"><a href="#combinacao'+id+'" class="nav-link combinacao'+id+'">Combinação '+id+'</a> <span><i class="fa fa-minus-circle" aria-hidden="true"></i></span></li>');
        $('.combinacoes .tab-content').append('<div class="tab-pane fade" id="combinacao'+id+'"></div>');
        $(".combinacoes .combinacao"+id).first().click();
    });
    $('#calculo_avancar').on('click', function() {
        if ($("#calculo_apres_aberto_po").is(':checked')){
            $('#modal_selecao').modal('toggle');
        }else{
            $('#modal_fracionamento').modal('toggle');
        }
    });
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
                                  '<div class="col-sm-3"><input type="text" placeholder="00:00" required="required" name="horario_'+numi+'" id="horario_'+numi+'" class="form-control hora"></div>';
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
                                  '<div class="col-sm-3"><input type="text" placeholder="00:00" required="required" name="hidrahorario_'+numi+'" id="hidrahorario_'+numi+'" class="form-control hora"></div>';
        }
        $('.hidratacao_horarios').html(horarios);
        $('.hora').mask("99:99");
    });    
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // observacoes  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $("#observacoes_voltar").on("click", function(e) {
        $(".tabobservacoes").addClass('disabledTab');    
        $('.tabobservacoes a').removeClass('active');
        $('#observacoes').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabcalculo a').addClass('active');
        $('#calculo').addClass('active').addClass('show').attr('aria-expanded','true');
    });

    $("#observacoes_avancar").on("click", function(e) {
        $('.tabobservacoes a').removeClass('active');
        $('#observacoes').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabfornecedores").removeClass('disabledTab');
        $('.tabfornecedores a').addClass('active');
        $('#fornecedores').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




    // fornecedores  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $("#fornecedores_voltar").on("click", function(e) {
        $(".tabfornecedores").addClass('disabledTab');    
        $('.tabfornecedores a').removeClass('active');
        $('#fornecedores').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabobservacoes a').addClass('active');
        $('#observacoes').addClass('active').addClass('show').attr('aria-expanded','true');
    });

    $("#fornecedores_avancar").on("click", function(e) {
        $('.tabfornecedores a').removeClass('active');
        $('#fornecedores').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabrelatorio").removeClass('disabledTab');
        $('.tabrelatorio a').addClass('active');
        $('#relatorio').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
});
</script>