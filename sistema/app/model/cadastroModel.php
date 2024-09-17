<?php

class CadastroModel extends Model {

    function cadastrar($dados, $files = null) {
        global $bruker;
        $retorno = httpPostAuth("cadastro_cadastrar", array("token" => $bruker->token,
                                                            "dados" => $dados));
        return $retorno;
    }

    function cadastrarPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("cadastro_cadastrarPaciente", array("token" => $bruker->token,
                                                                    "dados" => $dados));
        return $retorno;
    }

    function chkCodigo($codigo) {
        global $bruker;
        $retorno = httpPostAuth("cadastro_chkCodigo", array("token" => $bruker->token,
                                                            "codigo" => $codigo));
        return $retorno;
    }
}
