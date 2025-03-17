<?php
class UtilModel extends Model {

    public function stlog() {
        global $bruker;
        
        if($_SESSION['login'] == 'entric'){
            $qdata = array(':id_usuario'=> $bruker->usuario['id'], 
            ':login'=> $bruker->usuario['email'], 
            ':funcao'=> $_SERVER['QUERY_STRING'], 
            ':ipaddress'=> get_ip_address(), 
            ':dados'=> json_encode($_POST).'|||'.json_encode($_POST), 
            ':data_criacao'=> date('Y-m-d H:i:s'));
        }else{
            $qdata = array(':id_usuario'=> $bruker->usuario['id_usuario'], 
            ':login'=> $bruker->usuario['ds_usuario'], 
            ':funcao'=> $_SERVER['QUERY_STRING'], 
            ':ipaddress'=> get_ip_address(), 
            ':dados'=> json_encode($_POST).'|||'.json_encode($_POST), 
            ':data_criacao'=> date('Y-m-d H:i:s'));
        }

        $retorno = httpPostAuth("util_stlog", array("token" => $_SESSION['token'],
                                                    "login" => $_SESSION['login'],
                                                    "qdata" => $qdata ));       
    }
}