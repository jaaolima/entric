<div class="tab-pane fade" id="tabprescritor" role="tabpanel">
    <div class="pt-3">

        <div class="default-tab bordered-tab entric">

            <div id="lista_unidade" class="">
                <button type="button" class="btn btn-secondary btn-form pull-right mb-4" id="btn_unidade_novo"><i class="mdi mdi-account-circle"></i> NOVO CADASTRO</button>

                <?php 
                echo $html->addTable(
                    array(
                        "title" => array(
                            "Nome do Usuário" => 'style="width: 30%;"',
                            "CNPJ" => 'style="width: 15%;"',
                            "UF" => 'style="width: 5%;"',
                            "Cidade" => 'style="width: 10%;"',
                            "E-mail" => 'style="width: 10%;"',
                            "Status" => 'style="width: 10%;"',
                            "ID" => 'style="width: 0%;"'
                        ), 
                        "option" => array(
                            "editar/" => '<i class="fa fa-edit"></i>',
                            "deletar/" => '<i class="fa fa-trash"></i>'
                        )
                    ), 
                    $dados,
                    "tb_prescritor"
                );
                ?>
            </div>

            <div id="cad_prescritor" class="none">
                <form id="form_prescritor" action="cadastros" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_ac" id="_ac" value="cadastrar_prescritor"/>
                    <?php
                    $item_dados =  $html->addRow(
                                    array(
                                        "nome" => array(
                                            "col" => 6,
                                            "label" => "Nome:",
                                            "required" => "required"
                                        ),
                                        "cpf_cnpj" => array(
                                            "col" => 4,
                                            "label" => "CPF / CNPJ:",
                                            "required" => "required",
                                        )
                                    )
                                ).                                
                                $html->addCol( array(
                                        "acesso" => array(
                                            "col" => 4,
                                            "class" => "mb-4 form_blue",
                                            "content" => $html->addHrSeparador('Chave de Acesso', 'pt-5 pb-5').
                                                $html->addRow(
                                                    array(
                                                        "login" => array(
                                                            "col" => 12,
                                                            "label" => "E-mail de acesso:",
                                                            "type" => "email",
                                                            "readonly" => "readonly",
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
                                                                                    <input id="acesso_liberado" checked="" class="radio-outlined" name="acesso" type="radio" value="0">
                                                                                    <label for="acesso_liberado" class="radio-green">Liberado</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-radio">
                                                                                    <input id="acesso_bloqueado" class="radio-outlined" name="acesso" type="radio" value="1">
                                                                                    <label for="acesso_bloqueado" class="radio-green">Bloqueado</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>' 
                                                        ),
                                                        "feedback" => array(
                                                            "col" => 12,
                                                            "label" => "Mensagem de Feedback:",
                                                            "textarea" => true,
                                                        ),
                                                        "enviar_edicao" => array(
                                                            "col" => 12,
                                                            "type" => "div",
                                                            "content" => '<div class="row p-1">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-radio">
                                                                                    <input id="link_edicao" class="styled-checkbox" name="link_edicao" type="checkbox" value="0">
                                                                                    <label for="link_edicao" class="form-check-label check-green">Enviar link para edição</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>'
                                                        )
                                                    )
                                                )
                                        ),
                                        "row_telefone" => array(
                                            "col" => 8,
                                            "content" =>
                                                $html->addRow(
                                                    array(
                                                        "uf" => array(
                                                            "col" => 3,
                                                            "label" => "UF:",
                                                            "required" => "required",
                                                            "select" => array(
                                                                            "" => "Selecione..."
                                                                        )+_ufs_()
                                                        ),
                                                        "cidade" => array(
                                                            "col" => 6,
                                                            "label" => "Cidade:",
                                                            "required" => "required",
                                                        )
                                                    )
                                                ).
                                                $html->addRow(
                                                    array(
                                                        "email" => array(
                                                            "col" => 3,
                                                            "label" => "E-mail:",
                                                            "form-class" => "mb-2",
                                                            "type" => "email",
                                                            "required" => "required"
                                                        ),
                                                        "disp_email" => array(
                                                            "col" => 6,
                                                            "form-class" => "mb-2",
                                                            "label" => "Disponibilizar este contato nos relatórios de alta dos pacientes?",
                                                            "type" => "div",
                                                            "content" => '<div class="row entric_grid m-0 mb-0">
                                                                            <div class="form-group col-sm-12 mb-0" style="padding-left: 0px; padding-right: 0px;">
                                                                                <div class="entric_group p-11">
                                                                                    <div class="row p-1">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-radio">
                                                                                                <input id="disp_email_sim" checked="" class="radio-outlined disp_email_sim" name="disp_email" type="radio" value="0">
                                                                                                <label for="disp_email_sim" class="radio-green disp_email_sim_label">Sim</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-radio">
                                                                                                <input id="disp_email_nao" class="radio-outlined disp_email_nao" name="disp_email" type="radio" value="1">
                                                                                                <label for="disp_email_nao" class="radio-green disp_email_nao_label">Não</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>' 
                                                        ),
                                                        "add_contato" => array(
                                                            "col" => 3,
                                                            "form-class" => "mb-0",
                                                            "label" => "&nbsp;",
                                                            "type" => "div",
                                                            "content" => '' 
                                                        )
                                                    ),
                                                    null,
                                                    null
                                                ).
                                                $html->addRow(
                                                    array(
                                                        "telefone[]" => array(
                                                            "col" => 3,
                                                            "form-class" => "mb-0",
                                                            "label" => "Telefone:",
                                                            "class" => "telefone",
                                                            "required" => "required",
                                                        ),
                                                        "disp_telefone" => array(
                                                            "col" => 6,
                                                            "form-class" => "mb-0",
                                                            "type" => "div",
                                                            "label" => "&nbsp;",
                                                            "content" => '<div class="row entric_grid m-0">
                                                                            <div class="form-group col-sm-12" style="padding-left: 0px; padding-right: 0px;">
                                                                                <div class="entric_group p-11">
                                                                                    <div class="row p-1">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-radio">
                                                                                                <input id="disp_telefone_sim" checked="" class="radio-outlined disp_telefone_sim" name="disp_telefone[]" type="radio" value="0">
                                                                                                <label for="disp_telefone_sim" class="radio-green disp_telefone_sim_label">Sim</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-radio">
                                                                                                <input id="disp_telefone_nao" class="radio-outlined disp_telefone_nao" name="disp_telefone[]" type="radio" value="1">
                                                                                                <label for="disp_telefone_nao" class="radio-green disp_telefone_nao_label">Não</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>' 
                                                        ),                                                        
                                                        "add_telefone" => array(
                                                            "col" => 3,
                                                            "form-class" => "mb-0 adicionar_telefone",
                                                            "type" => "div",
                                                            "label" => "&nbsp;",
                                                            "content" => '
                                                            <button type="button" class="btn btn-secondary btn-md" id="adicionar_telefone">
                                                                <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                                                                Adicionar Telefone
                                                            </button>' 
                                                        )
                                                    ),
                                                    null,
                                                    null,
                                                    "id='row_telefone'"
                                                ).
                                                $html->addRow(
                                                    array(
                                                        "profissional" => array(
                                                            "col" => 4,
                                                            "label" => "Profissional:",
                                                            "radiobutton" => array(
                                                                "Médico" => "Médico",
                                                                "Nutricionista" => "Nutricionista",
                                                            ),
                                                            "checked" => "Médico",
                                                            "required" => "required"
                                                        ),
                                                        "regiao_crm" => array(
                                                            "col" => 2,
                                                            "label" => "Região:",
                                                            "form-class" => "input_crm",
                                                            "select" => _ufs_()
                                                        ),
                                                        "numero_crm" => array(
                                                            "col" => 2,
                                                            "form-class" => "input_crm",
                                                            "label" => "Número CRM:",
                                                            "parameters" => "maxlength='6'"
                                                        ),
                                                        "regiao_crn" => array(
                                                            "col" => 2,
                                                            "label" => "Região:",
                                                            "form-class" => "input_crn none",
                                                            "select" => _regiao_crm()
                                                        ),
                                                        "numero_crn" => array(
                                                            "col" => 2,
                                                            "label" => "Número CRN:",
                                                            "form-class" => "input_crn none",
                                                            "parameters" => "maxlength='6'"
                                                        ),
                                                        "carteira_frente" => array(
                                                            "col" => 6,
                                                            "type" => "div",
                                                            "form-class" => "none mb-0",
                                                            "content" => '<button class="btn btn-danger btn-sm rounded pull-right" type="button" onclick="fcRemoverFoto(1);" style="padding: .17rem 1rem !important;"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>

                                                            <label id="anexar_foto" class="btn cart_bordas text-center" style="font-size: 13px;color: #b5dcee; height: 170px; width: 100%; background-size: cover; background-position: center center; background-repeat: no-repeat;">
                                                                <span><br>Carteira Profissional<br>
                                                                (FRENTE)<br>
                                                                Arquivo no formato JPEG ou PNG com no máximo 2MB.</span>
                                                                <input type="file" name="foto" rel="anexar_foto" id="foto" style="display: none;">
                                                            </label>' 
                                                        ),                                                     
                                                        "carteira_verso" => array(
                                                            "col" => 6,
                                                            "type" => "div",
                                                            "form-class" => "none mb-0",
                                                            "content" =>  '<button class="btn btn-danger btn-sm rounded pull-right" type="button" onclick="fcRemoverFoto(2);" style="padding: .17rem 1rem !important;"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>

                                                            <label id="anexar_foto2" class="btn cart_bordas text-center" style="font-size: 13px;color: #b5dcee; height: 170px; width: 100%; background-size: cover; background-position: center center; background-repeat: no-repeat;">
                                                                <span><br>Carteira Profissional<br>
                                                                (VERSO)<br>
                                                                Arquivo no formato JPEG ou PNG com no máximo 2MB.</span>
                                                                <input type="file" name="foto2" rel="anexar_foto2" id="foto2" style="display: none;">
                                                            </label>' 
                                                        )
                                                    ),
                                                    null,
                                                    null
                                                )
                                        )        
                                    )
                                ).
                                $html->addCol(
                                    array(
                                        "botao2" => array(
                                            "col" => 12,
                                            "content" => '<p style="clear: "></p><div class="pull-right"><a class="btn btn-default btn_voltar_prescritor" href="javascript:void(0);" id="btn_voltar_unidade">Voltar</a> <button class="btn btn-warning" type="submit">Cadastrar</button></div>'
                                        )
                                    )
                                );
                        echo $item_dados;
                    ?>
                </form>
            </div>

            <div id="edit_prescritor" class="none">
                <form id="form_prescritor" action="cadastros" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_ac" id="_ac" value="edit_prescritor"/>
                    <input type="hidden" name="_presc_id" id="_presc_id" value=""/>
                    <?php
                    $item_dados =  $html->addRow(
                                    array(
                                        "nome" => array(
                                            "col" => 6,
                                            "label" => "Nome:",
                                            "required" => "required"
                                        ),
                                        "cpf_cnpj" => array(
                                            "col" => 4,
                                            "label" => "CPF / CNPJ:",
                                            "required" => "required",
                                        )
                                    )
                                ).                                
                                $html->addCol( array(
                                        "acesso" => array(
                                            "col" => 4,
                                            "class" => "mb-4 form_blue",
                                            "content" => $html->addHrSeparador('Chave de Acesso', 'pt-5 pb-5').
                                                $html->addRow(
                                                    array(
                                                        "login" => array(
                                                            "col" => 12,
                                                            "label" => "E-mail de acesso:",
                                                            "type" => "email",
                                                            "readonly" => "readonly",
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
                                                                                    <input id="edit_acesso_liberado" class="radio-outlined" name="acesso" type="radio" value="0">
                                                                                    <label for="edit_acesso_liberado" class="radio-green">Liberado</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-radio">
                                                                                    <input id="edit_acesso_bloqueado" class="radio-outlined" name="acesso" type="radio" value="1">
                                                                                    <label for="edit_acesso_bloqueado" class="radio-green">Bloqueado</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>' 
                                                        ),
                                                        "feedback" => array(
                                                            "col" => 12,
                                                            "label" => "Mensagem de Feedback:",
                                                            "textarea" => true,
                                                        ),
                                                        "enviar_edicao" => array(
                                                            "col" => 12,
                                                            "type" => "div",
                                                            "content" => '<div class="row p-1">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-radio">
                                                                                    <input id="link_edicao" class="styled-checkbox" name="link_edicao" type="checkbox" value="0">
                                                                                    <label for="link_edicao" class="form-check-label check-green">Enviar link para edição</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>'
                                                        )
                                                    )
                                                )
                                        ),
                                        "row_telefone" => array(
                                            "col" => 8,
                                            "content" =>
                                                $html->addRow(
                                                    array(
                                                        "uf" => array(
                                                            "col" => 3,
                                                            "label" => "UF:",
                                                            "required" => "required",
                                                            "select" => array(
                                                                            "" => "Selecione..."
                                                                        )+_ufs_()
                                                        ),
                                                        "cidade" => array(
                                                            "col" => 6,
                                                            "label" => "Cidade:",
                                                            "required" => "required",
                                                        )
                                                    )
                                                ).
                                                $html->addRow(
                                                    array(
                                                        "email" => array(
                                                            "col" => 3,
                                                            "label" => "E-mail:",
                                                            "form-class" => "mb-2",
                                                            "type" => "email",
                                                            "required" => "required"
                                                        ),
                                                        "disp_email" => array(
                                                            "col" => 6,
                                                            "form-class" => "mb-2",
                                                            "label" => "Disponibilizar este contato nos relatórios de alta dos pacientes?",
                                                            "type" => "div",
                                                            "content" => '<div class="row entric_grid m-0 mb-0">
                                                                            <div class="form-group col-sm-12 mb-0" style="padding-left: 0px; padding-right: 0px;">
                                                                                <div class="entric_group p-11">
                                                                                    <div class="row p-1">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-radio">
                                                                                                <input id="edit_disp_email_sim" checked="" class="radio-outlined disp_email_sim" name="disp_email" type="radio" value="0">
                                                                                                <label for="edit_disp_email_sim" class="radio-green disp_email_sim_label">Sim</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-radio">
                                                                                                <input id="edit_disp_email_nao" class="radio-outlined disp_email_nao" name="disp_email" type="radio" value="1">
                                                                                                <label for="edit_disp_email_nao" class="radio-green disp_email_nao_label">Não</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>' 
                                                        ),
                                                        "add_contato" => array(
                                                            "col" => 3,
                                                            "form-class" => "mb-0",
                                                            "label" => "&nbsp;",
                                                            "type" => "div",
                                                            "content" => '' 
                                                        )
                                                    ),
                                                    null,
                                                    null
                                                ).
                                                $html->addRow(
                                                    array(
                                                        "telefone[]" => array(
                                                            "col" => 3,
                                                            "form-class" => "mb-0",
                                                            "label" => "Telefone:",
                                                            "class" => "telefone",
                                                            "required" => "required",
                                                        ),
                                                        "disp_telefone" => array(
                                                            "col" => 6,
                                                            "form-class" => "mb-0",
                                                            "type" => "div",
                                                            "label" => "&nbsp;",
                                                            "content" => '<div class="row entric_grid m-0">
                                                                            <div class="form-group col-sm-12" style="padding-left: 0px; padding-right: 0px;">
                                                                                <div class="entric_group p-11">
                                                                                    <div class="row p-1">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-radio">
                                                                                                <input id="edit_disp_telefone_sim" checked="" class="radio-outlined disp_telefone_sim" name="disp_telefone[]" type="radio" value="0">
                                                                                                <label for="edit_disp_telefone_sim" class="radio-green disp_telefone_sim_label">Sim</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-radio">
                                                                                                <input id="edit_disp_telefone_nao" class="radio-outlined disp_telefone_nao" name="disp_telefone[]" type="radio" value="1">
                                                                                                <label for="edit_disp_telefone_nao" class="radio-green disp_telefone_nao_label">Não</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>' 
                                                        ),                                                        
                                                        "add_telefone" => array(
                                                            "col" => 3,
                                                            "form-class" => "mb-0 adicionar_telefone",
                                                            "type" => "div",
                                                            "label" => "&nbsp;",
                                                            "content" => '
                                                            <button type="button" class="btn btn-secondary btn-md" id="edit_adicionar_telefone">
                                                                <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                                                                Adicionar Telefone
                                                            </button>' 
                                                        )
                                                    ),
                                                    null,
                                                    null,
                                                    "id='edit_row_telefone'"
                                                ).
                                                $html->addRow(
                                                    array(
                                                        "profissional" => array(
                                                            "col" => 4,
                                                            "label" => "Profissional:",
                                                            "radiobutton" => array(
                                                                "Médico" => "Médico",
                                                                "Nutricionista" => "Nutricionista",
                                                            ),
                                                            "checked" => "Médico",
                                                            "required" => "required"
                                                        ),
                                                        "regiao_crm" => array(
                                                            "col" => 2,
                                                            "label" => "Região:",
                                                            "form-class" => "input_crm",
                                                            "select" => _ufs_()
                                                        ),
                                                        "numero_crm" => array(
                                                            "col" => 2,
                                                            "form-class" => "input_crm",
                                                            "label" => "Número CRM:",
                                                            "parameters" => "maxlength='6'"
                                                        ),
                                                        "regiao_crn" => array(
                                                            "col" => 2,
                                                            "label" => "Região:",
                                                            "form-class" => "input_crn none",
                                                            "select" => _regiao_crm()
                                                        ),
                                                        "numero_crn" => array(
                                                            "col" => 2,
                                                            "label" => "Número CRN:",
                                                            "form-class" => "input_crn none",
                                                            "parameters" => "maxlength='6'"
                                                        ),
                                                        "carteira_frente" => array(
                                                            "col" => 6,
                                                            "type" => "div",
                                                            "form-class" => "none mb-0",
                                                            "content" => '<button class="btn btn-danger btn-sm rounded pull-right" type="button" onclick="fcRemoverEditFoto(1);" style="padding: .17rem 1rem !important;"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>

                                                            <label id="edit_anexar_foto" class="btn cart_bordas text-center" style="font-size: 13px;color: #b5dcee; height: 170px; width: 100%; background-size: cover; background-position: center center; background-repeat: no-repeat;">
                                                                <span><br>Carteira Profissional<br>
                                                                (FRENTE)<br>
                                                                Arquivo no formato JPEG ou PNG com no máximo 2MB.</span>
                                                                <input type="file" name="foto" rel="edit_anexar_foto" id="edit_foto" style="display: none;">
                                                            </label>' 
                                                        ),                                                     
                                                        "carteira_verso" => array(
                                                            "col" => 6,
                                                            "type" => "div",
                                                            "form-class" => "none mb-0",
                                                            "content" =>  '<button class="btn btn-danger btn-sm rounded pull-right" type="button" onclick="fcRemoverEditFoto(2);" style="padding: .17rem 1rem !important;"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>

                                                            <label id="edit_anexar_foto2" class="btn cart_bordas text-center" style="font-size: 13px;color: #b5dcee; height: 170px; width: 100%; background-size: cover; background-position: center center; background-repeat: no-repeat;">
                                                                <span><br>Carteira Profissional<br>
                                                                (VERSO)<br>
                                                                Arquivo no formato JPEG ou PNG com no máximo 2MB.</span>
                                                                <input type="file" name="foto2" rel="edit_anexar_foto2" id="edit_foto2" style="display: none;">
                                                            </label>' 
                                                        )
                                                    ),
                                                    null,
                                                    null
                                                )
                                        )        
                                    )
                                ).
                                $html->addCol(
                                    array(
                                        "botao2" => array(
                                            "col" => 12,
                                            "content" => '<p style="clear: "></p><div class="pull-right"><a class="btn btn-default btn_voltar_prescritor" href="javascript:void(0);" id="btn_voltar_prescritor">Voltar</a> <button class="btn btn-warning" type="submit">Editar</button></div>'
                                        )
                                    )
                                );
                        echo $item_dados;
                    ?>
                </form>
            </div>
        </div>

    </div>
</div>

