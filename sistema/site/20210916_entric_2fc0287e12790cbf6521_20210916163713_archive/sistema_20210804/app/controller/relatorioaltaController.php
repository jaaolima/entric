<?php
 
class RelatorioaltaController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('relatorio', $this->RelatorioaltaModel->getRelatorio() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}