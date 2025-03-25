<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

class LoginModel extends Model { 
    public function checarLogin($login=null, $senha=null, $tipo=1) {
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
            $_SESSION['redirect'] = null;
            $_SESSION['login'] = $dados['data']['session']['login'];
            $_SESSION['paciente_redirect'] = ['sistema' => null,'id_paciente' => null, 'buscar' => null];

            if (isset($dados["data"]["paciente_videosalta"])){
                Redirect(BASE_PATH . '/paciente_videosalta'); 
                return true;

            }else{
                Redirect(BASE_PATH . '');
            }
        }
    }

    public function checarLoginIbranutro($id_usuario=null, $tipo = null, $id_paciente = null, $buscar = null, $sistema = null) {
        $dados = httpPost("login_ibranutro", array(   "id_usuario" => $id_usuario));

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
            $_SESSION['redirect'] = $tipo;
            $_SESSION['login'] = 'ibranutro';

            if($sistema == 'ibranutro'){
                if($tipo != null){
                    if($buscar == 'buscar'){
                        if($tipo == 'suplemento'){
                            $paciente = httpPostAuth("paciente_getDadoSuplemento", array( "token" => $_SESSION['token'],
                            "id_admissao" => $id_paciente,
                            "login" => $_SESSION['login'],
                            "sistema" => $sistema));
                            $_SESSION['paciente_redirect'] = ['sistema' => $sistema,'id_admissao' => $id_paciente, 'buscar' => $buscar, 'ds_nome' => $paciente['nome']];
                        }
                        if($tipo == 'simplificada'){
                            $paciente = httpPostAuth("paciente_getDadoSimplificada", array( "token" => $_SESSION['token'],
                            "id_admissao" => $id_paciente,
                            "login" => $_SESSION['login'],
                            "sistema" => $sistema));
                            $_SESSION['paciente_redirect'] = ['sistema' => $sistema,'id_admissao' => $id_paciente, 'buscar' => $buscar, 'ds_nome' => $paciente['nome']];
                        }
                        
                    }else{
                        if($id_paciente != null){
                            $buscar = 'cadastrar';
                            $paciente = httpPostAuth("paciente_getDadoIbranutro", array( "token" => $_SESSION['token'],
                                                                                "login" => $_SESSION['login'],
                                                                                "id_admissao" => $id_paciente,
                                                                                "sistema" => $sistema));
                            $_SESSION['paciente_redirect'] = ['sistema' => $sistema,'id_admissao' => $id_paciente, 'buscar' => $buscar, 'ds_nome' => $paciente['ds_nome'], 'id_hospital' => $paciente['id_hospital'], 'dt_nascimento' => $paciente['dt_nasc'], 'nu_telefone' => null, 'nu_atendimento' => $paciente['nu_atendimento']];
                        }else{
                            $_SESSION['paciente_redirect'] = ['sistema' => $sistema, 'id_admissao' => null, 'buscar' => null];
                        }
                        
                    }
                }
            }
            if($sistema == 'EN'){
                if($tipo != null){
                    if($buscar == 'buscar'){
                        if($tipo == 'suplemento'){
                            $paciente = httpPostAuth("paciente_getDadoSuplemento", array( "token" => $_SESSION['token'],
                            "login" => $_SESSION['login'],
                            "id_paciente" => $id_paciente,
                            "sistema" => $sistema));
                            if(!$paciente){
                                $buscar = 'cadastrar';
                                $paciente = httpPostAuth("paciente_getDadoIbranutro", array( "token" => $_SESSION['token'],
                                    "login" => $_SESSION['login'],
                                    "id_paciente" => $id_paciente,
                                    "sistema" => $sistema));
                                $_SESSION['paciente_redirect'] = ['sistema' => $sistema,'id_paciente' => $id_paciente, 'buscar' => $buscar, 'ds_nome' => $paciente['ds_nome'], 'id_hospital' => $paciente['id_hospital'], 'dt_nascimento' => $paciente['dt_nascimento'], 'nu_telefone' => $paciente['nu_telefone'], 'nu_atendimento' => $paciente['nu_atendimento']];
                            }else{
                                $_SESSION['paciente_redirect'] = ['sistema' => null,'id_paciente' => $id_paciente, 'buscar' => $buscar, 'ds_nome' => $paciente['nome']];
                            }
                        }
                        if($tipo == 'simplificada'){
                            $paciente = httpPostAuth("paciente_getDadoSimplificada", array( "token" => $_SESSION['token'],
                            "login" => $_SESSION['login'],
                            "id_paciente" => $id_paciente,
                            "sistema" => $sistema));
                            if(!$paciente){
                                $buscar = 'cadastrar';
                                $paciente = httpPostAuth("paciente_getDadoIbranutro", array( "token" => $_SESSION['token'],
                                    "login" => $_SESSION['login'],
                                    "id_paciente" => $id_paciente,
                                    "sistema" => $sistema));
                                $_SESSION['paciente_redirect'] = ['sistema' => $sistema,'id_paciente' => $id_paciente, 'buscar' => $buscar, 'ds_nome' => $paciente['ds_nome'], 'id_hospital' => $paciente['id_hospital'], 'dt_nascimento' => $paciente['dt_nascimento'], 'nu_telefone' => $paciente['nu_telefone'], 'nu_atendimento' => $paciente['nu_atendimento']];
                            }else{
                                $_SESSION['paciente_redirect'] = ['sistema' => null,'id_paciente' => $id_paciente, 'buscar' => $buscar, 'ds_nome' => $paciente['nome']];
                            }
                        }
                        
                    }else{
                        if($id_paciente != null){
                            $buscar = 'cadastrar';
                            $paciente = httpPostAuth("paciente_getDadoIbranutro", array( "token" => $_SESSION['token'],
                                                                                "login" => $_SESSION['login'],
                                                                                "id_paciente" => $id_paciente,
                                                                                "sistema" => $sistema));
                            $_SESSION['paciente_redirect'] = ['sistema' => $sistema,'id_paciente' => $id_paciente, 'buscar' => $buscar, 'ds_nome' => $paciente['ds_nome'], 'id_hospital' => $paciente['id_hospital'], 'dt_nascimento' => $paciente['dt_nascimento'], 'nu_telefone' => $paciente['nu_telefone'], 'nu_atendimento' => $paciente['nu_atendimento']];
                        }else{
                            $_SESSION['paciente_redirect'] = ['sistema' => null,'id_paciente' => null, 'buscar' => null];
                        }
                        
                    }
                }
            }
            

            echo "<head>
                        <style>
                            body {
                                display: flex;
                                justify-content: center;
                                align-items: center;   
                                height: 100vh;        
                                margin: 0;             
                            }
                            .center {
                                text-align: center;
                                line-height: 200px;
                                font-size: 20px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='center'>Estamos te redirecionando!</div>
                    </body>
            </html>";

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
        $retorno = httpPost("atualizar_senha_prescritor", array( "token" => null,
                                                                "dados" => $dados));
        return $retorno;
    }
}
