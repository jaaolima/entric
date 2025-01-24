<?php
    require_once (ROOT . DS . 'api'. DS . 'src' . DS . 'libs' . DS .'connection.php');
    $id_paciente_redirecionado = $_SESSION['paciente_redirect']['id_paciente'];
    $_SESSION['paciente_redirect']['id_paciente'] = null;

    if($_SESSION['paciente_redirect']['buscar'] == 'buscar'){
        $tab1 = 'buscar';
        //fazer buscar old porque o sistema não deixa fazer usando o padrão
        $conn = new mysqli('142.93.0.124', 'private', '6Vn&c;!_WxO)', 'sistema');
        $sql = "SELECT * FROM paciente_suplementos WHERE id_paciente = {$id_paciente_redirecionado}";
        $result = $conn->query($sql);
        var_dump($result);
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
                <input type="hidden" name='id_paciente' value="<?php echo $id_paciente_redirecionado; ?>">
                <?php
                $item_dados =  $html->addRow(
                                array(
                                    "nome" => array(
                                        "col" => 12,
                                        "label" => "Nome do Paciente:",
                                        "required" => "required",
                                    ),
                                    "data_nascimento" => array(
                                        "col" => 5,
                                        "label" => "Data de Nascimento:",
                                        "class" => "data",
                                        "placeholder" => "dd/mm/aaaa",
                                        "required" => "required"
                                    ),
                                    "telefone" => array(
                                        "col" => 5,
                                        "label" => "Telefone:"
                                    ),
                                    "hospital" => array(
                                        "col" => 6,
                                        "label" => "Hospital:"
                                    ),
                                    "atendimento" => array(
                                        "col" => 4,
                                        "label" => "Atendimento:"
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
                                <th scope="col" class="text-center">Visualização Disponível para o Paciente</th>
                                <th scope="col">Editar/Desativar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="form-group row pt-5">
                    <div class="col-sm-6 text-left">
                        <button type="button" onclick="window.location.href='prescritor_prescricaosuplemento'" class="btn btn-secondary btn-form">VOLTAR</button>
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
                                            'value' => $nome
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