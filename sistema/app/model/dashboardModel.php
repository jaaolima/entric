<?php
 
class DashboardModel extends Model {

    function getDadosLog() {
        global $bruker;
        $retorno = httpPostAuth("dashboard_getDadosLog", array("token" => $_SESSION['token'],
                                                                "login" => $_SESSION['login']));
        return $retorno;
    }

    function getDadosSite($data1, $data2) {
        global $bruker;
        $retorno = httpPostAuth("dashboard_getDadosSite", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "data1" => $data1,
                                                                "data2" => $data2));
        return $retorno;
    }

    function getDadosVideos($data1, $data2) {
        global $bruker;
        $retorno = httpPostAuth("dashboard_getDadosVideos", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "data1" => $data1,
                                                                "data2" => $data2));
        return $retorno;
    }

    function getDadosRelatorios($uf = null, $data1, $data2, $tipo) {
        global $bruker;
        $retorno = httpPostAuth("dashboard_getDadosRelatorios", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                    "uf" => $uf,
                                                                    "data1" => $data1,
                                                                    "data2" => $data2,
                                                                    "tipo" => $tipo));
        return $retorno;
    }
}