<pre>
<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
ini_set('date.timezone', 'America/Sao_Paulo' );
date_default_timezone_set('America/Sao_Paulo');
set_time_limit(0);
require __DIR__ . '/../app/config/conf6ion.php';
require __DIR__ . '/libs/database.class.php';
require __DIR__ . '/../app/libs/common.php';

$emails = $db->select_to_array("interacoes", "*", "WHERE tipo='email' AND status=0 ORDER BY id ASC", null);
if ($emails){
    for ($i = 0; $i < count($emails); $i++) {
        $dados = json_decode($emails[$i]['conteudo'], true);

        $email = $emails[$i]['email'];
        $assunto = $emails[$i]['assunto'];
        $params = $dados;
        $template = $emails[$i]['template'];
        $enviar = sendEmailToTemplate(  $email,
                                        $assunto,
                                        $params,
                                        $template.".html");

        $delete = $db->delete("interacoes", "WHERE id=:id", array(':id' => $emails[$i]['id']));
    }
}
