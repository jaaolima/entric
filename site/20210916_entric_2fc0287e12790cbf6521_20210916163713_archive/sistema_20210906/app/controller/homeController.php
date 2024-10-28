<?php
 
class HomeController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        if (isset($bruker->type) and ($bruker->type == "paciente")){
            Redirect(BASE_PATH . '/home/paciente');
        }
        else if (isset($bruker->type) and ($bruker->type == "prescritor")){
            Redirect(BASE_PATH . '/home/prescritor');   
        }
        else if (isset($bruker->type) and ($bruker->type == "administrador")){
            Redirect(BASE_PATH . '/home/administrador');   
        }
    }

    function paciente() {
        global $bruker;

        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->HomeModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function prescritor() {
        global $bruker;

        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->HomeModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function administrador() {
        global $bruker;

        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->HomeModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}