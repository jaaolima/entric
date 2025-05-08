<script src="js/jquery/jquery-confirm/jquery-confirm.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video.min.js"></script>
<script>
function fc_Remover(video, id){
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
                        url: "ajax/remover_video",
                        data: "&id="+id,
                        cache: false,
                        dataType: 'json',
                        success: function( data ){
                            $('#video'+video+' li[rel="'+id+'"]').remove();
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
    /*
    if($('#flupdocs').length){
        $('#flupdocs').fileupload({
            url: "ajax/uploads/videos",
            autoUpload      : true,
            maxFileSize     : 10000000, // 5mb
            acceptFileTypes : /(\.|\/)(jpe?g|png|gif|pdf)$/i,
            maxNumberOfFiles: 5,
            sequentialUploads: false
        });
        $('#flupdocs').fileupload('option', 'redirect', window.location.href.replace(/\/[^\/]*$/,'/cors/result.html?%s'));
        $('#flupdocs').addClass('fileupload-processing');
        $.ajax({ url: $('#flupdocs').fileupload('option', 'url'), dataType: 'json', context: $('#flupdocs')[0] }).always(function () { $(this).removeClass('fileupload-processing'); }).done(function (result) { $(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});});
    }
    */

    $("[name='alterar_suplemento']").on("click", function () {
    	var nome = $(this).data('nome');
        $.ajax({
            type: "POST",
            url: "prescritor_prescricaosuplemento/alterarRelatorio",
            data: "&nome="+nome,
            cache: false,
            dataType: 'json',
            success: function( data ){
                console.log("chegou");
                window.location.href ='prescritor_prescricaosuplemento';
            }
        });
    });


    $(".modal_video").on("click", function () {
    	var _this = $(this);
        $.ajax({
            type: "POST",
            url: "ajax/video",
            data: "&video="+_this.attr("rel"),
            cache: false,
            dataType: 'json',
            success: function( data ){}
        });
		$("#modal-youtube").modal('show');
		$('#modal-youtube').on('shown.bs.modal', function () {
			if ($('#modal-youtube').find('.modal-body').html() == ""){
				$('#modal-youtube').find('.modal-body').html('<video'+
                                                ' id="modalmp4"'+
                                                ' class="video-js"'+
                                                ' controls="true"'+
                                                ' preload="auto"'+
                                                ' autoplay="false"'+
                                                ' paused="false"'+
                                                ' width="760"'+
                                                ' height="400"'+
                                                ' data-setup="{}"'+
                                                ' >'+
                                                ' <source src="'+_this.attr("rel")+'" type="video/mp4" />'+
                                                '</video>');
			}
			if ($("video:nth-child(1)").attr("src") != _this.attr("rel")){
				$("video:nth-child(1)").attr("src", _this.attr("rel"));
			}
			var options = {};			
			var player = videojs('modalmp4', options, function onPlayerReady() {
				this.play();
			});
		});
		$('#modal-youtube').on('hidden.bs.modal', function () {
			var options = {};
			var player = videojs('modalmp4', options, function onPlayerReady() {
				this.pause();
			});
		});
    });
});
</script>