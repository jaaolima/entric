<?php
 
class ConsultarprodutoModel extends Model {

    function getRelatorio() {
        global $bruker;
        $retorno = httpPostAuth("consultarproduto_getRelatorio", array("token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                        "id_paciente" => $bruker->usuario['id_usuario']));
        return $retorno;
    }

    function getFornecedores() {
        global $bruker;
        $retorno = httpPostAuth("consultarproduto_getFornecedores", array("token" => $_SESSION['token'],
                                                                    "login" => $_SESSION['login']));
        return $retorno;
    }

    function getUnidades() {
        global $bruker;
        $retorno = httpPostAuth("consultarproduto_getUnidades", array("token" => $_SESSION['token'],
                                                                    "login" => $_SESSION['login']));
        return $retorno;
    }    
}