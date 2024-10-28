<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video.min.js"></script>
<script>
$(function(){
    $(".modal_video").on("click", function () {
    	var _this = $(this);
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