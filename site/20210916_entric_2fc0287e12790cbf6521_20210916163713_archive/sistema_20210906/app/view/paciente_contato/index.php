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
                        <li class="breadcrumb-item active"><a href="paciente_contato">Contato</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title bb-line mb-5"><i class="mdi mdi-email-outline"></i> &nbsp; Contato</h4>

                            <div class="row">
                                <?php 
                                if (isset($dados)){
                                    for($i = 0; $i < count($dados); $i++){
                                    ?>
                                    <div class="col-xl-4 col-sm-4 col-xxl-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h4 class="card-title card-title-contato"><?php echo $dados[$i]['titulo'];?></h4>
                                                
                                                <div class="basic-list-group">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; <?php echo $dados[$i]['endereco'];?><br />
                                                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i> &nbsp; <?php echo $dados[$i]['telefone'];?><br />
                                                            <i class="fa fa-whatsapp" aria-hidden="true"></i> &nbsp; <?php echo $dados[$i]['whatsapp'];?><br />
                                                            <i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp; <?php echo $dados[$i]['email'];?><br />
                                                            <i class="fa fa-globe" aria-hidden="true"></i> &nbsp; <?php echo $dados[$i]['site'];?><br />
                                                        </li>                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    }
                                }
                                ?>
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