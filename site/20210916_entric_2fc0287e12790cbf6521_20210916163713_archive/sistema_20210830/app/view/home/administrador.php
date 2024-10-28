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
                <div class="col-xl-3 col-sm-3 col-xxl-3">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <h4 class="card-title card-title-verde">Dashboard</h4>
                            <div class="circle-progress circle-progress-block text-center my-5">
                                <div id="ev-dashboard"></div>
                            </div>
                            <div class="circle-counter prescritor">
                                <h2><span class="text-lblue"><?php echo $dados['relatorios'];?></span></h2>
                            </div>
                            <div class="text-center">
                                <p class="text-lblue">Confira as principais informações</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-xxl-3">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <h4 class="card-title card-title-verde">Financeiro</h4>
                            <div class="circle-progress circle-progress-block text-center my-5">
                                <div id="ev-financeiro"></div>
                            </div>
                            <div class="circle-counter prescritor">
                                <h2><span class="text-lblue"><?php echo $dados['relatorios'];?></span></h2>
                            </div>
                            <div class="text-center">
                                <p class="text-lblue">Gerenciamento de Pagamentos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-xxl-3">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <h4 class="card-title card-title-verde">Relatório de Alta</h4>
                            <div class="circle-progress circle-progress-block text-center my-5">
                                <div id="ev-relatorio"></div>
                            </div>
                            <div class="circle-counter prescritor">
                                <h2><span class="text-lblue"><?php echo $dados['relatorios'];?></span></h2>
                            </div>
                            <div class="text-center">
                                <p class="text-lblue">Relatórios Ativos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-xxl-3">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <h4 class="card-title card-title-verde">Ferramentas</h4>
                            <div class="circle-progress circle-progress-block text-center my-5">
                                <div id="ev-ferramentas"></div>
                            </div>
                            <div class="circle-counter prescritor">
                                <h2><span class="text-lblue"><?php echo $dados['contatos'];?></span></h2>
                            </div>
                            <div class="text-center">
                                <p class="text-lblue">Ferramentas de apoio habilitadas</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-xxl-3">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <h4 class="card-title card-title-verde">Cadastros</h4>
                            <div class="circle-progress circle-progress-block text-center my-5">
                                <div id="ev-cadastros"></div>
                            </div>
                            <div class="circle-counter prescritor">
                                <h2><span class="text-lblue"><?php echo $dados['contatos'];?></span></h2>
                            </div>
                            <div class="text-center">
                                <p class="text-lblue">Usuários cadastrados</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-xxl-3">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <h4 class="card-title card-title-verde">Consultar Produto</h4>
                            <div class="circle-progress circle-progress-block text-center my-5">
                                <div id="ev-consultarproduto"></div>
                            </div>
                            <div class="circle-counter prescritor">
                                <h2><span class="text-lblue"><?php echo $dados['contatos'];?></span></h2>
                            </div>
                            <div class="text-center">
                                <p class="text-lblue">Produtos Cadastrados</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-xxl-3">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <h4 class="card-title card-title-verde">Fornecedores</h4>
                            <div class="circle-progress circle-progress-block text-center my-5">
                                <div id="ev-fornecedores"></div>
                            </div>
                            <div class="circle-counter prescritor">
                                <h2><span class="text-lblue"><?php echo $dados['fornecedores'];?></span></h2>
                            </div>
                            <div class="text-center">
                                <p class="text-lblue">Pontos de vendas em todo o Brasil</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-xxl-3">
                    <div class="card widget-event-circle">
                        <div class="card-body">
                            <h4 class="card-title card-title-verde">Vídeos</h4>
                            <div class="circle-progress circle-progress-block text-center my-5">
                                <div id="ev-videos"></div>
                            </div>
                            <div class="circle-counter prescritor">
                                <h2><span class="text-lblue"><?php echo $dados['videos'];?></span></h2>
                            </div>
                            <div class="text-center">
                                <p class="text-lblue">Videos disponíveis</p>
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