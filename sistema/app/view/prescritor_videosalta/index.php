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
                        <li class="breadcrumb-item active"><a href="prescritor_videosalta">Vídeos de Alta</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title bb-line mb-5"><i class="mdi mdi-video"></i> &nbsp; Vídeos de Alta</h4>
                            <?php 
                            /*
                                <form action="perfil" id="flupdocs" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_ac" value="flupdocs">
                                    <input type="hidden" name="_token" value="<?php echo generateFormToken('flupdocs'); ?>">
                                    <div class="text-muted">
                                        <?php 
                                        echo $html->addRow(
                                                        array(
                                                            "imagensdocs" => array(
                                                                "col" => 12,
                                                                "uploadfiles" => true
                                                            )
                                                        )
                                                );
                                        ?>
                                    </div>
                                    <div class="line line-dashed b-b line-lg pull-in"></div>
                                    <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                                </form>
                                */
                            ?>
                                
                            <div class="row">
                                <div class="col-xl-6 col-sm-6 col-xxl-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h4 class="card-title card-title-verde">Conceitos Básicos
                                            </h4>

                                            
                                            <div class="basic-list-group">
                                                <ul class="list-group list-group-flush" id="video1">
                                                    <?php 
                                                    if (isset($dados['Conceitos Básicos'])){
                                                        for($i = 0; $i < count($dados['Conceitos Básicos']); $i++){
                                                            $relarorio = $dados['Conceitos Básicos'][$i];
                                                            ?>
                                                            <li class="list-group-item" rel="<?php echo $relarorio['id'];?>">
                                                                <a href="javascript:void(0);" class="modal_video" rel="https://sis.entric.com.br/public/<?php echo $relarorio['link'];?>"><i class="fa fa-play-circle-o" aria-hidden="true"></i> <?php echo $relarorio['titulo'];?></a>
                                                                
                                                            </li>
                                                            <?php 
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6 col-xxl-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h4 class="card-title card-title-verde">Cuidados Necessários
                                            </h4>
                                            
                                            <div class="basic-list-group">
                                                <ul class="list-group list-group-flush" id="video2">
                                                    <?php 
                                                    if (isset($dados['Cuidados Necessários'])){
                                                        for($i = 0; $i < count($dados['Cuidados Necessários']); $i++){
                                                            $relarorio = $dados['Cuidados Necessários'][$i];
                                                            ?>
                                                            <li class="list-group-item" rel="<?php echo $relarorio['id'];?>">
                                                                <a href="javascript:void(0);" class="modal_video" rel="https://sis.entric.com.br/public/<?php echo $relarorio['link'];?>"><i class="fa fa-play-circle-o" aria-hidden="true"></i> <?php echo $relarorio['titulo'];?></a>
                                                                
                                                            </li>
                                                            <?php 
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-xl-6 col-sm-6 col-xxl-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h4 class="card-title card-title-verde">Preparo e Instalação da Dieta</h4>
                                            
                                            <div class="basic-list-group">
                                                <ul class="list-group list-group-flush" id="video3">
                                                    <?php 
                                                    if (isset($dados['Preparo e Instalação da Dieta'])){
                                                        for($i = 0; $i < count($dados['Preparo e Instalação da Dieta']); $i++){
                                                            $relarorio = $dados['Preparo e Instalação da Dieta'][$i];
                                                            ?>
                                                            <li class="list-group-item" rel="<?php echo $relarorio['id'];?>">
                                                                <a href="javascript:void(0);" class="modal_video" rel="https://sis.entric.com.br/public/<?php echo $relarorio['link'];?>"><i class="fa fa-play-circle-o" aria-hidden="true"></i> <?php echo $relarorio['titulo'];?></a>
                                                                
                                                                
                                                            </li>
                                                            <?php 
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6 col-xxl-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h4 class="card-title card-title-verde">Complicações</h4>
                                            
                                            <div class="basic-list-group">
                                                <ul class="list-group list-group-flush" id="video4">
                                                    <?php 
                                                    if (isset($dados['Complicações'])){
                                                        for($i = 0; $i < count($dados['Complicações']); $i++){
                                                            $relarorio = $dados['Complicações'][$i];
                                                            ?>
                                                            <li class="list-group-item" rel="<?php echo $relarorio['id'];?>">
                                                                <a href="javascript:void(0);" class="modal_video" rel="https://sis.entric.com.br/public/<?php echo $relarorio['link'];?>"><i class="fa fa-play-circle-o" aria-hidden="true"></i> <?php echo $relarorio['titulo'];?></a>
                                                                
                                                            </li>
                                                            <?php 
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal-youtube" tabindex="-1" role="dialog" aria-labelledby="modal-youtube" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"></div>
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