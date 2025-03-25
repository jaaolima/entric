<script type="text/javascript" src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/jquery/jquery-confirm/jquery-confirm.min.js" type="text/javascript"></script>
<script>
function func_removeRow(_id){
    $(".row_telefone_"+_id).remove();
    $(".edit_row_telefone_"+_id).remove();

}

function fcRemoverFoto(num){
    if (num == 1){
        $("#anexar_foto").css("background-image", "none");
        $("#anexar_foto").css("background-size", "cover");
        $("#anexar_foto span").show();
        $("#foto").val("");
        //$("#anexar_foto").html('<br>Carteira Profissional<br>(FRENTE)<br>Arquivo no formato JPEG ou PNG com no máximo 2MB. <input type="file" name="foto" rel="anexar_foto" id="foto" style="display: none;">' );
    }
    else{ 
        $("#anexar_foto"+num).css("background-image", "none");
        $("#anexar_foto"+num).css("background-size", "cover");
        $("#anexar_foto"+num+" span").show();
        $("#foto2").val("");
        //$("#anexar_foto"+num).html('<br>Carteira Profissional<br>(VERSO)<br>Arquivo no formato JPEG ou PNG com no máximo 2MB. <input type="file" name="foto2" rel="anexar_foto2" id="foto2" style="display: none;">');
    }    
}

function fcRemoverEditFoto(num){
    if (num == 1){
        $("#edit_anexar_foto").css("background-image", "none");
        $("#edit_anexar_foto").css("background-size", "cover");
        $("#edit_anexar_foto span").show();
        $("#edit_foto").val("");
        //$("#anexar_foto").html('<br>Carteira Profissional<br>(FRENTE)<br>Arquivo no formato JPEG ou PNG com no máximo 2MB. <input type="file" name="foto" rel="anexar_foto" id="foto" style="display: none;">' );
    }
    else{
        $("#edit_anexar_foto"+num).css("background-image", "none");
        $("#edit_anexar_foto"+num).css("background-size", "cover");
        $("#edit_anexar_foto"+num+" span").show();
        $("#edit_foto2").val("");
        //$("#anexar_foto"+num).html('<br>Carteira Profissional<br>(VERSO)<br>Arquivo no formato JPEG ou PNG com no máximo 2MB. <input type="file" name="foto2" rel="anexar_foto2" id="foto2" style="display: none;">');
    }    
}
function readURL(input, rel) {
    if(input){
        var reader = new FileReader();
        reader.onload = function(){
            //$("#"+rel).html("");
            $("#"+rel+" span").hide();
            $("#"+rel).css("background-image", "url(" + reader.result + ")");
            $("#"+rel).css("background-size", "100% 170px"); // cover
        }
        reader.readAsDataURL(input);
    }
}

function readURLimage(input, rel) {
    $("#"+rel+" span").hide();
    $("#"+rel).css("background-image", "url(" + input + ")");
    $("#"+rel).css("background-size", "100% 170px"); // cover
}

$(document).ready(function(e) {
    /*$('.cpf_cnpj').mask("999.999.999-99?9");
    $(".cpf_cnpj").on("focusout keydown", function(e) {
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');

        if(phone.length > 11) {
            element.mask("99.999.999/9999-99");
        } else {
            element.mask("999.999.999-99?9");
        }
    });*/
});

$(function(){

    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    var tb_patrocinador = $('.tb_patrocinador')
    .on( 'init.dt', function() {
        $("#DataTables_Table_0_length").after('<div class="dataTables_length2" style="float: left;"><label><select id="DataTables_Table_0_patrocinador" name="DataTables_Table_0_patrocinador" aria-controls="DataTables_Table_0"><option value="todos">Todos Status</option><option value="0">Ativo</option><option value="1">Inativo</option><option value="2">Removido</option></select> </label></div>');
        
        $('#DataTables_Table_0_patrocinador').on('change', function(){
            tb_patrocinador.ajax.url( "ajax/dtb_patrocinador?status="+$("#DataTables_Table_0_patrocinador option:selected").val() ).load();
        });
    }).DataTable({
        select: true,
        "pageLength": 25,
        "processing": true,
        "serverSide": true,
        "stripeClasses": [ 'odd-row', 'even-row' ],
        "responsive": true,
        "columnDefs": [{
            "targets": 0,
            "orderable": false
        },{
            "targets": 1,
            "orderable": false
        },{
            "targets": 2,
            "orderable": false
        },{
            "targets": 3,
            "width": 0, 
            "orderable": false
        },{
            "targets": 4,
            "defaultContent": '<i class="fa fa-edit"></i> &nbsp; <i class="fa fa-trash"></i>',
            "className": 'row-remove dt-center',
            "orderable": false
        }],


        "ajax": "ajax/dtb_patrocinador",
        "language": { "url": "assets/plugins/datatables/js/Portuguese-Brasil.json"}
    });

    $('.tb_patrocinador').on( 'click', 'tbody td.row-remove .fa-trash', function (e) {
        var _this = $(this);
        var tb_this = this;
        $.confirm({
            title: 'Atenção',
            content: 'Você tem certeza que deseja remover este cadastro?',
            theme: 'modern',
            //theme: 'material',
            //theme: 'bootstrap',
            //theme: 'supervan',
            animation: 'scale',
            buttons: {
                confirmar: {
                    text: 'Confirmar',
                    action: function(){
                        var id = _this.parent('td').prev().html();
                        console.log(id);
                        console.log(_this.closest('tr'));
                        console.log("----------------------");
                        _this.parent("td").parent("tr").remove();

                        /*$("#modal_fabricantes").find(".entric_table_loading").show();
                        $.alert('Fabricante removido com sucesso.');
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
                        */
                    }
                },
                cancelar: {
                    text: 'Cancelar',
                    action: function(){
                    }
                }
            }
        }); 
    } );

    $('.tb_patrocinador').on( 'click', 'tbody td.row-remove .fa-edit', function (e) {
        var _this = $(this);
        var _id = _this.parent('td').prev().html();

        $("#lista_patrocinador").addClass("none");
        $("#edit_patrocinador").removeClass("none");

        $.ajax({
            type: "POST",
            url: "ajax/cad_patroc_abrir",
            data: "id="+_id,
            cache: false,
            dataType: 'json',
            success: function( data ){
                $("#_patroc_id").val(_id);
                $("#edit_patrocinador input:radio[name=patrocinador_acesso][value='"+data.status+"']").prop("checked",true);
                $("#edit_patrocinador input[name='nome']").val(data.nome);
                $("#edit_patrocinador input[name='cpf']").val(data.cpf);
                $("#edit_patrocinador input[name='celular']").val(data.celular);
                $("#edit_patrocinador input[name='login']").val(data.email);
                $("#edit_patrocinador input[name='acesso']").val(data.status);
            }
        });
    });

    $('#btn_patrocinador_novo').on("click", function(e) {
        $("#lista_patrocinador").addClass("none");
        $("#cad_patrocinador").removeClass("none");
    });

    $('.btn_voltar_patrocinador').on("click", function(e) {
        $("#lista_patrocinador").removeClass("none");
        $("#cad_patrocinador").removeClass("none").addClass("none");
        $("#edit_patrocinador").removeClass("none").addClass("none");
    });


    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    var tb_administrador = $('.tb_administrador')
    .on( 'init.dt', function() {
        $("#DataTables_Table_1_length").after('<div class="dataTables_length2" style="float: left;"><label><select id="DataTables_Table_1_administrador" name="DataTables_Table_1_administrador" aria-controls="DataTables_Table_1"><option value="todos">Todos Status</option><option value="0">Ativo</option><option value="1">Inativo</option><option value="2">Removido</option></select> </label></div>');
        
        $('#DataTables_Table_1_administrador').on('change', function(){
            tb_administrador.ajax.url( "ajax/dtb_administrador?status="+$("#DataTables_Table_1_administrador option:selected").val() ).load();
        });
    }).DataTable({
        select: true,
        "pageLength": 25,
        "processing": true,
        "serverSide": true,
        "stripeClasses": [ 'odd-row', 'even-row' ],
        "responsive": true,
        "columnDefs": [{
            "targets": 0,
            "orderable": false
        },{
            "targets": 1,
            "orderable": false
        },{
            "targets": 2,
            "orderable": false
        },{
            "targets": 3,
            "width": 0, 
            "orderable": false
        },{
            "targets": 4,
            "defaultContent": '<i class="fa fa-edit"></i> &nbsp; <i class="fa fa-trash"></i>',
            "className": 'row-remove dt-center',
            "orderable": false
        }],
        "ajax": "ajax/dtb_administrador",
        "language": { "url": "assets/plugins/datatables/js/Portuguese-Brasil.json"}
    });

    $('.tb_administrador').on( 'click', 'tbody td.row-remove .fa-trash', function (e) {
        var _this = $(this);
        var tb_this = this;
        $.confirm({
            title: 'Atenção',
            content: 'Você tem certeza que deseja remover este cadastro?',
            theme: 'modern',
            //theme: 'material',
            //theme: 'bootstrap',
            //theme: 'supervan',
            animation: 'scale',
            buttons: {
                confirmar: {
                    text: 'Confirmar',
                    action: function(){
                        var id = _this.parent('td').prev().html();
                        console.log(id);
                        console.log(_this.closest('tr'));
                        console.log("----------------------");

                        _this.parent("td").parent("tr").remove();
                    }
                },
                cancelar: {
                    text: 'Cancelar',
                    action: function(){
                    }
                }
            }
        }); 
    });

    $('.tb_administrador').on( 'click', 'tbody td.row-remove .fa-edit', function (e) {
        var _this = $(this);
        var _id = _this.parent('td').prev().html();

        $("#lista_administrador").addClass("none");
        $("#edit_administrador").removeClass("none");

        $.ajax({
            type: "POST",
            url: "ajax/cad_admin_abrir",
            data: "id="+_id,
            cache: false,
            dataType: 'json',
            success: function( data ){
                $("#_admin_id").val(_id);
                $("#edit_administrador input:radio[name=admin_acesso][value='"+data.status+"']").prop("checked",true);
                $("#edit_administrador input[name='nome']").val(data.nome);
                $("#edit_administrador input[name='cpf']").val(data.cpf);
                $("#edit_administrador input[name='celular']").val(data.celular);
                $("#edit_administrador input[name='login']").val(data.email);
                $("#edit_administrador input[name='acesso']").val(data.status);
            }
        });
    });


    $('#btn_admin_novo').on("click", function(e) {
        $("#lista_administrador").addClass("none");
        $("#cad_administrador").removeClass("none");
    });

    $('.btn_voltar_admin').on("click", function(e) {
        $("#lista_administrador").removeClass("none");
        $("#cad_administrador").removeClass("none").addClass("none");
        $("#edit_administrador").removeClass("none").addClass("none");
    });

    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    var tb_prescritor = $('.tb_prescritor')
    .on( 'init.dt', function() {
        $("#DataTables_Table_2_length").after('<div class="dataTables_length2" style="float: left;"><label><select id="DataTables_Table_2_prescritor" name="DataTables_Table_2_prescritor" aria-controls="DataTables_Table_2"><option value="todos">Todos Status</option><option value="0">Liberado</option><option value="1">Aguardando Liberação</option><option value="2">Inativo</option><option value="3">Bloqueado</option></select> </label></div>');
        
        $('#DataTables_Table_2_prescritor').on('change', function(){
            tb_prescritor.ajax.url( "ajax/dtb_prescritor?status="+$("#DataTables_Table_2_prescritor option:selected").val() ).load();
        });
    }).DataTable({
        select: true,
        "pageLength": 25,
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "stripeClasses": [ 'odd-row', 'even-row' ],
        "rowId": "nome",
        "columnDefs": [{
            "targets": 0,
            "orderable": false
        },{
            "targets": 1,
            "orderable": false
        },{
            "targets": 2,
            "orderable": false
        },{
            "targets": 3,
            "orderable": false
        },{
            "targets": 4,
            "orderable": false
        },{
            "targets": 5,
            "orderable": false
        },{
            "targets": 6,
            "width": 0, 
            "orderable": false
        },{
            "targets": 7,
            "defaultContent": '<i class="fa fa-edit"></i> &nbsp; <i class="fa fa-trash"></i>',
            "className": 'row-remove dt-center',
            "orderable": false
        }],
        "ajax": "ajax/dtb_prescritor",
        "language": { "url": "assets/plugins/datatables/js/Portuguese-Brasil.json"}
    });

    $('.tb_prescritor').on( 'click', 'tbody td.row-remove .fa-trash', function (e) {
        var _this = $(this);
        var tb_this = this;
        $.confirm({
            title: 'Atenção',
            content: 'Você tem certeza que deseja remover este cadastro?',
            theme: 'modern',
            animation: 'scale',
            buttons: {
                confirmar: {
                    text: 'Confirmar',
                    action: function(){
                        var id = _this.parent('td').prev().html();

                        $.ajax({
                            type: "POST",
                            url: "ajax/excluir_cadastro_prescritor",
                            data: "id="+id,
                            cache: false,
                            dataType: 'json',
                            success: function( data ){
                                toastr['success'](data.message, '', {positionClass: 'toast-top-right' });
                                console.log(id);
                                console.log(_this.closest('tr'));
                                console.log("----------------------");

                                _this.parent("td").parent("tr").remove();
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
    });

    $('.tb_prescritor').on( 'click', 'tbody td.row-remove .fa-edit', function (e) {
        var _this = $(this);
        var _id = _this.parent('td').prev().html();

        $("#lista_unidade").addClass("none");
        $("#edit_prescritor").removeClass("none");

        $.ajax({
            type: "POST",
            url: "ajax/cad_prescritor_abrir",
            data: "id="+_id,
            cache: false,
            dataType: 'json',
            success: function( data ){
                $("#_presc_id").val(_id);

                $("#edit_prescritor .edit_row_telefone").remove();

                $('#edit_prescritor').find('input:radio[name="acesso"][value="'+data.status+'"]').prop('checked', true);
                //$("#edit_prescritor input[name=acesso][value=" + data.status + "]").prop('checked', true);

                $("#edit_prescritor input[name='nome']").val(data.nome);
                $("#edit_prescritor input[name='cpf_cnpj']").val(data.cpf_cnpj);
                $("#edit_prescritor select[name='uf']").val(data.uf).change();
                $("#edit_prescritor input[name='cidade']").val(data.cidade);
                $("#edit_prescritor input[name='login']").val(data.email);
                $("#edit_prescritor input[name='email']").val(data.email);
                $("#edit_prescritor textarea[name='feedback']").val(data.feedback);
                $("#edit_prescritor input:radio[name=disp_email][value='"+data.email_disp+"']").prop("checked",true);
                $("#edit_prescritor input:radio[name=profissional][value='"+data.profissional+"']").prop("checked",true);
                if (data.profissional == 'Médico'){
                    $("#edit_prescritor .input_crm").removeClass("none");
                    $("#edit_prescritor .input_crn").addClass("none");
                    $("#regiao_crm option[value='"+data.regiao_crm+"']").attr("selected","selected");
                    //$("#edit_prescritor input:radio[name=regiao_crm][value='"+data.regiao_crm+"']").prop("checked",true);                    
                    $("#edit_prescritor input[name='numero_crm']").val(data.numero_crm);
                }
                else{
                    $("#edit_prescritor .input_crm").addClass("none");
                    $("#edit_prescritor .input_crn").removeClass("none"); 
                    $("#regiao_crn option[value='"+data.regiao_crn+"']").attr("selected","selected");
                    //$("#edit_prescritor input:radio[name=regiao_crn][value='"+data.regiao_crn+"']").prop("checked",true);   
                    $("#edit_prescritor input[name='numero_crn']").val(data.numero_crn);
                }

                readURLimage("arquivos"+data.carteira_frente, "edit_anexar_foto");
                readURLimage("arquivos"+data.carteira_verso, "edit_anexar_foto2");

                let tele_disp = eval(data.telefone_disp);
                $.each(eval(data.telefone), function(i, item) {
                    if (i == 0){
                        $("#edit_prescritor input[name='telefone[]']").val(item);
                        $("#edit_prescritor input:radio[name='disp_telefone[]'][value='"+tele_disp[i]+"']").prop("checked",true);
                    }
                    else{
                        var row_telefone = $("#edit_row_telefone");
                        var p = $.now();
                        divClone = row_telefone.clone(true);
                        divClone.attr('id', 'edit_row_telefone[' + p +']').end();
                        divClone.addClass('edit_row_telefone edit_row_telefone_' + p);
                        divClone.find('input:radio').attr('name', 'disp_telefone[' + p +']').end();
                        divClone.find('.disp_telefone_nao').attr('id', 'disp_telefone_nao[' + p +']').end();
                        divClone.find('.disp_telefone_nao_label').attr('for', 'disp_telefone_nao[' + p +']').end();
                        divClone.find('.disp_telefone_sim').attr('id', 'disp_telefone_sim[' + p +']').end();
                        divClone.find('.disp_telefone_sim_label').attr('for', 'disp_telefone_sim[' + p +']').end();
                        divClone.find('.telefone').attr('id', 'telefone[' + p +']').end();
                        divClone.find('.telefone').attr('name', 'telefone[' + p +']').end();
                        divClone.find('.telefone').val('').end();
                        divClone.find('.telefone_label').attr('for', 'telefone[' + p +']').end();
                        divClone.find('.adicionar_telefone').html('<label>&nbsp;</label> <br><button class="btn btn-danger btn_telefone_rm" onclick="func_removeRow('+p+');" type="button"><span class="tbtn-icon-right"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></button>');
                        $(divClone).insertAfter("#edit_row_telefone");

                        $("#edit_prescritor input[name='telefone["+ p +"]']").val(item);                        
                        $("#edit_prescritor input:radio[name='disp_telefone["+ p +"]'][value='"+tele_disp[i]+"']").prop("checked",true);
                    }
                });

                $('.telefone').mask("(99) 99999-9999");
                $(".telefone").focusout(function(){
                    var phone, element;
                    element = $(this);
                    element.unmask();
                    phone = element.val().replace(/\D/g, '');
                    if(phone.length > 10) {
                        element.mask("(99) 99999-999?9");
                    } else {
                        element.mask("(99) 9999-9999?9");
                    }
                }).on('focusout', function(e) {
                });
            }
        });
    });

    $('#btn_unidade_novo').on("click", function(e) {
        $("#lista_unidade").addClass("none");
        $("#cad_prescritor").removeClass("none");
    });

    $('.btn_voltar_prescritor').on("click", function(e) {
        $("#lista_unidade").removeClass("none");
        $("#cad_prescritor").removeClass("none").addClass("none");
        $("#edit_prescritor").removeClass("none").addClass("none");
    });

    $('#cad_prescritor input[name=email]').on("keyup change focusout", function(e) {
        $('#cad_prescritor input[name=login]').val($(this).val());
    });
    
    $('#cad_prescritor input:radio[name=profissional]').on("keyup change", function(e) {
        if ($(this).val() == "Médico"){
            $("#cad_prescritor .input_crm").removeClass("none");
            $("#cad_prescritor .input_crn").addClass("none");
        }
        else{
            $("#cad_prescritor .input_crm").addClass("none");
            $("#cad_prescritor .input_crn").removeClass("none");            
        }
    });

    $('#edit_prescritor input[name=email]').on("keyup change focusout", function(e) {
        $('#cad_prescritor input[name=login]').val($(this).val());
    });
    
    $('#edit_prescritor input:radio[name=profissional]').on("keyup change", function(e) {
        if ($(this).val() == "Médico"){
            $("#edit_prescritor .input_crm").removeClass("none");
            $("#edit_prescritor .input_crn").addClass("none");
        }
        else{
            $("#edit_prescritor .input_crm").addClass("none");
            $("#edit_prescritor .input_crn").removeClass("none");            
        }
    });

    $(document).on('change', ':file', function() {
        var input = $(this);
        var numFiles = input.get(0).files ? input.get(0).files.length : 1;
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        readURL(input.get(0).files[0], input.attr("rel"));
    });  
    
    $('#adicionar_telefone').on("click", function(e) {
        var row_telefone = $("#row_telefone");        
        var p = $.now();
        divClone = row_telefone.clone(true);
        divClone.attr('id', 'row_telefone[' + p +']').end();
        divClone.addClass('row_telefone_' + p);
        divClone.find('input:radio').attr('name', 'disp_telefone[' + p +']').end();
        divClone.find('.disp_telefone_nao').attr('id', 'disp_telefone_nao[' + p +']').end();
        divClone.find('.disp_telefone_nao_label').attr('for', 'disp_telefone_nao[' + p +']').end();
        divClone.find('.disp_telefone_sim').attr('id', 'disp_telefone_sim[' + p +']').end();
        divClone.find('.disp_telefone_sim_label').attr('for', 'disp_telefone_sim[' + p +']').end();
        divClone.find('.telefone').attr('id', 'telefone[' + p +']').end();
        divClone.find('.telefone').attr('name', 'telefone[' + p +']').end();
        divClone.find('.telefone').val('').end();
        divClone.find('.telefone_label').attr('for', 'telefone[' + p +']').end();
        divClone.find('.adicionar_telefone').html('<label>&nbsp;</label> <br><button class="btn btn-danger btn_telefone_rm" onclick="func_removeRow('+p+');" type="button"><span class="tbtn-icon-right"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></button>');
        $(divClone).insertAfter("#row_telefone");

        $('.telefone').mask("(99) 9999-9999");
        $(".telefone").focusout(function(){
            var phone, element;
            element = $(this);
            element.unmask();
            phone = element.val().replace(/\D/g, '');
            if(phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        }).on('focusout', function(e) {
        });
    }); 
    
    $('#edit_adicionar_telefone').on("click", function(e) {
        var row_telefone = $("#edit_row_telefone");        
        var p = $.now();
        divClone = row_telefone.clone(true);
        divClone.attr('id', 'edit_row_telefone[' + p +']').end();
        divClone.addClass('edit_row_telefone edit_row_telefone_' + p);
        divClone.find('input:radio').attr('name', 'disp_telefone[' + p +']').end();
        divClone.find('.disp_telefone_nao').attr('id', 'disp_telefone_nao[' + p +']').end();
        divClone.find('.disp_telefone_nao_label').attr('for', 'disp_telefone_nao[' + p +']').end();
        divClone.find('.disp_telefone_sim').attr('id', 'disp_telefone_sim[' + p +']').end();
        divClone.find('.disp_telefone_sim_label').attr('for', 'disp_telefone_sim[' + p +']').end();
        divClone.find('.telefone').attr('id', 'telefone[' + p +']').end();
        divClone.find('.telefone').attr('name', 'telefone[' + p +']').end();
        divClone.find('.telefone').val('').end();
        divClone.find('.telefone_label').attr('for', 'telefone[' + p +']').end();
        divClone.find('.adicionar_telefone').html('<label>&nbsp;</label> <br><button class="btn btn-danger btn_telefone_rm" onclick="func_removeRow('+p+');" type="button"><span class="tbtn-icon-right"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></button>');
        $(divClone).insertAfter("#edit_row_telefone");

        $('.telefone').mask("(99) 9999-9999");
        $(".telefone").focusout(function(){
            var phone, element;
            element = $(this);
            element.unmask();
            phone = element.val().replace(/\D/g, '');
            if(phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        }).on('focusout', function(e) {
        });
    });
});
</script>