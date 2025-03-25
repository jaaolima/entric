<?php

class SenhaModel extends Model {

    function checarPrescritorSenha($email_cpf = null) {
        global $bruker;
        $retorno = httpPostAuth("senha_checarPrescritorSenha", array(   "token" => null,
                                                                        "email_cpf" => $email_cpf));
        return $retorno;
    } 

    function checarPacienteSenha($email_cpf = null) {
        global $bruker;
        $retorno = httpPostAuth("senha_checarPacienteSenha", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                    "email_cpf" => $email_cpf));
        return $retorno;
    }

    function checarCodigoSenhaPaciente($codigo = null) {
        global $bruker;
        $retorno = httpPostAuth("senha_checarCodigoSenhaPaciente", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                            "codigo" => $codigo));
        return $retorno;
    }

    function checarCodigoSenhaPrescritor($codigo = null) {
        global $bruker;
        $retorno = httpPost("senha_checarCodigoSenhaPrescritor", array( "token" => null,
                                                                            "codigo" => $codigo));
        return $retorno;
    }
}
