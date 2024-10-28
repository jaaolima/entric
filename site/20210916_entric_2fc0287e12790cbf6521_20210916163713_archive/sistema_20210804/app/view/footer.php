    <script src="js/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/common/common.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/quix.js"></script>
    <script src="assets/plugins/circle-progress/circle-progress.min.js"></script>
    <script src="assets/plugins/toastr/js/toastr.min.js"></script>
    
    <script src="js/jquery/jquery.maskedinput/jquery.maskedinput.min.js"></script>
    <script src="js/jquery/jquery.maskmoney/jquery.maskmoney.min.js"></script>
    <script src="js/app.js"></script>

	<?php if (isset($js_extras)) if ($js_extras<>"") include ($js_extras); ?>
	<script type="text/javascript">
		$(document).ready(function(){			
			<?php if (isset($retorno) == true) echo $retorno;?>
			<?php if (isset($_SESSION['retorno']) == true){ echo $_SESSION['retorno']; unset($_SESSION['retorno']); } ?>
		});
	</script>
</body>
</html>