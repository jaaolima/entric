<?php
require_once('/var/www/html/sistema/api/vendor/PHPMailer/src/PHPMailer.php') ;
require_once('/var/www/html/sistema/api/vendor/PHPMailer/src/SMTP.php') ;
require_once('/var/www/html/sistema/api/vendor/PHPMailer/src/Exception.php') ;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class CadastroController extends Controller {

    function beforeAction () {

    }  
    
    function index($idretorno = null) { 
    }
    
    function prescritor() { 
        if (isset($_POST['_ac'])){
            if ($_POST['_ac'] == "cadastrar_prescritor"){
                if (isset($_POST['email']) == FALSE ) $email = ""; else $email = $_POST['email'];
                if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha'];
                if (isset($_POST['senha2']) == FALSE ) $senha2 = ""; else $senha2 = $_POST['senha2']; 

                if (($email<>"") and ( (($senha<>"") and ($senha2<>"")) and ($senha == $senha2)) ) {
                    
                    $cadastrar = $this->CadastroModel->cadastrar($_POST, $_FILES); 

                    if (isset($cadastrar['error'])) {
                        alertretorno("$.alert({ title: 'Atenção', icon: 'fa fa-warning', type: 'red', content: '".$cadastrar['error']."', buttons: { Ok: { text: 'Ok', btnClass: 'btn btn-secondary btn-form' } } });");

                    }else{
                        alertretorno("$.alert({title: 'Cadastro efetuado com sucesso.',icon: 'fa fa-rocket',type: 'green', content: 'Seu cadastro será liberado e logado automaticamente.',buttons: {Ok: {text: 'Ok',btnClass: 'btn btn-secondary btn-form'}}});", 2);
                        // $LoginModel = new LoginModel();
                        // $LoginModel->checarLogin($email, $senha, 2);
                        // $EmailModel = new EmailModel();
                        // $EmailModel->bemvindo($email);
                        $mail = new PHPMailer(true);
                        $mail->CharSet = 'UTF-8'; // Definir a codificação para UTF-8

                        $mail->isSMTP();
                        $mail->Host       = 'smtp-relay.brevo.com'; // Servidor SMTP do Brevo
                        $mail->SMTPAuth   = true;
                        $mail->Username   = '84eff4001@smtp-brevo.com'; // Usuário de autenticação fornecido pelo Brevo
                        $mail->Password   = 'IGLSnw3tvd8kyO41';    // Senha ou API Key fornecida pelo Brevo
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Segurança TLS
                        $mail->Port       = 587; // Porta do servidor SMTP

                        // $mail->SMTPDebug = 2;
                        // $mail->Debugoutput = 'html';


                        // Configurações do e-mail
                        $mail->setFrom('ibranutrodilemaseticos@gmail.com', 'Entric');
                        $mail->addAddress($email, 'TESTE');

                        $mensagem = '<p>Olá TESTE,</p>
                                    <br>
                                    <br>
                                    <p>Seja bem-vindo ao <strong>Entric</strong></p>
                                    <br>
                                    <br>
                                    <p>A partir de agora, você tem acesso a mais completa solução para prescrever e orientar pacientes em Terapia Nutricional. </p>
                                    <br>
                                    <p>Aqui, você encontra todas as dietas e suplementos para consultar as informações nutricionais ou realizar prescrições de forma intuitiva e simples. Conta ainda com diversas ferramentas práticas de apoio, além de vídeos para orientar o paciente, que podem ser assistidos novamente a qualquer hora e em qualquer lugar.</p>
                                    <br>
                                    <br>
                                    <br>
                                    <p>Acesse o sistema agora mesmo: <a href="https://entric.com.br">https://entric.com.br</a>.</p>
                                    <br>
                                    <br>
                                    <p>Atenciosamente,</p>
                                    <p>Equipe Entric</p>
                                    <br>
                                    <br>
                                    <div style="display:flex;justify-content:space-between;padding:20px;padding-left: 70px;padding-right: 70px;background-color:#0092c51f;">
                                        <div>
                                            <img src="https://entric.com.br/relatorio_simplificada/imagem/logo.png" height="45px">
                                        </div>
                                        <div style="display:block;margin-top:13px;">
                                            <a href="mailto:contato@entric.com.br">contato@entric.com.br</a>
                                            <p style="color:#0092c5;">site.entric.com.br</p>
                                        </div>
                                    </div>';

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = 'Um novo cadastro de guia!';
                        $mail->Body    = $mensagem;
                        $mail->Encoding = 'base64';

                        // Enviar o e-mail
                        $mail->send();
                        // Redirect(BASE_PATH . '/prescritor_relatorioalta');                            
                    }

                }else{
                    alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                }    
            }
        }
    }

    function paciente($codigo = null) {
        global $bruker;

        if (isset($_POST['_ac'])){
  
            if ($_POST['_ac'] == "cadastrar_paciente"){
                if (isset($_POST['nome']) == FALSE ) $nome = ""; else $nome = $_POST['nome'];
                if (isset($_POST['cpf']) == FALSE ) $cpf = ""; else $cpf = $_POST['cpf'];
                if (isset($_POST['email']) == FALSE ) $email = ""; else $email = $_POST['email'];
                if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha'];
                if (isset($_POST['senha2']) == FALSE ) $senha2 = ""; else $senha2 = $_POST['senha2'];

                if (($nome<>"") and ($cpf<>"") and ($email<>"") and ( (($senha<>"") and ($senha2<>"")) and ($senha == $senha2)) ) {
                
                    $cadastrar = $this->CadastroModel->cadastrarPaciente($_POST);

                    $cadastro = $this->CadastroModel->chkCodigo($codigo);
                    $this->set('dados', $cadastro);

                    if (isset($cadastrar['error'])) {
                        alertretorno("$.alert({
                                title: 'Atenção',
                                icon: 'fa fa-warning',
                                type: 'red',
                                content: '".$cadastrar['error']."',
                                buttons: {
                                    Ok: {
                                        text: 'Ok',
                                        btnClass: 'btn btn-secondary btn-form'
                                    }
                                }
                            });");

                    }else{
                        alertretorno("$.alert({
                                title: 'Cadastro efetuado com sucesso.',
                                icon: 'fa fa-rocket',
                                type: 'green',
                                content: 'Você receberá um e-mail sobre a liberação de seu acesso em até 24 horas.',
                                buttons: {
                                    Ok: {
                                        text: 'Ok',
                                        btnClass: 'btn btn-secondary btn-form'
                                    }
                                }
                            });", 2);

                        Redirect(BASE_PATH."/login/paciente");
        
                    }

                }else{
                    $cadastro = $this->CadastroModel->chkCodigo($codigo);
                    $this->set('dados', $cadastro);

                    alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                }    
            }
        }
        else{

            if (!$codigo){
                Redirect(BASE_PATH);
            }
            else{
                $cadastro = $this->CadastroModel->chkCodigo($codigo);
                if (!$cadastro){
                    Redirect(BASE_PATH);
                }else{
                    if ($cadastro['status'] == 0){
                        alertretorno("toastr['error']('Paciente já possui cadastro.', '', {positionClass: 'toast-top-right' });", 2);
                        Redirect(BASE_PATH . '/login/paciente');
                    }
                    else{
                        $this->set('dados', $cadastro);
                    }
                }       
            }
            
        }
        
        $this->set('codigo', $codigo);
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}