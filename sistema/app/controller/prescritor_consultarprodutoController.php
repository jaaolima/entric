<?php
 
class Prescritor_consultarprodutoController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;
        
        $this->set('breadcrumb','Bem-vindo');
        $this->set('fornecedores', $this->Prescritor_consultarprodutoModel->getFornecedores() );
        $this->set('unidades', $this->Prescritor_consultarprodutoModel->getUnidades() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}