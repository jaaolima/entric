<div class="tab-pane fade show active" id="cadastro" role="tabpanel">
    <div class="pt-3">

        <div class="text-center">
            <button type="button" class="btn <?php echo ($tab1=="cadastrar"?"btn-warning":"btn-secondary"); ?> btn-sm" id="cadastrar_paciente">
                <span class="btn-icon-right"><i class="fa fa-user"></i></span>
                CADASTRAR PACIENTE
            </button>
            &nbsp;
            <button type="button" class="btn <?php echo ($tab1=="buscar"?"btn-warning":"btn-secondary"); ?> btn-sm" id="buscar_paciente">
                <span class="btn-icon-right"><i class="fa fa-search"></i></span>
                BUSCAR PACIENTE CADASTRADO
            </button>
        </div>

        <div id="div_cadastrar_paciente" style="<?php echo ($tab1=="cadastrar"?"display: block;":"display: none;"); ?>">
            <form action="prescritor_relatorioalta" method="post" autocomplete="off">
                <input type="hidden" name="action" id="action" value="cadastrar"/>

                <?php
                $item_dados =  $html->addRow(
                                array(
                                    "nome" => array(
                                        "col" => 12,
                                        "label" => "Nome do Paciente:",
                                        "required" => "required"
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
                                        "col" => 6,
                                        "label" => "Data de Nascimento:",
                                        "class" => "data",
                                        "placeholder" => "dd/mm/aaaa",
                                        "required" => "required"
                                    ),
                                    "sexo" => array(
                                        "col" => 6,
                                        "label" => "Sexo:",
                                        "radiobutton" => array(
                                            "masculino" => "Masculino",
                                            "feminino" => "Feminino",
                                        ),
                                        "required" => "required"
                                    ),
                                    "cpf" => array(
                                        "col" => 3,
                                        "label" => "CPF:",
                                        "class" => "cpf",
                                        "placeholder" => "999.999.999-99"
                                    ),
                                    "cpf_possui" => array(
                                        "col" => 3,
                                        "label" => "Desconhece / Não possui",
                                        "checkbox" => true
                                    ),
                                    "mae" => array(
                                        "col" => 4,
                                        "label" => "Nome da Mãe:"
                                    ),
                                    "mae_possui" => array(
                                        "col" => 2,
                                        "label" => "Desconhece",
                                        "checkbox" => true
                                    )
                                )
                            );
                    echo $item_dados;
                ?>
                <div class="form-group row pt-5">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-warning btn-form">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="div_buscar_paciente" style="<?php echo ($tab1=="buscar"?"display: block;":"display: none;"); ?>">
            <?php 
            if (isset($dados_busca)){
                ?>
                <div class="table-responsive pt-5" style="max-height: 400px;">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Relatório</th>
                                <th scope="col">Data</th>
                                <th scope="col">Disponível para visualização do Paciente</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($dados_busca){
                                for($i = 0; $i < count($dados_busca); $i++){
                                ?>
                                <tr>
                                    <td><?php echo $dados_busca[$i]['nome'];?></td>
                                    <td><?php echo sql2date($dados_busca[$i]['data_criacao']);?></td>
                                    <td></td>
                                    <td>
                                        <a href="javascript:void(0);"><i class="fa fa-pencil-square-o"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
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
                </div>
                    <div class="form-group row pt-5">
                        <div class="col-sm-6 text-left">
                            <button type="button" onclick="window.location.href='prescritor_relatorioalta'" class="btn btn-secondary btn-form">VOLTAR</button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-warning btn-form" id="gerar_relatorio">GERAR NOVO RELATÓRIO</button>
                        </div>
                    </div>

            <?php
            }
            else{
                ?>
                <form action="prescritor_relatorioalta" id="prescritor_relatorioalta" name="prescritor_relatorioalta" method="post" onsubmit="return false">
                    <input type="hidden" name="action" id="action" value="buscar"/>

                    <?php
                    $item_dados =  $html->addRow(
                                    array(
                                        "nome" => array(
                                            "col" => 12,
                                            "label" => "Nome do Paciente:"
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
                <?php
            }
            ?>
        </div>
    </form>
    </div>
</div>