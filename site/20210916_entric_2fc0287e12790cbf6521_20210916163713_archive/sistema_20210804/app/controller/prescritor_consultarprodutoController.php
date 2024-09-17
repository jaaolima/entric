<?php
 
class Prescritor_consultarprodutoController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('relatorio', $this->Prescritor_consultarprodutoModel->getRelatorio() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}