<?php
 
class Paciente_contatoController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
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