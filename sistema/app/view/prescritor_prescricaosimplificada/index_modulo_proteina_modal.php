<div class="modal fade" id="modal_modulo_proteina" tabindex="-1" role="dialog" aria-labelledby="modal_moduloProteinaTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_moduloProteinaTitle" style="width:100%;text-align:center;">Adicionar Módulo de Proteína</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body" id="modal-pdf-body"> 
                <form id="modal_form_adicionar_proteina" action="prescritor_relatorioalta" method="post" autocomplete="off" onsubmit="return false">
                    <div class="row">
                        <div class="col-6">
                            <label for="">A necessidade de proteína atual é de:</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="necessidade_proteica_atual" name="necessidade_proteica_atual" readonly placeholder="XX g/dia">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Ofertar na forma de módulo de proteína:</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="forma_modulo_proteina" name="forma_modulo_proteina" placeholder="XX g/dia">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="">A nova quantidade de proteína a ser fornecida pela dieta enteral é de:</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="quantidade_proteina" name="quantidade_proteina" readonly placeholder="XX g">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-warning" id="salvar_adicionar_modulo">Confirmar</button>
            </div>
        </div>
    </div>
</div>