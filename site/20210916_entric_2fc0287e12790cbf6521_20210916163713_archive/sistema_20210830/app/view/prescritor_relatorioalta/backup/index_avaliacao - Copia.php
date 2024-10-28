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
                            ),
                            "hrm" => array(
                                "col" => 12,
                                "type" => "div",
                                "form-class" => "text-left mb-2",
                                "content" => "Antropometria:"
                            ),
                            "peso" => array(
                                "col" => 2,
                                "label" => false,
                                "class" => "float",
                                "placeholder" => "Peso*",
                                "required" => "required",
                                "input-group-append" => "kg"
                            ),
                            "peso" => array(
                                "col" => 2,
                                "label" => false,
                                "required" => "required",
                                "select" => array(
                                    "" => "Peso",
                                    "Peso ideal" => "Peso ideal",
                                    "Peso aferido" => "Peso aferido",
                                    "Peso usual" => "Peso usual",
                                    "Peso referido" => "Peso referido",
                                    "Peso estimado" => "Peso estimado",
                                    "Peso ajustado" => "Peso ajustado",
                                )
                            ),
                            "peso_valor" => array(
                                "col" => 3,
                                "label" => false,
                                "type" => "number",
                                "class" => "plusminus",
                                "parameters" => 'data-suffix="kg" value="0.000" data-decimals="3" min="0" max="300" step="0.001"',
                                "placeholder" => "KG*",
                                "required" => "required",
                            ),
                            "altura" => array(
                                "col" => 2,
                                "label" => false,
                                "required" => "required",
                                "select" => array(
                                    "" => "Altura",
                                    "Altura aferida" => "Altura aferida",
                                    "Altura estimada" => "Altura estimada",
                                    "Altura referida" => "Altura referida"
                                )
                            ),
                            "altura_valor" => array(
                                "col" => 3,
                                "label" => false,
                                "type" => "number",
                                "class" => "plusminus",
                                "parameters" => 'data-suffix="m" value="0.00" data-decimals="2" min="0" max="3.00" step="0.01"',
                                "placeholder" => "m*",
                                "required" => "required",
                            ),
                            "imc" => array(
                                "col" => 2,
                                "label" => false,
                                "readonly" => true,
                                "class" => "float",
                                "placeholder" => "IMC*",
                                "input-group-append" => "Kg/m2"
                            ),


                            "circunferencias_valor" => array(
                                "col" => 6,
                                "label" => false,
                                "class" => "float",
                                "placeholder" => "0.00",
                                "required" => "required",
                                "input-group-prepend-select" => '<select id="circunferencias" name="circunferencias" aria-controls="circunferencias" class="form-control input-sm "><option value="">Circunferências</option><option value="Circunferência do braço">Circunferência do braço</option><option value="Circunferência da panturrilha">Circunferência da panturrilha</option><option value="Circunferência da cintura">Circunferência da cintura</option></select>',
                                "input-group-append-group" => ' <span class="input-group-text">cm</span>
                                                                <span class="input-group-text">
                                                                    <div class="form-radio">
                                                                        <input id="circunferencia_lado_direito" class="radio-outlined"  name="circunferencia_lado" type="radio" value="Direito">
                                                                        <label for="circunferencia_lado_direito" class="radio-green">Direito</label>
                                                                    </div>
                                                                </span>
                                                                <span class="input-group-text">
                                                                    <div class="form-radio">
                                                                        <input id="circunferencia_lado_esquerdo" class="radio-outlined"  name="circunferencia_lado" type="radio" value="Esquerdo">
                                                                        <label for="circunferencia_lado_esquerdo" class="radio-green">Esquerdo</label>
                                                                    </div>
                                                                </span>
                                                                <button class="btn btn-secondary" id="btn_circunferencias" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>'
                            ),

                            "dobras_valor" => array(
                                "col" => 6,
                                "label" => false,
                                "class" => "float",
                                "placeholder" => "0.00",
                                "required" => "required",
                                "input-group-prepend-select" => '<select id="dobras" name="dobras" aria-controls="dobras" class="form-control input-sm "><option value="">Dobras</option><option value="Dobras Cutâneas">Dobras Cutâneas</option><option value="Dobra tricipital">Dobra tricipital</option><option value="Dobra bicipital">Dobra bicipital</option><option value="Dobra subescapular">Dobra subescapular</option><option value="Dobra supra ilíaca">Dobra supra ilíaca</option><option value="Dobra abdominal">Dobra abdominal</option><option value="Dobra peitoral">Dobra peitoral</option><option value="Dobra coxa medial">Dobra coxa medial</option></select>',
                                "input-group-append-group" => ' <span class="input-group-text">cm</span>
                                                                <span class="input-group-text">
                                                                    <div class="form-radio">
                                                                        <input id="dobras_lado_direito" class="radio-outlined"  name="dobras_lado" type="radio" value="Direito">
                                                                        <label for="dobras_lado_direito" class="radio-green">Direito</label>
                                                                    </div>
                                                                </span>
                                                                <span class="input-group-text">
                                                                    <div class="form-radio">
                                                                        <input id="dobras_ladodo_esquerdo" class="radio-outlined"  name="dobras_lado" type="radio" value="Esquerdo">
                                                                        <label for="dobras_ladodo_esquerdo" class="radio-green">Esquerdo</label>
                                                                    </div>
                                                                </span>
                                                                <button class="btn btn-secondary" id="btn_dobras" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>'
                            ),
                            "circunferencias_valor_div" => array(
                                "col" => 6,
                                "type" => "div",
                                "form-class" => "circunferencias_valor_div mb-0"
                            ),
                            "dobras_valor_div" => array(
                                "col" => 6,
                                "type" => "div",
                                "form-class" => "dobras_valor_div mb-0"
                            )
                        ));

                    $item_dados .= '<div class="row entric_grid m-0 p-0">
                                        <div class="form-group col-sm-6">
                                            <div class="form-check">
                                                <label class="grid_label">Circunferência</label>
                                            </div>
                                            <div class="row p-4">
                                                <div class="form-group input-group mb-0"> 
                                                    <div class="input-group-prepend">
                                                        <select id="circunferencias" name="circunferencias" aria-controls="circunferencias" class="form-control input-sm ">
                                                            <option value="">Circunferências</option><option value="Circunferência do braço">Circunferência do braço</option><option value="Circunferência da panturrilha">Circunferência da panturrilha</option><option value="Circunferência da cintura">Circunferência da cintura</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" placeholder="0.00" required="required" name="circunferencias_valor" id="circunferencias_valor" class="form-control float"> 
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                        <span class="input-group-text">
                                                            <div class="form-radio">
                                                                <input id="circunferencia_lado_direito" class="radio-outlined" name="circunferencia_lado" type="radio" value="Direito">
                                                                <label for="circunferencia_lado_direito" class="radio-green">Direito</label>
                                                            </div>
                                                        </span>
                                                        <span class="input-group-text">
                                                            <div class="form-radio">
                                                                <input id="circunferencia_lado_esquerdo" class="radio-outlined" name="circunferencia_lado" type="radio" value="Esquerdo">
                                                                <label for="circunferencia_lado_esquerdo" class="radio-green">Esquerdo</label>
                                                            </div>
                                                        </span>
                                                        <button class="btn btn-secondary" id="btn_circunferencias" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <div class="form-check">
                                                <label class="grid_label">Dobras</label>
                                            </div>
                                            <div class="row p-4">
                                                <div class="form-group input-group mb-0"> 
                                                    <div class="input-group-prepend">
                                                        <select id="dobras" name="dobras" aria-controls="dobras" class="form-control input-sm ">
                                                            <option value="">Dobras</option><option value="Dobras Cutâneas">Dobras Cutâneas</option><option value="Dobra tricipital">Dobra tricipital</option><option value="Dobra bicipital">Dobra bicipital</option><option value="Dobra subescapular">Dobra subescapular</option><option value="Dobra supra ilíaca">Dobra supra ilíaca</option><option value="Dobra abdominal">Dobra abdominal</option><option value="Dobra peitoral">Dobra peitoral</option><option value="Dobra coxa medial">Dobra coxa medial</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" placeholder="0.00" required="required" name="dobras_valor" id="dobras_valor" class="form-control float">
                                                    <div class="input-group-append"> 
                                                        <span class="input-group-text">cm</span>
                                                        <span class="input-group-text">
                                                            <div class="form-radio">
                                                                <input id="dobras_lado_direito" class="radio-outlined" name="dobras_lado" type="radio" value="Direito">
                                                                <label for="dobras_lado_direito" class="radio-green">Direito</label>
                                                            </div>
                                                        </span>
                                                        <span class="input-group-text">
                                                            <div class="form-radio">
                                                                <input id="dobras_ladodo_esquerdo" class="radio-outlined" name="dobras_lado" type="radio" value="Esquerdo">
                                                                <label for="dobras_ladodo_esquerdo" class="radio-green">Esquerdo</label>
                                                            </div>
                                                        </span>
                                                        <button class="btn btn-secondary" id="btn_dobras" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                        /*
                            "circunferencias_valor" => array(
                                "col" => 6,
                                "label" => false,
                                "class" => "float",
                                "placeholder" => "0.00",
                                "required" => "required",
                                "input-group-prepend-select" => '<select id="circunferencias" name="circunferencias" aria-controls="circunferencias" class="form-control input-sm "><option value="">Circunferências</option><option value="Circunferência do braço">Circunferência do braço</option><option value="Circunferência da panturrilha">Circunferência da panturrilha</option><option value="Circunferência da cintura">Circunferência da cintura</option></select>',
                                "input-group-append-group" => ' <span class="input-group-text">cm</span>
                                                                <span class="input-group-text">
                                                                    <div class="form-radio">
                                                                        <input id="circunferencia_lado_direito" class="radio-outlined"  name="circunferencia_lado" type="radio" value="Direito">
                                                                        <label for="circunferencia_lado_direito" class="radio-green">Direito</label>
                                                                    </div>
                                                                </span>
                                                                <span class="input-group-text">
                                                                    <div class="form-radio">
                                                                        <input id="circunferencia_lado_esquerdo" class="radio-outlined"  name="circunferencia_lado" type="radio" value="Esquerdo">
                                                                        <label for="circunferencia_lado_esquerdo" class="radio-green">Esquerdo</label>
                                                                    </div>
                                                                </span>
                                                                <button class="btn btn-secondary" id="btn_circunferencias" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>'
                            ),

                            "dobras_valor" => array(
                                "col" => 6,
                                "label" => false,
                                "class" => "float",
                                "placeholder" => "0.00",
                                "required" => "required",
                                "input-group-prepend-select" => '<select id="dobras" name="dobras" aria-controls="dobras" class="form-control input-sm "><option value="">Dobras</option><option value="Dobras Cutâneas">Dobras Cutâneas</option><option value="Dobra tricipital">Dobra tricipital</option><option value="Dobra bicipital">Dobra bicipital</option><option value="Dobra subescapular">Dobra subescapular</option><option value="Dobra supra ilíaca">Dobra supra ilíaca</option><option value="Dobra abdominal">Dobra abdominal</option><option value="Dobra peitoral">Dobra peitoral</option><option value="Dobra coxa medial">Dobra coxa medial</option></select>',
                                "input-group-append-group" => ' <span class="input-group-text">cm</span>
                                                                <span class="input-group-text">
                                                                    <div class="form-radio">
                                                                        <input id="dobras_lado_direito" class="radio-outlined"  name="dobras_lado" type="radio" value="Direito">
                                                                        <label for="dobras_lado_direito" class="radio-green">Direito</label>
                                                                    </div>
                                                                </span>
                                                                <span class="input-group-text">
                                                                    <div class="form-radio">
                                                                        <input id="dobras_ladodo_esquerdo" class="radio-outlined"  name="dobras_lado" type="radio" value="Esquerdo">
                                                                        <label for="dobras_ladodo_esquerdo" class="radio-green">Esquerdo</label>
                                                                    </div>
                                                                </span>
                                                                <button class="btn btn-secondary" id="btn_dobras" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>'
                            ),
                            "circunferencias_valor_div" => array(
                                "col" => 6,
                                "type" => "div",
                                "form-class" => "circunferencias_valor_div mb-0"
                            ),
                            "dobras_valor_div" => array(
                                "col" => 6,
                                "type" => "div",
                                "form-class" => "dobras_valor_div mb-0"
                            ),
                        */


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