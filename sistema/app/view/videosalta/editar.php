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
                        <li class="breadcrumb-item active"><a href="prescritor_videosalta">Vídeos</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12 entric">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title bb-line mb-5">
                                <i class="mdi mdi-message-draw"></i> &nbsp; Edição de Vídeos
                            </h4>
                            
                            


                            <form action="prescritor_videosalta" method="post" autocomplete="off" enctype="multipart/form-data">
                                <input type="hidden" name="action" id="action" value="editar"/>
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>

                                <?php
                                $item_dados =  $html->addRow(
                                                array(
                                                    "titulo" => array(
                                                        "col" => 7,
                                                        "label" => "Título:",
                                                        "uppercase" => "nao",
                                                        "required" => "required",
                                                    ),
                                                    "categoria" => array(
                                                        "col" => 5,
                                                        "label" => "Categoria:",
                                                        "readonly" => true,
                                                        "uppercase" => "nao",
                                                        "required" => "required",
                                                    )
                                                ),
                                                $dados
                                            );
                                    echo $item_dados;
                                ?>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="video">Anexar vídeo:</label>
                                            <input type="file" name="video" class="form-control form-control-file" id="video">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row pt-5">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-warning btn-form">Atualizar</button>
                                    </div>
                                </div>
                            </form>



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