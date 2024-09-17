<script src="js/bootstrap/bootstrap-input-spinner/bootstrap-input-spinner.js"></script>
<script src="js/bootstrap/bootstrap-input-spinner/custom-editors.js"></script>
<script>
$(function(){
    $(".plusminus").inputSpinner();


    /* cálculo de terapia nutricional *********************************************************************** */
    $('input:radio[name=tipo_prescricao]').change(function () {
        if ($("input[name='tipo_prescricao']:checked").val() == 'Prescrição Manual') {
            $("#apresentacao").hide();
            $("#prescricao_nutricional").hide();
        }else{
            $("#apresentacao").show();
            $("#prescricao_nutricional").show();
        }
    });
    $('#calculo_apres_aberto_po').on('change', function() {
        if ($("#calculo_apres_aberto_po").is(':checked')){
            $('#modal_selecao').modal('toggle');
        }
    });
    /* **************************************************************************** */


    /* necessidades nutricionais **************************************************************************** */
    $('#nec_calorias_peso').on('change', function() {
        $("#nec_calorias_peso_valor").val( $("#peso_valor").val() );
    });
    $('#nec_proteinas_peso').on('change', function() {
        $("#nec_proteinas_peso_valor").val( $("#peso_valor").val() );
    });
    $('#nec_agua_peso').on('change', function() {
        $("#nec_agua_peso_valor").val( $("#peso_valor").val() );
    });
    /* **************************************************************************** */


    /* avaliação nutricional **************************************************************************** */
    $("#btn_circunferencias").on("click", function(e) {
        if (($("input[name='circunferencia_lado']:checked").val()) && ($("#circunferencias").val() != "")) {
            var _div = '<div class="row mb-4 m-0"><div class="col-sm-6"><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i>  '+$("#circunferencias").val()+'</div><div class="col-sm-3">'+$("#circunferencias_valor").val()+' cm</div><div class="col-sm-3">'+$('input[name=circunferencia_lado]:checked').val()+'</div></div>';
            $(".circunferencias_valor_div").append(_div);
        }
    });
    $("#btn_dobras").on("click", function(e) {
        if (($("input[name='dobras_lado']:checked").val()) && ($("#dobras").val() != "")) {
            var _div = '<div class="row mb-4 m-0"><div class="col-sm-6"><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i>   '+$("#dobras").val()+'</div><div class="col-sm-3">'+$("#dobras_valor").val()+' cm</div><div class="col-sm-3">'+$('input[name=dobras_lado]:checked').val()+'</div></div>';
            $(".dobras_valor_div").append(_div);
        }
    });
    /* **************************************************************************** */

    
    
    /* cadastro **************************************************************************** */
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
    /* **************************************************************************** */


    // historico  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
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


    // avaliacao  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
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


    // necessidades  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
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


    // calculo  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    $("#editar_prescricao").on("click", function(e) {    
        $(".tabcalculo").addClass('disabledTab');    
        $('.tabcalculo a').removeClass('active');
        $('#calculo').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $('.tabnecessidades a').addClass('active');
        $('#necessidades').addClass('active').addClass('show').attr('aria-expanded','true');
    });

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

    /*
    $("#calculo_avancar").on("click", function(e) {        
        $('.tabcalculo a').removeClass('active');
        $('#calculo').removeClass('active').removeClass('show').attr('aria-expanded','false');
 
        $(".tabobservacoes").removeClass('disabledTab');
        $('.tabobservacoes a').addClass('active');
        $('#observacoes').addClass('active').addClass('show').attr('aria-expanded','true');
    });
    */


    // observacoes  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
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


    // fornecedores  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
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
});
</script>