<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

class LoginModel extends Model {
    public function checarLogin($login=null, $senha=null, $tipo=1) {
        try {
            $myconn = new PDO("mysql:host=localhost;dbname=sistema;charset=utf8;port=3306", 'private', '6Vn&c;!_WxO)');
            $myconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão bem-sucedida";
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }

        $dados = httpPost("login", array(   "email" => $login,
                                            "senha" => $senha,
                                            "tipo" => $tipo));

        
        if (isset($dados["status"])){
            Redirect(BASE_PATH . '/logout');
            return true;

        }else{
            $_SESSION['token'] = $dados['data']['session']['token'];
            $_SESSION['admin_session_id'] = $dados['data']['session']['admin_session_id'];
            $_SESSION['admin_session_key'] = $dados['data']['session']['admin_session_key'];
            $_SESSION['admin_session_auth'] = $dados['data']['session']['admin_session_auth'];
            $_SESSION['admin_session_type'] = $dados['data']['session']['admin_session_type'];
            $_SESSION['admin_session_user'] = $dados['data']['session']['admin_session_user'];
            $_SESSION['admin_session_menu'] = $dados['data']['session']['admin_session_menu'];

            if (isset($dados["data"]["paciente_videosalta"])){
                Redirect(BASE_PATH . '/paciente_videosalta');
                return true;

            //}else if (isset($dados["data"]["redirect"])){
            }else{
                // Redirect(BASE_PATH . '');
            }
        }
    }

    function atualizarSenhaPaciente($dados) {
        global $bruker;

        $senha = hashPass($dados['nova_senha']);
        $bind = array(  ':extra' => null,
                        ':senha' => $senha,
                        ':tipo' => 1,                  
                        ':status' => 0);
        $retorno = $this->update("usuarios", "WHERE extra='".$dados['_cd']."' AND tipo=:tipo AND status=:status", $bind);
    
        return true;
    }

    function atualizarSenhaPrescritor($dados) {
        global $bruker;

        $senha = hashPass($dados['nova_senha']);
        $bind = array(  ':extra' => null,
                        ':senha' => $senha,
                        ':tipo' => 2,                  
                        ':status' => 0);
        $retorno = $this->update("usuarios", "WHERE extra='".$dados['_cd']."' AND tipo=:tipo AND status=:status", $bind);
    
        return true;
    }
}
