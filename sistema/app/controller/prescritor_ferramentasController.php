<?php
 
class Prescritor_ferramentasController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('relatorio', $this->Prescritor_ferramentasModel->getRelatorio() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}