<?php
 
class FornecedoresModel extends Model {

    function getDados() {
        global $bruker;
        $fornecedores = $this->select_to_array("fornecedores",
                                            "*",
                                            "
                                            WHERE id_paciente=".$bruker->usuario['id']." 
                                            ORDER BY id ASC", 
                                            null);
        
        return $fornecedores;
    }
}