<?php
 
class DistribuidoresModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("distribuidores_getDados", array("token" => $bruker->token,
                                                                "id_paciente" => $bruker->usuario['id']));
        return $retorno;
    }

    function getDado($id) {
        global $bruker;
        $retorno = httpPostAuth("distribuidores_getDado", array("token" => $bruker->token,
                                                                "id" => $id));
        return $retorno;
    }

    function cadastrar($dados) {
        global $bruker;
        $retorno = httpPostAuth("distribuidores_cadastrar", array("token" => $bruker->token,
                                                                "dados" => $dados));
        return $retorno;
    }

    function editar($dados) {
        global $bruker;
        $retorno = httpPostAuth("distribuidores_editar", array("token" => $bruker->token,
                                                                "dados" => $dados));
        return $retorno;
    }
}