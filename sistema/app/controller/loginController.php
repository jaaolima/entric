<?php
 
class LoginController extends Controller {

    function beforeAction () {
    }  
    
    function index($idretorno = null) { 
        //echo endecrypt("encrypt", 374);
        if (verifyFormToken("loginForm")){
            if (isset($_POST['_ac'])){ 

                if ($_POST['_ac'] == "login"){
                    if (isset($_POST['email']) == FALSE ) $email = ""; else $email = $_POST['email'];
                    if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha']; 

                    if (($email<>"") and ($senha<>"")){
                        
                        $logar = $this->LoginModel->checarLogin($email, $senha);

                        if (!$logar){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            if ($logar == "email"){
                                alertretorno("toastr['error']('Esta conta ainda não está ativa.', '', {positionClass: 'toast-top-right' });");

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
                        $logar = $this->LoginModel->checarLogin($login, $senha, 3);
                        if (!$logar){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            if ($logar == "email"){
                                alertretorno("toastr['error']('Esta conta ainda não está ativa.', '', {positionClass: 'toast-top-right' });");

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
         if (verifyFormToken("loginPaciente")){
            if (isset($_POST['_ac'])){

                if ($_POST['_ac'] == "login"){
                    if (isset($_POST['login']) == FALSE ) $login = ""; else $login = $_POST['login'];
                    if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha'];

                    if (($login<>"") and ($senha<>"")){
                        $logar = $this->LoginModel->checarLogin($login, $senha, 1);

                        if (!$logar){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            if ($logar == "email"){
                                alertretorno("toastr['error']('Esta conta ainda não está ativa.', '', {positionClass: 'toast-top-right' });");

                            }else{
                                alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");
                            }
                        }

                    }else{
                        alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                    }             
                }
                else if ($_POST['_ac'] == "nova_prescritor"){
                    $senha = new SenhaModel();
                    $checar_codigo = $senha->checarCodigoSenhaPaciente($_POST['_cd']);
                    if ($checar_codigo){

                        if ($_POST["nova_senha"] == $_POST["confirmar_nova_senha"]){
                            $atualizar = $this->LoginModel->atualizarSenhaPaciente($_POST);
                            if (!$atualizar){
                                alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                            }else{
                                alertretorno("toastr['success']('Senha atualizada com sucesso.', '', {positionClass: 'toast-top-right' });");
                            }

                        }
                        else{
                            alertretorno("toastr['error']('Confirmação de senha inválida.', '', {positionClass: 'toast-top-right' });");
                        }

                    }
                    else{
                        Redirect(BASE_PATH . '/login');    
                    }
                }
            }
        }
    }
    
    function prescritor() {
        if (isset($_POST['_ac'])){

            if ($_POST['_ac'] == "login"){
                if (isset($_POST['login']) == FALSE ) $login = ""; else $login = $_POST['login'];
                if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha'];

                if (($login<>"") and ($senha<>"")){                    
                    $logar = $this->LoginModel->checarLogin($login, $senha, 2); 

                    if (!$logar){
                        alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                    }else{
                        if ($logar == "email"){
                            alertretorno("toastr['error']('Esta conta ainda não está ativa.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");
                        }
                    }

                }else{
                    alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                }             
            }
            else if ($_POST['_ac'] == "nova_prescritor"){
                $senha = new SenhaModel();
                $checar_codigo = $senha->checarCodigoSenhaPrescritor($_POST['_cd']);
                if ($checar_codigo){
                    if ($_POST["nova_senha"] == $_POST["confirmar_nova_senha"]){
                        $atualizar = $this->LoginModel->atualizarSenhaPrescritor($_POST); 

                        if (!$atualizar){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            alertretorno("toastr['success']('Senha atualizada com sucesso.', '', {positionClass: 'toast-top-right' });");
                        }

                    }
                    else{
                        alertretorno("toastr['error']('Confirmação de senha inválida.', '', {positionClass: 'toast-top-right' });");
                    }

                }
                else{
                    Redirect(BASE_PATH . '/login');    
                }
            }
        }
    }
    
    function patrocinador() {
        if (verifyFormToken("loginPatrocinador")){
            if (isset($_POST['_ac'])){

                if ($_POST['_ac'] == "login"){
                    if (isset($_POST['login']) == FALSE ) $login = ""; else $login = $_POST['login'];
                    if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha'];

                    if (($login<>"") and ($senha<>"")){
                        $logar = $this->LoginModel->checarLogin($login, $senha, 4);

                        if (!$logar){
                            alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

                        }else{
                            if ($logar == "email"){
                                alertretorno("toastr['error']('Esta conta ainda não está ativa.', '', {positionClass: 'toast-top-right' });");

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

    function afterAction() {

    }

    function loginDireto($session = null, $id_usuario = null, $tipo = null, $id_paciente = null, $buscar = null, $sistema = 'EN'){
        if(isset($session) && isset($id_usuario)){
            $logar = $this->LoginModel->checarLoginIbranutro($id_usuario, $tipo, $id_paciente, $buscar, $sistema);
            if (!$logar){
                alertretorno("toastr['error']('Dados de acesso inválidos.', '', {positionClass: 'toast-top-right' });");

            }
        }    
    }


 
}