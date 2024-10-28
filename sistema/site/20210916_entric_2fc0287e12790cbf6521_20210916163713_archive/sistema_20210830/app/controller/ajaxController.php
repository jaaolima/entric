<?php
 
class AjaxController extends Controller {

    function beforeAction () {

    }  

    function index() {
    }

    function buscar_paciente() {        
        echo json_encode($this->AjaxModel->getPacientes($_POST), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
    }

    function afterAction() {

    }
 
}