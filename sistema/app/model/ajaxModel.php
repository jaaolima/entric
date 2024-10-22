<?php
class AjaxModel extends Model {
    
    function getPatrocinador($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPatrocinador", array(  "token" => $_SESSION['token'],
                                                                "output" => $output));
        return json_encode($retorno);
    }
    
    function getAdministrador($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getAdministrador", array( "token" => $_SESSION['token'],
                                                                "output" => $output));        
        return json_encode($retorno);
    }
    
    function getPrescritor($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPrescritor", array(    "token" => $_SESSION['token'],
                                                                "output" => $output));
        return json_encode($retorno);
    }

    function getUnidades() {
        global $bruker;
        $retorno = httpPostAuth("ajax_getUnidades", array(  "token" => $_SESSION['token']));
        return $retorno;
    }

    function gt_admin($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_admin", array( "token" => $_SESSION['token'],
                                                        "id" => $id));
        return $retorno;
    }

    function gt_patroc($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_patroc", array(    "token" => $_SESSION['token'],
                                                            "id" => $id));
        return $retorno;
    }

    function gt_prescritores($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_prescritores", array(    "token" => $_SESSION['token'],
                                                            "id" => $id));
        return $retorno;
    }

    function gt_endereco_distribuidor($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_endereco_distribuidor", array( "token" => $_SESSION['token'],
                                                                        "id" => $id));
        return $retorno;
    }

    function unidades_cadastrar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_unidades_cadastrar", array(   "token" => $_SESSION['token'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function unidades_editar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_unidades_editar", array(   "token" => $_SESSION['token'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function rmUnidade($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmUnidade", array("token" => $_SESSION['token'],
                                                        "dados" => $dados));
        return $retorno;
    }

    function fabricantes_editar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_fabricantes_editar", array(   "token" => $_SESSION['token'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function fabricantes_cadastrar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_fabricantes_cadastrar", array("token" => $_SESSION['token'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function VerVideo($video) {
        global $bruker;
        $retorno = httpPostAuth("ajax_VerVideo", array( "token" => $_SESSION['token'],
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
        $retorno = httpPostAuth("ajax_fabricantes_cadastrar", array("token" => $_SESSION['token'],
                                                                    "id" => $id));
        return $retorno;        
    }

    function rmDistribuidor($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmDistribuidor", array("token" => $_SESSION['token'],
                                                             "id" => $id));
        return $retorno;
    }

    function rmFabricante($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmFabricante", array("token" => $_SESSION['token'],
                                                             "dados" => $dados));
        return $retorno;
    }

    function getFabricantes() {
        global $bruker;
        $retorno = httpPostAuth("ajax_getFabricantes", array("token" => $_SESSION['token']));
        return $retorno;
    }

    function gt_fabricantes($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_fabricantes", array("token" => $_SESSION['token']));       
        return json_encode($retorno);
    }

    function stHistoria($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stHistoria", array(   "token" => $_SESSION['token'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id']));       
        return $retorno;
    }

    function stAvaliacao($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stAvaliacao", array(  "token" => $_SESSION['token'],
                                                            "dados" => $dados));       
        return $retorno;
    }

    function stNecessidades($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stNecessidades", array(   "token" => $_SESSION['token'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stCalculo($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stCalculo", array(    "token" => $_SESSION['token'],
                                                            "dados" => $dados));       
        return $retorno;        
    }

    function stCalculoSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stCalculoSimplificada", array(    "token" => $_SESSION['token'],
                                                            "dados" => $dados));       
        return $retorno;        
    }

    function stFracionamento($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stFracionamento", array(  "token" => $_SESSION['token'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stFracionamentoSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stFracionamentoSimplificada", array(  "token" => $_SESSION['token'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stSelecao($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stSelecao", array("token" => $_SESSION['token'],
                                                        "dados" => $dados));       
        return $retorno;
    }

    function stSelecaoSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stSelecaoSimplificada", array("token" => $_SESSION['token'],
                                                        "dados" => $dados));       
        return $retorno;
    }

    function stObservacoes($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stObservacoes", array("token" => $_SESSION['token'],
                                                            "dados" => $dados));       
        return $retorno;
    }

    function stDistribuidores($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stDistribuidores", array( "token" => $_SESSION['token'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stDistribuidoresSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stDistribuidoresSimplificada", array( "token" => $_SESSION['token'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stRelatorio($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stRelatorio", array( "token" => $_SESSION['token'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function stRelatorioSimplificada($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stRelatorioSimplificada", array( "token" => $_SESSION['token'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function gtRelatorio($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gtRelatorio", array( "token" => $_SESSION['token'],
                                                           "id" => $id,
                                                           "id_prescritor" => $bruker->usuario['id']));       
        return $retorno;
    }

    function EnviarEmailPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_EnviarEmailPaciente", array(  "token" => $_SESSION['token'],
                                                                    "dados" => $dados));       
        return $retorno;
    }    

    function getPacientes($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPacientes", array( "token" => $_SESSION['token'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id']));       
        return $retorno;               
    }   

    function getPacientesSimplificada($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPacientesSimplificada", array( "token" => $_SESSION['token'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id']));       
        return $retorno;               
    }   

    function getDistribuidores($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getDistribuidores", array("token" => $_SESSION['token'],
                                                                "dados" => $dados ));       
        return $retorno; 
    }

    function stPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stPaciente", array(   "token" => $_SESSION['token'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id'] ));       
        return $retorno;
    } 

    function ptPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_ptPaciente", array(   "token" => $_SESSION['token'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id'] ));       
        return $retorno;
    }

    function stPacienteSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stPacienteSimplificada", array("token" => $_SESSION['token'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id'] ));       
        return $retorno;
    } 
}