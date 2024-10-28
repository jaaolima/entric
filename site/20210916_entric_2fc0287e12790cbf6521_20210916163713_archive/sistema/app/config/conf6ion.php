<?php
define('DEVELOPMENT_ENVIRONMENT', true);
define('DB_DEBUG', true);
define('VERSION','0.1.0');
define('TITLE','Entric');
define('VERFOOTER','&copy; 2021 Programa de Alta Hospitalar de Pacientes em Dieta Enteral - Entric. Todos os direitos reservados.');

if ($_SERVER['SERVER_NAME'] <> "localhost"){
	define('DB_HOST', 'localhost');
	define('DB_USER', 'entricstorm_sistemausuario');
	define('DB_PASSWORD', 'B1pO.[;~mI$V');
	define('DB_NAME', 'entricstorm_sistema');

	define('BASE_PATH','https://entric.storm.expert/sistema');
	define('BASE_URI','/home2/entricstorm/public_html/sistema/public/arquivos');
	define('BASE_SISTEMA_URI','https://entric.storm.expert/sistema/arquivos');
	
}else{
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'entric');

	define('BASE_PATH','http://localhost/entric.com.br/sistema');
	define('BASE_URI','C:\Users\root\Dropbox\entric.com.br\sistema\public\arquivos');
	define('BASE_SISTEMA_URI','http://localhost/entric.com.br/sistema/arquivos');
}

$bruker = new class{};