<?php
 
class Prescritor_relatorioaltaModel extends Model {

    function insertDados($dados) {
        /*global $bruker;

        if ($dados['cpf_possui'] == "1"){
            $verificar = $this->select_single_to_array("pacientes", "*", "WHERE nome='".$dados['nome']."' ",  null);
        }
        else if (($dados['cpf'] == "") and ($dados['cpf_possui'] == "0")){
            return array("error" => "Preencha o formulário corretamente.");
        }
        else{
            //$verificar = $this->select_single_to_array("pacientes", "*", "WHERE id_prescritor=".$bruker->usuario['id']." AND nome='".$dados['nome']."' AND cpf='".$dados['cpf']."'",  null);
            $verificar = $this->select_single_to_array("pacientes", "*", "WHERE id_prescritor=".$bruker->usuario['id']." AND cpf='".$dados['cpf']."'",  null);
        }

        if (!$verificar){
            $bind = array(  ':email' => $dados["email"],
                            ':tipo' => 1,
                            ':status' => 0,                     
                            ':data_criacao' => date("Y-m-d H:i:s") );
            $usuario = $this->insert("usuarios", $bind);

            $bind = array(  ':id_usuario' => $usuario,
                            ':id_prescritor' => $bruker->usuario['id'],
                            ':nome' => $dados["nome"],
                            ':celular' => $dados["celular"],
                            ':email' => $dados["email"],
                            ':pertence' => $dados["pertence"],
                            ':parentesco' => $dados["parentesco"],
                            ':data_nascimento' => date2sql($dados["data_nascimento"]),
                            ':sexo' => $dados["sexo"],
                            ':cpf' => (isset($dados["cpf"])?$dados["cpf"]:null),
                            ':cpf_possui' => $dados["cpf_possui"],
                            ':mae' => (isset($dados["mae"])?$dados["mae"]:null),
                            ':mae_possui' => $dados["mae_possui"],                     
                            ':data_criacao' => date("Y-m-d H:i:s") );
            $retorno = $this->insert("pacientes", $bind);
            return array("success" => "Cadastro efetuado com sucesso.");

        }
        else{
            return array("error" => "Já possui cadastro com estes dados.");
        }*/
    }

    function updateDados($dados) {
        /*global $bruker;

        if (($dados['up_cpf'] == "") and ($dados['up_cpf_possui'] == "1")){
            $verificar = $this->select_single_to_array("pacientes", "*", "WHERE nome='".$dados['up_nome']."' ",  null);
        }
        else if (($dados['up_cpf'] == "") and ($dados['up_cpf_possui'] == "0")){
            return array("error" => "Preencha o formulário corretamente.");
        }
        else{
            $verificar = $this->select_single_to_array("pacientes", "*", "WHERE id<>".$dados['up_id']." AND id_prescritor=".$bruker->usuario['id']." AND nome='".$dados['up_nome']."' AND cpf='".$dados['up_cpf']."'",  null);
        }

        if (!$verificar){
            $bind = array(  ':nome' => $dados["up_nome"],
                            ':celular' => $dados["up_celular"],
                            ':email' => $dados["up_email"],
                            ':pertence' => $dados["up_pertence"],
                            ':parentesco' => $dados["up_parentesco"],
                            ':data_nascimento' => date2sql($dados["up_data_nascimento"]),
                            ':sexo' => $dados["up_sexo"],
                            ':cpf' => $dados["up_cpf"],
                            ':cpf_possui' => $dados["up_cpf_possui"],
                            ':mae' => $dados["up_mae"],
                            ':mae_possui' => $dados["up_mae_possui"],                     
                            ':data_criacao' => date("Y-m-d H:i:s") );
            $retorno = $this->update("pacientes", "WHERE id=".$dados['up_id'], $bind);
            return array("success" => "Cadastro atualizado com sucesso.");

        }
        else{
            return array("error" => "Já possui cadastro com estes dados.");
        }*/
    }

    function buscarDados($dados) { 
        global $bruker;
        $retorno = httpPostAuth("prescritor_relatorioalta_buscarDados", array(  "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                                "dados" => $dados));
        return $retorno;
    }
    
}