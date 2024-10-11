<div class="modal fade" id="modal_fracionamento" tabindex="-1" role="dialog" aria-labelledby="modal_fracionamento" aria-hidden="true" style="padding: 30px;">
    <div class="modal-dialog modal-md" id="modal_id">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fracionamento e Hidratação</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="modal_form_fracionamento" action="prescritor_relatorioalta" method="post" autocomplete="off" onsubmit="return false">
                    <div class="row">
                        <div class="col-sm-6 none" id="modal_sistema_fechado">
                            <div class="row">
                                <div class="col-sm-12 text-center ">
                                    <p class="entric_group_destaque mt-0">SISTEMA FECHADO</p>
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

                        <div class="col-sm-6 none" id="modal_sistema_aberto">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <p class="entric_group_destaque mt-0">SISTEMA ABERTO</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <p class="entric_group_destaque2 mt-2">Fracionamento e Horários da Dieta</p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3">
                                    Fracionamento / Dia:
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" maxlength="2" required="required" name="fracionamento_dia" id="fracionamento_dia" class="form-control numeros">
                                </div>
                                <div class="col-sm-3">
                                    Em quantas horas cada dieta deve correr?
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" required="required" placeholder="00:00" name="qtas_horas" id="qtas_horas" class="form-control hora">
                                </div>
                            </div>
                            <div class="row mt-4 fracio_horario">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12 text-center">
                            <p class="entric_group_destaque mt-0">Hidratação</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row mt-4">
                                <div class="col-sm-3">
                                    Fracionamento / Dia:
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" maxlength="2" required="required" name="hidratacao_dia" id="hidratacao_dia" class="form-control numeros">
                                </div>
                                <div class="col-sm-3">
                                    Qual o volume por horário:
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="0,00" required="required" name="volume_horario" id="volume_horario" class="form-control numcomma">
                                </div>
                            </div>

                            <div class="row mt-4 hidratacao_horarios"></div>

                            <div class="row mt-4 none" id="volume_total_hidratacao">
                                <div class="form-group col-sm-12">
                                    <label>O volume total da hidratação é <span class="volume_ml" style="font-weight: bold;color: #000;"></span>
                                    <input type="hidden" name="in_volume_ml" id="in_volume_ml" value="">
                                     ml por dia</label>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="form-group col-sm-12">
                                    <label for="info_complementares">Informações complementares da hidratação (opcional):</label>
                                    <textarea class="form-control " name="info_complementares" style="height: 150px;"></textarea>
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