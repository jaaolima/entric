<?php
 
class Paciente_distribuidoresModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("paciente_distribuidores_getDados", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],));
        return $retorno;
    }
}