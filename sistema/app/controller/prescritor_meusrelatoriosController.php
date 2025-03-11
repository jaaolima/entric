<?php
 
class Prescritor_meusrelatoriosController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;

        if (isset($_POST['action'])){
            if ($_POST['action'] == "cadastrar"){

                $cadastro = $this->Prescritor_meusrelatoriosModel->cadastrar($_POST, $_FILES);

                alertretorno("toastr['success']('Cadastro efetuado com sucesso.', '', {positionClass: 'toast-top-right' });");
            }
            else 
            if ($_POST['action'] == "editar"){

                $cadastro = $this->Prescritor_meusrelatoriosModel->editar($_POST, $_FILES);

                alertretorno("toastr['success']('Cadastro atualizado com sucesso.', '', {positionClass: 'toast-top-right' });");
            }
        }
        
        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->Prescritor_meusrelatoriosModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function cadastrar($categoria) {
        global $bruker;
        $this->set('breadcrumb','Vídeos');
        $this->set('categoria',$categoria);
        $this->set('bruker', $bruker);
    }

    function editar($id) {
        global $bruker;
        $this->set('breadcrumb','Vídeos');
        $this->set('dados', $this->Prescritor_meusrelatoriosModel->getDado($id) );
        $this->set('id', $id);
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}