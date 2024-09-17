<?php
 
class HomeModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("home_getDados", array( "token" => $bruker->token,
                                                        "tipo" => $bruker->type,
                                                        "id_usuario" => $bruker->usuario['id']));
        return $retorno;
    }
    
}