<?php
 
class Paciente_distribuidoresController extends Controller {

    function beforeAction () { 
        if (isset($bruker)){
            $util = new UtilModel();
            $util->stlog();
        }
    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        //$this->set('dados', $this->Paciente_distribuidoresModel->getDados() );
        $this->set('dados', null );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}