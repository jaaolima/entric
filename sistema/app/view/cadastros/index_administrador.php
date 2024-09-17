<div class="tab-pane fade show active" id="tabadmin" role="tabpanel">
    <div class="pt-3">

        <div class="default-tab bordered-tab entric">

            <div id="lista_administrador" class="">
                <button type="button" class="btn btn-secondary btn-form pull-right mb-4" id="btn_admin_novo"><i class="mdi mdi-account-circle"></i> NOVO CADASTRO</button>

                <?php 
                echo $html->addTable(
                    array(
                        "title" => array(
                            "Nome do Administrador" => 'style="width: 50%;"',
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
                    "tb_administrador"
                );
                ?>
            </div>

            <div id="cad_administrador" class="none">
                <form action="cadastros" method="post">
                    <input type="hidden" name="_ac" id="_ac" value="cadastrar_administrador"/>
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
                                                    "class" => "cpf cpf_cnpj",
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
                                                                                    <input id="admin_acesso_liberado" checked="" class="radio-outlined" name="admin_acesso" type="radio" value="0">
                                                                                    <label for="admin_acesso_liberado" class="radio-green">Liberado</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-radio">
                                                                                    <input id="admin_acesso_bloqueado" class="radio-outlined" name="admin_acesso" type="radio" value="1">
                                                                                    <label for="admin_acesso_bloqueado" class="radio-green">Bloqueado</label>
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
                                                    "content" => '<div class="pull-right"><a class="btn btn-default btn_voltar_admin" href="javascript:void(0);" id="btn_voltar_admin">Voltar</a> <button class="btn btn-warning" type="submit">Cadastrar</button></div>'
                                                )
                                            )
                                        );
                                echo $item_dados;
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <div id="edit_administrador" class="none">
                <form action="cadastros" method="post">
                    <input type="hidden" name="_ac" id="_ac" value="editar_administrador"/>
                    <input type="hidden" name="_admin_id" id="_admin_id" value=""/>
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
                                                    "class" => "cpf cpf_cnpj",
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
                                                                                    <input id="edit_admin_acesso_liberado" checked="" class="radio-outlined" name="admin_acesso" type="radio" value="0">
                                                                                    <label for="edit_admin_acesso_liberado" class="radio-green">Liberado</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-radio">
                                                                                    <input id="edit_admin_acesso_bloqueado" class="radio-outlined" name="admin_acesso" type="radio" value="1">
                                                                                    <label for="edit_admin_acesso_bloqueado" class="radio-green">Bloqueado</label>
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
                                                    "content" => '<div class="pull-right"><a class="btn btn-default btn_voltar_admin" href="javascript:void(0);" id="btn_voltar_editadmin">Voltar</a> <button class="btn btn-warning" type="submit">Editar</button></div>'
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

