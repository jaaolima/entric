<?php

use \Firebase\JWT\JWT;

class JWTAuth
{
	public static function getToken($id, $email)
	{
		$secret = SECRET;
		$now = date('Y-m-d H:i:s');
		$future = date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m') + 12, date('d'), date('Y')));
		$token = array(
			'header' => [
				'id' 	=> 	$id,
				'email' 	=> 	$email 
			],
			'payload' => [
				'iat'	=>	$now,
				'exp'	=>	$future
			]
		);
		return JWT::encode($token, $secret, "HS256");
	}

	public static function verifyToken($token)
	{
		$secret = SECRET;
		$obj = JWT::decode($token, $secret, array("HS256"));
		if (isset($obj->payload)) {
			$now = strtotime(date('Y-m-d H:i:s'));
			$exp = strtotime($obj->payload->exp);
			if (($exp - $now) > 0) {
				return $obj;
			}
		}

		return false;
	}
}

?>
