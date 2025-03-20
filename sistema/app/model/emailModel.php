<?php
class EmailModel extends Model {
    function bemvindo($email, $nome) {
        global $bruker;
        $retorno = httpPostAuth("enviar_email_bemvindo", array("token" => null, "email" => $email, "nome" => $nome));
        return $retorno;
    }
}
