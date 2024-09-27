<?php
define('DEVELOPMENT_ENVIRONMENT', true);
define('DB_DEBUG', true);
define('VERSION','0.1.0');
define('TITLE','Entric');
define('VERFOOTER','&copy; 2021 Programa de Alta Hospitalar de Pacientes em Dieta Enteral - Entric. Todos os direitos reservados.');

if ($_SERVER['SERVER_NAME'] <> "localhost"){
	define('BASE_PATH','https://entric.com.br'); 
	// define('BASE_PATH','http://142.93.0.124');
	define('BASE_URI','/var/www/html/public/arquivos');
	define('BASE_SISTEMA_URI','https://entric.com.br/arquivos');
	// define('BASE_SISTEMA_URI','http://142.93.0.124/arquivos');
	define('BASE_API','/var/www/html/api/v1');

}else{
	define('BASE_PATH','http://localhost/entric.com.br/sistema');
	define('BASE_URI','C:\Users\root\Dropbox\entric.com.br\sistema\public\arquivos');
	define('BASE_SISTEMA_URI','http://localhost/entric.com.br/sistema/arquivos');
	define('BASE_API','http://localhost/entric.com.br/api/v1/');
}

define('SMTP_HOST', 'smtp-pulse.com');
define('SMTP_AUTH', 'nao-responda@entric.com.br');
define('SMTP_PASSWORD', '2PaCFam4CZLXN');
define('SMTP_SECURE', 'tls');
define('SMTP_PORT', '587');
define('SMTP_EMAIL', 'contato@entric.com.br');
define('SMTP_NAME', 'Entric');

$bruker = new class{};