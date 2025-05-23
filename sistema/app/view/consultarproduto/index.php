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

                                <a href="v/produtos" target="blank" class="pull-right text-lblue">Lista de Produtos</a>
                            </h4>
                            <div class="default-tab bordered-tab entric">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item tabpesquisa">
                                        <a class="nav-link active" data-toggle="tab" href="#tabpesquisa">Consultar<br>por Nome</a>
                                    </li>
                                    <li class="nav-item tabsec tabfiltros">
                                        <a class="nav-link" data-toggle="tab" href="#tabfiltros">Consultar<br>por Filtros</a>
                                    </li>
                                    <li class="nav-item tabsec tabproduto">
                                        <a class="nav-link" data-toggle="tab" href="#tabproduto">Cadastrar<br>Produto</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-default">

                                    <?php require_once("index_pesquisa.php"); ?>

                                    <?php require_once("index_filtros.php"); ?> 

                                    <?php require_once("index_produto.php"); ?>

                                    <?php require_once("index_produto_modal.php"); ?>

                                    <?php require_once("index_fabricantes_modal.php"); ?>

                                    <?php require_once("index_unidades_modal.php"); ?>

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