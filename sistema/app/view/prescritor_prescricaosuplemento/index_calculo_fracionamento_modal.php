<div class="modal fade" id="modal_fracionamento" tabindex="-1" role="dialog" aria-labelledby="modal_fracionamento" aria-hidden="true" style="padding: 30px;">
    <div class="modal-dialog modal-md" id="modal_id">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Prescrição TNEVO</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="modal_form_fracionamento" action="prescritor_relatorioalta" method="post" autocomplete="off" onsubmit="return false">
                    <div class="row">
                        <div class="col-sm-12" id="modal_sistema_aberto">
                            <div class="row mt-4">
                                <div class="col-sm-3">
                                    Quantas vezes ao dia?
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" maxlength="2" required="required" name="fracionamento_dia" id="fracionamento_dia" class="form-control numeros">
                                </div>
                            </div>
                            <div class="row mt-4 fracio_horario">
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3">
                                    Por quanto tempo?
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" required="required" placeholder="00:00" name="qto_tempo" id="qto_tempo" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" id="salvar_alteracoes">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>