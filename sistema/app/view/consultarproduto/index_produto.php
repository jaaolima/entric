<div class="tab-pane fade" id="tabproduto" role="tabpanel">
    <div class="pt-3">
             
        <div class="default-tab bordered-tab entric">
            <form role="form" id="frmproduto" name="frmproduto" onsubmit="return false" enctype="multipart/form-data">
                <input type="hidden" name="_idproduto" id="_idproduto" value="" />


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
                                                <input id="calculo_adulto" name="especialidade[]" class="form-check-input styled-checkbox" type="checkbox" value="Adulto">
                                                <label for="calculo_adulto" class="form-check-label check-green">Adulto</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-radio">
                                                <input id="calculo_pediatrico" name="especialidade[]" class="form-check-input styled-checkbox" type="checkbox" value="Pediátrico">
                                                <label for="calculo_pediatrico" class="form-check-label check-green">Pediátrico</label>
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
                                                <input id="calculo_via_enteral" checked class="radio-outlined" name="via" type="radio" value="Enteral">
                                                <label for="calculo_via_enteral" class="radio-green">Enteral</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-radio">
                                                <input id="calculo_via_oral" class="radio-outlined" name="via" type="radio" value="Suplemento">
                                                <label for="calculo_via_oral" class="radio-green">Suplemento</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-radio">
                                                <input id="calculo_via_modulo" class="radio-outlined" name="via" type="radio" value="Módulo">
                                                <label for="calculo_via_modulo" class="radio-green">Módulo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="apresentacao_enteral" class="row entric_grid mt-4 m-0 p-0">
                            <div class="form-group col-sm-3">
                                <div class="form-check">
                                    <label class="grid_label required">Apresentação <span>*</span></label>
                                </div>
                                <div class="row p-4">
                                    <div class="form-check col-sm-12">
                                        <input id="calculo_enteral_apres_fechado" required name="apres_enteral[]" class="form-check-input radio-outlined" type="radio" value="Fechado">
                                        <label for="calculo_enteral_apres_fechado" class="form-check-label radio-green">Fechado</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="calculo_enteral_apres_aberto_liquido" name="apres_enteral[]" class="form-check-input radio-outlined" type="radio" value="Aberto (Líquido)">
                                        <label for="calculo_enteral_apres_aberto_liquido" class="form-check-label radio-green">Aberto (Líquido)</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="calculo_enteral_apres_aberto_po" name="apres_enteral[]" class="form-check-input radio-outlined" type="radio" value="Aberto (Pó)">
                                        <label for="calculo_enteral_apres_aberto_po" class="form-check-label radio-green">Aberto (Pó)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-9">
                                <div class="form-check">
                                    <label class="grid_label required">Características <span>*</span></label>
                                </div>
                                <div class="row p-4">  

                                    <div class="form-check col-sm-4">
                                        <input id="calculo_enteral_carac_polimerico" required name="carac_enteral_merico[]" class="form-check-input radio-outlined" type="radio" value="Polimérico">
                                        <label for="calculo_enteral_carac_polimerico" class="form-check-label radio-green">Polimérico</label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input id="calculo_enteral_carac_comfibras" required name="carac_enteral_fibras[]" class="form-check-input radio-outlined" type="radio" value="Com Fibras">
                                        <label for="calculo_enteral_carac_comfibras" class="form-check-label radio-green">Com Fibras</label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input id="calculo_enteral_carac_semlactose" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Lactose">
                                        <label for="calculo_enteral_carac_semlactose" class="form-check-label check-green">Sem Lactose</label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input id="calculo_enteral_carac_oligomerico" name="carac_enteral_merico[]" class="form-check-input radio-outlined" type="radio" value="Oligomérico">
                                        <label for="calculo_enteral_carac_oligomerico" class="form-check-label radio-green">Oligomérico</label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input id="calculo_enteral_carac_semfibras" name="carac_enteral_fibras[]" class="form-check-input radio-outlined" type="radio" value="Sem Fibras">
                                        <label for="calculo_enteral_carac_semfibras" class="form-check-label radio-green">Sem Fibras</label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input id="calculo_enteral_100proteina" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="100% Proteína Vegetal">
                                        <label for="calculo_enteral_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                    </div>
                                    <div class="form-check col-sm-4">
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input id="calculo_enteral_carac_semsacarose" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Sacarose">
                                        <label for="calculo_enteral_carac_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                    </div>
                                    <div class="form-check col-sm-4">
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input id="calculo_produto_especializado" name="produto_especializado" class="form-check-input styled-checkbox" type="checkbox" value="S">
                                        <label for="calculo_produto_especializado" class="form-check-label check-green"> <img src="../../../public/assets/images/bandeira.png" alt=""> Produto Especializado</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="apresentacao_oral" class="row entric_grid mt-4 m-0 p-0 none">
                            <div class="form-group col-sm-3">
                                <div class="form-check">
                                    <label class="grid_label required">Apresentação <span>*</span></label>
                                </div>
                                <div class="row p-4">
                                    <div class="form-check col-sm-12">
                                        <input id="calculo_enteral_apres_liquido" required name="apres_oral[]" class="form-check-input radio-outlined" type="radio" value="Líquido / Creme">
                                        <label for="calculo_enteral_apres_liquido" class="form-check-label radio-green">Líquido / Creme</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="calculo_enteral_apres_po" name="apres_oral[]" class="form-check-input radio-outlined" type="radio" value="Pó">
                                        <label for="calculo_enteral_apres_po" class="form-check-label radio-green">Pó</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-9">
                                <div class="form-check">
                                    <label class="grid_label required">Características <span>*</span></label>
                                </div>
                                <div class="row p-4"> 
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input id="calculo_oral_carac_semsacarose" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Sacarose">
                                            <label for="calculo_oral_carac_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="calculo_oral_carac_semlactose" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Lactose">
                                            <label for="calculo_oral_carac_semlactose" class="form-check-label check-green">Sem Lactose</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="calculo_oral_100proteina" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="100% Proteína Vegetal">
                                            <label for="calculo_oral_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="calculo_oral_cicatrizacao" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Cicatrização">
                                            <label for="calculo_oral_cicatrizacao" class="form-check-label check-green">Cicatrização</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="calculo_oral_omega3" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Com Ômega 3">
                                            <label for="calculo_oral_omega3" class="form-check-label check-green">Com Ômega 3</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="calculo_oral_imunonutricaocirurgica" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Imunonutrição cirúrgica">
                                            <label for="calculo_oral_imunonutricaocirurgica" class="form-check-label check-green">Imunonutrição cirúrgica</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input id="calculo_oral_carac_comfibras" name="carac_oral_fibras[]" class="form-check-input radio-outlined" type="radio" value="Com Fibras">
                                            <label for="calculo_oral_carac_comfibras" class="form-check-label radio-green">Com Fibras</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="calculo_oral_carac_semfibras" name="carac_oral_fibras[]" class="form-check-input radio-outlined" type="radio" value="Sem Fibras">
                                            <label for="calculo_oral_carac_semfibras" class="form-check-label radio-green">Sem Fibras</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="apresentacao_modulo" class="row entric_grid mt-4 m-0 p-0 none"> 
                            <div class="form-group col-12">
                                <div class="form-check">
                                    <label class="grid_label required">Categoria <span>*</span></label>
                                </div>
                                <div class="row">
                                    <div class="col-6 p-4">
                                        <div class="form-check col-sm-12">
                                            <input id="categoria_modulo_proteina" required name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Proteína">
                                            <label for="categoria_modulo_proteina" class="form-check-label check-green">Proteína</label>
                                        </div>
                                        <div class="form-check col-sm-12">
                                            <input id="categoria_modulo_colageno_aminoacidos" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Colágeno ou Aminoácidos">
                                            <label for="categoria_modulo_colageno_aminoacidos" class="form-check-label check-green">Colágeno ou Aminoácidos</label>
                                        </div>
                                        <div class="form-check col-sm-12"> 
                                            <input id="categoria_modulo_carboidrato" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Carboidrato">
                                            <label for="categoria_modulo_carboidrato" class="form-check-label check-green">Carboidrato</label>
                                        </div>
                                        <div class="form-check col-sm-12">
                                            <input id="categoria_modulo_lipideo" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Lipídeo">
                                            <label for="categoria_modulo_lipideo" class="form-check-label check-green">Lipídeo</label>
                                        </div>
                                    </div>
                                    <div class="col-6 p-4">
                                        <div class="form-check col-sm-12">
                                            <input id="categoria_modulo_fibras" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Fibras">
                                            <label for="categoria_modulo_fibras" class="form-check-label check-green">Fibras</label>
                                        </div>
                                        <div class="form-check col-sm-12">
                                            <input id="categoria_modulo_probioticos" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Probióticos">
                                            <label for="categoria_modulo_probioticos" class="form-check-label check-green">Probióticos</label>
                                        </div>
                                        <div class="form-check col-sm-12">
                                            <input id="categoria_modulo_simbioticos" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Simbióticos">
                                            <label for="categoria_modulo_simbioticos" class="form-check-label check-green">Simbióticos</label>
                                        </div>
                                        <div class="form-check col-sm-12">
                                            <input id="categoria_modulo_espessante" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Espessante">
                                            <label for="categoria_modulo_espessante" class="form-check-label check-green">Espessante</label>
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
                                                    "content" => 
                                                        $html->addRow(
                                                            array(
                                                                "nome" => array(
                                                                    "col" => 8,
                                                                    "label" => "Nome do Produto <span>*</span> :",
                                                                    "form-class" => "required",
                                                                    "required" => "required"
                                                                ),
                                                                "unidmedida" => array(
                                                                    "col" => 4,
                                                                    "label" => "Unidade de Medida:",
                                                                    "form-class" => "unidademedida none",
                                                                    "radiobutton" => array(
                                                                        "gramas" => "Gramas",
                                                                        "ml" => "ML",
                                                                    ),
                                                                    "checked" => "gramas"
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
                                                                                    <ul id="tab-apresentacao" class="nav nav-tabs" role="tablist">
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link active" data-toggle="tab" href="#apresentacao1">Apresentação 1</a>
                                                                                        </li>
                                                                                        
                                                                                        <li class="nav-item ml-auto" id="li-nova-apresentacao">
                                                                                            <button type="button" class="btn btn-secondary ml-2 nova-apresentacao"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nova Apresentação</button>
                                                                                        </li>
                                                                                    </ul>

                                                                                    <div class="tab-content tab-content-default">
                                                                                        <div class="tab-pane pt-2 pb-2 fade show active" id="apresentacao1" role="tabpanel">
                                                                                            '.$html->addRow(
                                                                                                array(
                                                                                                    "apresentacao[]" => array(
                                                                                                        "col" => 4,
                                                                                                        "class" => "campos_limpar",
                                                                                                        "label" => "Apresentação:"
                                                                                                    ),
                                                                                                    "volume_medida[]" => array(
                                                                                                        "col" => 4,
                                                                                                        "class" => "campos_limpar numcomma volmedida",
                                                                                                        "input-group-append" => "ml",
                                                                                                        "label" => "Volume da Medida:"
                                                                                                    ),
                                                                                                    "volume[]" => array(
                                                                                                        "col" => 4,
                                                                                                        "class" => "campos_limpar numcomma volmedida",
                                                                                                        "input-group-append" => "ml",
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
                                                                "fabricante" => array(
                                                                    "col" => 12,
                                                                    "label" => "<a href='javascript:modalFabricantes();' class='pull-right' style='padding: 0 0.3rem !important;'><i class='fa fa-table' aria-hidden='true'></i></a> Fabricante:",
                                                                    "label-style" => "width: 100%;",
                                                                    "class" => "select-tag",
                                                                    "select" => $fornecedores
                                                                )
                                                            )
                                                        )
                                                ),
                                                "dright" => array(
                                                    "class" => "mb-0 equal-cols",
                                                    "col" => 4,
                                                    "content" => $html->addRow(
                                                        array(
                                                            "foto" => array(
                                                                "col" => 12,
                                                                "type" => "div",
                                                                "label" => "Anexar Imagem:",
                                                                "content" =>    '
                                                                                <button class="btn btn-danger btn-sm rounded-bottom pull-right" type="button" onclick="fcRemoverFoto();" style="padding: .17rem 1rem !important;"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>

                                                                                <label class="btn" id="anexar_foto" style="height: 90%; width: 100%; background-image: url(assets/images/image-upload.png); background-size: cover; background-position: center center; background-repeat: no-repeat; ">
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
                                        <ul id="tab-densidades" class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#densidades1">Densidade Calórica 1</a>
                                            </li>
                                            
                                            <li class="nav-item ml-auto" id="li-nova-densidades">
                                                <button type="button" class="btn btn-secondary ml-2 nova-densidades"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nova Densidade Calórica</button>
                                            </li>
                                        </ul>

                                        <div class="tab-content tab-content-default">

                                            <div class="tab-pane pt-2 pb-2 fade show active" id="densidades1" role="tabpanel">
                                                <?php
                                                $item_dados =  $html->addRow(
                                                                array(
                                                                    "dosagem" => array(
                                                                        "form-class" => "mb-0 plr12 plborder",
                                                                        "class" => "mt-3 mb-3 label-3",
                                                                        "label" => "Dosagem",
                                                                        "col" => 7,
                                                                        "type" => "div",
                                                                        "content" => $html->addRow(
                                                                                array(
                                                                                    "medida[]" => array(
                                                                                        "form-class"=> "pl-3 pr-1",
                                                                                        "class" => "campos_limpar",
                                                                                        "col" => 3,
                                                                                        "label" => "Medida:"
                                                                                    ),
                                                                                    "unidade[]" => array(
                                                                                        "col" => 6,
                                                                                        "form-class"=> "unidade pl-1 pr-1",
                                                                                        "class" => "select-tag",
                                                                                        "label" => "<a href='javascript:modalUnidades();' class='pull-right' style='padding: 0 0.3rem !important;'><i class='fa fa-table' aria-hidden='true'></i></a> Unidade:",
                                                                                        "label-style" => "width: 100%;",
                                                                                        "id" => true,
                                                                                        "select" => $unidades
                                                                                    ),
                                                                                    "medida_g[]" => array(
                                                                                        "col" => 3,
                                                                                        "form-class"=> "medida_g pl-1 pr-3",
                                                                                        "class" => "campos_limpar",
                                                                                        "label" => "Grama:"
                                                                                    )
                                                                                )
                                                                        )
                                                                    ),
                                                                    "medida_densidade" => array(
                                                                        "form-class" => "mb-0  plr12 plborder",
                                                                        "class" => "mt-3 mb-4 label-3 ",
                                                                        "label" => "Densidade<br> Calórica:",
                                                                        "col" => 2,
                                                                        "type" => "div",
                                                                        "content" => $html->addRow(
                                                                                array(
                                                                                    "medida_dc[]" => array(
                                                                                        "col" => 12,
                                                                                        "form-class" => "medida_dc",
                                                                                        "class" => "campos_limpar",
                                                                                        "label" => ""
                                                                                    )
                                                                                )
                                                                        )
                                                                    ),

                                                                    "volume_agua" => array(
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
                                                                                                        "diluicao[]" => array(
                                                                                                            "form-class"=> "pr-4",
                                                                                                            "col" => 12,
                                                                                                            "class" => "campos_limpar numcomma",
                                                                                                            "label" => "Diluição (ml):"
                                                                                                        )
                                                                                                    )
                                                                                                )."
                                                                                            </td>
                                                                                            <td class='pr-2' style='width: 20%;'>".
                                                                                                $html->addRow(
                                                                                                    array(
                                                                                                        "final[]" => array(
                                                                                                            "form-class"=> "pr-4",
                                                                                                            "col" => 12,
                                                                                                            "class" => "campos_limpar numcomma",
                                                                                                            "label" => "Final (ml):"
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
                                                "div_indicacao" => array(
                                                    "form-class" => "mb-1 Pplr12",
                                                    "col" => 6,
                                                    "type" => "div",
                                                    "content" => $html->addRow(
                                                            array(
                                                                "indicacao" => array(
                                                                    "form-class" => "pt-4",
                                                                    "col" => 12,
                                                                    "label" => "Indicação:",
                                                                    "textarea" => "height:100%;"
                                                                ),
                                                                "descricao" => array(
                                                                    "form-class" => "pt-4",
                                                                    "col" => 12,
                                                                    "label" => "Descrição:",
                                                                    "textarea" => "height:100%;"
                                                                ),
                                                                "sabores" => array(
                                                                    "form-class" => "pt-4",
                                                                    "col" => 12,
                                                                    "label" => "Sabores:",
                                                                    "textarea" => "height:100%;"
                                                                ),
                                                                "preparo" => array(
                                                                    "form-class" => "pt-4",
                                                                    "col" => 12,
                                                                    "label" => "Preparo:",
                                                                    "textarea" => "height:100%;"
                                                                ),
                                                                "observacoes" => array(
                                                                    "form-class" => "pt-4",
                                                                    "col" => 12,
                                                                    "label" => "Observações:",
                                                                    "textarea" => "height:100%;"
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
                                                                        "content" => "<div class='row'><div class='col-md-12 pl-4 pr-4'><table class='produto_qtd'>
                                                                                        <tr>
                                                                                            <td class='pr-2' style='width: 20%;'>".
                                                                                                $html->addRow(
                                                                                                    array(
                                                                                                        "kcal" => array(
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
                                                                                                        "cho" => array(
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
                                                                                                        "ptn" => array(
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
                                                                                                        "lip" => array(
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
                                                                                                        "fibras" => array(
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
                                                                        "content" =>    '<div class="entric_composicao entric_compo p-2" style="background-color: #ffffff;">
                                                                                        <table class="table table-bordered table-hover">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>Densidade Calórica</td>
                                                                                                    <td>
                                                                                                        <div class="form-group input-group mb-0"> 
                                                                                                            <input type="text" placeholder="" name="compo_Densidade Calórica" class="form-control text-center info_nutri">
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
                                                                                                            <input type="text" placeholder="" name="compo_Proteínas" class="form-control text-center info_nutri">
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
                                                                                                            <input type="text" placeholder="" name="compo_Carboidratos" class="form-control text-center info_nutri">
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
                                                                                                            <input type="text" placeholder="" name="compo_Lipídios" class="form-control text-center info_nutri">
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
                                                                                                            <textarea style="height: 20px;" class="form-control info_nutri resize-ta" name="compo_Fonte de Proteínas"></textarea>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Fonte de Carboidratos</td>
                                                                                                    <td>
                                                                                                        <div class="form-group input-group mb-0"> 
                                                                                                            <textarea style="height: 20px;" class="form-control info_nutri resize-ta" name="compo_Fonte de Carboidratos" ></textarea>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Fonte de Lipídios</td>
                                                                                                    <td>
                                                                                                        <div class="form-group input-group mb-0"> 
                                                                                                            <textarea style="height: 20px;" class="form-control info_nutri resize-ta" name="compo_Fonte de Lipídios" ></textarea>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Fonte de Fibras </td>
                                                                                                    <td>
                                                                                                        <div class="form-group input-group mb-0"> 
                                                                                                            <textarea style="height: 20px;" class="form-control info_nutri resize-ta" name="compo_Fonte de Fibras" ></textarea>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Mix de fibras / Solúveis / Insolúveis </td>
                                                                                                    <td>
                                                                                                        <div class="form-group input-group mb-0"> 
                                                                                                            <textarea style="height: 20px;" class="form-control info_nutri resize-ta" name="compo_Mix de fibras / Solúveis / Insolúveis" ></textarea>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Relação w6:w3</td>
                                                                                                    <td>
                                                                                                        <div class="form-group input-group mb-0"> 
                                                                                                            <input type="text" placeholder="" name="compo_Relação w6:w3" class="form-control text-center info_nutri">
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
                                                                                                            <input type="text" placeholder="" name="compo_Relação kcal não proteica/gN" class="form-control text-center info_nutri">
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
                                                                                                            <input type="text" placeholder="" name="compo_Osmolaridade" class="form-control text-center info_nutri">
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
                                                                                                            <input type="text" placeholder="" name="compo_OsmolaridadeAgua" class="form-control text-center info_nutri">
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
                                                <textarea <?php echo $nutri_required;?> style="height: 20px;" class="form-control info_nutri resize-ta" name="info_nutri_<?php echo $nome;?>"></textarea>
                                            <?php 
                                            }else{
                                                ?>
                                                <div class="form-group input-group mb-0"> 
                                                    <input  <?php echo $nutri_required;?>  type="text" placeholder="" name="info_nutri_<?php echo $nome;?>" class="form-control text-center info_nutri">                                                    
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
                            <div class="col-md-12 text-center">
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-danger btn-form" style="width: 100%;" onclick="fcExcluirCadastro();">Excluir</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary btn-form" style="width: 100%;" onclick="window.location.reload();">Cancelar</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-warning btn-form" id="frm_btnsalvar" data-loading-text="<i class='fa fa-cog fa-spin'></i> Salvar" data-loaded-text="Salvar" style="width: 100%;">Salvar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center" id="micronutriente" style="display: none;">
                                <div class="alert alert-warning mt-4" role="alert" style="font-size: 13px;">
                                    <i class="fa fa-warning"></i> Valor do micronutriente varia conforme o sabor do produto.
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </form>
        </div>

    </div>
</div>