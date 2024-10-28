<?php
 
class AjaxController extends Controller {

    function beforeAction () {

    }  

    function index() {
    }

    function buscar_paciente() {        
        echo json_encode($this->AjaxModel->getPacientes($_POST), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
    }


    function busca_formula() {
        @header('Content-Type: application/json');
        echo '[{"id":"1","descricao":"Formula 01","detalhes":"111ml","especificacao":"999"}, {"id":"3","descricao":"Formula 02","detalhes":"111ml","especificacao":"999"}]';
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
                    echo json_encode(array('message'=>'Produto cadastrado com sucesso.'));
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
                    echo json_encode(array('message'=>'Produto editado com sucesso.'));
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

    function afterAction() {

    }
 
}