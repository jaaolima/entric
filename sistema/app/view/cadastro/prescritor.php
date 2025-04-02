<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-between h-100">

                <div class="col-sm-3">
                    <div class="row h-100 justify-content-center align-items-center bg-login">
                        <a href="login">
                            <img src="assets/images/login-logo-horizontal.png" border="0" width="250" />
                        </a>
                    </div>
                </div>

                <div class="col-sm-9 p-0 cadastro-menu">
                    <div class="container h-100">

                        <div class="row align-items-center h-100 pt-5 pb-5">
                            <div class="col-md-12 m-2 entric">
                                

                                <h4 class="card-title bb-line mb-5 mlr-12">
                                    <i class="mdi mdi-account-circle"></i> &nbsp; Cadastro de Prescritor
                                </h4>


                                <form id="form_prescritor" action="cadastro/prescritor" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_ac" id="_ac" value="cadastrar_prescritor"/>
                                    <input type="hidden" name="_token" value="<?php echo generateFormToken('form_prescritor'); ?>">
                                    <?php
                                    $item_dados =  $html->addRow(
                                                    array(
                                                        "nome" => array(
                                                            "col" => 6,
                                                            "form-class" => "pl-2",
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
                                                        "row_telefone" => array(
                                                            "col" => 12,
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
                                                                            "col" => 3,
                                                                            "label" => "Cidade:",
                                                                            "required" => "required",
                                                                        ),
                                                                        "senha" => array(
                                                                            "col" => 2,
                                                                            "label" => "Senha:",
                                                                            "type" => "password",
                                                                            "required" => "required",
                                                                        ),
                                                                        "senha2" => array(
                                                                            "col" => 2,
                                                                            "label" => "Confirmar Senha:",
                                                                            "type" => "password",
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
                                                                            "col" => 5,
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
                                                                            "col" => 5,
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
                                                                            "col" => 2,
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
                                                                            "col" => 3,
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
                                                                            "col" => 3,
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
                                                                            "col" => 3,
                                                                            "label" => "Número CRN:",
                                                                            "form-class" => "input_crn none",
                                                                            "parameters" => "maxlength='6'"
                                                                        ),
                                                                        "carteira_frente" => array(
                                                                            "col" => 5,
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
                                                                            "col" => 5,
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
                                                        "termo" => array(
                                                            "col" => 6,
                                                            "content" => '
                                                                <div class="form-radio mt-4">
                                                                    <input id="aceito" class="styled-checkbox" name="aceito" type="checkbox" value="0" required="required">
                                                                    <label for="aceito" class="form-check-label check-green"> &nbsp; </label>

                                                                    <span style="font-size: 13px;">Eu li e concordo com os <a href="javascript:void(0);"  data-toggle="modal" data-target="#politica" style="color: #0092c5;">termos de uso e a política de privacidade</a>.</span>
                                                                </div>'
                                                        ),
                                                        "botao2" => array(
                                                            "col" => 4,
                                                            "content" => '<p style="clear: "></p><div class="pull-right"><a class="btn btn-default" href="login/prescritor">Voltar</a> <button id="cadastrar" class="btn btn-warning" type="submit">Cadastrar</button></div>'
                                                        )
                                                    )
                                                );
                                        echo $item_dados;
                                    ?>
                                </form>




                            </div>
                        </div>

<div class="modal fade" id="termos" tabindex="-1" role="dialog" aria-labelledby="termosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termosLabel">Termos de Uso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="politica" tabindex="-1" role="dialog" aria-labelledby="politicaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="politicaLabel">Política de Privacidade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size: 12px; text-align: justify;">
<center><strong>INSTRUMENTO CONTRATUAL DE
PRIVACIDADE E PROTEÇÃO DE DADOS </strong></center>

<br><br>
O presente instrumento visa estabelecer os termos e condições referentes à Privacidade e Proteção de Dados Pessoais, entre _____________________________ (dados do profissional de saúde/estabelecimento de saúde), ora denominado como PRESTADOR, e ________________________________ (dados da empresa responsável pelo programa), ora denominado FORNECEDOR. 

<br><br>
1.  <strong>Definições </strong>
1.1.    Os termos abaixo possuem o significado ora estabelecido e terão a seguinte interpretação: 

<br><br>
1.1.1.  <strong>“Autoridade Nacional de Proteção de Dados ou ANPD”</strong> é a entidade pública competente, estruturada no Decreto nº. 10.474 de 26 de agosto de 2020, para supervisionar, fiscalizar e conduzir a execução dos procedimentos previstos na Lei Geral de Proteção de Dados Pessoais – LGPD; 

<br><br>
1.1.2.  <strong>“Dados Pessoais”, “Dados Pessoais Sensíveis”, “Tratamento”, “Controlador”, “Operador”, “Encarregado” e “Titular”,</strong> devem possuir os mesmos significados contidos na Lei Geral de Proteção de Dados Pessoais – LGPD, Lei nº. 13.709/18;

<br><br>
1.1.3.  <strong>“Dados Pessoais por ENTRIC...”</strong> possuem o significado de qualquer Dado Pessoal ou Dado Pessoal Sensível, conforme descrito na Lei Geral de Proteção de Dados, objeto de Tratamento pelo(a) Fornecedor(a), ou qualquer uma de suas Afiliadas, na execução do Contrato Principal;

<br><br>
1.1.4.  <strong>“Lei Geral de Proteção de Dados ou LGPD”</strong> é a Lei Federal nº. 13.709 de 14 de agosto de 2018 e suas respectivas alterações;

<br><br>
1.1.5.  <strong>“Legislação Aplicável”</strong> (i) a LGPD, com respeito a quaisquer Dados Pessoais e seu Tratamento; (ii) Marco Civil da Internet Lei nº. 12.965/14, (iii) ou qualquer outra lei aplicável com relação à proteção e privacidade de Dados Pessoais em território nacional brasileiro; 

<br><br>
1.1.6.   <strong>“Leis de Proteção de Dados” </strong> devem significar as regras contidas na LGPD, Marco Civil da Internet, e/ou qualquer outra regra contida em legislação específica e que se aplique à proteção e privacidade de Dados Pessoais em território nacional brasileiro;

<br><br>
1.1.7.  <strong>“Medidas Técnicas e Organizacionais”</strong> possuem seu significado conforme descrito na Cláusula 4 abaixo;

<br><br>
1.1.8.  <strong>“Serviços”</strong> significam os serviços a serem prestados pelo(a) PRESTADOR(a) ao FORNECEDOR (a), e/ou suas Afiliadas, se houver, na execução do Contrato Principal;

<br><br>
1.1.9.  <strong>“Sub-Operador”</strong> significa qualquer Operador (incluindo terceiros) indicado pelo(a) Prestador(a) para tratar os Dados Pessoais em nome do mesmo, ou qualquer uma de suas Afiliadas.

<br><br>
1.1.10. <strong>“Violação de Dados Pessoais”</strong> significa a destruição ilícita ou acidental, perda, alteração, divulgação não autorizada ou acesso aos Dados Pessoais, transmitidos, armazenados ou de qualquer outra forma tratados pelo(a) Prestador(a) em nome do FORNECEDOR (a), ou qualquer uma de suas Afiliadas, bem como qualquer violação do quanto previsto nos termos da Cláusula 5 abaixo, ou da proteção dos dados, confidencialidade ou disposições previstas neste Instrumento;

<br><br>
2.  <strong>DOS DADOS PESSOAIS E SENSÍVEIS</strong> 

<br><br>
2.1.    O objeto da prestação havida entre as partes deste instrumento está relacionado a área da saúde, no que tange a utilização do sistema do FORNECEDOR pelo PRESTADOR. 

<br><br>
2.2.    O PRESTADOR utilizará o sistema para apresentar a seus pacientes (cliente final) suas receitas e/ou dietas de acordo com a sua avaliação nutricional e médica. Diante disso, sabe-se que as partes estarão munidas de dados pessoais e sensíveis destes pacientes, assim é de responsabilidade de ambos garantir o mais absoluto sigilo e rigor na proteção destes dados. 

<br><br>
2.3.    A obrigatoriedade na adequação à Lei Geral de Proteção de Dados é medida imprescindível para que ambas as partes mantenham a prestação de serviços havida.

<br><br>
2.4.    Fica esclarecido entre as partes que o paciente (cliente final) está relacionado direto do PRESTADOR, sendo este último o responsável direto pela manutenção dos dados pessoais/sensíveis de titularidade dos pacientes. 

<br><br>
3.   <strong>Do Objeto do contrato.</strong> 

<br><br>
3.1.    O presente instrumento tem por finalidade ajustar a prestação de serviços entre o Prestador e o Fornecedor na área da saúde, onde o primeiro sendo o profissional de saúde poderá utilizar-se do programa Entric para efetivar a prescrição nutricional à seus pacientes que serão por sua vez, os clientes finais. 

<br><br>
3.2.    Para isso, deverá o Fornecedor aprovisionar o acesso ao programa Entric para que o Prestador possa utilizar-se deste como meio de trabalho para suas prescrições. 

<br><br>
3.3.    O Prestador possuirá acesso à: página inicial sendo acessada online no endereço https://sistema.entric.com.br; seu acesso será permitido com login e senha apenas na aba ‘prescritor’, acesso posterior a todos os dados pessoais e sensíveis do cliente final, bem como emitir o relatório de alta. 

<br><br>
3.4.    Os clientes finais, ou seja, os pacientes do Prestador possuirão seu acesso ao programa ENTRIC mediante login e senha, tendo todos os seus direitos de dados resguardados como restará nas cláusulas a seguir. 

<br><br>
3.5.    Este instrumento não regerá cláusulas burocráticas tais como validade e valores, os quais são acordados em instrumento apropriado. 

<br><br>
3.6.    Todos e quaisquer dados acessados pelo Prestador estarão protegidos pela legislação de proteção de dados, seja pela LGPD, pelo Marco Civil da Internet ou por qualquer outra legislação que esteja ou venha a estar em vigor, sendo de sua única responsabilidade a veracidade e manutenção dos mesmos.



<br><br>
4. <strong>Termos do Tratamento de Dados</strong> 

<br><br>
4.1.    Os Dados Pessoais poderão ser tratados, para execução da finalidade de: armazenamento, utilização e manuseio para prescrição médica utilizado apenas pelo PRESTADOR e armazenado pelo sistema do FORNECEDOR.  As Partes concordam em cumprir e estar em conformidade com todas as disposições ora estipuladas em relação ao tratamento de Dados Pessoais submetidos a Tratamento.

<br><br>
4.2.    O Operador não deverá tratar, transferir, modificar, aditar, alterar, divulgar ou permitir a divulgação dos Dados Pessoais a qualquer terceiro que não tenha expressamente sido autorizado, salvo quando o tratamento é exigido por obrigação legal a que o Operador esteja sujeito, o qual, na medida do permitido, deverá informar ao Controlador de tal requerimento e/ou exigência legal antes de dar continuidade ao Tratamento dos Dados Pessoais. 



<br><br>
5.   <strong>Acesso de Colaboradores </strong> 

<br><br>
5.1.    O acesso do (a) PRESTADOR (a) é limitado a apenas aquela pessoa, não sendo transferível o acesso a terceiros, assim é de responsabilidade do PRESTADOR o acesso ao programa e automaticamente aos Dados Pessoais por qualquer um de seus colaboradores, caso haja, agentes ou subcontratados. 
Caso exista a necessidade de acesso ao programa por colaboradores do Prestador, tal acesso deverá ser autorizado e criado prestador, desde que sejam obedecidos os critérios abaixo: 

<br><br>
5.1.1.  Sejam informados formalmente da natureza confidencial dos Dados Pessoais, aplicabilidade da legislação e penalizações.

<br><br>
5.1.2.  Recebam o treinamento apropriado com relação às Leis de Proteção de Dados e demais legislações vigentes a época; 

<br><br>
5.1.3.  Estejam sujeitos, em seu Contrato de Trabalho e/ou Contrato de Prestação de Serviços ao dever de confidencialidade; e


<br><br>
5.1.4.  Estejam sujeitos a todas as medidas técnicas de segurança de acesso aos Dados Pessoais.


<br><br>
4.2.    Da mesma forma, o Prestador deverá tomar todas as medidas de segurança necessárias em relação ao acesso de Dados Pessoais por qualquer um de seus colaboradores, agentes ou subcontratados. 

<br><br>
4.3.   Assim como o Fornecedor, o Prestador obtendo acesso a alguns Dados Pessoais, será de sua responsabilidade o treinamento de sua equipe de colaboradores com relação aos termos da Lei Geral de Proteção de Dados. 
 



<br><br>
6.  <strong>Medidas de Segurança</strong> 

<br><br>
6.1.    Levando-se em consideração a natureza da prestação de serviços havido entre as partes, e o contexto envolvido, bem como as finalidades para o Tratamento ora estipuladas, além da relevância na preservação dos direitos e liberdades das pessoas naturais, o (a) Prestador (a) deverá implementar medidas técnicas e organizacionais possíveis e disponíveis para garantir apropriados níveis de segurança da informação e mitigação de riscos previstos nas Leis de Proteção de Dados, em especial na LGPD.

<br><br>
6.2.    Fornecedor(a) e Prestador (a),  deverão estar em conformidade com as diretrizes e recomendações razoáveis presentes em qualquer guia/questionário/manual/cartilha de boas práticas em termos de auditoria de Tecnologia da Informação – TI e segurança cibernética, checados e cumpridos antes e/ou durante o prazo de execução dos Serviços ajustados entre as partes. 

<br><br>
6.3.    Durante a avaliação dos níveis de segurança a serem adotados, o(a) Fornecedor(a) deverá levar em consideração os riscos envolvidos com as atividades de Tratamento, em especial a possibilidade de Violação de Dados Pessoais/Sensíveis. 

<br><br>
6.4     Todas as hipóteses descritas na clausula 6 deste instrumento, aplicam-se ao Prestador (a), haja vista ser passível de vazamento na mesma proporção que o Fornecedor (a), sendo assim, as mesmas responsabilidades lhes são atribuídas. 


<br><br>
7.  <strong>Sub-tratamento</strong> 

<br><br>
7.1.    O Fornecedor reconhece e desde já autoriza o(a) Prestador (a) a subcontratar Suboperadores para auxílio na execução dos Serviços e obrigações contratada entre as partes, desde que tais Suboperadores sempre fiquem sujeitos, no mínimo, às mesmas obrigações de conformidade aplicáveis ao(a) Prestador(a). 

<br><br>
7.2.    Sempre que houver a contratação ou exclusão de algum Suboperador, deverá o Prestador avisar com antecedência o Fornecedor, mantendo-se assim sempre atualizada a listagem de Suboperadores e seus respectivos acessos.

<br><br>
7.3.    Após o recebimento do aviso previsto no item acima, O Fornecedor poderá, também mediante notificação expressa e no prazo de 15 (quinze) dias corridos do recebimento do referido aviso, manifestar sua objeção quanto à inclusão de qualquer Suboperador.

<br><br>
7.4.    Com relação a cada Suboperador, o(a) Prestador(a) deverá:

<br><br>
7.4.1.  Garantir que seu Suboperador possua níveis adequados de segurança dos Dados Pessoais, conforme previsto e requerido por este instrumento e obedeça às exigências previstas nas Leis de Proteção de Dados e/ou legislação de dados em vigor;

<br><br>
7.4.2.  Prover ao Fornecedor todos os detalhes do Tratamento que será responsabilidade de cada Suboperador; 

<br><br>
7.4.3.  Incluir termos e condições nos contratos firmados entre o(a) Prestador(a) e os Suboperadores substancialmente equivalentes aos termos deste Instrumento.

<br><br>
7.4.4.  Responsabilizar-se integralmente cível e criminalmente perante o Fornecedor por qualquer falha ou Violação de Dados Pessoais oriundas de atividades de responsabilidade de qualquer um dos Suboperadores.




<br><br>
8.  <strong>Direitos dos Titulares</strong> 

<br><br>
8.1.    Levando-se em conta a natureza da atividade de Tratamento, quando cabível, as partes deverão mutuamente colaborar entre si, para responderem às eventuais solicitações dos Titulares em relação aos seus direitos, conforme elencado e previsto no Artigo 18 da LGPD (Lei nº. 13.709/18).  

<br><br>
8.2.    O(a) Prestador(a) deverá prontamente notificar o Fornecedor no caso de receber qualquer solicitação de algum Titular acerca do Tratamento dos Dados Pessoais, sob a regência de qualquer Lei de Proteção de Dados, sendo o inverso igualmente válido.

<br><br>
8.3.    O(a) Fornecedor(a) deverá cooperar, conforme solicitado, e ajudar o Prestador a viabilizar o cumprimento e estar em conformidade com qualquer direito do Titular sob a égide das Leis de Proteção de Dados e em relação aos Dados Pessoais/Sensíveis de todos os seus clientes.

<br><br>
8.4.    O(a) Prestador(a) deverá cumprir com os requisitos a seguir, mas sem limitação:

<br><br>
8.4.1.  Conter relação de todos os Dados Pessoais/Sensíveis mantidos, que deverão ser fornecidos quando solicitados pelo Controlador, em prazo razoável especificado para cada caso, incluindo os detalhes integrais e cópias das reclamações, comunicações e/ou requerimentos, bem como quaisquer Dados Pessoais/Sensíveis tratados e armazenados em relação ao Titular requisitante; 

<br><br>
8.4.2.  Quando aplicável, levar o(a) Fornecedor(a) a prover o referido auxílio, mediante solicitação do Prestador, de modo a viabilizar o cumprimento das conformidades relevantes e requisitadas nos prazos previstos pelas Leis de Proteção de Dados ou estipulados pela ANPD;




<br><br>
9.  <strong>Violação de Dados Pessoais </strong> 

<br><br>
9.1.    No caso de ciência de qualquer Violação de Dados Pessoais, caso ocorra nas dependências ou por culpa exclusiva do Prestador (a), deverá o mesmo notificar imediatamente o Fornecedor, em qualquer caso, e no prazo de 48 (quarenta e oito) horas, prover ao Fornecedor informações suficientes sobre as medidas que serão/foram tomadas para o efetivo cumprimento do dever de informação em casos como este.

<br><br>
9.1.1   Em caso de Violação de Dados Pessoais nas dependências ou por culpa exclusiva do Controlador (a), o mesmo prazo de 24 (vinte e quatro) horas deverá ser cumprido para notificação e ciência do Fornecedor (a). 

<br><br>
9.2.    Na medida que os Dados Pessoais Prestados estiverem envolvidos em eventuais violações, tais notificações que deverão ser realizadas imediatamente, deverão no mínimo:

<br><br>
9.2.1.  Descrever a natureza da Violação de Dados Pessoais, o número de Titulares envolvidos, os Dados Pessoais violados e seu volume;

<br><br>
9.2.2.  Comunicar o nome e contato do Encarregado e responsável do(a) Controlador(a) ou qualquer outro contato que possa prover informações relevantes sobre a(s) violação(ões);

<br><br>
9.3.    Em caso das ocorrências acima, ambas as partes deverão cooperar com as medidas comerciais e técnicas que o outro direcionar, no sentido de auxílio mútuo nas investigações, mitigando e remediando as violações. 

<br><br>
9.4.    No caso de qualquer Violação de Dados Pessoais, O(a) Fornecedor(a) ou Prestador (a), não deverá informar ou comunicar a nenhum terceiro, sem antes obter o expresso consentimento do outro salvo quando a notificação é requerida por obrigação legal, devendo O(a) Fornecedor(a) ou Prestador (a), na medida permitida por lei, informar de tal notificação, devendo fornecer uma cópia e considerar qualquer apontamento a outra parte, antes de fornecer qualquer resposta e/ou notificação a terceiros ou autoridade.




<br><br>
10. <strong>Incidentes</strong> 

<br><br>
10.1.   Em caso de ocorrências envolvendo dados pessoais e sensíveis de qualquer natureza e de qualquer usuário, a parte que constatar ou for contatado sobre a ocorrência deverá no prazo de 48 horas notificar a outra parte deste instrumento, fornecendo todos os dados da ocorrência de violação, ato seguinte ambos deverão utilizar-se de todas as ferramentas manuais e/ou tecnológicas para identificar o pivô da ocorrência e dentro das diretrizes legais tomarem as atitudes cabíveis. 
 
<br><br>
10.2.   Para os fins do Contrato Principal, entende-se como incidente qualquer violação de confidencialidade, disponibilidade e/ou integridade dos dados pessoais, incluindo, mas não se limitando a, situações de: 

<br><br>
10.2.1. Exposição indevida ou acidental, temporária ou permanente, de qualquer dado pessoal e principalmente dado sensível; 

<br><br>
10.2.2. Acesso ao sistema ou a documentos por terceiros não autorizados, através de meios digitais (“invasão hacker”, “interface” etc.) ou físico (utilizando-se de engenharia social e atuação mecânica); 

<br><br>
10.2.3. Perda ou roubo de equipamentos, pastas ou documentos que contenham dados pessoais armazenados com ou sem criptografia; 

<br><br>
10.2.4. Impossibilidade, ainda que temporária, de acesso aos servidores onde estejam armazenados os dados pessoais (incluindo situações de ataque de negação de serviço, distribuído ou simples – DoS/DDoS – e ransomwares);
 
<br><br>
10.2.5. Bloqueio, perda, corrupção, deleção ou criptografia indevida (i.e., criptografia de terceiros) dos dados pessoais; e principalmente sensíveis.
 
<br><br>
10.2.6. Inclusões, modificações ou alterações não autorizadas nos dados pessoais ou em seus parâmetros de classificação; 




<br><br>
11. <strong>Violação de Dados Pessoais </strong> 

<br><br>
11.1.   No caso de ciência de qualquer Violação de Dados Pessoais, o(a) Prestador(a) deverá notificar imediatamente o Fornecedor por meio de e-mail encaminhado ao gestor do contrato (contato@entric.com.br) e ao Encarregado de Proteção de Dados, em qualquer caso, e no prazo de 24 (vinte e quatro) horas, provendo ao Fornecedor informações suficientes sobre as medidas que serão/foram tomadas para o efetivo cumprimento do dever de informação em casos como este.


<br><br>
11.2.   Na medida que os Dados Pessoais e Sensíveis, estiverem envolvidos em eventuais violações, tais notificações que deverão ser realizadas imediatamente, deverão conter no mínimo:

<br><br>
11.2.1. Descrição da natureza da Violação de Dados Pessoais;

<br><br>
11.2.2. A data e hora do incidente; 

<br><br>
11.2.3. A data e hora da ciência do(a) Prestador(a)

<br><br>
11.2.4. A relação dos tipos de dados afetados pelo incidente; 

<br><br>
11.2.5. O número de usuários afetados (volumetria do incidente) e, se possível, a relação destes indivíduos; 

<br><br>
11.2.6. Os dados de contato do Encarregado pela Proteção de Dados do(a) Prestador(a) ou outra pessoa junto à qual seja possível obter maiores informações sobre o ocorrido; e 

<br><br>
11.2.7. A descrição das possíveis consequências do evento; 

<br><br>
11.3.   O(a) Prestador(a) deverá cooperar com o Fornecedor a tomar todas as medidas comerciais e técnicas conforme direcionamento do próprio Fornecedor no sentido de auxiliar nas investigações, mitigar e remediar cada uma das violações.

<br><br>
11.4.    A seguir, e após a anuência do Fornecedor, deverá o(a) Prestador(a) providenciar: 
 
<br><br>
11.4.1. A notificação dos indivíduos afetados, mediante texto previamente aprovado pelo Fornecedor.

<br><br>
11.4.2. A notificação da Autoridade Nacional de Proteção de Dados, mediante texto previamente aprovado pelo Entric.

<br><br>
11.4.3. A adoção de um plano de ação que pondere os fatores que levaram à causa do incidente e aplique medidas que visem garantir a não recorrência deste evento. 

<br><br>
11.5.   No caso de qualquer Violação de Dados Pessoais, o(a) Prestador(a) não deverá informar ou comunicar a nenhum terceiro, sem antes obter a expressa anuência do Fornecedor salvo quando a notificação é requerida por obrigação legal, devendo o(a) Prestador(a), na medida permitida por lei, informar o Fornecedor de tal notificação, devendo fornecer uma cópia e considerar qualquer apontamento do Fornecedor antes de fornecer qualquer resposta e/ou notificação a terceiros ou autoridade.

<br><br>
11.6.   Caso o Fornecedor assuma sanções decorrentes de violações de dados pessoais relacionados a prestação de serviços do contrato principal, por culpa do(a) Prestador(a), o Fornecedor poderá exercer o direito de regresso perante a o(a) Prestador(a), ficando este instrumento contratual constituído como título executivo extrajudicial. 




<br><br>
12. <strong>Avaliação de Impacto na Proteção de Dados e Consulta Prévia</strong> 

<br><br>
12.1.   O(a) Fornecedor(a) deverá fornecer toda assistência razoável ao Prestador, mediante consulta prévia, em qualquer avaliação de impacto na proteção de dados e produção do competente relatório de impacto, conforme previsto na LGPD e sempre que for exigido por lei ou pela ANPD (Agência Nacional de Proteção de Dados).



<br><br>
13. <strong>Eliminação e Devolução dos Dados Pessoais </strong> 

<br><br>
13.1.   Encerrado o prazo do Contrato Principal ou não havendo mais propósito ou necessidade no Tratamento dos Dados Pessoais, o(a) Prestador(a) deverá prontamente eliminar, inclusive das cópias/backups existentes, todos os Dados Pessoais tratados pelo(a) Prestador(a) ou qualquer Suboperador Autorizado.

<br><br>
13.2.   No caso de encerramento contratual ou ao findar da necessidade de utilização do sistema pelo cliente final do Prestador, este útimo deverá informar o Fornecedor, bem como efetivar a exclusão dos dados do cliente final do sistema ENTRIC, solicitando que o mesmo seja efetuado pelo Fornecedor junto aos backups e outros armazenamentos. 

<br><br>
13.3.   Fornecedor poderá, de acordo com seu exclusivo critério, notificar e solicitar expressamente o(a) Prestador(a) que devolva uma cópia completa dos Dados Pessoais, pelos meios e em formatos, analógico ou eletrônico, seguros de transferência e armazenamento de dados, conforme descrição em requerimento próprio.

<br><br>
13.3.1. O(a) Prestador(a) deverá cumprir o quanto solicitado em até 15 (quinze) dias corridos do recebimento do requerimento pelo Fornecedor.

<br><br>
13.4.   O(a) Fornecedor(a) poderá reter os Dados Pessoais Prestador na medida que for exigido pela Legislação Aplicável e somente pelo período exigido por lei e sempre observando que o(a) Prestador(a) deverá garantir a confidencialidade, confiabilidade, integridade e segurança dos Dados Pessoais, bem como garantir que tais Dados Pessoais e Sensíveis serão tratados e armazenados tão somente enquanto for necessário para finalidade específica e definida na Legislação Aplicável. 

<br><br>
13.5.   O(a) Prestador(a) deverá fornecer declaração e garantia expressa ao Fornecedor que está plenamente em conformidade com os termos e condições previstos nesta cláusula em até 30 (trinta) dias corridos da eliminação ou devolução dos Dados Pessoais e Sensíveis.



<br><br>
14. <strong>Transferência internacional  </strong> 

<br><br>
14.1.   Caso seja necessária a transferência internacional de Dados Pessoais para o cumprimento do presente Contrato, o(a) Prestador(a) deverá informar previamente à ENTRIC e garantir a implementação das medidas de segurança necessárias para a garantia da confidencialidade, integridade e disponibilidade dos dados pessoais transferidos. 

<br><br>
14.2.   Após a Notificação, a transferência internacional deverá ser expressamente autorizada pelo Fornecedor, seguindo todos os tramites seguros e previstos em lei, garantindo a maior segurança jurídica e digital dos dados a serem transferidos.



<br><br>
15. <strong>Cumprimento de obrigação legal </strong> 

<br><br>
15.1.   Caso a o(a) Prestador(a) seja destinatário de qualquer ordem judicial ou comunicação oficial que determine o fornecimento ou divulgação de informações pessoais, deverá notificar o Fornecedor imediatamente, na medida permita por lei, sobre o ocorrido, oportunizando a adoção, em tempo hábil de medidas legais para impedir ou mitigar os efeitos decorrentes da divulgação dos dados pessoais relacionados a esta requisição ou objetos desta.  



<br><br>
16. <strong> Indenização</strong> 

<br><br>
16.1.   O(a) Prestador(a) será responsável por quaisquer reclamações, perdas e danos, despesas processuais judiciais, administrativas e arbitrais, em qualquer instância ou tribunal, que venham a ser ajuizadas em face do Fornecedor multas, inclusive, mas não se limitando àquelas aplicadas pela Autoridade Nacional de Proteção de Dados, além de qualquer outra situação que exija o pagamento de valores pecuniários, quando os eventos que levarem a tais consequências decorrerem de: (i) descumprimento, pelo(a) Prestador(a) ou por terceiros por ele contratados, das disposições expostas neste instrumento; (ii) qualquer exposição acidental ou proposital de dados pessoais e/ou sensíveis por parte do(a) Prestador(a); (iii) qualquer ato do(a) Prestador(a) ou de terceiros por ele contratados, em discordância com a legislação aplicável à privacidade e proteção de dados.  

<br><br>
16.2.   Para os fins da Cláusula 16, o(a) Prestador(a) resguardará os interesses do Fornecedor prestando, inclusive, as garantias necessárias à sua eventual desoneração.
  
<br><br>
16.3.   Nas demandas processuais administrativas, arbitrais, judiciais e extrajudiciais que tramitarem somente em face do(a) Prestador(a), este se obriga a notificar o Controlador para que ele tenha conhecimento do processo.
  
<br><br>
16.4.   Caso o Fornecedor tenha interesse, poderá ingressar no processo judicial como assistente litisconsorcial, nos termos do artigo 124 do Código de Processo Civil, hipótese em que todas as despesas processuais, correção monetária, juros e honorários advocatícios serão de inteira responsabilidade do(a) Prestador(a).
  
<br><br>
16.5.   O Fornecedor poderá denunciar à lide em face do Prestador quando este, por qualquer motivo, não tenha sido parte do processo, nos termos do artigo 125 do Código de Processo Civil, hipótese em que o(a) Prestador(a) assumirá, perante o juízo, integral responsabilidade pelos danos causados e despesas incorridas.  



<br><br>
17.    <strong> Termos Gerais </strong> 

<br><br>
Encerramento
17.1.    As partes concordam que este Adendo perde seu efeito automaticamente com (i) o encerramento do Contrato Principal; ou (ii) sujeito ao consenso entre as partes, o término da finalidade e necessidade de continuidade no Tratamento dos Dados Pessoais e Sensíveis, ressalvadas as obrigações legais impostas às partes na guarda e preservação dos direitos do Prestador ou de Titulares e terceiros, quando as disposições ora previstas devem subsistir em relação ao Prestador e seus Suboperadores.

<br><br>
Foro e Legislação Aplicável
17.2.   As partes submetem este Adendo ao foro eleito e previsto no Contrato Principal, afastando qualquer outro, por mais privilegiado que seja, especialmente em relação a qualquer disputa ou ação que possa surgir pela aplicação das regras deste Adendo, incluindo, mas não limitadas a questões referentes à sua existência, validade, encerramento ou quaisquer consequências de eventuais nulidades.
 
<br><br>
17.3.   O presente Adendo é regido pelas regras contidas na Legislação Aplicável. 

<br><br>
Violações
17.4.   Qualquer violação deste Adendo constituirá uma violação material do Contrato Principal, sujeitando-se as penas e cominações de direito.

<br><br>
Contradições e Inconsistências
17.5.   No caso de qualquer contradição ou inconsistência entre as disposições deste Adendo e qualquer outro acordo entre as partes, incluindo, mas não limitado ao Contrato Principal, as disposições deste Adendo deverão prevalecer no que se referir às questões de privacidade e proteção de Dados Pessoais.

<br><br>
Custos e Despesas de Medidas Técnicas e Organizacionais
17.6.   As partes concordam que quaisquer custos e despesas de implantação das Medidas Técnicas e Organizacionais ora previstas, bem como de adequação de programas de conformidade e segurança da informação, serão de exclusiva responsabilidade de cada uma das partes e não acarretará custo ou despesa adicional a nenhuma das partes em relação à outra por conta da execução do Contrato Principal ou deste Adendo.

<br><br>
Direitos de Terceiros 
17.7.   Nenhum terceiro, que não as partes deste Adendo, terá direito de exigir a execução ou aplicação das disposições deste Adendo.

<br><br>
17.8.   As Afiliadas Prestador se for o caso, poderão exigir a execução deste Adendo, expressa ou implicitamente em seu benefício.

<br><br>
17.9.    O direito de rescindir ou alterar este Adendo não depende da anuência e consentimento de qualquer outra pessoa, que não as partes deste Adendo.

<br><br>
Alterações das Leis de Proteção de Dados
17.10.  O Fornecedor poderá notificar expressamente o Prestador, a qualquer tempo, quando houver qualquer tipo de alteração das Leis de Proteção de Dados e que exija qualquer tipo de modificação ou edição do presente Adendo. Qualquer alteração necessária deverá ser feita por escrito e de comum acordo entre as partes, produzindo seus regulares efeitos a partir da assinatura das competentes alterações, bem como podendo implicar na necessária alteração dos acordos e contratos firmados pelo Prestador com Suboperadores ou terceiros, a fim de se adequarem a este Adendo atualizado.

<br><br>
Independência das Disposições
17.11.  No caso da declaração de nulidade, invalidade ou inaplicabilidade de qualquer uma das disposições previstas neste Adendo, permanecerá em pleno vigor as demais disposições que não forem objeto da referida declaração. As disposições nulas ou inválidas devem ser alteradas, na medida do possível, a fim de conferir validade às disposições e preservar as intenções originais das partes.
    
<br><br>
Estando as partes de livre e comum acordo, firmam o presente Adendo, a fim de produzir seus regulares efeitos a partir da presente data, bem como passando a fazer parte do Contrato Principal, aceitando os Termos de Privacidade.


<br><br>
<div style="text-align: right;">Brasília, 28 de julho de 2022. </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

                        <footer class="page-footer font-small text-white position-absolute fixed-bottom">
                            <div class="footer-copyright text-center py-3 p-2">
                                <?php echo VERFOOTER;?>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("cadastrar").addEventListener("click", function(e) {
            const aceito = document.getElementById("aceito").checked;
            if (!aceito) {
                e.preventDefault(); // Impede o comportamento padrão (ex.: envio de formulário)
                alert("É necessário concordar com os termos de uso e as políticas de privacidade.");
            }
        });
    </script>