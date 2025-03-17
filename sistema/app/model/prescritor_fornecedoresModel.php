<?php
 
class Prescritor_fornecedoresModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("prescritor_fornecedores_getDados", array(  "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                            "id_paciente" => $bruker->usuario['id_usuario']));
        return $retorno;
    }
}