<?php
 
class ConsultarprodutoModel extends Model {

    function getRelatorio() {
        global $bruker;
        $retorno = httpPostAuth("consultarproduto_getRelatorio", array("token" => $_SESSION['token'],
                                                                        "id_paciente" => $bruker->usuario['id_usuario']));
        return $retorno;
    }

    function getFornecedores() {
        global $bruker;
        $retorno = httpPostAuth("consultarproduto_getFornecedores", array("token" => $_SESSION['token']));
        return $retorno;
    }

    function getUnidades() {
        global $bruker;
        $retorno = httpPostAuth("consultarproduto_getUnidades", array("token" => $_SESSION['token']));
        return $retorno;
    }    
}