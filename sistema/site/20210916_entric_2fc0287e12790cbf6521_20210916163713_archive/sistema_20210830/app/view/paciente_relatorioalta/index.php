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
                        <li class="breadcrumb-item active"><a href="paciente_relatorioalta">Relatório de Alta</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title bb-line mb-5"><i class="mdi mdi-message-draw"></i> &nbsp; Relatório de Alta</h4>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" style="min-width: 400px;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Prescritor</th>
                                            <th scope="col">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if ($relatorio){
                                            for($i = 0; $i < count($relatorio); $i++){
                                            ?>
                                            <tr>
                                                <td><?php echo $relatorio[$i]['pa_nome'];?></td>
                                                <td><?php echo sql2date($relatorio[$i]['data_criacao']);?></td>
                                                <td><?php echo $relatorio[$i]['pre_nome'];?></td>
                                                <td>
                                                    <span>
                                                        <a href="javascript:void();" class="mr-4 tb-action" data-toggle="tooltip" data-placement="top" data-original-title="Imprimir">
                                                            <i class="fa fa-print"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="tb-action btn-pdf" data-toggle="tooltip" data-placement="top" data-original-title="PDF" rel="<?php echo $relatorio[$i]['pdf'];?>">
                                                            <i class="fa fa-file-pdf-o" ></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                        }else{
                                            ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Nenhum dado encontrado</td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <div id="modal-pdf" class="modal fade modal-pdf" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Relatório de Alta</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body" id="modal-pdf-body">
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
    </div>


    <div class="footer">
        <div class="copyright">            

            <p><?php echo VERFOOTER;?></p>

        </div>
    </div>
</div>