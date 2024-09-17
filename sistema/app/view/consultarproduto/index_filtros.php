<div class="tab-pane fade" id="tabfiltros" role="tabpanel">
    <div class="pt-3">

        <div class="default-tab bordered-tab entric form_blue ">
            <form role="form" id="frmfiltroproduto" name="frmfiltroproduto" onsubmit="return false">


                <div class="row ">

                    <div class="col-sm-12">
                        <div class="row entric_grid entric_filtrogrid entric_query equal-cols search_chg">
                            <div class="form-group col-sm-3">
                                <div class="form-radio entric_group entric_radio">
                                    <label for="filtro_fabricante" class="radio-green">Fabricante</label>
                                    <select id="filtro_fabricante" name="filtro_fabricante" aria-controls="filtro_fabricante" class="form-control input-sm select-tag2">
                                        <?php
                                        if ($fornecedores){
                                            foreach ($fornecedores as $f => $v) {
                                                if (trim($v) == "") echo '<option value="">selecione...</option>';
                                                else
                                                    echo '<option value="'.$v.'">'.$v.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <div class="entric_group entric_radio p-3">
                                    <div class="form-check">
                                        <label class="grid_label">Categoria</label>
                                    </div>
                                    <div class="row p-4">
                                        <div class="col-sm-5">
                                            <div class="form-radio">
                                                <input id="filtro_calculo_adulto" class="radio-outlined"  name="especialidade" type="radio" checked="checked" value="Adulto">
                                                <label for="filtro_calculo_adulto" class="radio-green">Adulto</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-radio">
                                                <input id="filtro_calculo_pediatrico" class="radio-outlined"  name="especialidade" type="radio" value="Pediátrico" disabled>
                                                <label for="filtro_calculo_pediatrico" class="radio-green">Pediátrico <small>(em construção)</small></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-5">
                                <div class="entric_group entric_radio p-3">
                                    <div class="form-check">
                                        <label class="grid_label">Tipo de produto</label>
                                    </div>
                                    <div class="row p-4">
                                        <div class="col-sm-4">
                                            <div class="form-radio">
                                                <input id="filtro_calculo_via_enteral" class="radio-outlined" name="via" type="radio" checked="checked" value="Enteral">
                                                <label for="filtro_calculo_via_enteral" class="radio-green">Enteral</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-radio">
                                                <input id="filtro_calculo_via_oral" class="radio-outlined"  name="via" type="radio" value="Suplemento">
                                                <label for="filtro_calculo_via_oral" class="radio-green">Suplemento</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-radio">
                                                <input id="filtro_calculo_via_modulo" class="radio-outlined"  name="via" type="radio" value="Módulo">
                                                <label for="filtro_calculo_via_modulo" class="radio-green">Módulo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="filtro_apresentacao_enteral" class="row entric_grid entric_filtrogrid entric_filtrogridapres mt-4 m-0 p-0 search_chg search_Enteral">
                            <div class="form-group col-sm-3 ">
                                <div class="form-check">
                                    <label class="grid_label">Apresentação</label>
                                </div>
                                <div class="row p-4">
                                    <div class="form-check col-sm-12">
                                        <input id="filtro_calculo_enteral_apres_fechado" name="apres_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Fechado">
                                        <label for="filtro_calculo_enteral_apres_fechado" class="form-check-label check-green">Fechado</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="filtro_calculo_enteral_apres_aberto_liquido" name="apres_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Aberto (Líquido)">
                                        <label for="filtro_calculo_enteral_apres_aberto_liquido" class="form-check-label check-green">Aberto (Líquido)</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="filtro_calculo_enteral_apres_aberto_po" name="apres_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Aberto (Pó)">
                                        <label for="filtro_calculo_enteral_apres_aberto_po" class="form-check-label check-green">Aberto (Pó)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-9">
                                <div class="form-check">
                                    <label class="grid_label">Filtros</label>
                                </div>
                                <div class="row p-4">
                                    <div class="form-check col-sm-3 ">
                                        <input id="filtro_calculo_fil_polimerico" name="filtro_calculo_fil_polimerico" value="Polimérico" class="form-check-input filtros radio-outlined" type="radio">
                                        <label for="filtro_calculo_fil_polimerico" class="form-check-label radio-green">Polimérico</label>
                                    </div>
                                    <div class="form-check col-sm-3">
                                        <input id="filtro_calculo_fil_comfibras" name="filtro_calculo_fil_comfibras" value="Com Fibras" class="form-check-input filtros radio-outlined" type="radio">
                                        <label for="filtro_calculo_fil_comfibras" class="form-check-label radio-green">Com Fibras</label>
                                    </div>
                                    <div class="form-check col-sm-3"> 
                                        <input id="filtro_calculo_fil_semlactose" name="filtro_calculo_fil_semlactose" value="Sem Lactose" class="form-check-input filtros styled-checkbox" type="checkbox">
                                        <label for="filtro_calculo_fil_semlactose" class="form-check-label check-green">Sem Lactose</label>
                                    </div>
                                    <div class="form-check col-sm-3">
                                    </div>
                                    <div class="form-check col-sm-3">  
                                        <input id="filtro_calculo_fil_oligomerico" name="filtro_calculo_fil_polimerico" value="Oligomérico" class="form-check-input filtros radio-outlined" type="radio">
                                        <label for="filtro_calculo_fil_oligomerico" class="form-check-label radio-green">Oligomérico</label>   
                                    </div>
                                    <div class="form-check col-sm-3">
                                        <input id="filtro_calculo_fil_semfibras" name="filtro_calculo_fil_comfibras" value="Sem Fibras" class="form-check-input filtros radio-outlined" type="radio">
                                        <label for="filtro_calculo_fil_semfibras" class="form-check-label radio-green">Sem Fibras</label>
                                    </div>
                                    <div class="form-check col-sm-3">
                                        <input id="filtro_calculo_fil_100proteina" name="filtro_calculo_fil_100proteina" value="100% Proteína Vergetal" class="form-check-input filtros styled-checkbox" type="checkbox">
                                        <label for="filtro_calculo_fil_100proteina" class="form-check-label check-green">100% Proteína Vergetal</label>
                                    </div>
                                    <div class="form-check col-sm-3">
                                    </div>
                                    <div class="form-check col-sm-3">
                                        <input id="filtro_calculo_fil_pololigomerico" name="filtro_calculo_fil_polimerico" value="Ambos" class="form-check-input filtros radio-outlined" checked="checked" type="radio">
                                        <label for="filtro_calculo_fil_pololigomerico" class="form-check-label radio-green">Ambos</label>   
                                    </div>
                                    <div class="form-check col-sm-3">
                                        <input id="filtro_calculo_fil_comsemfibras" name="filtro_calculo_fil_comfibras" value="Ambos" class="form-check-input filtros radio-outlined" checked="checked" type="radio">
                                        <label for="filtro_calculo_fil_comsemfibras" class="form-check-label radio-green">Ambos</label>
                                    </div>
                                    <div class="form-check col-sm-3">
                                       <input id="filtro_calculo_fil_semsacarose" name="filtro_calculo_fil_semsacarose" value="Sem Sacarose" class="form-check-input filtros styled-checkbox" type="checkbox">
                                        <label for="filtro_calculo_fil_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                                    </div>
                                    <div class="form-check col-sm-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="filtro_apresentacao_oral" class="row entric_grid entric_filtrogrid entric_filtrogridapres mt-4 m-0 p-0 none search_chg search_Oral">
                            <div class="form-group col-sm-3">
                                <div class="form-check">
                                    <label class="grid_label">Apresentação</label>
                                </div>
                                <div class="row p-4">
                                    <div class="form-check col-sm-12">
                                        <input id="filtro_calculo_enteral_apres_liquido" name="apres_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Líquido / Creme">
                                        <label for="filtro_calculo_enteral_apres_liquido" class="form-check-label check-green">Líquido / Creme</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="filtro_calculo_enteral_apres_po" name="apres_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Pó">
                                        <label for="filtro_calculo_enteral_apres_po" class="form-check-label check-green">Pó</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-9">
                                <div class="form-check">
                                    <label class="grid_label">Características</label>
                                </div>
                                <div class="row p-4"> 
                                    <div class="form-check col-sm-6">
                                        <input id="filtro_calculo_oral_carac_todos" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Todos">
                                        <label for="filtro_calculo_oral_carac_todos" class="form-check-label check-green">Todos</label>
                                    </div>
                                    <div class="form-check col-sm-6">
                                        <input id="filtro_calculo_oral_100proteina" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="100% Proteína Vegetal">
                                        <label for="filtro_calculo_oral_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                                    </div> 
                                    <div class="form-check col-sm-6">
                                        <input id="filtro_calculo_oral_carac_semsacarose" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Sacarose">
                                        <label for="filtro_calculo_oral_carac_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                                    </div>
                                    <div class="form-check col-sm-6">
                                        <input id="filtro_calculo_oral_carac_comfibras" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Com Fibras">
                                        <label for="filtro_calculo_oral_carac_comfibras" class="form-check-label check-green">Com Fibras</label>
                                    </div>
                                    <div class="form-check col-sm-6">
                                        <input id="filtro_calculo_oral_carac_semlactose" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Lactose">
                                        <label for="filtro_calculo_oral_carac_semlactose" class="form-check-label check-green">Sem Lactose</label>
                                    </div>
                                    <div class="form-check col-sm-6">
                                        <input id="filtro_calculo_oral_carac_semfibras" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Fibras">
                                        <label for="filtro_calculo_oral_carac_semfibras" class="form-check-label check-green">Sem Fibras</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </form>

            <div id="filtro_resultado_produtos" class="row entric_grid mt-4 m-0 p-0 none">
                <div class="form-group col-sm-12 m-0 p-0">
                    <div class="form-radio entric_radio text-center">
                        <label for="filtro_fabricante" class="radio-green">Resultados Encontrados</label>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <table id="filtro_resultado_dados" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="border-top-0">#</th>
                                <th scope="col" class="border-top-0">Produto</th>
                                <th scope="col" class="border-top-0">Fabricante</th>
                                <th scope="col" class="border-top-0">Apresentação</th>
                                <th scope="col" class="border-top-0">Características</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="filtro_resultado_produtos_nao" class="row entric_grid mt-4 m-0 p-0 none">
                <div class="form-group col-sm-12 m-0 p-0">
                    <div class="form-radio entric_radio text-center">
                        <label for="filtro_fabricante" class="radio-green">Nenhum resultado encontrado</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>