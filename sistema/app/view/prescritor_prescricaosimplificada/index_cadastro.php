<?php
    $id_paciente_redirecionado = $_SESSION['paciente_redirect']['id_paciente'];
    $_SESSION['paciente_redirect']['id_paciente'] = null;

    $ds_nome = '';
    if($_SESSION['paciente_redirect']['buscar'] == 'buscar'){
        $tab1 = 'buscar';
        $ds_nome = $_SESSION['paciente_redirect']['ds_nome'];
        $_SESSION['paciente_redirect']['ds_nome'] = null;
        $_SESSION['paciente_redirect']['buscar'] = null;
    }else{
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
                                        "value" => $ds_nome
                                    ),
                                    "data_nascimento" => array(
                                        "col" => 4,
                                        "label" => "Data de Nascimento:",
                                        "class" => "data",
                                        "placeholder" => "dd/mm/aaaa",
                                        "required" => "required",
                                        "value" => $dt_nascimento
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
                                "up_data_nascimento" => array(
                                    "col" => 4,
                                    "label" => "Data de Nascimento:",
                                    "class" => "data",
                                    "placeholder" => "dd/mm/aaaa",
                                    "required" => "required"
                                ),
                                "up_peso" => array(
                                    "col" => 4,
                                    "label" => "Peso:",
                                    "required" => "required"
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
                        <button type="button" onclick="window.location.href='prescritor_prescricaosimplificada'" class="btn btn-secondary btn-form">VOLTAR</button>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-warning btn-form" id="gerar_relatorio">GERAR NOVO RELATÓRIO</button>
                    </div>
                </div>
                <div class="row form-group" id="div_botao_valores" style="display:none;">
                    <div class="text-center col-sm-12">
                        <button type="button" class="btn btn-secondary" id="btn_valores_manualmente_atualizar">
                            <span class="btn-icon-right"><i class="fa fa-regular fa-file"></i></span>
                            Inserir valores manualmente
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-warning" id="btn_realizar_calculo_atualizar">
                            <span class="btn-icon-right"><i class="fa fa-solid fa-calculator"></i></span>
                            Desejo realizar os cálculos
                        </button>
                    </div> 
                </div>
                <div class="row form-group justify-content-center" id="div_valores_atualizar" style="display:none;">
                    <div class="col-md-4">
                        <div class="col-md-12" name='div_calculo_atualizar'>
                            <div class="w-100 mb-2" style="display: inline-block;text-align: end;white-space: nowrap;vertical-align: middle;padding: .7rem 1.8rem;font-size: 12px !important;border-radius: 5px;background: #eda349;border-color: #eda349;color: #fff;">
                                <span>Total</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group mb-1"> 
                                <div class="input-group-append">
                                    <span class="input-group-text" style="width:150px;">Calorias</span>
                                </div>
                                <input type="text" placeholder="kcal/kg" required="required" id="up_kcal_kg" name="up_kcal_kg" class="form-control div_calculo_atualizar" value=""> 
                                <input type="text" readonly placeholder="kcal/dia" required="required" id="up_kcal_dia" name="up_kcal_dia" class="form-control" value=""> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group mb-1"> 
                                <div class="input-group-append">
                                    <span class="input-group-text" style="width:150px;">Proteínas</span>
                                </div>
                                <input type="text" placeholder="g/kg" required="required" id="up_proteina_kg" name="up_proteina_kg" class="form-control div_calculo_atualizar" value=""> 
                                <input type="text" readonly placeholder="g/dia" required="required" id="up_proteina_dia" name="up_proteina_dia" class="form-control" value=""> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group mb-1"> 
                                <div class="input-group-append">
                                    <span class="input-group-text" style="width:150px;">Água</span>
                                </div>
                                <input type="text" placeholder="ml/kg" required="required" id="up_agua_kg" name="up_agua_kg" class="form-control div_calculo_atualizar" value=""> 
                                <input type="text" readonly placeholder="ml/dia" required="required" id="up_agua_dia" name="up_agua_dia" class="form-control" value=""> 
                            </div>
                        </div>
                        <div class="text-center col-sm-12 mt-4">
                            <button class="btn btn-danger" type="submit" id="iniciar_nova_prescricao">
                                <span class="btn-icon-right"><i class="fa fa-file-text-o"></i></span>
                                Iniciar Prescrição
                            </button>
                        </div> 
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