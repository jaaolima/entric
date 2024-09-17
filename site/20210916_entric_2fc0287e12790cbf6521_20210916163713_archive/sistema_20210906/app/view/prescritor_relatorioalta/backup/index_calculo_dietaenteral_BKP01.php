<div id="dietaenteral" class=" none">
    <div class="row entric_grid">
        <div class="form-group col-sm-12">
            <div class="entric_group p-3">
                <div class="form-check">
                    <label class="grid_label">Dieta Enteral</label>
                </div>

                <div class="nova_dieta">
                    <div class="row" id="div_nova_dieta">
                        <div class="form-group col-sm-3 mb-1">
                            <label for="formula">Fórmula</label>
                            <div class="input-group">
                                <input type="text" class="form-control campos_limpar" required="required" name="formula[]">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-2 mb-1">
                            <label for="volume">Volume:</label>
                            <input type="text" class="form-control numeros campos_limpar" required="required" name="volume[]">
                        </div>
                        <div class="form-group col-sm-2 mb-1">
                            <label>Infusão:</label>
                            <div class="form-radio">
                                <input type="radio" id="infusao_continua[0]" class="radio-outlined radio_infusao" name="infusao[0]" value="Contínua" checked="checked">  
                                <label for="infusao_continua[0]" class="radio-green radio_continua">Contínua</label> 
                                <br>
                                <input type="radio" id="infusao_fracionada[0]" class="radio-outlined radio_infusao" name="infusao[0]" value="Fracionada">  
                                <label for="infusao_fracionada[0]" class="radio-green radio_fracionada">Fracionada</label> 
                            </div>
                        </div>
                        <div class="form-group col-sm-2 mb-1 div_infusao_continua">
                            <label for="vazao_h">Vazão/h:</label>
                            <input type="text" class="form-control numeros campos_limpar" required="required" name="vazao_h[]">
                        </div>
                        <div class="form-group col-sm-3 mb-1 div_infusao_continua">
                            <label for="horario_inicio[0]" class="label_horario_inicio">Horário de Início</label>
                            <input type="text" class="form-control hora horario_inicio campos_limpar" required="required" name="horario_inicio[0]">
                        </div>
                        <div class="form-group col-sm-2 mb-1 div_infusao_fracionada none">
                            <label for="fracionamento_dia[]">Fracionamento/dia:</label>
                            <input type="text" class="form-control numeros campos_limpar" required="required" name="fracionamento_dia[]">
                        </div>
                        <div class="form-group col-sm-3 mb-1 div_infusao_fracionada none">
                            <label for="horario_administracao[0]" class="label_horario_administracao">Horário de Administração</label>
                            <input type="text" class="form-control hora horario_administracao campos_limpar" required="required" name="horario_administracao[0]">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-sm" id="btn_outra_dieta_add">
                            <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                            ADICIONAR OUTRA DIETA
                        </button>
                    </div>
                </div>

            </div>
        </div>


        <div class="form-group col-sm-12">
            <div class="entric_group p-3">
                <div class="form-check">
                    <label class="grid_label">Módulo</label>
                </div>

                <div class="modulo">
                    <div class="row p-0" id="div_modulo">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="form-group col-sm-5 mb-1">
                                    <label for="produto">Produto:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control campos_limpar" required="required" name="produto[]">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3 mb-1">
                                    <label for="quantidade">Quantidade:</label>
                                    <input type="text" class="form-control numeros campos_limpar" required="required" name="quantidade[]">
                                </div>
                                <div class="form-group col-sm-4 mb-1">
                                    <label for="volume">Volume de Água:</label>
                                    <input type="text" class="form-control numeros campos_limpar" required="required" name="volume[]">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-5 div_volume_total_col">
                            <div class="row div_volume_total">
                                <div class="form-group col-sm-6 mb-1">
                                    <label for="horario">Horário:</label>
                                    <input type="text" class="form-control hora modulo_horario campos_limpar" required="required" name="horario[0]">
                                </div>
                                <div class="form-group input-group col-sm-6 mb-1">
                                    <label for="volume_total">Volume Total:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control numeros modulo_volume_total campos_limpar" required="required" name="volume_total[0]">
                                        <div class="input-group-append"> 
                                            <button class="btn btn-secondary btn_volume_total_add" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn_volume_total_rm none" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-sm" id="btn_modulo_add">
                            <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                            ADICIONAR OUTRO MÓDULO
                        </button>
                    </div>
                </div>

            </div>
        </div>


        <div class="form-group col-sm-12">
            <div class="entric_group p-3">
                <div class="form-check">
                    <label class="grid_label">Suplemento (Oral)</label>
                </div>

                <div class="suplemento">
                    <div class="row p-0" id="div_suplemento">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="form-group col-sm-7 mb-1">
                                    <label for="suplemento_produto">Produto:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control campos_limpar" required="required" name="suplemento_produto[]">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-5 mb-1">
                                    <label for="suplemento_quantidade">Quantidade:</label>
                                    <input type="text" class="form-control numeros campos_limpar" required="required" name="suplemento_quantidade[]">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-5 div_volume_total_col">
                            <div class="row div_volume_total">
                                <div class="form-group col-sm-6 mb-1">
                                    <label for="suplemento_horario">Horário:</label>
                                    <input type="text" class="form-control hora suplemento_horario campos_limpar" required="required" name="suplemento_horario[0]">
                                </div>
                                <div class="form-group input-group col-sm-6 mb-1">
                                    <label for="suplemento_volume_total">Volume Total:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control numeros suplemento_volume_total campos_limpar" required="required" name="suplemento_volume_total[0]">
                                        <div class="input-group-append"> 
                                            <button class="btn btn-secondary btn_suplemento_total_add" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn_suplemento_total_rm none" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-sm" id="btn_suplemento_add">
                            <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                            ADICIONAR OUTRO SUPLEMENTO
                        </button>
                    </div>
                </div>

            </div>
        </div>


        <div class="form-group col-sm-12">
            <div class="entric_group p-3">
                <div class="row p-0 ">
                    <div class="col-sm-6">
                        <label class="grid_label">Hidratação (Água Livre) por dia:</label>
                        <input type="text" class="form-control numeros" required="required" name="hidratacao_agua_livre">
                    </div>
                    <div class="col-sm-6">
                        <p><small>Atenção:  este  valor  é referente à oferta de água livre (que será ofertada em frasco gravitacional), sem considerar o volume da dieta enteral ou do(s) suplemento(s)</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-3">
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-3 p-3 text-center" style="background: #eda349; color: #ffffff; font-weight: bold;">
                    OFERTA TOTAL
                </div>
                <div class="col-sm-3 p-3" style="border: 1px solid #e2edf0;">
                    KCAL:
                </div>
                <div class="col-sm-3 p-3" style="border: 1px solid #e2edf0;">
                    PTN:
                </div>
                <div class="col-sm-3 p-3" style="border: 1px solid #e2edf0;">
                    FIBRA:
                </div>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <div class="row">
                <div class="col-sm-12 pt-0 pb-3">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Nova Combinação</button>
                </div>
            </div>
        </div>
    </div>
</div>