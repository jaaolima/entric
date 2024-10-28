<script src="js/jquery/select2/js/select2.full.min.js"></script>
<script src="js/jquery/select2/js/pt-BR.js"></script>
<script src="js/jquery/jquery-validation/jquery.validate.min.js"></script>

<script>
function gtProduto(_id){
    $.ajax({
        type: "POST",
        url: "ajax/produto_abrir",
        data: "id="+_id,
        cache: false,
        dataType: 'json',
        success: function( data ){
            if (data.error){
                toastr['error'](data.error.message, '', {positionClass: 'toast-top-right' });
            }
            else{
                $('input:radio[name=especialidade]').filter('[value='+data.especialidade+']').prop('checked', true);
                $('input:radio[name=via]').filter('[value='+data.via+']').prop('checked', true);
                $('input[name=_idproduto]').val(_id);

                if ($("input[name='via']:checked").val() == 'Enteral') {
                    $("#apresentacao_enteral").removeClass("none");
                    $("#apresentacao_oral").addClass("none");
                    
                    var apres_enteral = JSON.parse(data.apres_enteral);
                    $.each(apres_enteral, function() {
                        $('input:checkbox[name="apres_enteral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });
                    
                    var carac_enteral = JSON.parse(data.carac_enteral);
                    $.each(carac_enteral, function() {
                        $('input:checkbox[name="carac_enteral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });

                }else if ($("input[name='via']:checked").val() == 'Oral') {
                    $("#apresentacao_enteral").addClass("none");
                    $("#apresentacao_oral").removeClass("none");
                    
                    var apres_oral = JSON.parse(data.apres_oral);
                    $.each(apres_oral, function() {
                        $('input:checkbox[name="apres_oral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });
                    
                    var carac_oral = JSON.parse(data.carac_oral);
                    $.each(carac_oral, function() {
                        $('input:checkbox[name="carac_oral[]"]').filter('[value="'+this+'"]').prop('checked', true);
                    });

                }else{
                    $("#apresentacao_enteral").addClass("none");
                    $("#apresentacao_oral").addClass("none");
                }

                $.each( data, function( _key, _val) {
                    if ((_key == "medida") && (_val == "g")){
                        $('input:radio[name="medida"]').filter('[value="'+_val+'"]').prop('checked', true);
                        $(".medida_dc").hide();
                        $(".medida_g").show();
                    }else if ((_key == "medida") && (_val == "dc")){
                        $('input:radio[name="medida"]').filter('[value="'+_val+'"]').prop('checked', true);
                        $(".medida_dc").show();
                        $(".medida_g").hide();
                    }else if (_key == "apresentacao"){
                        $('input:radio[name="apresentacao"]').filter('[value="'+_val+'"]').prop('checked', true);
                    }else{
                        $('.form_blue').find('input.form-control[name="'+_key+'"]').val(_val);
                        $('.form_blue').find('textarea.form-control[name="'+_key+'"]').val(_val);
                    }
                });

                $.each( data.info_nutri, function( _key, _val) {
                    $('.entric_composicao').find('input.form-control[name="info_nutri_'+_val.descricao+'"]').val(_val.valor);
                });
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
        placeholder: '...',
        escapeMarkup: function (markup) { return markup; },
        templateResult: formatRepo,
        templateSelection: formatRepoSelection,
        language: "pt-BR"
    });
}

function frmreset(){
    $('.form-check-input').prop('checked', false);
    $('.form_blue').find('input.form-control').val('');
    $('.form_blue').find('textarea').val('');
    $('.entric_composicao').find('input').val('');
    $('#_idproduto').val('');
    $('.select2_ajax_produto').val(null).trigger('change');
}

$(function(){
    $('input:radio[name=via]').change(function () {
        if ($("input[name='via']:checked").val() == 'Enteral') {
            $("#apresentacao_enteral").removeClass("none");
            $("#apresentacao_oral").addClass("none");
        }else if ($("input[name='via']:checked").val() == 'Oral') {
            $("#apresentacao_enteral").addClass("none");
            $("#apresentacao_oral").removeClass("none");
        }else{
            $("#apresentacao_enteral").addClass("none");
            $("#apresentacao_oral").addClass("none");
        }
    });

    select2_ajax_produto($(".select2_ajax_produto"));

    $('input:radio[name=medida]').change(function () {
        if ($("input[name='medida']:checked").val() == 'g') {
            $(".medida_dc").hide();
            $(".medida_g").show();
        }else{
            $(".medida_dc").show();
            $(".medida_g").hide();    
        }
    });

    $('#frmproduto').validate({
        errorPlacement: function(error, element) { },
        highlight: function(element, errorClass){
        },
        unhighlight: function(element, errorClass, validClass){
        },
        success: function(){
            b_res($(this).find(':submit'));                
        },
        submitHandler: function( form ){
            if ($("#_idproduto").val() !== ""){
                toastr['error']('Vocês esta no modo de edição de produto.', '', {positionClass: 'toast-top-right' });

            }else{
                var _this = $(this);
                b_lo(_this.find(':submit'));
                $.ajax({
                    type: "POST",
                    url: "ajax/produto_salvar",
                    data: $("#frmproduto").serialize(),
                    cache: false,
                    dataType: 'json',
                    success: function( data ){
                        b_res(_this.find(':submit'));
                        if (data.error){
                            toastr['error'](data.error.message, '', {positionClass: 'toast-top-right' });
                        }
                        else{
                            toastr['success'](data.message, '', {positionClass: 'toast-top-right' });
                            frmreset();
                        }
                    }
                });
            }
        }
    });

    $('#frm_btneditar').on("click", function(e) {
        if ($("#_idproduto").val() !== ""){
            var _this = $(this);
            if ($('#frmproduto').valid() === false){
                $('#frmproduto').submit();
            }
            else{
                b_lo(_this);
                $.ajax({
                    type: "POST",
                    url: "ajax/produto_editar",
                    data: $("#frmproduto").serialize(),
                    cache: false,
                    dataType: 'json',
                    success: function( data ){
                        b_res(_this);
                        if (data.error){
                            toastr['error'](data.error.message, '', {positionClass: 'toast-top-right' });
                        }
                        else{
                            toastr['success'](data.message, '', {positionClass: 'toast-top-right' });
                            frmreset();                            
                        }
                    }
                });
            }
        }
        else{
            toastr['error']('Por favor, pesquise pelo produto antes de edita-lo.', '', {positionClass: 'toast-top-right' });
        }
    });
});
</script>