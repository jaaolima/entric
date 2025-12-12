<?php 

require __DIR__ . '/libs/conf6ion.php';
require __DIR__ . '/libs/common.php';
require __DIR__ . '/libs/database.class.php';

$db = new Database();

// $id_relatorio = isset($_GET['id']) ? endecrypt('decrypt', $_GET['id'])  : '';

// $tipo_relatorio = isset($_GET['tipo_relatorio']) ? $_GET['tipo_relatorio'] : '';

$retorno = $db->insert("log_qrcode", [':dt_log' => date("Y-m-d H:i:s")]);


// Redirecionar para o WhatsApp do número especificado com mensagem pré-preenchida
$whatsapp_number = '5561996533565';
$wa_url = 'https://wa.me/' . $whatsapp_number;
Redirect($wa_url);


?>