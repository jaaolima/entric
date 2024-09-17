    <script src="js/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/common/common.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/quix.js"></script>
    <script src="assets/plugins/toastr/js/toastr.min.js"></script>    
    <script src="js/jquery/jquery.maskedinput/jquery.maskedinput.min.js"></script>
    <script src="js/jquery/jquery.maskmoney/jquery.maskmoney.min.js"></script>
    <script src="js/app.js?rnd=2"></script>
    <script src="js/jquery/jquery-confirm/jquery-confirm.min.js" type="text/javascript"></script>
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
    <script type="text/javascript">
        function func_removeRow(_id){
            $(".row_telefone_"+_id).remove();
        }

        function fcRemoverFoto(num){
            if (num == 1){
                $("#anexar_foto").css("background-image", "none");
                $("#anexar_foto").css("background-size", "cover");
                $("#anexar_foto span").show();
                //$("#anexar_foto").html('<br>Carteira Profissional<br>(FRENTE)<br>Arquivo no formato JPEG ou PNG com no máximo 2MB. <input type="file" name="foto" rel="anexar_foto" id="foto" style="display: none;">' );
            }
            else{
                $("#anexar_foto"+num).css("background-image", "none");
                $("#anexar_foto"+num).css("background-size", "cover");
                $("#anexar_foto"+num+" span").show();
                //$("#anexar_foto"+num).html('<br>Carteira Profissional<br>(VERSO)<br>Arquivo no formato JPEG ou PNG com no máximo 2MB. <input type="file" name="foto2" rel="anexar_foto2" id="foto2" style="display: none;">');
            }    
            $("#foto").val("");
        }
        function readURL(input, rel) {
            if(input){
                var reader = new FileReader();
                reader.onload = function(){
                    $("#"+rel+" span").hide();
                    $("#"+rel).css("background-image", "url(" + reader.result + ")");
                    $("#"+rel).css("background-size", "100% 170px"); // cover
                }
                reader.readAsDataURL(input);
            }
        }

        $(document).ready(function(){
            $('#form_prescritor input[name=email]').on("keyup change", function(e) {
                $('#form_prescritor input[name=login]').val($(this).val());
            });

            $('#form_prescritor input:radio[name=profissional]').on("keyup change", function(e) {
                if ($(this).val() == "Médico"){
                    $(".input_crm").removeClass("none");
                    $(".input_crn").addClass("none");
                }
                else{
                    $(".input_crm").addClass("none");
                    $(".input_crn").removeClass("none");            
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
        });
    </script>
</body>
</html>