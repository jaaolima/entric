<?php
if (!function_exists("bcmul")) {
    function bcmul($_ro, $_lo, $_scale=0) {
        return round($_ro*$_lo, $_scale);
    }
}
  
if (!function_exists("bcdiv")) {
    function bcdiv($_ro, $_lo, $_scale=0) {
        return round($_ro/$_lo, $_scale);
    }
}
  
if (!function_exists("bcadd")) {
    function bcadd($_ro, $_lo, $_scale=0) {
        return round($_ro+$_lo, $_scale);
    }
}
  
if (!function_exists("bcsub")) {
    function bcsub($_ro, $_lo, $_scale=0) {
        return round($_ro-$_lo, $_scale);
    }
}

function hoursToMinutes($hours) 
{ 
    if (trim($hours) <> ""){
        $minutes = 0; 
        if (strpos($hours, ':') !== false) 
        { 
            // Split hours and minutes. 
            list($hours, $minutes) = explode(':', $hours); 
        } 
        return $hours * 60 + $minutes; 
    }
    else{
        return 0;
    }
} 

function array_json($dados, $shift=true){
    //if ($shift) array_shift($dados);
    if (!empty($dados)) {
        return json_encode($dados);
    }
    else{
        return null;
    }    
}

function round_up($valor, $rounded = 1){
    if ($valor > 0){
        $final = 0;
        do {
            $final = $final + $rounded;
        } while ($valor > $final);
        return $final;
        
    }else{
        return $valor;
    }
}

function _pres_status($opid = -1) {
    $arr = array();
    $arr["0"] = "Liberado";
    $arr["1"] = "Aguardando Liberação";
    $arr["2"] = "Inativo";
    $arr["3"] = "Bloqueado";
    if ($opid == -1) return $arr; else return $arr[$opid];
}

function _admin_status($opid = -1) {
    $arr = array();
    $arr["0"] = "Ativo";
    $arr["1"] = "Inativo";
    $arr["2"] = "Removido";
    if ($opid == -1) return $arr; else return $arr[$opid];
}

function _patro_status($opid = -1) {
    $arr = array();
    $arr["0"] = "Ativo";
    $arr["1"] = "Inativo";
    $arr["2"] = "Removido";
    if ($opid == -1) return $arr; else return $arr[$opid];
} 

function strip_word_html($text, $allowed_tags = '<b><i><sup><sub><em><strong><ol><ul><li><p><u><br>'){
    mb_regex_encoding('UTF-8');
    $search = array('/&lsquo;/u', '/&rsquo;/u', '/&ldquo;/u', '/&rdquo;/u', '/&mdash;/u');
    $replace = array('\'', '\'', '"', '"', '-');
    $text = preg_replace($search, $replace, $text);
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    if(mb_stripos($text, '/*') !== FALSE){
        $text = mb_eregi_replace('#/\*.*?\*/#s', '', $text, 'm');
    }
    $text = preg_replace(array('/<([0-9]+)/'), array('< $1'), $text);
    $text = strip_tags($text, $allowed_tags);
    $text = preg_replace(array('/^\s\s+/', '/\s\s+$/', '/\s\s+/u'), array('', '', ' '), $text);
    $search = array('#<(strong|b)[^>]*>(.*?)</(strong|b)>#isu', '#<(em|i)[^>]*>(.*?)</(em|i)>#isu', '#<u[^>]*>(.*?)</u>#isu');
    $replace = array('<b>$2</b>', '<i>$2</i>', '<u>$1</u>');
    $text = preg_replace($search, $replace, $text);
    $num_matches = preg_match_all("/\<!--/u", $text, $matches);
    if($num_matches){
        $text = preg_replace('/\<!--(.)*--\>/isu', '', $text);
    }
    return $text;
}

function httpGet($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:54.0) Gecko/20100101 Firefox/54.0");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    if($result === false){
        echo 'Curl error: ' . curl_error($ch);
    }
    curl_close($ch);
    $obj = json_decode($result, true);
    return $obj;
}

function httpGetAuth($resource, $post = null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, BASE_API.$resource);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded',
        'Cache-Control: no-cache',
        'Authorization: Bearer '.$post['token']
    ));

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    $result = curl_exec($ch);
    //print_r($result);
    if($result === false){
        return false;
    }
    curl_close($ch);
    $obj = json_decode($result, true);
    return $obj;
}

function httpPost($resource, $post = null){
    $ch = curl_init();
    // echo BASE_API.$resource;
    curl_setopt($ch, CURLOPT_URL, BASE_API.$resource);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded',
        'Cache-Control: no-cache'
    ));
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    $post = http_build_query($post);    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $result = curl_exec($ch);
    // print_r($result);
    if($result === false){
        return false;
    }
    curl_close($ch);
    $obj = json_decode($result, true); 
    return $obj;
}

function httpPostAuth($resource, $post = null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, BASE_API.$resource);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded',
        'Cache-Control: no-cache',
        'Authorization: Bearer '.$post['token']
    ));
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    $post = http_build_query($post);    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $result = curl_exec($ch);
    print_r($result);
    if($result === false){
        return false;
    }
    curl_close($ch);
    $obj = json_decode($result, true);
    return $obj;
}

function httpPutAuth($resource, $post = null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, BASE_API.$resource);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded',
        'Cache-Control: no-cache',
        'Authorization: Bearer '.$post['token']
    ));
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    $post = http_build_query($post);    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $result = curl_exec($ch);
    print_r($result);
    if($result === false){
        return false;
    }
    curl_close($ch);
    $obj = json_decode($result, true);
    return $obj;
}

function httpDeleteAuth($resource, $post = null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, BASE_API.$resource);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded',
        'Cache-Control: no-cache',
        'Authorization: Bearer '.$post['token']
    ));
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    $post = http_build_query($post);    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $result = curl_exec($ch);
    if($result === false){
        return false;
    }
    curl_close($ch);
    $obj = json_decode($result, true);
    return $obj;
}

function sendEmailToTemplate($to, $subject, $datas = null, $template) {
    //if ($_SERVER['SERVER_NAME'] <> "localhost"){
        if (!class_exists('PHPMailer')) {           
            require 'phpmailer/class.phpmailer.php';
            require 'phpmailer/class.smtp.php';
        }     
        $template_html = file_get_contents(__DIR__.'/phpmailer/templates/'.$template);
        if ($datas){
            foreach ($datas as $key => &$val) {
                $template_html = str_replace($key, $val, $template_html);
            }
        }
        $template_text = str_replace("<br />", "\n", $template_html);
        $template_text = strip_tags($template_text);
     
        $mail = new PHPMailer;
        $mail->SMTPDebug = true;
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
            $mail->Username = SMTP_AUTH;
            $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port = SMTP_PORT;
        $mail->CharSet = "UTF-8";
        $mail->setFrom(SMTP_EMAIL, SMTP_NAME);
        $mail->addAddress($to, $to);
        $mail->isHTML(true);
        $mail->Subject = $subject;

        $mail->Body    = $template_html;
        $mail->AltBody = $template_text;
     
        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    //}
}

function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;
}

function uploadFile($file = null, $diretorio = "arquivos") {
    $phpFileUploadErrors = array(
        0 => 'Não existe erro, arquivo enviado com sucesso',
        1 => 'O envio excedeu a diretiva upload_max_filesize no php.ini',
        2 => 'O envio excedeu a diretiva MAX_FILE_SIZE especificada no HTML form',
        3 => 'O envio foi parcialmente',
        4 => 'Nenhum arquivo enviado',
        6 => 'Faltando o diretório temporário',
        7 => 'Falha em escrever arquivo no servidor',
        8 => 'A extensão parou o envio',
    );

    if ($file['error']>0) throw new Exception($phpFileUploadErrors[$file['error']]);

    if ($file['tmp_name'] <> ""){
        $datahora = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
        $name = _checkName(strtolower($file['name']));
        $name = $datahora."__".$name;
        $uploadfile = BASE_URI."/".$diretorio."/".$name;

        if (!file_exists(BASE_URI."/".$diretorio)) {
            mkdir(BASE_URI."/".$diretorio, 0755, true);
        }

        $move = move_uploaded_file($file['tmp_name'], $uploadfile);
        if (!$move) {
            throw new Exception('Erro ao enviar arquivo.');
        }else{
            return $name;
        }

    }else{
        throw new Exception('Erro ao anexar arquivo.');
    }
}

function acentuacao($dados) {
    if (is_array($dados)) {
        foreach ($dados as $key => $value) {
            if (!is_int($value)){
                $dados[$key] = acentuacao($value);
            }
        }
    } else {
        //$dados = mb_convert_encoding($dados, "utf-8", "iso-8859-1");
    }
    return $dados;
}

function arraySearch_returnArray($needle, $haystack){
    $value = false;
    $x = 0;
    if ($haystack <> null){
        foreach($haystack as $temp){
            $search = array_search($needle, $temp);
            if (strlen($search) > 0 && $search >= 0){
                $value = $x;
                foreach($haystack as $key => $element){
                    $array_r[$key] = $element;
                }
                return $array_r[$value];
            }
            $x++;
        }
    }
    return null;
}

function arraySearchByKey_returnArray($value,$array,$key){
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) == TRUE ){
            if ($array[$key] == $value)
                $results = $array;
        }
        foreach ($array as $subarray)
            $results = array_merge($results, arraySearchByKey_returnArray($value,$subarray,$key));
    }
    return $results;
}

function arraySearch_returnMultiArray($needle, $haystack){
    $value = false;
    $x = 0;
    $multiarray = array();
    if ($haystack <> null){
        foreach($haystack as $temp){
            $search = array_search($needle, $temp);
            if (strlen($search) > 0 && $search >= 0){
                $value = $x;
                foreach($haystack as $key => $element){
                    $array_r[$key] = $element;
                }
                $multiarray[]= $array_r[$value];
            }
            $x++;
        }
    }
    if ($multiarray == 0){
        return null;
    }else{
        return $multiarray;
    }
}

function arraySearchByKey_returnMultiArray($value,$array,$key){
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key])){
            if ($array[$key] == $value)
                $results[] = $array;
        }
        foreach ($array as $subarray)
            $results = array_merge($results, arraySearchByKey_returnMultiArray($value,$subarray,$key));
    }
    return $results;
}

function arrayValue_exists($needle, $haystack) {
    if(in_array($needle, $haystack)) {
        return true;
    }
    foreach($haystack as $element) {
        if(is_array($element) && arrayValue_exists($needle, $element))
            return true;
    }
    return false;
}

function startsWith($haystack, $needle) {
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}

function endsWith($haystack, $needle) {
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/OPR/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
			if (isset($matches['version'][1])){
				$version= $matches['version'][1];
			}
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

function validaCPF($cpf) {
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

    if (strlen($cpf) != 11) {
        return false;
    }

    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            //$d += $cpf{$c} * (($t + 1) - $c);
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        //if ($cpf{$c} != $d) {
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

function get_files_multidir($dir, $tipos = null){
    $contents = array();
    foreach(scandir($dir) as $file){
        if (substr($file, 0, 1) <> "."){
            if($file == '.' || $file == '..') continue;
            $path = $dir.DIRECTORY_SEPARATOR.$file;
            if(is_dir($path)){
                $contents = array_merge($contents, get_files_multidir($path));
            } else {
                $contents[] = $path;
            }
        }
    }
    return $contents;
}

function get_all_files($dir, $tipos = null){
    $contents = array();
    foreach(scandir($dir) as $file){
        if (substr($file, 0, 1) <> "."){
            if($file == '.' || $file == '..') continue;
            $path = $dir.DIRECTORY_SEPARATOR.$file;
            if(is_dir($path)){
                $contents = array_merge($contents, get_all_files($path,$tipos));
            } else {
                if(is_array($tipos)){
                    $extensao = get_extensao_file($path);
                    if(in_array($extensao, $tipos)){
                        $contents[] = $path;
                    }
                }else{
                    $contents[] = $path;
                }
            }
        }
    }
    return $contents;
}

function get_files_dir($dir, $tipos = null){
    if(file_exists($dir)){
        $dh =  opendir($dir);
        while (false !== ($filename = readdir($dh))) {
            if($filename != '.' && $filename != '..'){
                if(is_array($tipos)){
                    $extensao = get_extensao_file($filename);
                    if(in_array($extensao, $tipos)){
                        $files[] = $filename;
                    }
                }else{
                    $files[] = $filename;
                }
            }
        }
        if(is_array($files)){
            sort($files);
        }
        return $files;
    }else{
        return false;
    }
}

function get_extensao_file($nome){
    $verifica = explode('.', $nome);
    return $verifica[count($verifica) - 1];
}

function validate_ip($ip){
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}

function get_ip_address() {
    $ip_keys = array('HTTP_X_CLIENT_IP','HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}

function formatString($string, $len){
    if (strlen($string) < $len)
    {
        $addchar=($len - strlen($string)) ;
        for ($i = 0; $i < $addchar; $i++)
        {
            $string=sprintf("%s$string", "0");
        }
    }
    if (strlen($string) > $len)
    {
        $string=substr($string,0,$len);
    }
    return $string;
}

function numberFormatPrecision($number, $precision = 2, $separator = '.'){
    $numberParts = explode($separator, $number);
    $response = $numberParts[0];
    if(count($numberParts)>1){
        if ($precision >0 ) $response .= $separator;
        $response .= substr($numberParts[1], 0, $precision);
    }
    return $response;
}

function moeda2float($valor) {
    if ($valor == ""){
        return null;
    }else{
        if(strstr($valor,'.')) $valor = str_replace('.','',$valor);
        if(strstr($valor,',')) $valor = str_replace(',','.',$valor);
        return $valor;
    }
}

function float2moeda($valor) {
    if ($valor == ""){
        return "0,00"; 
    }else{
        return number_format($valor,2,',','.'); 
    }
}

function float2peso($valor) {
    if ($valor == ""){
        return "0.00"; 
    }else{
        return number_format($valor,2,',',''); 
    }
}

function chkstring2float($number) {
    if (trim($number) <> ""){
        $number = preg_replace("/[^0-9,.]/", "",$number);
        $number = str_replace(",", ".", $number);
        return $number;
    }else{
        return 0;
    }
}

function chknumber($number) {
    return preg_replace("/[^0-9]/", "",$number);
}

function chkfloat($number) {
    if (trim($number) <> ""){
        return preg_replace("/[^0-9\.]/", "",$number);
    }else{
        return 0;
    }
}

function chkmoeda($number) {
    $number = moeda2float($number);
    return preg_replace("/[^0-9\.]/", "",$number);
}

function chkletter($letter) {
    return preg_replace("/[^a-zA-Z\s-]/", "",$letter);
}

function chkref($letter) {
    return preg_replace("/[^a-zA-Z0-9_.-]/", "",$letter);
}

function chktext($letter) {
    return preg_replace("/[^A-Za-z0-9áàãâäÁÀÃÂÄéèêëÉÈÊËíìîïÍÌÎÏóòõôöÓÒÕÔÖúùûüÚÙÛÜñÑ?.!\s]/", "",$letter);
}

function chkpasswd($letter) {
    return preg_replace("/[^\pL 0-9a-zA-Z!@#$%&*?\.\-\_]/u", "",$letter);
}

function chkemail($letter) {
    return filter_var($letter, FILTER_VALIDATE_EMAIL);
}

function uninumber() {
    return substr(round(microtime(true) * 1000), -15); // 15 char
}

function generateFormToken($form) {
	@session_start();
    $token = md5(uniqid(microtime(), true));
    $_SESSION[$form.'_token'] = $token;
    return $_SESSION[$form.'_token'];
}

function verifyFormToken($form) {
    //return true;
	@session_start();
    if(!isset($_SESSION[$form.'_token'])) {
        return false;
    }
    if(!isset($_POST['_token'])) {
        return false;
    }
    if ($_SESSION[$form.'_token'] !== $_POST['_token']) {
        return false;
    }
    return true;
}

function _checkName($string){
    $string = trim(strtolower($string));
    $string = str_replace("(","",$string);
    $string = str_replace(")","",$string);
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Ð'=>'D', 'd'=>'d', 'Ž'=>'Z',
        'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
        'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
        'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
        'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
        'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
        'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
        'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r',
    );
    $string = strtr($string, $table);
    $string = strtolower($string);
    $string = preg_replace("/[^a-z0-9_.\s-]/", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

function url_amigavel($string){
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Ð'=>'D', 'd'=>'d', 'Ž'=>'Z',
        'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
        'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
        'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
        'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
        'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
        'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
        'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r',
    );
    $string = strtr($string, $table);
    $string = strtolower($string);
    $string = preg_replace("/[^a-z0-9_.\s-]/", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

function diadasemana($dia) {
    switch($dia)
    {
        case "0":
            $retorno = "Domingo";
        break;
        case "1":
            $retorno = "Segunda-feira";
        break;
        case "2":
            $retorno = "Terça-feira";
        break;
        case "3":
            $retorno = "Quarta-feira";
        break;
        case "4":
            $retorno = "Quinta-feira";
        break;
        case "5":
            $retorno = "Sexta-feira";
        break;
        case "6":
            $retorno = "Sábado";
        break;
    }
    return $retorno;
}

function date2sql($data) {
    if ($data <> ""){
        return date('Y-m-d',strtotime(str_replace('/', '-', $data)));
    }else{
        return NULL;
    }
}

function datetime2sql($data) {

    return date('Y-m-d H:i',strtotime(str_replace('/', '-', $data)));

}

function sql2datetime($data) {
    if ($data <> ""){
        return date('d/m/Y H:i:s', strtotime($data));
    }else{
        return NULL;
    }
}

function sql2date($data) {
    if ($data <> ""){
        return date('d/m/Y', strtotime($data));
    }else{
        return NULL;
    }
}

function texto3pontos($texto, $tamanho){
    if(strlen($texto) > $tamanho){
        $sub = substr($texto, 0, $tamanho+1);
        if(!empty($sub))
        {
            $texto = substr($texto, 0, $tamanho)." ";
        }else{
            $texto = substr($texto, 0, $tamanho);
        }
        if(substr($texto, -1, 1) == " "){
            $retorno = substr($texto,0,$tamanho)." ...";
        }else{
                $retorno = substr($texto,0,strrpos(substr($texto,0,$tamanho)," "))." ...";
        }
    }else{
        $retorno = $texto;
    }
    return $retorno;
}

function randomCode($length = 8) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr(str_shuffle($chars),0,$length);
    return $password;
}

function randomPassword($length = 8) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
    $password = substr(str_shuffle($chars),0,$length);
    return $password;
}

function hashPass($pass1) {
    $blowfish_salt = bin2hex("S4T5W0RD");
    return crypt($pass1, $blowfish_salt);
}

function verifyHash($pass1, $hash1) {
    $crypted = crypt($pass1, $hash1);
    $crypted = str_replace("/", "", $crypted);
    $crypted = str_replace(".", "", $crypted);
    $verif = (crypt($pass1, $hash1) === $hash1);
    if (!$verif){
        $verif = ($crypted === $hash1);
        if (!$verif){
            $hash1 = str_replace("/", "", $hash1);
            $hash1 = str_replace(".", "", $hash1);
            $verif = ($crypted === $hash1);
        }
    }
    /*if (hashPass($pass1) == $hash1){
        $verif = true;
    }
    else{
        $verif = false;
    }*/
    return $verif;
}

function encrypt($plaintext){
    $password = 'SMIpW4T5W0RD';
    return openssl_encrypt($plaintext,"AES-128-ECB",$password);
}

function decrypt($crypttext){
    $password = 'SMIpW4T5W0RD';
    return openssl_decrypt($crypttext,"AES-128-ECB",$password);
}

function endecrypt($action, $string) {
    $output = false;
    $textToEncrypt = $string;
    $encryptionMethod = "AES-256-CBC";
    $secretHash = "4JMIpWGhbXP@";
    $iv_size = openssl_cipher_iv_length($encryptionMethod);
    $iv = substr(hash('sha256', $secretHash), 0, 16); // $iv = openssl_random_pseudo_bytes($iv_size);
    if( $action == 'encrypt' ) {
        $encryptedMessage = openssl_encrypt($textToEncrypt, $encryptionMethod, $secretHash, 0, $iv);
        $output = $encryptedMessage;
        $output = str_replace(" ","+",$output);
        $output = base64_encode($output);
    }else if( $action == 'decrypt' ){
        $string = base64_decode($string);
        $string = str_replace(" ","+",$string);
        $encryptedMessageWithIv = bin2hex($iv) . $string;
        $iv = hex2bin(substr($encryptedMessageWithIv, 0, $iv_size * 2));
        $decryptedMessage = openssl_decrypt(substr($encryptedMessageWithIv, $iv_size * 2), $encryptionMethod, $secretHash, 0, $iv);
        $output = $decryptedMessage;
    }
    return $output;
}

function uidauth($tamanho = 12) {

    return substr(md5(uniqid(rand(), true)),0,$tamanho);

}

// tem que melhorar conforme utilizar
function _sqlCaseFunc($func, $var = NULL, $varas = NULL) {
    /*
    _sqlCaseFunc("_statusOs", "status", "status")

    CASE
        WHEN status = '1' THEN 'ATIVO'
    END AS status*/
    $arr = "CASE ";
    if ($func){
        $return = $func();
        foreach ($return as $key => $value) {
            $arr .= " WHEN ".$var."='".$key."' THEN '".$value."'";
        }
    }
    if ($varas){
        $arr .= " END AS ".$var;
    }else{
        $arr .= " END";
    }
    return $arr;
}

function _tipopgto($tipo) {
    switch($tipo)
    {
        case "pagamento_pagseguro":
            $retorno = "Pagseguro";
        break;
        case "pagamento_paypal":
            $retorno = "PayPal";
        break;
        default:
            $retorno = "Desconhecido";
        break;
    }
    return $retorno;
}

function _tiporecbto($tipo) {
    switch($tipo)
    {
        case "recebimento_pagseguro":
            $retorno = "Pagseguro";
        break;
        case "recebimento_paypal":
            $retorno = "PayPal";
        break;
        default:
            $retorno = "Desconhecido";
        break;
    }
    return $retorno;
}

function _mescurto($mes) {
    switch($mes)
    {
        case "1":
            $retorno = "Jan";
        break;
        case "2":
            $retorno = "Fev";
        break;
        case "3":
            $retorno = "Mar";
        break;
        case "4":
            $retorno = "Abr";
        break;
        case "5":
            $retorno = "Mai";
        break;
        case "6":
            $retorno = "Jun";
        break;
        case "7":
            $retorno = "Jul";
        break;
        case "8":
            $retorno = "Ago";
        break;
        case "9":
            $retorno = "Set";
        break;
        case "10":
            $retorno = "Out";
        break;
        case "11":
            $retorno = "Nov";
        break;
        case "12":
            $retorno = "Dez";
        break;
    }
    return $retorno;
}

function _mesesano() {
    $arr_meses = array();
    $arr_meses["Janeiro"] = "Janeiro";
    $arr_meses["Fevereiro"] = "Fevereiro";
    $arr_meses["Março"] = "Março";
    $arr_meses["Abril"] = "Abril";
    $arr_meses["Maio"] = "Maio";
    $arr_meses["Junho"] = "Junho";
    $arr_meses["Julho"] = "Julho";
    $arr_meses["Agosto"] = "Agosto";
    $arr_meses["Setembro"] = "Setembro";
    $arr_meses["Outubro"] = "Outubro";
    $arr_meses["Novembro"] = "Novembro";
    $arr_meses["Dezembro"] = "Dezembro";
    return $arr_meses;
}


function _ufs() {
    $arr_uf = array(
        'AC'=>'Acre',
        'AL'=>'Alagoas',
        'AP'=>'Amapá',
        'AM'=>'Amazonas',
        'BA'=>'Bahia',
        'CE'=>'Ceará',
        'DF'=>'Distrito Federal',
        'ES'=>'Espírito Santo',
        'GO'=>'Goiás',
        'MA'=>'Maranhão',
        'MT'=>'Mato Grosso',
        'MS'=>'Mato Grosso do Sul',
        'MG'=>'Minas Gerais',
        'PA'=>'Pará',
        'PB'=>'Paraíba',
        'PR'=>'Paraná',
        'PE'=>'Pernambuco',
        'PI'=>'Piauí',
        'RJ'=>'Rio de Janeiro',
        'RN'=>'Rio Grande do Norte',
        'RS'=>'Rio Grande do Sul',
        'RO'=>'Rondônia',
        'RR'=>'Roraima',
        'SC'=>'Santa Catarina',
        'SP'=>'São Paulo',
        'SE'=>'Sergipe',
        'TO'=>'Tocantins'
    );
    return $arr_uf;
}


function _ufs_() {
    $arr_uf = array(
        'AC'=>'AC',
        'AL'=>'AL',
        'AP'=>'AP',
        'AM'=>'AM',
        'BA'=>'BA',
        'CE'=>'CE',
        'DF'=>'DF',
        'ES'=>'ES',
        'GO'=>'GO',
        'MA'=>'MA',
        'MT'=>'MT',
        'MS'=>'MS',
        'MG'=>'MG',
        'PA'=>'PA',
        'PB'=>'PB',
        'PR'=>'PR',
        'PE'=>'PE',
        'PI'=>'PI',
        'RJ'=>'RJ',
        'RN'=>'RN',
        'RS'=>'RS',
        'RO'=>'RO',
        'RR'=>'RR',
        'SC'=>'SC',
        'SP'=>'SP',
        'SE'=>'SE',
        'TO'=>'TO'
    );
    return $arr_uf;
}


function _regiao_crm() {
    $arr_uf = array(
        'CRN-1'=>'CRN-1',
        'CRN-2'=>'CRN-2',
        'CRN-3'=>'CRN-3',
        'CRN-4'=>'CRN-4',
        'CRN-5'=>'CRN-5',
        'CRN-6'=>'CRN-6',
        'CRN-7'=>'CRN-7',
        'CRN-8'=>'CRN-8',
        'CRN-9'=>'CRN-9',
        'CRN-10'=>'CRN-10',
        'CRN-11'=>'CRN-11'
    );
    return $arr_uf;
}

function _status() {
    $arr = array();
    $arr["0"] = "Ativo";
    $arr["1"] = "Inativo";
    return $arr;
}

function get_file_type($file_path) {
    switch (strtolower(pathinfo($file_path, PATHINFO_EXTENSION))) {
        case 'jpeg':
        case 'jpg':
            return 'image/jpeg';
        case 'png':
            return 'image/png';
        case 'gif':
            return 'image/gif';
        case 'pdf':
            return 'application/pdf';
        default:
            return '';
    }
}

function setReporting() {
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors','On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
    }
}

function stripSlashesDeep($value) {
    $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    return $value;
}

function removeMagicQuotes() {
    /*if ( get_magic_quotes_gpc() ) {
        $_GET    = stripSlashesDeep($_GET   );
        $_POST   = stripSlashesDeep($_POST  );
        $_COOKIE = stripSlashesDeep($_COOKIE);
    }*/
}

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

function performAction($controller,$action,$queryString = null,$render = 0) {
    $controllerName = ucfirst($controller).'Controller';
    $dispatch = new $controllerName($controller,$action);
    $dispatch->render = $render;
    return call_user_func_array(array($dispatch,$action),$queryString);
}

function routeURL($url) {
    global $routing;
    foreach ( $routing as $pattern => $result ) {
        if ( preg_match( $pattern, $url ) ) {
            if(!is_array($result)){
                return preg_replace( $pattern, $result, $url );
            }
        }
    }
    return ($url);
}

function Redirect($url, $permanent = false){
    if (headers_sent() === false){
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }else{
        echo '<script type="text/javascript">window.location.href = "' . $url . '";</script>';
    }
    exit();
}

function session_regenerate() {
    global $url;
    @session_start();
    if ((startsWith($url,"historico")) or (startsWith($url,"perfil"))) {
        $session_data = $_SESSION;
        session_destroy();

        @session_start();
        session_regenerate_id();
        $_SESSION = $session_data;
    }
}

function session_readonly($return = null) {
    $session_path = session_save_path();
    $session_name = session_name();
    $session_key = 'KEY_'.$session_name;

    if (empty($session_name) || empty($session_key) || empty($_COOKIE[$session_name]) || empty($_COOKIE[$session_key]))
        return false;

    $session_id = preg_replace('/[^\da-z]/i','',$_COOKIE[$session_name]);
    $key = false;
    $auth = false;

    if (!file_exists($session_path.'/'.$session_name.'_'.$session_id))
        return false;

    $encoded_data = file_get_contents($session_path.'/'.$session_name.'_'.$session_id);
    if (empty($encoded_data))
        return false;

    list($key,$auth) = explode (':',$_COOKIE[$session_key]);
    $key = base64_decode($key);
    $auth = base64_decode($auth);

    list($hmac,$iv,$encrypted) = explode(':',$encoded_data);
    $iv = base64_decode($iv);
    $encrypted = base64_decode($encrypted);
    $newHmac = hash_hmac('sha256',$iv.MCRYPT_RIJNDAEL_128.$encrypted,$auth);

    if ($hmac !== $newHmac)
        return false;

    $decrypt = mcrypt_decrypt(MCRYPT_RIJNDAEL_128,$key,$encrypted,MCRYPT_MODE_CBC,$iv);
    $raw_data = rtrim($decrypt, "\0");
    $method = ini_get("session.serialize_handler");

    if (empty($raw_data) || empty($method))
        return false;

    if ($method == 'php')
        $_SESSION = unserialize_php($raw_data);
    elseif ($method == 'php_binary')
        $_SESSION = unserialize_phpbinary($raw_data);
    else
        return false;

    if ($return) return $_SESSION;
}

function unserialize_php($session_data) {
    $return_data = array();
    $offset = 0;
    while ($offset < strlen($session_data)) {
        if (!strstr(substr($session_data, $offset), "|")) {
            trigger_error('Invalid session data.',E_USER_NOTICE);
            return false;
        }

        $pos = strpos($session_data, "|", $offset);
        $num = $pos - $offset;
        $varname = substr($session_data, $offset, $num);
        $offset += $num + 1;
        $data = unserialize(substr($session_data, $offset));
        $return_data[$varname] = $data;
        $offset += strlen(serialize($data));
    }
    return $return_data;
}

function unserialize_phpbinary($session_data) {
    $return_data = array();
    $offset = 0;
    while ($offset < strlen($session_data)) {
        $num = ord($session_data[$offset]);
        $offset += 1;
        $varname = substr($session_data, $offset, $num);
        $offset += $num;
        $data = unserialize(substr($session_data, $offset));
        $return_data[$varname] = $data;
        $offset += strlen(serialize($data));
    }
    return $return_data;
}

function alertretorno($msg = "", $cont = 1) {
    @session_start();
    $_SESSION['retorno'] = $msg;
    $_SESSION['retorno_c'] = $cont;
}

function checkLoginSession() {
    @session_start();
    if ((isset($_SESSION['admin_session_id']) == FALSE) or (isset($_SESSION['admin_session_auth']) == FALSE)){
        unset($_SESSION['admin_session_id']);
        unset($_SESSION['admin_session_auth']);
        unset($_SESSION['admin_session_key']);        
        unset($_SESSION['admin_session_type']);      
        unset($_SESSION['admin_session_user']);    
        unset($_SESSION['admin_session_menu']);
        //@session_destroy();
        Redirect(BASE_PATH . '/login');
        return false;
    }
}

function checkLogin($msg = null) {
    @session_start();
    global $url;
    global $bruker;
    $return = false;

    if ((isset($_SESSION['admin_session_id']) == FALSE) or (isset($_SESSION['admin_session_auth']) == FALSE)){
        unset($_SESSION['admin_session_id']);
        unset($_SESSION['admin_session_auth']);
        unset($_SESSION['admin_session_key']);        
        unset($_SESSION['admin_session_type']); 
        unset($_SESSION['admin_session_menu']);
        //@session_destroy();

    }else{

        $_SESSION['token'];
        $bruker->key = $_SESSION['admin_session_key'];
        $bruker->auth = $_SESSION['admin_session_auth'];
        $bruker->type = $_SESSION['admin_session_type'];
        //$bruker->type = $_SESSION['admin_session_user']['tipo'];
        $bruker->menu = $_SESSION['admin_session_menu'];
        $bruker->usuario = $_SESSION['admin_session_user'];
        $bruker->redirect = $_SESSION['redirect'];
        $return = true;
        // $verifica = httpGetAuth("check", array("token" => $_SESSION['token']));
        // if (isset($verifica['data']['payload']['exp'])){
        //     $date_now = new DateTime();
        //     $date2    = new DateTime($verifica['data']['payload']['exp']);
        //     if ($date_now < $date2) {
        //          $_SESSION['token'];
        //         $bruker->key = $_SESSION['admin_session_key'];
        //         $bruker->auth = $_SESSION['admin_session_auth'];
        //         $bruker->type = $_SESSION['admin_session_type'];
        //         //$bruker->type = $_SESSION['admin_session_user']['tipo'];
        //         $bruker->menu = $_SESSION['admin_session_menu'];
        //         $bruker->usuario = $_SESSION['admin_session_user'];
        //         $return = true;
        //     }
        // }
    }

    if (!$return){
        Redirect(BASE_PATH . '/login');
        return false;
    }
}

if (!function_exists('mb_strlen')) {
    function mb_strlen($utf8string=false) {
        if (empty($utf8string))
            return false;
        return preg_match_all("/.{1}/us",$utf8string,$dummy);
    }
}

if (isset($url)){
    @session_name('ENTRIC');
    session_set_cookie_params(432000); // segundos = 5dias
    if (!empty($_SERVER["HTTPS"])) ini_set('session.cookie_secure',1);
    ini_set('session.cookie_httponly',1);
    ini_set('session.cookie_path','/');
    ini_set('expose_php','off');
    ini_set('session.gc_maxlifetime', 432000); // segundos = 5dias
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('X-Powered-By: ENTRIC');
    if ((!startsWith($url,"ajax"))) {
        @session_regenerate();
    }else {
        session_readonly();
    }
}