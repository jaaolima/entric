<div class="modal fade" id="modal_fracionamento_suplemento" tabindex="-1" role="dialog"
    aria-labelledby="modal_fracionamento_suplemento" aria-hidden="true" style="padding: 30px;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Prescrição TNEVO</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="modal_form_fracionamento_suplemento" action="prescritor_relatorioalta" method="post"
                    autocomplete="off" onsubmit="return false">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row mt-4">
                                <div class="col-sm-3">
                                    Quantas vezes ao dia?
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" maxlength="2" required="required"
                                        name="fracionamento_dia_suplemento" id="fracionamento_dia_suplemento"
                                        class="form-control numeros">
                                </div>
                            </div>
                            <div class="row mt-4 fracio_horario_suplemento">
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3">
                                    Por quanto tempo?
                                </div>
                                <div class="col-sm-3">
                                    <input placeholder="X dias" type="text" required="required" name="qto_tempo"
                                        id="qto_tempo" class="form-control numeros">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3">
                                    Instruções de uso (Opcional)
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="instrucao_uso" id="instrucao_uso" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" id="salvar_alteracoes_suplemento">Salvar
                    Alterações</button>
            </div>
        </div>
    </div>
</div>