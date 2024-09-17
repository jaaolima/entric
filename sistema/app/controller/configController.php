<?php
 
class ConfigController extends Controller {

    function beforeAction () {

    }  

    function index() {
        global $bruker;
        $tab1 = "cadastrar";

        if (isset($_POST['action'])){
            if ($_POST['action'] == "salvar_orientacoes"){
                $buscar = $this->ConfigModel->SalvarOrientacoes($_POST);

                alertretorno("toastr['success']('Dados salvos com sucesso', '', {positionClass: 'toast-top-right' });");
            }
        }


        $this->set('breadcrumb','Bem-vindo');
        $this->set('tab1', $tab1);
        $this->set('dados', $this->ConfigModel->getDados() );
        $this->set('bruker', $bruker);
    }

    function afterAction() {

    }
 
}