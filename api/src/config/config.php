<?php
if ($_SERVER['SERVER_NAME'] <> "localhost"){
	define('DB_HOST', 'localhost');
	define('DB_USER', 'entriccom_usuario');
	define('DB_PASSWORD', 'J@.o=3vuI4@o');
	define('DB_NAME', 'entriccom_sistema');
	define('SECRET', 'M4N4U54M');

	define('BASE_PATH','https://entric.com.br/sistema');
	define('BASE_URI','/home/entriccom/public_html/sistema/public/arquivos');
	define('BASE_SISTEMA_URI','https://sistema.entric.com.br/arquivos');
	
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
