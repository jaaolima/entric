<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
class Prescritor_prescricaosuplementoController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index(Request $request, Response $response) {
        global $bruker;
        $tab1 = "cadastrar";
        var_dump($request);

        if (isset($_GET['action'])){
            if ($_GET['action'] == "buscar"){
                $tab1 = "buscar";
                $buscar = $this->Prescritor_relatorioaltaModel->buscarDados($_GET);

                if (isset($buscar['error'])){
                    alertretorno("toastr['error']('".$buscar['error']."', '', {positionClass: 'toast-top-right' });");

                }else{
                    $this->set('dados_busca', $buscar);
                }
                

            }else if ($_GET['action'] == "cadastrar"){
                $cadastrar = $this->Prescritor_relatorioaltaModel->insertDados($_GET);

                if (isset($cadastrar['error'])){
                    alertretorno("toastr['error']('".$cadastrar['error']."', '', {positionClass: 'toast-top-right' });");

                }else{
                    alertretorno("toastr['success']('".$cadastrar['success']."', '', {positionClass: 'toast-top-right' });");
                }

            }else if ($_GET['action'] == "atualizar"){
                $cadastrar = $this->Prescritor_relatorioaltaModel->updateDados($_GET);

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

    function afterAction() {

    }

    function alterarRelatorio(Request $request, Response $response) {
        var_dump($request);
        $tab1 = "buscar";
        $buscar = $this->Prescritor_relatorioaltaModel->buscarDados($request);

        if (isset($buscar['error'])){
            alertretorno("toastr['error']('".$buscar['error']."', '', {positionClass: 'toast-top-right' });");

        }else{
            $this->set('dados_busca', $buscar);
        }
    }
 
}