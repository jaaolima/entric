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
                        <li class="breadcrumb-item active"><a href="prescritor_relatorioalta">Relatório de Alta</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title bb-line mb-5">
                                <i class="mdi mdi-message-draw"></i> &nbsp; Relatório de Alta
                            </h4>
                            
                            <div class="default-tab bordered-tab entric">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item tabcadastro">
                                        <a class="nav-link active" data-toggle="tab" href="#cadastro">Cadastro e Busca<br>de Pacientes</a>
                                    </li>
                                    <li class="nav-item tabsec tabhistoria">
                                        <a class="nav-link" data-toggle="tab" href="#historia">História Clínica
                                            <span class="pull-right none tabnook tabambos" style="margin-top: -10px;"> </span>
                                            <span class="pull-right none tabok  tabambos" style="margin-top: -10px;"> </span>
                                        </a>
                                    </li>
                                    <li class="nav-item tabsec tabavaliacao">
                                        <a class="nav-link" data-toggle="tab" href="#avaliacao">Avaliação<br>Nutricional
                                            <span class="pull-right none tabnook tabambos" style="margin-top: -30px;"> </span>
                                            <span class="pull-right none tabok  tabambos" style="margin-top: -30px;"> </span>
                                        </a>
                                    </li>
                                    <li class="nav-item tabsec tabnecessidades">
                                        <a class="nav-link" data-toggle="tab" href="#necessidades">Necessidades<br>Nutricionais
                                            <span class="pull-right none tabnook tabambos" style="margin-top: -10px;"> </span>
                                            <span class="pull-right none tabok  tabambos" style="margin-top: -10px;"> </span>
                                        </a>
                                    </li>
                                    <li class="nav-item tabsec tabcalculo">
                                        <a class="nav-link" data-toggle="tab" href="#calculo">Cálculo de Terapia<br>Nutricional
                                            <span class="pull-right none tabnook tabambos" style="margin-top: -10px;"> </span>
                                            <span class="pull-right none tabok  tabambos" style="margin-top: -10px;"> </span>
                                        </a>
                                    </li>
                                    <li class="nav-item tabsec tabobservacoes">
                                        <a class="nav-link" data-toggle="tab" href="#observacoes">Observações
                                            <span class="pull-right none tabnook tabambos" style="margin-top: -10px;"> </span>
                                            <span class="pull-right none tabok  tabambos" style="margin-top: -10px;"> </span>
                                        </a>
                                    </li>
                                    <li class="nav-item tabsec tabdistribuidores">
                                        <a class="nav-link" data-toggle="tab" href="#distribuidores">Pontos de Venda
                                            <span class="pull-right none tabnook tabambos" style="margin-top: -10px;"> </span>
                                            <span class="pull-right none tabok  tabambos" style="margin-top: -10px;"> </span>
                                        </a>
                                    </li>
                                    <li class="nav-item tabsec tabrelatorio">
                                        <a class="nav-link" data-toggle="tab" href="#relatorio">Relatório</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-default">

                                    <?php require_once("index_cadastro.php"); ?>

                                    <?php require_once("index_historia.php"); ?>

                                    <?php require_once("index_avaliacao.php"); ?>

                                    <?php require_once("index_necessidades.php"); ?>

                                    <?php require_once("index_calculo.php"); ?>

                                    <?php require_once("index_observacoes.php"); ?>

                                    <?php require_once("index_distribuidores.php"); ?>

                                    <?php require_once("index_relatorio.php"); ?>

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