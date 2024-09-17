<?php
 
class AjaxModel extends Model {

    function getPacientes($dados = null) {
        global $bruker;

        $bind_query = "";

        if (isset($dados['nome']) and (trim($dados['nome']) <> "")){
        	$bind_query .= " AND nome LIKE '%".$dados['nome']."%'";
        }
        if (isset($dados['data_nascimento']) and (trim($dados['data_nascimento']) <> "")){
        	$bind_query .= " AND data_nascimento='".date2sql($dados['data_nascimento'])."'";
        }
        if (isset($dados['cpf']) and (trim($dados['cpf']) <> "")){
        	$bind_query .= " AND cpf='".$dados['cpf']."'";
        }
        if ($bind_query <> ""){
        	$bind_query = " id_usuario=".$bruker->usuario['id']." ".$bind_query;
	        $pacientes = $this->select_to_array("pacientes",
	                                            "DISTINCT(nome) AS nome, cpf, mae, DATE_FORMAT(data_nascimento,'%d/%m/%Y') AS data_nascimento, sexo",
	                                            "WHERE ".$bind_query." ORDER BY nome ASC",
	                                            null);
            if ($pacientes){
                for($i = 0; $i < count($pacientes); $i++){
                    $relatorios = $this->select_to_array("pacientes",
                                                        "id, nome, DATE_FORMAT(data_criacao,'%d/%m/%Y %H:%i') AS data_criacao, codigo",
                                                        "WHERE nome='".$pacientes[$i]['nome']."' AND cpf='".$pacientes[$i]['cpf']."' AND mae='".$pacientes[$i]['mae']."' AND data_nascimento='".date2sql($pacientes[$i]['data_nascimento'])."' AND sexo='".$pacientes[$i]['sexo']."' ORDER BY id DESC",
                                                        null);
                    $pacientes[$i]['relatorios'] = $relatorios;
                }
            }

	        return $pacientes;

        }else{
        	return array();
        }        
    }    
}