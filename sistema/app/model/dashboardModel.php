<?php
 
class DashboardModel extends Model {

    function getDadosLog() {
        global $bruker;
        $retorno = httpPostAuth("dashboard_getDadosLog", array("token" => $bruker->token));
        return $retorno;
    }

    function getDadosSite($data1, $data2) {
        global $bruker;
        $retorno = httpPostAuth("dashboard_getDadosSite", array("token" => $bruker->token,
                                                                "data1" => $data1,
                                                                "data2" => $data2));
        return $retorno;
    }

    function getDadosVideos($data1, $data2) {
        global $bruker;
        $retorno = httpPostAuth("dashboard_getDadosVideos", array("token" => $bruker->token,
                                                                "data1" => $data1,
                                                                "data2" => $data2));
        return $retorno;
    }

    function getDadosRelatorios($uf = null, $data1, $data2) {
        global $bruker;
        $retorno = httpPostAuth("dashboard_getDadosRelatorios", array("token" => $bruker->token,
                                                                    "uf" => $uf,
                                                                    "data1" => $data1,
                                                                    "data2" => $data2));
        return $retorno;
    }
}