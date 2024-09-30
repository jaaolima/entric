<?php
 
class CadastrosModel extends Model {

    function cadastrarAdministrador($dados) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_cadastrarAdministrador", array(  "token" => $_SESSION['token'],
                                                                            "dados" => $dados));
        return $retorno;
    }

    function cadastrarPatrocinador($dados) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_cadastrarPatrocinador", array(  "token" => $_SESSION['token'],
                                                                            "dados" => $dados));
        return $retorno;

    }

    function cadastrarPrescritor($dados, $files) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_cadastrarPrescritor", array(  "token" => $_SESSION['token'],
                                                                            "dados" => $dados,
                                                                            "files" => $files));
        return $retorno;
    }

    function editarAdministrador($dados) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_editarAdministrador", array( "token" => $_SESSION['token'],
                                                                        "dados" => $dados));
        return $retorno;
    }

    function editarPatrocinador($dados) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_editarPatrocinador", array( "token" => $_SESSION['token'],
                                                                        "dados" => $dados));
        return $retorno;
    }

    function editarPrescritor($dados, $files) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_editarPrescritor", array(    "token" => $_SESSION['token'],
                                                                        "dados" => $dados,
                                                                        "files" => $files));
        return $retorno;
    }

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("cadastros_getDados", array(    "token" => $_SESSION['token'],
                                                                "id_paciente" => $bruker->usuario['id']));
        return $retorno;

    }

    function getDado($id) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_getDado", array(    "token" => $_SESSION['token'],
                                                                "id" => $id));
        return $retorno;
    }

    function cadastrar($dados) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_cadastrar", array(   "token" => $_SESSION['token'],
                                                                "dados" => $dados,
                                                                "id_usuario" => $bruker->usuario['id']));
        return $retorno;
    }

    function cadastrarPrescritor2($dados) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_cadastrarPrescritor2", array("token" => $_SESSION['token'],
                                                                        "dados" => $dados,
                                                                        "id_usuario" => $bruker->usuario['id']));
        return $retorno;
    }

    function editar($dados) {
        global $bruker;
        $retorno = httpPostAuth("cadastros_editar", array(  "token" => $_SESSION['token'],
                                                            "dados" => $dados));
        return $retorno;
    }
}