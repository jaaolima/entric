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
                            
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <div class="form-check entric_radio">
                                                    <input id="calculo_adulto" class="form-check-input styled-checkbox" type="checkbox">
                                                    <label for="calculo_adulto" class="form-check-label check-green">Adulto</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <div class="form-check entric_radio">
                                                    <input id="calculo_pediatrico" class="form-check-input styled-checkbox" type="checkbox">
                                                    <label for="calculo_pediatrico" class="form-check-label check-green">Pediátrico</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-check entric_radio">
                                                    <input id="calculo_enteral" class="form-check-input styled-checkbox" type="checkbox">
                                                    <label for="calculo_enteral" class="form-check-label check-green">Enteral</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-check entric_radio">
                                                    <input id="calculo_oral" class="form-check-input styled-checkbox" type="checkbox">
                                                    <label for="calculo_oral" class="form-check-label check-green">Oral</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-check entric_radio">
                                                    <input id="calculo_prescricao_auto" class="form-check-input styled-checkbox" type="checkbox">
                                                    <label for="calculo_prescricao_auto" class="form-check-label check-green">Módulo</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row entric_grid mt-4 m-0 p-0">
                                            <div class="form-group col-sm-3">
                                                <div class="form-check">
                                                    <label class="grid_label">Apresentação</label>
                                                </div>
                                                <div class="row p-4">
                                                    <div class="form-check col-sm-12">
                                                        <input id="calculo_apres_fechado" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_apres_fechado" class="form-check-label check-green">Fechado</label>
                                                    </div>
                                                    <div class="form-check col-sm-12">
                                                        <input id="calculo_apres_aberto_liquido" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_apres_aberto_liquido" class="form-check-label check-green">Aberto (Líquido)</label>
                                                    </div>
                                                    <div class="form-check col-sm-12">
                                                        <input id="calculo_apres_aberto_po" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_apres_aberto_po" class="form-check-label check-green">Aberto (Pó)</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-9">
                                                <div class="form-check">
                                                    <label class="grid_label">Características</label>
                                                </div>
                                                <div class="row p-4"> 
                                                    <div class="form-check col-sm-4">
                                                        <input id="calculo_fil_semlactose" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_fil_semlactose" class="form-check-label check-green">Polimérico</label>
                                                    </div>
                                                    <div class="form-check col-sm-4">
                                                        <input id="calculo_fil_semfibras" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_fil_semfibras" class="form-check-label check-green">Sem Sacarose</label>
                                                    </div>
                                                    <div class="form-check col-sm-4">
                                                        <input id="calculo_fil_polimerico" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_fil_polimerico" class="form-check-label check-green">100% Proteína Vergetal</label>
                                                    </div>
                                                    <div class="form-check col-sm-4">
                                                        <input id="calculo_fil_semsacarose" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_fil_semsacarose" class="form-check-label check-green">Oligomérico</label>
                                                    </div>
                                                    <div class="form-check col-sm-4">
                                                        <input id="calculo_fil_100proteina" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_fil_100proteina" class="form-check-label check-green">Com Fibras</label>
                                                    </div>
                                                    <div class="form-check col-sm-4">
                                                        <input id="calculo_fil_oligomerico" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_fil_oligomerico" class="form-check-label check-green">Sem Lactose</label>
                                                    </div>
                                                    <div class="form-check col-sm-4">
                                                        <input id="calculo_fil_comfibras" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="calculo_fil_comfibras" class="form-check-label check-green">Sem Fibras</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form_blue">
                                            <?php
                                            $item_dados =  $html->addRow(
                                                            array(
                                                                "buscar" => array(
                                                                    "col" => 8,
                                                                    "label" => "Buscar Produto:"
                                                                ),
                                                                "apresentacao_busca" => array(
                                                                    "col" => 4,
                                                                    "label" => "Apresentação:",
                                                                    "required" => "required"
                                                                ),
                                                                "nome" => array(
                                                                    "col" => 5,
                                                                    "label" => "Nome do Produto:",
                                                                    "required" => "required"
                                                                ),
                                                                "tipo" => array(
                                                                    "col" => 3,
                                                                    "label" => "Tipo:",
                                                                    "required" => "required"
                                                                ),
                                                                "medida" => array(
                                                                    "col" => 4,
                                                                    "label" => "Medida:",
                                                                    "radiobutton" => array(
                                                                        "g" => "G",
                                                                        "dc" => "DC",
                                                                    ),
                                                                    "required" => "required"
                                                                ),
                                                                "apresentacao" => array(
                                                                    "col" => 5,
                                                                    "label" => "Apresentação:",
                                                                    "radiobutton" => array(
                                                                        "gramas" => "Gramas",
                                                                        "ml" => "ML",
                                                                    ),
                                                                    "required" => "required"
                                                                ),
                                                                "fabricante" => array(
                                                                    "col" => 3,
                                                                    "label" => "Fabricante:",
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
                                        <table class="table table-bordered table-hover" style="min-width: 400px;">
                                            <tbody>
                                                <tr>
                                                    <td>Proteína (g/100ml)</td>
                                                    <td>5.6g</td>
                                                </tr>
                                                <tr>
                                                    <td>Proteína (g/100ml)</td>
                                                    <td>5.6g</td>
                                                </tr>
                                                <tr>
                                                    <td>Proteína (g/100ml)</td>
                                                    <td>5.6g</td>
                                                </tr>
                                                <tr>
                                                    <td>Proteína (g/100ml)</td>
                                                    <td>5.6g</td>
                                                </tr>
                                                <tr>
                                                    <td>Proteína (g/100ml)</td>
                                                    <td>5.6g</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>        
                                </div>

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