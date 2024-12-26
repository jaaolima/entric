<?php
 
class Paciente_contatoModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("paciente_contato_getDados", array( "token" => $_SESSION['token'],
                                                            "id_usuario" => $bruker->usuario['id_usuario']));
        return $retorno;
    }
}