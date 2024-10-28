<?php
 
class ContatoController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->ContatoModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}