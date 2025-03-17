<?php

class VModel extends Model {

    public function gtProdutos() {
        global $bruker;
        $retorno = httpPostAuth("v_gtProdutos", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login']));
        return $retorno;
    }

    function getDistribuidores($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("v_getDistribuidores", array(   "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                "dados" => $dados ));
        return $retorno; 
    }

    function gt_endereco_distribuidor($id) {
        global $bruker;
        $retorno = httpPostAuth("v_gt_endereco_distribuidor", array("token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                    "id" => $id ));
        return $retorno; 
    }
}
