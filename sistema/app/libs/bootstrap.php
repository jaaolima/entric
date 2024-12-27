<?php
ini_set('date.timezone', 'America/Sao_Paulo');
date_default_timezone_set('America/Sao_Paulo');

require_once (ROOT . DS . 'app'. DS . 'config' . DS . 'conf6ion.php');
require_once (ROOT . DS . 'app'. DS . 'libs' . DS . 'common.php');
if ((!startsWith($url,"login")) and (!startsWith($url,"logout")) and (!startsWith($url,"v/")) and (!startsWith($url,"senha")) and (!startsWith($url,"cadastro/"))  and (!startsWith($url,"paciente_videosalta"))  and (!startsWith($url,"paciente_distribuidores")) and (!startsWith($url,"login/loginDireto"))) {    
    checkLoginSession();
}

if ((isset($_SESSION['admin_session_id']) == TRUE) AND (isset($_SESSION['admin_session_auth']) == TRUE) AND (isset($_SESSION['admin_session_type']) == TRUE)){
    if ($_SESSION['admin_session_type'] == "paciente"){
        if ((!startsWith($url,"login")) and (!startsWith($url,"logout")) and (!startsWith($url,"v/")) and (!startsWith($url,"senha")) and (!startsWith($url,"cadastro/")) ) {    
            checkLoginSession();
        }
    }
}

require_once (ROOT . DS . 'app'. DS . 'libs' . DS . 'shared.php');
