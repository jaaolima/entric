<div id="dietaenteral" class=" none">
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
                    
                    <li class="nav-item ml-auto">
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
                                                                    <select class="form-control select2_ajax_formula select2_formula" required="required" name="dieta_formula[0]"></select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-8 mb-1">
                                                                <div class="row"> 
                                                                    <div class="form-group col-sm-2 mb-1">
                                                                        <label for="volume">Volume:</label>
                                                                        <input type="text" class="form-control numeros campos_limpar" data-precision="0" required="required" name="dieta_volume[]">
                                                                    </div>
                                                                    <div class="form-group col-sm-3 mb-1">
                                                                        <label>Infusão:</label>
                                                                        <div class="form-radio">
                                                                            <input type="radio" id="infusao_continua[0]" class="radio-outlined radio_infusao infusao_continua" name="dieta_infusao[0]" value="Contínua" checked="checked">  
                                                                            <label for="infusao_continua[0]" class="radio-green radio_continua infusao_continua">Contínua</label> 
                                                                            <br>
                                                                            <input type="radio" id="infusao_fracionada[0]" class="radio-outlined radio_infusao infusao_fracionada" name="dieta_infusao[0]" value="Fracionada">  
                                                                            <label for="infusao_fracionada[0]" class="radio-green radio_fracionada infusao_fracionada">Fracionada</label> 
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-sm-3 mb-1 div_infusao_continua">
                                                                        <label for="dieta_vazao_h">Vazão/h:</label>
                                                                        <input type="text" class="form-control numeros campos_limpar" required="required" name="dieta_vazao_h[]">
                                                                    </div>
                                                                    <div class="form-group col-sm-3 mb-1 div_infusao_continua">
                                                                        <label for="dieta_horario_inicio[0]" class="label_horario_inicio">Horário de Início</label>
                                                                        <input type="text" class="form-control hora horario_inicio campos_limpar" required="required" name="dieta_horario_inicio[0]">
                                                                    </div>

                                                                    <div class="form-group col-sm-3 mb-1 div_infusao_fracionada none">
                                                                        <label for="dieta_fracionamento_dia[]">Fracionamento/dia:</label>
                                                                        <input type="text" class="form-control numeros campos_limpar" required="required" name="dieta_fracionamento_dia[]">
                                                                    </div>
                                                                    <div class="form-group col-sm-4 mb-1 div_infusao_fracionada none">
                                                                        <label for="dieta_horario_administracao[0]" class="label_horario_administracao">Horário de Administração:</label>
                                                                        <input type="text" class="form-control hora horario_administracao campos_limpar" required="required" name="dieta_horario_administracao[0]">
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
                                                                    <select class="form-control select2_ajax_produto select2_produto" required="required" name="modulo_produto[0]"></select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 mb-1">
                                                                <div class="row">
                                                                    <div class="form-group col-sm-2 mb-1">
                                                                        <label for="quantidade">Quantidade:</label>
                                                                        <input type="text" class="form-control numeros campos_limpar" required="required" name="modulo_quantidade[]">
                                                                    </div>
                                                                    <div class="form-group col-sm-3 mb-1">
                                                                        <label for="volume">Volume de Água:</label>
                                                                        <input type="text" class="form-control numeros campos_limpar" data-precision="2" required="required" name="modulo_volume[]">
                                                                    </div>

                                                                    <div class="col-sm-5 mb-1 div_volume_total_col">
                                                                        <div class="row div_volume_total">
                                                                            <div class="form-group col-sm-5 mb-1">
                                                                                <label for="horario">Horário:</label>
                                                                                <input type="text" class="form-control hora modulo_horario campos_limpar" required="required" name="modulo_horario[0]">
                                                                            </div>
                                                                            <div class="form-group input-group col-sm-7 mb-1">
                                                                                <label for="volume_total">Volume Total:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control numeros modulo_volume_total campos_limpar" data-precision="2" required="required" name="modulo_volume_total[0]">
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
                                                <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accor_suplemento_body" aria-expanded="false" aria-controls="accor_suplemento_body">Suplemento (Enteral)</a>
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
                                                                    <select class="form-control select2_ajax_produto select2_suplemento_produto" required="required" name="suplemento_produto[0]"></select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-8 mb-1">
                                                                <div class="row">
                                                                    <div class="form-group col-sm-2">
                                                                        <label for="suplemento_quantidade">Quantidade:</label>
                                                                        <input type="text" class="form-control numeros campos_limpar" required="required" name="suplemento_quantidade[]">
                                                                    </div>
                                                                    <div class="form-group col-sm-5 div_volume_total_col">
                                                                        <div class="row div_volume_total">
                                                                            <div class="form-group col-sm-5 mb-1">
                                                                                <label for="suplemento_horario">Horário:</label>
                                                                                <input type="text" class="form-control hora suplemento_horario campos_limpar" required="required" name="suplemento_horario[0]">
                                                                            </div>
                                                                            <div class="form-group input-group col-sm-7 mb-1">
                                                                                <label for="suplemento_volume_total">Volume Total:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control numeros suplemento_volume_total campos_limpar" data-precision="2" required="required" name="suplemento_volume_total[0]">
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
                                                            <input type="text" class="form-control numeros campos_limpa hidratacao_agua_livre" required="required" name="hidratacao_agua_livre[]">
                                                        </div>
                                                        <div class="col-sm-8">
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
                                        <div class="col-lg-6">
                                        </div>

                                        <div class="col-lg-6 b_r d-flex b_t ln-40 bgwhite justify-content-center align-middle">
                                            PTN
                                        </div>
                                        <div class="col-lg-6 b_t">
                                        </div>

                                        <div class="col-lg-6 b_r d-flex b_t ln-40 bgwhite justify-content-center align-middle">
                                            FIBRA
                                        </div>
                                        <div class="col-lg-6 b_t">
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
</div>