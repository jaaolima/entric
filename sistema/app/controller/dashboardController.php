<?php
 
class DashboardController extends Controller {

    function beforeAction () {
        $util = new UtilModel();
        $util->stlog();
    }  

    function index() {
        global $bruker;
        $this->set('bruker', $bruker);

        $data1 = date("d/m/Y");
        $data2 = date('d/m/Y',strtotime('-12 month',strtotime(date("Y-m-d"))));
        $this->set('data1', $data1);
        $this->set('data2', $data2);

        $this->set('dados_site', $this->DashboardModel->getDadosSite($data1, $data2) );
        $this->set('dados_videos', $this->DashboardModel->getDadosVideos($data1, $data2) );
        $this->set('dados_relatorios', $this->DashboardModel->getDadosRelatorios(null, $data1, $data2) );
        $this->set('dados_log', $this->DashboardModel->getDadosLog() );
    }

    function afterAction() {

    }
 
}