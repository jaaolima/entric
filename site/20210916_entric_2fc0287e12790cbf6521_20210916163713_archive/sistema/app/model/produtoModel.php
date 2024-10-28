<?php
class ProdutoModel extends Model {
    function chkProduto($dados) {
        $verifica = $this->select_single_to_array("produtos",
                                            "*",
                                            "WHERE nome='".$dados['nome']."'", 
                                            null);
        
        return $verifica;
    }

    function gtProdutos($dados) {
        $produtos = $this->select_to_array("produtos",
                                            "id, nome, fabricante",
                                            "WHERE nome LIKE '%".$dados."%' OR apresentacao LIKE '%".$dados."%' OR fabricante LIKE '%".$dados."%' OR indicacao LIKE '%".$dados."%' OR composicao_nutricional LIKE '%".$dados."%'", 
                                            null);
        return $produtos;
    }

    function gtProduto($dados) {
        $produto = $this->select_single_to_array("produtos", "*", "WHERE id=".$dados, null);
        if ($produto){
            $produtos_info_nutri = $this->select_to_array("produtos_info_nutri", "descricao, valor", "WHERE id_produto=".$dados, null);
            $produto['info_nutri'] = $produtos_info_nutri;

            if ($produto['medida'] == 'g'){
                $produto['medida_g'] = $produto['medida_valor'];
            }else{
                $produto['medida_dc'] = $produto['medida_valor'];
            }
        }
        return $produto;
    }

    function stProduto($dados) {
        global $bruker;

        $bind = array(  ':especialidade' => $dados["especialidade"],
                        ':id_usuario' => $bruker->usuario['id'],
                        ':via' => $dados["via"],
                        ':apresentacao_produto' => $dados["apresentacao_produto"],
                        ':nome' => $dados["nome"],
                        ':tipo' => $dados["tipo"],
                        ':apresentacao' => $dados["apresentacao"],
                        ':medida' => $dados["medida"],
                        ':medida_valor' => ($dados["medida"]=="g"?$dados["medida_g"]:$dados["medida_dc"]),
                        ':fabricante' => $dados["fabricante"],
                        ':kcal' => $dados["kcal"],
                        ':cho' => $dados["cho"],
                        ':ptn' => $dados["ptn"],
                        ':lip' => $dados["lip"],
                        ':fibras' => $dados["fibras"],
                        ':indicacao' => $dados["indicacao"],
                        ':composicao_nutricional' => $dados["composicao_nutricional"],
                        ':data_cadastro' => date("Y-m-d H:i:s") );

        if (isset($dados['apres_enteral'])){
            $bind[':apres_enteral'] = ($dados["via"]=="Enteral"?json_encode($dados['apres_enteral']):null);
        }
        if (isset($dados['carac_enteral'])){
            $bind[':carac_enteral'] = ($dados["via"]=="Enteral"?json_encode($dados['carac_enteral']):null);
        }
        if (isset($dados['apres_oral'])){
            $bind[':apres_oral'] = ($dados["via"]=="Oral"?json_encode($dados['apres_oral']):null);
        }
        if (isset($dados['carac_oral'])){
            $bind[':carac_oral'] = ($dados["via"]=="Oral"?json_encode($dados['carac_oral']):null);
        }

        $produto = $this->insert("produtos", $bind);

        if ($produto){
            foreach ($dados as $key => $val) {
                if ($val <> ""){
                    if(strpos($key, "info_nutri_") !== false){
                        $descricao = str_replace("info_nutri_", "", $key);
                        $descricao = str_replace("_", " ", $descricao);
                        $bind = array(  ':id_usuario' => $bruker->usuario['id'],
                                        ':id_produto' => $produto,
                                        ':descricao' => $descricao,
                                        ':valor' => $val);
                        $produtos_info_nutri = $this->insert("produtos_info_nutri", $bind);
                    }
                }
            }
        }
        
        return $produto;
    }

    function ptProduto($dados) {
        global $bruker;

        $bind = array(  ':especialidade' => $dados["especialidade"],
                        ':via' => $dados["via"],
                        ':apresentacao_produto' => $dados["apresentacao_produto"],
                        ':nome' => $dados["nome"],
                        ':tipo' => $dados["tipo"],
                        ':apresentacao' => $dados["apresentacao"],
                        ':medida' => $dados["medida"],
                        ':medida_valor' => ($dados["medida"]=="g"?$dados["medida_g"]:$dados["medida_dc"]),
                        ':fabricante' => $dados["fabricante"],
                        ':kcal' => $dados["kcal"],
                        ':cho' => $dados["cho"],
                        ':ptn' => $dados["ptn"],
                        ':lip' => $dados["lip"],
                        ':fibras' => $dados["fibras"],
                        ':indicacao' => $dados["indicacao"],
                        ':composicao_nutricional' => $dados["composicao_nutricional"]);

        if (isset($dados['apres_enteral'])){
            $bind[':apres_enteral'] = ($dados["via"]=="Enteral"?json_encode($dados['apres_enteral']):null);
        }
        if (isset($dados['carac_enteral'])){
            $bind[':carac_enteral'] = ($dados["via"]=="Enteral"?json_encode($dados['carac_enteral']):null);
        }
        if (isset($dados['apres_oral'])){
            $bind[':apres_oral'] = ($dados["via"]=="Oral"?json_encode($dados['apres_oral']):null);
        }
        if (isset($dados['carac_oral'])){
            $bind[':carac_oral'] = ($dados["via"]=="Oral"?json_encode($dados['carac_oral']):null);
        }

        $produto = $this->update("produtos", "WHERE id=".$dados['_idproduto'], $bind);

        $this->delete('produtos_info_nutri', "WHERE id_produto=:id_produto", array(':id_produto'=>$dados['_idproduto']));
        foreach ($dados as $key => $val) {
            if ($val <> ""){
                if(strpos($key, "info_nutri_") !== false){
                    $descricao = str_replace("info_nutri_", "", $key);
                    $descricao = str_replace("_", " ", $descricao);
                    $bind = array(  ':id_usuario' => $bruker->usuario['id'],
                                    ':id_produto' => $dados['_idproduto'],
                                    ':descricao' => $descricao,
                                    ':valor' => $val);
                    $produtos_info_nutri = $this->insert("produtos_info_nutri", $bind);
                }
            }
        }

        
        return true;
    }

}