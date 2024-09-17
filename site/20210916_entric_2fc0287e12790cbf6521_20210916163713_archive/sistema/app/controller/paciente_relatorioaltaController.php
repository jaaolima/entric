<?php
 
class Paciente_relatorioaltaController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('relatorio', $this->Paciente_relatorioaltaModel->getRelatorio() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}