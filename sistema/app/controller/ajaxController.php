<?php
 
class AjaxController extends Controller {

    function beforeAction () {

    }  

    function index() {
    }

    function gt_dash_acesso() { 
        @header('Content-Type: application/json; charset=utf-8;');
        $dashboard = new DashboardModel();
        $dashboard = $dashboard->getDadosSite($_POST['data_fim_acesso'], $_POST['data_inicio_acesso']);
        echo json_encode($dashboard);
    }

    function gt_dash_videos() {
        @header('Content-Type: application/json; charset=utf-8;');
        $dashboard = new DashboardModel();
        $dashboard = $dashboard->getDadosVideos($_POST['data_fim_videos'], $_POST['data_inicio_videos']);
        echo json_encode($dashboard);
    }

    function gt_dash_relatorios() {
        @header('Content-Type: application/json; charset=utf-8;');
        $dashboard = new DashboardModel();
        $dashboard = $dashboard->getDadosRelatorios($_POST['uf'], $_POST['data_fim_relatorios'], $_POST['data_inicio_relatorios'], $_POST['tipo']);
        echo json_encode($dashboard);
    }

    function dtb_patrocinador($arquivo = null) {
        @header('Content-Type: application/json; charset=utf-8;');

        $urlArr = parse_url($_SERVER['REQUEST_URI']);
        parse_str($urlArr['query'], $output);   

        $dados = $this->AjaxModel->getPatrocinador($output);
        echo $dados;
    }

    function dtb_administrador($arquivo = null) {
        @header('Content-Type: application/json; charset=utf-8;');

        $urlArr = parse_url($_SERVER['REQUEST_URI']);
        parse_str($urlArr['query'], $output);   

        $dados = $this->AjaxModel->getAdministrador($output);
        echo $dados;
    }

    function dtb_prescritor($arquivo = null) {
        @header('Content-Type: application/json; charset=utf-8;');

        $urlArr = parse_url($_SERVER['REQUEST_URI']);
        parse_str($urlArr['query'], $output);   

        $dados = $this->AjaxModel->getPrescritor($output);
        echo $dados;
    }

    function cad_admin_abrir() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"")){
            $dados = $this->AjaxModel->gt_admin($_POST['id']);
            echo json_encode($dados);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function cad_patroc_abrir() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"")){
            $dados = $this->AjaxModel->gt_patroc($_POST['id']);
            echo json_encode($dados);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function cad_prescritor_abrir() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"")){
            $dados = $this->AjaxModel->gt_prescritores($_POST['id']);
            echo json_encode($dados);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function uploads($dir = null, $arquivo = null) {
        global $bruker;        
        $suffix = "";
        if (substr( $dir, 0, 6 ) === "videos"){
            $suffix = $dir;
            $dir = "videos";
        }
        $options = array(
            'upload_dir' => BASE_URI.'/'.$dir.'/',
            'upload_url' => BASE_PATH.'/arquivos/'.$dir.'/',
            'dir' => $dir
        );
        $upload_handler = new UploadHandler($options);  
    }

    function distribuidores() {
        echo json_encode($this->AjaxModel->getDistribuidores($_POST), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
    }

    function relatorio_salvar() {
        if (isset($_POST['tab'])){
            if ($_POST['tab'] == "gerar_relatorio") $_POST['action'] = "gerar_relatorio";
        }

        if (isset($_POST['action'])){
            switch ($_POST['action']) {
                case 'historia':
                    $historia = $this->AjaxModel->stHistoria($_POST);
                    echo json_encode($historia);
                break;
                case 'avaliacao':
                    $avaliacao = $this->AjaxModel->stAvaliacao($_POST);
                    echo json_encode($avaliacao);
                break;
                case 'necessidades':
                    $necessidades = $this->AjaxModel->stNecessidades($_POST);
                    echo json_encode($necessidades);
                break;
                case 'calculo':
                    $calculo = $this->AjaxModel->stCalculo($_POST);
                    echo json_encode($calculo);
                break;
                case 'observacoes':
                    $observacoes = $this->AjaxModel->stObservacoes($_POST);
                    echo json_encode($observacoes);
                break;
                case 'distribuidores':
                    $distribuidores = $this->AjaxModel->stDistribuidores($_POST);
                    echo json_encode($distribuidores);
                break;
                case 'relatorio':
                    $relatorio = $this->AjaxModel->stRelatorio($_POST);
                    echo json_encode($relatorio);
                break;
                case 'gerar_relatorio':
                    $relatorio = $this->AjaxModel->stRelatorio($_POST, true);
                    echo json_encode($relatorio);
                break;
                default:
                    echo json_encode(array('error'=>array('message'=>'Erro ao executar função1.')));
            }
        }
        else{
            echo json_encode(array('error'=>array('message'=>'Erro ao executar função2.')));
        }
    }
    function relatorio_excluir() {
        $relatorio = $this->AjaxModel->rmRelatorio($_POST);
        echo json_encode($relatorio);
    }

    function relatorio_excluir_simplificada() {
        $relatorio = $this->AjaxModel->rmRelatorioSimplificada($_POST);
        echo json_encode($relatorio);
    }

    function relatorio_excluir_suplemento() {
        $relatorio = $this->AjaxModel->rmRelatorioSuplemento($_POST);
        echo json_encode($relatorio);
    }

    function relatorio_excluir_modulo() {
        $relatorio = $this->AjaxModel->rmRelatorioModulo($_POST);
        echo json_encode($relatorio);
    }

    function relatorio_salvar_simplificada() {
        if (isset($_POST['tab'])){
            if ($_POST['tab'] == "gerar_relatorio") $_POST['action'] = "gerar_relatorio";
        }

        if (isset($_POST['action'])){
            switch ($_POST['action']) {
                case 'calculo':
                    $calculo = $this->AjaxModel->stCalculoSimplificada($_POST);
                    echo json_encode($calculo);
                break;
                case 'distribuidores':
                    $distribuidores = $this->AjaxModel->stDistribuidoresSimplificada($_POST);
                    echo json_encode($distribuidores);
                break;
                case 'relatorio':
                    $relatorio = $this->AjaxModel->stRelatorioSimplificada($_POST);
                    echo json_encode($relatorio);
                break;
                case 'gerar_relatorio':
                    $relatorio = $this->AjaxModel->stRelatorioSimplificada($_POST, true);
                    echo json_encode($relatorio);
                break;
                default:
                    echo json_encode(array('error'=>array('message'=>'Erro ao executar função1.')));
            }
        }
        else{
            echo json_encode(array('error'=>array('message'=>'Erro ao executar função2.')));
        }
    }

    function relatorio_salvar_suplemento() {
        if (isset($_POST['tab'])){
            if ($_POST['tab'] == "gerar_relatorio") $_POST['action'] = "gerar_relatorio";
        }

        if (isset($_POST['action'])){
            switch ($_POST['action']) {
                case 'calculo':
                    $calculo = $this->AjaxModel->stCalculoSuplemento($_POST);
                    echo json_encode($calculo);
                break;
                case 'distribuidores':
                    $distribuidores = $this->AjaxModel->stDistribuidoresSuplemento($_POST);
                    echo json_encode($distribuidores);
                break;
                case 'relatorio':
                    $relatorio = $this->AjaxModel->stRelatorioSuplemento($_POST);
                    echo json_encode($relatorio);
                break;
                case 'gerar_relatorio':
                    $relatorio = $this->AjaxModel->stRelatorioSuplemento($_POST, true);
                    echo json_encode($relatorio);
                break;
                default:
                    echo json_encode(array('error'=>array('message'=>'Erro ao executar função1.')));
            }
        }
        else{
            echo json_encode(array('error'=>array('message'=>'Erro ao executar função2.')));
        }
    }

    function relatorio_salvar_modulo() {
        if (isset($_POST['tab'])){
            if ($_POST['tab'] == "gerar_relatorio") $_POST['action'] = "gerar_relatorio";
        }

        if (isset($_POST['action'])){
            switch ($_POST['action']) {
                case 'calculo':
                    $calculo = $this->AjaxModel->stCalculoModulo($_POST);
                    echo json_encode($calculo);
                break;
                case 'distribuidores':
                    $distribuidores = $this->AjaxModel->stDistribuidoresModulo($_POST);
                    echo json_encode($distribuidores);
                break;
                case 'relatorio':
                    $relatorio = $this->AjaxModel->stRelatorioModulo($_POST);
                    echo json_encode($relatorio);
                break;
                case 'gerar_relatorio':
                    $relatorio = $this->AjaxModel->stRelatorioModulo($_POST, true);
                    echo json_encode($relatorio);
                break;
                default:
                    echo json_encode(array('error'=>array('message'=>'Erro ao executar função1.')));
            }
        }
        else{
            echo json_encode(array('error'=>array('message'=>'Erro ao executar função2.')));
        }
    }

    function relatorio_disponivel() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"") and isset($_POST['disponivel']) and (trim($_POST['disponivel'])<>"")){            
            $produto = new ProdutoModel();
            $verifica = $produto->ptDisponivel($_POST['id'],$_POST['disponivel']);
            echo json_encode($verifica);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function relatorio_enviar_email() {
        if (isset($_POST['id_paciente']) and (trim($_POST['id_relatorio'])<>"") and isset($_POST['email_paciente'])){            
            $dados = $this->AjaxModel->EnviarEmailPaciente($_POST);
            echo $dados;
        }
    }

    function relatorio_abrir() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"")){            
            $dados = $this->AjaxModel->gtRelatorio($_POST['id']);
            echo json_encode($dados);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function relatorio_abrir_simplificada() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"")){            
            $dados = $this->AjaxModel->gtRelatorioSimplificada($_POST['id']);
            echo json_encode($dados);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function relatorio_abrir_suplemento() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"")){            
            $dados = $this->AjaxModel->gtRelatorioSuplemento($_POST['id']);
            echo json_encode($dados);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function relatorio_abrir_modulo() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"")){            
            $dados = $this->AjaxModel->gtRelatorioModulo($_POST['id']);
            echo json_encode($dados);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function buscar_paciente() {
        echo json_encode($this->AjaxModel->getPacientes($_POST), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
    }

    function buscar_paciente_simplificada() {
        echo json_encode($this->AjaxModel->getPacientesSimplificada($_POST), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
    }

    function buscar_paciente_suplemento() {
        echo json_encode($this->AjaxModel->getPacientesSuplemento($_POST), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
    }

    function buscar_paciente_modulo() {
        echo json_encode($this->AjaxModel->getPacientesModulo($_POST), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
    }

    function atualizar_paciente(){
        $paciente = $this->AjaxModel->ptPaciente($_POST);            
        echo json_encode($paciente);
    }

    function atualizar_paciente_simplificada(){
        $paciente = $this->AjaxModel->ptPacienteSimplificada($_POST);            
        echo json_encode($paciente);
    }

    function atualizar_paciente_suplemento(){
        $paciente = $this->AjaxModel->ptPacienteSuplemento($_POST);            
        echo json_encode($paciente);
    }

    function atualizar_paciente_modulo(){
        $paciente = $this->AjaxModel->ptPacienteModulo($_POST);            
        echo json_encode($paciente);
    }

    function cadastrar_paciente(){
        $paciente = $this->AjaxModel->stPaciente($_POST);            
        echo json_encode($paciente);
    } 

    function cadastrar_paciente_simplificada(){
        $paciente = $this->AjaxModel->stPacienteSimplificada($_POST);            
        echo json_encode($paciente);
    } 

    function cadastrar_paciente_suplemento(){ 
        $paciente = $this->AjaxModel->stPacienteSuplemento($_POST);            
        echo json_encode($paciente);
    } 

    function cadastrar_paciente_modulo(){ 
        $paciente = $this->AjaxModel->stPacienteModulo($_POST);            
        echo json_encode($paciente);
    } 

    function busca_formula() {
        @header('Content-Type: application/json');
        echo '[{"id":"1","descricao":"Formula 01","detalhes":"111ml","especificacao":"999"}, {"id":"3","descricao":"Formula 02","detalhes":"111ml","especificacao":"999"}]';
    }

    function busca_produto_filtros() {
        if (isset($_POST['via']) and (trim($_POST['via'])<>"")){            
            $produto = new ProdutoModel();
            $produtos = $produto->gtProdutoFiltros($_POST);            
            echo json_encode($produtos);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function busca_produto_relatorio() {
        //if (isset($_POST['calculo_apres_aberto_po']) and (trim($_POST['calculo_apres_aberto_po'])<>"")){            
            $produto = new ProdutoModel();
            $produtos = $produto->gtProdutoRelatorio($_POST);
            echo $produtos; //echo json_encode($produtos);
        //}else{            
            //echo ""; //echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        //}
    }

    function busca_produto_relatorio_simplificada() {
        //if (isset($_POST['calculo_apres_aberto_po']) and (trim($_POST['calculo_apres_aberto_po'])<>"")){            
            $produto = new ProdutoModel();
            $produtos = $produto->gtProdutoRelatorioSimplificada($_POST);
            echo $produtos; //echo json_encode($produtos);
        //}else{            
            //echo ""; //echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        //}
    }

    function busca_produto_relatorio_suplemento() {
        //if (isset($_POST['calculo_apres_aberto_po']) and (trim($_POST['calculo_apres_aberto_po'])<>"")){            
            $produto = new ProdutoModel();
            $produtos = $produto->gtProdutoRelatorioSuplemento($_POST);
            echo $produtos; //echo json_encode($produtos);
        //}else{            
            //echo ""; //echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        //}
    }

    function busca_produto_relatorio_modulo() {
        //if (isset($_POST['calculo_apres_aberto_po']) and (trim($_POST['calculo_apres_aberto_po'])<>"")){            
            $produto = new ProdutoModel();
            $produtos = $produto->gtProdutoRelatorioModulo($_POST);
            echo $produtos; //echo json_encode($produtos);
        //}else{            
            //echo ""; //echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        //}
    }

    function busca_produto() {
        $retorno = array();
        $parameters = explode('?', $_SERVER['REQUEST_URI'], 2);
        if (isset($parameters[1])){
            parse_str($parameters[1], $parameters);
            if (isset($parameters['q'])){

                $produto = new ProdutoModel();
                $produtos = $produto->gtProdutos(chktext($parameters['q']));
                $retorno = $produtos;
            }
        }
        echo json_encode($retorno);
    }

    function produto_abrir() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"")){            
            $produto = new ProdutoModel();
            $verifica = $produto->gtProduto($_POST['id']);
            echo json_encode($verifica);

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function produto_salvar() { 
        if (isset($_POST['nome']) and (trim($_POST['nome'])<>"")){
            
            $produto = new ProdutoModel();
            $verifica = $produto->chkProduto($_POST);

            if (!$verifica){
                $cadastrar = $produto->stProduto($_POST);
                if ($cadastrar){
                    echo json_encode(array('message'=>'Produto cadastrado com sucesso.', 'fabricantes'=>$cadastrar['fabricantes']));
                }
                else{
                    echo json_encode(array('error'=>array('message'=>'Erro ao cadastrar produto.')));
                }
            }
            else{
                echo json_encode(array('error'=>array('message'=>'Já existe produto com este nome.')));
            }


        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function produto_editar() { 
        if (isset($_POST['nome']) and (trim($_POST['nome'])<>"")){
            $produto = new ProdutoModel();
            if ($_POST['_idproduto'] <> ""){                
                
                $editar = $produto->ptProduto($_POST);
                if ($editar){
                    echo json_encode(array('message'=>'Produto editado com sucesso.', 'fabricantes'=>$editar['fabricantes']));
                }
                else{
                    echo json_encode(array('error'=>array('message'=>'Erro ao editar produto.')));
                }

            }else{
                echo json_encode(array('error'=>array('message'=>'Por favor, pesquise pelo produto antes de edita-lo.')));
            }

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function produto_excluir() {
        if (isset($_POST['_idproduto']) and (trim($_POST['_idproduto'])<>"")){
            $produto = new ProdutoModel();
            if ($_POST['_idproduto'] <> ""){                
                
                $excluir = $produto->rmProduto($_POST['_idproduto']);
                if ($excluir){
                    echo json_encode(array('message'=>'Produto excluído com sucesso.'));
                }
                else{
                    echo json_encode(array('error'=>array('message'=>'Erro ao excluir produto.')));
                }

            }else{
                echo json_encode(array('error'=>array('message'=>'Por favor, pesquise pelo produto antes de excluí-lo.')));
            }

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function excluir_cadastro_prescritor() {
        if (isset($_POST['id']) and (trim($_POST['id'])<>"")){
            if ($_POST['id'] <> ""){                
                
                $excluir = $this->AjaxModel->excluir_prescritor($_POST['id']);
                if ($excluir){
                    echo json_encode(array('message'=>'Prescritor excluído com sucesso.'));
                }
                else{
                    echo json_encode(array('error'=>array('message'=>'Erro ao excluir Prescritor.')));
                }

            }else{
                echo json_encode(array('error'=>array('message'=>'Por favor, pesquise pelo Prescritor antes de excluí-lo.')));
            }

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function gt_endereco_distribuidor() {
        $dados = $this->AjaxModel->gt_endereco_distribuidor($_POST['id']);
        echo $dados;
    }

    function gt_fabricantes() {
        @header('Content-Type: application/json; charset=utf-8;');
        $urlArr = parse_url($_SERVER['REQUEST_URI']);
        parse_str($urlArr['query'], $output);

        $dados = $this->AjaxModel->gt_fabricantes($output);
        echo $dados;
    }

    function fabricantes_editar() {
        if (isset($_POST['fabricante']) and (trim($_POST['fabricante'])<>"") and isset($_POST['fabricante2']) and (trim($_POST['fabricante2'])<>"")){
            
            $dados = $this->AjaxModel->fabricantes_editar($_POST);
            echo json_encode(array('message'=>'Dados editados com sucesso.', 'rm'=>$dados['rm'], 'fabricantes'=>$dados['fabricantes']));

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function fabricantes_cadastrar() {
        if (isset($_POST['fabricante']) and (trim($_POST['fabricante'])<>"")){
            
            $dados = $this->AjaxModel->fabricantes_cadastrar($_POST);
            echo json_encode(array('message'=>'Dados cadastrado com sucesso.', 'rm'=>$dados['rm'], 'fabricantes'=>$dados['fabricantes']));

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function busca_fabricantes() {
        $retorno = $this->AjaxModel->getFabricantes();
        echo json_encode($retorno);
    }

    function video() {
        $retorno = $this->AjaxModel->VerVideo($_POST['video']);
        echo json_encode($retorno);
    }

    function remover_video() {
        $retorno = $this->AjaxModel->rmVideo($_POST['id']);
        echo json_encode($retorno);
    }

    function remover_distribuidor() {
        $retorno = $this->AjaxModel->rmDistribuidor($_POST['id']);
        echo json_encode($retorno);
    }

    function remover_fabricantes() {
        $remover = $this->AjaxModel->rmFabricante($_POST['fabricante']);
        $retorno = $this->AjaxModel->getFabricantes();
        echo json_encode($retorno);
    }

    function busca_unidades() {
        $retorno = $this->AjaxModel->getUnidades();
        echo json_encode($retorno);
    }

    function unidades_cadastrar() {
        if (isset($_POST['unidade']) and (trim($_POST['unidade'])<>"")){
            
            $dados = $this->AjaxModel->unidades_cadastrar($_POST);
            echo json_encode(array('message'=>'Dados cadastrado com sucesso.', 'rm'=>$dados['rm'], 'unidades'=>$dados['unidades']));

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function unidades_editar() {
        if (isset($_POST['unidade']) and (trim($_POST['unidade'])<>"") and isset($_POST['unidade2']) and (trim($_POST['unidade2'])<>"")){
            
            $dados = $this->AjaxModel->unidades_editar($_POST);
            echo json_encode(array('message'=>'Dados editados com sucesso.', 'rm'=>$dados['rm'], 'unidades'=>$dados['unidades']));

        }else{
            echo json_encode(array('error'=>array('message'=>'Informe os dados corretamente.')));
        }
    }

    function remover_unidades() {
        $remover = $this->AjaxModel->rmUnidade($_POST['unidade']);
        $retorno = $this->AjaxModel->getUnidades();
        echo json_encode($retorno);
    }

    function fracionamento_salvar() {
        $fracionamento = $this->AjaxModel->stFracionamento($_POST);
        echo json_encode($fracionamento);
    }

    function fracionamento_salvar_simplificada() {
        $fracionamento = $this->AjaxModel->stFracionamentoSimplificada($_POST);
        echo json_encode($fracionamento);
    }

    function fracionamento_salvar_suplemento() {
        $fracionamento = $this->AjaxModel->stFracionamentoSuplemento($_POST);
        echo json_encode($fracionamento);
    }

    function fracionamento_salvar_modulo() {
        $fracionamento = $this->AjaxModel->stFracionamentoModulo($_POST);
        echo json_encode($fracionamento);
    }

    function selecao_salvar() {
        $selecao = $this->AjaxModel->stSelecao($_POST);
        echo json_encode($selecao);
    }

    function selecao_salvar_simplificada() {
        $selecao = $this->AjaxModel->stSelecaoSimplificada($_POST);
        echo json_encode($selecao);
    }

    function selecao_salvar_suplemento() {
        $selecao = $this->AjaxModel->stSelecaoSuplemento($_POST);
        echo json_encode($selecao);
    }

    function selecao_salvar_modulo() {
        $selecao = $this->AjaxModel->stSelecaoModulo($_POST);
        echo json_encode($selecao);
    }


    function afterAction() {

    }
 
}