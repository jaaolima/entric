<?php
 
class Prescritor_relatorioaltaModel extends Model {

    function insertDados($dados) {

        if (($dados['cpf'] == "") and ($dados['cpf_possui'] == "1")){
            $verificar = $this->select_single_to_array("pacientes", "*", "WHERE nome='".$dados['nome']."' ",  null);
        }
        else if (($dados['cpf'] == "") and ($dados['cpf_possui'] == "0")){
            return array("error" => "Preencha o formulário corretamente.");
        }
        else{
            $verificar = $this->select_single_to_array("pacientes", "*", "WHERE nome='".$dados['nome']."' AND cpf='".$dados['cpf']."'",  null);
        }


        if (!$verificar){

            $bind = array(  ':nome' => $dados["nome"],
                            ':celular' => $dados["celular"],
                            ':parentesco' => $dados["parentesco"],
                            ':data_nascimento' => date2sql($dados["data_nascimento"]),
                            ':sexo' => $dados["sexo"],
                            ':cpf' => $dados["cpf"],
                            ':cpf_possui' => $dados["cpf_possui"],
                            ':mae' => $dados["mae"],
                            ':mae_possui' => $dados["mae_possui"],                     
                            ':data_criacao' => date("Y-m-d H:i:s") );
            $retorno = $this->insert("pacientes", $bind);
            return array("success" => "Cadastro efetuado com sucesso.");

        }
        else{
            return array("error" => "Já possui cadastro com estes dados.");
        }
    }

    function buscarDados($dados) {

        if (($dados['nome'] == "") and ($dados['cpf'] == "")){
            return array("error" => "Preencha o formulário corretamente.");
        }
        else{
            unset($dados['action']);

            $bind = array();
            $bind_query = "";
            foreach ($dados as $key => $val) {
                if ($val <> ""){
                    if ($bind_query<>"") $bind_query .= " AND ";

                    if ($key == "data_nascimento") $val = date2sql($val);
                    if ($key == "nome"){
                        $bind_query .= " ".$key." LIKE :".$key;
                        $bind[":".$key] = "%".$val."%";
                    }
                    else{
                        $bind_query .= " ".$key."=:".$key;
                        $bind[":".$key] = $val;
                    }                   
                    
                }
            }

            if ($bind_query <> ""){
                $buscar = $this->select_to_array("pacientes", "*", "WHERE ".$bind_query, $bind);
                return $buscar;
            }
            else{
                return array("error" => "Preencha o formulário corretamente.");
            }
        }

    }
    
}