<?php
 
class Prescritor_fornecedoresController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        //$this->set('dados', $this->Prescritor_fornecedoresModel->getDados() );
        $this->set('dados', null );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}