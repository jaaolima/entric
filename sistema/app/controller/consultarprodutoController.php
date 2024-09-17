<?php
 
class ConsultarprodutoController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('fornecedores', $this->ConsultarprodutoModel->getFornecedores() );
        $this->set('unidades', $this->ConsultarprodutoModel->getUnidades() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}