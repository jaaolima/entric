<?php
 
class Prescritor_consultarprodutoModel extends Model {

    function getRelatorio() {
        global $bruker;
        $retorno = httpPostAuth("prescritor_consultarproduto_getRelatorio", array(  "token" => $_SESSION['token'],
                                                                                    "id_paciente" => $bruker->usuario['id']));
        return $retorno;
    }

    function getFornecedores() {
        global $bruker;
        $retorno = httpPostAuth("prescritor_consultarproduto_getFornecedores", array(  "token" => $_SESSION['token']));
        return $retorno;
    }

    function getUnidades() {
        global $bruker;
        $retorno = httpPostAuth("prescritor_consultarproduto_getUnidades", array(  "token" => $_SESSION['token']));
        return $retorno;
    } 
}