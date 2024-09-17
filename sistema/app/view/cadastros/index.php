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
                        <li class="breadcrumb-item active"><a href="Cadastros">Cadastros</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title bb-line mb-5">
                                <i class="mdi mdi-account-circle"></i> &nbsp; Cadastros                               
                            </h4>
                            <div class="default-tab bordered-tab entric">
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php 
                                    if ($bruker->usuario['tipo'] == "-1"){
                                    ?>
                                    <li class="nav-item tabadmin">
                                        <a class="nav-link active" data-toggle="tab" href="#tabadmin">Cadastro<br>do Administrador</a>
                                    </li>
                                    <?php 
                                    }
                                    ?>
                                    <li class="nav-item tabsec tabpatrocinador">
                                        <a class="nav-link <?php if ($bruker->usuario['tipo'] == "0") echo "active";?>" data-toggle="tab" href="#tabpatrocinador">Cadastro<br>de Patrocinador</a>
                                    </li>
                                    <li class="nav-item tabsec tabprescritor">
                                        <a class="nav-link" data-toggle="tab" href="#tabprescritor">Cadastro<br>de Prescritor</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-default">

                                    <?php if ($bruker->usuario['tipo'] == "-1"){ require_once("index_administrador.php"); }?>

                                    <?php require_once("index_patrocinador.php"); ?>

                                    <?php require_once("index_prescritor.php"); ?>

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