<div class="modal fade" id="modal_selecao" tabindex="-1" role="dialog" aria-labelledby="modal_selecaoTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_selecaoTitle" style="width:100%;text-align:center;">Seleção da dieta</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body" id="modal-pdf-body"> 
                <form id="modal_form_selecao" action="prescritor_relatorioalta" method="post" autocomplete="off" onsubmit="return false">
                    <div class="form-check form-toggle mb-2">
                        <input id="calculo_produto_especializado" name="produto_especializado" class="toggle-checkbox" type="checkbox" value="S">
                        <label for="calculo_produto_especializado" class="form-check-label check-green toggle-label">
                            <span class="toggle-switch"></span> Exibir produtos especializados <img class="ml-2" src="../../../public/assets/images/bandeira.png" alt="">
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 text-center"> 
                            <label class="grid_label pb-4 mb-3">Variação Calórica: ajuste se necessário.</label><br />
                            <div class="mt-3">
                                <b>-10%</b> <input type="text" value="" id="margem_calorica" name="margem_calorica" class="margens_kptn" /> <b>10%</b>
                                <div class="text-center"><b id="var_calorica"></b></div>
                            </div>
                        </div>

                        <div class="col-sm-6 text-center">
                            <label class="grid_label pb-4 mb-3">Variação Proteica: ajuste se necessário.</label><br />
                            <div class="mt-3">
                                <b>-20%</b> <input type="text" value="" id="margem_proteica" name="margem_proteica" class="margens_kptn" /> <b>20%</b>
                                <div class="text-center"><b id="var_proteina"></b></div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end my-2">
                        <div class="col-6">
                            <button id="incluir_modulo_proteina" class="btn btn-primary " type="button">Incluir módulo de proteína</button>
                        </div> 
                    </div>
                    <table class="table table-bordered" id="dietas_dc">
                        <thead>
                            <tr>
                                <th class="entric_group_destaque3">DIETA</th>
                                <th class="entric_group_destaque3">DILUIÇÃO (KCAL/ML)</th>
                                <th class="entric_group_destaque3">VOLUME FINAL</th>
                                <th class="entric_group_destaque3">VOLUME POR HORÁRIO</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" id="salvar_selecao">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>