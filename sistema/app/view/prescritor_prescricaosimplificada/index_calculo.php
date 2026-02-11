
<div class="tab-pane fade" id="calculo" role="tabpanel">
    <form id="prescritor_calculo" action="prescritor_relatorioalta" method="post" autocomplete="off" onsubmit="return false">
        <input type="hidden" name="action" value="calculo"> 
        <input type="hidden" name="selecao_dieta" id="selecao_dieta" value="">

        <div class="form_blue pb-0">
            <?php include("index_calculo_categoria.php");?>


            <?php include("index_calculo_dispositivos.php");?>


            <?php include("index_calculo_dietaenteral.php");?>


            <?php include("index_calculo_apresentacao.php");?>

        </div>


        <?php include("index_calculo_prescricao_nutricional.php");?>

        <div class="form-group row pt-5">
            <div class="col-sm-6 text-left">
                <button type="button" class="btn btn-secondary btn-sm" id="calculo_salvar">
                    <span class="btn-icon-right"><i class="fa fa-save"></i></span>
                    SALVAR
                </button>
            </div>
            <div class="col-sm-6 text-right">

                <button type="button" class="btn btn-secondary btn-form" id="calculo_voltar">VOLTAR</button>
                &nbsp;
                <button type="button" class="btn btn-warning btn-form" id="calculo_avancar">AVANÇAR</button>
            </div>
        </div>


    </form> 

    <?php include("index_calculo_fracionamento_modal.php");?>

    <?php include("index_calculo_selecao_modal.php");?>



</div>
