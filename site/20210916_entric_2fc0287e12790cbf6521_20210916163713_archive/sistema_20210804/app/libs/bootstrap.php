<?php
ini_set('date.timezone', 'America/Sao_Paulo');
date_default_timezone_set('America/Sao_Paulo');

require_once (ROOT . DS . 'app'. DS . 'config' . DS . 'conf6ion.php');
require_once (ROOT . DS . 'app'. DS . 'libs' . DS . 'common.php');
if ((!startsWith($url,"login")) and (!startsWith($url,"cadastro")) and (!startsWith($url,"senha"))) {
    checkLoginSession();
}

require_once (ROOT . DS . 'app'. DS . 'libs' . DS . 'shared.php');
