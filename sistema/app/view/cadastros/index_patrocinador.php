<div class="tab-pane fade <?php if ($bruker->usuario['tipo'] == "0") echo "show active";?>" id="tabpatrocinador" role="tabpanel">
    <div class="pt-3">

        <div class="default-tab bordered-tab entric">
            <div id="lista_patrocinador" class="">
                <button type="button" class="btn btn-secondary btn-form pull-right mb-4" id="btn_patrocinador_novo"><i class="mdi mdi-account-circle"></i> NOVO CADASTRO</button>

                <?php 
                echo $html->addTable(
                    array(
                        "title" => array(
                            "Nome do Patrocinador" => 'style="width: 50%;"',
                            "CPF" => 'style="width: 30%;"',
                            "Status" => 'style="width: 10%;"',
                            "ID" => 'style="width: 0%;"'
                        ), 
                        "option" => array(
                            "editar/" => '<i class="fa fa-edit"></i>',
                            "deletar/" => '<i class="fa fa-trash"></i>'
                        )
                    ), 
                    $dados,
                    "tb_patrocinador"
                );
                ?>
            </div>

            <div id="cad_patrocinador" class="none">
                <form action="cadastros" method="post">
                    <input type="hidden" name="_ac" id="_ac" value="cadastrar_patrocinador"/>
                    <div class="row">
                        <div class="col-md-6">

                            <?php
                            $item_dados =  $html->addRow(
                                            array(
                                                "nome" => array(
                                                    "col" => 12,
                                                    "label" => "Nome:",
                                                    "required" => "required"
                                                ),
                                                "cpf" => array(
                                                    "col" => 6,
                                                    "label" => "CPF / CNPJ:",
                                                    "class" => "cpf",
                                                    "required" => "required",
                                                ),
                                                "celular" => array(
                                                    "col" => 6,
                                                    "label" => "Celular:",
                                                    "class" => "telefone",
                                                    "required" => "required",
                                                )
                                            )
                                        ).
                                        $html->addHrSeparador('Chave de Acesso').
                                        $html->addRow(
                                            array(
                                                "login" => array(
                                                    "col" => 12,
                                                    "label" => "E-mail de acesso:",
                                                    "type" => "email",
                                                    "required" => "required"
                                                ),
                                                "acesso" => array(
                                                            "col" => 12,
                                                            "type" => "div",
                                                            "content" => '<div class="form-check">
                                                                            <label class="grid_label2">Acesso</label>
                                                                        </div>
                                                                        <div class="row p-1">
                                                                            <div class="col-sm-4">
                                                                                <div class="form-radio">
                                                                                    <input id="patrocinador_acesso_liberado" checked="" class="radio-outlined" name="patrocinador_acesso" type="radio" value="0">
                                                                                    <label for="patrocinador_acesso_liberado" class="radio-green">Liberado</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-radio">
                                                                                    <input id="patrocinador_acesso_bloqueado" class="radio-outlined" name="patrocinador_acesso" type="radio" value="1">
                                                                                    <label for="patrocinador_acesso_bloqueado" class="radio-green">Bloqueado</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>' 
                                                        )
                                            )
                                        ).
                                        $html->addCol(
                                            array(
                                                "botao1" => array(
                                                    "col" => 12,
                                                    "content" => '<div class="pull-right"><a class="btn btn-default btn_voltar_patrocinador" href="javascript:void(0);" id="btn_voltar_patrocinador">Voltar</a> <button class="btn btn-warning" type="submit">Cadastrar</button></div>'
                                                )
                                            )
                                        );
                                echo $item_dados;
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <div id="edit_patrocinador" class="none">
                <form action="cadastros" method="post">
                    <input type="hidden" name="_ac" id="_ac" value="edit_patrocinador"/>
                    <input type="hidden" name="_patroc_id" id="_patroc_id" value=""/>
                    <div class="row">
                        <div class="col-md-6">

                            <?php
                            $item_dados =  $html->addRow(
                                            array(
                                                "nome" => array(
                                                    "col" => 12,
                                                    "label" => "Nome:",
                                                    "required" => "required"
                                                ),
                                                "cpf" => array(
                                                    "col" => 6,
                                                    "label" => "CPF / CNPJ:",
                                                    "class" => "cpf",
                                                    "required" => "required",
                                                ),
                                                "celular" => array(
                                                    "col" => 6,
                                                    "label" => "Celular:",
                                                    "class" => "telefone",
                                                    "required" => "required",
                                                )
                                            )
                                        ).
                                        $html->addHrSeparador('Chave de Acesso').
                                        $html->addRow(
                                            array(
                                                "login" => array(
                                                    "col" => 12,
                                                    "label" => "E-mail de acesso:",
                                                    "type" => "email",
                                                    "required" => "required"
                                                ),
                                                "acesso" => array(
                                                            "col" => 12,
                                                            "type" => "div",
                                                            "content" => '<div class="form-check">
                                                                            <label class="grid_label2">Acesso</label>
                                                                        </div>
                                                                        <div class="row p-1">
                                                                            <div class="col-sm-4">
                                                                                <div class="form-radio">
                                                                                    <input id="edit_patrocinador_acesso_liberado" checked="" class="radio-outlined" name="patrocinador_acesso" type="radio" value="0">
                                                                                    <label for="edit_patrocinador_acesso_liberado" class="radio-green">Liberado</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-radio">
                                                                                    <input id="edit_patrocinador_acesso_bloqueado" class="radio-outlined" name="patrocinador_acesso" type="radio" value="1">
                                                                                    <label for="edit_patrocinador_acesso_bloqueado" class="radio-green">Bloqueado</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>' 
                                                        )
                                            )
                                        ).
                                        $html->addCol(
                                            array(
                                                "botao1" => array(
                                                    "col" => 12,
                                                    "content" => '<div class="pull-right"><a class="btn btn-default btn_voltar_patrocinador" href="javascript:void(0);" id="btn_voltar_patrocinador">Voltar</a> <button class="btn btn-warning" type="submit">Editar</button></div>'
                                                )
                                            )
                                        );
                                echo $item_dados;
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

