<?php

class LoginModel extends Model {

    public function checarLogin($login=null, $senha=null, $tipo=1) {
        $tipo_login = "";

        // paciente =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        if ($tipo == 1){
            $tipo_login = "paciente";
            $bind = array(':codigo' => chkref($senha), ':tipo' => chknumber($tipo));
            $retorno = $this->select_single_to_array("usuarios", "*", "WHERE codigo=:codigo AND tipo=:tipo", $bind);
            $menu = array(  "home",
                            "paciente_contato", 
                            "paciente_fornecedores", 
                            "paciente_relatorioalta", 
                            "paciente_videosalta");

        // pescritor =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        }else if ($tipo == 2){
            $tipo_login = "prescritor";
            $bind = array(':email' => chkemail($login), ':tipo' => chknumber($tipo));
            $retorno = $this->select_single_to_array("usuarios", "*", "WHERE email=:email AND tipo=:tipo", $bind);

            $menu = array(  "home",
                            "prescritor_consultarproduto", 
                            "prescritor_ferramentas", 
                            "prescritor_fornecedores", 
                            "prescritor_relatorioalta", 
                            "prescritor_videosalta");
        }else if ($tipo == 3){
            $tipo_login = "administrador";
            $bind = array(':email' => chkemail($login), ':tipo' => chknumber($tipo));
            $retorno = $this->select_single_to_array("usuarios", "*", "WHERE email=:email AND tipo=:tipo", $bind);

            $menu = array(  "home",
                            "prescritor_consultarproduto", 
                            "prescritor_ferramentas", 
                            "prescritor_fornecedores", 
                            "prescritor_relatorioalta", 
                            "prescritor_videosalta");
        }


        if ($retorno){
            // pescritor =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            if ($tipo == 2){
                $checkpass = verifyHash(chkpasswd($senha), trim($retorno['senha']));
                if (!$checkpass){
                    $tipo_login = "";
                    return false;
                }
            }


            if ($tipo_login <> ""){

                $this->delete("sessions", "WHERE user_id=:id AND type='".$tipo_login."'", array(':id' => $retorno['id']));

                if ($_SERVER['SERVER_NAME'] <> "localhost"){
                    $res = openssl_pkey_new(array("digest_alg"=>"sha256","private_key_bits"=>512,"private_key_type"=>OPENSSL_KEYTYPE_RSA));
                    @openssl_pkey_export($res,$private);
                    $public = @openssl_pkey_get_details($res); 
                }else{                    
                    $public["key"] = uninumber();
                    $private = $public["key"];
                }

                $public = (isset($public["key"])?$public["key"]:null);
                $nonce = rand(2,99999);
                $uid = uidauth();

                $type2fa = 0;
                $data2fa = rand(111111, 999999);

    			$nopin = true;
    			$awaiting_token = true;
    			
                $qdata = array( ':session_time'=> date('Y-m-d H:i:s'),
                                ':session_start'=> date('Y-m-d H:i:s'),
                                ':session_key'=> $public,
                                ':user_id'=> $retorno['id'],
                                ':uid'=> $uid,
                                ':nonce'=> $nonce,
                                ':type'=> $tipo_login,
                                ':awaiting'=> (($awaiting_token) ? 'Y' : 'N'),
                                ':type2fa'=> $type2fa,
                                ':data2fa'=> $data2fa,
                                ':ip'=> get_ip_address());
                $sessions = $this->insert('sessions', $qdata);

                $qdata = array(':id_usuario'=> $retorno['id'], ':funcao'=> 'login_'.$tipo_login, ':ipaddress'=> get_ip_address(), ':data_criacao'=> date('Y-m-d H:i:s'));
                $logs = $this->insert('log', $qdata);

                $_SESSION['admin_session_id'] = $sessions;
                $_SESSION['admin_session_key'] = $private;
                $_SESSION['admin_session_auth'] = $uid;
                $_SESSION['admin_session_type'] = $tipo_login;
                $_SESSION['admin_session_menu'] = $menu;

    			if ($nopin){
    				Redirect(BASE_PATH . '');

    			}else{
    				Redirect(BASE_PATH . '/logout');
    			}
                return true;

            }else{
                return false;
            }

        }else{
            return false;
        }
    }
}
