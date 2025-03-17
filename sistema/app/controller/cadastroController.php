<?php
 
class CadastroController extends Controller {

    function beforeAction () {

    }  
    
    function index($idretorno = null) {
    }
    
    function prescritor() { 
        if (isset($_POST['_ac'])){
            if ($_POST['_ac'] == "cadastrar_prescritor"){
                if (isset($_POST['email']) == FALSE ) $email = ""; else $email = $_POST['email'];
                if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha'];
                if (isset($_POST['senha2']) == FALSE ) $senha2 = ""; else $senha2 = $_POST['senha2']; 

                if (($email<>"") and ( (($senha<>"") and ($senha2<>"")) and ($senha == $senha2)) ) {
                    
                    $cadastrar = $this->CadastroModel->cadastrar($_POST, $_FILES);
                    var_dump($cadastrar);

                    // if (isset($cadastrar['error'])) {
                    //     alertretorno("$.alert({ title: 'Atenção', icon: 'fa fa-warning', type: 'red', content: '".$cadastrar['error']."', buttons: { Ok: { text: 'Ok', btnClass: 'btn btn-secondary btn-form' } } });");

                    // }else{
                    //     alertretorno("$.alert({title: 'Cadastro efetuado com sucesso.',icon: 'fa fa-rocket',type: 'green', content: 'Seu cadastro será liberado e logado automaticamente.',buttons: {Ok: {text: 'Ok',btnClass: 'btn btn-secondary btn-form'}}});", 2);
                    //     $LoginModel = new LoginModel();
                    //     $LoginModel->checarLogin($email, $senha, 2);
                    //     Redirect(BASE_PATH . '/prescritor_relatorioalta');                            
                    // }

                }else{
                    alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                }    
            }
        }
    }

    function paciente($codigo = null) {
        global $bruker;

        if (isset($_POST['_ac'])){
  
            if ($_POST['_ac'] == "cadastrar_paciente"){
                if (isset($_POST['nome']) == FALSE ) $nome = ""; else $nome = $_POST['nome'];
                if (isset($_POST['cpf']) == FALSE ) $cpf = ""; else $cpf = $_POST['cpf'];
                if (isset($_POST['email']) == FALSE ) $email = ""; else $email = $_POST['email'];
                if (isset($_POST['senha']) == FALSE ) $senha = ""; else $senha = $_POST['senha'];
                if (isset($_POST['senha2']) == FALSE ) $senha2 = ""; else $senha2 = $_POST['senha2'];

                if (($nome<>"") and ($cpf<>"") and ($email<>"") and ( (($senha<>"") and ($senha2<>"")) and ($senha == $senha2)) ) {
                
                    $cadastrar = $this->CadastroModel->cadastrarPaciente($_POST);

                    $cadastro = $this->CadastroModel->chkCodigo($codigo);
                    $this->set('dados', $cadastro);

                    if (isset($cadastrar['error'])) {
                        alertretorno("$.alert({
                                title: 'Atenção',
                                icon: 'fa fa-warning',
                                type: 'red',
                                content: '".$cadastrar['error']."',
                                buttons: {
                                    Ok: {
                                        text: 'Ok',
                                        btnClass: 'btn btn-secondary btn-form'
                                    }
                                }
                            });");

                    }else{
                        alertretorno("$.alert({
                                title: 'Cadastro efetuado com sucesso.',
                                icon: 'fa fa-rocket',
                                type: 'green',
                                content: 'Você receberá um e-mail sobre a liberação de seu acesso em até 24 horas.',
                                buttons: {
                                    Ok: {
                                        text: 'Ok',
                                        btnClass: 'btn btn-secondary btn-form'
                                    }
                                }
                            });", 2);

                        Redirect(BASE_PATH."/login/paciente");
        
                    }

                }else{
                    $cadastro = $this->CadastroModel->chkCodigo($codigo);
                    $this->set('dados', $cadastro);

                    alertretorno("toastr['error']('Preencha os campos corretamente.', '', {positionClass: 'toast-top-right' });");

                }    
            }
        }
        else{

            if (!$codigo){
                Redirect(BASE_PATH);
            }
            else{
                $cadastro = $this->CadastroModel->chkCodigo($codigo);
                if (!$cadastro){
                    Redirect(BASE_PATH);
                }else{
                    if ($cadastro['status'] == 0){
                        alertretorno("toastr['error']('Paciente já possui cadastro.', '', {positionClass: 'toast-top-right' });", 2);
                        Redirect(BASE_PATH . '/login/paciente');
                    }
                    else{
                        $this->set('dados', $cadastro);
                    }
                }       
            }
            
        }
        
        $this->set('codigo', $codigo);
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}