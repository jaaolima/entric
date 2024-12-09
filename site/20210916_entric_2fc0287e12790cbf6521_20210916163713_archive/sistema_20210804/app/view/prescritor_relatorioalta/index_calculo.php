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
                        <input id="radioAutomatica" class="radio-outlined" name="tipo_prescricao" type="radio" value="Prescrição Automática">
                        <label for="radioAutomatica" class="radio-green">Prescrição Automática</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-radio">
                        <input id="radioManual" class="radio-outlined"  name="tipo_prescricao" type="radio" value="Prescrição Manual">
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
            <div class="form-radio entric_radio">
                <input id="calculo_disp_sne" class="radio-outlined" name="dispositivo" type="radio" value="SNE">
                <label for="calculo_disp_sne" class="radio-green">SNE</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-radio entric_radio">
                <input id="calculo_disp_sng" class="radio-outlined" name="dispositivo" type="radio" value="SNG">
                <label for="calculo_disp_sng" class="radio-green">SNG</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-radio entric_radio">
                <input id="calculo_disp_gtt" class="radio-outlined" name="dispositivo" type="radio" value="GTT">
                <label for="calculo_disp_gtt" class="radio-green">GTT</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-radio entric_radio">
                <input id="calculo_disp_gjt" class="radio-outlined" name="dispositivo" type="radio" value="GJT">
                <label for="calculo_disp_gjt" class="radio-green">GJT</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-radio entric_radio">
                <input id="calculo_disp_jjt" class="radio-outlined" name="dispositivo" type="radio" value="JJT">
                <label for="calculo_disp_jjt" class="radio-green">JJT</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-radio entric_radio">
                <input id="calculo_disp_sog" class="radio-outlined" name="dispositivo" type="radio" value="SOG">
                <label for="calculo_disp_sog" class="radio-green">SOG</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-radio entric_radio">
                <input id="calculo_disp_soe" class="radio-outlined" name="dispositivo" type="radio" value="SOE">
                <label for="calculo_disp_soe" class="radio-green">SOE</label>
            </div>
        </div>
    </div>


    <div class="row entric_grid mt-4 m-0 p-0" id="apresentacao">
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
                    <input id="calculo_apres_aberto_po" class="form-check-input styled-checkbox" name="calculo_apres_aberto_po" type="checkbox">
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


    <div class="row entric_group_radio mb-2" id="prescricao_nutricional">
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
                <a href="javascript:void(0);" id="editar_prescricao">Editar</a>
                <?php
                /*
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
                */
                ?>
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
            <button type="button" class="btn btn-warning btn-form" id="calculo_avancar" data-toggle="modal" data-target="#modal_fracionamento">AVANÇAR</button>
        </div>
    </div>
</div>



<div class="modal fade" id="modal_fracionamento" tabindex="-1" role="dialog" aria-labelledby="modal_fracionamento" aria-hidden="true" style="padding: 30px;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fracionamento e Hidratação</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body" id="modal-pdf-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12 text-center ">
                                <p class="entric_group_destaque mt-0">SISTEMA ABERTO</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-8">
                                Horário de Início da dieta: 
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="00:00" required="required" name="h_i_dieta" id="h_i_dieta" class="form-control hora">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-8">
                                Quantas horas de infusão da dieta por dia?
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="00:00" required="required" name="h_inf_dieta" id="h_inf_dieta" class="form-control hora">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <p class="entric_group_destaque mt-0">SISTEMA FECHADO</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                Fracionamento / Dia:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="fracionamento_dia" id="fracionamento_dia" class="form-control hora">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                Horário 01:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="horario_01" id="horario_01" class="form-control hora">
                            </div>
                            <div class="col-sm-3">
                                Horário 04:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="horario_04" id="horario_04" class="form-control hora">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                Horário 02:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="horario_02" id="horario_02" class="form-control hora">
                            </div>
                            <div class="col-sm-3">
                                Horário 05:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="horario_05" id="horario_05" class="form-control hora">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                Horário 03:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="horario_03" id="horario_03" class="form-control hora">
                            </div>
                            <div class="col-sm-3">
                                Horário 06:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="horario_06" id="horario_06" class="form-control hora">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <p class="entric_group_destaque2 mt-0">Hidratação</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                Fracionamento / Dia:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="hidrataca_dia" id="hidrataca_dia" class="form-control hora">
                            </div>
                            <div class="col-sm-3">
                                Qual o volume por horário:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="0,00" required="required" name="volume" id="volume" class="form-control media">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                Horário 01:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="horario_01" id="horario_01" class="form-control hora">
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                Horário 02:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="horario_02" id="horario_02" class="form-control hora">
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                Horário 03:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="00:00" required="required" name="horario_03" id="horario_03" class="form-control hora">
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <p class="entric_group_destaque2 mt-0">Hidratação</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <input id="utilizar_mesmo" class="form-check-input styled-checkbox" type="checkbox">
                                <label for="utilizar_mesmo" class="form-check-label check-green">Utilizar os mesmos horários da dieta, infundindo água ao término de cada horário.</label>                                
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                Qual o volume por horário:
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="0,00" required="required" name="volume" id="volume" class="form-control media">
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" id="salvar_alteracoes">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_selecao" tabindex="-1" role="dialog" aria-labelledby="modal_fracionamento" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleção da Dieta e Diluição - Para as Dietas de Sistema Aberto em Pó</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body" id="modal-pdf-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="entric_group_destaque3">DIETA</th>
                            <th class="entric_group_destaque3">DILUIÇÃO (KCAL/ML)</th>
                            <th class="entric_group_destaque3">VOLUME FINAL (POR HORÁRIO)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3">
                                <div class="form-check col-sm-12">
                                    <input id="sel_nut" class="form-check-input styled-checkbox" name="sel_nut" type="checkbox">
                                    <label for="sel_nut" class="form-check-label check-green">&nbsp;</label>
                                </div>
                            </td>
                            <td rowspan="3">Nutrison Soya (Danone)</td>
                            <td>
                                <div class="form-check col-sm-12">
                                    <input id="sel_nut_10" class="form-check-input styled-checkbox" name="sel_nut_10" type="checkbox">
                                    <label for="sel_nut_10" class="form-check-label check-green">1.0</label>
                                </div>
                            </td>
                            <td>180 ml</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check col-sm-12">
                                    <input id="sel_nut_115" class="form-check-input styled-checkbox" name="sel_nut_115" type="checkbox">
                                    <label for="sel_nut_115" class="form-check-label check-green">1.15</label>
                                </div>
                            </td>
                            <td>200 ml</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check col-sm-12">
                                    <input id="sel_nut_13" class="form-check-input styled-checkbox" name="sel_nut_13" type="checkbox">
                                    <label for="sel_nut_13" class="form-check-label check-green">1.3</label>
                                </div>
                            </td>
                            <td>220 ml</td>
                        </tr>
                        <tr>
                            <td rowspan="2">
                                <div class="form-check col-sm-12">
                                    <input id="sel_ens" class="form-check-input styled-checkbox" name="sel_ens" type="checkbox">
                                    <label for="sel_ens" class="form-check-label check-green">&nbsp;</label>
                                </div>
                            </td>
                            <td rowspan="2">Ensure (ABBOTT)</td>
                            <td>
                                <div class="form-check col-sm-12">
                                    <input id="sel_ens_115" class="form-check-input styled-checkbox" name="sel_ens_115" type="checkbox">
                                    <label for="sel_ens_115" class="form-check-label check-green">1.15</label>
                                </div>
                            </td>
                            <td>200 ml</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check col-sm-12">
                                    <input id="sel_ens_15" class="form-check-input styled-checkbox" name="sel_ens_15" type="checkbox">
                                    <label for="sel_ens_15" class="form-check-label check-green">1.5</label>
                                </div>
                            </td>
                            <td>270 ml</td>
                        </tr>
                        <tr>
                            <td >
                                <div class="form-check col-sm-12">
                                    <input id="sel_mod" class="form-check-input styled-checkbox" name="sel_mod" type="checkbox">
                                    <label for="sel_mod" class="form-check-label check-green">&nbsp;</label>
                                </div>
                            </td>
                            <td >Modulen (Nestlé)</td>
                            <td>
                                <div class="form-check col-sm-12">
                                    <input id="sel_mod_10" class="form-check-input styled-checkbox" name="sel_mod_10" type="checkbox">
                                    <label for="sel_mod_10" class="form-check-label check-green">1.0</label>
                                </div>
                            </td>
                            <td>250 ml</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Salvar</button>
            </div>
        </div>
    </div>
</div>