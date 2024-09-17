<?php
 
class Prescritor_ferramentasModel extends Model {

    function getRelatorio() {
        global $bruker;
        $retorno = httpPostAuth("prescritor_ferramentas_getRelatorio", array(  "token" => $bruker->token,
                                                                                "id_paciente" => $bruker->usuario['id']));
        return $retorno;
    }
    
}