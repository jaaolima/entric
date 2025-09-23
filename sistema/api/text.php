<?php

require _DIR_ . '/../../../vendor/autoload.php';

$EN = new Gerencial();
$ExameGeral = new ExameGeral();
$ExameNutrologia = new ExameNutrologia();
$Antropometria = new Antropometria();
$Atendimento = new Atendimento();
$Bioimpedancia = new Bioimpedancia();
$Dinamometria = new Dinamometria();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    parse_str(file_get_contents('php://input'), $data);

    try {

        if($data['id_paciente'] == null || !isset($data['id_paciente'])){
            throw new Exception("Parâmetros inválidos");
        }else{
            $id_paciente = $data['id_paciente'];
        }
    
        $dados = [];

        $dados['en']                    = $EN->buscarDadosEN($id_paciente);
        $dados['exame_geral']           = $ExameGeral->buscarExamesPaciente($id_paciente);
        $dados['exame_nutrologia']      = $ExameNutrologia->buscarExamesPaciente($id_paciente);
        $dados['antropometria']         = $Antropometria->buscarAntropometriaPaciente($id_paciente);
        $dados['exame_complementar']    = $Atendimento->buscarDadosExameComplementar($id_paciente);
        $dados['ambulatorio']           = $Atendimento->buscarDadosAmbulatorio($id_paciente);
        $dados['bioimpedancia']         = $Bioimpedancia->BuscarBioimpedanciaPaciente($id_paciente);
        $dados['dinamometria']          = $Dinamometria->BuscarDinamometriaPaciente($id_paciente);
        
        echo json_encode([
            'data' => [$dados]
        ]);
    } catch (Exception $exception) {
        echo json_encode([
            'message' => 'ERRO: ' . $exception->getMessage(),
            'data' => []
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        http_response_code(500);
    }
} else {
    echo json_encode([
        'message' => 'Método não permitido. Apenas POST é aceito.',
        'data' => []
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    http_response_code(405);
}

function json_response($data, $status = 200) {
    http_response_code($status);
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit();
}