<div class="modal fade" id="modal_retorno_produto" tabindex="-1" role="dialog" aria-labelledby="modal_retorno_produto" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 80%;"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Produto</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="modalfrmproduto" name="modalfrmproduto" onsubmit="return false">
                    <input type="hidden" name="m__idproduto" id="m__idproduto" value="" />
                    <input type="hidden" name="m_tipopesquisa" id="m_tipopesquisa" value="" />

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-info solid alert-right-icon alert-dismissible fade show">
                                <span><i class="mdi mdi-email"></i></span>
                                Produto cadastrado conforme informações do fabricante.
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-8">

                            <div class="row entric_grid m-0">
                                <div class="form-group col-sm-12">
                                    <div class="entric_group p-3">
                                        <div class="form-check">
                                            <label class="grid_label">Categoria</label>
                                        </div>
                                        <div class="row p-4">
                                            <div class="col-sm-6">
                                                <div class="form-radio">
                                                    <input id="m_calculo_adulto" disabled name="m_especialidade[]" class="form-check-input styled-checkbox" type="checkbox" value="Adulto">
                                                    <label for="m_calculo_adulto" class="form-check-label check-green">Adulto</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-radio">
                                                    <input id="m_calculo_pediatrico" disabled name="m_especialidade[]" class="form-check-input styled-checkbox" type="checkbox" value="Pediátrico">
                                                    <label for="m_calculo_pediatrico" class="form-check-label check-green">Pediátrico</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <div class="entric_group p-3">
                                        <div class="form-check">
                                            <label class="grid_label">Nível de Prioridade</label>
                                        </div>
                                        <div class="row p-4">
                                            <div class="col-sm-4">
                                                <div class="form-radio">
                                                    <input id="m_prioridade_alta" class="radio-outlined" disabled name="m_prioridade" type="radio" value="Alta Rentabilidade PDV">
                                                    <label for="m_prioridade_alta" class="radio-green">Alta Rentabilidade PDV</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-radio">
                                                    <input id="m_prioridade_baixa" class="radio-outlined" disabled name="m_prioridade" type="radio" value="Baixa Rentabilidade PDV">
                                                    <label for="m_prioridade_baixa" class="radio-green">Baixa Rentabilidade PDV</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-radio">
                                                    <input id="m_prioridade_nao_disponivel" class="radio-outlined" disabled name="m_prioridade" type="radio" value="Não Disponível PDV">
                                                    <label for="m_prioridade_nao_disponivel" class="radio-green">Não Disponível PDV</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <div class="entric_group p-3">
                                        <div class="form-check">
                                            <label class="grid_label">Tipo de produto</label>
                                        </div>
                                        <div class="row p-4">
                                            <div class="col-sm-4">
                                                <div class="form-radio">
                                                    <input id="m_calculo_via_enteral" class="radio-outlined" disabled name="m_via" type="radio" value="Enteral">
                                                    <label for="m_calculo_via_enteral" class="radio-green">Enteral</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-radio">
                                                    <input id="m_calculo_via_oral" class="radio-outlined" disabled name="m_via" type="radio" value="Suplemento">
                                                    <label for="m_calculo_via_oral" class="radio-green">Suplemento</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-radio">
                                                    <input id="m_calculo_via_modulo" class="radio-outlined" disabled name="m_via" type="radio" value="Módulo">
                                                    <label for="m_calculo_via_modulo" class="radio-green">Módulo</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="m_apresentacao_enteral" class="row entric_grid mt-4 m-0 p-0">
                                <div class="form-group col-sm-3">
                                    <div class="form-check">
                                        <label class="grid_label">Apresentação</label>
                                    </div>
                                    <div class="row p-4">
                                        <div class="form-check col-sm-12">
                                            <input id="m_calculo_enteral_apres_fechado" required disabled name="m_apres_enteral[]" class="form-check-input radio-outlined" type="radio" value="Fechado">
                                            <label for="m_calculo_enteral_apres_fechado" class="form-check-label radio-green">Fechado</label>
                                        </div>
                                        <div class="form-check col-sm-12">
                                            <input id="m_calculo_enteral_apres_aberto_liquido" disabled name="m_apres_enteral[]" class="form-check-input radio-outlined" type="radio" value="Aberto (Líquido)">
                                            <label for="m_calculo_enteral_apres_aberto_liquido" class="form-check-label radio-green">Aberto (Líquido)</label>
                                        </div>
                                        <div class="form-check col-sm-12">
                                            <input id="m_calculo_enteral_apres_aberto_po" disabled name="m_apres_enteral[]" class="form-check-input radio-outlined" type="radio" value="Aberto (Pó)">
                                            <label for="m_calculo_enteral_apres_aberto_po" class="form-check-label radio-green">Aberto (Pó)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-9">
                                    <div class="form-check">
                                        <label class="grid_label">Características</label>
                                    </div>
                                    <div class="row p-4"> 

                                        <div class="form-check col-sm-4">
                                            <input id="m_calculo_enteral_carac_polimerico" required disabled name="m_carac_enteral_merico[]" class="form-check-input radio-outlined" type="radio" value="Polimérico">
                                            <label for="m_calculo_enteral_carac_polimerico" class="form-check-label radio-green">Polimérico</label>
                                        </div>
                                        <div class="form-check col-sm-4">
                                            <input id="m_calculo_enteral_carac_comfibras" required disabled name="m_carac_enteral_fibras[]" class="form-check-input radio-outlined" type="radio" value="Com Fibras">
                                            <label for="m_calculo_enteral_carac_comfibras" class="form-check-label radio-green">Com Fibras</label>
                                        </div>
                                        <div class="form-check col-sm-4">
                                            <input id="m_calculo_enteral_carac_semlactose" disabled name="m_carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Lactose">
                                            <label for="m_calculo_enteral_carac_semlactose" class="form-check-label check-green">Sem Lactose</label>
                                        </div>
                                        <div class="form-check col-sm-4">
                                            <input id="m_calculo_enteral_carac_oligomerico" disabled name="m_carac_enteral_merico[]" class="form-check-input radio-outlined" type="radio" value="Oligomérico">
                                            <label for="m_calculo_enteral_carac_oligomerico" class="form-check-label radio-green">Oligomérico</label>
                                        </div>
                                        <div class="form-check col-sm-4">
                                            <input id="m_calculo_enteral_carac_semfibras" disabled name="m_carac_enteral_fibras[]" class="form-check-input radio-outlined" type="radio" value="Sem Fibras">
                                            <label for="m_calculo_enteral_carac_semfibras" class="form-check-label radio-green">Sem Fibras</label>
                                        </div>
                                        <div class="form-check col-sm-4">
                                            <input id="m_calculo_enteral_100proteina" disabled name="m_carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="100% Proteína Vegetal">
                                            <label for="m_calculo_enteral_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                                        </div>
                                        <div class="form-check col-sm-4">
                                        </div>
                                        <div class="form-check col-sm-4">
                                        </div>
                                        <div class="form-check col-sm-4">
                                            <input id="m_calculo_enteral_carac_semsacarose" disabled name="m_carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Sacarose">
                                            <label for="m_calculo_enteral_carac_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-sm-6">
                                            <div class="form-check form-toggle">
                                                <input id="m_calculo_produto_especializado_enteral" disabled name="m_produto_especializado_enteral" class="toggle-checkbox" type="checkbox" value="S">
                                                <label for="m_calculo_produto_especializado_enteral" class="form-check-label check-green toggle-label">
                                                    <span class="toggle-switch"></span> Produto Especializado
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="m_apresentacao_oral" class="row entric_grid mt-4 m-0 p-0 none">
                                <div class="form-group col-sm-3">
                                    <div class="form-check">
                                        <label class="grid_label">Apresentação</label>
                                    </div>
                                    <div class="row p-4">
                                        <div class="form-check col-sm-12">
                                            <input id="m_calculo_enteral_apres_liquido" required disabled name="m_apres_oral[]" class="form-check-input radio-outlined" type="radio" value="Líquido / Creme">
                                            <label for="m_calculo_enteral_apres_liquido" class="form-check-label radio-green">Líquido</label>
                                        </div>
                                        <div class="form-check col-sm-12">
                                            <input id="m_calculo_enteral_apres_po" disabled name="m_apres_oral[]" class="form-check-input radio-outlined" type="radio" value="Pó">
                                            <label for="m_calculo_enteral_apres_po" class="form-check-label radio-green">Pó</label>
                                        </div>
                                        <div class="form-check col-sm-12">
                                            <input id="m_calculo_enteral_apres_cremoso" disabled name="m_apres_oral[]" class="form-check-input radio-outlined" type="radio" value="Cremoso">
                                            <label for="m_calculo_enteral_apres_cremoso" class="form-check-label radio-green">Cremoso</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-9">
                                    <div class="form-check">
                                        <label class="grid_label">Características</label>
                                    </div>
                                    <div class="row p-4"> 
                                        <div class="form-check col-sm-6">
                                            <input id="m_calculo_oral_carac_semsacarose" disabled name="m_carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Sacarose">
                                            <label for="m_calculo_oral_carac_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                                        </div>
                                        <div class="form-check col-sm-6">
                                            <input id="m_calculo_oral_carac_comfibras" disabled required name="m_carac_oral_fibras[]" class="form-check-input radio-outlined" type="radio" value="Com Fibras">
                                            <label for="m_calculo_oral_carac_comfibras" class="form-check-label radio-green">Com Fibras</label>
                                        </div>
                                        <div class="form-check col-sm-6">
                                            <input id="m_calculo_oral_carac_semlactose" disabled name="m_carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Lactose">
                                            <label for="m_calculo_oral_carac_semlactose" class="form-check-label check-green">Sem Lactose</label>
                                        </div>
                                        <div class="form-check col-sm-6">
                                            <input id="m_calculo_oral_carac_semfibras" disabled name="m_carac_oral_fibras[]" class="form-check-input radio-outlined" type="radio" value="Sem Fibras">
                                            <label for="m_calculo_oral_carac_semfibras" class="form-check-label radio-green">Sem Fibras</label>
                                        </div>
                                        <div class="form-check col-sm-6">
                                            <input id="m_calculo_oral_100proteina" disabled name="m_carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="100% Proteína Vegetal">
                                            <label for="m_calculo_oral_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                                        </div>
                                        <div class="form-check col-sm-6">
                                            <input id="m_calculo_oral_cicatrizacao" disabled name="m_carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Cicatrização">
                                            <label for="m_calculo_oral_cicatrizacao" class="form-check-label check-green">Cicatrização</label>
                                        </div>
                                        <div class="form-check col-sm-6">
                                            <input id="m_calculo_oral_omega3" disabled name="m_carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Com óleo de peixe">
                                            <label for="m_calculo_oral_omega3" class="form-check-label check-green">Com óleo de peixe</label>
                                        </div>
                                        <div class="form-check col-sm-6">
                                            <input id="m_calculo_oral_imunonutricaocirurgica" disabled name="m_carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Imunonutrição cirúrgica">
                                            <label for="m_calculo_oral_imunonutricaocirurgica" class="form-check-label check-green">Imunonutrição cirúrgica</label>
                                        </div>
                                    </div> 
                                    <div class="row p-4">
                                        <div class="col-sm-6">
                                            <div class="form-check form-toggle">
                                                <input id="m_calculo_produto_especializado_oral" disabled name="m_produto_especializado_oral" class="toggle-checkbox" type="checkbox" value="S">
                                                <label for="m_calculo_produto_especializado_oral" class="form-check-label check-green toggle-label">
                                                    <span class="toggle-switch"></span> Produto Especializado
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div id="m_apresentacao_modulo" class="row entric_grid mt-4 m-0 p-0 none">
                                <div class="form-group col-12">
                                    <div class="form-check">
                                        <label class="grid_label required">Categoria <span>*</span></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 p-4">
                                            <div class="form-check col-sm-12">
                                                <div>
                                                    <input id="m_categoria_modulo_proteina" disabled required name="m_cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Proteína">
                                                    <label for="m_categoria_modulo_proteina" class="form-check-label radio-green">Proteína</label>
                                                </div>
                                                <div class="col-sm-12" id="div_m_tipo_proteina" style="display: none;">
                                                    <div class="col-sm-6">
                                                        <div class="form-radio">
                                                            <input id="m_tipo_proteina_animal" disabled class="radio-outlined" name="m_tipo_proteina" type="radio" value="Animal">
                                                            <label for="m_tipo_proteina_animal" class="radio-green">Animal</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-radio">
                                                            <input id="m_tipo_proteina_vegetal" disabled class="radio-outlined" name="m_tipo_proteina" type="radio" value="Vegetal">
                                                            <label for="m_tipo_proteina_vegetal" class="radio-green">Vegetal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-check col-sm-12">
                                                <input id="m_categoria_modulo_colageno_aminoacidos" disabled name="m_cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Colágeno ou Aminoácidos">
                                                <label for="m_categoria_modulo_colageno_aminoacidos" class="form-check-label radio-green">Colágeno ou Aminoácidos</label>
                                            </div>
                                            <div class="form-check col-sm-12">
                                                <input id="m_categoria_modulo_carboidrato" disabled name="m_cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Carboidrato">
                                                <label for="m_categoria_modulo_carboidrato" class="form-check-label radio-green">Carboidrato</label>
                                            </div>
                                            <div class="form-check col-sm-12">
                                                <input id="m_categoria_modulo_lipideo" disabled name="m_cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Lipídeo">
                                                <label for="m_categoria_modulo_lipideo" class="form-check-label radio-green">Lipídeo</label>
                                            </div>
                                        </div>
                                        <div class="col-6 p-4">
                                            <div class="form-check col-sm-12">
                                                <input id="m_categoria_modulo_fibras" disabled name="m_cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Fibras">
                                                <label for="m_categoria_modulo_fibras" class="form-check-label radio-green">Fibras</label>
                                            </div>
                                            <div class="form-check col-sm-12">
                                                <input id="m_categoria_modulo_probioticos" disabled name="m_cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Probióticos">
                                                <label for="m_categoria_modulo_probioticos" class="form-check-label radio-green">Probióticos</label>
                                            </div>
                                            <div class="form-check col-sm-12">
                                                <input id="m_categoria_modulo_simbioticos" disabled name="m_cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Simbióticos">
                                                <label for="m_categoria_modulo_simbioticos" class="form-check-label radio-green">Simbióticos</label>
                                            </div>
                                            <div class="form-check col-sm-12">
                                                <input id="m_categoria_modulo_espessante" disabled name="m_cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Espessante">
                                                <label for="m_categoria_modulo_espessante" class="form-check-label radio-green">Espessante</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form_blue">
                                <?php
                                $item_dados =  $html->addCol(
                                                array(
                                                    "dleft" => array(
                                                        "class" => "mb-0",
                                                        "col" => 8,
                                                        "content" => $html->addRow(
                                                                array(
                                                                    "m_nome" => array(
                                                                        "col" => 8,
                                                                        "label" => "Nome do Produto:",
                                                                        "form-class" => "m_unidademedida none",
                                                                        "required" => "required",
                                                                        "readonly" => "readonly"
                                                                    ),
                                                                    "m_unidmedida" => array(
                                                                        "col" => 4,
                                                                        "label" => "Unidade de Medida:",
                                                                        "form-class" => "m_unidademedida none", 
                                                                        "radiobutton" => array(
                                                                            "gramas" => "Gramas",
                                                                            "ml" => "ML",
                                                                        ),
                                                                        "disabled" => "disabled"
                                                                    )
                                                                )
                                                            ).
                                                            $html->addRow(
                                                                array(
                                                                    "m_nome" => array(
                                                                        "col" => 12,
                                                                        "label" => "Nome do Produto:",
                                                                        "form-class" => "m_nounidademedida",
                                                                        "required" => "required"
                                                                    )
                                                                )
                                                            ).
                                                            $html->addRow(
                                                                array(
                                                                    "contapres" => array(
                                                                        "class" => "mb-0",
                                                                        "type" => "div",
                                                                        "col" => 12,
                                                                        "content" => '
                                                                            <div class="row">
                                                                                <div class="col-md-12 pl-4 pr-4">
                                                                                    <div class="default-tab bordered-tab apresentacao">
                                                                                        <ul id="m_tab-apresentacao" class="nav nav-tabs" role="tablist">
                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link active" data-toggle="tab" href="#m_apresentacao1">Apresentação 1</a>
                                                                                            </li>
                                                                                            
                                                                                            <li class="nav-item ml-auto" id="m_li-nova-apresentacao">
                                                                                            </li>
                                                                                        </ul>

                                                                                        <div class="tab-content tab-content-default">
                                                                                            <div class="tab-pane pt-2 pb-2 fade show active" id="m_apresentacao1" role="tabpanel">
                                                                                                '.$html->addRow(
                                                                                                    array(
                                                                                                        "m_apresentacao[]" => array(
                                                                                                            "col" => 4,
                                                                                                            "class" => "campos_limpar",
                                                                                                            "label" => "Apresentação:"
                                                                                                        ),
                                                                                                        "m_volume_medida[]" => array(
                                                                                                            "col" => 4,
                                                                                                            "class" => "campos_limpar",
                                                                                                            "label" => "Volume da Medida:"
                                                                                                        ),
                                                                                                        "m_volume[]" => array(
                                                                                                            "col" => 4,
                                                                                                            "class" => "campos_limpar",
                                                                                                            "label" => "Volume Total:"
                                                                                                        )
                                                                                                    )
                                                                                                )                                                                                            
                                                                                                .'
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>'
                                                                    ),
                                                                    "m_fabricante" => array(
                                                                        "col" => 12,
                                                                        "label" => "Fabricante:",
                                                                        "readonly" => "readonly"
                                                                    )
                                                                )
                                                            )
                                                    ),
                                                    "dright" => array(
                                                        "class" => "mb-0 equal-cols",
                                                        "col" => 4,                                                  
                                                        "content" => $html->addRow(
                                                            array(
                                                                "m_foto" => array(
                                                                    "col" => 12,
                                                                    "type" => "div",
                                                                    "label" => "Anexar Imagem:",
                                                                    "content" =>    '<label class="btn" id="m_anexar_foto" style="height: 90%; width: 100%; background-image: url(assets/images/image-upload.png); background-size: cover; background-position: center center; background-repeat: no-repeat; ">
                                                                                        <input type="file" name="foto" id="foto" style="display: none;">
                                                                                    </label>'
                                                                )
                                                            ),
                                                            null,
                                                            "style='height: 100%'"
                                                        )
                                                    )
                                                )
                                            );
                                echo $item_dados;
                                ?>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="default-tab bordered-tab densidades">
                                            <ul id="m_tab-densidades" class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#m_densidades1">Densidade Calórica 1</a>
                                                </li>
                                                
                                                <li class="nav-item hide" id="m_li-nova-densidades">
                                                </li>
                                            </ul>

                                            <div class="tab-content tab-content-default">

                                                <div class="tab-pane pt-2 pb-2 fade show active" id="m_densidades1" role="tabpanel">
                                                    <?php
                                                    $item_dados =  $html->addRow(
                                                                    array(
                                                                        "m_dosagem" => array(
                                                                            "form-class" => "mb-0 plr12 plborder",
                                                                            "class" => "mt-3 mb-3 label-3",
                                                                            "label" => "Dosagem",
                                                                            "col" => 7,
                                                                            "type" => "div",
                                                                            "content" => $html->addRow(
                                                                                    array(
                                                                                        "m_medida[]" => array(
                                                                                            "form-class"=> "pl-3 pr-1",
                                                                                            "class" => "campos_limpar",
                                                                                            "col" => 3,
                                                                                            "label" => "Medida:",
                                                                                            "readonly" => "readonly"
                                                                                        ),
                                                                                        "m_unidade[]" => array(
                                                                                            "col" => 6,
                                                                                            "form-class"=> "pl-1 pr-1",
                                                                                            "label" => "Unidade:",
                                                                                            "readonly" => "readonly"
                                                                                        ),
                                                                                        "m_medida_g[]" => array(
                                                                                            "col" => 3,
                                                                                            "form-class"=> "medida_g pl-1 pr-3",
                                                                                            "class" => "campos_limpar",
                                                                                            "label" => "Grama:",
                                                                                            "readonly" => "readonly"
                                                                                        )
                                                                                    )
                                                                            )
                                                                        ),
                                                                        "m_medida_densidade" => array(
                                                                            "form-class" => "mb-0  plr12 plborder",
                                                                            "class" => "mt-3 mb-4 label-3 ",
                                                                            "label" => "Densidade Calórica:",
                                                                            "col" => 2,
                                                                            "type" => "div",
                                                                            "content" => $html->addRow(
                                                                                    array(
                                                                                        "m_medida_dc[]" => array(
                                                                                            "col" => 12,
                                                                                            "form-class" => "medida_dc",
                                                                                            "class" => "campos_limpar",
                                                                                            "label" => "",
                                                                                            "readonly" => "readonly"
                                                                                        )
                                                                                    )
                                                                            )
                                                                        ),

                                                                        "m_volume_agua" => array(
                                                                            "form-class" => "mb-0 plr12 plborder",
                                                                            "class" => "mt-3 mb-3 label-3",
                                                                            "label" => "Volume de Água",
                                                                            "col" => 3,
                                                                            "type" => "div",
                                                                            "content" => "<table>
                                                                                            <tr>
                                                                                                <td class='pr-2' style='width: 20%;'>".
                                                                                                    $html->addRow(
                                                                                                        array(
                                                                                                            "m_diluicao[]" => array(
                                                                                                                "form-class"=> "pr-4",
                                                                                                                "col" => 12,
                                                                                                                "class" => "campos_limpar",
                                                                                                                "label" => "Diluição:"
                                                                                                            )
                                                                                                        )
                                                                                                    )."
                                                                                                </td>
                                                                                                <td class='pr-2' style='width: 20%;'>".
                                                                                                    $html->addRow(
                                                                                                        array(
                                                                                                            "m_final[]" => array(
                                                                                                                "form-class"=> "pr-4",
                                                                                                                "col" => 12,
                                                                                                                "class" => "campos_limpar",
                                                                                                                "label" => "Final:"
                                                                                                            )
                                                                                                        )
                                                                                                    )."
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>"
                                                                        )
                                                                    )
                                                                );
                                                    echo $item_dados;
                                                    ?>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <?php
                                $item_dados =  $html->addRow(
                                                array(
                                                    "m_div_indicacao" => array(
                                                        "form-class" => "mb-1 Pplr12",
                                                        "col" => 6,
                                                        "type" => "div",
                                                        "content" => $html->addRow(
                                                                array(
                                                                    "m_indicacao" => array(
                                                                        "form-class" => "pt-4",
                                                                        "col" => 12,
                                                                        "label" => "Indicação:",
                                                                        "textarea" => "height:100%;",
                                                                        "readonly" => "readonly"
                                                                    ),
                                                                    "m_descricao" => array(
                                                                        "form-class" => "pt-4",
                                                                        "col" => 12,
                                                                        "label" => "Descrição:",
                                                                        "textarea" => "height:100%;",
                                                                        "readonly" => "readonly"
                                                                    ),
                                                                    "m_sabores" => array(
                                                                        "form-class" => "pt-4",
                                                                        "col" => 12,
                                                                        "label" => "Sabores:",
                                                                        "textarea" => "height:100%;",
                                                                        "readonly" => "readonly"
                                                                    ),
                                                                    "m_preparo" => array(
                                                                        "form-class" => "pt-4",
                                                                        "col" => 12,
                                                                        "label" => "Preparo:",
                                                                        "textarea" => "height:100%;",
                                                                        "readonly" => "readonly"
                                                                    ),
                                                                    "m_observacoes" => array(
                                                                        "form-class" => "pt-4",
                                                                        "col" => 12,
                                                                        "label" => "Observações:",
                                                                        "textarea" => "height:100%;",
                                                                        "readonly" => "readonly"
                                                                    )
                                                                )
                                                        )
                                                    ),
                                                    "composicao_qtd" => array(
                                                        "col" => 6,
                                                        "type" => "div",
                                                        "content" => $html->addRow(
                                                                     array(
                                                                        "quantidade" => array(
                                                                            "form-class" => "mb-0 plr12 plborder2",
                                                                            "class" => "mt-4 mb-2 Tlabel-3 dosagem_quantidade",
                                                                            "label" => "Quantidade por 100g",
                                                                            "col" => 12,
                                                                            "type" => "div",
                                                                            "content" => "<div class='row'><div class='col-md-12 pl-4 pr-4'>
                                                                                        <table class='produto_qtd'>
                                                                                            <tr>
                                                                                                <td class='pr-2' style='width: 20%;'>".
                                                                                                    $html->addRow(
                                                                                                        array(
                                                                                                            "m_kcal" => array(
                                                                                                                "form-class"=> "pr-4 mb-0",
                                                                                                                "col" => 12,
                                                                                                                "class" => "campos_limpar",
                                                                                                                "label" => "KCAL:"
                                                                                                            )
                                                                                                        )
                                                                                                    )."
                                                                                                </td>
                                                                                                <td class='pr-2' style='width: 20%;'>".
                                                                                                    $html->addRow(
                                                                                                        array(
                                                                                                            "m_cho" => array(
                                                                                                                "form-class"=> "pr-4 mb-0",
                                                                                                                "col" => 12,
                                                                                                                "class" => "campos_limpar",
                                                                                                                "label" => "CHO:"
                                                                                                            )
                                                                                                        )
                                                                                                    )."
                                                                                                </td>
                                                                                                <td class='pr-2' style='width: 20%;'>".
                                                                                                    $html->addRow(
                                                                                                        array(
                                                                                                            "m_ptn" => array(
                                                                                                                "form-class"=> "pr-4 mb-0",
                                                                                                                "col" => 12,
                                                                                                                "class" => "campos_limpar",
                                                                                                                "label" => "PTN:"
                                                                                                            )
                                                                                                        )
                                                                                                    )."
                                                                                                </td>
                                                                                                <td class='pr-2' style='width: 20%;'>".
                                                                                                    $html->addRow(
                                                                                                        array(
                                                                                                            "m_lip" => array(
                                                                                                                "form-class"=> "pr-4 mb-0",
                                                                                                                "col" => 12,
                                                                                                                "class" => "campos_limpar",
                                                                                                                "label" => "LIP:"
                                                                                                            )
                                                                                                        )
                                                                                                    )."
                                                                                                </td>
                                                                                                <td style='width: 20%;'>".
                                                                                                    $html->addRow(
                                                                                                        array(
                                                                                                            "m_fibras" => array(
                                                                                                                "form-class"=> "mb-0",
                                                                                                                "col" => 12,
                                                                                                                "class" => "campos_limpar",
                                                                                                                "label" => "FIBRAS:"
                                                                                                            )
                                                                                                        )
                                                                                                    )."
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table></div></div>"
                                                                        ),
                                                                        "composicao_nutricional" => array(
                                                                            "col" => 12,
                                                                            "label" => "Composição Nutricional:",
                                                                            "form-class" => "pt-4 mb-0",
                                                                            "type" => "div",
                                                                            "content" =>'<div class="entric_composicao entric_compo p-2" style="background-color: #ffffff;">
                                                                                            <table class="table table-bordered table-hover">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>Densidade Calórica</td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <input type="text" placeholder="" readonly="readonly" name="m_compo_Densidade Calórica" class="form-control text-center info_nutri">
                                                                                                                <div class="input-group-append">
                                                                                                                    <span class="input-group-text">Kcal/ml </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Proteínas</td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <input type="text" placeholder="" readonly="readonly" name="m_compo_Proteínas" class="form-control text-center info_nutri">
                                                                                                                <div class="input-group-append">
                                                                                                                    <span class="input-group-text">%</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Carboidratos </td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <input type="text" placeholder="" readonly="readonly" name="m_compo_Carboidratos" class="form-control text-center info_nutri">
                                                                                                                <div class="input-group-append">
                                                                                                                    <span class="input-group-text">%</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Lipídios  </td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <input type="text" placeholder="" readonly="readonly" name="m_compo_Lipídios" class="form-control text-center info_nutri">
                                                                                                                <div class="input-group-append">
                                                                                                                    <span class="input-group-text">%</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Fonte de Proteínas  </td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <textarea style="height: 20px;" readonly="readonly" class="form-control info_nutri resize-ta" name="m_compo_Fonte de Proteínas"></textarea>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Fonte de Carboidratos</td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <textarea style="height: 20px;" readonly="readonly" class="form-control info_nutri resize-ta" name="m_compo_Fonte de Carboidratos" ></textarea>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Fonte de Lipídios</td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <textarea style="height: 20px;" readonly="readonly" class="form-control info_nutri resize-ta" name="m_compo_Fonte de Lipídios" ></textarea>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Fonte de Fibras </td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <textarea style="height: 20px;" readonly="readonly" class="form-control info_nutri resize-ta" name="m_compo_Fonte de Fibras" ></textarea>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Mix de fibras / Solúveis / Insolúveis </td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <textarea style="height: 20px;" readonly="readonly" class="form-control info_nutri resize-ta" name="m_compo_Mix de fibras / Solúveis / Insolúveis" ></textarea>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Relação w6:w3</td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <input type="text" placeholder="" readonly="readonly" name="m_compo_Relação w6:w3" class="form-control text-center info_nutri">
                                                                                                                <div class="input-group-append">
                                                                                                                    <span class="input-group-text">:</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Relação kcal não proteica/gN</td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <input type="text" placeholder="" readonly="readonly" name="m_compo_Relação kcal não proteica/gN" class="form-control text-center info_nutri">
                                                                                                                <div class="input-group-append">
                                                                                                                    <span class="input-group-text">:</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Osmolaridade</td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <input type="text" placeholder="" readonly="readonly" name="m_compo_Osmolaridade" class="form-control text-center info_nutri">
                                                                                                                <div class="input-group-append">
                                                                                                                    <span class="input-group-text">(mOsm/L)</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Osmolalidade</td>
                                                                                                        <td>
                                                                                                            <div class="form-group input-group mb-0"> 
                                                                                                                <input type="text" placeholder="" readonly="readonly" name="m_compo_OsmolaridadeAgua" class="form-control text-center info_nutri">
                                                                                                                <div class="input-group-append">
                                                                                                                    <span class="input-group-text">(mOsm/kg de água)</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>'
                                                                        )
                                                                    )
                                                        )
                                                    )
                                                )
                                            );
                                echo $item_dados;
                                ?>
                            </div>
                        </div>

                        <div class="col-sm-4 entric_composicao pt-2">
                            <h4 class="card-title bb-line2 mb-4 entric_comptitulo">
                                Informações Nutricionais (100ml)
                            </h4>
                            <?php
                            $informacoes = array();
                            $informacoes[] = "Valor Energético";
                            $informacoes[] = "Carboidrato (g)";
                            $informacoes[] = "Proteína (g)";
                            $informacoes[] = "Gorduras Totais";
                            $informacoes[] = "Gorduras Saturadas";
                            $informacoes[] = "Gorduras Monoinsaturadas";
                            $informacoes[] = "Gorduras Poli-insaturadas";
                            $informacoes[] = "Gorduras Trans";
                            $informacoes[] = "Fibra Alimentar";
                            $informacoes[] = "Sódio (mg)|||mg";
                            $informacoes[] = "Potássio (mg)|||mg";
                            $informacoes[] = "Cloro / Cloreto (mg)|||mg";
                            $informacoes[] = "Cálcio (mg)|||mg";
                            $informacoes[] = "Fósforo (mg)|||mg";
                            $informacoes[] = "Magnésio (mg)|||mg";
                            $informacoes[] = "Ferro (mg)|||mg";
                            $informacoes[] = "Zinco (mg)|||mg";
                            $informacoes[] = "Cobre (mg)|||mcg";
                            $informacoes[] = "Manganês (mg)|||mg";
                            $informacoes[] = "Flúor (mg)|||mg";
                            $informacoes[] = "Molibdênio (mcg)|||mcg";
                            $informacoes[] = "Selênio (mcg)|||mcg";
                            $informacoes[] = "Cromo (mcg)|||mcg";
                            $informacoes[] = "Iodo (mcg)|||mcg";
                            $informacoes[] = "Vitamina A (mcg RE)|||mcg RE";
                            $informacoes[] = "Vitamina A (mcg)|||mcg";
                            $informacoes[] = "Carotenóides (mg)|||mg";
                            $informacoes[] = "Betacaroteno (mcg RE)|||mcg RE";
                            $informacoes[] = "Betacaroteno (mcg)|||mcg";
                            $informacoes[] = "Vitamina D (mcg)|||mcg";
                            $informacoes[] = "Vitamina E (mg a- TE)|||mg a- TE";
                            $informacoes[] = "Vitamina E (mg)|||mg";
                            $informacoes[] = "Vitamina K (mcg)|||mcg";
                            $informacoes[] = "Vitamina B1 (Tiamina) (mg)|||mg";
                            $informacoes[] = "Vitamina B2 (Riboflavina) (mg)|||mg";
                            $informacoes[] = "Niacina (mg – NE)|||mg – NE";
                            $informacoes[] = "Niacina (mg)|||mg";
                            $informacoes[] = "Ácido Pantotênico (mg)|||mg";
                            $informacoes[] = "Vitamina B6 (mg)|||mg";
                            $informacoes[] = "Ácico Fólico (mcg)|||mcg";
                            $informacoes[] = "Vitamina B12 (mcg)|||mcg";
                            $informacoes[] = "Biotina (mcg)|||mcg";
                            $informacoes[] = "Vitamina C (mg)|||mg";
                            $informacoes[] = "Colina (mg)|||mg";
                            $informacoes[] = "Taurina (mg)|||mg";
                            $informacoes[] = "Carnitina (mg)|||mg";
                            ?>
                            <table class="table table-bordered table-hover textareacentered" style="min-width: 400px;">
                                <tbody>
                                    <?php 
                                    $nutri_required = "";
                                    for($i = 0; $i < count($informacoes); $i++){
                                        $info = $informacoes[$i];
                                        $info = explode("|||", $info);
                                        $nome = "";
                                        $medida = "";
                                        if (count($info) > 1){
                                            $nome = $info[0];
                                            $medida = $info[1];
                                        }else{
                                            $nome = $info[0];
                                        }

                                        //if ($nome == "Sódio") $nutri_required = 'required="required"';
                                        ?>
                                        <tr>
                                            <td><?php echo $nome;?></td>
                                            <td>
                                                <?php 
                                                if ($medida == ""){
                                                ?>
                                                    <textarea readonly="readonly" <?php echo $nutri_required;?> style="height: 20px;" class="form-control info_nutri resize-ta" name="m_info_nutri_<?php echo $nome;?>"></textarea>
                                                <?php 
                                                }else{
                                                    ?>
                                                    <div class="form-group input-group mb-0"> 
                                                        <input readonly="readonly"  <?php echo $nutri_required;?>  type="text" placeholder="" name="m_info_nutri_<?php echo $nome;?>" class="form-control text-center info_nutri">
                                                    </div>
                                                    <?php 
                                                    /*
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><?php echo $medida;?></span>
                                                        </div>
                                                    */  
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="form-group row pt-0">
                                <div class="col-md-4 text-center">
                                </div>
                                <div class="col-md-4 text-center">
                                </div>
                                <div class="col-md-4 text-center">
                                    <button type="button" class="btn btn-warning btn-form" id="m_frm_btneditar" data-loading-text="<i class='fa fa-cog fa-spin'></i> Editar" data-loaded-text="Editar" style="width: 100%;">Editar</button>
                                </div>
                                <div class="col-md-12 text-center" id="m_micronutriente" style="display: none;">
                                    <div class="alert alert-warning mt-4" role="alert" style="font-size: 13px;">
                                        <i class="fa fa-warning"></i> Valor do micronutriente varia conforme o sabor do produto.
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>
                    <div class="row" id="div_data_edicao" style="display: none;">
                        <div class="col-sm-12 justify-content-center text-center pb-4">
                            <p></p>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>