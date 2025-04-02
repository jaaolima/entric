<script src="js/bootstrap/bootstrap-input-spinner/bootstrap-input-spinner.js"></script>
<script src="js/bootstrap/bootstrap-input-spinner/custom-editors.js"></script>
<script src="js/bootstrap/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="js/jquery/select2/js/select2.full.min.js"></script>
<script src="js/jquery/select2/js/pt-BR.js"></script>
<script src="js/jquery/bootstrap-slider/bootstrap-slider.min.js"></script>
<script src="js/jquery/jquery-confirm/jquery-confirm.min.js" type="text/javascript"></script>
<script src="js/jquery/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script>
    document.getElementById("cadastrar").addEventListener("click", function(e) {
        const aceito = document.getElementById("aceito").value;
        if (!aceito) {
            e.preventDefault(); // Impede o comportamento padrão (ex.: envio de formulário)
            alert("É necessário concordar com os termos de uso e as políticas de privacidade.");
        }
    });
</script>