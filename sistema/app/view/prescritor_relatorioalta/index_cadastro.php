<?php
    $hospitais_map = array(
        '1' => 'HOSPITAL SANTA HELENA',
        '3' => 'HOSPITAL SANTA LÚCIA GAMA',
        '4' => 'HOSPITAL SANTA LUCIA SUL',
        '5' => 'HOSPITAL SÃO FRANCISCO',
        '6' => 'HOSPITAL DO CORAÇÃO',
        '7' => 'HOSPITAL SANTA LUZIA',
        '8' => 'HOSPITAL DF STAR',
        '9' => 'HOSPITAL DE TESTES',
        '10' => 'HOSPITAL SANTA LÚCIA NORTE',
        '11' => 'HOSPITAL ANCHIETA',
        '12' => 'HOSPITAL VILA NOVA STAR',
        '13' => 'HOSPITAL SANTA ISABEL',
        '14' => 'HOSPITAL DAHER',
        '15' => 'HOSPITAL SÃO LUIZ ITAIM',
        '16' => 'HOSPITAL SÃO LUIZ MORUMBI', 
        '17' => 'TERCEIROS VILA NOVA STAR',
        '18' => 'HOSPITAL SÃO LUIZ JABAQUARA',
        '19' => 'HOSPITAL DA CRIANÇA',
    );
    
    $ds_nome = '';
    if($_SESSION['paciente_redirect']['buscar'] == 'alterar_relatorio'){
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
                <?php
                if ($_SESSION['login'] == 'ibranutro') {
                    // Usar nomes dos hospitais como chaves e valores para o select
                    $hospitais_select_por_nome = [];
                    foreach ($hospitais_map as $id => $nome) {
                        // A chave e o valor da opção serão o NOME do hospital
                        $hospitais_select_por_nome[$nome] = $nome;
                    }
                    $hospitais_select_por_nome = array("" => "Selecione") + $hospitais_select_por_nome;
                    $campo_hospital = array("col" => 6, "label" => "Hospital:", "value" => $ds_hospital, "select" => $hospitais_select_por_nome);
                } else {
                    $campo_hospital = array("col" => 6, "label" => "Hospital:", "value" => $ds_hospital);
                }

                $item_dados =  $html->addRow(
                                array(
                                    "nome" => array(
                                        "col" => 12,
                                        "label" => "Nome do Paciente:",
                                        "required" => "required",
                                    ),
                                    "celular" => array(
                                        "col" => 4,
                                        "label" => "Celular:",
                                        "class" => "telefone",
                                        "placeholder" => "(99) 99999-9999",
                                        "required" => "required"
                                    ),
                                    "pertence" => array(
                                        "col" => 4,
                                        "label" => "De quem é o celular?",
                                        "required" => "required",
                                        "select" => array(
                                            "" => "selecione...",
                                            "paciente" => "Paciente",
                                            "familiar" => "Familiar",
                                            "cuidador" => "Cuidador",
                                        )
                                    ),
                                    "parentesco" => array(
                                        "col" => 4,
                                        "label" => "Qual o Parentesco?"
                                    ),
                                    "data_nascimento" => array(
                                        "col" => 4,
                                        "label" => "Data de Nascimento:",
                                        "class" => "data",
                                        "placeholder" => "dd/mm/aaaa",
                                        "required" => "required"
                                    ),
                                    "sexo" => array(
                                        "col" => 4,
                                        "label" => "Sexo:",
                                        "radiobutton" => array(
                                            "masculino" => "Masculino",
                                            "feminino" => "Feminino",
                                        ),
                                        "required" => "required"
                                    ),
                                    "email" => array(
                                        "col" => 4,
                                        "label" => "E-mail:",
                                        "required" => "required"
                                    ),
                                    "cpf" => array(
                                        "col" => 3,
                                        "label" => "CPF:",
                                        "class" => "cpf",
                                        "placeholder" => "999.999.999-99",
                                        "required" => "required"
                                    ),
                                    "cpf_possui" => array(
                                        "col" => 3,
                                        "label" => "Desconhece / Não possui",
                                        "checkbox" => true
                                    ),
                                    "mae" => array(
                                        "col" => 4,
                                        "label" => "Nome da Mãe:",
                                        "required" => "required"
                                    ),
                                    "mae_possui" => array(
                                        "col" => 2,
                                        "label" => "Desconhece",
                                        "checkbox" => true
                                    ),
                                    "hospital" => $campo_hospital,

                                    
                                )
                            );
                    echo $item_dados;
                ?>
                <div class="form-group row pt-5">
                    <div class="col-sm-12 text-right">
                        <button type="submit" onclick="fc_cadastrar_paciente();" class="btn btn-warning btn-form">Cadastrar</button>
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
                                        "up_cpf_possui" => array(
                                            "col" => 3,
                                            "label" => "Desconhece / Não possui",
                                            "checkbox" => true
                                        ),
                                        "up_celular" => array(
                                            "col" => 4,
                                            "label" => "Celular:",
                                            "class" => "telefone",
                                            "placeholder" => "(99) 99999-9999",
                                            "required" => "required"
                                        ),
                                        "up_pertence" => array(
                                            "col" => 4,
                                            "label" => "De quem é o celular?",
                                            "required" => "required",
                                            "select" => array(
                                                "" => "selecione...",
                                                "paciente" => "Paciente",
                                                "familiar" => "Familiar",
                                                "cuidador" => "Cuidador",
                                            )
                                        ),
                                        "up_parentesco" => array(
                                            "col" => 4,
                                            "label" => "Qual o Parentesco?"
                                        ),
                                        "up_data_nascimento" => array(
                                            "col" => 4,
                                            "label" => "Data de Nascimento:",
                                            "class" => "data",
                                            "placeholder" => "dd/mm/aaaa",
                                            "required" => "required"
                                        ),
                                        "up_sexo" => array(
                                            "col" => 4,
                                            "label" => "Sexo:",
                                            "radiobutton" => array(
                                                "masculino" => "Masculino",
                                                "feminino" => "Feminino",
                                            ),
                                            "required" => "required"
                                        ),
                                        "up_email" => array(
                                            "col" => 4,
                                            "label" => "E-mail:",
                                            "required" => "required"
                                        ),
                                        "up_cpf" => array(
                                            "col" => 3,
                                            "label" => "CPF:",
                                            "class" => "cpf",
                                            "placeholder" => "999.999.999-99",
                                            "readonly" => "readonly"
                                        ),
                                        "up_cpf_possui" => array(
                                            "col" => 3,
                                            "label" => "Desconhece / Não possui",
                                            "checkbox" => true
                                        ),
                                        "up_mae" => array(
                                            "col" => 4,
                                            "label" => "Nome da Mãe:",
                                            "required" => "required"
                                        ),
                                        "up_mae_possui" => array(
                                            "col" => 2,
                                            "label" => "Desconhece",
                                            "checkbox" => true
                                        ),
                                        "up_hospital" => $campo_hospital
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
                                <th scope="col">Usuário</th>
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
                        <button type="button" onclick="window.location.href='prescritor_relatorioalta'" class="btn btn-secondary btn-form">VOLTAR</button>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-warning btn-form" id="gerar_relatorio">GERAR NOVO RELATÓRIO</button>
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
                                            'value' => $ds_nome
                                        ),
                                        "data_nascimento" => array(
                                            "col" => 6,
                                            "label" => "Data de Nascimento:",
                                            "class" => "data",
                                            "placeholder" => "dd/mm/aaaa"
                                        ),
                                        "cpf" => array(
                                            "col" => 6,
                                            "label" => "CPF:",
                                            "class" => "cpf",
                                            "placeholder" => "999.999.999-99"
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
                                                    <th scope="col">CPF</th>
                                                    <th scope="col">Mãe</th>
                                                    <th scope="col">Data de Nascimento</th>
                                                    <th scope="col">Sexo</th>
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