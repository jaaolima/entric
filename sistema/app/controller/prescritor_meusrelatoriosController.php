<?php
 
class Prescritor_meusrelatoriosController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->Prescritor_meusrelatoriosModel->getDados());
        // $this->set('dados', null );
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