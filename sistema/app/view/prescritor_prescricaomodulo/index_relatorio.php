<div class="tab-pane fade" id="relatorio" role="tabpanel">

    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <form action="prescritor_relatorioalta" class="tab_relatorio_checkbox" method="post" autocomplete="off" onsubmit="return false">   
                <input type="hidden" name="action" value="relatorio"/>
                <div class="row entric_group_radio border-0 mt-4 mb-2">


                    <div class="form-group col-sm-2 mb-3">
                        <div class="form-check entric_radio pl-0 text-center">
                            <input id="rel_logo" name="rel_logo" value="Logo do Entric no Relatório" class="form-check-input styled-checkbox" type="checkbox" checked="checked">
                            <label for="rel_logo" class="form-check-label check-green"></label>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 text-center mb-3">
                        <div class="form-radio entric_radio">
                            <label for="rel_logo" class="form-check-label check-green">LOGO DO ENTRIC NO RELATÓRIO</label>
                        </div>
                    </div>
                    <div class="form-group col-sm-1 mb-3"></div> 
                </div> 

                <div class="row entric_group_radio border-0 mt-4 mb-2">


                    <div class="form-group col-sm-2 mb-3">
                        <div class="form-check entric_radio pl-0 text-center">
                            <input id="rel_identificacao" name="rel_identificacao" value="Identificação do Paciente" class="form-check-input styled-checkbox" type="checkbox" checked="checked">
                            <label for="rel_identificacao" class="form-check-label check-green"></label>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 text-center mb-3">
                        <div class="form-radio entric_radio">
                            <label for="rel_identificacao" class="form-check-label check-green">DADOS GERAIS</label>
                        </div>
                    </div>
                    <div class="form-group col-sm-1 mb-3"></div>
                </div>

                <!-- <div class="row entric_group_radio border-0 mt-4 mb-2">



                    <div class="form-group col-sm-2 mb-3">
                        <div class="form-check entric_radio pl-0 text-center">
                            <input id="rel_calculo" name="rel_calculo" value="Cálculo de Terapia Nutricional" class="form-check-input styled-checkbox" type="checkbox" checked="checked">
                            <label for="rel_calculo" class="form-check-label check-green"></label>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 text-center mb-3">
                        <div class="form-radio entric_radio">
                            <label for="rel_calculo" class="form-check-label check-green">PRESCRIÇÃO TNEVO</label>
                        </div>
                    </div>
                    <div class="form-group col-sm-1 mb-3"></div>
                </div> -->

                <div class="row entric_group_radio border-0 mt-4 mb-2">



                    <div class="form-group col-sm-2 mb-3">
                        <div class="form-check entric_radio pl-0 text-center">
                            <input id="rel_prescricao" name="rel_prescricao" value="Distribuidores" class="form-check-input styled-checkbox" type="checkbox" checked="checked">
                            <label class="form-check-label check-green"></label>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 text-center mb-3">
                        <div class="form-radio entric_radio">
                            <label class="form-check-label check-green">PRESCRIÇÃO MÓDULOS</label>
                        </div>
                    </div>
                    <div class="form-group col-sm-1 mb-3"></div>
                </div>

                <div class="row entric_group_radio border-0 mt-4 mb-2">



                    <div class="form-group col-sm-2 mb-3">
                        <div class="form-check entric_radio pl-0 text-center">
                            <input id="rel_distribuidores" name="rel_distribuidores" value="Distribuidores" class="form-check-input styled-checkbox" type="checkbox" checked="checked">
                            <label for="rel_distribuidores" class="form-check-label check-green"></label>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 text-center mb-3">
                        <div class="form-radio entric_radio">
                            <label for="rel_distribuidores" class="form-check-label check-green">PONTOS DE VENDA</label>
                        </div>
                    </div>
                    <div class="form-group col-sm-1 mb-3"></div>
                </div>



                <div class="row">
                    <div class="form-group col-sm-4">
                        <button type="button" class="btn btn-secondary btn-block" id="rel_visualizar_relatorio">
                            <span class="btn-icon-right"><i class="fa fa-file-text-o"></i></span>
                            VISUALIZAR RELATÓRIO
                        </button>
                    </div>
                    <div class="form-group col-sm-5">
                        <button type="button" class="btn btn-secondary btn-block" id="rel_gerar_relatorio">
                            <span class="btn-icon-right"><i class="fa fa-file-text"></i></span>
                            GERAR PRESCRIÇÃO SIMPLIFICADA
                        </button>
                        <button type="button" class="btn btn-secondary btn-block mt-0 hide" id="rel_imprimir_relatorio">
                            <span class="btn-icon-right"><i class="fa fa-file-text"></i></span>
                            IMPRIMIR PRESCRIÇÃO SIMPLIFICADA
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>