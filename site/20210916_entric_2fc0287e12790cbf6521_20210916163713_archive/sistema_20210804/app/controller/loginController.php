<?php
 
class LoginController extends Controller {

    function beforeAction () {

    }  
    
    function index($idretorno = null) {
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
                        $logar = $this->LoginModel->checarLogin($login, $senha, 3);

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
        if (verifyFormToken("loginPaciente")){
            if (isset($_POST['_ac'])){

                if ($_POST['_ac'] == "login"){
                    if (isset($_POST['codigo']) == FALSE ) $codigo = ""; else $codigo = $_POST['codigo'];

                    if ($codigo<>""){
                        $logar = $this->LoginModel->checarLogin(null, $codigo, 1);

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
    
    function prescritor() {
        //echo hashPass("prescritor");
        if (verifyFormToken("loginPrescritor")){
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

    function afterAction() {

    }
 
}