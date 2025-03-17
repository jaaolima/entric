<?php
 
class HomeModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("home_getDados", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                        "tipo" => $bruker->type,
                                                        "id_usuario" => $bruker->usuario['id_usuario']));
        return $retorno;
    }
    
}