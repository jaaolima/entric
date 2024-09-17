<?php
 
class ConsultarprodutoModel extends Model {

    function getRelatorio() {
        global $bruker;
        $retorno = httpPostAuth("consultarproduto_getRelatorio", array("token" => $bruker->token,
                                                                        "id_paciente" => $bruker->usuario['id']));
        return $retorno;
    }

    function getFornecedores() {
        global $bruker;
        $retorno = httpPostAuth("consultarproduto_getFornecedores", array("token" => $bruker->token));
        return $retorno;
    }

    function getUnidades() {
        global $bruker;
        $retorno = httpPostAuth("consultarproduto_getUnidades", array("token" => $bruker->token));
        return $retorno;
    }    
}