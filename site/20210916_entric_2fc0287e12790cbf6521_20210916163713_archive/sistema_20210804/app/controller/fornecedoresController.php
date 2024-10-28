<?php
 
class FornecedoresController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->FornecedoresModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}