<script src="assets/plugins/pdfobject/pdfobject.min.js"></script>
<script>
$(function(){
 	$(".btn-pdf").click(function() {
 		PDFObject.embed($(this).attr("rel"), "#modal-pdf-body");
 		$("#modal-pdf").modal({backdrop: "static",keyboard: false,show: true});
    });
});
</script>