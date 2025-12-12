<?php
/**
 * Gera QR Code com link e ID do relatório
 * Uso: qrcode.php?id=<relatorio_id>&link=<url_base>
 */

require __DIR__ . '/libs/conf6ion.php';
require __DIR__ . '/libs/common.php';
require __DIR__ . '/libs/database.class.php';

// Validar parâmetros
if (!isset($_GET['id']) || !isset($_GET['link'])) {
    http_response_code(400);
    die('Parâmetros obrigatórios: id, link');
}

$relatorio_id = $_GET['id'];
$link = $_GET['link'];

// Validar ID do relatório na base de dados
$relatorio = $db->select_single_to_array("relatorios", "id", "WHERE id=:id", array(":id" => $relatorio_id));
if (!$relatorio) {
    http_response_code(404);
    die('Relatório não encontrado');
}

// Montar URL completa para o QR code
$url_qrcode = $link . '?id=' . endecrypt("encrypt", $relatorio_id) . '&tipo_relatorio=' . $_GET['tipo_relatorio'];

// Verificar se a biblioteca endroid/qr-code está disponível
if (file_exists(__DIR__ . '/../api/vendor/autoload.php')) {
    require __DIR__ . '/../api/vendor/autoload.php';
    
    try {
        // Usar biblioteca endroid/qr-code
        $qrCode = new \Endroid\QrCode\QrCode($url_qrcode);
        $qrCode->setSize(300);
        $qrCode->setMargin(10);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(new \Endroid\QrCode\ErrorCorrectionLevel('H'));
        $qrCode->setRoundBlockSizeMode(new \Endroid\QrCode\RoundBlockSizeMode('margin'));
        
        header('Content-Type: image/png');
        echo $qrCode->writeString();
    } catch (Exception $e) {
        http_response_code(500);
        die('Erro ao gerar QR code: ' . $e->getMessage());
    }
} else {
    // Fallback: usar serviço online se biblioteca não estiver disponível
    header('Location: https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($url_qrcode));
}
?>
