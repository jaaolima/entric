<div class="modal fade" id="modal_selecao" tabindex="-1" role="dialog" aria-labelledby="modal_selecaoTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_selecaoTitle" style="width:100%;text-align:center;">Seleção da dieta</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body" id="modal-pdf-body">
                <div class="form-check form-toggle">
                    <input id="calculo_produto_especializado" name="produto_especializado" class="toggle-checkbox" type="checkbox" value="S">
                    <label for="calculo_produto_especializado" class="form-check-label check-green toggle-label">
                        <span class="toggle-switch"></span> Exibir produtos Especializados
                    </label>
                </div>
                <form id="modal_form_selecao" action="prescritor_relatorioalta" method="post" autocomplete="off" onsubmit="return false">

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