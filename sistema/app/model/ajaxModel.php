<?php
class AjaxModel extends Model {
    
    function getPatrocinador($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPatrocinador", array(  "token" => $bruker->token,
                                                                "output" => $output));
        return json_encode($retorno);
    }
    
    function getAdministrador($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getAdministrador", array( "token" => $bruker->token,
                                                                "output" => $output));        
        return json_encode($retorno);
    }
    
    function getPrescritor($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPrescritor", array(    "token" => $bruker->token,
                                                                "output" => $output));
        return json_encode($retorno);
    }

    function getUnidades() {
        global $bruker;
        $retorno = httpPostAuth("ajax_getUnidades", array(  "token" => $bruker->token));
        return $retorno;
    }

    function gt_admin($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_admin", array( "token" => $bruker->token,
                                                        "id" => $id));
        return $retorno;
    }

    function gt_patroc($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_patroc", array(    "token" => $bruker->token,
                                                            "id" => $id));
        return $retorno;
    }

    function gt_prescritores($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_prescritores", array(    "token" => $bruker->token,
                                                            "id" => $id));
        return $retorno;
    }

    function gt_endereco_distribuidor($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_endereco_distribuidor", array( "token" => $bruker->token,
                                                                        "id" => $id));
        return $retorno;
    }

    function unidades_cadastrar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_unidades_cadastrar", array(   "token" => $bruker->token,
                                                                    "dados" => $dados));
        return $retorno;
    }

    function unidades_editar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_unidades_editar", array(   "token" => $bruker->token,
                                                                    "dados" => $dados));
        return $retorno;
    }

    function rmUnidade($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmUnidade", array("token" => $bruker->token,
                                                        "dados" => $dados));
        return $retorno;
    }

    function fabricantes_editar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_fabricantes_editar", array(   "token" => $bruker->token,
                                                                    "dados" => $dados));
        return $retorno;
    }

    function fabricantes_cadastrar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_fabricantes_cadastrar", array("token" => $bruker->token,
                                                                    "dados" => $dados));
        return $retorno;
    }

    function VerVideo($video) {
        global $bruker;
        $retorno = httpPostAuth("ajax_VerVideo", array( "token" => $bruker->token,
                                                        "dados" => array(   ':id_usuario' => $bruker->usuario['id'],
                                                                            ':login' => $bruker->usuario['email'],
                                                                            ':funcao' => 'video',
                                                                            ':ipaddress'=> get_ip_address(),
                                                                            ':dados' => $bruker->usuario['tipo'].'___'.$video,
                                                                            ':data_criacao'=> date('Y-m-d H:i:s'))));
        return $retorno;
    }

    function rmVideo($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_fabricantes_cadastrar", array("token" => $bruker->token,
                                                                    "id" => $id));
        return $retorno;        
    }

    function rmDistribuidor($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmDistribuidor", array("token" => $bruker->token,
                                                             "id" => $id));
        return $retorno;
    }

    function rmFabricante($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmFabricante", array("token" => $bruker->token,
                                                             "dados" => $dados));
        return $retorno;
    }

    function getFabricantes() {
        global $bruker;
        $retorno = httpPostAuth("ajax_getFabricantes", array("token" => $bruker->token));
        return $retorno;
    }

    function gt_fabricantes($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_fabricantes", array("token" => $bruker->token));       
        return json_encode($retorno);
    }

    function stHistoria($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stHistoria", array(   "token" => $bruker->token,
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id']));       
        return $retorno;
    }

    function stAvaliacao($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stAvaliacao", array(  "token" => $bruker->token,
                                                            "dados" => $dados));       
        return $retorno;
    }

    function stNecessidades($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stNecessidades", array(   "token" => $bruker->token,
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stCalculo($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stCalculo", array(    "token" => $bruker->token,
                                                            "dados" => $dados));       
        return $retorno;        
    }

    function stFracionamento($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stFracionamento", array(  "token" => $bruker->token,
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stSelecao($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stSelecao", array("token" => $bruker->token,
                                                        "dados" => $dados));       
        return $retorno;
    }

    function stObservacoes($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stObservacoes", array("token" => $bruker->token,
                                                            "dados" => $dados));       
        return $retorno;
    }

    function stDistribuidores($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stDistribuidores", array( "token" => $bruker->token,
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stRelatorio($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stRelatorio", array( "token" => $bruker->token,
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function gtRelatorio($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gtRelatorio", array( "token" => $bruker->token,
                                                           "id" => $id,
                                                           "id_prescritor" => $bruker->usuario['id']));       
        return $retorno;
    }

    function EnviarEmailPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_EnviarEmailPaciente", array(  "token" => $bruker->token,
                                                                    "dados" => $dados));       
        return $retorno;
    }    

    function getPacientes($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPacientes", array( "token" => $bruker->token,
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id']));       
        return $retorno;               
    }   

    function getDistribuidores($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getDistribuidores", array("token" => $bruker->token,
                                                                "dados" => $dados ));       
        return $retorno; 
    }

    function stPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stPaciente", array(   "token" => $bruker->token,
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id'] ));       
        return $retorno;
    }

    function ptPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_ptPaciente", array(   "token" => $bruker->token,
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id'] ));       
        return $retorno;
    }
}