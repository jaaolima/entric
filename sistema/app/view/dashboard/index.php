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
                        <li class="breadcrumb-item active"><a href="dashboard">Dashboard</a></li>
                    </ol>
                </div>
            </div>

            <div class="row"> 
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body entric">

                            
                            <div class="default-tab bordered-tab entric">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item tabacesso">
                                        <a class="nav-link active" data-toggle="tab" href="#tabacesso">Acessos <br>ao Site</a>
                                    </li>
                                    <li class="nav-item tabvideos">
                                        <a class="nav-link" data-toggle="tab" href="#tabvideos">Visualizações <br>de Vìdeos</a>
                                    </li>
                                    <li class="nav-item tabrelatorios">
                                        <a class="nav-link" data-toggle="tab" href="#tabrelatorios">Relatórios <br>de Alta Gerados</a>
                                    </li>
                                    <li class="nav-item tablog">
                                        <a class="nav-link" data-toggle="tab" href="#tablog">Consulta <br>de Logs</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-default entric">

                                    <div class="tab-pane fade show active" id="tabacesso" role="tabpanel">

                                        <?php 
                                        echo $html->addRow(
                                            array(
                                                "data_inicio_acesso" => array(
                                                    "col" => 2,
                                                    "label" => "Início:",
                                                    "class" => "data data_acesso",
                                                    "placeholder" => "dd/mm/aaaa",
                                                    "value" => $data2,
                                                    "required" => "required"
                                                ),
                                                "data_fim_acesso" => array(
                                                    "col" => 2,
                                                    "label" => "Fim:",
                                                    "class" => "data data_acesso",
                                                    "placeholder" => "dd/mm/aaaa",
                                                    "value" => $data1,
                                                    "required" => "required"
                                                )
                                            ));
                                        ?>

                                        <div class="pt-3">
                                            <div id="container_acesso"></div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tabvideos" role="tabpanel">

                                        <?php 
                                        echo $html->addRow(
                                            array(
                                                "data_inicio_videos" => array(
                                                    "col" => 2,
                                                    "label" => "Início:",
                                                    "class" => "data data_videos",
                                                    "placeholder" => "dd/mm/aaaa",
                                                    "value" => $data2,
                                                    "required" => "required"
                                                ),
                                                "data_fim_videos" => array(
                                                    "col" => 2,
                                                    "label" => "Fim:",
                                                    "class" => "data data_videos",
                                                    "placeholder" => "dd/mm/aaaa",
                                                    "value" => $data2,
                                                    "required" => "required"
                                                )
                                            ));
                                        ?>

                                        <div class="pt-3">
                                            <div id="container_videos"></div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tabrelatorios" role="tabpanel">
                                        <?php 
                                        echo $html->addRow(
                                            array(
                                                "ufs_relatorios" => array(
                                                    "col" => 2,
                                                    "label" => "UF:",
                                                    "class" => "data_relatorios",
                                                    "required" => "required",
                                                    "select" => array(
                                                                    "" => "Todos"
                                                                )+_ufs_()
                                                ),
                                                "tipos_relatorios" => array(
                                                    "col" => 2,
                                                    "label" => "Tipo:",
                                                    "class" => "data_relatorios",
                                                    "required" => "required",
                                                    "select" => array(
                                                                    "todos" => "Todos",
                                                                    "SE" => "Simplificado Enteral",
                                                                    "SS" => "Simplificado Suplemento",
                                                                    "SM" => "Simplificado Módulo",
                                                                    "RA" => "Relatório de Alta",
                                                                )
                                                ),
                                                "data_inicio_relatorios" => array(
                                                    "col" => 2,
                                                    "label" => "Início:",
                                                    "class" => "data data_relatorios",
                                                    "placeholder" => "dd/mm/aaaa",
                                                    "value" => $data2,
                                                    "required" => "required"
                                                ),
                                                "data_fim_relatorios" => array(
                                                    "col" => 2,
                                                    "label" => "Fim:",
                                                    "class" => "data data_relatorios",
                                                    "placeholder" => "dd/mm/aaaa",
                                                    "value" => $data1,
                                                    "required" => "required"
                                                )
                                            ));
                                        ?>

                                        <div class="pt-3">
                                            <div id="container_relatorios"></div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tablog" role="tabpanel">
                                        <div class="pt-3">
                                            <?php 
                                            echo $html->addTable(
                                                array(
                                                    "title" => array(
                                                        "Login" => 'style="width: 15%;"',
                                                        "Função" => 'style="width: 15%;"',
                                                        "IP" => 'style="width: 10%;"',
                                                        "Dados" => 'style="width: 15%;"',
                                                        "Data e Hora" => 'style="width: 15%;"'
                                                    )
                                                ), 
                                                $dados_log,
                                                "tb_log"
                                            );
                                            ?>
                                        </div>
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