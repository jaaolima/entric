<?php
 
class Paciente_contatoController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->Paciente_contatoModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}