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
        @header('Content-Type: application/json');
        echo '[{"id":"1","descricao":"Produto 01","detalhes":"111ml","especificacao":"999"}, {"id":"3","descricao":"Produto 02","detalhes":"111ml","especificacao":"999"}]';
    }

    function afterAction() {

    }
 
}