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
                        <li class="breadcrumb-item active"><a href="distribuidores">Distribuidores</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12 entric">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title bb-line mb-5">
                                <i class="mdi mdi-message-draw"></i> &nbsp; Editar Distribuidores
                            </h4>
                            
                            


                            <form action="distribuidores" method="post" autocomplete="off">
                                <input type="hidden" name="action" id="action" value="editar"/>
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>

                                <?php
                                $item_dados =  $html->addRow(
                                                array(
                                                    "distribuidor" => array(
                                                        "col" => 6,
                                                        "label" => "Nome do Distribuidor:",
                                                        "required" => "required",
                                                    ),
                                                    "fabricante" => array(
                                                        "col" => 6,
                                                        "label" => "Nome do Fabricante:",
                                                        "required" => "required",
                                                    ),
                                                    "telefone" => array(
                                                        "col" => 3,
                                                        "class" => "telefone",
                                                        "label" => "Telefone:"
                                                    ),
                                                    "whatsapp" => array(
                                                        "col" => 3,
                                                        "class" => "telefone",
                                                        "label" => "Whatsapp:"
                                                    ),
                                                    "cupom" => array(
                                                        "col" => 4,
                                                        "label" => "Cupom:"
                                                    ),
                                                    "desconto" => array(
                                                        "col" => 2,
                                                        "label" => "Desconto",
                                                        "checkbox" => true
                                                    ),
                                                    "uf" => array(
                                                        "col" => 3,
                                                        "label" => "UF:",
                                                        "required" => "required",
                                                        "select" => array("" => "selecione...")+_ufs()
                                                    ),
                                                    "endereco" => array(
                                                        "col" => 9,
                                                        "label" => "Endereço:"
                                                    ),
                                                    "email" => array(
                                                        "col" => 3,
                                                        "label" => "E-mail:"
                                                    ),
                                                    "site" => array(
                                                        "col" => 3,
                                                        "label" => "Site:"
                                                    ),
                                                    "mapa" => array(
                                                        "col" => 6,
                                                        "label" => "Mapa:",
                                                        "textarea" => true
                                                    )
                                                ),
                                                $dados
                                            );
                                    echo $item_dados;
                                ?>
                                <div class="form-group row pt-5">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-warning btn-form">Editar</button>
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