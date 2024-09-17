<?php
 
class Paciente_videosaltaController extends Controller {

    function beforeAction () {
        if (isset($bruker)){
            $util = new UtilModel();
            $util->stlog();
        }
    }  

    function index() {
        global $bruker;

        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->Paciente_videosaltaModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}