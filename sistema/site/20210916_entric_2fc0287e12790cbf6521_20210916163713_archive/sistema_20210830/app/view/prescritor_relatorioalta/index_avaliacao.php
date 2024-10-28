<div class="tab-pane fade" id="avaliacao" role="tabpanel">
    <form action="prescritor_relatorioalta" method="post" autocomplete="off">
        <?php
        $item_dados =  $html->addRow(
                        array(
                            "data" => array(
                                "col" => 12,
                                "label" => "Data:",
                                "class" => "data",
                                "placeholder" => "dd/mm/aaaa",
                                "required" => "required"
                            )
                        ));

        $item_dados .= '<div class="row entric_grid">
                            <div class="form-group col-sm-12">
                                <div class="entric_group p-3">
                                    <div class="form-check">
                                        <label class="grid_label">Antropometria</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group mb-1"> 
                                                <div class="input-group-prepend">
                                                    <select id="altura" name="altura" aria-controls="altura" class="form-control input-sm select_altura">
                                                        <option value="">Altura</option>
                                                        <option value="Altura aferida">Altura aferida</option>
                                                        <option value="Altura estimada">Altura estimada</option>
                                                        <option value="Altura referida">Altura referida</option>
                                                    </select>
                                                </div>
                                                <input type="text" placeholder="0.00" required="required" name="altura_valor" class="form-control float" value="0.00" data-decimals="2" min="0" max="3.00" step="0.01"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text">m</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 antropometria_col">
                                            <div class="row antropometria">
                                                <div class="col-md-7">
                                                    <div class="form-group input-group mb-1"> 
                                                        <div class="input-group-prepend">
                                                            <select name="peso[]" aria-controls="peso" class="form-control input-sm select_peso">
                                                                <option value="">Peso</option>
                                                                <option value="Peso ideal">Peso ideal</option>
                                                                <option value="Peso aferido">Peso aferido</option>
                                                                <option value="Peso usual">Peso usual</option>
                                                                <option value="Peso referido">Peso referido</option>
                                                                <option value="Peso estimado">Peso estimado</option>
                                                                <option value="Peso ajustado">Peso ajustado</option>
                                                            </select>
                                                        </div>
                                                        <input type="text" placeholder="0.000" required="required" name="peso_valor[]" class="form-control float input_peso_valor" data-affixes-stay="true" data-prefix="" data-thousands="" data-decimal="." data-precision="3" /> 
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kg</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group input-group mb-1">
                                                        <input type="text" placeholder="IMC*" readonly="1" name="imc[]" class="form-control float input_imc"> 
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Kg/m2</span>
                                                            <button class="btn btn-secondary btn_peso_mc_add" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                            <button class="btn btn-danger btn_peso_mc_rm none" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';

        $item_dados .= '<div class="row entric_grid">
                            <div class="form-group col-sm-6">
                                <div class="entric_group p-3 circunferencias_col">
                                    <div class="form-check">
                                        <label class="grid_label">Circunferência</label>
                                    </div>
                                    <div class="row pt-2 pr-4 pb-1 pl-4 circunferencias">
                                        <div class="form-group input-group mb-1"> 
                                            <div class="input-group-prepend">
                                                <select name="circunferencias[]" aria-controls="circunferencias" class="form-control input-sm select_circunferencias">
                                                    <option value="">Circunferências</option>
                                                    <option value="Circunferência do braço">Circunferência do braço</option>
                                                    <option value="Circunferência da panturrilha">Circunferência da panturrilha</option>
                                                    <option value="Circunferência da cintura">Circunferência da cintura</option>
                                                </select>
                                            </div>
                                            <input type="text" placeholder="0.00" required="required" name="circunferencias_valor[]" class="form-control float input_circunferencias_valor"> 
                                            <div class="input-group-append">
                                                <span class="input-group-text">cm</span>
                                                <span class="input-group-text">
                                                    <div class="form-radio">
                                                        <input id="circunferencia_lado_direito[0]" class="radio-outlined circunferencia_lado" name="circunferencia_lado" type="radio" value="Direito">
                                                        <label for="circunferencia_lado_direito[0]" class="radio-green">Direito</label>
                                                    </div>
                                                </span>
                                                <span class="input-group-text">
                                                    <div class="form-radio">
                                                        <input id="circunferencia_lado_esquerdo[0]" class="radio-outlined circunferencia_lado" name="circunferencia_lado" type="radio" value="Esquerdo">
                                                        <label for="circunferencia_lado_esquerdo[0]" class="radio-green">Esquerdo</label>
                                                    </div>
                                                </span>
                                                <button class="btn btn-secondary btn_circunferencias_add" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                <button class="btn btn-danger btn_circunferencias_rm none" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <div class="entric_group p-3 dobras_col">
                                    <div class="form-check">
                                        <label class="grid_label">Dobras</label>
                                    </div>
                                    <div class="row pt-2 pr-4 pb-1 pl-4 dobras">
                                        <div class="form-group input-group mb-1"> 
                                            <div class="input-group-prepend">
                                                <select name="dobras[]" aria-controls="dobras" class="form-control input-sm select_dobras">
                                                    <option value="">Dobras</option>
                                                    <option value="Dobras Cutâneas">Dobras Cutâneas</option>
                                                    <option value="Dobra tricipital">Dobra tricipital</option>
                                                    <option value="Dobra bicipital">Dobra bicipital</option>
                                                    <option value="Dobra subescapular">Dobra subescapular</option>
                                                    <option value="Dobra supra ilíaca">Dobra supra ilíaca</option>
                                                    <option value="Dobra abdominal">Dobra abdominal</option>
                                                    <option value="Dobra peitoral">Dobra peitoral</option>
                                                    <option value="Dobra coxa medial">Dobra coxa medial</option>
                                                </select>
                                            </div>
                                            <input type="text" placeholder="0.00" required="required" name="dobras_valor[]" class="form-control float input_dobras_valor">
                                            <div class="input-group-append"> 
                                                <span class="input-group-text">cm</span>
                                                <span class="input-group-text">
                                                    <div class="form-radio">
                                                        <input id="dobras_lado_direito[0]" class="radio-outlined dobras_lado" name="dobras_lado" type="radio" value="Direito">
                                                        <label for="dobras_lado_direito[0]" class="radio-green">Direito</label>
                                                    </div>
                                                </span>
                                                <span class="input-group-text">
                                                    <div class="form-radio">
                                                        <input id="dobras_lado_esquerdo[0]" class="radio-outlined dobras_lado" name="dobras_lado" type="radio" value="Esquerdo">
                                                        <label for="dobras_lado_esquerdo[0]" class="radio-green">Esquerdo</label>
                                                    </div>
                                                </span>
                                                <button class="btn btn-secondary btn_dobras_add" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                <button class="btn btn-danger btn_dobras_rm none" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';


        $item_dados .= $html->addRow(
                    array(
                    "observacao" => array(
                        "col" => 12,
                        "label" => false,
                        "placeholder" => "Observação (opcional)",
                        "textarea" => ""
                    ),
                    "exames_nutricionais_complementares" => array(
                        "col" => 6,
                        "label" => "Exames Nutricionais Complementares",
                        "textarea" => "height: 80px;"
                    ),
                    "diagnostico_nutricional" => array(
                        "col" => 6,
                        "label" => "Diagnóstico Nutricional",
                        "textarea" => "height: 80px;"
                    ),
                    "triagem_nutricional" => array(
                        "col" => 4,
                        "label" => "Triagem Nutricional",
                        "textarea" => "height: 100px;"
                    ),
                    "exame_fisico" => array(
                        "col" => 4,
                        "label" => "Exame Físico",
                        "textarea" => "height: 100px;"
                    ),
                    "exame_bioquimico" => array(
                        "col" => 4,
                        "label" => "Exames Bioquímicos",
                        "textarea" => "height: 100px;"
                    )
                )
            );
            echo $item_dados;
        ?>

        <div class="form-group row pt-5">
            <div class="col-sm-6 text-left">
                <button type="button" class="btn btn-secondary btn-sm" id="avaliacao_salvar">
                    <span class="btn-icon-right"><i class="fa fa-save"></i></span>
                    SALVAR
                </button>
            </div>
            <div class="col-sm-6 text-right">
                <button type="button" class="btn btn-secondary btn-form" id="avaliacao_voltar">VOLTAR</button>
                &nbsp;
                <button type="button" class="btn btn-warning btn-form" id="avaliacao_avancar">AVANÇAR</button>
            </div>
        </div>
    </form>
</div>