<?php
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
    return $verif;
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

function chkstring2float($number) {
    if (trim($number) <> ""){
        $number = preg_replace("/[^0-9,.]/", "",$number);
        $number = str_replace(",", ".", $number);
        return $number;
    }else{
        return 0;
    }
}

function uninumber() {
    return substr(round(microtime(true) * 1000), -15); // 15 char
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

function sql2datetime($data) {
    if ($data <> ""){
        return date('d/m/Y H:i:s', strtotime($data));
    }else{
        return NULL;
    }
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

function save_base64_image($base64_image_string, $output_file_without_extension, $path_with_end_slash="/home/anjomonitora/api.anjomonitora.com/arquivos/" ) {
    $splited = explode(',', substr( $base64_image_string , 5 ) , 2);
    $mime=$splited[0];
    $data=$splited[1];

    $mime_split_without_base64=explode(';', $mime,2);
    $mime_split=explode('/', $mime_split_without_base64[0],2);
    if(count($mime_split)==2)
    {
        $extension=$mime_split[1];
        if($extension=='jpeg')$extension='jpg';
        $output_file_with_extension=$output_file_without_extension.'.'.$extension;
    }
    file_put_contents( $path_with_end_slash . $output_file_with_extension, base64_decode($data) );
    return $output_file_with_extension;
}

function uidauth($tamanho = 12) {
    return substr(md5(uniqid(rand(), true)),0,$tamanho);
}

function numberFormatPrecision($number, $precision = 2, $separator = '.'){
    $numberParts = explode($separator, $number);
    $response = $numberParts[0];
    if(count($numberParts)>1){
        $response .= $separator;
        $response .= substr($numberParts[1], 0, $precision);
    }
    return $response;
}

function float2moeda($valor, $decimal=2) {
    $valor = numberFormatPrecision($valor, $decimal, '.');
    if ($valor == ""){
        return null;
    }else{
        return number_format($valor,$decimal,',','.');
    }
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

function _patro_status($opid = -1) {
    $arr = array();
    $arr["0"] = "Ativo";
    $arr["1"] = "Inativo";
    $arr["2"] = "Removido";
    if ($opid == -1) return $arr; else return $arr[$opid];
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

function array_json($dados, $shift=true){
    if (!empty($dados)) {
        return json_encode($dados);
    }
    else{
        return null;
    }    
}

function randomCode($length = 8) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr(str_shuffle($chars),0,$length);
    return $password;
}

function date2sql($data) {
    if ($data <> ""){
        return date('Y-m-d',strtotime(str_replace('/', '-', $data)));
    }else{
        return NULL;
    }
}

function hashPass($pass1) {
    $blowfish_salt = bin2hex("S4T5W0RD");
    return crypt($pass1, $blowfish_salt);
}