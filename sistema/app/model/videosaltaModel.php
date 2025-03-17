<?php
 
class VideosaltaModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("videosalta_getDados", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login']));
        return $retorno;
    }

    function getDado($id) {
        global $bruker;
        $retorno = httpPostAuth("videosalta_getDado", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                             "id" => $id));
        return $retorno;
    }

    function cadastrar($dados, $files) {
        global $bruker;
        $retorno = httpPostAuth("videosalta_cadastrar1", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                "dados" => $dados));

        if ($_FILES['video']['error'] == 4){
        }else{

            if (($dados['categoria']) == "Conceitos Básicos") $dir = "conceitos_basicos";
            if (($dados['categoria']) == "Cuidados Necessários") $dir = "cuidados_necessarios";
            if (($dados['categoria']) == "Preparo e Instalação da Dieta") $dir = "preparo_e_instalacao_da_dieta";
            if (($dados['categoria']) == "Complicações") $dir = "complicacoes";

            $upload = uploadFile($_FILES['video'], "/videos/".$dir."/");
            if ($upload){
                $videos = httpPostAuth("videosalta_cadastrar2", array( "token" => $_SESSION['token'],
                "login" => $_SESSION['login'],
                                                                        "id" => $retorno,
                                                                        "link" => "arquivos/videos/".$dir."/".$upload));
            }
        }

        return $retorno;
    }

    function editar($dados, $files) {
        global $bruker;
        $retorno = httpPostAuth("videosalta_editar1", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                             "dados" => $dados));

        if ($_FILES['video']['error'] == 4){
        }else{

            if (($dados['categoria']) == "Conceitos Básicos") $dir = "conceitos_basicos";
            if (($dados['categoria']) == "Cuidados Necessários") $dir = "cuidados_necessarios";
            if (($dados['categoria']) == "Preparo e Instalação da Dieta") $dir = "preparo_e_instalacao_da_dieta";
            if (($dados['categoria']) == "Complicações") $dir = "complicacoes";

            $upload = uploadFile($_FILES['video'], "/videos/".$dir."/");
            if ($upload){
                $videos = httpPostAuth("videosalta_editar2", array( "token" => $_SESSION['token'],
                "login" => $_SESSION['login'],
                                                                    "id" => $retorno,
                                                                    "link" => "arquivos/videos/".$dir."/".$upload));
            }
        }

        return $retorno;
    }
    
}