<?php
class Prescritor_prescricaosuplementoController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;
        $tab1 = "cadastrar";

        if (isset($_POST['action'])){
            if ($_POST['action'] == "buscar"){
                $tab1 = "buscar";
                $buscar = $this->Prescritor_relatorioaltaModel->buscarDados($_POST);

                if (isset($buscar['error'])){
                    alertretorno("toastr['error']('".$buscar['error']."', '', {positionClass: 'toast-top-right' });");

                }else{
                    $this->set('dados_busca', $buscar);
                }
                

            }else if ($_POST['action'] == "cadastrar"){
                $cadastrar = $this->Prescritor_relatorioaltaModel->insertDados($_POST);

                if (isset($cadastrar['error'])){
                    alertretorno("toastr['error']('".$cadastrar['error']."', '', {positionClass: 'toast-top-right' });");

                }else{
                    alertretorno("toastr['success']('".$cadastrar['success']."', '', {positionClass: 'toast-top-right' });");
                }

            }else if ($_POST['action'] == "atualizar"){
                $cadastrar = $this->Prescritor_relatorioaltaModel->updateDados($_POST);

                if (isset($cadastrar['error'])){
                    alertretorno("toastr['error']('".$cadastrar['error']."', '', {positionClass: 'toast-top-right' });");

                }else{
                    alertretorno("toastr['success']('".$cadastrar['success']."', '', {positionClass: 'toast-top-right' });");
                }

            }
        }


        $this->set('breadcrumb','Bem-vindo');
        $this->set('tab1', $tab1);
        $this->set('bruker', $bruker);
    }

    function alterarRelatorio(){
        $_SESSION['paciente_redirect']['buscar'] = 'alterar_relatorio';
        $_SESSION['paciente_redirect']['ds_nome'] = $_POST['ds_nome'];
    }

    function afterAction() {

    }
 
}