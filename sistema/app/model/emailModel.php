<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '/var/www/html/sistema/api/vendor/swiftmailer/swiftmailer/lib/classes/Swift.php';
require_once '/var/www/html/sistema/api/vendor/swiftmailer/swiftmailer/lib/classes/Swift/SmtpTransport.php';
require_once '/var/www/html/sistema/api/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mailer.php';
require_once '/var/www/html/sistema/api/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Message.php';
require_once '/var/www/html/sistema/api/vendor/swiftmailer/swiftmailer/lib/classes/Swift/SwiftException.php';

class EmailModel extends Model {

    function bemvindo($email, $nome) {
        try {
            var_dump($email);
            global $bruker;
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp-relay.brevo.com', 587))
            ->setUsername('812da6002@smtp-brevo.com')
            ->setPassword('QZKMzTv0s5Dc2kC7')
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            $nomes = explode(" ", $nome);
            $nome = implode(" ", array_slice($nomes, 0, 2));

            // Create a message
            $message = (new Swift_Message('Seja bem-vindo ao Entric!'))
            ->setFrom(['ibranutrodilemaseticos@gmail.com' => 'Ibranutro'])
            ->setTo($email)
            ->setBody('
            <p>Olá '.$nome.',</p>
            <p>Seja bem-vindo ao <strong>Entric</strong></p>
            <br>
            <p>A partir de agora, você tem acesso a mais completa solução para prescrever e orientar pacientes em Terapia Nutricional. </p>
            <p>Aqui, você encontra todas as dietas e suplementos para consultar as informações nutricionais ou realizar prescrições de forma intuitiva e simples. Conta ainda com diversas ferramentas práticas de apoio, além de vídeos para orientar o paciente, que podem ser assistidos novamente a qualquer hora e em qualquer lugar.</p>
            <br>
            <p>Acesse o sistema agora mesmo: <a href=""https://entric.com.br/">Entric.com.br</a>.</p>
            <p>Atenciosamente,</p>
            <p>Equipe Entric</p>
            <div style="display:flex;justify-content:space-between;padding:20px;padding-left: 70px;padding-right: 70px;background-color:#0092c51f;">
                <div>
                    <img src="https://entric.com.br/relatorio_simplificada2/imagem/logo.png" height="45px">
                </div>
                <div style="display:block;margin-top:13px;">
                    <a href="mailto:contato@entric.com.br">contato@entric.com.br</a>
                    <p style="color:#0092c5;">site.entric.com.br</p>
                </div>
            </div>');

            $result = $mailer->send($message);

            var_dump($result);
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
        
    }
}
