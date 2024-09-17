<div class="tab-pane fade show active" id="cadastro" role="tabpanel">
    <div class="pt-3">

        <div>
            <form action="config" method="post" autocomplete="off">
                <input type="hidden" name="action" id="action" value="salvar_orientacoes"/>

                <?php
                $item_dados =  $html->addRow(
                                array(
                                    "higienizacao" => array(
                                        "col" => 12,
                                        "label" => "Higienização para Manipulação:",
                                        "textarea" => "height: 200px;",
                                        "required" => "required",
                                    ),
                                    "cuidados" => array(
                                        "col" => 12,
                                        "label" => "Cuidados na Administração e Armazenamento:",
                                        "textarea" => "height: 200px;",
                                        "required" => "required",
                                    ),
                                    "preparo" => array(
                                        "col" => 12,
                                        "label" => "Preparo e Instalação da Dieta:",
                                        "textarea" => "height: 200px;",
                                        "required" => "required",
                                    )
                                ),
                                $dados
                            );
                    echo $item_dados;
                ?>
                <div class="form-group row pt-5">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-warning btn-form">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>