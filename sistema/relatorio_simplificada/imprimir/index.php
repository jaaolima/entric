<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
set_time_limit(0);

function Redirect($url, $permanent = false){
    if (headers_sent() === false){
        header('Location: https://entric.com.br/', true, ($permanent === true) ? 301 : 302);
    }else{
        echo '<script type="text/javascript">window.location.href = "https://entric.com.br/";</script>';
    }
    exit();
}
function get_extensao_file($nome){
    $verifica = explode('.', $nome);
    return $verifica[count($verifica) - 1];
}
if (!isset($_GET['url'])) Redirect(BASE_PATH);
$url = $_GET['url'];
?>
<style>
    html, body{
        margin: 0px;
        padding: 0px;
    }
</style>
<iframe src="https://entric.com.br/relatorio_simplificada/<?php echo $url;?>" id="relatorio" style="margin: 0px; padding: 0px; border: 0px; width: 100%; height: 100%;"></iframe>
<?php
/*
<script>
function printIframe(id) {
    var iframe = document.frames ? document.frames[id] : document.getElementById(id);
    var ifWin = iframe.contentWindow || iframe;
    iframe.focus();
    ifWin.print();
    return false;
}
printIframe('relatorio');
</script>
*/
?>