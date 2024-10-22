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
                <?php
                $item_dados =  $html->addRow(
                                array(
                                    "nome" => array(
                                        "col" => 12,
                                        "label" => "Nome do Paciente:",
                                        "required" => "required",
                                    ),
                                    "data_nascimento" => array(
                                        "col" => 4,
                                        "label" => "Data de Nascimento:",
                                        "class" => "data",
                                        "placeholder" => "dd/mm/aaaa",
                                        "required" => "required"
                                    ),
                                    "peso" => array(
                                        "col" => 4,
                                        "label" => "Peso:",
                                        "required" => "required"
                                    )
                                )
                            );
                    echo $item_dados;
                ?>
                <div class="row form-group">
                    <div class="text-center col-sm-12">
                        <button type="button" class="btn btn-secondary" id="btn_valores_manualmente">
                            <span class="btn-icon-right"><i class="fa fa-regular fa-file"></i></span>
                            Inserir valores manualmente
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-warning" id="btn_realizar_calculo">
                            <span class="btn-icon-right"><i class="fa fa-solid fa-calculator"></i></span>
                            Desejo realizar os cálculos
                        </button>
                    </div> 
                </div>
                <div class="row form-group justify-content-center" id="div_valores" style="display:none;">
                    <div class="col-md-4">
                        <div class="col-md-12" name='div_calculo'>
                            <div class="w-100 mb-2" style="display: inline-block;text-align: end;white-space: nowrap;vertical-align: middle;padding: .7rem 1.8rem;font-size: 12px !important;border-radius: 5px;background: #eda349;border-color: #eda349;color: #fff;">
                                <span>Total</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group mb-1"> 
                                <div class="input-group-append">
                                    <span class="input-group-text" style="width:150px;">Calorias</span>
                                </div>
                                <input type="text" placeholder="kcal/kg" required="required" id="kcal_kg" name="kcal_kg" class="form-control div_calculo" value=""> 
                                <input type="text" readonly placeholder="kcal/dia" required="required" id="kcal_dia" name="kcal_dia" class="form-control" value=""> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group mb-1"> 
                                <div class="input-group-append">
                                    <span class="input-group-text" style="width:150px;">Proteínas</span>
                                </div>
                                <input type="text" placeholder="g/kg" required="required" id="proteina_kg" name="proteina_kg" class="form-control div_calculo" value=""> 
                                <input type="text" readonly placeholder="g/dia" required="required" id="proteina_dia" name="proteina_dia" class="form-control" value=""> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group mb-1"> 
                                <div class="input-group-append">
                                    <span class="input-group-text" style="width:150px;">Água</span>
                                </div>
                                <input type="text" placeholder="ml/kg" required="required" id="agua_kg" name="agua_kg" class="form-control div_calculo" value=""> 
                                <input type="text" readonly placeholder="ml/dia" required="required" id="agua_dia" name="agua_dia" class="form-control" value=""> 
                            </div>
                        </div>
                        <div class="text-center col-sm-12 mt-4">
                            <button class="btn btn-danger" type="submit" onclick="fc_cadastrar_paciente();">
                                <span class="btn-icon-right"><i class="fa fa-file-text-o"></i></span>
                                Iniciar Prescrição
                            </button>
                        </div> 
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
                                        )
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
            </div>
        </div>
    </div>
</div>