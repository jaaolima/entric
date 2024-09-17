<?php
 
class ConfigModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("config_getDados", array(  "token" => $bruker->token));
        return $retorno;
    }

    function SalvarOrientacoes($dados) {
        global $bruker;
        $retorno = httpPostAuth("config_SalvarOrientacoes", array(  "token" => $bruker->token,
                                                                    "dados" => $dados));
        return $retorno;
    }
    
}