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
            @header("Location: ".BASE_PATH."");
            exit();
        }
        if (isset($bruker->menu)){
            if (!in_array($controller, $bruker->menu)){
                @header("Location: ".BASE_PATH);
            }
        }
        $dispatch = new $controllerName($controller,$action);
        if ((int)method_exists($controllerName, $action)) {
            call_user_func_array(array($dispatch,"beforeAction"),$queryString);
            call_user_func_array(array($dispatch,$action),$queryString);
            call_user_func_array(array($dispatch,"afterAction"),$queryString);
        } else {
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

$cache = new Cache();
$registry = new Registry();

setReporting();
removeMagicQuotes();
//unregisterGlobals();
if ((!startsWith($url,"login")) and (!startsWith($url,"logout")) and (!startsWith($url,"cadastro")) and (!startsWith($url,"senha"))){
    checkLogin();
}

callHook();