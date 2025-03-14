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
                        <li class="breadcrumb-item active"><a href="prescritor_meusrelatorios">Meus Relatórios</a></li>
                    </ol>
                </div>
            </div>


            <div class="row">
                
                <div class="table-responsive pt-5" style="max-height: 400px;">
                    <table class="table table-bordered table-hover table-striped" id="table_lista_relatorios">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Tipo de relatório</th>
                                <th scope="col">Nome do Paciente</th>
                                <th scope="col">Data de Nascimento</th>
                                <th scope="col">Situação</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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