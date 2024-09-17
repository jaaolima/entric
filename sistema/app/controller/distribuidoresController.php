<?php
 
class DistribuidoresController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;

        if (isset($_POST['action'])){
            if ($_POST['action'] == "cadastrar"){

                $cadastro = $this->DistribuidoresModel->cadastrar($_POST);

                alertretorno("toastr['success']('Cadastro efetuado com sucesso.', '', {positionClass: 'toast-top-right' });");
            }
            else 
            if ($_POST['action'] == "editar"){

                $cadastro = $this->DistribuidoresModel->editar($_POST);

                alertretorno("toastr['success']('Cadastro atualizado com sucesso.', '', {positionClass: 'toast-top-right' });");
            }
        }

        $this->set('breadcrumb','Bem-vindo');
        //$this->set('dados', $this->DistribuidoresModel->getDados() );
        $this->set('dados', null );
        $this->set('bruker', $bruker);
    }

    function cadastrar() {
        global $bruker;
        $this->set('breadcrumb','Distribuidores');
        $this->set('bruker', $bruker);
    }

    function editar($id = null) {
        global $bruker;
        $this->set('dados', $this->DistribuidoresModel->getDado($id) );
        $this->set('id',$id);
        $this->set('breadcrumb','Distribuidores');
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}