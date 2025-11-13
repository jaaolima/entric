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
                        <li class="breadcrumb-item active"><a href="prescritor_ferramentas">Relatório de Alta</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body entric">
                            <h4 class="card-title bb-line mb-5">
                                <i class="mdi mdi-cogs"></i> &nbsp; Ferramentas
                            </h4>
                            
                            <h4 class="card-title mb-5 text-center  entric_fertitulo">
                                Relatórios e Cálculos de Dieta Enteral
                            </h4>

                            <div class="row">
                                <div class="col-xl-4">
                                    <h4 class="entric_fertitulo1 text-center">Ferramentas de Apoio</h4>
                                </div>
                                <div class="col-xl-4">
                                    <h4 class="entric_fertitulo2 text-center">Avaliação Nutricional</h4>
                                </div>
                                <div class="col-xl-4">
                                    <h4 class="entric_fertitulo3 text-center">Scores</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#altura_estimada">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>Altura Estimada</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="altura_estimada" tabindex="-1" role="dialog" aria-labelledby="altura_estimadaLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="altura_estimadaLabel">Altura Estimada</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f1_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f1_sexo" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Sexo:",
                                                                                        "radiobutton" => array(
                                                                                            "Masculino" => "Masculino",
                                                                                            "Feminino" => "Feminino",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f1_etnia" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Etnia:",
                                                                                        "radiobutton" => array(
                                                                                            "Branco" => "Branco",
                                                                                            "Negro" => "Negro",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f1_idade" => array(
                                                                                        "col" => 12,
                                                                                        "form-class" => "f1_idade",
                                                                                        "label" => "Idade (anos):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'maxlength=3 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="" data-precision="0"'
                                                                                    ),
                                                                                    "f1_altura_joelho" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Altura do Joelho (cm):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'maxlength=4 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="1"'
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f1_resultado" class="alert alert-success none" role="alert">
                                                                    Resultado: 
                                                                </div>  
                                                                <p class="font-italic m-0">Chumlea WC, 1985 e 1994</p>                                                       
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer pt-0">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_AlturaEstimada();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#dogras_vasoativas">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>Drogas Vasoativas</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="dogras_vasoativas" tabindex="-1" role="dialog" aria-labelledby="dogras_vasoativasLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="dogras_vasoativasLabel">Drogas Vasoativas</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f3_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f2_vazao" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Vazão de Noradrenalina (ml/h):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="2"'
                                                                                    ),
                                                                                    "f2_peso" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Peso (kg):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="2"'
                                                                                    ),
                                                                                    "f2_ampolas" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Ampolas (und):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="0"'
                                                                                    ),
                                                                                    "f2_soro" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Soro (ml):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="2"'
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f2_resultado" class="alert alert-success none" role="alert">
                                                                    Resultado: 
                                                                </div>                                                         
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_DrogasVasoativas();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#pedo_estimado">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>Peso Estimado</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="pedo_estimado" tabindex="-1" role="dialog" aria-labelledby="pedo_estimadoLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="pedo_estimadoLabel">Peso Estimado</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f1_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f3_sexo" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Sexo:",
                                                                                        "radiobutton" => array(
                                                                                            "Masculino" => "Masculino",
                                                                                            "Feminino" => "Feminino",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f3_etnia" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Etnia:",
                                                                                        "radiobutton" => array(
                                                                                            "Branco" => "Branco",
                                                                                            "Negro" => "Negro",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f3_idade" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Idade (anos):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'maxlength=3 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="" data-precision="0"'
                                                                                    ),
                                                                                    "f3_altura_joelho" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Altura do Joelho (cm):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'maxlength=4 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="1"'
                                                                                    ),
                                                                                    "f3_braco" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Circunferência do braço (cm):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'maxlength=4 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="1"'
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f3_resultado" class="alert alert-success none" role="alert">
                                                                    Resultado: 
                                                                </div>
                                                                <p class="font-italic m-0">Chumlea et al., 1988.</p>                                                    
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer pt-0">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_PesoEstimado();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
 
                                        <div class="col-md-6">
                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#peso_ideal">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>Peso Ideal</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="peso_ideal" tabindex="-1" role="dialog" aria-labelledby="peso_idealLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="dogras_vasoativasLabel">Peso Ideal</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f4_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f4_tipo" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Tipo:",
                                                                                        "radiobutton" => array(
                                                                                            "Adulto" => "Adulto",
                                                                                            "Idoso" => "Idoso",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f4_sexo" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Sexo:",
                                                                                        "radiobutton" => array(
                                                                                            "Masculino" => "Masculino",
                                                                                            "Feminino" => "Feminino",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f4_altura" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Altura (m):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'maxlength=3 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="2"'
                                                                                    ),
                                                                                    "f4_imc" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "IMC Desejado:",
                                                                                        "required" => "required",
                                                                                        "class" => "float plusminus",
                                                                                        "parameters" => 'maxlength=4 data-decimals="1" min="0" max="99.9" step="0.1"'
                                                                                        //"parameters" => 'maxlength=4 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="1"'
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f4_resultado" class="alert alert-success none" role="alert">
                                                                    Resultado: 
                                                                </div>                                                         
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_PesoIdeal();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#recomendacoes">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>Recomendações Calóricas e Proteicas</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="recomendacoes" tabindex="-1" role="dialog" aria-labelledby="recomendacoesLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="recomendacoesLabel">Recomendações Calóricas e Proteicas</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f5_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f5_sexo" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Sexo:",
                                                                                        "radiobutton" => array(
                                                                                            "Masculino" => "Masculino",
                                                                                            "Feminino" => "Feminino",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f5_idade" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Idade (anos):",
                                                                                        "required" => "required",
                                                                                        "class" => "float f5_calculo",
                                                                                        "parameters" => 'maxlength=3 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="" data-precision="0"'
                                                                                    ),
                                                                                    "f5_peso" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Peso Atual (kg):",
                                                                                        "required" => "required",
                                                                                        "class" => "float f5_calculo",
                                                                                        "parameters" => 'maxlength=6 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="2"'
                                                                                    ),
                                                                                    "f5_altura" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Altura (m):",
                                                                                        "required" => "required",
                                                                                        "class" => "float f5_calculo",
                                                                                        "parameters" => 'maxlength=4 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="2"'
                                                                                    ),
                                                                                    "f5_imc" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "IMC:",
                                                                                        "readonly" => "readonly",
                                                                                        "form-class" => "f5_imc_div none",
                                                                                        "class" => "f5_imc"
                                                                                    ),
                                                                                    "f5_peso_ideal" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "Peso Ideal:",
                                                                                        "readonly" => "readonly",
                                                                                        "form-class" => "f5_peso_ideal_div none",
                                                                                        "class" => "f5_peso_ideal"
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f5_resultado" class="alert alert-success none" role="alert">
                                                                </div>    
                                                                <div id="f5_caloria_proteina" class="none" role="alert">

                                                                    <div class="entric_necessidades">
                                                                        <div class="row b_ltr">
                                                                            <div class="col-lg-3 b_r text-center text-azul" style="padding-left: 0px;padding-right: 0px;">
                                                                                <select id="f5_peso_calorias" name="f5_peso_calorias" aria-controls="f5_peso_calorias" class="form-control input-sm ">
                                                                                    <option value="Peso Atual">Peso Atual</option>
                                                                                    <option value="Peso Ideal">Peso Ideal</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-9 text-center bg-azul">
                                                                                CALORIAS
                                                                            </div>
                                                                        </div>
                                                                        <div class="row b_ltrb">
                                                                            <div class="col-lg-3 b_r ln-40">
                                                                                <div class="input-group mb-3 mt-3">
                                                                                    <input type="text" placeholder="" readonly="readonly" name="f5_cal_peso" id="f5_cal_peso" class="form-control proteinas_total necessidades_peso">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text">kg</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 b_r d-flex justify-content-center align-middle">
                                                                                <center class="mt-3">
                                                                                    <input type="number" name="f5_cal_valor" id="f5_cal_valor" class="plusminus proteinas_total f5_cal_valor" value="0" data-decimals="0" min="0" max="99" step="1"/>                                                                                    
                                                                                </center>

                                                                                <input type="hidden" name="f5_cal_valor_min" id="f5_cal_valor_min" value="0"/>
                                                                                <input type="hidden" name="f5_cal_valor_max" id="f5_cal_valor_max" value="0"/>
                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 text-center ln-40">
                                                                                        TOTAL
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row b_t bg-cinza">
                                                                                    <div class="col-lg-12 mt-3 text-center ln-40 text-azulescuro" id="f5_cal_total"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="entric_necessidades">
                                                                        <div class="row b_ltr">
                                                                            <div class="col-lg-3 b_r text-center text-azul" style="padding-left: 0px;padding-right: 0px;">
                                                                                <select id="f5_peso_proteina" name="f5_peso_proteina" aria-controls="f5_peso_proteina" class="form-control input-sm ">
                                                                                    <option value="Peso Atual">Peso Atual</option>
                                                                                    <option value="Peso Ideal">Peso Ideal</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-9 text-center bg-azul">
                                                                                PROTEINAS
                                                                            </div>
                                                                        </div>
                                                                        <div class="row b_ltrb">
                                                                            <div class="col-lg-3 b_r ln-40">
                                                                                <div class="input-group mb-3 mt-3">
                                                                                    <input type="text" placeholder="" readonly="readonly" name="f5_prot_peso" id="f5_prot_peso" class="form-control proteinas_total necessidades_peso">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text">kg</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 b_r d-flex justify-content-center align-middle">
                                                                                <center class="mt-3">
                                                                                    <input type="number" name="f5_prot_valor" id="f5_prot_valor" class="plusminus proteinas_total f5_prot_valor" value="0.0" data-decimals="1" min="0" max="99.9" step="0.1"/>
                                                                                </center>
                                                                                <input type="hidden" name="f5_prot_valor_min" id="f5_prot_valor_min" value="0"/>
                                                                                <input type="hidden" name="f5_prot_valor_max" id="f5_prot_valor_max" value="0"/>
                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 text-center ln-40">
                                                                                        TOTAL
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row b_t bg-cinza">
                                                                                    <div class="col-lg-12 mt-3 text-center ln-40 text-azulescuro" id="f5_prot_total"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>                                                         
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_f5_calcular();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#calorias_propofol">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>Calorias do Propofol - 1%</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="calorias_propofol" tabindex="-1" role="dialog" aria-labelledby="calorias_propofolLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="calorias_propofolLabel">Calorias do Propofol - 1%</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f7_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f7_propofol" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Propofol (ml/h):",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'maxlength=6 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="2"'
                                                                                    ),
                                                                                    "f7_horas" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Horas de Administração:",
                                                                                        "required" => "required",
                                                                                        "class" => "float",
                                                                                        "parameters" => 'maxlength=2 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="" data-precision="0"'
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f7_resultado" class="alert alert-success none" role="alert">
                                                                    Resultado: 
                                                                </div>                                                         
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_CaloriasPropofol();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#calculo">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>Cálculo de Gotejamento de Dieta</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="calculo" tabindex="-1" role="dialog" aria-labelledby="calculoLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="calculoLabel">Cálculo de Gotejamento de Dieta</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f8_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f8_volume_total" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Volume total a ser infundido por dia (ml):",
                                                                                        "class" => "float gotejamento",
                                                                                        "parameters" => 'maxlength=4 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="" data-precision="0"',
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f8_horario" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Fracionamento (número de horários):",
                                                                                        "required" => "required",
                                                                                        "class" => "float gotejamento",
                                                                                        "parameters" => 'maxlength=2 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="" data-precision="0"'
                                                                                    ),
                                                                                    "f8_volume" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Volume por horário:",
                                                                                        "required" => "required",
                                                                                        "readonly" => "readonly",
                                                                                        "class" => "gotejamento"
                                                                                    ),
                                                                                    "f8_infusao" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Tempo de infusão (horas):",
                                                                                        "required" => "required",
                                                                                        "class" => "float gotejamento",
                                                                                        "parameters" => 'maxlength=4 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal=":" data-precision="2"'

                                                                                    ),
                                                                                    "f8_gota" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Tipo de Gota:",
                                                                                        "radiobutton" => array(
                                                                                            "Macro" => "Macro",
                                                                                            "Micro" => "Micro",
                                                                                        ),
                                                                                        "checked" => "Macro",
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f8_gotejamento" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Gotejamento (gotas/min):",
                                                                                        "required" => "required",
                                                                                        "readonly" => "readonly",
                                                                                        "class" => "gotejamento"
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>                                                     
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#nrs_2002">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>NRS - 2002</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="nrs_2002" tabindex="-1" role="dialog" aria-labelledby="nrs_2002Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="nrs_2002Label">NRS - 2002</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f9_form" method="post">
                                                                <div id="f9_etapa1">
                                                                    <?php 
                                                                    $item_dados =  $html->addRow(
                                                                                    array(
                                                                                        "f9_1" => array(
                                                                                            "col" => 12,
                                                                                            "label" => "1) IMC < 20,5 kg/m²?",
                                                                                            "radiobutton" => array(
                                                                                                "Sim" => "Sim",
                                                                                                "Não" => "Não",
                                                                                            ),
                                                                                            "required" => "required",
                                                                                            "class" => "f9"
                                                                                        ),
                                                                                        "f9_2" => array(
                                                                                            "col" => 12,
                                                                                            "label" => "2) Perda de peso involuntária nos últimos 3 meses?",
                                                                                            "radiobutton" => array(
                                                                                                "Sim" => "Sim",
                                                                                                "Não" => "Não",
                                                                                            ),
                                                                                            "required" => "required",
                                                                                            "class" => "f9"
                                                                                        ),
                                                                                        "f9_3" => array(
                                                                                            "col" => 12,
                                                                                            "label" => "3) Ingestão alimentar reduzida na última semana?",
                                                                                            "radiobutton" => array(
                                                                                                "Sim" => "Sim",
                                                                                                "Não" => "Não",
                                                                                            ),
                                                                                            "required" => "required",
                                                                                            "class" => "f9"
                                                                                        ),
                                                                                        "f9_4" => array(
                                                                                            "col" => 12,
                                                                                            "label" => "4) Paciente portador de doença grave, mal estado geral ou em UTI?",
                                                                                            "radiobutton" => array(
                                                                                                "Sim" => "Sim",
                                                                                                "Não" => "Não",
                                                                                            ),
                                                                                            "required" => "required",
                                                                                            "class" => "f9"
                                                                                        )
                                                                                    )
                                                                                );
                                                                        echo $item_dados;
                                                                    ?>
                                                                </div> 
                                                                <div id="f9_etapa2" style="display: none;">
                                                                    <?php 
                                                                    $item_dados =  $html->addRow(
                                                                                    array(
                                                                                        "f91_1" => array(
                                                                                            "col" => 12,
                                                                                            "label" => "1) Estado Nutricional:",
                                                                                            "radiobutton" => array(
                                                                                                "1" => "Estado Nutricional Normal",
                                                                                                "2" => "Perda de peso > 5% em 3 meses OU ingestão alimentar entre 50 e 75% das necessidades nutricionais na última semana",
                                                                                                "3" => "Perda de peso > 5% em 2 meses OU IMC entre 18,5 e 20,5 kg/m² + condição geral comprometida OU ingestão alimentar entre 25 e 60% das necessidades nutricionais na última semana",
                                                                                                "4" => "Perda de peso > 5% em 1 mês OU IMC < 18,5 kg/m² + condição geral comprometida OU ingestão alimentar < 25% das necessidades nutricionais na última semana"
                                                                                            ),
                                                                                            "required" => "required",
                                                                                            "class" => "f9"
                                                                                        ),
                                                                                        "f91_2" => array(
                                                                                            "col" => 12,
                                                                                            "label" => "2) Gravidade da Doença",
                                                                                            "radiobutton" => array(
                                                                                                "1" => "Necessidades nutricionais normais",
                                                                                                "2" => "Leve – Fratura de quadril; pacientes crônicos, em especial com complicações agudas (cirrose, diabetes, DPOC, hemodiálise crônica, oncologia",
                                                                                                "3" => "Moderada – Cirurgia abdominal de grande porte; AVC; Pneumonia Grave; doenças hematológicas malignas (leucemia, linfoma)",
                                                                                                "4" => "Grave – Traumatismo craniano; Transplante de medula óssea; pacientes em terapia intensiva (APACHE > 10)"
                                                                                            ),
                                                                                            "required" => "required",
                                                                                            "class" => "f9"
                                                                                        ),
                                                                                        "f91_3" => array(
                                                                                            "col" => 12,
                                                                                            "label" => "3) Paciente ≥ 70 anos?",
                                                                                            "radiobutton" => array(
                                                                                                "1" => "Sim",
                                                                                                "2" => "Não",
                                                                                            ),
                                                                                            "required" => "required",
                                                                                            "class" => "f9"
                                                                                        )
                                                                                    )
                                                                                );
                                                                        echo $item_dados;
                                                                    ?>
                                                                </div> 

                                                                <div id="f9_resultado" class="alert alert-success none" role="alert">
                                                                    Resultado: 
                                                                </div>                                                         
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#ANSG">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>ANSG</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="ANSG" tabindex="-1" role="dialog" aria-labelledby="ANSGLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ANSGLabel">Avaliação Nutricional Subjetiva Global</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form id="f10_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f10_peso_corporal" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>1) Peso Corporal</strong>",
                                                                                        "type" => "div",
                                                                                        "content" => ""
                                                                                    ),
                                                                                    "f10_peso_corporal_6meses" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Perda de peso nos últimos 6 meses?",
                                                                                        "radiobutton" => array(
                                                                                            "Sim" => "Sim",
                                                                                            "Não" => "Não",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f10_peso_corporal_continua" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Continua perdendo nas últimas duas semanas?",
                                                                                        "radiobutton" => array(
                                                                                            "Sim" => "Sim",
                                                                                            "Não" => "Não",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f10_peso_corporal_pesoatual" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "Peso atual:",
                                                                                        "required" => "required",
                                                                                        "form-class" => "f10_peso_corporal none",
                                                                                        "class" => "resultado_corporal float",
                                                                                        "parameters" => 'maxlength=5 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="1"'
                                                                                    ),
                                                                                    "f10_peso_corporal_pesohabitual" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "Peso habitual:",
                                                                                        "required" => "required",
                                                                                        "form-class" => "f10_peso_corporal none",
                                                                                        "class" => "resultado_corporal float",
                                                                                        "parameters" => 'maxlength=5 data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="1"'
                                                                                    ),
                                                                                    "f10_peso_corporal_resultado" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Porcentagem de perda de peso:",
                                                                                        "type" => "div",
                                                                                        "form-class" => "f10_peso_corporal none",
                                                                                        "content" => "<div class='f10_resultado_peso_corporal'></div>"
                                                                                    ),
                                                                                    "f10_ingesta_alimentar" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>2) Ingesta Alimentar</strong>",
                                                                                        "type" => "div",
                                                                                        "content" => ""
                                                                                    ),
                                                                                    "f10_ingesta_alimentar_mudanca" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Mudança da dieta?",
                                                                                        "radiobutton" => array(
                                                                                            "Sim" => "Sim",
                                                                                            "Não" => "Não",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f10_ingesta_alimentar_mudanca_para" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "A mudança foi para:",
                                                                                        "form-class" => "f10_ingesta_alimentar_mudanca none",
                                                                                        "checkboxs" => array(
                                                                                            "dieta hipocalórica" => "dieta hipocalórica",
                                                                                            "dieta pastosa hipocalórica" => "dieta pastosa hipocalórica",
                                                                                            "dieta líquida > 15 dias ou solução de infusão intravenosa > 5 dias" => "dieta líquida > 15 dias ou solução de infusão intravenosa > 5 dias",
                                                                                            "jejum > 5 dias" => "jejum > 5 dias",
                                                                                            "mudança persistente > 30 dias" => "mudança persistente > 30 dias",
                                                                                        )
                                                                                    ),
                                                                                    "f10_sintomas_gastrintestinais" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>3) Sintomas Gastrintestinais (persistente por mais de duas semanas)</strong>",
                                                                                        "checkboxs" => array(
                                                                                            "disfagia ou odinofagia" => "disfagia ou odinofagia",
                                                                                            "náuseas" => "náuseas",
                                                                                            "vômitos" => "vômitos",
                                                                                            "anorexia, distensão abdominal e/ou dor abdominal" => "anorexia, distensão abdominal e/ou dor abdominal",
                                                                                            "diarréia" => "diarréia",
                                                                                        )
                                                                                    ),
                                                                                    "f10_capacidade_funcional" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>4) Capacidade Funcional Física: (por mais de duas semanas)</strong>",
                                                                                        "radiobutton" => array(
                                                                                            "abaixo do normal" => "abaixo do normal",
                                                                                            "acamado" => "acamado",
                                                                                            "sem alteração" => "sem alteração"
                                                                                        )
                                                                                    ),
                                                                                    "f10_diagnostico_clinico" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>5) Diagnóstico clínico/estresse</strong>",
                                                                                        "radiobutton" => array(
                                                                                            "baixo estresse" => "baixo estresse",
                                                                                            "moderado estresse" => "moderado estresse",
                                                                                            "alto estresse" => "alto estresse"
                                                                                        )
                                                                                    ),
                                                                                    "f10_exame_fisico" => array(
                                                                                        "col" => 12,
                                                                                        "type" => "div",
                                                                                        "form-class" => "mb-2",
                                                                                        "content" => "<strong>6) Exame Físico</strong>"
                                                                                    ),
                                                                                    "f10_exame_fisico_classificacao_perda_gordura" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Perda de Gordura",
                                                                                        "form-class" => "mb-0",
                                                                                        "radiobutton" => array(
                                                                                            "normal" => "normal",
                                                                                            "Leve ou moderado" => "Leve ou moderado",
                                                                                            "importante" => "importante",
                                                                                        )
                                                                                    ),
                                                                                    "f10_exame_fisico_classificacao_edema_sacral" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Edema Sacral",
                                                                                        "form-class" => "mt-2 mb-0",
                                                                                        "radiobutton" => array(
                                                                                            "normal" => "normal",
                                                                                            "Leve ou moderado" => "Leve ou moderado",
                                                                                            "importante" => "importante",
                                                                                        )
                                                                                    ),
                                                                                    "f10_exame_fisico_classificacao_edema_tornozelo" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Edema de Tornozelo",
                                                                                        "form-class" => "mt-2 mb-0",
                                                                                        "radiobutton" => array(
                                                                                            "normal" => "normal",
                                                                                            "Leve ou moderado" => "Leve ou moderado",
                                                                                            "importante" => "importante",
                                                                                        )
                                                                                    ),
                                                                                    "f10_exame_fisico_classificacao_ascite" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "Ascite",
                                                                                        "form-class" => "mt-2 mb-0",
                                                                                        "radiobutton" => array(
                                                                                            "normal" => "normal",
                                                                                            "Leve ou moderado" => "Leve ou moderado",
                                                                                            "importante" => "importante",
                                                                                        )
                                                                                    ) 
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f10_resultado" class="alert alert-success none" role="alert">
                                                                    Resultado Final: 
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_f10_calcular();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#NUTRIC">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>NUTRIC SCORE</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="NUTRIC" tabindex="-1" role="dialog" aria-labelledby="NUTRICLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="NUTRICLabel">NUTRIC SCORE</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f11_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f11_idade" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>1) IDADE</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "< 50 anos" => "< 50 anos",
                                                                                            "50 – 74 anos" => "50 – 74 anos",
                                                                                            "≥ 75 anos" => "≥ 75 anos"
                                                                                        )
                                                                                    ),
                                                                                    "f11_apacheii" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>2) APACHE II</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "< 15" => "< 15",
                                                                                            "15 – 19" => "15 – 19",
                                                                                            "20 – 28" => "20 – 28",
                                                                                            "≥ 28" => "≥ 28"
                                                                                        )
                                                                                    ),
                                                                                    "f11_sofa" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>3) SOFA</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "< 6" => "< 6",
                                                                                            "6 – 9" => "6 – 9",
                                                                                            "≥ 10" => "≥ 10"
                                                                                        )
                                                                                    ),
                                                                                    "f11_comorbidades" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>4) NÚMERO DE COMORBIDADES</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "0 – 1" => "0 – 1",
                                                                                            "≥ 2" => "≥ 2"
                                                                                        )
                                                                                    ),
                                                                                    "f11_internacao" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>5) DIAS DE INTERNAÇÃO ATÉ ADMISSÃO NA UTI</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "< 1 dia" => "< 1 dia",
                                                                                            "≥ 1 dia" => "≥ 1 dia"
                                                                                        )
                                                                                    ),
                                                                                    "f11_il" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>6) IL-6</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "Não disponível" => "Não disponível",
                                                                                            "< 400" => "< 400",
                                                                                            "≥ 400" => "≥ 400"
                                                                                        )
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f11_resultado" class="alert alert-success none" role="alert">
                                                                    DIAGNÓSTICO NUTRICIONAL: 
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_f11_calcular();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#STRONG">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>STRONG KIDS</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="STRONG" tabindex="-1" role="dialog" aria-labelledby="STRONGLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="STRONGLabel">STRONG KIDS</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f12_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f12_avaliacao" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>1. Avaliação nutricional subjetiva - A criança aparenta ter déficit nutricional ou desnutrição?</strong><br> (redução da gordura subcutânea e/ou da massa muscular; face emagrecida; etc)",
                                                                                        "radiobutton" => array(
                                                                                            "Sim" => "Sim",
                                                                                            "Não" => "Não",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f12_avaliacao_opcoes" => array(
                                                                                        "col" => 12,
                                                                                        "form-class" => "f12_avaliacao_opcoes none",
                                                                                        "checkboxs" => array(
                                                                                            "Redução da gordura subcutânea e/ou da massa muscular" => "Redução da gordura subcutânea e/ou da massa muscular",
                                                                                            "Face emagrecida" => "Face emagrecida",
                                                                                            "Outro sinal" => "Outro sinal"
                                                                                        )
                                                                                    ),
                                                                                    "f12_doenca" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>2. Doença com alto risco nutricional ou cirurgia de grande porte?</strong>",
                                                                                        "radiobutton" => array(
                                                                                            "Sim" => "Sim",
                                                                                            "Não" => "Não",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f12_doencas_opcoes" => array(
                                                                                        "col" => 12,
                                                                                        "form-class" => "f12_doencas_opcoes none",
                                                                                        "checkboxs" => array(
                                                                                            "Anorexia nervosa" => "Anorexia nervosa",
                                                                                            "Fibrose Cística" => "Fibrose Cística",
                                                                                            "AIDS" => "AIDS",
                                                                                            "Pancreatite" => "Pancreatite",
                                                                                            "Doença Muscular" => "Doença Muscular",
                                                                                            "Displasia Broncopulmonar (até 02 anos)" => "Displasia Broncopulmonar (até 02 anos)",
                                                                                            "Baixo peso para idade / Prematuridade (idade corrigida 6 meses)" => "Baixo peso para idade / Prematuridade (idade corrigida 6 meses)",
                                                                                            "Doença Crônica (cardíaca, renal ou hepática)" => "Doença Crônica (cardíaca, renal ou hepática)",
                                                                                            "Queimaduras" => "Queimaduras",
                                                                                            "Deficiência mental / Paralisia cerebral" => "Deficiência mental / Paralisia cerebral",
                                                                                            "DII – Doença Inflamatória Intestinal" => "DII – Doença Inflamatória Intestinal",
                                                                                            "Câncer" => "Câncer",
                                                                                            "Trauma" => "Trauma",
                                                                                            "SIC – Síndrome do Intestino Curto" => "SIC – Síndrome do Intestino Curto",
                                                                                            "Doença Metabólica" => "Doença Metabólica",
                                                                                            "Doença Celíaca" => "Doença Celíaca",
                                                                                            "Pré ou Pós Operatório de cirurgia de grande porte" => "Pré ou Pós Operatório de cirurgia de grande porte",
                                                                                            "Outras" => "Outras"
                                                                                        )
                                                                                    ),
                                                                                    "f12_ingestao" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>3. Ingestão nutricional reduzida e/ou perdas nos últimos dias?</strong><br> (Diarreia ≥ 5x/dia, dificuldade alimentar devido a dor, diminuição da ingestão alimentar sem considerar jejum para procedimento ou cirurgia, vômitos ≥ 3x/dia, intervenção nutricional prévia)",
                                                                                        "radiobutton" => array(
                                                                                            "Sim" => "Sim",
                                                                                            "Não" => "Não",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f12_ingestao_opcoes" => array(
                                                                                        "col" => 12,
                                                                                        "form-class" => "f12_ingestao_opcoes none",
                                                                                        "checkboxs" => array(
                                                                                            "Diarreia (≥5x/dia)" => "Diarreia (≥5x/dia)",
                                                                                            "Dificuldade alimentar devido à dor" => "Dificuldade alimentar devido à dor",
                                                                                            "Diminuição da ingestão alimentar (não considerar jejum para procedimento ou cirurgia)" => "Diminuição da ingestão alimentar (não considerar jejum para procedimento ou cirurgia)",
                                                                                            "Vômitos (≥ 3x/dia)" => "Vômitos (≥ 3x/dia)",
                                                                                            "Intervenção nutricional prévia" => "Intervenção nutricional prévia",
                                                                                            "Outros" => "Outros"
                                                                                        )
                                                                                    ),
                                                                                    "f12_perdapeso" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>4. Refere perda de peso ou ganho insuficiente nas últimas semanas ou meses?</strong>",
                                                                                        "radiobutton" => array(
                                                                                            "Sim" => "Sim",
                                                                                            "Não" => "Não",
                                                                                        ),
                                                                                        "required" => "required"
                                                                                    ),
                                                                                    "f12_perdapeso_opcoes" => array(
                                                                                        "col" => 12,
                                                                                        "form-class" => "f12_perdapeso_opcoes none",
                                                                                        "checkboxs" => array(
                                                                                            "Perda de peso em (crianças > 1 ano)" => "Perda de peso em (crianças > 1 ano)",
                                                                                            "Não ganho de peso (crianças < 1 ano)" => "Não ganho de peso (crianças < 1 ano)"
                                                                                        )
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f12_resultado" class="alert alert-success none" role="alert">
                                                                    Resultado Final: 
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_f12_calcular();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#APACHE">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>APACHE II</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="APACHE" tabindex="-1" role="dialog" aria-labelledby="APACHELabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="APACHELabel">APACHE II</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f13_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f13_temperatura" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>1) Temperatura (°C)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "> 41" => "> 41",
                                                                                            "39 – 40,9" => "39 – 40,9",
                                                                                            "38,5 – 38,9" => "38,5 – 38,9",
                                                                                            "36 – 38,4" => "36 – 38,4",
                                                                                            "34 – 35,9" => "34 – 35,9",
                                                                                            "32 – 33,9" => "32 – 33,9",
                                                                                            "30 – 31,9" => "30 – 31,9",
                                                                                            "< 29,9" => "< 29,9"
                                                                                        )
                                                                                    ),
                                                                                    "f13_pressao" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>2) Pressão Arterial Média (PAM) (mmHg)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "> 160" => "> 160",
                                                                                            "139 – 159" => "139 – 159",
                                                                                            "110 – 129" => "110 – 129",
                                                                                            "70 – 109" => "70 – 109",
                                                                                            "50 – 69" => "50 – 69",
                                                                                            "< 40" => "< 40"
                                                                                        )
                                                                                    ),
                                                                                    "f13_frequencia" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>3) Frequência Cardíaca (bpm)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "> 180" => "> 180",
                                                                                            "140 – 179" => "140 – 179",
                                                                                            "110 – 139" => "110 – 139",
                                                                                            "70 – 190" => "70 – 190",
                                                                                            "55 – 69" => "55 – 69",
                                                                                            "40 – 54" => "40 – 54",
                                                                                            "< 39" => "< 39"
                                                                                        )
                                                                                    ),
                                                                                    "f13_frequencia_respiratoria" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>4) Frequência Respiratória (irpm)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "> 50" => "> 50",
                                                                                            "35 – 49" => "35 – 49",
                                                                                            "25 - 34" => "25 - 34",
                                                                                            "12 - 24" => "12 - 24",
                                                                                            "10 - 11" => "10 - 11",
                                                                                            "6 – 9" => "6 – 9",
                                                                                            "< 5" => "< 5"
                                                                                        )
                                                                                    ),
                                                                                    "f13_oxigenacao" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>5) Oxigenação</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "FiO2 < 50% (ou não intubado)" => "FiO2 < 50% (ou não intubado)",
                                                                                            "FiO2 > 50%" => "FiO2 > 50%"
                                                                                        )
                                                                                    ),
                                                                                    "f13_oxigenacao_opcao1" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "a. PaO2 (mmHg)",
                                                                                        "form-class" => "f13_oxigenacao_opcao1 none",
                                                                                        "checkboxs" => array(
                                                                                            "> 70" => "> 70",
                                                                                            "61 – 70" => "61 – 70",
                                                                                            "55 – 60" => "55 – 60",
                                                                                            "< 55" => "< 55"
                                                                                        )
                                                                                    ),
                                                                                    "f13_oxigenacao_opcao2" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "b. PaO2/FiO2 (valor)",
                                                                                        "form-class" => "f13_oxigenacao_opcao2 none",
                                                                                        "checkboxs" => array(
                                                                                            "> 500" => "> 500",
                                                                                            "350 – 499" => "350 – 499",
                                                                                            "200 – 349" => "200 – 349",
                                                                                            "< 200" => "< 200"
                                                                                        )
                                                                                    ),
                                                                                    "f13_arterial_venoso" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>6) pH Arterial (preferencialmente) ou HCO3 venoso</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "pH Arterial" => "pH Arterial",
                                                                                            "HCO3 venoso" => "HCO3 venoso"
                                                                                        )
                                                                                    ),
                                                                                    "f13_ph_arterial" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>a) pH Arterial (valor)</strong>",
                                                                                        "form-class" => "f13_ph_arterial none",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 7,7" => "≥ 7,7",
                                                                                            "7,6 – 7,69" => "7,6 – 7,69",
                                                                                            "7,5 – 7,59" => "7,5 – 7,59",
                                                                                            "7,33 – 7,49" => "7,33 – 7,49",
                                                                                            "7,25 – 7,32" => "7,25 – 7,32",
                                                                                            "7,15 – 7,24" => "7,15 – 7,24",
                                                                                            "< 7,15" => "< 7,15"
                                                                                        )
                                                                                    ),
                                                                                    "f13_hc03_venoso" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>b) HCO3 venoso (mEq/L)</strong>",
                                                                                        "form-class" => "f13_hc03_venoso none",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 52" => "≥ 52",
                                                                                            "41 – 51,9" => "41 – 51,9",
                                                                                            "32 – 40,9" => "32 – 40,9",
                                                                                            "22 – 31,9" => "22 – 31,9",
                                                                                            "18 – 21,9" => "18 – 21,9",
                                                                                            "15 – 17,9" => "15 – 17,9",
                                                                                            "< 15" => "< 15"
                                                                                        )
                                                                                    ),
                                                                                    "f13_sodio" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>7) Sódio sérico (mEq/L)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 180" => "≥ 180",
                                                                                            "160 – 179" => "160 – 179",
                                                                                            "155 – 159" => "155 – 159",
                                                                                            "150 – 154" => "150 – 154",
                                                                                            "130 – 149" => "130 – 149",
                                                                                            "120 – 129" => "120 – 129",
                                                                                            "111 – 119" => "111 – 119",
                                                                                            "≤ 110" => "≤ 110"
                                                                                        )
                                                                                    ),
                                                                                    "f13_potassio" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>8) Potássio sérico (mEq/L)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 7,0" => "≥ 7,0",
                                                                                            "6,0 – 6,9" => "6,0 – 6,9",
                                                                                            "5,5 – 5,9" => "5,5 – 5,9",
                                                                                            "3,5 – 5,4" => "3,5 – 5,4",
                                                                                            "3,0 – 3,4" => "3,0 – 3,4",
                                                                                            "2,5 – 2,9" => "2,5 – 2,9",
                                                                                            "< 2,5" => "< 2,5"
                                                                                        )
                                                                                    ),
                                                                                    "f13_creatinina" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>9) Creatinina sérica (mg/dL)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 3,5" => "≥ 3,5",
                                                                                            "2,0 – 3,4" => "2,0 – 3,4",
                                                                                            "1,5 – 1,9" => "1,5 – 1,9",
                                                                                            "0,6 – 1,4" => "0,6 – 1,4",
                                                                                            "< 0,6" => "< 0,6"
                                                                                        )
                                                                                    ),
                                                                                    "f13_falencia" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>a) Falência renal aguda?</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "Sim" => "Sim",
                                                                                            "Não" => "Não"
                                                                                        )
                                                                                    ),
                                                                                    "f13_hematocrito" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>10) Hematócrito (%)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 60" => "≥ 60",
                                                                                            "50,0 – 59,9" => "50,0 – 59,9",
                                                                                            "46,0 – 49,9" => "46,0 – 49,9",
                                                                                            "30,0 – 45,9" => "30,0 – 45,9",
                                                                                            "20,0 – 29,9" => "20,0 – 29,9",
                                                                                            "< 20,0" => "< 20,0"
                                                                                        )
                                                                                    ),
                                                                                    "f13_leucocitos" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>11) Leucócitos (x103 células / mm³)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 40" => "≥ 40",
                                                                                            "20,0 – 39,9" => "20,0 – 39,9",
                                                                                            "15,0 – 19,9" => "15,0 – 19,9",
                                                                                            "3,0 – 14,9" => "3,0 – 14,9",
                                                                                            "1,0 – 2,9" => "1,0 – 2,9",
                                                                                            "< 1,0" => "< 1,0"
                                                                                        )
                                                                                    ),
                                                                                    "f13_glasgow" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>12) Glasgow</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "i. 15" => "i. 15",
                                                                                            "ii. 13 - 14" => "ii. 13 - 14",
                                                                                            "iii. 10 - 12" => "iii. 10 - 12",
                                                                                            "iv. 6 - 9" => "iv. 6 - 9",
                                                                                            "v. < 6" => "v. < 6"
                                                                                        )
                                                                                    ),
                                                                                    "f13_idade" => array(
                                                                                        "col" => 6,
                                                                                        "label" => "<strong>13) Idade (anos)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "≤ 44" => "≤ 44",
                                                                                            "45 - 54" => "45 - 54",
                                                                                            "55 - 64" => "55 - 64",
                                                                                            "65 - 74" => "65 - 74",
                                                                                            "≥ 75" => "≥ 75"
                                                                                        )
                                                                                    ),
                                                                                    "f13_doencas_cronicas" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>14) Doenças Crônicas</strong>",
                                                                                        "type" => "div",
                                                                                        "content" => "<strong>História de falência orgânica grave ou imunodepressão?</strong>
                                                                                            <br><br>Definições: a insuficiência de órgão ou o estado de imunodepressão deve ser evidente antes da admissão hospitalar e deve
obedecer os seguintes critérios:
<br><br>- Hepática: cirrose comprovada por biópsia; hipertensão portal documentada; episódios passados de hemorragia gastrintestinal
atribuídos à hipertensão portal; episódios anteriores de insuficiência hepática, encefalopatia ou coma.
<br><br>- Cardiovascular: New York Association classe IV.
<br><br>- Respiratória: doença crônica restritiva, obstrutiva ou vascular resultando em grave restrição ao exercício, isto é, incapaz de
subir escadas ou fazer exercícios domésticos; hipóxia crônica documentada, hipercapnia, policitemia secundária, hipertensão
pulmonar grave (> 40 mmHg), dependência de prótese ventilatória.
<br><br>- Renal: recebendo diálise cronicamente.
<br><br>- Imunocomprometido: paciente tem recebido terapia que suprime a resistência à infecção, isto é, imunossupressores,
quimioterapia, radioterapia, corticoides cronicamente ou recente em altas doses, doença que é suficientemente avançada para
suprimir a resistência à infecção, isto é, leucemia, linfoma, AIDS.",
                                                                                    ),
                                                                                    "f13_doencas" => array(
                                                                                        "col" => 4,
                                                                                        "radiobuttons" => array(
                                                                                            "a. Sim" => "a. Sim",
                                                                                            "b. Não" => "b. Não"
                                                                                        )
                                                                                    ),
                                                                                    "f13_doencas_opcoes" => array(
                                                                                        "col" => 8,
                                                                                        "form-class" => "f13_doencas_opcoes none",
                                                                                        "radiobuttons" => array(
                                                                                            "Não cirúrgico" => "Não cirúrgico",
                                                                                            "Pós operatório eletivo" => "Pós operatório eletivo",
                                                                                            "Pós operatório de emergência" => "Pós operatório de emergência"
                                                                                        )
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f13_resultado" class="alert alert-success none" role="alert">
                                                                    
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_f13_calcular();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="widget-file-container">
                                                <div class="d-flex justify-content-between flex-wrap mt-4" data-toggle="modal" data-target="#SOFA">
                                                    <div class="file-container">
                                                        <img src="assets/images/icon-ferramentas-apoio.png" alt="">
                                                        <p>SOFA</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="SOFA" tabindex="-1" role="dialog" aria-labelledby="SOFALabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="SOFALabel">SOFA</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="f14_form" method="post">
                                                                <?php 
                                                                $item_dados =  $html->addRow(
                                                                                array(
                                                                                    "f14_paO2" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>1) PaO2/FiO2 - (mmHg)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 400" => "≥ 400",
                                                                                            "< 400" => "< 400",
                                                                                            "< 300" => "< 300",
                                                                                            "< 200 com suporte respiratório" => "< 200 com suporte respiratório",
                                                                                            "< 100 com suporte respiratório" => "< 100 com suporte respiratório"
                                                                                        )
                                                                                    ),
                                                                                    "f14_plaquetas" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>2) Plaquetas - (x 10³ / μL)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 150" => "≥ 150",
                                                                                            "< 150" => "< 150",
                                                                                            "< 100" => "< 100",
                                                                                            "< 50" => "< 50",
                                                                                            "< 20" => "< 20"
                                                                                        )
                                                                                    ),
                                                                                    "f14_bilirrubina" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>3) Bilirrubina</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "< 1,2" => "< 1,2",
                                                                                            "1,2 – 1,9" => "1,2 – 1,9",
                                                                                            "2,0 – 5,9" => "2,0 – 5,9",
                                                                                            "6,0 – 11,9" => "6,0 – 11,9",
                                                                                            "> 12,0" => "> 12,0"
                                                                                        )
                                                                                    ),
                                                                                    "f14_pressao" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>4) Pressão Arterial Média (mmHg)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "≥ 70" => "≥ 70",
                                                                                            "< 70" => "< 70",
                                                                                            "Dopamina < 5 ou dobutamina em qualquer dose" => "Dopamina < 5 ou dobutamina em qualquer dose",
                                                                                            "Dopamina 5,1 – 15 OU adrenalina ≤ 0,1 OU noradrenalina ≤ 0,1 (em μg/kg/min por pelo menos 1 hora.)" => "Dopamina 5,1 – 15 OU adrenalina ≤ 0,1 OU noradrenalina ≤ 0,1 (em μg/kg/min por pelo menos 1 hora.)",
                                                                                            "Dopamina > 15 OU adrenalina > 0,1 OU noradrenalina > 0,1 (em μg/kg/min por pelo menos 1 hora.)" => "Dopamina > 15 OU adrenalina > 0,1 OU noradrenalina > 0,1 (em μg/kg/min por pelo menos 1 hora.)"
                                                                                        )
                                                                                    ),
                                                                                    "f14_escala" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>5) Escala de Glasgow (pontos)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "15" => "15",
                                                                                            "13 – 14" => "13 – 14",
                                                                                            "10 – 12" => "10 – 12",
                                                                                            "6 – 9" => "6 – 9",
                                                                                            "< 6" => "< 6"
                                                                                        )
                                                                                    ),
                                                                                    "f14_creatinina" => array(
                                                                                        "col" => 12,
                                                                                        "label" => "<strong>6) Creatinina (mg/dL)</strong>",
                                                                                        "radiobuttons" => array(
                                                                                            "< 1,2" => "< 1,2",
                                                                                            "1,2 – 1,9" => "1,2 – 1,9",
                                                                                            "2,0 – 3,4" => "2,0 – 3,4",
                                                                                            "3,5 – 4,9 ou volume urinário < 500ml/dia" => "3,5 – 4,9 ou volume urinário < 500ml/dia",
                                                                                            "> 5,0 ou volume urinário < 200ml/dia" => "> 5,0 ou volume urinário < 200ml/dia"
                                                                                        )
                                                                                    )
                                                                                )
                                                                            );
                                                                    echo $item_dados;
                                                                ?>
                                                                <div id="f14_resultado" class="alert alert-success none" role="alert">
                                                                    ESCORE SOFA: 
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning btn-form" onclick="fc_f14_calcular();">Calcular</button>
                                                            <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Cancelar</button>
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


            </div>
        </div>
    </div>


    <div class="footer">
        <div class="copyright">

            <p><?php echo VERFOOTER;?></p>

        </div>
    </div>
</div>