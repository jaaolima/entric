<?php
 
class HomeModel extends Model {

    function getDados() {
        global $bruker;
    	$retorno = array();
        $relatorio = $this->select_to_array("relatorios AS r",
                                            
                                            "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
                                            
                                            "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
                                            LEFT JOIN pacientes pa ON r.id_paciente = pa.id
                                            WHERE r.id_paciente=".$bruker->usuario['id']." 
                                            ORDER BY r.data_criacao DESC", 
                                            null);
        $retorno['relatorios'] = count($relatorio);

        $videos = $this->select_to_array("videos", "id", "WHERE id_paciente=".$bruker->usuario['id']." ORDER BY id DESC", null);
        $retorno['videos'] = count($videos);

        $contatos = $this->select_to_array("contatos", "id", "WHERE id_paciente=".$bruker->usuario['id']." ORDER BY id DESC", null);
        $retorno['contatos'] = count($contatos);

        $fornecedores = $this->select_to_array("fornecedores", "id", "WHERE id_paciente=".$bruker->usuario['id']." ORDER BY id DESC", null);
        $retorno['fornecedores'] = count($fornecedores);
    	
	   	return $retorno;
    }
    
}