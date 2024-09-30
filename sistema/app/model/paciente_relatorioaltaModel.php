<?php
 
class Paciente_relatorioaltaModel extends Model {

    function getRelatorio() {
        global $bruker;
        $retorno = httpPostAuth("paciente_relatorioalta_getRelatorio", array(   "token" => $_SESSION['token'],
                                                                                "id_paciente" => $bruker->usuario['id']));
        return $retorno;
    }
    
}