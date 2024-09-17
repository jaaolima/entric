<?php
 
class Paciente_contatoModel extends Model {

    function getDados() {
        global $bruker;
        $contatos = $this->select_to_array("contatos",
                                            "*",
                                            "
                                            WHERE id_paciente=".$bruker->usuario['id']." 
                                            ORDER BY id ASC", 
                                            null);
        
        return $contatos;
    }
}