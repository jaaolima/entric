<?php
define('DEVELOPMENT_ENVIRONMENT', true);
define('DB_DEBUG', true);
define('VERSION','0.1.0');
define('TITLE','Entric');
define('VERFOOTER','&copy; 2021 Programa de Alta Hospitalar de Pacientes em Dieta Enteral - Entric. Todos os direitos reservados.');

if ($_SERVER['SERVER_NAME'] <> "localhost"){
	define('DB_HOST', '172.31.94.14');
	define('DB_USER', 'private');
	define('DB_PASSWORD', '6Vn&c;!_WxO)');
	define('DB_NAME', 'sistema');

	define('BASE_PATH','https://sistema.entric.com.br');
	define('BASE_URI','/var/www/html/public/arquivos');
	define('BASE_SISTEMA_URI','https://sistema.entric.com.br/arquivos');

}else{
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '123456');
	define('DB_NAME', 'entric');

	define('BASE_PATH','http://localhost/entric.com.br/sistema');
	define('BASE_URI','C:\Users\root\Dropbox\entric.com.br\sistema\public\arquivos');
	define('BASE_SISTEMA_URI','http://localhost/entric.com.br/sistema/arquivos');
}

$bruker = new class{};