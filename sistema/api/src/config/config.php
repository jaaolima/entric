<?php
if ($_SERVER['SERVER_NAME'] <> "localhost"){
	define('DB_HOST', 'localhost');
	define('DB_USER', 'private');
	define('DB_PASSWORD', '6Vn&c;!_WxO)'); 
	define('DB_NAME', 'sistema');
	define('SECRET', 'M4N4U54M');

	define('BASE_PATH','https://entric.com.br/sistema');
	define('BASE_URI','/home/entriccom/public_html/sistema/public/arquivos');
	define('BASE_SISTEMA_URI','https://entric.com.br/arquivos');
	
}else{ 
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '123456');
	define('DB_NAME', 'entric');
	define('SECRET', 'M4N4U54M');

	define('BASE_PATH','http://localhost/entric.com.br/sistema');
	define('BASE_URI','/home/entriccom/public_html/sistema/public/arquivos');
	define('BASE_SISTEMA_URI','http://localhost/entric.com.br/sistema/arquivos');
}


?>
