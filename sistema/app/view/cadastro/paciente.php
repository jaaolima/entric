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
                                    <i class="mdi mdi-account-circle"></i> &nbsp; Cadastro de Paciente
                                </h4>


                                <form id="form_paciente" autocomplete="off" action="cadastro/paciente/<?php echo $codigo; ?>" method="post">
                                    <input type="hidden" name="_ac" id="_ac" value="cadastrar_paciente"/>
                                    <input type="hidden" name="_token" value="<?php echo generateFormToken('form_paciente'); ?>">
                                    <input type="hidden" name="_codigo" value="<?php echo $codigo; ?>">
                                    <?php
                                    $item_dados =  $html->addRow(
                                                    array(
                                                        "nome" => array(
                                                            "col" => 6,
                                                            "form-class" => "pl-2",
                                                            "label" => "Nome:",
                                                            "required" => "required",
                                                            "readonly" => "readonly"
                                                        ),
                                                        "cpf" => array(
                                                            "col" => 4,
                                                            "label" => "CPF:",
                                                            "class" => "cpf",
                                                            "required" => "required",
                                                            "readonly" => "readonly"
                                                        )
                                                    ),
                                                    $dados
                                                ).                                
                                                $html->addCol( array(
                                                        "row_telefone" => array(
                                                            "col" => 12,
                                                            "content" =>
                                                                $html->addRow(
                                                                    array(
                                                                        "email" => array(
                                                                            "col" => 4,
                                                                            "label" => "E-mail:",
                                                                            "form-class" => "mb-2",
                                                                            "type" => "email",
                                                                            "autocomplete" => "off",
                                                                            "required" => "required",
                                                                            "readonly" => "readonly"
                                                                        ),
                                                                        "senha" => array(
                                                                            "col" => 3,
                                                                            "label" => "Senha:",
                                                                            "type" => "password",
                                                                            "autocomplete" => "off",
                                                                            "required" => "required",
                                                                        ),
                                                                        "senha2" => array(
                                                                            "col" => 3,
                                                                            "label" => "Confirmar Senha:",
                                                                            "type" => "password",
                                                                            "autocomplete" => "off",
                                                                            "required" => "required",
                                                                        )
                                                                    ),
                                                                    $dados
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
                                                            "content" => '<p style="clear: "></p><div class="pull-right"><a class="btn btn-default" href="login/paciente">Voltar</a> <button class="btn btn-warning" type="submit">Cadastrar</button></div>'
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
<center><strong>POLÍTICA DE PRIVACIDADE DOS USUÁRIOS<br>
SISTEMA ENTRIC
</strong></center>

<br><br>
Você, usuário e proprietário de dados, caso queira receber as informações sobre seus dados pessoais, os propósitos e as partes de informação que são compartilhadas, basta entrar em contato com o proprietário do sistema no e-mail: contato@entric.com.br

<br><br>
<strong>Tipos de dados coletados</strong>

<br><br>
Detalhes completos de cada tipo de Dados pessoais ou Sensíveis coletados serão apresentados nas seções dedicadas desta Política de Privacidade. 

<br><br>
Os dados pessoas e/ou sensíveis poderão ser fornecidos pelo usuário livremente ou, caso sejam dados de utilização, coletados automaticamente ao se utilizar este sistema. 

<br><br>
Todos os dados solicitados por este sistema são obrigatórios e a falta de fornecimento destes dados poderá impossibilitar este aplicativo de fornecer os seus serviços em sua totalidade. Apenas nos casos em que este aplicativo afirmar especificamente a não obrigatoriedade de fornecimento de específicos dados, os usuários ficam livres para deixarem de comunicar estes dados sem nenhuma consequência para a funcionalidade do serviço. Em caso de dúvidas do usuário quanto à obrigatoriedade de quaisquer dados, poderá o usuário e titular do dado entrar em contato com o proprietário pelo e-mail já informado anteriormente. 

<br><br>
Fica permitida a utilização de cookies ou outras ferramentas de rastreamento por este aplicativo, para finalidade de fornecer os serviços solicitados pelo usuário. 

<br><br>
Os usuários ficam responsáveis por quaisquer dados pessoais e sensíveis de terceiros que forem obtidos, publicados, alimentados neste sistema ou compartilhados através destes serviços e confirmam que possuem a autorização dos terceiros para fornecerem os dados para o proprietário. 

<br><br>
<strong>Modo e Local de processamento de dados</strong>

<br><br>
O proprietário tomará as medidas de segurança adequadas para impedir o acesso não autorizado, divulgação, alteração ou destruição não autorizada dos dados. Todo o processamento de dados é realizado utilizando computadores e ferramentas atualizadas e da mais alta tecnologia habilitadas para este tipo de negocio e existentes no comércio, seguindo assim os devidos fins organizacionais e estando enquadrados nas legislações existentes. 

<br><br>
Além do proprietário do sistema ENTRIC, outras pessoas poderão ter acesso aos dados contidos no aplicativo, tais como o prescritor que neste caso refere-se ao profissional de saúde na área de nutrição que igualmente é um usuário, entretanto este possui a maioria dos dados dos titulares, sendo este quem habilita os dados no sistema, sendo por fim o responsável direto pela autenticidade dos mesmos. Poderão ainda ter acesso aos dados pessoais do sistema, os funcionários do proprietário, prestadores de serviços, demais operadores que sejam habilitados e estejam igualmente dentro das normas gerais da Lei Geral de Proteção de Dados. A listagem de todos aqueles que estejam habilitados para acessarem os dados, poderá ser solicitada a qualquer tempo pelo titular de dados pelo e-mail já fornecido neste documento. 

<br><br>
Os dados são armazenados em servidor próprio com realização de backups e criptografia para garantir a maior e mais segura proteção de dados ao titular. Este armazenamento é de responsabilidade do proprietário, mas elaborado por empresa terceirizada, podendo o titular de dados solicitar a comprovação destes armazenamentos a qualquer tempo mediante envio de solicitação para o e-mail contido aqui. 

<br><br>
Os dados poderão ser processados em quaisquer locais por se tratar de aplicativo que depende unicamente da utilização da internet, seja por conexão banda larga, Wi-Fi ou dados de aparelhos móveis para seu devido funcionamento, sendo que os dados são armazenados em seu banco de dados e alocados em servidor online próprio. 

<br><br>
<strong>Base Jurídica para o processamento</strong>

<br><br>
O proprietário do sistema poderá com a anuência do titular dos dados pessoais e sensíveis, processar, armazenar e guardar os dados ali no sistema contidos de acordo com a Legislação Vigente sobre Proteção de Dados – Lei nº. 13.709/21 – Lei Geral de Proteção de dados. 

<br><br>
Ao aceitar estes termos de privacidade, o usuário anui com o processamento de seus dados. 

<br><br>
Os dados sensíveis, como neste caso, dados médicos e de saúde, são proibidos em qualquer hipótese de serem publicados, compartilhados, cedidos, vendidos ou qualquer outra forma de utilização que não seja dentro deste sistema manuseado pelo proprietário ou por seus terceirizados devidamente autorizados e enquadrados na Lei Geral de Proteção de Dados. 

<br><br>
Os dados pessoais e sensíveis poderão ser excluídos ou anonimizados a pedido do seu titular a qualquer tempo, devendo ser enviado e-mail com a devida solicitação para o endereço já contido no início deste documento. 

<br><br>
Em caso de necessidade processual, está facultado ao proprietário após ordem judicial a disponibilizar para o juízo competente, os dados contidos em seus bancos de dados para o devido cumprimento do dever legal. 

<br><br>
<strong>Período de manutenção</strong>

<br><br>
Os dados pessoais e sensíveis poderão ser processados e armazenados por prazo indeterminado, podendo constar nos bancos de dados do proprietário pelo tempo que for necessário para o cumprimento das recomendações médicas, ou por qualquer outro tempo até que o seu titular solicite a sua exclusão. 

<br><br>
Se no prazo de 5 (cinco) anos, os dados não forem atualizados, revisitados, reativados, ou que sua exclusão não tenha sido efetuada, fica facultado ao proprietário a exclusão permanente do sistema, não sendo necessária a sua manutenção nos bancos de dados ou backups. 

<br><br>
A exclusão que se trata o parágrafo anterior deverá ser feita permanentemente não sendo possível a reativação daqueles dados que não seja a criação de novo cadastro. 

<br><br>
O prazo tratado de 5 anos equivale ao prazo razoável para prescrição de obrigações jurídicas. Não podendo assim efetivar a exclusão dos dados, exceto quando solicitado pelo titular, antes deste tempo. 

<br><br>
<strong>Direitos dos Usuários</strong>

<br><br>
São considerados usuários, os nutricionistas que por sua vez possuem dados profissionais processados pelo sistema; o parceiro que por sua vez possui dados profissionais processados pelo sistema bem como ainda dados bancários, e os pacientes chamados como cliente final, estes os que possuem mais dados pessoais e sensíveis processados pelo sistema dada a sua condição de paciente. 

<br><br>
Poderão os usuários exercer alguns direitos relacionados as seus dados, como por exemplo: i) retirar a sua anuência a qualquer momento com relação ao processamento de seus dados pessoais ou sensíveis; ii) Acessar os seus dados tendo direito a uma copia dos dados que estiverem endo processados pelo proprietário e ainda ter a comprovação do processamento pelas pessoas devidamente habilitadas nos termos da legislação vigente; iii) os usuários possuem o direito de rejeitar que seus dados sejam processados, basta clicar em não aceitar junto a este termo; iv) poderá o usuário pedir a atualização e correção de algum dado que necessite de tal ajuste; v) tem o usuário o poder de restringir quais dados poderão ser processados pelo proprietário e quais deverão ser excluídos ou anonimizados, de acordo com a necessidade; vi) solicitar que seu dados sejam permanentemente apagados; vii) poderá o usuário requerer que seus dados sejam processados por outro controlador, devendo o proprietário fornecer os dados devidamente em arquivo compatível para o processamento por outro controlador. 

<br><br>
Além das atribuições acima, poderá o usuário registrar reclamação aos órgãos de proteção de dados como a ANPD a qualquer momento que sinta necessidade. 

<br><br>
Quaisquer pedidos para exercer os direitos dos Usuários podem ser direcionados ao Proprietário através dos dados para contato fornecidos neste documento. Estes pedidos podem ser exercidos sem nenhum custo e serão atendidos pelo Proprietário com a maior brevidade possível e em todos os casos em prazo inferior a um mês.



<br><br>
<strong>Informações adicionais sobre os Dados Pessoais do Usuário</strong>

<br><br>
Além das informações contidas nesta Política de Privacidade, este Aplicativo poderá fornecer ao Usuário informações adicionais e contextuais sobre os serviços específicos ou a coleta e processamento de Dados Pessoais mediante solicitação.

<br><br>
É de ciência do usuário que seu acesso é efetuado mediante login e senha de cunho único e intransferível, que o compartilhamento destas informações não é de responsabilidade do proprietário e que qualquer vazamento de dados que venha a ocorrer através deste canal não será de sua responsabilidade. 

<br><br>
É de ciência do usuário paciente que seus dados médicos são considerados pela Lei Geral de Proteção de Dados como dados sensíveis não sendo possível o seu compartilhamento exceto nos casos exigidos por lei. 


<br><br>
<strong>Da Utilização de Logs/Cookies </strong>

<br><br>
Para fins de operação e manutenção, o sistema e outros serviços de terceiros poderão coletar arquivos que gravam a interação com este Aplicativo (logs do sistema) ou usar outros Dados Pessoais (tais como endereço IP) para esta finalidade.


<br><br>
<strong>Mudanças na Política de Privacidade</strong>

<br><br>
É facultado ao proprietário o direito de efetuar alterações a qualquer tempo na politica de privacidade, mediante comunicação aos seus usuários que ocorrerá dentro deste próprio sistema, em pagina devidamente visível. Caso as alterações modifiquem o ajuste de anuência dos usuários os mesmos deverão manifestar sua anuência novamente. 


<br><br>
<div style="text-align: right;">Brasília, 28 de julho de 2022. </div>
<div style="text-align: right;">Sistema ENTRIC </div>
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