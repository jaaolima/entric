<?php
 
class HomeController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;
        $this->set('bruker', $bruker);
print_r($bruker);
        if (isset($bruker->type) and ($bruker->type == "paciente")){
            //Redirect(BASE_PATH . '/home/paciente');
            Redirect(BASE_PATH . '/paciente_videosalta');            
        }
        else if (isset($bruker->type) and ($bruker->type == "prescritor")){
            //Redirect(BASE_PATH . '/home/prescritor');
            if($bruker->redirect == 'simplificada'){
                Redirect(BASE_PATH . '/prescritor_prescricaosimplificada');       
            }else if($bruker->redirect == "suplemento"){
                Redirect(BASE_PATH . '/prescritor_prescricaosuplemento');       
            }else{
                Redirect(BASE_PATH . '/prescritor_relatorioalta');       
            }
        }
        else if (isset($bruker->type) and ($bruker->type == "administrador")){
            Redirect(BASE_PATH . '/home/administrador');   
        }
        else if (isset($bruker->type) and ($bruker->type == "patrocinador")){
            Redirect(BASE_PATH . '/home/patrocinador');   
        }
    }

    function paciente() {
        global $bruker;

        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->HomeModel->getDados() );
        $this->set('bruker', $bruker);
        Redirect(BASE_PATH . '/paciente_videosalta');
    }

    function prescritor() {
        global $bruker;

        //$this->set('breadcrumb','Bem-vindo');
        //$this->set('dados', $this->HomeModel->getDados() );
        $this->set('bruker', $bruker);
        Redirect(BASE_PATH . '/prescritor_relatorioalta');   
    }

    function administrador() {
        global $bruker;

        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->HomeModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function patrocinador() {
        global $bruker;

        $this->set('breadcrumb','Bem-vindo');
        $this->set('dados', $this->HomeModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}