    <script src="js/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/common/common.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/quix.js"></script>
    <script src="assets/plugins/toastr/js/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){           
            <?php if (isset($retorno) == true) echo $retorno;?>
            <?php 
            if (isset($_SESSION['retorno_c'])){
                $_SESSION['retorno_c'] = $_SESSION['retorno_c'] - 1;
                if ($_SESSION['retorno_c']<=0){
                    if (isset($_SESSION['retorno']) == true){ echo $_SESSION['retorno']; }
                    unset($_SESSION['retorno']); unset($_SESSION['retorno_c']); 
                }
            }
            else{
                if (isset($_SESSION['retorno']) == true){ echo $_SESSION['retorno']; unset($_SESSION['retorno']); }
            }
            ?>
        });
    </script>
</body>
</html>