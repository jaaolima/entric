<?php
 
class Prescritor_consultarprodutoModel extends Model {

    function getRelatorio() {
        global $bruker;

        $relatorio = $this->select_to_array("relatorios AS r",
                                            
                                            "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
                                            
                                            "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
                                            LEFT JOIN pacientes pa ON r.id_paciente = pa.id
                                            WHERE r.id_paciente=".$bruker->usuario['id']." 
                                            ORDER BY r.data_criacao DESC", 
                                            null);
    	
	   	return $relatorio;
    }
    
}