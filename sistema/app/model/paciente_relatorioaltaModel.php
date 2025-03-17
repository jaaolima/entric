<?php
 
class Paciente_relatorioaltaModel extends Model {

    function getRelatorio() {
        global $bruker;
        $retorno = httpPostAuth("paciente_relatorioalta_getRelatorio", array(   "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                                "id_paciente" => $bruker->usuario['id_usuario']));
        return $retorno;
    }
    
}