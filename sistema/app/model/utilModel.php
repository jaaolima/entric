<?php
class UtilModel extends Model {

    public function stlog() {
        global $bruker;
        
        $qdata = array(':id_usuario'=> $bruker->usuario['id'], 
                        ':login'=> $bruker->usuario['email'], 
                        ':funcao'=> $_SERVER['QUERY_STRING'], 
                        ':ipaddress'=> get_ip_address(), 
                        ':dados'=> json_encode($_POST).'|||'.json_encode($_POST), 
                        ':data_criacao'=> date('Y-m-d H:i:s'));

        $retorno = httpPostAuth("util_stlog", array("token" => $_SESSION['token'],
                                                    "qdata" => $qdata ));       
    }
}