<?php
 
class CadastrosController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;

        if (isset($_POST['_ac'])){
            if ($_POST['_ac'] == "cadastrar_administrador"){

                $cadastro = $this->CadastrosModel->cadastrarAdministrador($_POST);
                if ($cadastro){
                    alertretorno("toastr['success']('Cadastro efetuado com sucesso.', '', {positionClass: 'toast-top-right' });");

                }else{
                    alertretorno("toastr['error']('Erro ao efetuar o cadastro.', '', {positionClass: 'toast-top-right' });");
                }
            }else
            if ($_POST['_ac'] == "cadastrar_patrocinador"){

                $cadastro = $this->CadastrosModel->cadastrarPatrocinador($_POST);
                if ($cadastro){
                    alertretorno("toastr['success']('Cadastro efetuado com sucesso.', '', {positionClass: 'toast-top-right' });");

                }else{
                    alertretorno("toastr['error']('Erro ao efetuar o cadastro.', '', {positionClass: 'toast-top-right' });");
                }
            }else
            if ($_POST['_ac'] == "cadastrar_prescritor"){

                $cadastrar = $this->CadastrosModel->cadastrarPrescritor($_POST, $_FILES);

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
                            content: 'O prescritor receberá um e-mail para criação de senha.',
                            buttons: {
                                Ok: {
                                    text: 'Ok',
                                    btnClass: 'btn btn-secondary btn-form'
                                }
                            }
                        });");
                }
            }else

            if ($_POST['_ac'] == "editar_administrador"){
                $atualizar = $this->CadastrosModel->editarAdministrador($_POST);
                if ($atualizar){
                    alertretorno("toastr['success']('Cadastro editado com sucesso.', '', {positionClass: 'toast-top-right' });");

                }else{
                    alertretorno("toastr['error']('Erro ao efetuar a edição.', '', {positionClass: 'toast-top-right' });");
                }
            }else
            if ($_POST['_ac'] == "edit_patrocinador"){
                $atualizar = $this->CadastrosModel->editarPatrocinador($_POST);
                if ($atualizar){
                    alertretorno("toastr['success']('Cadastro editado com sucesso.', '', {positionClass: 'toast-top-right' });");

                }else{
                    alertretorno("toastr['error']('Erro ao efetuar a edição.', '', {positionClass: 'toast-top-right' });");
                }
            }else
            if ($_POST['_ac'] == "edit_prescritor"){

                $cadastrar = $this->CadastrosModel->editarPrescritor($_POST, $_FILES);

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
                            title: 'Cadastro editado com sucesso.',
                            icon: 'fa fa-rocket',
                            type: 'green',
                            content: 'O Cadastro editado com sucesso.',
                            buttons: {
                                Ok: {
                                    text: 'Ok',
                                    btnClass: 'btn btn-secondary btn-form'
                                }
                            }
                        });");
                }
            }
        }

        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', null );
        $this->set('bruker', $bruker);
    }

    function cadastrar() {
        global $bruker;
        $this->set('breadcrumb','Cadastros');
        $this->set('bruker', $bruker);
    }

    function editar($id = null) {
        global $bruker;
        $this->set('dados', $this->CadastrosModel->getDado($id) );
        $this->set('id',$id);
        $this->set('breadcrumb','Distribuidores');
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}