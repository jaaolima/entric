<?php
    $sistema = '';
    if($_SESSION['paciente_redirect']['sistema'] == 'EN'){ 
        $id_paciente_redirecionado = $_SESSION['paciente_redirect']['id_paciente'];
        $_SESSION['paciente_redirect']['id_paciente'] = null;
        $sistema = 'EN';
        $_SESSION['paciente_redirect']['sistema'] = null;
    }
    if($_SESSION['paciente_redirect']['sistema'] == 'ibranutro'){
        $id_admissao_redirecionado = $_SESSION['paciente_redirect']['id_admissao'];
        $_SESSION['paciente_redirect']['id_admissao'] = null;
        $sistema = 'ibranutro';
        $_SESSION['paciente_redirect']['sistema'] = null;
    }

    $ds_nome = '';
    $ds_hospital = '';
    $dt_nascimento = '';
    $nu_telefone = '';
    $nu_atendimento = ''; 

    if($_SESSION['paciente_redirect']['buscar'] == 'buscar'){
        $tab1 = 'buscar';
        $ds_nome = $_SESSION['paciente_redirect']['ds_nome'];
        $_SESSION['paciente_redirect']['ds_nome'] = null;
        $_SESSION['paciente_redirect']['buscar'] = null;
    }else if($_SESSION['paciente_redirect']['buscar'] == 'cadastrar'){ 
        $ds_nome = $_SESSION['paciente_redirect']['ds_nome'];
        $_SESSION['paciente_redirect']['ds_nome'] = null;

        $id_hospital = $_SESSION['paciente_redirect']['id_hospital'];
        switch ($id_hospital) {
            case '1':
                $ds_hospital = 'HOSPITAL SANTA HELENA';
                break;
            case '3':
                $ds_hospital = 'HOSPITAL SANTA LÚCIA GAMA';
                break;
            case '4':
                $ds_hospital = 'HOSPITAL SANTA LUCIA SUL';
                break;
            case '5':
                $ds_hospital = 'HOSPITAL SÃO FRANCISCO';
                break;
            case '6':
                $ds_hospital = 'HOSPITAL DO CORAÇÃO';
                break;
            case '7':
                $ds_hospital = 'HOSPITAL SANTA LUZIA';
                break;
            case '8':
                $ds_hospital = 'HOSPITAL DF STAR';
                break;
            case '9':
                $ds_hospital = 'HOSPITAL DE TESTES';
                break;
            case '10':
                $ds_hospital = 'HOSPITAL SANTA LÚCIA NORTE';
                break;
            case '11':
                $ds_hospital = 'HOSPITAL ANCHIETA';
                break;
            case '12':
                $ds_hospital = 'HOSPITAL VILA NOVA STAR';
                break;
            case '13':
                $ds_hospital = 'HOSPITAL SANTA ISABEL';
                break;
            case '14':
                $ds_hospital = 'HOSPITAL DAHER';
                break;
            case '15':
                $ds_hospital = 'HOSPITAL SÃO LUIZ ITAIM';
                break;
            case '16':
                $ds_hospital = 'HOSPITAL SÃO LUIZ MORUMBI';
                break;
            case '17':
                $ds_hospital = 'TERCEIROS VILA NOVA STAR';
                break;
            case '18':
                $ds_hospital = 'HOSPITAL SÃO LUIZ JABAQUARA';
                break;

            case '19':
                $ds_hospital = 'HOSPITAL DA CRIANÇA';
                break;
            default:
                $ds_hospital = '';
                break;
        }
        $_SESSION['paciente_redirect']['id_hospital'] = null;

        $dt_nascimento = $_SESSION['paciente_redirect']['dt_nascimento'];
        if($dt_nascimento != null){
            $dt_nascimento = date('d/m/Y', strtotime($dt_nascimento));
        }
        $_SESSION['paciente_redirect']['dt_nascimento'] = null;

        $nu_telefone = $_SESSION['paciente_redirect']['nu_telefone'];
        $_SESSION['paciente_redirect']['nu_telefone'] = null;

        $nu_atendimento = $_SESSION['paciente_redirect']['nu_atendimento'];
        $_SESSION['paciente_redirect']['nu_atendimento'] = null;
    }else if($_SESSION['paciente_redirect']['buscar'] == 'alterar_relatorio'){
        $tab1 = 'buscar';
        $ds_nome = $_SESSION['paciente_redirect']['ds_nome'];
        $_SESSION['paciente_redirect']['ds_nome'] = null;
        $_SESSION['paciente_redirect']['buscar'] = null;
    }
?>
<div class="tab-pane fade show active" id="cadastro" role="tabpanel">
    <div class="pt-3">

        <div class="text-center">

            <button type="button" onclick="rangeCaloria(2400);" class="btn <?php echo ($tab1=="cadastrar"?"btn-warning":"btn-secondary"); ?> btn-sm" id="cadastrar_paciente">
                <span class="btn-icon-right"><i class="fa fa-user"></i></span>
                CADASTRAR PACIENTE
            </button>
            &nbsp;
            <button type="button" class="btn <?php echo ($tab1=="buscar"?"btn-warning":"btn-secondary"); ?> btn-sm" id="buscar_paciente">
                <span class="btn-icon-right"><i class="fa fa-search"></i></span>
                BUSCAR PACIENTE CADASTRADO
            </button> 
        </div>
        
        <input type="hidden" name="cad_idade" id="cad_idade" value="" />
        <input type="hidden" name="cad_sexo" id="cad_sexo" value="" />


        <div id="div_cadastrar_paciente" style="<?php echo ($tab1=="cadastrar"?"display: block;":"display: none;"); ?>">
            <form action="prescritor_relatorioalta" id="form_cadastrar_paciente" method="post" autocomplete="off" onsubmit="return false">
                <input type="hidden" name="action" id="action" value="cadastrar"/>
                <input type="hidden" name="login_tipo" id="login_tipo" value="<?php echo $_SESSION['login']; ?>">
                <?php if($sistema == 'EN') : ?>
                <input type="hidden" name='id_paciente' value="<?php echo $id_paciente_redirecionado; ?>">
                <input type="hidden" name='sistema' value="<?php echo $sistema; ?>">
                <?php endif; ?>
                <?php if($sistema == 'ibranutro') : ?>
                <input type="hidden" name='id_admissao' value="<?php echo $id_admissao_redirecionado; ?>">
                <input type="hidden" name='sistema' value="<?php echo $sistema; ?>"> 
                <?php endif; ?>
                <?php
                $item_dados =  $html->addRow(
                                array(
                                    "nome" => array(
                                        "col" => 12,
                                        "label" => "Nome do Paciente:",
                                        "required" => "required",
                                        "value" => $ds_nome
                                    ),
                                    "data_nascimento" => array(
                                        "col" => 5,
                                        "label" => "Data de Nascimento:",
                                        "class" => "data",
                                        "placeholder" => "dd/mm/aaaa",
                                        "required" => "required",
                                        "value" => $dt_nascimento
                                    ),
                                    "telefone" => array(
                                        "col" => 5,
                                        "label" => "Telefone:",
                                        "value" => $nu_telefone
                                    ),
                                    "hospital" => array(
                                        "col" => 6,
                                        "label" => "Hospital:",
                                        "value" => $ds_hospital
                                    ),
                                    "atendimento" => array(
                                        "col" => 4,
                                        "label" => "Atendimento:",
                                        "value" => $nu_atendimento
                                    ),
                                )
                            );
                    echo $item_dados;
                ?>
                <div class="row form-group">
                    <div class="text-center col-sm-12 mt-4">
                        <button class="btn btn-danger" type="submit" onclick="fc_cadastrar_paciente();">
                            <span class="btn-icon-right"><i class="fa fa-file-text-o"></i></span>
                            Cadastrar
                        </button>
                    </div> 
                    
                </div>
                
            </form>
        </div>
        <div id="div_buscar_paciente" style="<?php echo ($tab1=="buscar"?"display: block;":"display: none;"); ?>">
            <div id="listar_pacientes" style="display: none;">
                <form action="prescritor_relatorioalta" id="form_atualizar_paciente" method="post" autocomplete="off" onsubmit="return false">
                    <input type="hidden" name="action" id="action" value="atualizar"/>
                    <input type="hidden" name="up_id" id="up_id" value=""/>
                    <?php
                        $item_dados =  $html->addRow(
                            array(
                                "up_nome" => array(
                                    "col" => 12,
                                    "label" => "Nome do Paciente:",
                                    "required" => "required",
                                ),
                                "up_data_nascimento" => array(
                                    "col" => 5,
                                    "label" => "Data de Nascimento:",
                                    "class" => "data",
                                    "placeholder" => "dd/mm/aaaa",
                                    "required" => "required"
                                ),
                                "up_telefone" => array(
                                    "col" => 5,
                                    "label" => "Telefone:"
                                ),
                                "up_hospital" => array(
                                    "col" => 6,
                                    "label" => "Hospital:"
                                ),
                                "up_atendimento" => array(
                                    "col" => 4,
                                    "label" => "Atendimento:"
                                ),
                            )
                        );
                        echo $item_dados;
                    ?>
                    <div class="form-group row pt-5">
                        <div class="col-sm-6 text-right">
                            <button type="button" onclick="fc_limpar_paciente();" class="btn btn-secondary btn-form">VOLTAR</button>
                        </div>
                        <div class="col-sm-6 text-left">
                            <button type="submit" onclick="fc_atualizar_paciente();" class="btn btn-warning btn-form">Atualizar</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive pt-5" style="max-height: 400px;">
                    <table class="table table-bordered table-hover table-striped" id="table_lista_pacientes">
                        <thead>
                            <tr>
                                <th scope="col">Relatório</th>
                                <th scope="col">Data</th>
                                <th scope="col">Editar/Desativar/Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="form-group row pt-5">
                    <div class="col-sm-6 text-left">
                        <button type="button" onclick="window.location.href='prescritor_prescricaomodulo'" class="btn btn-secondary btn-form">VOLTAR</button>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-warning btn-form" id="iniciar_nova_prescricao">GERAR NOVO RELATÓRIO</button>
                    </div>
                </div>
            </div>

            <div id="buscar_pacientes" class="display: block;">
                <form action="prescritor_relatorioalta" id="prescritor_relatorioalta" name="prescritor_relatorioalta" method="post" onsubmit="return false">
                    <input type="hidden" name="action" id="action" value="buscar"/>
                    <input type="hidden" name="id_paciente" id="id_paciente" value="" />
                    <input type="hidden" name="id_relatorio" id="id_relatorio" value="" />
                    <input type="hidden" name="relatorio_code" id="relatorio_code" value="" />

                    <?php
                    $item_dados =  $html->addRow(
                                    array(
                                        "nome" => array(
                                            "col" => 12,
                                            "label" => "Nome do Paciente:",
                                            "value" => $ds_nome
                                        ),
                                        "data_nascimento" => array(
                                            "col" => 6,
                                            "label" => "Data de Nascimento:",
                                            "class" => "data",
                                            "placeholder" => "dd/mm/aaaa"
                                        )
                                    )
                                );
                        echo $item_dados; 
                    ?>

                    <div class="modal fade" id="modal_retorno_pacientes" tabindex="-1" role="dialog" aria-labelledby="modal_retorno_pacientes" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pacientes Encontrados</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-clique" id="table_retorno_pacientes">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Data de Nascimento</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row pt-5">
                        <div class="col-sm-12 text-center">
                            <button type="submit" onclick="fc_buscar_paciente();" class="btn btn-secondary btn-form">BUSCAR</button>                                                             
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>