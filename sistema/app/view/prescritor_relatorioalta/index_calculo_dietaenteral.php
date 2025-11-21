<div id="dietaenteral" class=" none inputs1">
    <div class="row">
        <div class="col-md-12">

            <div class="default-tab bordered-tab combinacoes">
                <ul id="tab-combinacoes" class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#combinacao1">Combinação 1</a>
                    </li>
                    
                    <li class="nav-item" id="li-nova-combinacao">
                        <?php /* <li class="nav-item ml-auto">*/ ?>
                        <button type="button" class="btn btn-secondary ml-2 nova-combinacao"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nova Combinação</button>
                    </li>
                </ul>

                <div class="tab-content tab-content-default">
 
                    <div class="tab-pane fade show active" id="combinacao1" role="tabpanel"> 
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row entric_grid">

                                    <div class="accordion form-group col-sm-12 accor_dietal" id="accor_dietal">
                                        <div class="card">
                                            <div class="card-header accor_dietal_head" id="accor_dietal_head">
                                                <a href="#accor_body" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accor_body" aria-expanded="false" aria-controls="accor_body">Dieta Enteral</a>
                                            </div>

                                            <div id="accor_body" class="collapse accor_body" aria-labelledby="accor_dietal_head" data-parent="#accor_dietal">
                                                <div class="card-body pt-0">
                                                    <div class="nova_dieta">
                                                        <div class="row div_nova_dieta" id="div_nova_dieta">
                                                            <div class="form-group col-sm-4 mb-1">
                                                                <label for="formula">Fórmula</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend div_formula_rm none">
                                                                        <button class="btn btn-danger btn_formula_rm" type="submit"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                                                    </div>
                                                                    <select class="form-control select2_ajax_formula select2_formula select_calculo" required="required" name="dieta_formula[1__1__0]"></select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-8 mb-1">
                                                                <div class="row">
                                                                    <div class="form-group col-sm-3 mb-1">
                                                                        <label for="volume">Volume (ml/dia):</label>
                                                                        <input type="text" maxlength='4'  class="form-control numeros campos_limpar volume_dia disparar_calculo" data-precision="0" required="required" name="dieta_volume[1__1__0]">
                                                                        <div>
                                                                            <label>Infusão:</label>
                                                                            <div class="form-radio">
                                                                                <input type="radio" id="infusao_bomba[1__1__0]" class="radio-outlined radio_infusao infusao_bomba" name="dieta_infusao[1__1__0]" value="Bomba de Infusão" checked="checked">  
                                                                                <label for="infusao_bomba[1__1__0]" class="radio-green radio_continua infusao_bomba">Bomba de Infusão</label> 
                                                                                <br>
                                                                                <input type="radio" id="infusao_gravitacional[1__1__0]" class="radio-outlined radio_infusao infusao_gravitacional" name="dieta_infusao[1__1__0]" value="Gravitacional">  
                                                                                <label for="infusao_gravitacional[1__1__0]" class="radio-green radio_fracionada infusao_gravitacional">Gravitacional</label> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-3 mb-1 div_infusao_bomba">
                                                                        <label for="dieta_vazao_h">Vazão (ml/h):</label>
                                                                        <input type="text" maxlength='3' class="form-control numeros campos_limpar vazao_ml" required="required" name="dieta_vazao_h[1__1__0]">
                                                                    </div>
                                                                    <div class="form-group col-sm-3 mb-1 div_infusao_bomba">
                                                                        <label for="dieta_horario_inicio[1__1__0]" class="label_horario_inicio">Horário de Início</label>
                                                                        <input type="text" class="form-control hora horario_inicio campos_limpar" required="required" name="dieta_horario_inicio[1__1__0]">
                                                                    </div>
                                                                    <div class="form-group col-sm-3 mb-1 div_infusao_gravitacional" style="display:none;">
                                                                        <label for="dieta_fracionamento_dia[1__1__0]">Fracionamento/dia:</label>
                                                                        <input type="text"  maxlength='2'  class="form-control numeros campos_limpar fracionamento_dia" required="required" name="dieta_fracionamento_dia[1__1__0]">
                                                                    </div>
                                                                    <div class="form-group col-sm-3 mb-1 div_infusao_gravitacional div_horario_administracao" style="display:none;">
                                                                        <label for="dieta_horario_administracao[1__1__0]" class="label_horario_administracao">Horário:</label>
                                                                        <input type="text" class="form-control hora horario_administracao campos_limpar" required="required" name="dieta_horario_administracao[1__1__0]">
                                                                    </div>
                                                                    <div class="form-group col-sm-3 mb-1 div_infusao_gravitacional" style="display:none;">
                                                                        <label for="dieta_quantas_horas_ocorrer[1__1__0]">Em quantas horas cada dieta deve ocorrer?</label>
                                                                        <input type="text" class="form-control hora campos_limpar dieta_quantas_horas_ocorrer" required="required" name="dieta_quantas_horas_ocorrer[1__1__0]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <button type="button" class="btn btn-secondary btn-sm btn_outra_dieta_add" id="btn_outra_dieta_add">
                                                                <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                                                                ADICIONAR OUTRA DIETA
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion form-group col-sm-12 accor_modulo" id="accor_modulo">
                                        <div class="card">
                                            <div class="card-header accor_modulo_head" id="accor_modulo_head">
                                                <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accor_modulo_body" aria-expanded="false" aria-controls="accor_modulo_body">Módulo</a>
                                            </div>

                                            <div id="accor_modulo_body" class="collapse accor_modulo_body" aria-labelledby="accor_modulo_head" data-parent="#accor_modulo">
                                                <div class="card-body pt-0">
                                                    <div class="modulo">
                                                        <div class="row p-0 div_modulo" id="div_modulo">
                                                            <div class="col-sm-4 mb-1">
                                                                <label for="produto">Produto:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend div_produto_rm none">
                                                                        <button class="btn btn-danger btn_produto_rm" type="submit"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                                                    </div>
                                                                    <select class="form-control select2_ajax_produto select2_produto select_calculo" required="required" name="modulo_produto[1__1__0]"></select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 mb-1">
                                                                <div class="row">
                                                                    <div class="form-group col-sm-2 mb-1">
                                                                        <label for="quantidade">Quantidade (g ou ml):</label>
                                                                        <input type="text" maxlength='3' class="form-control numeros campos_limpar modulo_quantidade disparar_calculo" required="required" name="modulo_quantidade[1__1__0]">
                                                                    </div>
                                                                    <div class="form-group col-sm-3 mb-1">
                                                                        <label for="volume">Volume de Água (ml):</label>
                                                                        <input type="text" class="form-control numeros campos_limpar modulo_volume_agua" data-precision="2" required="required" name="modulo_volume[1__1__0]">
                                                                    </div>

                                                                    <div class="col-sm-5 mb-1 div_volume_total_col">
                                                                        <div class="row div_volume_total">
                                                                            <div class="form-group col-sm-6 mb-1">
                                                                                <label for="horario">Horário:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control hora modulo_horario campos_limpar" required="required" name="modulo_horario[1__1__0__1]">
                                                                                    <div class="input-group-append"> 
                                                                                        <button class="btn btn-secondary btn_modulo_total_add" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                                                        <button class="btn btn-danger btn_modulo_total_rm none" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- <div class="form-group input-group col-sm-7 mb-1">
                                                                                <label for="volume_total">Volume Total:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control numeros modulo_volume_total campos_limpar" data-precision="2" required="required" name="modulo_volume_total[0]">
                                                                                    <div class="input-group-append"> 
                                                                                        <button class="btn btn-secondary btn_volume_total_add" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                                                        <button class="btn btn-danger btn_volume_total_rm none" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <button type="button" class="btn btn-secondary btn-sm btn_modulo_add" id="btn_modulo_add">
                                                                <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                                                                ADICIONAR OUTRO MÓDULO
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion form-group col-sm-12 accor_suplemento" id="accor_suplemento">
                                        <div class="card">
                                            <div class="card-header accor_suplemento_head" id="accor_suplemento_head">
                                                <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accor_suplemento_body" aria-expanded="false" aria-controls="accor_suplemento_body" id="title_suplemento">Suplemento (Enteral)</a>
                                            </div>

                                            <div id="accor_suplemento_body" class="collapse accor_suplemento_body" aria-labelledby="accor_suplemento_head" data-parent="#accor_suplemento">
                                                <div class="card-body pt-0">

                                                    <div class="suplemento">
                                                        <div class="row p-0 div_suplemento" id="div_suplemento">
                                                            <div class="col-sm-4 mb-1">
                                                                <label for="suplemento_produto">Produto:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend div_suplemento_rm none">
                                                                        <button class="btn btn-danger btn_suplemento_rm" type="submit"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                                                    </div>
                                                                    <select class="form-control select2_ajax_produto select2_suplemento_produto select_calculo" required="required" name="suplemento_produto[1__1__0]"></select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-8 mb-1">
                                                                <div class="row">
                                                                    <div class="form-group col-sm-4">
                                                                        <label for="suplemento_quantidade">Quantidade (g ou ml):</label>
                                                                        <input type="text" maxlength='4' class="form-control numeros campos_limpar suplemento_quantidade disparar_calculo" required="required" name="suplemento_quantidade[1__1__0]">
                                                                    </div>
                                                                    <div class="form-group col-sm-2 div_volume_total_col">
                                                                        <div class="row div_volume_total">
                                                                            <div class="form-group mb-1">
                                                                                <label for="suplemento_horario">Horário:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control hora suplemento_horario campos_limpar" required="required" name="suplemento_horario[1__1__0__1]">
                                                                                    <div class="input-group-append"> 
                                                                                        <button class="btn btn-secondary btn_suplemento_total_add" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                                                        <button class="btn btn-danger btn_suplemento_total_rm none" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-5 pl-5">
                                                                        <div class="row">
                                                                            <div class="form-group mb-1">
                                                                                <label for="hora_correr">Em quantas horas deve correr?</label>
                                                                                <input type="text" class="form-control hora hora_correr campos_limpar w-50" required="required" name="hora_correr[1__1__0]">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <button type="button" class="btn btn-secondary btn-sm btn_suplemento_add" id="btn_suplemento_add">
                                                                <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                                                                ADICIONAR OUTRO SUPLEMENTO
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion form-group col-sm-12 accor_hidratacao" id="accor_hidratacao">
                                        <div class="card">
                                            <div class="card-header accor_hidratacao_head" id="accor_hidratacao_head">
                                                <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accor_hidratacao_body" aria-expanded="false" aria-controls="accor_hidratacao_body">Hidratação (Água Livre) por dia</a>
                                            </div>
                                            <div id="accor_hidratacao_body" class="collapse accor_hidratacao_body" aria-labelledby="accor_hidratacao_head" data-parent="#accor_hidratacao">
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control numeros campos_limpar hidratacao_agua_livre" required="required" name="hidratacao_agua_livre[1__1__0]">
                                                        </div>
                                                        <div class="form-group col-sm-3 mb-1" style="margin-top: -24px;">
                                                            <label for="hidratacao_fracionamento_dia[1__1__0]">Fracionamento/dia:</label>
                                                            <input type="text"  maxlength='2' class="form-control numeros campos_limpar hidratacao_fracionamento" required="required" name="hidratacao_fracionamento_dia[1__1__0]">
                                                        </div>
                                                        <div class="form-group col-sm-3 mb-1 div_fracionamento_hidratacao d-flex row" style="margin-top: -24px;">
                                                            <label for="dieta_horario[1__1__0]" class="label_horario">Horário:</label>
                                                            <input type="text" class="form-control hora campos_limpar" required="required" name="hidratacao_horario[1__1__0]">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <p class="mt-0"><small>Atenção:  este  valor  é referente à oferta de água livre (que será ofertada em frasco gravitacional), sem considerar o volume da dieta enteral ou do(s) suplemento(s)</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        
                            <div class="col-md-2">
                                <div class="entric_ofertotal sticky">
                                    <div class="row b_ltr">
                                        <div class="col-lg-12 text-center bg-laranja">
                                            OFERTA TOTAL
                                        </div>
                                    </div>
                                    <div class="row b_ltrb">
                                        <div class="col-lg-6 b_r d-flex ln-40 bgwhite justify-content-center align-middle">
                                            KCAL
                                        </div>
                                        <div class="col-lg-6 ln-40 justify-content-center align-middle" name="div_valortotal_kcal">
                                        </div>
                                        <input type="hidden" name='valortotal_kcal[]' value="">


                                        <div class="col-lg-6 b_r d-flex b_t ln-40 bgwhite justify-content-center align-middle">
                                            PTN
                                        </div>
                                        <div class="col-lg-6 b_t ln-40 justify-content-center align-middle" name="div_valortotal_ptn">
                                        </div>
                                        <input type="hidden" name='valortotal_ptn[]' value="">
                                        <div class="col-lg-6 b_r d-flex b_t ln-40 bgwhite justify-content-center align-middle">
                                            FIBRA
                                        </div>
                                        <div class="col-lg-6 b_t ln-40 justify-content-center align-middle" name="div_valortotal_fibra"> 
                                        </div>
                                        <input type="hidden" name='valortotal_fibra[]' value="">
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>