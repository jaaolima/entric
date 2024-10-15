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
                <div class="row form-group">
                    <div class="text-center col-sm-12">
                        <button type="button" class="btn btn-secondary">
                            <span class="btn-icon-right"><i class="fa fa-regular fa-file"></i></span>
                            Inserir valores manualmente
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-warning" id="buscar_paciente">
                            <span class="btn-icon-right"><i class="fa fa-solid fa-calculator"></i></span>
                            Desejo realizar os cálculos
                        </button>
                    </div> 
                </div>
                <div class="row form-group text-center">
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="form-group input-group mb-1"> 
                                <div class="input-group-append">
                                    <span class="input-group-text" style="width:150px;">Calorias</span>
                                </div>
                                <input type="text" placeholder="kcal/kg" required="required" id="altura_valor" name="altura_valor" class="form-control floatcomma" value=""> 
                                <input type="text" placeholder="kcal/dia" required="required" id="altura_valor" name="altura_valor" class="form-control floatcomma" value=""> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group mb-1"> 
                                <div class="input-group-append">
                                    <span class="input-group-text" style="width:150px;">Proteínas</span>
                                </div>
                                <input type="text" placeholder="g/kg" required="required" id="altura_valor" name="altura_valor" class="form-control floatcomma" value=""> 
                                <input type="text" placeholder="g/dia" required="required" id="altura_valor" name="altura_valor" class="form-control floatcomma" value=""> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group mb-1"> 
                                <div class="input-group-append">
                                    <span class="input-group-text" style="width:150px;">Água</span>
                                </div>
                                <input type="text" placeholder="ml/kg" required="required" id="altura_valor" name="altura_valor" class="form-control floatcomma" value=""> 
                                <input type="text" placeholder="ml/dia" required="required" id="altura_valor" name="altura_valor" class="form-control floatcomma" value=""> 
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>