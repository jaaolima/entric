<?php
 
class VideosaltaController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->VideosaltaModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}