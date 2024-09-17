<script src="js/jquery/jquery-confirm/jquery-confirm.min.js" type="text/javascript"></script>
<script>

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

function fc_Remover(id){
    $.confirm({
        title: '<strong>Atenção</strong>',
        content: 'Tem certeza que deseja remover este cadastro?',
        buttons: {
            Sim: {
                text: 'Sim',
                btnClass: 'btn btn-secondary btn-form',
                action: function(){
                    $.ajax({
                        type: "POST",
                        url: "ajax/remover_distribuidor",
                        data: "&id="+id,
                        cache: false,
                        dataType: 'json',
                        success: function( data ){
                            $('#distribuidores tr[rel="'+id+'"]').remove();
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

$(function(){
    $('.state').on("click", function(e) {
        $(".state").removeClass("state_selected");
        $(this).addClass("state_selected");
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

                    var _cupom = '';
                    if ((item.cupom != "") && (item.cupom != null)){
                        _cupom = item.cupom;
                    }

                    var _principal = '<i class="fa fa-check-circle-o icon-verde" aria-hidden="true"></i> ';
                    if (item.principal_regiao != "1"){
                        _principal = "";
                    }

                    rows = rows + '<tr class="tabrow" rel="'+item.id+'">'+ 
                                    '<td>'+item.distribuidor+'</td>'+
                                    '<td>'+item.fabricante+'</td>'+
                                    '<td class="text-center"><a href="javascript:void(0);" onclick="abrirEndereco('+item.id+');" class="mr-4 tb-action"><i class="fa fa-home" aria-hidden="true"></i></a></td>'+
                                    '<td class="text-center">'+_principal+'</td>'+
                                    '<td class="text-center">'+_distribuidor+'</td>'+
                                    '<td class="text-center">'+_cupom+'</td>'+
                                    '<td class="text-center"><a href="distribuidores/editar/'+item.id+'" class="mr-4 tb-action"><i class="fa fa-edit" aria-hidden="true"></i></a>  <a href="javascript:void(0);" onclick="fc_Remover('+item.id+');" class="mr-4 tb-action"><i class="fa fa-trash" aria-hidden="true"></i></a></td>'+
                                '</tr>';  
                    
                });
                if (rows == ""){
                    rows = '<tr><td colspan="7" class="text-center">Nenhum dado encontrado</td></tr>';
                }
                $("#distribuidores tbody").html(rows);
            }
        });

    });
});
</script>