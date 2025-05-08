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
                <div class="card w-100">
                    <div class="card-body">
                        <div class="card-title">
                            Meus Relatórios
                        </div>
                        <div class="table-responsive pt-5">
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
                                    <?php 

                                        usort($dados, function($a, $b) {
                                            return strtotime($b['data_criacao_nao_formatada']) - strtotime($a['data_criacao_nao_formatada']);
                                        });
                                        foreach ($dados as $key => $relatorio) { ?>
                                            <tr>
                                                <th><?php echo $relatorio['data_criacao']; ?></th>
                                                <th><?php echo $relatorio['tipo']; ?></th>
                                                <th><?php echo $relatorio['nome']; ?></th> 
                                                <th><?php echo $relatorio['data_nascimento']; ?></th>
                                                <th><?php echo (($relatorio['codigo']) ?  "<span style='padding: 5px;font-size:11px;background-color: #01c56c;color: white;border-radius: 15px;'>Finalizado</span>" : "<span style='padding: 5px;font-size:11px;background-color: #ffb822;color: white;border-radius: 15px;'>Em andamento</span>"); ?></th>
                                                <?php if($relatorio["tipo"] == 'Relatório de Alta') : ?>
                                                <th><?php echo (($relatorio['codigo']) ? "<a target='_BLANK' href='https://sis.entric.com.br/relatorio/".$relatorio['relatorio_code']."'><i class='fa fa-file-text-o'></i></a>" : "<button name='alterar_relatorio' style='border:0px;color:#abafb3;' data-relatorio='alta' data-nome='".$relatorio['nome']."' ><i class='fa fa-pencil-square-o'></i></button>") ?></th>
                                                <?php endif; ?>
                                                <?php if($relatorio["tipo"] == 'Dieta Enteral') : ?>
                                                <th><?php echo (($relatorio['codigo']) ? "<a target='_BLANK' href='https://sis.entric.com.br/relatorio_simplificada/".$relatorio['relatorio_code']."'><i class='fa fa-file-text-o'></i></a>" : "<button name='alterar_relatorio' style='border:0px;color:#abafb3;' data-relatorio='simplificada' data-nome='".$relatorio['nome']."' ><i class='fa fa-pencil-square-o'></i></button>") ?></th>
                                                <?php endif; ?>
                                                <?php if($relatorio["tipo"] == 'Suplemento') : ?>
                                                <th><?php echo (($relatorio['codigo']) ? "<a target='_BLANK' href='https://sis.entric.com.br/relatorio_suplemento/".$relatorio['relatorio_code']."'><i class='fa fa-file-text-o'></i></a>" : "<button name='alterar_relatorio' style='border:0px;color:#abafb3;' data-relatorio='suplemento' data-nome='".$relatorio['nome']."' ><i class='fa fa-pencil-square-o'></i></button>") ?></th>
                                                <?php endif; ?>
                                                <?php if($relatorio["tipo"] == 'Módulos') : ?>
                                                <th><?php echo (($relatorio['codigo']) ? "<a target='_BLANK' href='https://sis.entric.com.br/relatorio_modulo/".$relatorio['relatorio_code']."'><i class='fa fa-file-text-o'></i></a>" : "<button name='alterar_relatorio' style='border:0px;color:#abafb3;' data-relatorio='modulo' data-nome='".$relatorio['nome']."' ><i class='fa fa-pencil-square-o'></i></button>") ?></th>
                                                <?php endif; ?>
                                            </tr>
                                        <?php }
                                    
                                    ?>
                                </tbody>
                            </table>
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