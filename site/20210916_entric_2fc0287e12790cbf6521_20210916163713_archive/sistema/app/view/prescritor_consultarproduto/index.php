<div id="main-wrapper">

    <?php require_once (ROOT . DS . 'app'. DS . 'view' . DS . 'header-top.php'); ?>

    <div class="nk-sidebar">
        <div class="nk-nav-scroll">

            <?php require_once (ROOT . DS . 'app'. DS . 'view' . DS . 'menu.php'); ?>

        </div>
    </div>


    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Início</a></li>
                        <li class="breadcrumb-item active"><a href="prescritor_consultarproduto">Consultar Produto</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title bb-line mb-5">
                                <i class="mdi mdi-pill"></i> &nbsp; Consultar Produto
                            </h4>
                            
                            <div class="default-tab bordered-tab entric">
                                <form role="form" id="frmproduto" name="frmproduto" onsubmit="return false">
                                    <input type="hidden" name="_idproduto" id="_idproduto" value="" />
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <div class="form-radio entric_radio">
                                                        <input id="calculo_adulto" checked class="radio-outlined" name="especialidade" type="radio" value="Adulto">
                                                        <label for="calculo_adulto" class="radio-green">Adulto</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="form-radio entric_radio">
                                                        <input id="calculo_pediatrico" class="radio-outlined" name="especialidade" type="radio" value="Pediátrico">
                                                        <label for="calculo_pediatrico" class="radio-green">Pediátrico</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="form-radio entric_radio">
                                                        <input id="calculo_via_enteral" checked class="radio-outlined" name="via" type="radio" value="Enteral">
                                                        <label for="calculo_via_enteral" class="radio-green">Enteral</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="form-radio entric_radio">
                                                        <input id="calculo_via_oral" class="radio-outlined" name="via" type="radio" value="Oral">
                                                        <label for="calculo_via_oral" class="radio-green">Oral</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="form-radio entric_radio">
                                                        <input id="calculo_via_modulo" class="radio-outlined" name="via" type="radio" value="Módulo">
                                                        <label for="calculo_via_modulo" class="radio-green">Módulo</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="apresentacao_enteral" class="row entric_grid mt-4 m-0 p-0">
                                                <div class="form-group col-sm-3">
                                                    <div class="form-check">
                                                        <label class="grid_label">Apresentação</label>
                                                    </div>
                                                    <div class="row p-4">
                                                        <div class="form-check col-sm-12">
                                                            <input id="calculo_enteral_apres_fechado" name="apres_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Fechado">
                                                            <label for="calculo_enteral_apres_fechado" class="form-check-label check-green">Fechado</label>
                                                        </div>
                                                        <div class="form-check col-sm-12">
                                                            <input id="calculo_enteral_apres_aberto_liquido" name="apres_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Aberto (Líquido)">
                                                            <label for="calculo_enteral_apres_aberto_liquido" class="form-check-label check-green">Aberto (Líquido)</label>
                                                        </div>
                                                        <div class="form-check col-sm-12">
                                                            <input id="calculo_enteral_apres_aberto_po" name="apres_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Aberto (Pó)">
                                                            <label for="calculo_enteral_apres_aberto_po" class="form-check-label check-green">Aberto (Pó)</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-9">
                                                    <div class="form-check">
                                                        <label class="grid_label">Características</label>
                                                    </div>
                                                    <div class="row p-4"> 
                                                        <div class="form-check col-sm-4">
                                                            <input id="calculo_enteral_carac_polimerico" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Polimérico">
                                                            <label for="calculo_enteral_carac_polimerico" class="form-check-label check-green">Polimérico</label>
                                                        </div>
                                                        <div class="form-check col-sm-4">
                                                            <input id="calculo_enteral_carac_semsacarose" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Sacarose">
                                                            <label for="calculo_enteral_carac_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                                                        </div>
                                                        <div class="form-check col-sm-4">
                                                            <input id="calculo_enteral_100proteina" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="100% Proteína Vegetal">
                                                            <label for="calculo_enteral_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                                                        </div>
                                                        <div class="form-check col-sm-4">
                                                            <input id="calculo_enteral_carac_oligomerico" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Oligomérico">
                                                            <label for="calculo_enteral_carac_oligomerico" class="form-check-label check-green">Oligomérico</label>
                                                        </div>
                                                        <div class="form-check col-sm-4">
                                                            <input id="calculo_enteral_carac_comfibras" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Com Fibras">
                                                            <label for="calculo_enteral_carac_comfibras" class="form-check-label check-green">Com Fibras</label>
                                                        </div>
                                                        <div class="form-check col-sm-4">
                                                        </div>
                                                        <div class="form-check col-sm-4">
                                                            <input id="calculo_enteral_carac_semlactose" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Polimérico">
                                                            <label for="calculo_enteral_carac_semlactose" class="form-check-label check-green">Sem Lactose</label>
                                                        </div>
                                                        <div class="form-check col-sm-4">
                                                            <input id="calculo_enteral_carac_semfibras" name="carac_enteral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Fibras">
                                                            <label for="calculo_enteral_carac_semfibras" class="form-check-label check-green">Sem Fibras</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="apresentacao_oral" class="row entric_grid mt-4 m-0 p-0 none">
                                                <div class="form-group col-sm-3">
                                                    <div class="form-check">
                                                        <label class="grid_label">Apresentação</label>
                                                    </div>
                                                    <div class="row p-4">
                                                        <div class="form-check col-sm-12">
                                                            <input id="calculo_enteral_apres_liquido" name="apres_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Líquido / Creme">
                                                            <label for="calculo_enteral_apres_liquido" class="form-check-label check-green">Líquido / Creme</label>
                                                        </div>
                                                        <div class="form-check col-sm-12">
                                                            <input id="calculo_enteral_apres_po" name="apres_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Pó">
                                                            <label for="calculo_enteral_apres_po" class="form-check-label check-green">Pó</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-9">
                                                    <div class="form-check">
                                                        <label class="grid_label">Características</label>
                                                    </div>
                                                    <div class="row p-4"> 
                                                        <div class="form-check col-sm-6">
                                                            <input id="calculo_oral_carac_todos" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Todos">
                                                            <label for="calculo_oral_carac_todos" class="form-check-label check-green">Todos</label>
                                                        </div>
                                                        <div class="form-check col-sm-6">
                                                            <input id="calculo_oral_100proteina" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="100% Proteína Vegetal">
                                                            <label for="calculo_oral_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                                                        </div> 
                                                        <div class="form-check col-sm-6">
                                                            <input id="calculo_oral_carac_semsacarose" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Sacarose">
                                                            <label for="calculo_oral_carac_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                                                        </div>
                                                        <div class="form-check col-sm-6">
                                                            <input id="calculo_oral_carac_comfibras" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Com Fibras">
                                                            <label for="calculo_oral_carac_comfibras" class="form-check-label check-green">Com Fibras</label>
                                                        </div>
                                                        <div class="form-check col-sm-6">
                                                            <input id="calculo_oral_carac_semlactose" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Lactose">
                                                            <label for="calculo_oral_carac_semlactose" class="form-check-label check-green">Sem Lactose</label>
                                                        </div>
                                                        <div class="form-check col-sm-6">
                                                            <input id="calculo_oral_carac_semfibras" name="carac_oral[]" class="form-check-input styled-checkbox" type="checkbox" value="Sem Fibras">
                                                            <label for="calculo_oral_carac_semfibras" class="form-check-label check-green">Sem Fibras</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form_blue">

                                                <?php
                                                $item_dados =  $html->addRow(
                                                                array(
                                                                    "buscar" => array(
                                                                        "col" => 6,
                                                                        "type" => "div",
                                                                        "content" => '<label for="formula">Buscar Produto</label>
                                                                                    <div class="input-group">
                                                                                        <select class="form-control select2_ajax_produto" name="buscar_produto"></select>
                                                                                    </div>'
                                                                    ),
                                                                    "apresentacao_produto" => array(
                                                                        "col" => 6,
                                                                        "label" => "Apresentação:",
                                                                        "required" => "required"
                                                                    ),
                                                                    "nome" => array(
                                                                        "col" => 6,
                                                                        "label" => "Nome do Produto:",
                                                                        "required" => "required"
                                                                    ),
                                                                    "tipo" => array(
                                                                        "col" => 3,
                                                                        "label" => "Tipo:",
                                                                        "required" => "required",
                                                                        "select" => array(
                                                                            "Tipo 1" => "Tipo 1",
                                                                            "Tipo 2" => "Tipo 2",
                                                                        )
                                                                    ),
                                                                    "apresentacao" => array(
                                                                        "col" => 3,
                                                                        "label" => "Apresentação:",
                                                                        "radiobutton" => array(
                                                                            "gramas" => "Gramas",
                                                                            "ml" => "ML",
                                                                        ),
                                                                        "checked" => "gramas",
                                                                        "required" => "required"
                                                                    ),
                                                                    "medida" => array(
                                                                        "col" => 3,
                                                                        "label" => "Medida:",
                                                                        "radiobutton" => array(
                                                                            "g" => "G",
                                                                            "dc" => "DC",
                                                                        ),
                                                                        "checked" => "g",
                                                                        "required" => "required"
                                                                    ),
                                                                    "medida_g" => array(
                                                                        "col" => 3,
                                                                        "form-class" => "medida_g",
                                                                        "class" => "numeros",
                                                                        "parameters" => 'data-precision="3"',
                                                                        "label" => "Grama:"
                                                                    ),
                                                                    "medida_dc" => array(
                                                                        "col" => 3,
                                                                        "form-class" => "medida_dc none",
                                                                        "class" => "numeros",
                                                                        "parameters" => 'data-precision="2"',
                                                                        "label" => "Densidade Calórica:"
                                                                    ),
                                                                    "fabricante" => array(
                                                                        "col" => 6,
                                                                        "label" => "Fabricante:",
                                                                        "required" => "required"
                                                                    ),
                                                                    "kcal" => array(
                                                                        "col" => 2,
                                                                        "label" => "KCAL:",
                                                                        "required" => "required"
                                                                    ),
                                                                    "cho" => array(
                                                                        "col" => 2,
                                                                        "label" => "CHO:",
                                                                        "required" => "required"
                                                                    ),
                                                                    "ptn" => array(
                                                                        "col" => 2,
                                                                        "label" => "PTN:",
                                                                        "required" => "required"
                                                                    ),
                                                                    "lip" => array(
                                                                        "col" => 2,
                                                                        "label" => "LIP:",
                                                                        "required" => "required"
                                                                    ),
                                                                    "fibras" => array(
                                                                        "col" => 4,
                                                                        "label" => "FIBRAS:",
                                                                        "required" => "required"
                                                                    ),
                                                                    "indicacao" => array(
                                                                        "col" => 6,
                                                                        "label" => "Indição:",
                                                                        "textarea" => "height:200px;",
                                                                        "required" => "required"
                                                                    ),
                                                                    "composicao_nutricional" => array(
                                                                        "col" => 6,
                                                                        "label" => "Composição Nutricional:",
                                                                        "textarea" => "height:200px;",
                                                                        "required" => "required"
                                                                    )
                                                                )
                                                            );
                                                    echo $item_dados;
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 entric_composicao pt-2">
                                            <h4 class="card-title bb-line2 mb-4 entric_comptitulo">
                                                Informações Nutricionais
                                            </h4>
                                            <?php
                                            $informacoes = array();
                                            $informacoes[] = "Proteína (g/100ml)";
                                            $informacoes[] = "Carboidrato (g/100ml)";
                                            $informacoes[] = "Lipídeo (g/100ml)";
                                            $informacoes[] = "Fonte de Proteína";
                                            $informacoes[] = "Fonte de Carboidrato";
                                            $informacoes[] = "Fonte de Lipídeo";
                                            $informacoes[] = "Fibras (g/100ml/Sol:Insol)";
                                            $informacoes[] = "Relação w6:w3";
                                            $informacoes[] = "Sódio";
                                            $informacoes[] = "Potássio";
                                            $informacoes[] = "Cloreto";
                                            $informacoes[] = "Cálcio";
                                            $informacoes[] = "Fósforo";
                                            $informacoes[] = "Magnésio";
                                            $informacoes[] = "Flúor";
                                            $informacoes[] = "Ferro";
                                            $informacoes[] = "Zinco";
                                            $informacoes[] = "Cobre";
                                            $informacoes[] = "Manganês";
                                            $informacoes[] = "Iodo";
                                            $informacoes[] = "Cromo";
                                            $informacoes[] = "Molibidênio";
                                            $informacoes[] = "Selênio";
                                            $informacoes[] = "Vitamina A";
                                            $informacoes[] = "Vitamina D";
                                            $informacoes[] = "Vitamina E";
                                            $informacoes[] = "Vitamina K";
                                            $informacoes[] = "Vitamina B1";
                                            $informacoes[] = "Vitamina B2";
                                            $informacoes[] = "Niacina";
                                            $informacoes[] = "Vitamina B6";
                                            $informacoes[] = "Vitamina B12";
                                            $informacoes[] = "Ácico Fólico";
                                            $informacoes[] = "Vitamina C";
                                            $informacoes[] = "Colina";
                                            ?>
                                            <table class="table table-bordered table-hover" style="min-width: 400px;">
                                                <tbody>
                                                    <?php 
                                                    for($i = 0; $i < count($informacoes); $i++){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $informacoes[$i];?></td>
                                                            <td><input type="text" placeholder="" name="info_nutri_<?php echo $informacoes[$i];?>" class="form-control text-center info_nutri"></td>
                                                        </tr>
                                                        <?php 
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                            <div class="form-group row pt-0">
                                                <div class="col-md-4 text-center">
                                                    <button type="button" class="btn btn-secondary btn-form" style="width: 100%;" onclick="window.location.reload();">Cancelar</button>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <button type="button" class="btn btn-secondary btn-form" id="frm_btneditar" data-loading-text="<i class='fa fa-cog fa-spin'></i> Editar" data-loaded-text="Editar" style="width: 100%;">Editar</button>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <button type="submit" class="btn btn-warning btn-form" id="frm_btnsalvar" data-loading-text="<i class='fa fa-cog fa-spin'></i> Salvar" data-loaded-text="Salvar" style="width: 100%;">Salvar</button>
                                                </div>
                                            </div>
                                        </div>        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="footer">
        <div class="copyright">            

            <p><?php echo VERFOOTER;?></p>

        </div>
    </div>
</div>