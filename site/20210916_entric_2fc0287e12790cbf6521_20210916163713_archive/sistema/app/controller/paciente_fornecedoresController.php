<?php
 
class Paciente_fornecedoresController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->Paciente_fornecedoresModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}