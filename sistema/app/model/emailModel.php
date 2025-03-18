<?php

class EmailModel extends Model {

    function bemvindo($email) {
        global $bruker;
        // var_dump("chegou");
        $retorno = httpPostAuth("enviar_email_bemvindo", array("token" => null, "email" => $email));
        return $retorno;
    }
}
