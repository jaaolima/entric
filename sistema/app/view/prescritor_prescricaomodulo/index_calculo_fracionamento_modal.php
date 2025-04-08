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
                        <div class="col-sm-6 none" id="modal_sistema_fechado">
                            <div class="row">
                                <div class="col-sm-12 text-center ">
                                    <p class="entric_group_destaque mt-0">PROTEÍNA</p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    Por quanto tempo:
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" required="required" name="qto_tempo" id="qto_tempo" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-8">
                                    Horário(s) (opcional)
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="00:00" required="required" name="horario_1" id="horario_1" class="form-control hora">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    Instruções de Uso (opcional):
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" required="required" name="instrucoes_uso" id="instrucoes_uso" class="form-control">
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