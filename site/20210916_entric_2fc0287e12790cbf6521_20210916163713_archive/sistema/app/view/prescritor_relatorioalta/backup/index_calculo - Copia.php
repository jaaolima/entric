<div class="tab-pane fade" id="calculo" role="tabpanel">

    <div class="row entric_grid m-0 p-0">
        <div class="form-group col-sm-12">
            <div class="form-check">
                <label class="grid_label">Categoria</label>
            </div>
            <div class="row p-4">
                <div class="col-sm-6">
                    <div class="form-radio">
                        <input id="radioAdulto" class="radio-outlined"  name="categoria" type="radio" value="Adulto">
                        <label for="radioAdulto" class="radio-green">Adulto</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-radio">
                        <input id="radioPediatrico" class="radio-outlined"  name="categoria" type="radio" value="Pediátrico">
                        <label for="radioPediatrico" class="radio-green">Pediátrico</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <div class="form-check">
                <label class="grid_label">Tipo de produto</label>
            </div>
            <div class="row p-4">
                <div class="col-sm-6">
                    <div class="form-radio">
                        <input id="radioEnteral" class="radio-outlined"  name="tipo_produto" type="radio" value="Enteral">
                        <label for="radioEnteral" class="radio-green">Enteral</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-radio">
                        <input id="radioOral" class="radio-outlined"  name="tipo_produto" type="radio" value="Oral">
                        <label for="radioOral" class="radio-green">Oral</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <div class="form-check">
                <label class="grid_label">Tipo de prescrição</label>
            </div>
            <div class="row p-4">
                <div class="col-sm-6">
                    <div class="form-radio">
                        <input id="radioAutomatica" class="radio-outlined" name="tipo_produto" type="radio" value="Prescrição Automática">
                        <label for="radioAutomatica" class="radio-green">Prescrição Automática</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-radio">
                        <input id="radioManual" class="radio-outlined"  name="tipo_produto" type="radio" value="Prescrição Manual">
                        <label for="radioManual" class="radio-green">Prescrição Manual</label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row entric_group_radio mb-2">
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio pl-0">
                <label class="form-check-label check-green">Dispositivo:</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <input id="calculo_disp_sne" class="form-check-input styled-checkbox" type="radio">
                <label for="calculo_disp_sne" class="form-check-label check-green">SNE</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <input id="calculo_disp_sng" class="form-check-input styled-checkbox" type="checkbox">
                <label for="calculo_disp_sng" class="form-check-label check-green">SNG</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <input id="calculo_disp_gtt" class="form-check-input styled-checkbox" type="checkbox">
                <label for="calculo_disp_gtt" class="form-check-label check-green">GTT</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <input id="calculo_disp_gjt" class="form-check-input styled-checkbox" type="checkbox">
                <label for="calculo_disp_gjt" class="form-check-label check-green">GJT</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <input id="calculo_disp_jjt" class="form-check-input styled-checkbox" type="checkbox">
                <label for="calculo_disp_jjt" class="form-check-label check-green">JJT</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <input id="calculo_disp_sog" class="form-check-input styled-checkbox" type="checkbox">
                <label for="calculo_disp_sog" class="form-check-label check-green">SOG</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <input id="calculo_disp_soe" class="form-check-input styled-checkbox" type="checkbox">
                <label for="calculo_disp_soe" class="form-check-label check-green">SOE</label>
            </div>
        </div>
    </div>


    <div class="row entric_grid mt-4 m-0 p-0">
        <div class="form-group col-sm-4">
            <div class="form-check">
                <label class="grid_label">Apresentação</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_fechado" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_fechado" class="form-check-label check-green">Fechado</label>
                </div>
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_aberto_liquido" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_aberto_liquido" class="form-check-label check-green">Aberto (Líquido)</label>
                </div>
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_aberto_po" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_aberto_po" class="form-check-label check-green">Aberto (Pó)</label>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-8">
            <div class="form-check">
                <label class="grid_label">Filtros</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-4">
                    <input id="calculo_fil_todos" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_todos" class="form-check-label check-green">Todos</label>
                </div>
                <div class="form-check col-sm-4">
                    <input id="calculo_fil_semlactose" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_semlactose" class="form-check-label check-green">Sem Lactose</label>
                </div>
                <div class="form-check col-sm-4">
                    <input id="calculo_fil_semfibras" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_semfibras" class="form-check-label check-green">Sem Fibras</label>
                </div>
                <div class="form-check col-sm-4">
                    <input id="calculo_fil_polimerico" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_polimerico" class="form-check-label check-green">Polimérico</label>
                </div>
                <div class="form-check col-sm-4">
                    <input id="calculo_fil_semsacarose" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                </div>
                <div class="form-check col-sm-4">
                    <input id="calculo_fil_100proteina" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                </div>
                <div class="form-check col-sm-4">
                    <input id="calculo_fil_oligomerico" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_oligomerico" class="form-check-label check-green">Oligomérico</label>
                </div>
                <div class="form-check col-sm-4">
                    <input id="calculo_fil_comfibras" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_comfibras" class="form-check-label check-green">Com Fibras</label>
                </div>
            </div>
        </div>
    </div>



    <div class="row entric_group_radio mb-2">
        <div class="form-group entric_group_destaque col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio pl-0">
                <label>PRESCRIÇÃO NUTRICIONAL:</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <label><span style="color: #42bdbd;">KCAL:</span> 1750g (25g/kg)</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <label><span style="color: #42bdbd;">PTN:</span> 95g (1,5g/kg)</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <a href="javascript:void(0);"  data-toggle="modal" data-target="#calculo_pres_editar">Editar</a>

                <div class="modal fade" id="calculo_pres_editar" tabindex="-1" role="dialog" aria-labelledby="calculo_pres_editar" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Prescrição Nutricional</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body" id="modal-pdf-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




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
</div>