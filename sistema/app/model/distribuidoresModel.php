<?php
 
class DistribuidoresModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("distribuidores_getDados", array("token" => $_SESSION['token'],
                                                                "id_paciente" => $bruker->usuario['id_usuario']));
        return $retorno;
    }

    function getDado($id) {
        global $bruker;
        $retorno = httpPostAuth("distribuidores_getDado", array("token" => $_SESSION['token'],
                                                                "id" => $id));
        return $retorno;
    }

    function cadastrar($dados) {
        global $bruker; 
        $retorno = httpPostAuth("distribuidores_cadastrar", array("token" => $_SESSION['token'],
                                                                "dados" => $dados));
        return $retorno;
    }

    function editar($dados) {
        global $bruker;
        $retorno = httpPostAuth("distribuidores_editar", array("token" => $_SESSION['token'],
                                                                "dados" => $dados));
        return $retorno;
    }
}