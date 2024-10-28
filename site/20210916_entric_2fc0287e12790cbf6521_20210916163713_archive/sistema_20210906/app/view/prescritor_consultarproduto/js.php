<script src="js/jquery/select2/js/select2.full.min.js"></script>
<script src="js/jquery/select2/js/pt-BR.js"></script>
<script src="assets/plugins/pdfobject/pdfobject.min.js"></script>
<script>

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

$(function(){
    $('input:radio[name=calculo_via]').change(function () {
        if ($("input[name='calculo_via']:checked").val() == 'Enteral') {
            $("#apresentacao_enteral").removeClass("none");
            $("#apresentacao_oral").addClass("none");
        }else if ($("input[name='calculo_via']:checked").val() == 'Oral') {
            $("#apresentacao_enteral").addClass("none");
            $("#apresentacao_oral").removeClass("none");
        }else{
            $("#apresentacao_enteral").addClass("none");
            $("#apresentacao_oral").addClass("none");
        }
    });

 	$(".btn-pdf").click(function() {
 		PDFObject.embed($(this).attr("rel"), "#modal-pdf-body");
 		$("#modal-pdf").modal({backdrop: "static",keyboard: false,show: true});
    });

    select2_ajax_produto($(".select2_ajax_produto"));
});
</script>