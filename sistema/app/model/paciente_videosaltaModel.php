<?php
 
class Paciente_videosaltaModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("paciente_videosalta_getDados", array(   "token" => $_SESSION['token']));
        return $retorno;
    }
    
}