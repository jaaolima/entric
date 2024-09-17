<?php
function callHook() {
    global $url;
    global $bruker;
    global $default;
    $url = rtrim($url, '/');
    $queryString = array();
    if (!isset($url)) {
        $controller = $default['controller'];
        $action = $default['action'];

    } else {
        $urlArray = array();
        $urlArray = explode("/",$url);
        $controller = $urlArray[0];
        array_shift($urlArray);

        if (!startsWith($url,"v/")){
            if ( ((count($urlArray) == 2) and (!is_numeric($urlArray[1]))) or
                 ((count($urlArray) == 3) and (!is_numeric($urlArray[1])))
            ){
                $new_url = $urlArray[0]."_".$urlArray[1];
                array_shift($urlArray);
                $urlArray[0] = $new_url;
            }
        }

        if (isset($urlArray[0])) {
            if (is_numeric($urlArray[0])) $action = 'index';
            else{
                if ($controller=="ref"){
                    $action = 'index'; 
                }else{
                    $action = $urlArray[0];
                    array_shift($urlArray);
                }
            }
        } else {
            $action = 'index';
        }
        $queryString = $urlArray;
    }
    try {
        $controllerName = $controller.'Controller';
        if (!class_exists($controllerName, true)) {
            @header("Location: ".BASE_PATH);
            exit();
        }
        if ((isset($bruker->menu)) and (!startsWith($url,"v/"))) {
            if (!in_array($controller, $bruker->menu)){
                @header("Location: ".BASE_PATH);
                exit();
            }
        }
        
        if ((int)method_exists($controllerName, $action) == 1){            
            $dispatch = new $controllerName($controller,$action);
            if ((int)method_exists($controllerName, $action)) {
                call_user_func_array(array($dispatch,"beforeAction"),$queryString);
                call_user_func_array(array($dispatch,$action),$queryString);
                call_user_func_array(array($dispatch,"afterAction"),$queryString);
            }
        }
        else{
            @header("Location: ".BASE_PATH);
            exit();
        }
    }
    catch (ClassNotFoundException $e) {
        echo "Class not found: ".$e->message();
    }class ClassNotFoundException extends Exception {

    }

}

function __autoload($className) {
    if (file_exists(ROOT . DS . 'app'. DS . 'libs' . DS . strtolower($className) . '.class.php')) {
        require_once(ROOT . DS . 'app'. DS . 'libs' . DS . strtolower($className) . '.class.php');

    } else if (file_exists(ROOT . DS . 'app' . DS . 'controller' . DS . lcfirst($className) . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'controller' . DS . lcfirst($className) . '.php');

    } else if (file_exists(ROOT . DS . 'app' . DS . 'model' . DS . lcfirst($className) . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'model' . DS . lcfirst($className) . '.php');
    }
}

setReporting();
removeMagicQuotes();

if ((!startsWith($url,"login")) and (!startsWith($url,"logout")) and (!startsWith($url,"v/")) and (!startsWith($url,"senha")) and (!startsWith($url,"cadastro/")) and (!startsWith($url,"paciente_videosalta"))  and (!startsWith($url,"paciente_distribuidores"))) {    
    checkLogin();
}
  
if ((isset($_SESSION['admin_session_id']) == TRUE) AND (isset($_SESSION['admin_session_auth']) == TRUE) AND (isset($_SESSION['admin_session_type']) == TRUE)){
    if ($_SESSION['admin_session_type'] == "paciente"){
        if ((!startsWith($url,"login")) and (!startsWith($url,"logout")) and (!startsWith($url,"v/")) and (!startsWith($url,"senha")) and (!startsWith($url,"cadastro/"))) {    
            checkLogin();
        }
    }
}
callHook();