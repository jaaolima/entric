<script>
function abrirEndereco(_id){
    $.ajax({
        type: "POST",
        url: "v/gt_endereco_distribuidor",
        data: "&id="+_id,
        cache: false,
        dataType: 'html',
        success: function( data ){
            $("#info_endereco .modal-body").html(data);
            $('#info_endereco').modal('show');
        }
    });
}
$(function(){
    $('.state').on("click", function(e) {
        $(".state").removeClass("state_selected");
        $(this).addClass("state_selected");
        $.ajax({
            type: "POST",
            url: "v/distribuidores",
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

                    rows = rows + '<tr class="tabrow" rel="'+item.id+'">'+ 
                                    '<td>'+item.distribuidor+'</td>'+
                                    '<td>'+item.fabricante+'</td>'+
                                    '<td class="text-center"><a href="javascript:void(0);" onclick="abrirEndereco('+item.id+');" class="mr-4 tb-action"><i class="fa fa-home" aria-hidden="true"></i></a></td>'+
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
});
</script>