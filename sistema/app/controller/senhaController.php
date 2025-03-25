<?php
 
class SenhaController extends Controller {

    function beforeAction () {

    }  
    
    function index($idretorno = null) {
        if (verifyFormToken("loginForm")){ 
            if (isset($_POST['_ac'])){

                if ($_POST['_ac'] == "login"){
                    if (isset($_POST['email']) == FALSE ) $email = ""; else $email = $_POST['email'];
                    if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha'];

                    if (($email<>"") and ($senha<>"")){
                        
                        $logar = $this->SenhaModel->checarLogin($email, $senha);

                        if (!$logar){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            if ($logar == "email"){
                                alertretorno("toastr['error']('Está conta ainda não está ativa.', '', {positionClass: 'toast-top-right' });");

                            }else{
                                alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");
                            }
                        }

                    }else{
                        alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                    }             
                }
            }

        }
    }
    
    function administrador() {
        if (verifyFormToken("loginAdministrador")){
            if (isset($_POST['_ac'])){

                if ($_POST['_ac'] == "login"){
                    if (isset($_POST['login']) == FALSE ) $login = ""; else $login = $_POST['login'];
                    if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha'];

                    if (($login<>"") and ($senha<>"")){
                        $logar = $this->SenhaModel->checarLogin($login, $senha, 3);

                        if (!$logar){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            if ($logar == "email"){
                                alertretorno("toastr['error']('Está conta ainda não está ativa.', '', {positionClass: 'toast-top-right' });");

                            }else{
                                alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");
                            }
                        }

                    }else{
                        alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                    }             
                }
            }
        }
    }
    
    function paciente() {
        //if (verifyFormToken("loginPaciente")){
            if (isset($_POST['_ac'])){

                if ($_POST['_ac'] == "login"){
                    if (isset($_POST['codigo']) == FALSE ) $codigo = ""; else $codigo = $_POST['codigo'];

                    if ($codigo<>""){
                        $logar = $this->SenhaModel->checarLogin(null, $codigo, 1);

                        if (!$logar){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            if ($logar == "email"){
                                alertretorno("toastr['error']('Está conta ainda não está ativa.', '', {positionClass: 'toast-top-right' });");

                            }else{
                                alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");
                            }
                        }

                    }else{
                        alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                    }             
                }
                else if ($_POST['_ac'] == "senha"){
                    if (isset($_POST['email_cpf']) == FALSE ) $email_cpf = ""; else $email_cpf = $_POST['email_cpf'];

                    if ($email_cpf<>""){
                        $senha = $this->SenhaModel->checarPacienteSenha($email_cpf);

                        if (!$senha){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            alertretorno("toastr['success']('Você receberá em breve um e-mail com link para recuperação de senha.', '', {positionClass: 'toast-top-right' });");
                        }

                    }else{
                        alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                    }             
                }
            }
        //}
    }
    
    function prescritor() {
        if (verifyFormToken("senhaPrescritor")){
            if (isset($_POST['_ac'])){

                if ($_POST['_ac'] == "senha"){
                    if (isset($_POST['email_cpf']) == FALSE ) $email_cpf = ""; else $email_cpf = $_POST['email_cpf'];

                    if ($email_cpf<>""){
                        $senha = $this->SenhaModel->checarPrescritorSenha($email_cpf);

                        if (!$senha){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            alertretorno("toastr['success']('Você receberá em breve um e-mail com link para recuperação de senha.', '', {positionClass: 'toast-top-right' });");
                        }

                    }else{
                        alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                    }             
                }
            }
        }
    }
    
    function nova_paciente($codigo = null) {
        global $bruker;

        if ($codigo){
            
            $checar_codigo = $this->SenhaModel->checarCodigoSenhaPaciente($codigo);
            if ($checar_codigo){

                $this->set('codigo', $codigo );
                $this->set('bruker', $bruker);

            }
            else{
                Redirect(BASE_PATH . '/login');    
            }

        }
        else{
            Redirect(BASE_PATH . '/login');
        }
    }
    


    function afterAction() {

    }

    function nova_prescritor($codigo = null) {

        if ($codigo){
            $checar_codigo = $this->SenhaModel->checarCodigoSenhaPrescritor($codigo);
            if ($checar_codigo){
                $this->set('codigo', $codigo );
                // $this->set('bruker', $bruker);

            }
            else{
                Redirect(BASE_PATH . '/login');    
            }

        }
        else{
            Redirect(BASE_PATH . '/login');
        }
    }
 
}