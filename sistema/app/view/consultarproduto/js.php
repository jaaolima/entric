<script src="js/jquery/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="js/jquery/select2/js/pt-BR.js" type="text/javascript"></script>
<script src="js/jquery/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/jquery/jquery-confirm/jquery-confirm.min.js" type="text/javascript"></script>
<script>
function IsJsonString(str) {
    try {
        var json = JSON.parse(str);
        return (typeof json === 'object');
    } catch (e) {
        return false;
    }
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
        id: 'select2_ajax_produto',
        dropdownCssClass : 'bigdrop',
        multiple: false,
        allowClear: true,
        minimumInputLength: 3,
        placeholder: 'Todos',
        escapeMarkup: function (markup) { return markup; },
        templateResult: formatRepo,
        templateSelection: formatRepoSelection,
        language: "pt-BR"
    });
    
}

function frmreset(){
    $('#modalfrmproduto').find('.form-check-input').prop('checked', false);
    $('#modalfrmproduto').find('input.form-control').val('');
    $('#modalfrmproduto').find('textarea').val('');
    $('#modalfrmproduto').find('.entric_composicao').find('input').val('');
    $('#modalfrmproduto').find('.entric_composicao').find('textarea').val('');
    $('#modalfrmproduto').find('#_idproduto').val('');
    $('#modalfrmproduto').find('#m_foto').val(''); 
    $('#modalfrmproduto').find('.select2_ajax_produto').val(null).trigger('change');
    $('#modalfrmproduto').find('.select-tag').val(null).trigger('change');
    $('#modalfrmproduto').find("#m_anexar_foto").css("background-image", "url(assets/images/image-upload.png)");
    $('#modalfrmproduto').find("#m_anexar_foto").css("background-size", "cover");
    $('#m_tipopesquisa').val('');
    var tabs = $("#m_tab-densidades .nav-item").length;
    if (tabs>2){
        for (let i = 2; i < tabs; i++) {
            var anchor = $("#modalfrmproduto .densidades"+i);
            $(anchor.attr('href')).remove();
            anchor.parent().remove();
        }
        $("#modalfrmproduto  .nav-tabs li").children('a').first().click();
    }
    var tabs = $("#m_tab-apresentacao .nav-item").length;
    if (tabs>2){
        for (let i = 2; i < tabs; i++) {
            var anchor = $("#modalfrmproduto .apresentacao"+i);
            $(anchor.attr('href')).remove();
            anchor.parent().remove();
        }
        $("#modalfrmproduto .apresentacao .nav-tabs li").children('a').first().click();
    }

    $('#frmproduto').find('.form-check-input').prop('checked', false);
    $('#frmproduto').find('input.form-control').val('');
    $('#frmproduto').find('textarea').val('');
    $('#frmproduto').find('.entric_composicao').find('input').val('');
    $('#frmproduto').find('.entric_composicao').find('textarea').val('');
    $('#frmproduto').find('#_idproduto').val('');
    $('#frmproduto').find('#foto').val(''); 
    $('#frmproduto').find('.select2_ajax_produto').val(null).trigger('change');
    $('#frmproduto').find('.select-tag').val(null).trigger('change');
    $('#frmproduto').find("#anexar_foto").css("background-image", "url(assets/images/image-upload.png)");
    $('#frmproduto').find("#anexar_foto").css("background-size", "cover");
    var tabs = $("#tab-densidades .nav-item").length;
    if (tabs>2){
        for (let i = 2; i < tabs; i++) {
            var anchor = $("#frmproduto .densidades"+i);
            $(anchor.attr('href')).remove();
            anchor.parent().remove();
        }
        $("#frmproduto .densidades .nav-tabs li").children('a').first().click();
    }
    var tabs = $("#tab-apresentacao .nav-item").length;
    if (tabs>2){
        for (let i = 2; i < tabs; i++) {
            var anchor = $("#frmproduto .apresentacao"+i);
            $(anchor.attr('href')).remove();
            anchor.parent().remove();
        }
        $("#frmproduto .apresentacao .nav-tabs li").children('a').first().click();
    }
}

function gtModalProdutoFiltro(_id, _tipo){
    $.ajax({
        type: "POST",
        url: "ajax/produto_abrir",
        data: "id="+_id,
        cache: false,
        dataType: 'json',
        success: function( data ){
            if (data.error){
                //toastr['error'](data.error.message, '', {positionClass: 'toast-top-right' });
                $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: data.error.message,
                });
            }
            else{                
                frmreset();
                $("#m_tipopesquisa").val(_tipo);
                $('#modalfrmproduto').find('input:radio[name="m_unidmedida"]').prop('checked', false);
                $("#modalfrmproduto .dosagem_quantidade").html("Quantidade por 100g");

                if ((data.foto !== "") && (data.foto !== "null") && (data.foto !== null)){
                    $('#modalfrmproduto').find("#m_anexar_foto").css("background-image", "url(arquivos"+data.foto+")");
                    $('#modalfrmproduto').find("#m_anexar_foto").css("background-size", "contain");
                }
                var especialidade = JSON.parse(data.especialidade);
                $.each(especialidade, function() {
                    $('#modalfrmproduto').find('input:checkbox[name="m_especialidade[]"]').filter('[value='+this+']').prop('checked', true);
                });
                $('#modalfrmproduto').find('input:radio[name=m_via]').filter('[value='+data.via+']').prop('checked', true);
                $('#modalfrmproduto').find('input[name=m__idproduto]').val(_id);

                if ($('#modalfrmproduto').find("input[name='m_via']:checked").val() == 'Enteral') {
                    $("#m_apresentacao_modulo").addClass("none"); 
                    $("#m_apresentacao_enteral").removeClass("none");
                    $("#m_apresentacao_oral").addClass("none");
                    $(".m_unidademedida").removeClass("block").addClass("none");
                    $(".m_nounidademedida").removeClass("none").addClass("block");
                    
                    var apres_enteral = JSON.parse(data.apres_enteral);
                    $.each(apres_enteral, function() {
                        $('#modalfrmproduto').find('input:radio[name="m_apres_enteral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        if (this == 'Aberto (Pó)') {
                            $("#modalfrmproduto .entric_comptitulo").html("Informações Nutricionais na Diluição Padrão (100ml)");
                            $("#modalfrmproduto .dosagem_quantidade").html("Quantidade por 100g");
                        }else{
                            $("#modalfrmproduto .entric_comptitulo").html("Informações Nutricionais (100ml)");
                            $("#modalfrmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                        }
                    });
                    
                    var carac_enteral = JSON.parse(data.carac_enteral);
                    $.each(carac_enteral, function() {
                        $('#modalfrmproduto').find('input:radio[name="m_carac_enteral_merico[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#modalfrmproduto').find('input:radio[name="m_carac_enteral_fibras[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#modalfrmproduto').find('input:checkbox[name="m_carac_enteral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });
                    $(".m_unidademedida").removeClass("block").addClass("none");

                    var produto_especializado = data.produto_especializado;
                    if(produto_especializado == 'S'){
                        $('#modalfrmproduto').find('input:checkbox[name="m_produto_especializado_enteral"]').prop('checked', true);
                    }

                }else if ($('#modalfrmproduto').find("input[name='m_via']:checked").val() == 'Suplemento') {
                    $("#m_apresentacao_modulo").addClass("none"); 
                    $("#m_apresentacao_enteral").addClass("none");
                    $("#m_apresentacao_oral").removeClass("none");
                    $(".m_unidademedida").removeClass("none").addClass("block");
                    $(".m_nounidademedida").removeClass("block").addClass("none");

                    if (data.unidmedida == 'gramas') {
                        $('#modalfrmproduto').find('input:radio[name="m_unidmedida"][value="gramas"]').prop('checked', true);
                        $("#modalfrmproduto .dosagem_quantidade").html("Quantidade por 100g");
                    }else{
                        $('#modalfrmproduto').find('input:radio[name="m_unidmedida"][value="ml"]').prop('checked', true);
                        $("#modalfrmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                    }
                    
                    var apres_oral = JSON.parse(data.apres_oral);
                    $.each(apres_oral, function() {
                        $('#modalfrmproduto').find('input:radio[name="m_apres_oral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });
                    
                    var carac_oral = JSON.parse(data.carac_oral);
                    $.each(carac_oral, function() {
                        $('#modalfrmproduto').find('input:radio[name="m_carac_oral_fibras[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#modalfrmproduto').find('input:radio[name="m_carac_oral_calorias[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#modalfrmproduto').find('input:radio[name="m_carac_oral_proteinas[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#modalfrmproduto').find('input:checkbox[name="m_carac_oral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });

                    var produto_especializado = data.produto_especializado;
                    if(produto_especializado == 'S'){
                        $('#modalfrmproduto').find('input:checkbox[name="m_produto_especializado_oral"]').prop('checked', true);
                    }

                }else if ($('#modalfrmproduto').find("input[name='m_via']:checked").val() == 'Módulo') {
                    $("#m_apresentacao_enteral").addClass("none");
                    $("#m_apresentacao_oral").addClass("none");
                    $("#m_apresentacao_modulo").removeClass("none");
                    $(".m_unidademedida").removeClass("none").addClass("block");
                    $(".m_nounidademedida").removeClass("block").addClass("none");

                    if (data.unidmedida == 'gramas') {
                        $('#modalfrmproduto').find('input:radio[name="m_unidmedida"][value="gramas"]').prop('checked', true);
                        $("#modalfrmproduto .dosagem_quantidade").html("Quantidade por 100g");
                    }else{
                        $('#modalfrmproduto').find('input:radio[name="m_unidmedida"][value="ml"]').prop('checked', true);
                        $("#modalfrmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                    }
                    
                    var cat_modulo = JSON.parse(data.cat_modulo);
                    $.each(cat_modulo, function() {
                        $('#modalfrmproduto').find('input:checkbox[name="m_cat_modulo[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });
                    
                    // var carac_oral = JSON.parse(data.carac_oral);
                    // $.each(carac_oral, function() {
                    //     $('#modalfrmproduto').find('input:radio[name="m_carac_oral_fibras[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    //     $('#modalfrmproduto').find('input:radio[name="m_carac_oral_calorias[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    //     $('#modalfrmproduto').find('input:radio[name="m_carac_oral_proteinas[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    //     $('#modalfrmproduto').find('input:checkbox[name="m_carac_oral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    // });

                }else{
                    $("#m_apresentacao_enteral").addClass("none");
                    $("#m_apresentacao_oral").addClass("none"); 
                    $("#m_apresentacao_modulo").addClass("none"); 
                    $(".m_unidademedida").removeClass("none").addClass("block");
                    $(".m_nounidademedida").removeClass("block").addClass("none");

                    if (data.unidmedida == 'gramas') {
                        $('#modalfrmproduto').find('input:radio[name="m_unidmedida"][value="gramas"]').prop('checked', true);
                        $("#modalfrmproduto .dosagem_quantidade").html("Quantidade por 100g");
                    }else{
                        $('#modalfrmproduto').find('input:radio[name="m_unidmedida"][value="ml"]').prop('checked', true);
                        $("#modalfrmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                    }
                }


                $('#modalfrmproduto').find('input:radio[name=m_unidmedida]').filter('[value='+data.unidmedida+']').prop('checked', true);
                var tab_densidade = false;
                var tab_apresentacao = false;
                $.each( data, function( _key, _val) {
                    //if ((_key == "medida") || (_key == "unidade") || (_key == "medida_g") || (_key == "medida_dc") || (_key == "kcal") || (_key == "cho") || (_key == "ptn") || (_key == "lip") || (_key == "fibras")){
                    if ((_key == "medida") || (_key == "unidade") || (_key == "medida_g") || (_key == "medida_dc") || (_key == "diluicao") || (_key == "final")){                        
                        if ((_val !== "") && (_val !== null)){
                            if (IsJsonString(_val) === false) _val = '["'+_val+'"]';
                            var json_dados = JSON.parse(_val);
                            if (json_dados.length > 1){
                                if (tab_densidade === false){
                                    tab_densidade = true;
                                    for (let i = 2; i <=json_dados.length; i++) {
                                        var tabs = $("#m_tab-densidades .nav-item").length;
                                        var navlink = $("#m_tab-densidades .nav-item:nth-child("+(tabs-1)+") .nav-link").attr("href");
                                        navlink = navlink.replace('#m_densidades','');

                                        var id = parseInt(navlink)+1;
                                        var p = $.now();
                                        $('#m_li-nova-densidades').before('<li class="nav-item"><span style="position: relative;top: 6px; padding-left: 5px;color: #ee3900;"></span><a href="#m_densidades'+id+'" style="margin-top: -19px;" class="nav-link densidades'+id+'" data-toggle="tab">Densidade Calórica '+id+'</a> </li>');
                                        var divClone = $("#m_densidades1").clone();
                                        divClone.removeClass("show active");
                                        divClone.removeAttr("id").attr("id","m_densidades"+id);
                                        divClone.find(".campos_limpar").val('');
                                        $('#modalfrmproduto .densidades .tab-content').append(divClone);
                                    }                                    
                                }
                            }
                            for (let i = 0; i < json_dados.length; i++) {
                                $('#m_densidades'+(i+1)).find("input[name='m_"+_key+"[]']").val(json_dados[i]);
                            }
                        }
                    }
                    else  if ((_key == "apresentacao") || (_key == "volume") || (_key == "volume_medida")){
                        if ((_val !== "") && (_val !== null)){
                            if (IsJsonString(_val) === false) _val = '["'+_val+'"]';
                            var json_dados = JSON.parse(_val);
                            if (json_dados.length > 1){
                                if (tab_apresentacao === false){
                                    tab_apresentacao = true;
                                    for (let i = 2; i <=json_dados.length; i++) {
                                        var tabs = $("#m_tab-apresentacao .nav-item").length;
                                        var navlink = $("#m_tab-apresentacao .nav-item:nth-child("+(tabs-1)+") .nav-link").attr("href");
                                        navlink = navlink.replace('#m_apresentacao','');

                                        var id = parseInt(navlink)+1;
                                        var p = $.now();
                                        $('#m_li-nova-apresentacao').before('<li class="nav-item"><span style="position: relative;top: 6px; padding-left: 5px;color: #ee3900;"></span><a href="#m_apresentacao'+id+'" style="margin-top: -19px;" class="nav-link apresentacao'+id+'" data-toggle="tab">Apresentação '+id+'</a> </li>');
                                        var divClone = $("#m_apresentacao1").clone();
                                        divClone.removeClass("show active");
                                        divClone.removeAttr("id").attr("id","m_apresentacao"+id);
                                        divClone.find(".campos_limpar").val('');
                                        $('#modalfrmproduto .apresentacao .tab-content').append(divClone);
                                    }                                    
                                }
                            }
                            for (let i = 0; i < json_dados.length; i++) {
                                $('#m_apresentacao'+(i+1)).find("input[name='m_"+_key+"[]']").val(json_dados[i]);
                            }
                        }
                    }
                    else{
                        $('#modalfrmproduto').find('input.form-control[name="m_'+_key+'"]').val(_val);
                        $('#modalfrmproduto').find('textarea.form-control[name="m_'+_key+'"]').val(_val);
                    }
                });
                $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});

                $("#m_micronutriente").hide();
                $.each( data.info_nutri, function( _key, _val) {
                    if (_val.valor.indexOf('*') > -1){
                        $("#m_micronutriente").show();
                    }
                    $('#modalfrmproduto').find('input.form-control[name="m_info_nutri_'+_val.descricao+'"]').val(_val.valor);
                    $('#modalfrmproduto').find('textarea.form-control[name="m_info_nutri_'+_val.descricao+'"]').val(_val.valor);
                    $('#modalfrmproduto').find('textarea.form-control[name="m_info_nutri_'+_val.descricao+'"]').height(calcHeight(_val.valor) + "px");
                });

                $.each( data.compo, function( _key, _val) {
                    $('#modalfrmproduto').find('input.form-control[name="m_compo_'+_val.descricao+'"]').val(_val.valor);
                    $('#modalfrmproduto').find('textarea.form-control[name="m_compo_'+_val.descricao+'"]').val(_val.valor);
                    $('#modalfrmproduto').find('textarea.form-control[name="m_compo_'+_val.descricao+'"]').height(calcHeight(_val.valor) + "px");
                });

                $('#modal_retorno_produto').modal('toggle');
                abriu_produto = false;
            }
        }
    });
}

function gtProdutoFiltro(_id){
    $.ajax({
        type: "POST",
        url: "ajax/produto_abrir",
        data: "id="+_id,
        cache: false,
        dataType: 'json',
        success: function( data ){
            if (data.error){
                //toastr['error'](data.error.message, '', {positionClass: 'toast-top-right' });
                $.alert({
                    title: 'Atenção',
                    icon: 'fa fa-warning',
                    type: 'red',
                    content: data.error.message,
                });
            }
            else{
                if ($("#m_tipopesquisa").val() == 'filtro'){
                    $('.tabfiltros a').removeClass('active');
                    $('#tabfiltros').removeClass('active').removeClass('show').attr('aria-expanded','false');
             
                    $(".tabproduto").removeClass('disabledTab');
                    $('.tabproduto a').addClass('active');
                    $('#tabproduto').addClass('active').addClass('show').attr('aria-expanded','true');
                }else{
                    $('.tabpesquisa a').removeClass('active');
                    $('#tabpesquisa').removeClass('active').removeClass('show').attr('aria-expanded','false');
             
                    $(".tabproduto").removeClass('disabledTab');
                    $('.tabproduto a').addClass('active');
                    $('#tabproduto').addClass('active').addClass('show').attr('aria-expanded','true');
                }
                frmreset();

                if ((data.foto !== "") && (data.foto !== "null") && (data.foto !== null)){
                    $("#anexar_foto").css("background-image", "url(arquivos"+data.foto+")");
                    $("#anexar_foto").css("background-size", "contain");
                }

                var especialidade = JSON.parse(data.especialidade);
                $.each(especialidade, function() {
                    $('#frmproduto').find('input:checkbox[name="especialidade[]"]').filter('[value='+this+']').prop('checked', true);
                });
                $('#frmproduto').find('input:radio[name=via]').filter('[value='+data.via+']').prop('checked', true);
                $('#frmproduto').find('input[name=_idproduto]').val(_id);
                $('#frmproduto').find('input:radio[name="unidmedida"]').prop('checked', false);
                $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
                $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");

                if ($('#frmproduto').find("input[name='via']:checked").val() == 'Enteral') {
                    $("#apresentacao_enteral").removeClass("none");
                    $("#apresentacao_oral").addClass("none");
                    $("#apresentacao_modulo").addClass("none");
                    $(".unidademedida").removeClass("block").addClass("none");
                    // $(".nounidademedida").removeClass("none").addClass("block");
                    
                    var apres_enteral = JSON.parse(data.apres_enteral);
                    $.each(apres_enteral, function() {
                        $('#frmproduto').find('input:radio[name="apres_enteral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        if (this == "Fechado"){
                            $(".dosagem_quantidade").html("Quantidade por 100ml");
                            $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
                        }
                        else if (this == "Aberto (Líquido)"){
                            $(".dosagem_quantidade").html("Quantidade por 100ml");
                            $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
                        }
                        else{
                            $(".dosagem_quantidade").html("Quantidade por 100g");
                            $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
                        }
                    });
                    
                    var carac_enteral = JSON.parse(data.carac_enteral);
                    $.each(carac_enteral, function() {
                        $('#frmproduto').find('input:radio[name="carac_enteral_merico[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#frmproduto').find('input:radio[name="carac_enteral_fibras[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#frmproduto').find('input:checkbox[name="carac_enteral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });

                    var produto_especializado = data.produto_especializado;
                    if(produto_especializado == 'S'){
                        $('#frmproduto').find('input:checkbox[name="produto_especializado_enteral"]').prop('checked', true);
                    }

                }
                else if ($('#frmproduto').find("input[name='via']:checked").val() == 'Suplemento') {
                    $("#apresentacao_enteral").addClass("none");
                    $("#apresentacao_modulo").addClass("none");
                    $("#apresentacao_oral").removeClass("none");
                    $(".unidademedida").removeClass("none").addClass("block");
                    // $(".nounidademedida").removeClass("block").addClass("none");

                    if (data.unidmedida == 'gramas') {
                        $('#frmproduto').find('input:radio[name="unidmedida"][value="gramas"]').prop('checked', true);
                        $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
                        $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
                    }else{
                        $('#frmproduto').find('input:radio[name="unidmedida"][value="ml"]').prop('checked', true);
                        $("#frmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                        $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
                    }
                    
                    var apres_oral = JSON.parse(data.apres_oral);
                    $.each(apres_oral, function() {
                        $('#frmproduto').find('input:radio[name="apres_oral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });
                    
                    var carac_oral = JSON.parse(data.carac_oral);
                    $.each(carac_oral, function() {
                        $('#frmproduto').find('input:radio[name="carac_oral_fibras[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#frmproduto').find('input:radio[name="carac_oral_proteinas[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#frmproduto').find('input:radio[name="carac_oral_calorias[]"]').filter('[value="'+this+'"]').prop('checked', true);
                        $('#frmproduto').find('input:checkbox[name="carac_oral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });

                    var produto_especializado = data.produto_especializado;
                    if(produto_especializado == 'S'){
                        $('#frmproduto').find('input:checkbox[name="produto_especializado_oral"]').prop('checked', true);
                    }

                }else if ($('#frmproduto').find("input[name='via']:checked").val() == 'Módulo') {
                    $("#apresentacao_enteral").addClass("none");
                    $("#apresentacao_modulo").removeClass("none");
                    $("#apresentacao_oral").addClass("none");
                    $(".unidademedida").removeClass("none").addClass("block");
                    // $(".nounidademedida").removeClass("block").addClass("none");

                    if (data.unidmedida == 'gramas') {
                        $('#frmproduto').find('input:radio[name="unidmedida"][value="gramas"]').prop('checked', true);
                        $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
                        $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
                    }else{
                        $('#frmproduto').find('input:radio[name="unidmedida"][value="ml"]').prop('checked', true);
                        $("#frmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                        $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
                    }
                    
                    var cat_modulo = JSON.parse(data.cat_modulo);
                    $.each(cat_modulo, function() {
                        $('#frmproduto').find('input:checkbox[name="cat_modulo[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });
                    
                    // var carac_oral = JSON.parse(data.carac_oral);
                    // $.each(carac_oral, function() {
                    //     $('#frmproduto').find('input:radio[name="carac_oral_fibras[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    //     $('#frmproduto').find('input:radio[name="carac_oral_proteinas[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    //     $('#frmproduto').find('input:radio[name="carac_oral_calorias[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    //     $('#frmproduto').find('input:checkbox[name="carac_oral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    // });

                }else{
                    $("#apresentacao_enteral").addClass("none");
                    $("#apresentacao_oral").addClass("none");                    
                    $(".unidademedida").removeClass("none").addClass("block");
                    // $(".nounidademedida").removeClass("block").addClass("none");

                    if (data.unidmedida == 'gramas') {
                        $('#frmproduto').find('input:radio[name="unidmedida"][value="gramas"]').prop('checked', true);
                        $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
                        $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
                    }else{
                        $('#frmproduto').find('input:radio[name="unidmedida"][value="ml"]').prop('checked', true);
                        $("#frmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                        $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
                    }
                }
                
                $('#frmproduto').find('input:radio[name=unidmedida]').filter('[value='+data.unidmedida+']').prop('checked', true);
                var tab_densidade = false;
                var tab_apresentacao = false;
                $.each( data, function( _key, _val) {
                    if (_key == "fabricante"){
                        set_select2("fabricante", _val);
                    }
                    else{
                        //if ((_key == "medida") || (_key == "unidade") || (_key == "medida_g") || (_key == "medida_dc") || (_key == "kcal") || (_key == "cho") || (_key == "ptn") || (_key == "lip") || (_key == "fibras")){
                        if ((_key == "medida") || (_key == "unidade") || (_key == "medida_g") || (_key == "medida_dc") || (_key == "diluicao") || (_key == "final")){
                            if ((_val !== "") && (_val !== null)){
                                if (IsJsonString(_val) === false) _val = '["'+_val+'"]';
                                var json_dados = JSON.parse(_val);
                                if (json_dados.length > 1){
                                    if (tab_densidade === false){
                                        tab_densidade = true;
                                        for (let i = 2; i <= json_dados.length; i++) {
                                            var tabs = $("#tab-densidades .nav-item").length;
                                            var navlink = $("#tab-densidades .nav-item:nth-child("+(tabs-1)+") .nav-link").attr("href");
                                            navlink = navlink.replace('#densidades','');
                                            var id = parseInt(navlink)+1;
                                            var p = $.now();

                                            $('#li-nova-densidades').before('<li class="nav-item"><span style="position: relative;top: 6px; padding-left: 5px;color: #ee3900;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span><a href="#densidades'+id+'" style="margin-top: -19px;" class="nav-link densidades'+id+'" data-toggle="tab">Densidade Calórica '+id+'</a> </li>');
                                            var divClone = $("#densidades1").clone();
                                            divClone.removeClass("show active");
                                            divClone.removeAttr("id").attr("id","densidades"+id);
                                            divClone.find(".campos_limpar").val('');
                                            $('#frmproduto .densidades .tab-content').append(divClone);

                                            var selector = $("#densidades"+id).find(".select-tag");
                                            selector.parent().find(".select2-container--below").remove();
                                            selector.parent().find(".select2-container--default").remove();
                                            selector.removeAttr('data-live-search')
                                                    .removeAttr('data-select2-id')
                                                    .removeAttr('aria-hidden')
                                                    .removeAttr('tabindex')
                                                    .removeClass('select2-hidden-accessible');
                                            selector.find('option[value]').remove();        
                                            selector.empty();
                                            selector.removeData();
                                            $("#densidades"+id).find(".select-tag").select2({
                                                width: '100%',
                                                placeholder: "...",
                                                //tags: true,
                                                multiple: false,
                                                allowClear: true,
                                                language: "pt-BR"
                                            });
                                        }                                    
                                    }
                                }
                                for (let i = 0; i < json_dados.length; i++) {
                                    if (_key == "unidade"){
                                        set_select2_tag($('#densidades'+(i+1)).find(".select-tag"), json_dados[i]);    
                                    }else{
                                        $('#densidades'+(i+1)).find("input[name='"+_key+"[]']").val(json_dados[i]);
                                    }                                
                                    
                                }
                            }
                        }
                        else  if ((_key == "apresentacao") || (_key == "volume") || (_key == "volume_medida")){
                            if ((_val !== "") && (_val !== null)){
                                if (IsJsonString(_val) === false) _val = '["'+_val+'"]';
                                var json_dados = JSON.parse(_val);
                                if (json_dados.length > 1){
                                    if (tab_apresentacao === false){
                                        tab_apresentacao = true;
                                        for (let i = 2; i <=json_dados.length; i++) {
                                            var tabs = $("#tab-apresentacao .nav-item").length;
                                            var navlink = $("#tab-apresentacao .nav-item:nth-child("+(tabs-1)+") .nav-link").attr("href");
                                            navlink = navlink.replace('#apresentacao','');

                                            var id = parseInt(navlink)+1;
                                            var p = $.now();
                                            $('#li-nova-apresentacao').before('<li class="nav-item"><span style="position: relative;top: 6px; padding-left: 5px;color: #ee3900;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span><a href="#apresentacao'+id+'" style="margin-top: -19px;" class="nav-link apresentacao'+id+'" data-toggle="tab">Apresentação '+id+'</a> </li>');
                                            var divClone = $("#apresentacao1").clone();
                                            divClone.removeClass("show active");
                                            divClone.removeAttr("id").attr("id","apresentacao"+id);
                                            divClone.find(".campos_limpar").val('');
                                            $('#frmproduto .apresentacao .tab-content').append(divClone);
                                        }                                    
                                    }
                                }
                                for (let i = 0; i < json_dados.length; i++) {
                                    $('#apresentacao'+(i+1)).find("input[name='"+_key+"[]']").val(json_dados[i]);
                                }
                            }
                        }
                        else{
                            $('.form_blue').find('input.form-control[name="'+_key+'"]').val(_val);
                            $('.form_blue').find('textarea.form-control[name="'+_key+'"]').val(_val);
                        }
                    }
                });
                $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});

                $("#micronutriente").hide();
                $.each( data.info_nutri, function( _key, _val) {
                    if (_val.valor.indexOf('*') > -1){
                        $("#micronutriente").show();
                    }
                    $('.entric_composicao').find('input.form-control[name="info_nutri_'+_val.descricao+'"]').val(_val.valor);
                    $('.entric_composicao').find('textarea.form-control[name="info_nutri_'+_val.descricao+'"]').val(_val.valor);
                    $('.entric_composicao').find('textarea.form-control[name="info_nutri_'+_val.descricao+'"]').height(calcHeight(_val.valor) + "px");
                });

                $.each( data.compo, function( _key, _val) {
                    $('.entric_composicao').find('input.form-control[name="compo_'+_val.descricao+'"]').val(_val.valor);
                    $('.entric_composicao').find('textarea.form-control[name="compo_'+_val.descricao+'"]').val(_val.valor);
                    $('.entric_composicao').find('textarea.form-control[name="compo_'+_val.descricao+'"]').height(calcHeight(_val.valor) + "px");
                });

                $('#modal_retorno_produto').modal('toggle');
                b_res($("#m_frm_btneditar"));
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
            "<div class='col-md-6'>" + repo.fabricante + "</div>" +
        "</div>"
    );
    return $container;
}

function formatRepoSelection(repo) {
    if (repo.id){
        if (repo.id != ""){
            gtProduto(repo.id);
        }
    }
    return repo.text;
}

function formatRepoConsulta(repo) {
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

abriu_produto = false;
function formatRepoSelectionConsulta(repo) {
    if (repo.id){
        if (repo.id != ""){
            if(abriu_produto == false){
                abriu_produto = true;
                gtModalProdutoFiltro(repo.id, 'select2');
            }
        }
    }
    console.log(repo);
    return repo.text;
}

function select2_consulta_produto(_this){
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
        id: 'select2_consulta_produto',
        dropdownCssClass : 'bigdrop2',
        multiple: false,
        allowClear: true,
        minimumInputLength: 3,
        placeholder: '...',
        escapeMarkup: function (markup) { return markup; },
        templateResult: formatRepoConsulta,
        templateSelection: formatRepoSelectionConsulta,
        language: "pt-BR"
    });
    /*_this.on('select2:open', function (e) {
        _this.val().trigger('change');
    });*/
}

function fcRemoverFoto(){
    $("#anexar_foto").css("background-image", "url(assets/images/image-upload.png)");
    $("#anexar_foto").css("background-size", "cover");
    $("#foto").val("");
}

function calcHeight(value) {
    let numberOfLineBreaks = (value.match(/\n/g) || []).length;
    let newHeight = 20 + numberOfLineBreaks * 15 + 12 + 2;
    //let newHeight = 20 + numberOfLineBreaks * 5 + 12 + 2;
    return newHeight;
}

function set_select2(_id, _value){
    if ($('#'+_id).find("option[value='"+_value+"']").length) {
        $('#'+_id).val(''+_value+'').trigger('change');
    } else { 
        var newOption = new Option(''+_value+'', ''+_value+'', true, true);
        $('#'+_id).append(newOption).trigger('change');
    }
}

function set_select2_tag(_id, _value){
    if (_id.find("option[value='"+_value+"']").length) {
        _id.val(''+_value+'').trigger('change');
    } else { 
        var newOption = new Option(''+_value+'', ''+_value+'', true, true);
        _id.append(newOption).trigger('change');
    }
}

function modalFabricantes(){ 
    $("#modal_fabricantes").find(".entric_table_loading").show();
    $("#modal_fabricantes").find(".entric_table").hide();
    $('#modal_fabricantes').modal('toggle');
    $.ajax({
        type: "GET",
        url: 'ajax/busca_fabricantes',
        cache: false,
        dataType: 'json',
        success: function( dados ){
            var _table = $("#modal_fabricantes").find(".entric_table");
            _table.find("tbody").html("");
            jQuery.each(dados.rm, function(i,data) {
                _table.append("<tr><td>" + data + "</td><td class='text-center'><a href='javascript:modalFabricantesEditar(\""+ data +"\");' class='btn-sm text-info'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='javascript:modalFabricantesDelete(\""+ data +"\");' class='btn-sm text-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
            });
            $("#modal_fabricantes").find(".entric_table_loading").hide();
            $("#modal_fabricantes").find(".entric_table").show(); 
        }
    });
}

function modalFabricantesCadastrar(){
    $('#modal_fabricantes').modal('hide');
    $.confirm({
        title: 'Cadastrar Fabricante',
        focusTrap: false,
        content: '<div><div class="form-group"><label class="control-label">Fabricante:</label><input type="text" name="add_fabricante" id="add_fabricante" class="form-control" value=""></div></div>',
        buttons: {
            Cadastrar: {
                text: 'Cadastrar',
                btnClass: 'btn btn-secondary btn-form',
                action: function(){
                    $.ajax({
                        type: "POST",
                        url: 'ajax/fabricantes_cadastrar',                        
                        data: "fabricante="+$("#add_fabricante").val(),
                        cache: false,
                        dataType: 'json',
                        success: function( dados ){
                            if (dados.error){
                                $.alert({
                                    title: 'Atenção',
                                    icon: 'fa fa-warning',
                                    type: 'red',
                                    content: dados.error.message, 
                                });
                            }
                            else{
                                var _table = $("#modal_fabricantes").find(".entric_table");
                                _table.find("tbody").html("");
                                jQuery.each(dados.rm, function(i,data) {
                                    _table.append("<tr><td>" + data + "</td><td class='text-center'><a href='javascript:modalFabricantesEditar(\""+ data +"\");' class='btn-sm text-info'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='javascript:modalFabricantesDelete(\""+ data +"\");' class='btn-sm text-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
                                });
                                $("#modal_fabricantes").find(".entric_table_loading").hide();
                                $("#modal_fabricantes").find(".entric_table").show();
                                $('#fabricante').html('').select2({ width: '100%',
                                                                    placeholder: "...",
                                                                    //tags: true,
                                                                    multiple: false,
                                                                    allowClear: true,
                                                                    language: "pt-BR",
                                                                    data: dados.fabricantes});

                                $.alert({
                                    title: 'Sucesso',
                                    icon: 'fa fa-rocket',
                                    type: 'green',
                                    content: 'Dados cadastrados com sucesso.',
                                });                       
                            }
                            $('#modal_fabricantes').modal('show');
                        }
                    });
                }
            },
            Cancelar: function(){
                $('#modal_fabricantes').modal('show');
            },
        },
        onOpen: function () {
            setTimeout(() => {
                console.log("chegou");
                $('#add_fabricante').focus().select();
            }, 500);
        }

    });
}

function modalFabricantesEditar(fabricante){
    $.confirm({
        title: 'Editar Fabricante',
        content: '<div><div class="form-group"><label class="control-label">Fabricante:</label><input type="text" name="edit_fabricante" id="edit_fabricante" class="form-control" value="'+fabricante+'"></div></div> <input type="hidden" name="edit_fabricante_old" id="edit_fabricante_old"  value="'+fabricante+'">',
        focusTrap: false,
        buttons: {
            Salvar: {
                text: 'Salvar',
                btnClass: 'btn btn-secondary btn-form',
                action: function(){ 
                    $.ajax({
                        type: "POST",
                        url: 'ajax/fabricantes_editar',                        
                        data: "fabricante="+$("#edit_fabricante").val()+"&fabricante2="+$("#edit_fabricante_old").val(),
                        cache: false,
                        dataType: 'json',
                        success: function( dados ){
                            if (dados.error){
                                $.alert({
                                    title: 'Atenção',
                                    icon: 'fa fa-warning',
                                    type: 'red',
                                    content: dados.error.message,
                                });
                            }
                            else{
                                var _table = $("#modal_fabricantes").find(".entric_table");
                                _table.find("tbody").html("");
                                jQuery.each(dados.rm, function(i,data) {
                                    _table.append("<tr><td>" + data + "</td><td class='text-center'><a href='javascript:modalFabricantesEditar(\""+ data +"\");' class='btn-sm text-info'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='javascript:modalFabricantesDelete(\""+ data +"\");' class='btn-sm text-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
                                });
                                $("#modal_fabricantes").find(".entric_table_loading").hide();
                                $("#modal_fabricantes").find(".entric_table").show();
                                $('#fabricante').html('').select2({ width: '100%',
                                                                    placeholder: "...",
                                                                    //tags: true,
                                                                    multiple: false,
                                                                    allowClear: true,
                                                                    language: "pt-BR",
                                                                    data: dados.fabricantes});

                                $.alert({
                                    title: 'Sucesso',
                                    icon: 'fa fa-rocket',
                                    type: 'green',
                                    content: 'Dados editados com sucesso.',
                                });                       
                            }
                        }
                    });
                }
            },
            Cancelar: function(){
            }
        }
    });
}

function modalFabricantesDelete(fabricante){
    $.confirm({
        title: 'Atenção',
        content: 'Você tem certeza que deseja remover o fabricante: '+fabricante,
        theme: 'modern',
        //theme: 'material',
        //theme: 'bootstrap',
        //theme: 'supervan',
        animation: 'scale',
        buttons: {
            confirmar: {
                text: 'Confirmar',
                action: function(){
                    $.alert('Fabricante removido com sucesso.');
                    $("#modal_fabricantes").find(".entric_table_loading").show();
                    $("#modal_fabricantes").find(".entric_table").hide();
                    $.ajax({
                        type: "POST",
                        url: "ajax/remover_fabricantes",
                        data: "fabricante="+fabricante,
                        cache: false,
                        dataType: 'json',
                        success: function( dados ){
                            var _table = $("#modal_fabricantes").find(".entric_table");
                            _table.find("tbody").html("");
                            jQuery.each(dados.rm, function(i,data) {
                                _table.append("<tr><td>" + data + "</td><td class='text-center'><a href='javascript:modalFabricantesEditar(\""+ data +"\");' class='btn-sm text-info'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='javascript:modalFabricantesDelete(\""+ data +"\");' class='btn-sm text-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
                            });
                            $("#modal_fabricantes").find(".entric_table_loading").hide();
                            $("#modal_fabricantes").find(".entric_table").show();
                            $('#fabricante').html('').select2({ width: '100%',
                                                                placeholder: "...",
                                                                //tags: true,
                                                                multiple: false,
                                                                allowClear: true,
                                                                language: "pt-BR",
                                                                data: dados.fabricantes});
                        }
                    });
                }
            },
            cancelar: {
                text: 'Cancelar',
                action: function(){
                }
            }
        }
    }); 
}

function modalUnidades(){
    $("#modal_unidades").find(".entric_table_loading").show();
    $("#modal_unidades").find(".entric_table").hide();
    $('#modal_unidades').modal('toggle');
    $.ajax({
        type: "GET",
        url: 'ajax/busca_unidades',
        cache: false,
        dataType: 'json',
        success: function( dados ){
            var _table = $("#modal_unidades").find(".entric_table");
            _table.find("tbody").html("");
            jQuery.each(dados.rm, function(i,data) {
                _table.append("<tr><td>" + data + "</td><td class='text-center'><a href='javascript:modalUnidadesEditar(\""+ data +"\");' class='btn-sm text-info'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='javascript:modalUnidadesDelete(\""+ data +"\");' class='btn-sm text-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
            });
            $("#modal_unidades").find(".entric_table_loading").hide();
            $("#modal_unidades").find(".entric_table").show();
        }
    });
}

function modalUnidadesCadastrar(){
    $.confirm({
        title: 'Cadastrar Unidade',
        content: '<div><div class="form-group"><label class="control-label">Unidade:</label><input type="text" name="add_unidade" id="add_unidade" class="form-control" value=""></div></div>',
        buttons: {
            Cadastrar: {
                text: 'Cadastrar',
                btnClass: 'btn btn-secondary btn-form',
                action: function(){
                    $.ajax({
                        type: "POST",
                        url: 'ajax/unidades_cadastrar',                        
                        data: "unidade="+$("#add_unidade").val(),
                        cache: false,
                        dataType: 'json',
                        success: function( dados ){
                            if (dados.error){
                                $.alert({
                                    title: 'Atenção',
                                    icon: 'fa fa-warning',
                                    type: 'red',
                                    content: dados.error.message,
                                });
                            }
                            else{
                                var _table = $("#modal_unidades").find(".entric_table");
                                _table.find("tbody").html("");
                                jQuery.each(dados.rm, function(i,data) {
                                    _table.append("<tr><td>" + data + "</td><td class='text-center'><a href='javascript:modalUnidadesEditar(\""+ data +"\");' class='btn-sm text-info'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='javascript:modalUnidadesDelete(\""+ data +"\");' class='btn-sm text-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
                                });
                                $("#modal_unidades").find(".entric_table_loading").hide();
                                $("#modal_unidades").find(".entric_table").show();
                                $('[name="unidade[]"]').each(function(){
                                    var selector = $(this);
                                    var selector_cted = selector.select2('data');
                                    selector.parent().find(".select2-container--below").remove();
                                    selector.parent().find(".select2-container--default").remove();
                                    selector.removeAttr('data-live-search')
                                            .removeAttr('data-select2-id')
                                            .removeAttr('aria-hidden')
                                            .removeAttr('tabindex')
                                            .removeClass('select2-hidden-accessible');
                                    selector.find('option[value]').remove();        
                                    selector.empty();
                                    selector.removeData();
                                    selector.select2({  width: '100%',
                                                        placeholder: "...",
                                                        multiple: false,
                                                        allowClear: true,
                                                        language: "pt-BR",
                                                        data: dados.unidades});
                                    if (typeof selector_cted[0].text !== "undefined") {
                                        selector.val(selector_cted[0].id).trigger('change');
                                    }
                                });

                                $.alert({
                                    title: 'Sucesso',
                                    icon: 'fa fa-rocket',
                                    type: 'green',
                                    content: 'Dados cadastrados com sucesso.',
                                });                       
                            }
                        }
                    });
                }
            },
            Cancelar: function(){
            }
        }
    });
}

function modalUnidadesEditar(unidade){
    $.confirm({
        title: 'Editar Unidade',
        content: '<div><div class="form-group"><label class="control-label">Unidade:</label><input type="text" name="edit_unidade" id="edit_unidade" class="form-control" value="'+unidade+'"></div></div> <input type="hidden" name="edit_unidade_old" id="edit_unidade_old"  value="'+unidade+'">',
        buttons: {
            Salvar: {
                text: 'Salvar',
                btnClass: 'btn btn-secondary btn-form',
                action: function(){
                    $.ajax({
                        type: "POST",
                        url: 'ajax/unidades_editar',                        
                        data: "unidade="+$("#edit_unidade").val()+"&unidade2="+$("#edit_unidade_old").val(),
                        cache: false,
                        dataType: 'json',
                        success: function( dados ){
                            if (dados.error){
                                $.alert({
                                    title: 'Atenção',
                                    icon: 'fa fa-warning',
                                    type: 'red',
                                    content: dados.error.message,
                                });
                            }
                            else{
                                var _table = $("#modal_unidades").find(".entric_table");
                                _table.find("tbody").html("");
                                jQuery.each(dados.rm, function(i,data) {
                                    _table.append("<tr><td>" + data + "</td><td class='text-center'><a href='javascript:modalUnidadesEditar(\""+ data +"\");' class='btn-sm text-info'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='javascript:modalUnidadesDelete(\""+ data +"\");' class='btn-sm text-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
                                });
                                $("#modal_unidades").find(".entric_table_loading").hide();
                                $("#modal_unidades").find(".entric_table").show();
                                $('[name="unidade[]"]').each(function(){
                                    var selector = $(this);
                                    var selector_cted = selector.select2('data');
                                    selector.parent().find(".select2-container--below").remove();
                                    selector.parent().find(".select2-container--default").remove();
                                    selector.removeAttr('data-live-search')
                                            .removeAttr('data-select2-id')
                                            .removeAttr('aria-hidden')
                                            .removeAttr('tabindex')
                                            .removeClass('select2-hidden-accessible');
                                    selector.find('option[value]').remove();        
                                    selector.empty();
                                    selector.removeData();
                                    selector.select2({  width: '100%',
                                                        placeholder: "...",
                                                        multiple: false,
                                                        allowClear: true,
                                                        language: "pt-BR",
                                                        data: dados.unidades});
                                    if (typeof selector_cted[0].text !== "undefined") {
                                        selector.val(selector_cted[0].id).trigger('change');
                                    }
                                });

                                $.alert({
                                    title: 'Sucesso',
                                    icon: 'fa fa-rocket',
                                    type: 'green',
                                    content: 'Dados editados com sucesso.',
                                });                       
                            }
                        }
                    });
                }
            },
            Cancelar: function(){
            }
        }
    });
}

function modalUnidadesDelete(unidade){
    $.confirm({
        title: 'Atenção',
        content: 'Você tem certeza que deseja remover a unidade: '+unidade,
        theme: 'modern',
        //theme: 'material',
        //theme: 'bootstrap',
        //theme: 'supervan',
        animation: 'scale',
        buttons: {
            confirmar: {
                text: 'Confirmar',
                action: function(){
                    $.alert('Unidade removido com sucesso.');
                    $("#modal_unidades").find(".entric_table_loading").show();
                    $("#modal_unidades").find(".entric_table").hide();
                    $.ajax({
                        type: "POST",
                        url: "ajax/remover_unidades",
                        data: "unidade="+unidade,
                        cache: false,
                        dataType: 'json',
                        success: function( dados ){
                            var _table = $("#modal_unidades").find(".entric_table");
                            _table.find("tbody").html("");
                            jQuery.each(dados.rm, function(i,data) {
                                _table.append("<tr><td>" + data + "</td><td class='text-center'><a href='javascript:modalUnidadesEditar(\""+ data +"\");' class='btn-sm text-info'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='javascript:modalUnidadesDelete(\""+ data +"\");' class='btn-sm text-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
                            });
                            $("#modal_unidades").find(".entric_table_loading").hide();
                            $("#modal_unidades").find(".entric_table").show();
                            $('[name="unidade[]"]').each(function(){
                                var selector = $(this);
                                var selector_cted = selector.select2('data');
                                selector.parent().find(".select2-container--below").remove();
                                selector.parent().find(".select2-container--default").remove();
                                selector.removeAttr('data-live-search')
                                        .removeAttr('data-select2-id')
                                        .removeAttr('aria-hidden')
                                        .removeAttr('tabindex')
                                        .removeClass('select2-hidden-accessible');
                                selector.find('option[value]').remove();        
                                selector.empty();
                                selector.removeData();
                                selector.select2({  width: '100%',
                                                    placeholder: "...",
                                                    multiple: false,
                                                    allowClear: true,
                                                    language: "pt-BR",
                                                    data: dados.unidades});
                                if (typeof selector_cted[0].text !== "undefined") {
                                    selector.val(selector_cted[0].id).trigger('change');
                                }
                            });
                        }
                    });
                }
            },
            cancelar: {
                text: 'Cancelar',
                action: function(){
                }
            }
        }
    }); 
}

function fcExcluirCadastro(){
    if ($("#_idproduto").val() !== ""){
        $.confirm({
            title: 'Atenção',
            icon: 'fa fa-warning',
            type: 'red',
            content: 'Você tem certeza que deseja excluir o cadastro do produto?',
            buttons: {
                Excluir: {
                    text: 'Excluir',
                    btnClass: 'btn btn-danger btn-form',
                    action: function(){
                        $.ajax({
                            type: "POST",
                            url: "ajax/produto_excluir",
                            data: "_idproduto="+$("#_idproduto").val(),
                            cache: false,
                            dataType: 'json',
                            success: function( dados ){
                                $.alert({
                                    title: 'Sucesso',
                                    icon: 'fa fa-rocket',
                                    type: 'green',
                                    content: 'Cadastro de produto excluído com sucesso.',
                                    buttons: {
                                        Ok: {
                                            text: 'Ok',
                                            btnClass: 'btn btn-secondary btn-form'
                                        }
                                    }
                                });
                                frmreset();  
                            }
                        });
                 
                    }
                },
                Cancelar: function(){
                }
            }
        });
    }
}

$(function(){
    if(jQuery().select2) {
        $(".select2").select2({
            width: '100%',
            placeholder: "selecione...",
            allowClear: true,
            language: "pt-BR"
        });
    }

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

    $(".select-tag").select2({
        width: '100%',
        placeholder: "...",
        //tags: true,
        multiple: false,
        allowClear: true,
        language: "pt-BR"
    }); 

    $(".select-tag2").select2({
        width: '100%',
        placeholder: "...",
        //tags: true,
        multiple: true,
        allowClear: true,
        language: "pt-BR"
    }); 
    
    $('.resize-ta').on("keyup", function(e) {
        $(this).height(calcHeight($(this).val()) + "px");
    });

    $('#frmfiltroproduto .search_chg').change(function () {
        $("#filtro_resultado_produtos").hide();
        $("#filtro_resultado_produtos_nao").hide();
        $.ajax({
            type: "POST",
            url: "ajax/busca_produto_filtros",
            data: $("#frmfiltroproduto :input:not(:hidden)").serialize(),
            cache: false,
            dataType: 'json',
            success: function( dados ){
                var rows = '';
                $.each(dados, function (key, item) {
                    var apres_oral = jQuery.parseJSON(item.apres_oral);
                    var apresentacao = '';
                    $.each(apres_oral, function (apres_oral_key, apres_oral_item) {
                        apresentacao = apresentacao + apres_oral_item +'<br>';
                    });

                    var apres_enteral = jQuery.parseJSON(item.apres_enteral);
                    $.each(apres_enteral, function (apres_enteral_key, apres_enteral_item) {
                        apresentacao = apresentacao + apres_enteral_item +'<br>';
                    });

                    var carac_oral = jQuery.parseJSON(item.carac_oral);
                    var caracteristicas = '';
                    $.each(carac_oral, function (carac_oral_key, carac_oral_item) {
                        caracteristicas = caracteristicas + carac_oral_item +'<br>';
                    });

                    var carac_enteral = jQuery.parseJSON(item.carac_enteral);
                    $.each(carac_enteral, function (carac_enteral_key, carac_enteral_item) {
                        caracteristicas = caracteristicas + carac_enteral_item +'<br>';
                    });

                    var cat_modulo = jQuery.parseJSON(item.cat_modulo);
                    $.each(cat_modulo, function (cat_modulo_key, cat_modulo_item) {
                        caracteristicas = caracteristicas + cat_modulo_item +'<br>';
                    });

                    rows = rows + '<tr class="tabrow" rel="'+item.id+'">'+ 
                                '<td>'+item.id+'</td>'+
                                '<td>'+item.nome+'</td>'+
                                '<td>'+item.fabricante+'</td>'+
                                '<td>'+apresentacao+'</td>'+
                                '<td>'+caracteristicas+'</td>'+
                            '</tr>';  
                });
                if (rows != ""){
                    $("#filtro_resultado_produtos").show();
                    $("#filtro_resultado_produtos tbody").html(rows);
                }
                else{
                    $("#filtro_resultado_produtos_nao").show();                    
                }
                $('.tabrow').on("click", function(e) {
                    gtModalProdutoFiltro($(this).attr("rel"), 'filtro');
                });
            }
        });
    });

    $('#frmproduto input:radio[name=via]').change(function () {
        if ($("#frmproduto input[name='via']:checked").val() == 'Enteral') {
            $("#apresentacao_enteral").removeClass("none");
            $("#apresentacao_oral").addClass("none");
            $("#apresentacao_modulo").addClass("none");
            $(".unidademedida").removeClass("block").addClass("none");
            // $(".nounidademedida").removeClass("none").addClass("block");
            $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
            $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");

        }else if ($("#frmproduto input[name='via']:checked").val() == 'Suplemento') {
            $("#apresentacao_enteral").addClass("none");
            $("#apresentacao_modulo").addClass("none");
            $("#apresentacao_oral").removeClass("none");
            $(".unidademedida").removeClass("none").addClass("block");
            // $(".nounidademedida").removeClass("block").addClass("none");

            if ($("#frmproduto input[name='unidmedida']:checked").val() == 'gramas') {
                $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
                $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
            }else{
                $("#frmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
            }
        }else if ($("#frmproduto input[name='via']:checked").val() == 'Módulo') {
            $("#apresentacao_enteral").addClass("none");
            $("#apresentacao_modulo").removeClass("none");
            $("#apresentacao_oral").addClass("none");
            $(".unidademedida").removeClass("none").addClass("block");
            // $(".nounidademedida").removeClass("block").addClass("none");

            if ($("#frmproduto input[name='unidmedida']:checked").val() == 'gramas') {
                $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
                $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
            }else{
                $("#frmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
            }
        }else{
            $("#apresentacao_enteral").addClass("none");
            $("#apresentacao_oral").addClass("none");
            $("#apresentacao_modulo").addClass("none");
            $(".unidademedida").removeClass("none").addClass("block");
            // $(".nounidademedida").removeClass("block").addClass("none");

            if ($("#frmproduto input[name='unidmedida']:checked").val() == 'gramas') {
                $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
                $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
            }else{
                $("#frmproduto .dosagem_quantidade").html("Quantidade por 100ml");
                $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
            }
        }
    });

    $('#frmproduto input:radio[name=unidmedida]').change(function () {
        if ($("#frmproduto input:radio[name='unidmedida']:checked").val() == 'gramas') {
            $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
            $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
        }else{
            $("#frmproduto .dosagem_quantidade").html("Quantidade por 100ml");
            $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
        }
    });

    $('#frmfiltroproduto input:radio[name=via]').change(function () {
        if ($("#frmfiltroproduto input[name='via']:checked").val() == 'Enteral') {
            $("#filtro_apresentacao_modulo").addClass("none");
            $("#filtro_apresentacao_enteral").removeClass("none");
            $("#filtro_apresentacao_oral").addClass("none");
        }else if ($("#frmfiltroproduto input[name='via']:checked").val() == 'Suplemento') {
            $("#filtro_apresentacao_modulo").addClass("none");
            $("#filtro_apresentacao_enteral").addClass("none");
            $("#filtro_apresentacao_oral").removeClass("none");
        }else if ($("#frmfiltroproduto input[name='via']:checked").val() == 'Módulo') {
            $("#filtro_apresentacao_enteral").addClass("none");
            $("#filtro_apresentacao_oral").addClass("none");
            $("#filtro_apresentacao_modulo").removeClass("none");
        }else{
            $("#filtro_apresentacao_enteral").addClass("none");
            $("#filtro_apresentacao_oral").addClass("none");
            $("#filtro_apresentacao_modulo").addClass("none");
        }
    });

    select2_ajax_produto($(".select2_ajax_produto"));    
    select2_consulta_produto($(".select2_consulta_produto"));
    $('#select2_consulta_produto').on('dblclick', function () {
        $('.select2_consulta_produto').select2('close');
        if ($(".select2_consulta_produto").select2('val') !== null){
            gtModalProdutoFiltro( $(".select2_consulta_produto").select2('val') , 'select2');
        }
    });

    $('input:radio[name=medida]').change(function () {
        if ($("input[name='medida']:checked").val() == 'g') {
            $(".medida_dc").hide();
            $(".medida_g").show();
        }else{
            $(".medida_dc").show();
            $(".medida_g").hide();    
        }
    });

    $("input:radio[name='apres_enteral[]']").change(function () {
        if ($("input[name='apres_enteral[]']:checked").val() == 'Aberto (Pó)') {
            $("#frmproduto .entric_comptitulo").html("Informações Nutricionais na Diluição Padrão (100ml)");
            $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
            $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
        }else{
            $("#frmproduto .entric_comptitulo").html("Informações Nutricionais (100ml)");
            $("#frmproduto .dosagem_quantidade").html("Quantidade por 100ml");
            $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
        }
    });
    if ($("input[name='apres_enteral[]']:checked").val() == 'Aberto (Pó)') {
        $("#frmproduto .entric_comptitulo").html("Informações Nutricionais na Diluição Padrão (100ml)");
        $("#frmproduto .dosagem_quantidade").html("Quantidade por 100g");
        $("#frmproduto .volmedida").parent().find(".input-group-text").html("g");
    }else{
        $("#frmproduto .entric_comptitulo").html("Informações Nutricionais (100ml)");
        $("#frmproduto .dosagem_quantidade").html("Quantidade por 100ml");
        $("#frmproduto .volmedida").parent().find(".input-group-text").html("ml");
    }

    $("#tab-densidades").on("click", "a", function(e) {
        e.preventDefault();
        $(this).tab('show');
    })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".densidades .nav-tabs li").children('a').first().click();
    });
    $('.nova-densidades').click(function(e) {
        var tabs = $("#tab-densidades .nav-item").length;
        var navlink = $("#tab-densidades .nav-item:nth-child("+(tabs-1)+") .nav-link").attr("href");
        navlink = navlink.replace('#densidades','');
        var id = parseInt(navlink)+1;
        var p = $.now();

        $('#li-nova-densidades').before('<li class="nav-item"><span style="position: relative;top: 6px; padding-left: 5px;color: #ee3900;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span><a href="#densidades'+id+'" style="margin-top: -19px;" class="nav-link densidades'+id+'" data-toggle="tab">Densidade Calórica '+id+'</a> </li>');
        var divClone = $("#densidades1").clone();
        divClone.removeClass("show active");
        divClone.removeAttr("id").attr("id","densidades"+id);
        divClone.find(".campos_limpar").val('');
        $('.densidades .tab-content').append(divClone);
        $('.densidades .nav-tabs a[href="#densidades'+id+'"]').tab('show');
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});

        var selector = $("#densidades"+id).find(".select-tag");
        var selector_data = $.map(selector.find('option') ,function(option) {
            return option.value;
        });

        selector.parent().find(".select2-container--below").remove();
        selector.parent().find(".select2-container--default").remove();
        selector.removeAttr('data-live-search')
                .removeAttr('data-select2-id')
                .removeAttr('aria-hidden')
                .removeAttr('tabindex')
                .removeClass('select2-hidden-accessible');
        selector.find('option[value]').remove();        
        selector.empty();
        selector.removeData();
        /*$("#densidades"+id).find(".select-tag").select2({
            width: '100%',
            placeholder: "...",
            //tags: true,
            multiple: false,
            allowClear: true,
            language: "pt-BR"
        });*/
        $("#densidades"+id).find(".select-tag").select2({ width: '100%',
                                    placeholder: "...",
                                    multiple: false,
                                    allowClear: true,
                                    language: "pt-BR",
                                    data: selector_data});
    });

    $("#tab-apresentacao").on("click", "a", function(e) {
        e.preventDefault();
        $(this).tab('show');
    })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".apresentacao .nav-tabs li").children('a').first().click();
    });
    $('.nova-apresentacao').click(function(e) {
        var tabs = $("#tab-apresentacao .nav-item").length;
        var navlink = $("#tab-apresentacao .nav-item:nth-child("+(tabs-1)+") .nav-link").attr("href");
        navlink = navlink.replace('#apresentacao','');
        var id = parseInt(navlink)+1;
        var p = $.now();

        $('#li-nova-apresentacao').before('<li class="nav-item"><span style="position: relative;top: 6px; padding-left: 5px;color: #ee3900;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span><a href="#apresentacao'+id+'" style="margin-top: -19px;" class="nav-link apresentacao'+id+'" data-toggle="tab">Apresentação '+id+'</a> </li>');
        var divClone = $("#apresentacao1").clone();
        divClone.removeClass("show active");
        divClone.removeAttr("id").attr("id","apresentacao"+id);
        divClone.find(".campos_limpar").val('');
        $('.apresentacao .tab-content').append(divClone);
        $('.apresentacao .nav-tabs a[href="#apresentacao'+id+'"]').tab('show');        

        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
    });

    $('#frmproduto').validate({
        errorPlacement: function(error, element) { 
        },
        highlight: function(element, errorClass){
        },
        unhighlight: function(element, errorClass, validClass){
        },
        success: function(){
            b_res($(this).find(':submit'));                
        },
        invalidHandler: function(event, validator) {
            //toastr['error']('Por favor, preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });
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
            if ($("#_idproduto").val() !== ""){
                
                var _this = $(this);
                if ($('#frmproduto').valid() === false){
                    $('#frmproduto').submit();
                }
                else{
                    //b_lo(_this);

                    var _this = $(this);
                    b_lo($("#frm_btnsalvar"));
                    $("#micronutriente").hide();

                    var formData = new FormData();
                    var files = $('input[type=file]');
                    for (var i = 0; i < files.length; i++) {
                        if (files[i].files[0]){
                            formData.append(files[i].name, files[i].files[0]);
                        }
                    }
                    //var formSerializeArray = $("#frmproduto :input:not(:hidden)").serializeArray();
                    var formSerializeArray = $("#frmproduto").serializeArray();
                    for (var i = 0; i < formSerializeArray.length; i++) {
                        if ((formSerializeArray[i].name == "nome")){
                            formData.append(formSerializeArray[i].name, $("input[name=nome]").val());  
                        }
                        else{
                            formData.append(formSerializeArray[i].name, formSerializeArray[i].value);
                        }
                    } 
                    formData.append("_idproduto",$("#_idproduto").val());

                    $.ajax({
                        type: "POST",
                        url: "ajax/produto_editar",
                        enctype: 'multipart/form-data',
                        data: formData,
                        contentType: false,
                        processData: false, 
                        cache: false,
                        dataType: 'json',
                        success: function( dados ){
                            b_res($("#frm_btnsalvar"));
                            if (dados.error){
                                //toastr['error'](dados.error.message, '', {positionClass: 'toast-top-right' });
                                $.alert({
                                    title: 'Atenção',
                                    icon: 'fa fa-warning',
                                    type: 'red',
                                    content: dados.error.message,
                                });
                            }
                            else{
                                //toastr['success'](dados.message, '', {positionClass: 'toast-top-right' });
                                $.alert({
                                    title: 'Sucesso',
                                    icon: 'fa fa-rocket',
                                    type: 'green',
                                    content: dados.message,
                                    buttons: {
                                        Ok: {
                                            text: 'Ok',
                                            btnClass: 'btn btn-secondary btn-form'
                                        }
                                    }
                                });

                                $('#fabricante').html('').select2({ width: '100%',
                                                                    placeholder: "...",
                                                                    //tags: true,
                                                                    multiple: false,
                                                                    allowClear: true,
                                                                    language: "pt-BR",
                                                                    data: dados.fabricantes});
                                frmreset();
                            }
                        }
                    });
                }

            }else{
                var _this = $(this);
                //b_lo(_this.find(':submit'));
                b_lo($("#frm_btnsalvar"));

                var formData = new FormData();
                var files = $('input[type=file]');
                for (var i = 0; i < files.length; i++) {
                    if (files[i].files[0]){
                        formData.append(files[i].name, files[i].files[0]); 
                    }
                }
                //var formSerializeArray = $("#frmproduto :input:not(:hidden)").serializeArray();
                var formSerializeArray = $("#frmproduto").serializeArray();
                for (var i = 0; i < formSerializeArray.length; i++) {
                    if ((formSerializeArray[i].name == "nome")){
                        formData.append(formSerializeArray[i].name, $("input[name=nome]").val());  
                    }
                    else{
                        formData.append(formSerializeArray[i].name, formSerializeArray[i].value);
                    }
                } 

                $.ajax({
                    type: "POST",
                    url: "ajax/produto_salvar",
                    enctype: 'multipart/form-data',
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    success: function( dados ){
                        b_res($("#frm_btnsalvar"));                        
                        if (dados.error){
                            //toastr['error'](dados.error.message, '', {positionClass: 'toast-top-right' });
                            $.alert({
                                title: 'Atenção',
                                icon: 'fa fa-warning',
                                type: 'red',
                                content: dados.error.message,
                            });
                        }
                        else{
                            //toastr['success'](dados.message, '', {positionClass: 'toast-top-right' });
                            $.alert({
                                title: 'Sucesso',
                                icon: 'fa fa-rocket',
                                type: 'green',
                                content: dados.message,
                            });
                            $('#fabricante').html('').select2({ width: '100%',
                                                                placeholder: "...",
                                                                //tags: true,
                                                                multiple: false,
                                                                allowClear: true,
                                                                language: "pt-BR",
                                                                data: dados.fabricantes});
                            frmreset();
                        }
                    }
                });
            }
        }
    });
    
    $('#m_frm_btneditar').on("click", function(e) {
        b_lo($("#m_frm_btneditar"));
        gtProdutoFiltro($("#m__idproduto").val());
    });

    $('#frm_btneditar').on("click", function(e) {
        if ($("#_idproduto").val() !== ""){
            var _this = $(this);
            if ($('#frmproduto').valid() === false){
                $('#frmproduto').submit();
            }
            else{
                b_lo(_this);

                var _this = $(this);
                //b_lo(_this.find(':submit'));
                b_lo($("#frm_btneditar"));

                var formData = new FormData();
                var files = $('input[type=file]');
                for (var i = 0; i < files.length; i++) {
                    if (files[i].files[0]){
                        formData.append(files[i].name, files[i].files[0]);
                    }
                    /*
                    if (files[i].value == "" || files[i].value == null) {
                        return false;
                    }
                    else {
                        formData.append(files[i].name, files[i].files[0]);
                    }*/
                }
                //var formSerializeArray = $("#frmproduto :input:not(:hidden)").serializeArray();
                var formSerializeArray = $("#frmproduto").serializeArray();

                for (var i = 0; i < formSerializeArray.length; i++) {
                    if ((formSerializeArray[i].name == "nome")){
                        formData.append(formSerializeArray[i].name, $("input[name=nome]").val());  
                    }
                    else{
                        formData.append(formSerializeArray[i].name, formSerializeArray[i].value);
                    }
                } 

                $.ajax({
                    type: "POST",
                    url: "ajax/produto_editar",
                    enctype: 'multipart/form-data',
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    success: function( dados ){
                        b_res($("#frm_btneditar"));
                        //b_res(_this);
                        if (dados.error){
                            //toastr['error'](dados.error.message, '', {positionClass: 'toast-top-right' });
                            $.alert({
                                title: 'Atenção',
                                icon: 'fa fa-warning',
                                type: 'red',
                                content: dados.error.message,
                            });
                        }
                        else{
                            //toastr['success'](dados.message, '', {positionClass: 'toast-top-right' });
                            $.alert({
                                title: 'Sucesso',
                                icon: 'fa fa-rocket',
                                type: 'green',
                                content: dados.message,
                            });
                            frmreset();                            
                        }
                    }
                });
            }
        }
        else{
            //toastr['error']('Por favor, pesquise pelo produto antes de edita-lo.', '', {positionClass: 'toast-top-right' });
            $.alert({
                title: 'Atenção',
                icon: 'fa fa-warning',
                type: 'red',
                content: 'Por favor, pesquise pelo produto antes de edita-lo.',
            });
        }
    });
});

function readURL(input) {
    if(input){
        var reader = new FileReader();
        reader.onload = function(){
            $("#anexar_foto").css("background-image", "url(" + reader.result + ")");
            $("#anexar_foto").css("background-size", "contain");
        }
        reader.readAsDataURL(input);
    }
}

$(function() {
    $(document).on('change', ':file', function() {
        var input = $(this);
        var numFiles = input.get(0).files ? input.get(0).files.length : 1;
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        readURL(input.get(0).files[0]);
    });  
});
</script>