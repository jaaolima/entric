<?php
class ProdutoModel extends Model {

    function gtProdutoRelatorio($dados) {
        global $bruker;
        $retorno = httpPostAuth("produto_gtProdutoRelatorio", array("token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                    "dados" => $dados)); 
        return $retorno;
    }

    function gtProdutoRelatorioSimplificada($dados) { 
        global $bruker;
        $retorno = httpPostAuth("produto_gtProdutoRelatorioSimplificada", array("token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function gtProdutoRelatorioSuplemento($dados) {
        global $bruker;
        $retorno = httpPostAuth("produto_gtProdutoRelatorioSuplemento", array("token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function gtProdutoRelatorioModulo($dados) {
        global $bruker;
        $retorno = httpPostAuth("produto_gtProdutoRelatorioModulo", array("token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function gtProdutoFiltros($dados) {
        global $bruker;
        $retorno = httpPostAuth("produto_gtProdutoFiltros", array(  "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                    "dados" => $dados));
        return $retorno;
    }

    function chkProduto($dados) {
        global $bruker;
        $retorno = httpPostAuth("produto_chkProduto", array(    "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                "dados" => $dados)); 
        return $retorno;
    }

    function gtProdutos($dados) {
        global $bruker;
        $retorno = httpPostAuth("produto_gtProdutos", array(    "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                "dados" => $dados));
        return $retorno;
    }

    function gtProduto($dados) {
        global $bruker;
        $retorno = httpPostAuth("produto_gtProduto", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                            "dados" => $dados));
        return $retorno;
    }

    function stProduto($dados) { 
        global $bruker;

        if ($dados["fabricante"] == "null") $dados["fabricante"] = null;               
        $bind = array(  ':especialidade' => (isset($dados["especialidade"])?json_encode($dados["especialidade"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':id_usuario' => $bruker->usuario['id_usuario'],
                        ':via' => $dados["via"],
                        ':prioridade' => $dados["prioridade"],
                        ':tipo_proteina' => isset($dados["tipo_proteina"])?$dados["tipo_proteina"]:null,
                        ':nome' => $dados["nome"],
                        ':unidmedida' => ($dados["via"]=="Enteral"?null:$dados["unidmedida"]),
                        ':apresentacao' => (isset($dados["apresentacao"])?json_encode($dados["apresentacao"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':volume' => (isset($dados["volume"])?json_encode($dados["volume"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':volume_medida' => (isset($dados["volume_medida"])?json_encode($dados["volume_medida"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':medida' => (isset($dados["medida"])?json_encode($dados["medida"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':unidade' => (isset($dados["unidade"])?json_encode($dados["unidade"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':medida_g' => (isset($dados["medida_g"])?json_encode($dados["medida_g"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':medida_dc' => (isset($dados["medida_dc"])?json_encode($dados["medida_dc"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':diluicao' => (isset($dados["diluicao"])?json_encode($dados["diluicao"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':final' => (isset($dados["final"])?json_encode($dados["final"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':fabricante' => $dados["fabricante"],
                        ':kcal' => $dados["kcal"],
                        ':cho' => $dados["cho"],
                        ':ptn' => $dados["ptn"],
                        ':lip' => $dados["lip"],
                        ':fibras' => $dados["fibras"],
                        ':indicacao' => $dados["indicacao"],
                        ':descricao' => $dados["descricao"],
                        ':sabores' => $dados["sabores"],
                        ':preparo' => $dados["preparo"],
                        ':observacoes' => $dados["observacoes"],
                        ':data_cadastro' => date("Y-m-d H:i:s") );
        
        if (isset($dados['apres_enteral'])){
            $bind[':apres_enteral'] = ($dados["via"]=="Enteral"?json_encode($dados['apres_enteral'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
        }
        if (isset($dados['carac_enteral'])){
            $carac_enteral = array();
            if ($dados["via"]=="Enteral"){
                if (isset($dados['carac_enteral'])){
                    $carac_enteral = array_merge($carac_enteral, $dados['carac_enteral']);
                }
                if (isset($dados['carac_enteral_merico'])){
                    $carac_enteral = array_merge($carac_enteral, $dados['carac_enteral_merico']);
                }
                if (isset($dados['carac_enteral_fibras'])){
                    $carac_enteral = array_merge($carac_enteral, $dados['carac_enteral_fibras']);
                }
                $bind[':carac_enteral'] = (($carac_enteral)?json_encode($carac_enteral, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
            }            
        }

        if($dados['via'] == 'Enteral'){
            if(isset($dados['produto_especializado_enteral'])){
                $bind[':produto_especializado'] = $dados['produto_especializado_enteral'];
            }else{
                $bind[':produto_especializado'] = 'N';
            }
        }

        if($dados['via'] == 'Suplemento'){
            if(isset($dados['produto_especializado_oral'])){
                $bind[':produto_especializado'] = $dados['produto_especializado_oral'];
            }else{
                $bind[':produto_especializado'] = 'N';
            }
        }

        if (isset($dados['apres_oral'])){
            $bind[':apres_oral'] = ($dados["via"]=="Suplemento"?json_encode($dados['apres_oral'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
        }

        if (isset($dados['cat_modulo'])){
            $bind[':cat_modulo'] = ($dados["via"]=="Módulo"?json_encode($dados['cat_modulo'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
        }

        $carac_oral = array();
        if ($dados["via"]=="Suplemento"){ 
            if (isset($dados['carac_oral'])){
                $carac_oral = array_merge($carac_oral, $dados['carac_oral']);
            }
            if (isset($dados['carac_oral_fibras'])){
                $carac_oral = array_merge($carac_oral, $dados['carac_oral_fibras']);
            }
            $bind[':carac_oral'] = (($carac_oral)?json_encode($carac_oral, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
        }

        if (isset($_FILES['foto']['error']) and ($_FILES['foto']['error'] == 0)){
            $upfoto = uploadFile(  $_FILES['foto'], 
                                    "/fotos_produtos");
            $bind[':foto'] = "/fotos_produtos/".$upfoto;
        }

        $produto = httpPostAuth("produto_stProduto", array( "token" => $_SESSION['token'], 
        "login" => $_SESSION['login'],
                                                            "dados" => $bind));

        if ($produto){
            foreach ($dados as $key => $val) {
                if ($val <> ""){
                    if(strpos($key, "info_nutri_") !== false){
                        $descricao = str_replace("info_nutri_", "", $key);
                        $descricao = str_replace("_", " ", $descricao);
                        $bind = array(  ':id_usuario' => $bruker->usuario['id_usuario'],
                                        ':id_produto' => $produto,
                                        ':descricao' => $descricao,
                                        ':valor' => $val);
                        $produtos_info_nutri = httpPostAuth("produto_info_nutri", array("token" => $_SESSION['token'],
                        "login" => $_SESSION['login'],
                                                                                        "dados" => $bind));                        
                    }
                    else if(strpos($key, "compo_") !== false){
                        $descricao = str_replace("compo_", "", $key);
                        $descricao = str_replace("_", " ", $descricao);
                        $bind = array(  ':id_usuario' => $bruker->usuario['id_usuario'],
                                        ':id_produto' => $produto,
                                        ':descricao' => $descricao,
                                        ':valor' => $val);
                        $produtos_composicao = httpPostAuth("produto_composicao", array("token" => $_SESSION['token'],
                        "login" => $_SESSION['login'],
                                                                                        "dados" => $bind));   
                    }
                }
            }
        }


        if ($produto){
            $fabricante = httpPostAuth("produto_fabricantes", array("token" => $_SESSION['token'],
            "login" => $_SESSION['login']));  
            return $fabricante;
        }
        else{
            return false;
        }
    }

    function ptProduto($dados) { 
        global $bruker;
        if ($dados["fabricante"] == "null") $dados["fabricante"] = null;
        $bind = array(  ':especialidade' => (isset($dados["especialidade"])?json_encode($dados["especialidade"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':id_usuario' => $bruker->usuario['id_usuario'],
                        ':via' => $dados["via"],
                        ':prioridade' => $dados["prioridade"],
                        ':tipo_proteina' => $dados["tipo_proteina"],
                        ':nome' => $dados["nome"],
                        ':unidmedida' => ($dados["via"]=="Enteral"?null:$dados["unidmedida"]),
                        ':apresentacao' => (isset($dados["apresentacao"])?json_encode($dados["apresentacao"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':volume' => (isset($dados["volume"])?json_encode($dados["volume"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':volume_medida' => (isset($dados["volume_medida"])?json_encode($dados["volume_medida"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':medida' => (isset($dados["medida"])?json_encode($dados["medida"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':unidade' => (isset($dados["unidade"])?json_encode($dados["unidade"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':medida_g' => (isset($dados["medida_g"])?json_encode($dados["medida_g"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':medida_dc' => (isset($dados["medida_dc"])?json_encode($dados["medida_dc"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':diluicao' => (isset($dados["diluicao"])?json_encode($dados["diluicao"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':final' => (isset($dados["final"])?json_encode($dados["final"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null),
                        ':fabricante' => $dados["fabricante"],
                        ':kcal' => $dados["kcal"],
                        ':cho' => $dados["cho"],
                        ':ptn' => $dados["ptn"],
                        ':lip' => $dados["lip"],
                        ':fibras' => $dados["fibras"],
                        ':indicacao' => $dados["indicacao"],
                        ':descricao' => $dados["descricao"],
                        ':sabores' => $dados["sabores"] ,
                        ':preparo' => $dados["preparo"],
                        ':observacoes' => $dados["observacoes"],
                        '_idproduto' => $dados["_idproduto"]);

        if (isset($dados['apres_enteral'])){
            $bind[':apres_enteral'] = ($dados["via"]=="Enteral"?json_encode($dados['apres_enteral'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
        }

        $carac_enteral = array();
        if ($dados["via"]=="Enteral"){
            if (isset($dados['carac_enteral'])){
                $carac_enteral = array_merge($carac_enteral, $dados['carac_enteral']);
            }
            if (isset($dados['carac_enteral_merico'])){
                $carac_enteral = array_merge($carac_enteral, $dados['carac_enteral_merico']);
            }
            if (isset($dados['carac_enteral_fibras'])){
                $carac_enteral = array_merge($carac_enteral, $dados['carac_enteral_fibras']);
            }
            $bind[':carac_enteral'] = (($carac_enteral)?json_encode($carac_enteral, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
        }


        if (isset($dados['apres_oral'])){
            $bind[':apres_oral'] = ($dados["via"]=="Suplemento"?json_encode($dados['apres_oral'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
        }

        if (isset($dados['cat_modulo'])){
            $bind[':cat_modulo'] = ($dados["via"]=="Módulo"?json_encode($dados['cat_modulo'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
        }

        if($dados['via'] == 'Enteral'){
            if(isset($dados['produto_especializado_enteral'])){
                $bind[':produto_especializado'] = $dados['produto_especializado_enteral'];
            }else{
                $bind[':produto_especializado'] = 'N';
            }
        }

        if($dados['via'] == 'Suplemento'){
            if(isset($dados['produto_especializado_oral'])){
                $bind[':produto_especializado'] = $dados['produto_especializado_oral'];
            }else{
                $bind[':produto_especializado'] = 'N';
            }
        }

        $carac_oral = array();
        if ($dados["via"]=="Suplemento"){
            if (isset($dados['carac_oral'])){
                $carac_oral = array_merge($carac_oral, $dados['carac_oral']);
            }
            if (isset($dados['carac_oral_fibras'])){
                $carac_oral = array_merge($carac_oral, $dados['carac_oral_fibras']);
            }
            $bind[':carac_oral'] = (($carac_oral)?json_encode($carac_oral, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE):null);
        }

        $bind[':data_edicao'] = date("Y-m-d H:i:s");

        if (isset($_FILES['foto']['error']) and ($_FILES['foto']['error'] == 0)){
            $upfoto = uploadFile(  $_FILES['foto'], 
                                    "/fotos_produtos");
            $bind[':foto'] = "/fotos_produtos/".$upfoto; 
        }

        $produto = httpPostAuth("produto_ptProduto", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                            "dados" => $bind));

        if ($produto){
            $produtos_comp_info_nutri = httpPostAuth("produto_delinfo_nutri", array("token" => $_SESSION['token'],
            "login" => $_SESSION['login'],
                                                                              "id_produto" => $dados['_idproduto'])); 
            
            foreach ($dados as $key => $val) {
                if ($val <> ""){
                    if(strpos($key, "info_nutri_") !== false){
                        $descricao = str_replace("info_nutri_", "", $key);
                        $descricao = str_replace("_", " ", $descricao);
                        $bind = array(  ':id_usuario' => $bruker->usuario['id_usuario'],
                                        ':id_produto' => $dados['_idproduto'],
                                        ':descricao' => $descricao,
                                        ':valor' => $val);

                        $produtos_info_nutri = httpPostAuth("produto_ptinfo_nutri", array(  "token" => $_SESSION['token'],
                        "login" => $_SESSION['login'],
                                                                                            "dados" => $bind)); 
                    }
                    else if(strpos($key, "compo_") !== false){
                        $descricao = str_replace("compo_", "", $key);
                        $descricao = str_replace("_", " ", $descricao);
                        $bind = array(  ':id_usuario' => $bruker->usuario['id_usuario'],
                                        ':id_produto' => $dados['_idproduto'],
                                        ':descricao' => $descricao,
                                        ':valor' => $val);
                        $produtos_composicao = httpPostAuth("produto_ptcomposicao", array(  "token" => $_SESSION['token'],
                        "login" => $_SESSION['login'],
                                                                                            "dados" => $bind)); 
                    }
                }
            }
        }

        if ($produto){
            $fabricante = httpPostAuth("produto_fabricantes", array("token" => $_SESSION['token'],
            "login" => $_SESSION['login']));  
            return $fabricante;
        }
        else{
            return false;
        }
    }

    function ptDisponivel($id, $disponivel) {
        global $bruker;
        $retorno = httpPostAuth("produto_ptDisponivel", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                "id" => $id,
                                                                "disponivel" => $disponivel));
        return $retorno;
    }

    function rmProduto($id) {
        global $bruker;
        $retorno = httpPostAuth("produto_rmProduto", array( "token" => $_SESSION['token'],
        "login" => $_SESSION['login'],
                                                                "id" => $id));
        return $retorno;
    }

}