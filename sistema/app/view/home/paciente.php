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
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Início</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-6 col-sm-6 col-xxl-6">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <a href="paciente_relatorioalta">
                                <h4 class="card-title card-title-verde">Relatório de Alta</h4>
                                <div class="circle-progress circle-progress-block text-center my-5">
                                    <div id="ev-relatorio"></div>
                                </div>
                                <div class="circle-counter">
                                    <h2><span class="text-lblue"><?php echo $dados['relatorios'];?></span></h2>
                                </div>
                                <div class="text-center">
                                    <p class="text-lblue">Relatórios Ativos</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 col-xxl-6">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <a href="paciente_videosalta">
                                <h4 class="card-title card-title-verde">Vídeos de Alta</h4>
                                <div class="circle-progress circle-progress-block text-center my-5">
                                    <div id="ev-videos"></div>
                                </div>
                                <div class="circle-counter">
                                    <h2><span class="text-lblue"><?php echo $dados['videos'];?></span></h2>
                                </div>
                                <div class="text-center">
                                    <p class="text-lblue">Videos disponíveis</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 col-xxl-6">
                    <div class="card widget-event-circle">
                        <div class="card-body">                            
                            <a href="paciente_contato">
                                <h4 class="card-title card-title-verde">Contato</h4>
                                <div class="circle-progress circle-progress-block text-center my-5">
                                    <div id="ev-contato"></div>
                                </div>
                                <div class="circle-counter">
                                    <h2><span class="text-lblue"><?php echo $dados['contatos'];?></span></h2>
                                </div>
                                <div class="text-center">
                                    <p class="text-lblue">Contato</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 col-xxl-6">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <a href="paciente_fornecedores">
                                <h4 class="card-title card-title-verde">Pontos de Venda</h4>
                                <div class="circle-progress circle-progress-block text-center my-5">
                                    <div id="ev-fornecedores"></div>
                                </div>
                                <div class="circle-counter">
                                    <h2><span class="text-lblue"><?php echo $dados['fornecedores'];?></span></h2>
                                </div>
                                <div class="text-center">
                                    <p class="text-lblue">Pontos de vendas em todo o Brasil</p>
                                </div>
                            </a>
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