<?php
 
class Prescritor_videosaltaModel extends Model {

    function getDados() {
        global $bruker;
    	$retorno = array();

        $relatorio = $this->select_to_array("videos",
                                            "*",
                                            "
                                            WHERE id_paciente=".$bruker->usuario['id']." 
                                            ORDER BY id ASC", 
                                            null);
        if ($relatorio){
            for($i = 0; $i < count($relatorio); $i++){
                $retorno[$relatorio[$i]['categoria']][] = $relatorio[$i];
            }
        }
    	
	   	return $retorno;
    }
    
}