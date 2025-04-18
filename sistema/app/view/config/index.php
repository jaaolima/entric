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
                        <li class="breadcrumb-item active"><a href="config">Configurações</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title bb-line mb-5">
                                <i class="mdi mdi-message-draw"></i> &nbsp; Configurações
                            </h4>
                            
                            <div class="default-tab bordered-tab entric">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item tabcadastro">
                                        <a class="nav-link active" data-toggle="tab" href="#cadastro">Orientações de Preparo <br> Manipulação</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-default">

                                    <?php require_once("index_cadastro.php"); ?>

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