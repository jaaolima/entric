<div class="tab-pane fade show active" id="cadastro" role="tabpanel">
    <div class="pt-3">
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
                <div class="row">
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
                </div>
                <div class="form-group row pt-5">
                    <div class="col-sm-12 text-right">
                        <button type="submit" onclick="fc_cadastrar_paciente();" class="btn btn-warning btn-form">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>