<?php

class CadastroModel extends Model {

    function cadastrar($dados, $files = null) {
        global $bruker;
        // var_dump("chegou");
        $retorno = httpPostAuth("cadastro_cadastrar", array("token" => null, "dados" => $dados));
        return $retorno;
    } 

    function cadastrarPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("cadastro_cadastrarPaciente", array("token" => $_SESSION['token'],
                                                                    "login" => $_SESSION['login'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function chkCodigo($codigo) {
        global $bruker;
        $retorno = httpPostAuth("cadastro_chkCodigo", array("token" => $_SESSION['token'],
                                                            "login" => $_SESSION['login'],
                                                            "codigo" => $codigo));
        return $retorno;
    }
}
