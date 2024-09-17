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
                <div class="col-xl-4 col-sm-4 col-xxl-4">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <a href="prescritor_relatorioalta">
                                <h4 class="card-title card-title-verde">Relatório de Alta</h4>
                                <div class="circle-progress circle-progress-block text-center my-5">
                                    <div id="ev-relatorio"></div>
                                </div>
                                <div class="circle-counter prescritor">
                                    <h2><span class="text-lblue"><?php if(isset($dados['relatorios'])) echo $dados['relatorios'];?></span></h2>
                                </div>
                                <div class="text-center">
                                    <p class="text-lblue">Relatórios Ativos</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-xxl-4">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <a href="prescritor_consultarproduto">
                                <h4 class="card-title card-title-verde">Consultar Produto</h4>
                                <div class="circle-progress circle-progress-block text-center my-5">
                                    <div id="ev-consultarproduto"></div>
                                </div>
                                <div class="circle-counter prescritor">
                                    <h2><span class="text-lblue"><?php if (isset($dados['produtos'])) echo $dados['produtos'];?></span></h2>
                                </div>
                                <div class="text-center">
                                    <p class="text-lblue">Produtos Cadastrados</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-xxl-4">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <a href="prescritor_fornecedores">
                                <h4 class="card-title card-title-verde">Fornecedores</h4>
                                <div class="circle-progress circle-progress-block text-center my-5">
                                    <div id="ev-fornecedores"></div>
                                </div>
                                <div class="circle-counter prescritor">
                                    <h2><span class="text-lblue"><?php if(isset($dados['fornecedores'])) echo $dados['fornecedores'];?></span></h2>
                                </div>
                                <div class="text-center">
                                    <p class="text-lblue">Pontos de vendas em todo o Brasil</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-xxl-4">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <a href="prescritor_videosalta">
                                <h4 class="card-title card-title-verde">Vídeos de Alta</h4>
                                <div class="circle-progress circle-progress-block text-center my-5">
                                    <div id="ev-videos"></div>
                                </div>
                                <div class="circle-counter prescritor">
                                    <h2><span class="text-lblue"><?php if (isset($dados['videos']))echo $dados['videos'];?></span></h2>
                                </div>
                                <div class="text-center">
                                    <p class="text-lblue">Videos disponíveis</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-xxl-4">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <a href="prescritor_ferramentas">
                                <h4 class="card-title card-title-verde">Ferramentas</h4>
                                <div class="circle-progress circle-progress-block text-center my-5">
                                    <div id="ev-ferramentas"></div>
                                </div>
                                <div class="circle-counter prescritor">
                                    <h2><span class="text-lblue"><?php if (isset($dados['contatos'])) echo $dados['contatos'];?></span></h2>
                                </div>
                                <div class="text-center">
                                    <p class="text-lblue">Ferramentas de apoio habilitadas</p>
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