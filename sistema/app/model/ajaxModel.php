<?php
class AjaxModel extends Model {
    
    function getPatrocinador($output) { 
        global $bruker;
        $retorno = httpPostAuth("ajax_getPatrocinador", array(  "token" => $_SESSION['token'],
                                                                "login" => $_SESSION['login'],
                                                                "output" => $output));
        return json_encode($retorno);
    }
    
    function getAdministrador($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getAdministrador", array( "token" => $_SESSION['token'],
                                                                "login" => $_SESSION['login'],
                                                                "output" => $output));        
        return json_encode($retorno);
    }
    
    function getPrescritor($output) { 
        global $bruker;
        $retorno = httpPostAuth("ajax_getPrescritor", array(    "token" => $_SESSION['token'],
                                                                "login" => $_SESSION['login'],
                                                                "output" => $output));
        return json_encode($retorno);
    }

    function getUnidades() {
        global $bruker;
        $retorno = httpPostAuth("ajax_getUnidades", array(  "token" => $_SESSION['token'], "login" => $_SESSION['login']));
        return $retorno;
    }

    function gt_admin($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_admin", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                        "id" => $id));
        return $retorno;
    }

    function gt_patroc($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_patroc", array(    "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "id" => $id));
        return $retorno;
    }

    function gt_prescritores($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_prescritores", array(    "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "id" => $id));
        return $retorno;
    }

    function gt_endereco_distribuidor($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_endereco_distribuidor", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                        "id" => $id));
        return $retorno;
    }

    function unidades_cadastrar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_unidades_cadastrar", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function unidades_editar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_unidades_editar", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function rmUnidade($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmUnidade", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                        "dados" => $dados));
        return $retorno;
    }

    function fabricantes_editar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_fabricantes_editar", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function fabricantes_cadastrar($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_fabricantes_cadastrar", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function VerVideo($video) {
        global $bruker;
        $retorno = httpPostAuth("ajax_VerVideo", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                        "dados" => array(   ':id_usuario' => $bruker->usuario['id_usuario'],
                                                                            ':login' => $bruker->usuario['ds_usuario'],
                                                                            ':funcao' => 'video',
                                                                            ':ipaddress'=> get_ip_address(),
                                                                            ':dados' => $bruker->usuario['tipo'].'___'.$video,
                                                                            ':data_criacao'=> date('Y-m-d H:i:s'))));
        return $retorno;
    }

    function rmVideo($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_fabricantes_cadastrar", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                    "id" => $id));
        return $retorno;        
    }

    function rmDistribuidor($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmDistribuidor", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                             "id" => $id));
        return $retorno;
    }

    function rmFabricante($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmFabricante", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                             "dados" => $dados));
        return $retorno;
    }

    function getFabricantes() {
        global $bruker;
        $retorno = httpPostAuth("ajax_getFabricantes", array("token" => $_SESSION['token'],
                                                            "login" => $_SESSION['login']));
        return $retorno;
    }

    function gt_fabricantes($output) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gt_fabricantes", array("token" => $_SESSION['token'],
                                                            "login" => $_SESSION['login']));       
        return json_encode($retorno);
    }

    function stHistoria($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stHistoria", array(   "token" => $_SESSION['token'],
                                                            "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;
    }

    function stAvaliacao($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stAvaliacao", array(  "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados));       
        return $retorno;
    }

    function stNecessidades($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stNecessidades", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stCalculo($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stCalculo", array(    "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "id_prescritor" => $bruker->usuario['id_usuario'],
                                                            "dados" => $dados));       
        return $retorno;        
    }

    function stCalculoSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stCalculoSimplificada", array(    "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "id_prescritor" => $bruker->usuario['id_usuario'],
                                                            "dados" => $dados));       
        return $retorno;        
    }

    function stCalculoSuplemento($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stCalculoSuplemento", array(    "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "id_prescritor" => $bruker->usuario['id_usuario'],
                                                            "dados" => $dados));       
        return $retorno;        
    }

    function stCalculoModulo($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stCalculoModulo", array(    "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "id_prescritor" => $bruker->usuario['id_usuario'],
                                                            "dados" => $dados));       
        return $retorno;        
    }

    function stFracionamento($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stFracionamento", array(  "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stFracionamentoSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stFracionamentoSimplificada", array(  "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stFracionamentoSuplemento($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stFracionamentoSuplemento", array(  "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stFracionamentoModulo($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stFracionamentoModulo", array(  "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stSelecao($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stSelecao", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                        "dados" => $dados));       
        return $retorno;
    }

    function stSelecaoSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stSelecaoSimplificada", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                        "dados" => $dados));       
        return $retorno;
    }

    function stSelecaoSuplemento($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stSelecaoSuplemento", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                        "dados" => $dados));       
        return $retorno;
    }

    function stSelecaoModulo($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stSelecaoModulo", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                        "dados" => $dados));       
        return $retorno;
    }

    function stObservacoes($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stObservacoes", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados));       
        return $retorno;
    }

    function stDistribuidores($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stDistribuidores", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stDistribuidoresSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stDistribuidoresSimplificada", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stDistribuidoresSuplemento($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stDistribuidoresSuplemento", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function stDistribuidoresModulo($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stDistribuidoresModulo", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados));       
        return $retorno;
    }

    function rmRelatorio($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmRelatorio", array( "token" => $_SESSION['token'],
                                                            "login" => $_SESSION['login'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function rmRelatorioSimplificada($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmRelatorioSimplificada", array( "token" => $_SESSION['token'],
                                                            "login" => $_SESSION['login'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function rmRelatorioSuplemento($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmRelatorioSuplemento", array( "token" => $_SESSION['token'],
                                                            "login" => $_SESSION['login'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function rmRelatorioModulo($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_rmRelatorioModulo", array( "token" => $_SESSION['token'],
                                                            "login" => $_SESSION['login'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function stRelatorio($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stRelatorio", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function stRelatorioSimplificada($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stRelatorioSimplificada", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function stRelatorioSuplemento($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stRelatorioSuplemento", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function stRelatorioModulo($dados, $set_codigo = false) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stRelatorioModulo", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                           "dados" => $dados,
                                                           "set_codigo" => $set_codigo));       
        return $retorno;
    }

    function gtRelatorio($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gtRelatorio", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                           "id" => $id,
                                                           "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;
    }

    function gtRelatorioSimplificada($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gtRelatorioSimplificada", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                           "id" => $id,
                                                           "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;
    }

    function gtRelatorioSuplemento($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gtRelatorioSuplemento", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                           "id" => $id,
                                                           "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;
    }

    function gtRelatorioModulo($id) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gtRelatorioModulo", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                           "id" => $id,
                                                           "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;
    }

    function EnviarEmailPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_EnviarEmailPaciente", array(  "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                    "dados" => $dados));       
        return $retorno;
    }    

    function getPacientes($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPacientes", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;               
    }   

    function getPacientesSimplificada($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPacientesSimplificada", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;               
    }  
    
    function getPacientesSuplemento($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPacientesSuplemento", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;               
    }   

    function getPacientesModulo($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getPacientesModulo", array( "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;               
    }  

    function getDistribuidores($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_getDistribuidores", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                                "dados" => $dados ));       
        return $retorno; 
    }

    function stPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stPaciente", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario'] ));       
        return $retorno;
    } 

    function ptPaciente($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_ptPaciente", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario'] ));       
        return $retorno;
    }

    function ptPacienteSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_ptPacienteSimplificada", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario'] ));       
        return $retorno;
    }

    function ptPacienteSuplemento($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_ptPacienteSuplemento", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario'] ));       
        return $retorno;
    }

    function ptPacienteModulo($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_ptPacienteModulo", array(   "token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario'] ));       
        return $retorno;
    }

    function stPacienteSimplificada($dados) {
        global $bruker;
        $retorno = httpPostAuth("ajax_stPacienteSimplificada", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario'] ));       
        return $retorno;
    } 

    function stPacienteSuplemento($dados) { 
        global $bruker;
        $retorno = httpPostAuth("ajax_stPacienteSuplemento", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario'] ));       
        return $retorno;
    } 

    function stPacienteModulo($dados) { 
        global $bruker;
        $retorno = httpPostAuth("ajax_stPacienteModulo", array("token" => $_SESSION['token'],
                                                                        "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario'] ));       
        return $retorno;
    } 

    function excluir_prescritor($id) {
        global $bruker;
        $retorno = httpPostAuth("prescritor_excluirPrescritor", array( "token" => $_SESSION['token'],
                                                                "login" => $_SESSION['login'],
                                                                "id" => $id));
        return $retorno;
    }

    function gtProdutoFormula($dados = null) {
        global $bruker;
        $retorno = httpPostAuth("ajax_gtProdutoFormula", array( "token" => $_SESSION['token'],
                                                            "login" => $_SESSION['login'],
                                                            "dados" => $dados,
                                                            "id_prescritor" => $bruker->usuario['id_usuario']));       
        return $retorno;               
    }   
}