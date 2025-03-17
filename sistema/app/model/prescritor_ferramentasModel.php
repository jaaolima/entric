<?php
 
class Prescritor_ferramentasModel extends Model {

    function getRelatorio() {
        global $bruker;
        $retorno = httpPostAuth("prescritor_ferramentas_getRelatorio", array(  "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                                "id_paciente" => $bruker->usuario['id_usuario']));
        return $retorno;
    }
    
}