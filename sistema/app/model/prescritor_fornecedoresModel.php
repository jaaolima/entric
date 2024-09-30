<?php
 
class Prescritor_fornecedoresModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("prescritor_fornecedores_getDados", array(  "token" => $_SESSION['token'],
                                                                            "id_paciente" => $bruker->usuario['id']));
        return $retorno;
    }
}