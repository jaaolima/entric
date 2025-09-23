<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
date_default_timezone_set('America/Sao_Paulo');

require_once '../src/config/config.php';
require_once '../src/config/database.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    parse_str(file_get_contents('php://input'), $data);
    $db = null;

    try {
        $db = new Database();

        if($data['id_admissao_en'] == null || !isset($data['id_admissao_en'])){
            throw new Exception("Parâmetros inválidos");
        }else{
            $id_paciente = $data['id_admissao_en'];
        }

        $dados = [];
        $pacientes_encontrados = [];
        $relatorios_encontrados = [];

        // Tabelas de pacientes e relatórios
        $tabelas_pacientes = ['pacientes_simplificada', 'pacientes_suplemento', 'pacientes_modulo'];

        // Busca em todas as tabelas de pacientes
        foreach ($tabelas_pacientes as $tabela) {
            $paciente = $db->select_to_array($tabela, "*", "WHERE id_paciente=:id", [':id' => $id_paciente]);
            if ($paciente) {
                $pacientes_encontrados = array_merge($pacientes_encontrados, $paciente);
                // if($tabelas_pacientes == "pacientes"){
                //     $relatorio = $db->select_to_array("relatorios", "*", "WHERE id_paciente=:id_paciente", [':id_paciente' => $paciente['id']]);
                // }
                if($tabelas_pacientes == "pacientes_simplificada"){
                    $relatorio = $db->select_to_array("relatorios_simplificada", "*", "WHERE id_paciente=:id_paciente", [':id_paciente' => $paciente['id']]);
                }
                else if($tabelas_pacientes == "pacientes_suplemento"){
                    $relatorio = $db->select_to_array("relatorios_suplemento", "*", "WHERE id_paciente=:id_paciente", [':id_paciente' => $paciente['id']]);
                }
                else if($tabelas_pacientes == "pacientes_modulo"){
                    $relatorio = $db->select_to_array("relatorios_modulo", "*", "WHERE id_paciente=:id_paciente", [':id_paciente' => $paciente['id']]);
                }
                if ($relatorio) {
                    $relatorios_encontrados = array_merge($relatorios_encontrados, $relatorio);
                }
            }
        }

        if (empty($pacientes_encontrados) && empty($relatorios_encontrados)) {
            json_response(['message' => 'Paciente não encontrado', 'data' => []], 404);
        }

        $dados['paciente_entric'] = $pacientes_encontrados;
        $dados['relatorio_entric'] = $relatorios_encontrados;

        json_response(['data' => $dados]);

    } catch (Exception $exception) {
        json_response([
            'message' => 'ERRO: ' . $exception->getMessage(),
            'data' => []
        ], 500);
    } finally {
        if ($db) {
            $db = null;
        }
    }
} else {
    json_response([
        'message' => 'Método não permitido. Apenas POST é aceito.',
        'data' => []
    ], 405);
}

function json_response($data, $status = 200) {
    http_response_code($status);
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit();
}