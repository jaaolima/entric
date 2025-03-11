<?php
 
class Prescritor_meusrelatoriosModel extends Model {

    function getDados() {
        global $bruker;
        $retorno = httpPostAuth("prescritor_meusrelatorios_getDados", array(  "token" => $_SESSION['token']));
        return $retorno;
    }

    function getDado($id) {
        global $bruker;
        $retorno = httpPostAuth("prescritor_meusrelatorios_getDado", array( "token" => $_SESSION['token'],
                                                                        "id" => $id));
        return $retorno;
    }

    function cadastrar($dados, $files) {
        global $bruker;
        $retorno = httpPostAuth("prescritor_meusrelatorios_cadastrar1", array( "token" => $_SESSION['token'],
                                                                            "dados" => $dados));

        if ($_FILES['video']['error'] == 4){
        }else{

            if (($dados['categoria']) == "Conceitos Básicos") $dir = "conceitos_basicos";
            if (($dados['categoria']) == "Cuidados Necessários") $dir = "cuidados_necessarios";
            if (($dados['categoria']) == "Preparo e Instalação da Dieta") $dir = "preparo_e_instalacao_da_dieta";
            if (($dados['categoria']) == "Complicações") $dir = "complicacoes";

            $upload = uploadFile($_FILES['video'], "/videos/".$dir."/");
            if ($upload){
                $videos = httpPostAuth("prescritor_meusrelatorios_cadastrar2", array(   "token" => $_SESSION['token'],
                                                                                    "id" => $retorno,
                                                                                    "link" => "arquivos/videos/".$dir."/".$upload ));
            }
        }

        return $retorno; 
    }

    function editar($dados, $files) {
        global $bruker;
        $retorno = httpPostAuth("prescritor_meusrelatorios_editar1", array( "token" => $_SESSION['token'],
                                                                        "dados" => $dados));

        if ($_FILES['video']['error'] == 4){
        }else{

            if (($dados['categoria']) == "Conceitos Básicos") $dir = "conceitos_basicos";
            if (($dados['categoria']) == "Cuidados Necessários") $dir = "cuidados_necessarios";
            if (($dados['categoria']) == "Preparo e Instalação da Dieta") $dir = "preparo_e_instalacao_da_dieta";
            if (($dados['categoria']) == "Complicações") $dir = "complicacoes";

            $upload = uploadFile($_FILES['video'], "/videos/".$dir."/");
            if ($upload){
                $videos = httpPostAuth("prescritor_meusrelatorios_editar2", array(  "token" => $_SESSION['token'],
                                                                                "id" => $dados['id'],
                                                                                "link" => "arquivos/videos/".$dir."/".$upload ));
            }
        }

        return $retorno;
    }
    
}