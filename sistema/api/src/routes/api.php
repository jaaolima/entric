<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->add(new \Slim\Middleware\JwtAuthentication([
    "secure" => false,
	"secret" => SECRET,
	"rules" => [
		new \Slim\Middleware\JwtAuthentication\RequestPathRule([ 
			"path" => "",
			"passthrough" => [
				"/ping",
				"/login",			
				"/login_ibranutro",			
				"/check",
				"/ajax_getPatrocinador",
				"/ajax_getAdministrador",
				"/ajax_getPrescritor",
				"/ajax_getUnidades",
				"/ajax_gt_admin",
				"/ajax_gt_patroc",
				"/ajax_gt_prescritores",
				"/ajax_gt_endereco_distribuidor",
				"/ajax_unidades_cadastrar",
				"/ajax_unidades_editar",
				"/ajax_rmUnidade",
				"/ajax_fabricantes_editar",
				"/ajax_fabricantes_cadastrar",
				"/ajax_VerVideo",
				"/ajax_rmVideo",
				"/ajax_rmDistribuidor",
				"/ajax_rmFabricante",
				"/ajax_getFabricantes",
				"/ajax_gt_fabricantes",
				"/ajax_stHistoria",
				"/ajax_stAvaliacao",
				"/ajax_stNecessidades",
				"/ajax_stCalculo",
				"/ajax_stCalculoSimplificada",
				"/ajax_stCalculoSuplemento",
				"/ajax_stFracionamento",
				"/ajax_stFracionamentoSimplificada",
				"/ajax_stFracionamentoSuplemento",
				"/ajax_stSelecao",
				"/ajax_stSelecaoSimplificada",
				"/ajax_stSelecaoSuplemento",
				"/ajax_stObservacoes",
				"/ajax_stDistribuidores",
				"/ajax_stDistribuidoresSimplificada",
				"/ajax_stRelatorio",
				"/ajax_stRelatorioSimplificada",
				"/ajax_stRelatorioSuplemento",
				"/ajax_gtRelatorio",
				"/ajax_gtRelatorioSimplificada",
				"/ajax_gtRelatorioSuplemento",
				"/ajax_EnviarEmailPaciente",
				"/ajax_getPacientes",
				"/ajax_getPacientesSimplificada",
				"/ajax_getPacientesSuplemento",
				"/ajax_getDistribuidores",
				"/ajax_stPaciente",
				"/ajax_ptPaciente",
				"/ajax_ptPacienteSimplificada",
				"/ajax_ptPacienteSuplemento",
				"/ajax_stPacienteSimplificada",
				"/ajax_stPacienteSuplemento",
				"/cadastro_cadastrar",
				"/cadastro_cadastrarPaciente",
				"/cadastro_chkCodigo",
				"/cadastros_cadastrarAdministrador",
				"/cadastros_cadastrarPatrocinador",
				"/cadastros_cadastrarPrescritor",
				"/cadastros_editarAdministrador",
				"/cadastros_editarPatrocinador",
				"/cadastros_editarPrescritor",
				"/cadastros_getDados",
				"/paciente_getDadoSuplemento",
				"/paciente_getDadoSimplificada",
				"/paciente_getDadoIbranutro",
				"/cadastros_getDado",
				"/cadastros_cadastrar",
				"/cadastros_cadastrarPrescritor2",
				"/cadastros_editar",
				"/config_getDados",
				"/config_SalvarOrientacoes",
				"/consultarproduto_getRelatorio",
				"/consultarproduto_getFornecedores",
				"/consultarproduto_getUnidades",
				"/dashboard_getDadosLog",
				"/dashboard_getDadosSite",
				"/dashboard_getDadosVideos",
				"/dashboard_getDadosRelatorios",
				"/distribuidores_getDados",
				"/distribuidores_getDado",
				"/distribuidores_cadastrar",
				"/distribuidores_editar",
				"/home_getDados",
				"/paciente_contato_getDados",
				"/paciente_distribuidores_getDados",
				"/paciente_relatorioalta_getRelatorio",
				"/paciente_videosalta_getDados",
				"/prescritor_consultarproduto_getRelatorio",
				"/prescritor_consultarproduto_getFornecedores",
				"/prescritor_consultarproduto_getUnidades",
				"/prescritor_ferramentas_getRelatorio",
				"/prescritor_fornecedores_getDados",
				"/prescritor_relatorioalta_buscarDados",
				"/prescritor_videosalta_getDados",
				"/prescritor_videosalta_getDado", 
				"/prescritor_videosalta_cadastrar1",
				"/prescritor_videosalta_cadastrar2",
				"/prescritor_videosalta_editar1",
				"/prescritor_videosalta_editar2",
				"/produto_gtProdutoRelatorio",
				"/produto_gtProdutoRelatorioSimplificada",
				"/produto_gtProdutoRelatorioSuplemento",
				"/produto_gtProdutoFiltros",
				"/produto_chkProduto",
				"/produto_gtProdutos",
				"/produto_gtProduto",
				"/produto_stProduto",
				"/produto_info_nutri",
				"/produto_composicao",
				"/produto_fabricantes",
				"/produto_ptProduto",
				"/produto_delinfo_nutri",
				"/produto_ptinfo_nutri",
				"/produto_ptcomposicao",
				"/produto_ptDisponivel",
				"/produto_rmProduto",
				"/senha_checarPrescritorSenha",
				"/senha_checarPacienteSenha",
				"/senha_checarCodigoSenhaPaciente",
				"/senha_checarCodigoSenhaPrescritor",
				"/videosalta_getDados",
				"/videosalta_getDado",
				"/videosalta_cadastrar1",
				"/videosalta_cadastrar2",
				"/videosalta_editar1",
				"/videosalta_editar2",
				"/v_gtProdutos",
				"/v_getDistribuidores",
				"/v_gt_endereco_distribuidor",
				"/util_stlog"
			]
		])
	]
]));

$app->add(function (Request $request, Response $response, $next) {
	$response = $next($request, $response);
	$response = $response->withHeader('Access-Control-Allow-Origin', '*')
				->withHeader("Content-Type", "application/json")
				->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
				->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
	return $response;
});

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

$app->group("", function () use ($app) {

	$app->get("/ping", function (Request $request, Response $response) {
		$data = "pong";
		$response = $response->withHeader("Content-Type", "application/json");		
		$response = $response->getBody()->write(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT));
		return $response;
	});

	$app->post("/login", function (Request $request, Response $response) {
		$login = $request->getParam("email");
		$senha = $request->getParam("senha");
		$tipo = $request->getParam("tipo");
		$usuario = null;

		try {
			$db = new Database();
			$db_ibranutro = new Database_ibranutro();

	        $tipo_login = "";
	        $data = array();
	        $retorno = null;

	        // paciente =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
	        if ($tipo == 1){
	            $tipo_login = "paciente";
	            $bind = array(':email' => ($login), ':tipo' => chknumber($tipo));
	            $retorno = $db->select_single_to_array("usuarios", "*", "WHERE email=:email AND tipo=:tipo AND status=0", $bind);
				$usuario = $db->select_single_to_array("pacientes", "*", "WHERE id_usuario=".$retorno['id'], null);
				$usuario["tipo"] = 1;
				$usuario_login = 'entric';

	            $menu = array(  "home",
	                            "paciente_contato", 
	                            "paciente_distribuidores", 
	                            "paciente_relatorioalta", 
	                            "paciente_videosalta", 
	                            "ajax");

	        // pescritor =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
	        }else if ($tipo == 2){
	            $tipo_login = "prescritor";
	            $bind = array(':email' => ($login));
	            $retorno = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE ds_usuario=:email", $bind);
				$usuario = $retorno;
				$usuario_login = 'ibranutro';
				if(!$retorno){
					$bind = array(':email' => ($login), ':tipo' => chknumber($tipo));
					$retorno = $db->select_single_to_array("usuarios", "*", "WHERE email=:email AND tipo=:tipo AND status=0", $bind);
					$usuario = $db->select_single_to_array("prescritores", "*", "WHERE id_usuario=".$retorno['id'], null);
					$usuario["tipo"] = 2;
					$usuario_login = 'entric';
				}
				$usuario["tipo"] = 2;

	            $menu = array(  "home",
	                            "prescritor_consultarproduto", 
	                            "prescritor_ferramentas", 
	                            "prescritor_fornecedores", 
	                            "prescritor_relatorioalta", 
	                            "prescritor_meusrelatorios", 
	                            "prescritor_prescricaosimplificada", 
	                            "prescritor_prescricaosuplemento", 
	                            "prescritor_videosalta", 
	                            "ajax"); 

	        // administrador =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
	        }else if (($tipo == 3) or ($tipo == -1)){
	            $tipo_login = "administrador";
	            $bind = array(':email' => ($login));
	            $retorno = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE ds_usuario=:email", $bind);
				$usuario_login = 'ibranutro';
				$usuario = $retorno;
				if(!$retorno){
					$bind = array(':email' => ($login), ':tipo' => $tipo);
					$retorno = $db->select_single_to_array("usuarios", "*", "WHERE email=:email AND (tipo=:tipo OR tipo=0 OR tipo=-1) AND status=0", $bind);
					$usuario = $db->select_single_to_array("admin", "*", "WHERE id_usuario=".$retorno['id'], null);
					$usuario["tipo"] = 3;
					$usuario_login = 'entric';
				}
				$usuario["tipo"] = 3;

	            $menu = array(  "home",
	                            "consultarproduto", 
	                            "prescritor_ferramentas", 
	                            "distribuidores", 
	                            "dashboard", 
	                            "cadastros", 
	                            "prescritor_fornecedores", 
	                            //"prescritor_relatorioalta", 
	                            "videosalta",
	                            "config", 
	                            "ajax", 
	                            "v");

	        // patrocinador =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	        }else if ($tipo == 4){
	            $tipo_login = "patrocinador";
	            $bind = array(':email' => ($login), ':tipo' => chknumber($tipo));
	            $retorno = $db->select_single_to_array("usuarios", "*", "WHERE email=:email AND tipo=:tipo AND status=0", $bind);
				$usuario = $db->select_single_to_array("patrocinadores", "*", "WHERE id_usuario=".$retorno['id'], null);
				$usuario["tipo"] = 3;
				$usuario_login = 'entric';

	            $menu = array(  "home",
	                            "dashboard", 
	                            "prescritor_consultarproduto", 
	                            "prescritor_videosalta",
	                            "prescritor_ferramentas", 
	                            "prescritor_fornecedores", 
	                            //"prescritor_relatorioalta",
	                            "config", 
	                            "ajax");
	        }

	        if ($retorno){
	            // pescritor ou paciente =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
				if($usuario_login == 'ibranutro'){
					if (($tipo == 1) or ($tipo == 2)){
						$checkpass = hash("SHA512", $senha) == trim($retorno['ds_senha']);
						
						if (!$checkpass){
							$tipo_login = "";
							$data["status"] = "Erro: Senha inválida.";
							$response = $response->withStatus(401, "Unauthorized");
						}
					}
	
					if ($tipo_login <> ""){
						$db->delete("sessions", "WHERE user_id=:id AND type='".$tipo_login."'", array(':id' => $retorno['id_usuario']));
	
						if ($_SERVER['SERVER_NAME'] <> "localhost"){
							$res = openssl_pkey_new(array("digest_alg"=>"sha256","private_key_bits"=>512,"private_key_type"=>OPENSSL_KEYTYPE_RSA));
							@openssl_pkey_export($res,$private);
							$public = @openssl_pkey_get_details($res); 
						}else{                    
							$public["key"] = uninumber();
							$private = $public["key"];
						}
	
						$public = (isset($public["key"])?$public["key"]:null);
						$nonce = rand(2,99999);
						$uid = uidauth();
	
						$type2fa = 0;
						$data2fa = rand(111111, 999999);
	
						$nopin = true;
						$awaiting_token = true;
						
						$qdata = array( ':session_time'=> date('Y-m-d H:i:s'),
										':session_start'=> date('Y-m-d H:i:s'),
										':session_key'=> $public,
										':user_id'=> $retorno['id_usuario'],
										':uid'=> $uid,
										':nonce'=> $nonce,
										':type'=> $tipo_login,
										':awaiting'=> (($awaiting_token) ? 'Y' : 'N'),
										':type2fa'=> $type2fa,
										':data2fa'=> $data2fa,
										':ip'=> get_ip_address());
						$sessions = $db->insert('sessions', $qdata);
	
						$qdata = array(':id_usuario'=> $retorno['id_usuario'], ':funcao'=> 'login_'.$tipo_login, ':ipaddress'=> get_ip_address(), ':data_criacao'=> date('Y-m-d H:i:s'));
						$logs = $db->insert('log', $qdata);
	
						$token = JWTAuth::getToken($retorno['id_usuario'], $login);
	
						$data["data"]["session"]['token'] = $token;
						$data["data"]["session"]['admin_session_id'] = $sessions;
						$data["data"]["session"]['admin_session_key'] = $private;
						$data["data"]["session"]['admin_session_auth'] = $uid;
						$data["data"]["session"]['admin_session_type'] = $tipo_login;
						$data["data"]["session"]['admin_session_menu'] = $menu;
						$data["data"]["session"]['admin_session_user'] = $usuario;
						$data["data"]["session"]['login'] = $usuario_login;
						$response = $response->withStatus(202, "Accepted");
	
						if ($nopin){
							if ($tipo == 1){
								$data["data"]["paciente_videosalta"] = "paciente_videosalta";
								$response = $response->withStatus(202, "Accepted");
							}
							else{
								$data["data"]["redirect"] = "redirect";
								$response = $response->withStatus(202, "Accepted");
							}
	
						}else{
							$data["status"] = "Erro 208: Usuário não encontrado ou inativo.";
							$response = $response->withStatus(400, "Bad Request");
						}
	
					}else{
						$data["status"] = "Erro 213: Usuário não encontrado ou inativo.";
						$response = $response->withStatus(400, "Bad Request");
					}
				}elseif($usuario_login == 'entric'){
					if (($tipo == 1) or ($tipo == 2)){
						$checkpass = verifyHash(chkpasswd($senha), trim($retorno['senha']));
						
						if (!$checkpass){
							$tipo_login = "";
							$data["status"] = "Erro: Senha inválida.";
							$response = $response->withStatus(401, "Unauthorized");
						}
					}
	
					if ($tipo_login <> ""){
						$db->delete("sessions", "WHERE user_id=:id AND type='".$tipo_login."'", array(':id' => $retorno['id']));
	
						if ($_SERVER['SERVER_NAME'] <> "localhost"){
							$res = openssl_pkey_new(array("digest_alg"=>"sha256","private_key_bits"=>512,"private_key_type"=>OPENSSL_KEYTYPE_RSA));
							@openssl_pkey_export($res,$private);
							$public = @openssl_pkey_get_details($res); 
						}else{                    
							$public["key"] = uninumber();
							$private = $public["key"];
						}
	
						$public = (isset($public["key"])?$public["key"]:null);
						$nonce = rand(2,99999);
						$uid = uidauth();
	
						$type2fa = 0;
						$data2fa = rand(111111, 999999);
	
						$nopin = true;
						$awaiting_token = true;
						
						$qdata = array( ':session_time'=> date('Y-m-d H:i:s'),
										':session_start'=> date('Y-m-d H:i:s'),
										':session_key'=> $public,
										':user_id'=> $retorno['id'],
										':uid'=> $uid,
										':nonce'=> $nonce,
										':type'=> $tipo_login,
										':awaiting'=> (($awaiting_token) ? 'Y' : 'N'),
										':type2fa'=> $type2fa,
										':data2fa'=> $data2fa,
										':ip'=> get_ip_address());
						$sessions = $db->insert('sessions', $qdata);
	
						$qdata = array(':id_usuario'=> $retorno['id'], ':funcao'=> 'login_'.$tipo_login, ':ipaddress'=> get_ip_address(), ':data_criacao'=> date('Y-m-d H:i:s'));
						$logs = $db->insert('log', $qdata);
	
						$token = JWTAuth::getToken($retorno['id'], $login);
	
						$data["data"]["session"]['token'] = $token;
						$data["data"]["session"]['admin_session_id'] = $sessions;
						$data["data"]["session"]['admin_session_key'] = $private;
						$data["data"]["session"]['admin_session_auth'] = $uid;
						$data["data"]["session"]['admin_session_type'] = $tipo_login;
						$data["data"]["session"]['admin_session_menu'] = $menu;
						$data["data"]["session"]['admin_session_user'] = $usuario;
						$data["data"]["session"]['login'] = $usuario_login;
						$response = $response->withStatus(202, "Accepted");
	
						if ($nopin){
							if ($tipo == 1){
								$data["data"]["paciente_videosalta"] = "paciente_videosalta";
								$response = $response->withStatus(202, "Accepted");
							}
							else{
								$data["data"]["redirect"] = "redirect";
								$response = $response->withStatus(202, "Accepted");
							}
	
						}else{
							$data["status"] = "Erro 208: Usuário não encontrado ou inativo.";
							$response = $response->withStatus(400, "Bad Request");
						}
	
					}else{
						$data["status"] = "Erro 213: Usuário não encontrado ou inativo.";
						$response = $response->withStatus(400, "Bad Request");
					}
				}
	            

	        }else{
				$data["status"] = "Erro 218: Usuário não encontrado ou inativo.";
				$response = $response->withStatus(400, "Bad Request");
	        }

			$response = $response->withHeader("Content-Type", "application/json");		
			$response = $response->getBody()->write(json_encode($data));
			return $response;

		} catch (PDOException $e) {
		} catch (Exception $e) {
		} finally {
			$db = null;
		}
	});

	$app->post("/login_ibranutro", function (Request $request, Response $response) {
		$id_usuario = $request->getParam("id_usuario");
		$usuario = null;

		try {
			$db = new Database();
			$db_ibranutro = new Database_ibranutro();

	        $tipo_login = "";
	        $data = array();
	        $retorno = null;

	        $tipo_login = "prescritor";
			$bind = array(':id_usuario' => ($id_usuario));
			$retorno = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id_usuario and st_ativo <> 'D'", $bind);
			$usuario = $retorno;
			$usuario["tipo"] = 2;

			$menu = array(  "home",
							"prescritor_consultarproduto", 
							"prescritor_ferramentas", 
							"prescritor_fornecedores", 
							"prescritor_relatorioalta", 
							"prescritor_meusrelatorios", 
							"prescritor_prescricaosimplificada", 
							"prescritor_prescricaosuplemento", 
							"prescritor_videosalta", 
							"ajax"); 

	        if ($retorno){
	            if ($tipo_login <> ""){
	                $db->delete("sessions", "WHERE user_id=:id AND type='".$tipo_login."'", array(':id' => $retorno['id_usuario']));

	                if ($_SERVER['SERVER_NAME'] <> "localhost"){
	                    $res = openssl_pkey_new(array("digest_alg"=>"sha256","private_key_bits"=>512,"private_key_type"=>OPENSSL_KEYTYPE_RSA));
	                    @openssl_pkey_export($res,$private);
	                    $public = @openssl_pkey_get_details($res); 
	                }else{                    
	                    $public["key"] = uninumber();
	                    $private = $public["key"];
	                }

	                $public = (isset($public["key"])?$public["key"]:null);
	                $nonce = rand(2,99999);
	                $uid = uidauth();

	                $type2fa = 0;
	                $data2fa = rand(111111, 999999);

	    			$nopin = true;
	    			$awaiting_token = true;
	    			
	                $qdata = array( ':session_time'=> date('Y-m-d H:i:s'),
	                                ':session_start'=> date('Y-m-d H:i:s'),
	                                ':session_key'=> $public,
	                                ':user_id'=> $retorno['id_usuario'],
	                                ':uid'=> $uid,
	                                ':nonce'=> $nonce,
	                                ':type'=> $tipo_login,
	                                ':awaiting'=> (($awaiting_token) ? 'Y' : 'N'),
	                                ':type2fa'=> $type2fa,
	                                ':data2fa'=> $data2fa,
	                                ':ip'=> get_ip_address());
	                $sessions = $db->insert('sessions', $qdata);

	                $qdata = array(':id_usuario'=> $retorno['id_usuario'], ':funcao'=> 'login_'.$tipo_login, ':ipaddress'=> get_ip_address(), ':data_criacao'=> date('Y-m-d H:i:s'));
	                $logs = $db->insert('log', $qdata);

					$token = JWTAuth::getToken($retorno['id_usuario'], $usuario['ds_usuario']);

					$data["data"]["session"]['token'] = $token;
					$data["data"]["session"]['admin_session_id'] = $sessions;
					$data["data"]["session"]['admin_session_key'] = $private;
					$data["data"]["session"]['admin_session_auth'] = $uid;
					$data["data"]["session"]['admin_session_type'] = $tipo_login;
					$data["data"]["session"]['admin_session_menu'] = $menu;
					$data["data"]["session"]['admin_session_user'] = $usuario;
					$response = $response->withStatus(202, "Accepted");

	    			if ($nopin){
	                    $data["data"]["redirect"] = "redirect";
	                    $response = $response->withStatus(202, "Accepted");

	    			}else{
						$data["status"] = "Erro 208: Usuário não encontrado ou inativo.";
						$response = $response->withStatus(400, "Bad Request");
	    			}

	            }else{
					$data["status"] = "Erro 213: Usuário não encontrado ou inativo.";
					$response = $response->withStatus(400, "Bad Request");
	            }

	        }else{
				$data["status"] = "Erro 218: Usuário não encontrado ou inativo.";
				$response = $response->withStatus(400, "Bad Request");
	        }

			$response = $response->withHeader("Content-Type", "application/json");		
			$response = $response->getBody()->write(json_encode($data));
			return $response;

		} catch (PDOException $e) {
		} catch (Exception $e) {
		} finally {
			$db = null;
		}
	});

	$app->get("/check", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				unset($usuario["senha"]);
				$result->user = $usuario;
				$data['data'] = $result;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT));
		return $response;
	});

	$app->post("/util_stlog", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$qdata = $request->getParam("qdata");

		        $logs = $db->insert('log', $qdata);

		        $data = true;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/v_gt_endereco_distribuidor", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");

		        $retorno = "";
		        $endereco = $db->select_single_to_array("distribuidores", "uf, endereco, telefone, whatsapp, email, site, mapa", "WHERE id=".$id, null);
		        if ($endereco){
		            $retorno .= "<label class='grid_label'>Endereço:</label> ".ucfirst(strtolower($endereco["endereco"]))."<br>";
		            $retorno .= "<label class='grid_label'>UF:</label> ".$endereco["uf"]."<br>";
		            if ($endereco["telefone"] <> ""){
		                $retorno .= "<label class='grid_label'>Telefone:</label> ".$endereco["telefone"]."<br>";
		            }
		            if ($endereco["whatsapp"] <> ""){
		                $retorno .= "<label class='grid_label'>Whatsapp:</label> ".$endereco["whatsapp"]."<br>";
		            }
		            if ($endereco["email"] <> ""){
		                $retorno .= "<label class='grid_label'>E-mail:</label> ".strtolower($endereco["email"])."<br>";
		            }
		            if ($endereco["site"] <> ""){
		                $retorno .= "<label class='grid_label'>Site:</label> ".strtolower($endereco["site"])."<br>";
		            }
		            if ($endereco["site"] <> ""){
		                $retorno .= "<br>".$endereco["mapa"];
		            }
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/v_getDistribuidores", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $retorno = $db->select_to_array(  "distribuidores",
		                                            "*",
		                                            "WHERE uf='".strtoupper($dados['uf'])."' ORDER BY distribuidor ASC",
		                                            null);
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/v_gtProdutos", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){

		        $produtos = $db->select_to_array("produtos",
		                                            "*",
		                                            "WHERE status=1 ORDER BY nome ASC", 
		                                            null);
		        $data = $produtos;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/videosalta_editar2", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
				$link = $request->getParam("link");

                $bind = array(  ':id'=> $id,
                                ':link'=>$link);
                $db->update("videos", "WHERE id=:id", $bind);

		        $data = true;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/videosalta_editar1", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $bind = array(  ':categoria' => $dados['categoria'],
		                        ':titulo' => $dados['titulo'],
		                        ':data_criacao' => date("Y-m-d H:i:s"));
        		$retorno = $db->update("videos", "WHERE id=".$dados['id'], $bind);

		        $data = true;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/videosalta_cadastrar2", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
				$link = $request->getParam("link");

                $bind = array(  ':id'=> $id,
                                ':link'=>$link);
                $db->update("videos", "WHERE id=:id", $bind);

		        $data = true;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/videosalta_cadastrar1", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $bind = array(  ':categoria' => $dados['categoria'],
		                        ':titulo' => $dados['titulo'],
		                        ':data_criacao' => date("Y-m-d H:i:s"));
		        $retorno = $db->insert("videos", $bind);

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/videosalta_getDado", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");

		        $retorno = $db->select_single_to_array("videos",
		                                            "*",
		                                            "
		                                            WHERE id=".$id." ORDER BY id ASC", 
		                                            null);
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/videosalta_getDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
		        $retorno = array();
		        $relatorio = $db->select_to_array("videos",
		                                            "*",
		                                            "
		                                            ORDER BY id ASC", 
		                                            null);
		        if ($relatorio){
		            for($i = 0; $i < count($relatorio); $i++){
		                $retorno[$relatorio[$i]['categoria']][] = $relatorio[$i];
		            }
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/senha_checarCodigoSenhaPrescritor", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$codigo = $request->getParam("codigo");

		        $bind = array(  ':extra' => $codigo);
		        $senha = $db->select_single_to_array("usuarios", "*", "WHERE extra=:extra AND tipo=2 AND status=0",  $bind);

		        $data = $senha;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/senha_checarCodigoSenhaPaciente", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$codigo = $request->getParam("codigo");

		        $bind = array(  ':extra' => $codigo);
		        $senha = $db->select_single_to_array("usuarios", "*", "WHERE extra=:extra AND tipo=1 AND status=0",  $bind);

		        $data = $senha;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/senha_checarPacienteSenha", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$email_cpf = $request->getParam("email_cpf");

		        $retorno = false;
		        $existe = false;
		        $bind = array(  ':email_cpf' => $email_cpf);
		        $senha = $db->select_single_to_array("usuarios", "*", "WHERE email=:email_cpf AND tipo=1 AND status=0",  $bind);

		        if ($senha){
		            $existe = $senha['id'];
		        }
		        else{
		            $bind = array(  ':email_cpf' => $email_cpf);
		            $paciente = $db->select_single_to_array("pacientes", "*", "WHERE (cpf=:email_cpf OR email=:email_cpf) AND status=0",  $bind);
		            if ($paciente){
		                $existe = $paciente['id_usuario'];
		            }
		        }

		        if ($existe){
		            $codigo = randomCode(20);
		            $bind = array(  ':id' => $existe,
		                            ':extra' => endecrypt('encrypt', $codigo));
		            $update = $db->update("usuarios", "WHERE id=:id", $bind);

		            $paciente = $db->select_single_to_array("pacientes", "*", "WHERE id_usuario=".$existe, null);
		            $usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=".$existe, null);

		            $dbind = array( ':tipo'=> 'email',
		                            ':template'=> 'email_senha_paciente',
		                            ':assunto'=> 'Link de recuperação de senha',
		                            ':status'=> 0,
		                            ':extra'=> $existe);
		            $delete = $db->delete("interacoes", "WHERE tipo=:tipo AND template=:template AND assunto=:assunto AND status=:status AND extra=:extra", $dbind);

		            $bind = array(  ':tipo'=> 'email',
		                            ':email'=> $usuario['email'],
		                            ':template'=> 'email_senha_paciente',
		                            ':assunto'=> 'Link de recuperação de senha',
		                            ':conteudo' => json_encode(array('||NOME||' => strtok($paciente['nome'], " "), '||CODIGO||' => $codigo, 'email' => $usuario['email'])),
		                            ':status'=> 0,
		                            ':extra'=> $existe,
		                            ':data_criacao'=> date("Y-m-d H:i:s"));
		            $interacoes = $db->insert('interacoes', $bind);
		            $retorno = true;
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/senha_checarPrescritorSenha", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$email_cpf = $request->getParam("email_cpf");

		        $retorno = false;
		        $existe = false;
		        $bind = array(  ':email_cpf' => $email_cpf);
		        $senha = $db->select_single_to_array("usuarios", "*", "WHERE email=:email_cpf AND tipo=2 AND status=0",  $bind);

		        if ($senha){
		            $existe = $senha['id'];
		        }
		        else{
		            $bind = array(  ':email_cpf' => $email_cpf);
		            $prescritor = $db->select_single_to_array("prescritores", "*", "WHERE (cpf_cnpj=:email_cpf OR email_contato=:email_cpf OR email=:email_cpf) AND status=0",  $bind);
		            if ($prescritor){
		                $existe = $prescritor['id_usuario'];
		            }
		        }

		        if ($existe){
		            $codigo = randomCode(20);
		            $bind = array(  ':id' => $existe,
		                            ':extra' => endecrypt('encrypt', $codigo));
		            $update = $db->update("usuarios", "WHERE id=:id", $bind);

		            $prescritor = $db->select_single_to_array("prescritores", "*", "WHERE id_usuario=".$existe, null);
		            $usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=".$existe, null);

		            $dbind = array( ':tipo'=> 'email',
		                            ':template'=> 'email_senha_prescritor',
		                            ':assunto'=> 'Link de recuperação de senha',
		                            ':status'=> 0,
		                            ':extra'=> $existe);
		            $delete = $db->delete("interacoes", "WHERE tipo=:tipo AND template=:template AND assunto=:assunto AND status=:status AND extra=:extra", $dbind);

		            $bind = array(  ':tipo'=> 'email',
		                            ':email'=> $usuario['email'],
		                            ':template'=> 'email_senha_prescritor',
		                            ':assunto'=> 'Link de recuperação de senha',
		                            ':conteudo' => json_encode(array('||NOME||' => strtok($prescritor['nome'], " "), '||CODIGO||' => $codigo, 'email' => $usuario['email'])),
		                            ':status'=> 0,
		                            ':extra'=> $existe,
		                            ':data_criacao'=> date("Y-m-d H:i:s"));
		            $interacoes = $db->insert('interacoes', $bind);
		            $retorno = true;
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_rmProduto", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
		        
		        $retorno = $db->delete("produtos", "WHERE id='".$id."'", null); 
		        $retorno = $db->delete("produtos_composicao", "WHERE id_produto='".$id."'", null); 
		        $retorno = $db->delete("produtos_info_nutri", "WHERE id_produto='".$id."'", null); 

		        $data = true;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_ptDisponivel", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
				$disponivel = $request->getParam("disponivel");

		        $relatorio = $db->select_single_to_array("relatorios", "id_paciente, id_prescritor","WHERE id = ".$id, null);
		        if ($relatorio){
		            $bind = array(  ':id_paciente' => $relatorio['id_paciente'],
		                            ':id_prescritor' => $relatorio['id_prescritor'],
		                            ':status' => 0);
		            $relatorio = $db->update("relatorios", "WHERE id_paciente=:id_paciente AND id_prescritor=:id_prescritor", $bind);
		        }
		        $bind = array(  ':id' => $id,
		                        ':status' => ($disponivel=="true"?1:0));
		        $relatorios = $db->update("relatorios", "WHERE id=:id", $bind);

		        $data = true;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_ptcomposicao", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

                $produtos_composicao = $db->insert("produtos_composicao", $dados);

		        $data = $produtos_composicao;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_delinfo_nutri", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id_produto = $request->getParam("id_produto");

		       	$db->delete('produtos_info_nutri', "WHERE id_produto=:id_produto", array(':id_produto'=>$id_produto));
        		$db->delete('produtos_composicao', "WHERE id_produto=:id_produto", array(':id_produto'=>$id_produto));

		        $data = true;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_ptinfo_nutri", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $produtos_info_nutri = $db->insert("produtos_info_nutri", $dados);

		        $data = $produtos_info_nutri;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_ptProduto", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
				$id = $dados['_idproduto'];
				unset($dados['_idproduto']);

				$produto = $db->update("produtos", "WHERE id=".$id, $dados);

		        $data = true;

			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $data;
	});

	$app->post("/produto_fabricantes", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
	            $fabricante = array();
	            $produtos = $db->select_to_array("fabricantes", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
	            if ($produtos){
	                $fabricante[0]['id'] = "";
	                $fabricante[0]['text'] = "...";
	                for ($i = 0; $i < count($produtos); $i++){
	                    $fabricante[ ($i+1) ]['id'] = $produtos[$i]['descricao'];
	                    $fabricante[ ($i+1) ]['text'] = $produtos[$i]['descricao'];
	                }
	            }
	            $retorno = array();
	            $retorno['fabricantes'] = $fabricante;

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_composicao", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

				$produtos_composicao = $db->insert("produtos_composicao", $dados);

		        $data = $produtos_composicao;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_info_nutri", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $produtos_info_nutri = $db->insert("produtos_info_nutri", $dados);

		        $data = $produtos_info_nutri;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_stProduto", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $produto = $db->insert("produtos", $dados); 

		        $data = $produto;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_gtProduto", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $produto = $db->select_single_to_array("produtos", "*", "WHERE id=".$dados, null);
		        if ($produto){
		            $produtos_info_nutri = $db->select_to_array("produtos_info_nutri", "descricao, valor", "WHERE id_produto=".$dados, null);
		            $produto['info_nutri'] = $produtos_info_nutri;

		            $produtos_compo = $db->select_to_array("produtos_composicao", "descricao, valor", "WHERE id_produto=".$dados, null);
		            $produto['compo'] = $produtos_compo;
		        }

		        $data = $produto;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_gtProdutos", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
		        $produtos = $db->select_to_array("produtos",
		                                            "id, nome, fabricante",
		                                            "WHERE nome LIKE '%".$dados."%' OR apresentacao LIKE '%".$dados."%' OR fabricante LIKE '%".$dados."%' OR indicacao LIKE '%".$dados."%'", 
		                                            null);

		        $data = $produtos;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_chkProduto", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $verifica = $db->select_single_to_array("produtos",
		                                            "*",
		                                            "WHERE nome='".$dados['nome']."' and via='".$dados['via']."'", 
		                                            null);

		        $data = $verifica;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_gtProdutoFiltros", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");


		        $query = '';
		        if (isset($dados['filtro_fabricante']) and ($dados['filtro_fabricante'] <> "")){
		            if ($dados['filtro_fabricante'] <> "Todos"){
		                $query.= ' AND (fabricante LIKE "%'.$dados['filtro_fabricante'].'%")';
		            }
		        }
		        if (isset($dados['especialidade']) and ($dados['especialidade'] <> "")) $query.= ' AND (especialidade LIKE "%'.$dados['especialidade'].'%")';
		        if (isset($dados['via']) and ($dados['via'] <> "")) $query.= ' AND (via LIKE "%'.$dados['via'].'%")';
		        if (isset($dados['apres_enteral'][0])){
		            $c_query = "";
		            $query.= " AND ";
		            foreach ($dados['apres_enteral'] as $key => $val) {
		                if ($c_query == ""){
		                    $query .= '(';
		                    $c_query = "(";
		                }
		                else{
		                    $query .= ' OR ';
		                }
		                $query.= '(apres_enteral LIKE "%'.$val.'%")';
		            }
		            $query.= ')';
		        }
		        if (isset($dados['carac_enteral'][0])){
		            foreach ($dados['carac_enteral'] as $key => $val) {
		                $query.= ' AND (carac_enteral LIKE "%'.$val.'%")';
		            }
		        }
		        if (isset($dados['apres_oral'][0])){
		            $c_query = "";
		            $query.= " AND ";
		            foreach ($dados['apres_oral'] as $key => $val) {
		                if ($c_query == ""){
		                    $query .= '(';
		                    $c_query = "(";
		                }
		                else{
		                    $query .= ' OR ';
		                }
		                $query.= '(apres_oral LIKE "%'.$val.'%")';
		            }
		            $query.= ')';
		        }
		        if (isset($dados['carac_oral'][0])){
		            $_query = "";
		            foreach ($dados['carac_oral'] as $key => $val) {
		                if ($val <> "Todos"){
		                    $_query.= ' AND (carac_oral LIKE "%'.$val.'%")';
		                }
		                else{
		                    $_query = "";
		                    break;
		                }
		            }
		            $query .= $_query;
		        }

		        if ($query <> '') $query = 'WHERE (status=1 '.$query.')';
		        $produtos = array();

		        $produtos = $db->select_to_array("produtos",
		                                            "id, nome, apres_enteral, carac_enteral, apres_oral, carac_oral, fabricante",
		                                            $query." ORDER BY fabricante, nome ASC", 
		                                            null);

		        $data = $produtos;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_gtProdutoRelatorio", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");


		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // construção de query MySQL
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        if (isset($dados['margem_calorica']) and ($dados['margem_calorica'] <> "")){ $margem_calorica = explode(",", $dados['margem_calorica']); $margem_calorica[0] = strtok($margem_calorica[0],' '); $margem_calorica[1] = strtok($margem_calorica[1],' '); }else{ $margem_calorica[0] = 0; $margem_calorica[1] = 0;}
		        if (isset($dados['margem_proteica']) and ($dados['margem_proteica'] <> "")){ $margem_proteica = explode(",", $dados['margem_proteica']); $margem_proteica[0] = strtok($margem_proteica[0],' '); $margem_proteica[1] = strtok($margem_proteica[1],' '); }else{ $margem_proteica[0] = 0; $margem_proteica[1] = 0;}
		        $query = '';
		        if (isset($dados['categoria']) and ($dados['categoria'] <> "")) $query.= ' AND (especialidade LIKE "%'.$dados['categoria'].'%")';
		        if (isset($dados['tipo_produto']) and ($dados['tipo_produto'] <> "")) $query.= ' AND (via LIKE "%'.$dados['tipo_produto'].'%")';

		        if ($dados['tipo_produto'] == "Enteral"){
		            if (!isset($dados['calculo_apres_fechado'])) $dados['calculo_apres_fechado'] = null;
		            if (!isset($dados['calculo_apres_aberto_liquido'])) $dados['calculo_apres_aberto_liquido'] = null;
		            if (!isset($dados['calculo_apres_aberto_po'])) $dados['calculo_apres_aberto_po'] = null;
		            if (($dados['calculo_apres_fechado'] <> "") or ($dados['calculo_apres_aberto_liquido'] <> "") or ($dados['calculo_apres_aberto_po'] <> "")){
		                $query.= ' AND (';
		                    $_or = '';
		                    if ($dados['calculo_apres_fechado'] <> ""){
		                        $query.= '(apres_enteral LIKE "%Fechado%")';
		                        $_or = ' OR ';
		                    }
		                    if ($dados['calculo_apres_aberto_liquido'] <> ""){
		                        $query.= $_or.' (apres_enteral LIKE "%Aberto (Líquido)%")';
		                        $_or = ' OR ';
		                    }
		                    if ($dados['calculo_apres_aberto_po'] <> ""){
		                        $query.= $_or.' (apres_enteral LIKE "%Aberto (Pó)%")';
		                    }
		                $query.= ' )';
		            }
		            if (isset($dados['calculo_fil_polimerico']) and ($dados['calculo_fil_polimerico'] == "Polimérico")) $query.= ' AND (carac_enteral LIKE "%Polimérico%")';
		            if (isset($dados['calculo_fil_polimerico']) and ($dados['calculo_fil_polimerico'] == "Oligomérico")) $query.= ' AND (carac_enteral LIKE "%Oligomérico%")';
		            if (isset($dados['calculo_fil_polimerico']) and ($dados['calculo_fil_polimerico'] == "Ambos")) $query.= ' AND ((carac_enteral LIKE "%Polimérico%") OR (carac_enteral LIKE "%Oligomérico%"))';
		            if (isset($dados['calculo_fil_comfibras']) and ($dados['calculo_fil_comfibras'] == "Com Fibras")) $query.= ' AND (carac_enteral LIKE "%Com Fibras%")';
		            if (isset($dados['calculo_fil_comfibras']) and ($dados['calculo_fil_comfibras'] == "Sem Fibras")) $query.= ' AND (carac_enteral LIKE "%Sem Fibras%")';
		            if (isset($dados['calculo_fil_comfibras']) and ($dados['calculo_fil_comfibras'] == "Ambos")) $query.= ' AND ((carac_enteral LIKE "%Com Fibras%") OR (carac_enteral LIKE "%Sem Fibras%"))';
		            if (isset($dados['calculo_fil_semlactose']) and ($dados['calculo_fil_semlactose'] <> "")) $query.= ' AND (carac_enteral LIKE "%Sem Lactose%")';
		            if (isset($dados['calculo_fil_semsacarose']) and ($dados['calculo_fil_semsacarose'] <> "")) $query.= ' AND (carac_enteral LIKE "%Sem Sacarose%")';
		            if (isset($dados['calculo_fil_100proteina']) and ($dados['calculo_fil_100proteina'] <> "")) $query.= ' AND (carac_enteral LIKE "%100% Proteína Vegetal%")';
		        }
		        else{
		            if (!isset($dados['calculo_apres_liquidocreme'])) $dados['calculo_apres_liquidocreme'] = null;
		            if (!isset($dados['calculo_apres_po'])) $dados['calculo_apres_po'] = null;
		            if (($dados['calculo_apres_liquidocreme'] <> "") or ($dados['calculo_apres_po'] <> "")){
		                $query.= ' AND (';
		                    $_or = '';
		                    if ($dados['calculo_apres_liquidocreme'] <> ""){
		                        $query.= '(apres_oral LIKE "%Líquido / Creme%")';
		                        $_or = ' OR ';
		                    }
		                    if ($dados['calculo_apres_po'] <> ""){
		                        $query.= $_or.' (apres_oral LIKE "%Pó%")';
		                        $_or = ' OR ';
		                    }
		                $query.= ' )';
		            }
		            if (isset($dados['calculo_fil_todos2']) and ($dados['calculo_fil_todos2'] == "Todos")){
		            }else{
		                if (isset($dados['calculo_fil_semsacarose2']) and ($dados['calculo_fil_semsacarose2'] <> "")) $query.= ' AND (carac_oral LIKE "%Sem Sacarose%")';
		                if (isset($dados['calculo_fil_comfibras2']) and ($dados['calculo_fil_comfibras2'] <> "")) $query.= ' AND (carac_oral LIKE "%Com Fibras%")';
		                if (isset($dados['calculo_fil_semlactose2']) and ($dados['calculo_fil_semlactose2'] <> "")) $query.= ' AND (carac_oral LIKE "%Sem Lactose%")';
		                if (isset($dados['calculo_fil_100proteina2']) and ($dados['calculo_fil_100proteina2'] <> "")) $query.= ' AND (carac_oral LIKE "%100% Proteína Vegetal%")';
		                if (isset($dados['calculo_fil_semfibras2']) and ($dados['calculo_fil_semfibras2'] <> "")) $query.= ' AND (carac_oral LIKE "%Sem Fibras%")';
		            }
		        }

		        if ($query <> '') $query = 'WHERE (status=1 '.$query.')';
		        $produtos = $db->select_to_array("produtos",
		                                            "id, nome, fabricante, apres_enteral, kcal, cho, ptn, lip, fibras, medida_dc, medida_g, medida, unidmedida, volume, apresentacao, final",
		                                            $query." ORDER BY apres_enteral, apres_oral ASC,
															CASE 
																WHEN fabricante = 'PRODIET' THEN 1
																WHEN fabricante = 'DANONE' THEN 2
																WHEN fabricante = ' Danone e Nutrimed' THEN 3
																ELSE 4
															END", 
		                                            null);
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		        $retorno = '';
		        $retorno_thead = '';
		        if ($produtos){
		            if (isset($dados['fracionamento_dia']) and ($dados['fracionamento_dia'] <> "")){
		                $fracionamento_dia = $dados['fracionamento_dia'];
		                if ($fracionamento_dia == "0") $fracionamento_dia = 1;
		            }
		            else{
		                $fracionamento_dia = 1;
		            }

		            for ($i = 0; $i < count($produtos); $i++){
		                $kcal = $produtos[$i]['kcal'];
		                $ptn = $produtos[$i]['ptn'];
		                if ($kcal<>"") $kcal = str_replace(",", ".", $kcal); else $kcal = 0;
		                if ($ptn<>"") $ptn = str_replace(",", ".", $ptn); else $ptn = 0;
		                $kcal = floatval($kcal);
		                $ptn = floatval($ptn);

		                // se tiver mais de 01 volume cadastrado
		                $margem_liberadas = false;
		                $volume_produto = json_decode($produtos[$i]['volume'], true);
		                if (json_last_error() === 0) {
		                    if (is_array($volume_produto)){
		                        if (count($volume_produto)>0){

		                            $medida_dc = json_decode($produtos[$i]['medida_dc'], true);
		                            $_nome = "";  // retirar depois

		                            for ($j = 0; $j < count($volume_produto); $j++){
		                                $_volume = str_replace(" ","", trim($volume_produto[$j]));

		                                $valor_calorio = "-";
		                                $valor_proteico = "-";
		                                $valor_fibra = "-";


		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // formatação de string
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                if (strpos($_volume, 'mL') !== false) {
		                                    $_volume = str_replace("mL","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else if ($_volume == "1L"){
		                                    $_volume = 1000;
		                                }
		                                else if (strpos($_volume, 'g cada') !== false) {
		                                    $_volume = str_replace("g cada","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else if (strpos($_volume, 'g/cada') !== false) {
		                                    $_volume = str_replace("g/cada","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else if (strpos($_volume, 'g') !== false) {
		                                    $_volume = str_replace("g","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else{
		                                    $_volume = chkfloat($_volume);
		                                }
		                                $_medida_dc = 1;
		                                if (isset($medida_dc[$j])){
		                                    $_medida_dc = str_replace(",",".", trim($medida_dc[$j]));
		                                    if ($_medida_dc=="") $_medida_dc = 1;
		                                }
		                                $calorias_dia = "";
		                                $proteina_dia = "";
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // 1º validação da pesquisa:  referente ao range de caloria e proteína
		                                // somente para testar o ranger 
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                if ($produtos[$i]['apres_enteral'] == '["Fechado"]'){


		                                    /*
		                                    - valor caloria =====================================================================================================
		                                    1) ver numero inteiro de bolsas: 
		                                        Frebini Original - Volume Total: 500
		                                        kcal_valor minimo / volume total / dc = 1260 / 500 / 1,0  = 2,52
		                                        kcal_valor maximo / volume total / dc = 1540 / 500 / 1,0 = 3,08

		                                        2430 / 500 = 4,86 = 5 = arredondar para cima
		                                        2970 / 500 = 5,94 = 5 = arredondar para baixo

		                                        qtd bolsas min = 2,1 = o valor arredondado para cima nao pode ser maior que o max arredondado para baixo
		                                        qtd bolsas max = 2,5
		                                    
		                                    2) qtd de bolsas * Volume Total * dc
		                                        valor caloria = 3 * 500 * 1,0 = 1500

		                                        variação calórica = 1500
		                                    */
		                                    $kcal_valor_minimo = $margem_calorica[0] / $_volume / $_medida_dc;
		                                    $kcal_valor_minimo1 = $kcal_valor_minimo;
		                                    $kcal_valor_minimo = ceil($kcal_valor_minimo);
		                                    $kcal_valor_maximo = $margem_calorica[1] / $_volume / $_medida_dc;
		                                    $kcal_valor_maximo1 = $kcal_valor_maximo;
		                                    $kcal_valor_maximo = floor($kcal_valor_maximo);
		                                    if ($kcal_valor_minimo <= $kcal_valor_maximo){
		                                        $qtd_bolsas = $kcal_valor_minimo;
		                                        $_kcal_total = $qtd_bolsas * $_volume * $_medida_dc;
		                                    

		                                        /*
		                                        - valor proteina ===================================================================================================
		                                        1) ver numero inteiro de bolsas: 
		                                            Frebini Original - Volume Total: 500

		                                            (qtd bolsa * volume total * PTN) / 100
		                                            (3 * 500 * 2,5) / 100 = 37,5
		                                        
		                                            variação protêica = 37,5
		                                        */
		                                        $ptn = 1;
		                                        if (trim($produtos[$i]['ptn']) <> ""){
		                                            $ptn = trim($produtos[$i]['ptn']);
		                                            $ptn = str_replace(",",".", $ptn);
		                                        }
		                                        $_ptn_total = ($qtd_bolsas * $_volume * $ptn) / 100;


		                                        $_nome = "<span style='color: #ff0000;'>N</span> qtd bolsas= $qtd_bolsas kcal = $_kcal_total ptn = $_ptn_total "; // retirar depois    
		                                        $valor_calorio = $_kcal_total;
		                                        $valor_proteico = $_ptn_total;
		                                        $calorias_dia = $_kcal_total;
		                                        $proteina_dia = $_ptn_total;
		                                        if (
		                                            (($margem_calorica[0] <= $_kcal_total) and ($margem_calorica[1] >= $_kcal_total)) and
		                                            (($margem_proteica[0] <= $_ptn_total) and ($margem_proteica[1] >= $_ptn_total))
		                                            ){
		                                            $margem_liberadas = true;
		                                            $_nome = "";
		                                        }
		                                    }
		                                }
		                                else if ($produtos[$i]['apres_enteral'] == '["Aberto (Líquido)"]'){
		                                    /*
		                                    - variacao calorica nao precisa condicao
		                                    - PROTEINA
		                                        2400 / 1,2 (Densidade Calórica) = 2000
		                                        2000 / 100 = 20
		                                        20 * 4,4 (PTN) = 88
		                                        */
		                                    $_kcal = $dados['kcal_valor'];
		                                    $_ptn = ($_kcal / $_medida_dc);
		                                    $_ptn = ($_ptn / 100);
		                                    $ptn = 1;
		                                    if (trim($produtos[$i]['ptn']) <> ""){
		                                        $ptn = trim($produtos[$i]['ptn']);
		                                        $ptn = str_replace(",",".", $ptn);
		                                    }                                
		                                    $_ptn_total = $_ptn * $ptn;

		                                    $_nome = "<span style='color: #ff0000;'>N</span> kcal = $_kcal ptn = $_ptn_total ";  // retirar depois                                    
		                                    $calorias_dia = $_kcal;
		                                    $proteina_dia = $_ptn_total;

		                                    $valor_calorio = $_kcal;
		                                    $valor_proteico = $_ptn_total;

		                                    if (($margem_proteica[0] <= $_ptn_total) and ($margem_proteica[1] >= $_ptn_total)){
		                                        $margem_liberadas = true;
		                                        $_nome = "";
		                                    }
		                                }
		                                else if ($produtos[$i]['apres_enteral'] == '["Aberto (Pó)"]'){
		                                    
		                                    $_kcal = $dados['kcal_valor'];
		                                    $volume_final_dieta = $_kcal / $_medida_dc;
		                                    $volume_horario = $volume_final_dieta / $fracionamento_dia;

		                                    $range_kcal = ($volume_horario * $_medida_dc) * $fracionamento_dia;


		                                    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                    // formatação de string
		                                    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                    $medida_g = json_decode($produtos[$i]['medida_g'], true);
		                                    if (!isset($medida_g[0])) $medida_g = 1; else $medida_g = $medida_g[0];
		                                    $medida_g = str_replace(",", ".", $medida_g);
		                                    $medida = json_decode($produtos[$i]['medida'], true);
		                                    if (!isset($medida[0])) $medida = 1; else $medida = $medida[0];
		                                    $_volume_final = json_decode($produtos[$i]['final'], true);
		                                    if (!isset($_volume_final[0])) $_volume_final = 1; else $_volume_final = $_volume_final[0];
		                                    if (strpos($_volume_final, 'mL') !== false) {
		                                        $_volume_final = str_replace("mL","", $_volume_final);
		                                        $_volume_final = str_replace(",",".", $_volume_final);
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }
		                                    else if ($_volume_final == "1L"){
		                                        $_volume_final = 1000;
		                                    }
		                                    else if (strpos($_volume_final, 'g cada') !== false) {
		                                        $_volume_final = str_replace("g cada","", $_volume_final);
		                                        $_volume_final = str_replace(",",".", $_volume_final);
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }
		                                    else if (strpos($_volume_final, 'g/cada') !== false) {
		                                        $_volume_final = str_replace("g/cada","", $_volume_final);
		                                        $_volume_final = str_replace(",",".", $_volume_final);
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }
		                                    else if (strpos($_volume_final, 'g') !== false) {
		                                        $_volume_final = str_replace("g","", $_volume_final);
		                                        $_volume_final = str_replace(",",".", $_volume_final);
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }
		                                    else{
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }                                    
		                                    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                    
		                                    $medida_grama = ($medida * $volume_final_dieta) / $_volume_final;
		                                    $range_ptn = ($medida_grama * $medida_g) / $medida;
		                                    $range_ptn = ($range_ptn * $produtos[$i]['ptn']) / 100;

		                                    $_nome = "<span style='color: #ff0000;'>N</span> kcal = $range_kcal ptn = $range_ptn";  // retirar depois

		                                    $valor_calorio = $range_kcal;
		                                    $valor_proteico = $range_ptn;

		                                    $calorias_dia = $range_kcal;
		                                    $proteina_dia = $range_ptn;

		                                    if (
		                                        (($margem_calorica[0] <= $range_kcal) and ($margem_calorica[1] >= $range_kcal)) and
		                                        (($margem_proteica[0] <= $range_ptn) and ($margem_proteica[1] >= $range_ptn))
		                                        ){
		                                        $_nome = "";
		                                        $margem_liberadas = true;
		                                    }
		                                    else{
		                                        //echo "((".$margem_calorica[0]." <= $range_kcal) and (".$margem_calorica[1]." >= $range_kcal)) and ((".$margem_proteica[0]." <= $range_ptn) and (".$margem_proteica[1]." >= $range_ptn)) \n\n ";
		                                    }
		                                }
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            }
		                        }
		                    }
		                }

		                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                // se for liberada: se passou pelo ranger acima
		                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                if ($margem_liberadas){
		                    $medida_dc = 0;
		                    if ($produtos[$i]['medida_dc'] <> ""){
		                        $medida_dc = json_decode($produtos[$i]['medida_dc'], true);
		                        $medida = json_decode($produtos[$i]['medida'], true);
		                        $final = json_decode($produtos[$i]['final'], true);
		                        $grama = json_decode($produtos[$i]['medida_g'], true);

		                        $titulo = '<td rel="'.$produtos[$i]['id'].'" rowspan="'.count($medida_dc).'"><div class="form-check col-sm-12"><input id="check_dieta'.$produtos[$i]['id'].'" rel="'.$produtos[$i]['id'].'" class="form-check-input styled-checkbox check_dieta" onclick="check_dieta(this, '.$produtos[$i]['id'].');" name="check_dieta'.$produtos[$i]['id'].'" type="checkbox" value=""><label for="check_dieta'.$produtos[$i]['id'].'" class="form-check-label collapseSistema check-green">&nbsp;</label></div> </td>';
		                        $titulo .= '<td rel="'.$produtos[$i]['id'].'" rowspan="'.count($medida_dc).'">'.$produtos[$i]['nome']."  ".$_nome.'</td>';

		                        $cont_array = 0;
		                        $rowspan = 0;
		                        foreach ($medida_dc as $key => &$value) {

		                            $dc = str_replace(",", ".", $value);
		                            if ($dados['kcal_valor'] > 0){
		                                if (($dc == "") or ($dc == "0")) $dc = 1;
		                                $volume_final = $dados['kcal_valor'] / $dc;
		                                if (($fracionamento_dia == "") or ($fracionamento_dia == "0")) $fracionamento_dia = 1;
		                                $volume_horario = $volume_final / $fracionamento_dia;
		                            }
		                            else{
		                                $volume_final = 0;
		                                $volume_horario = 0;
		                            }

		                            $medidas_horario = 0; // informação aberto po
		                            $_volume_final = $volume_final;                      

		                            $volume_horario = (($volume_horario / 10) * 10);
		                            $volume_horario = (round($volume_horario / 10) * 10);

		                            $_volume_horario = $volume_horario;
		                            $volume_final = $volume_horario * $fracionamento_dia;
		                            $volume_final = (round($volume_final / 10) * 10)." ml";
		                            $volume_horario = numberFormatPrecision($volume_horario, 2)." ml";

		                            // faz o reteste sobre o valor calorico e proteico - reversivo para saber se ainda se enquadra.                            
		                            $_valor_calorico = 0;
		                            $_valor_proteico = 0;
		                            if (trim($produtos[$i]['kcal'])<>"") $_kcal = str_replace(",",".", $produtos[$i]['kcal']); else $_kcal = 1;
		                            if (trim($produtos[$i]['ptn'])<>"") $_ptn = str_replace(",",".", $produtos[$i]['ptn']); else $_ptn = 1;
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-



		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // 2º validação da pesquisa:  refente aos calculos dos dados dos produtos -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // calculo reverco de produtos FECHADO =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            $sistema = "";
		                            if ($produtos[$i]['apres_enteral'] == '["Fechado"]'){

		                                if (isset($volume_produto[0])){
		                                    $_volume_produto = str_replace(",",".", trim($volume_produto[0]));
		                                    $_volume_produto = chkfloat($_volume_produto);
		                                    $_volume_final_arredondado = round_up($_volume_final, $_volume_produto);
		                                }else{
		                                    $$_volume_final_arredondado = $_volume_final;
		                                }

		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                $_kcal = $dados['kcal_valor'];

		                                if ($_volume > 0) $_kcal = (($_kcal / $_medida_dc) / $_volume); else $_kcal = ($_kcal / $_medida_dc);
		                                $_kcal = floor($_kcal);
		                                $_volume_final_arredondado = $_kcal * $_volume_produto;
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		                                $_valor_calorico = ($_volume_final_arredondado / 100) * $_kcal; // (500 / 100) * 1   = 5 
		                                $_valor_proteico = ($_volume_final_arredondado / 100) * $_ptn;  // (500 / 100) * 4.5 = 22.5
		                                $volume_final = numberFormatPrecision($_volume_final_arredondado, 2)." ml";   

		                                // 2023-03-06 =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // formula para ajustar volume final
		                                if (!is_numeric($valor_calorio)) $valor_calorio = 1;
		                                if (!is_numeric($_medida_dc)) $_medida_dc = 1;
		                                $volume_final = $valor_calorio / $_medida_dc;
		                                $volume_final = numberFormatPrecision($volume_final, 2)." ml";
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		                                $sistema = "fechado";


		                                $_volume_final = chkfloat($volume_final);
		                                $_fibra = chkstring2float($produtos[$i]['fibras']);
		                                if ($_fibra > 0)
		                                    $valor_fibra = ($_volume_final * $_fibra)/100;
		                                else
		                                    $valor_fibra = 0;


		                            // calculo reverco de produtos ABERTO LÍQUIDO =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		                            }
		                            else if ($produtos[$i]['apres_enteral'] == '["Aberto (Líquido)"]'){
		                                $_valor_calorico = ($_volume_final / 100) * $_kcal;
		                                $_valor_proteico = ($_volume_horario / 100) * $_ptn;
		                                $sistema = "aberto_liquido";

		                                $_volume_final = chkfloat($volume_final);
		                                $_fibra = chkstring2float($produtos[$i]['fibras']);
		                                                                
		                                $valor_fibra = ($_volume_final * $_fibra);                                
		                                if ($valor_fibra>0) $valor_fibra = $valor_fibra /100; else $valor_fibra = 0;


		                            // calculo reverco de produtos ABERTO PÓ =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		                            }
		                            else if ($produtos[$i]['apres_enteral'] == '["Aberto (Pó)"]'){

		                                
		                                $_kcal = $dados['kcal_valor'];
		                                $volume_final_dieta = $_kcal / $_medida_dc;                        
		                                $volume_horario = $volume_final_dieta / $fracionamento_dia;
		                                $volume_horario = (round($volume_horario / 10) * 10);


		                                $volume_final_dieta = $volume_horario * $fracionamento_dia;
		                                $_valor_calorico = ($volume_horario * $_medida_dc) * $fracionamento_dia;

		                                $medida_g = json_decode($produtos[$i]['medida_g'], true);
		                                if (!isset($medida_g[0])) $medida_g = 1; else $medida_g = $medida_g[0];
		                                $medida_g = str_replace(",", ".", $medida_g);
		                                
		                                $_medida = (isset($medida[$key])?$medida[$key]:0);

		                                $_volume_final = json_decode($produtos[$i]['final'], true);
		                                if (!isset($_volume_final[0])) $_volume_final = 1; else $_volume_final = $_volume_final[0];
		                                if (strpos($_volume_final, 'mL') !== false) {
		                                    $_volume_final = str_replace("mL","", $_volume_final);
		                                    $_volume_final = str_replace(",",".", $_volume_final);
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                else if ($_volume_final == "1L"){
		                                    $_volume_final = 1000;
		                                }
		                                else if (strpos($_volume_final, 'g cada') !== false) {
		                                    $_volume_final = str_replace("g cada","", $_volume_final);
		                                    $_volume_final = str_replace(",",".", $_volume_final);
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                else if (strpos($_volume_final, 'g/cada') !== false) {
		                                    $_volume_final = str_replace("g/cada","", $_volume_final);
		                                    $_volume_final = str_replace(",",".", $_volume_final);
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                else if (strpos($_volume_final, 'g') !== false) {
		                                    $_volume_final = str_replace("g","", $_volume_final);
		                                    $_volume_final = str_replace(",",".", $_volume_final);
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                else{
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                $medida_grama = ($_medida * $volume_final_dieta) / $_volume_final;

		                                $_valor_proteico = ($medida_grama * $medida_g) / $_medida;
		                                $_valor_proteico = ($_valor_proteico * $produtos[$i]['ptn']) / 100;

		                                $medidas_horario = ($medida_grama / $fracionamento_dia);
		                                $medidas_horario = floor($medidas_horario * 2) / 2;                
		                                $volume_horario = (chknumber($volume_final) / $fracionamento_dia)." ml";


		                                $nf_medida = ((chkstring2float($medida[$key]) * chkstring2float($volume_horario)) / chkfloat($final[$key]));
		                                $nf_medida = round($nf_medida * 2) / 2;

		                                $nf_grama = chkstring2float($grama[$key]);
		                                $nf_grama = (($nf_grama * $nf_medida) / chkstring2float($medida[$key]));

		                                $nf_dias_grama = ($nf_grama * $fracionamento_dia);

		                                $nf_kcal_dia = ($nf_dias_grama * $produtos[$i]['kcal']) / 100;
		                                $nf_kcal_dia = numberFormatPrecision($nf_kcal_dia, 0);

		                                $nf_ptn_dia = ($nf_dias_grama * $produtos[$i]['ptn']) / 100;
		                                $nf_ptn_dia = numberFormatPrecision($nf_ptn_dia, 1);

		                                $_valor_calorico = $nf_kcal_dia;
		                                $_valor_proteico = $nf_ptn_dia;


		                                // fibra/dia = calculo  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                $fibras_dia = $nf_dias_grama * chkstring2float($produtos[$i]['fibras']);
		                                if ($fibras_dia<>0) $fibras_dia = $fibras_dia / 100;
		                                $valor_fibra = numberFormatPrecision($fibras_dia, 1);
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // 3ª validacao revalida o range das KCAL e PTN -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                //$margem_liberadas = false;
		                                if (
		                                    (($margem_calorica[0] <= $_valor_calorico) and ($margem_calorica[1] >= $_valor_calorico)) and
		                                    (($margem_proteica[0] <= $_valor_proteico) and ($margem_proteica[1] >= $_valor_proteico))
		                                    ){
		                                    $margem_liberadas = true;
		                                    $rowspan = $rowspan+1;
		                                }
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		                                
		                                $sistema = "aberto_po";
		                            }
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            
		                            if (!isset($nf_kcal_dia)) $nf_kcal_dia = null;
		                            if (!isset($nf_ptn_dia)) $nf_ptn_dia = null;


		                            // se tiver no ranger, listar
		                            if ($margem_liberadas){
		                                if ($produtos[$i]['apres_enteral'] == '["Fechado"]'){
		                                    $volume_horario = " - ";
		                                }

		                                $apres_enteral = $produtos[$i]['apres_enteral'];
		                                $apres_enteral_num = '0';
		                                if ($apres_enteral == '["Fechado"]'){ $apres_enteral = 'Fechado'; $apres_enteral_num = '1';
		                                }else if ($apres_enteral == '["Aberto (Líquido)"]'){ $apres_enteral = 'Aberto (Líquido)';  $apres_enteral_num = '2';
		                                }else if ($apres_enteral == '["Aberto (Pó)"]'){ $apres_enteral = 'Aberto (Pó)'; $apres_enteral_num = '3'; }

		                                if ($retorno_thead <> $apres_enteral){
		                                    $retorno_thead = $apres_enteral;
		                                    $retorno .= '<thead>
		                                                    <tr>
		                                                        <th colspan="8" class="entric_group_destaque4 text-center">
		                                                        '.$apres_enteral.' <a href="javascript:void(0);" onclick="fc_collapseSistema(\''.$apres_enteral_num.'\');" class="pull-right" style="color: #fff;"><i class="fa fa-minus-square"></i></a></th>
		                                                    </tr>
		                                                    <tr>
		                                                        <th class="entric_group_destaque5"> <input class="form-check-input collapseSistema" id="collapseSistema'.$apres_enteral_num.'" type="checkbox" value="" onclick="fc_collapsecheckbox('.$apres_enteral_num.')"> </th>
		                                                        <th class="entric_group_destaque5">DIETA</th>
		                                                        <th class="entric_group_destaque5">DILUIÇÃO (KCAL/ML)</th>
		                                                        <th class="entric_group_destaque5">VOLUME FINAL</th>
		                                                        <th class="entric_group_destaque5">VOLUME POR HORÁRIO</th>
		                                                        <th class="entric_group_destaque5">CALORIA</th>
		                                                        <th class="entric_group_destaque5">PROTEÍNA</th>
		                                                        <th class="entric_group_destaque5">FIBRA</th>
		                                                    </tr>
		                                                </thead>
		                                                <tbody id="tbody'.$apres_enteral_num.'">';
		                                }

		                                if (trim($produtos[$i]['kcal'])<>"") $_kcal = str_replace(",",".", $produtos[$i]['kcal']); else $_kcal = 1;
		                                if (trim($produtos[$i]['ptn'])<>"") $_ptn = str_replace(",",".", $produtos[$i]['ptn']); else $_ptn = 1;
		                                if (trim($produtos[$i]['fibras'])<>"") $_fibras = str_replace(",",".", $produtos[$i]['fibras']); else $_fibras = 1;
		    
		                                $retorno .= '<tr>'. $titulo.'
		                                                <td>
		                                                    <div class="form-check col-sm-12">
		                                                        <input id="produto_dc['.$produtos[$i]['id'].'___'.$produtos[$i]['nome'].'___'.$value.'___'.$volume_final.'___'.$volume_horario.'___'.$medidas_horario.']" disabled class="form-check-input styled-checkbox check_apagado diluicao'.$produtos[$i]['id'].'" name="produto_dc['.$produtos[$i]['id'].'___'.$value.']" type="checkbox" value="'.$produtos[$i]['id'].'___'.$produtos[$i]['nome'].'___'.$value.'___'.$volume_final.'___'.$volume_horario.'___'.$medidas_horario.'___'.$sistema.'___'.(($sistema == 'aberto_po' || $sistema = 'aberto_liquido') ? str_replace('.', '', $nf_kcal_dia) : $calorias_dia).'___'.(($sistema == 'aberto_po' || $sistema = 'aberto_liquido') ? str_replace('.', '', $nf_kcal_dia) : $proteina_dia).'___'.(isset($medida[$key])?$medida[$key]:0).'___'.(isset($final[$key])?$final[$key]:0).'___'.(isset($grama[$key])?$grama[$key]:0).'___'.$_kcal.'___'.$_ptn.'___'.$_fibras.'">
		                                                        <label for="produto_dc['.$produtos[$i]['id'].'___'.$produtos[$i]['nome'].'___'.$value.'___'.$volume_final.'___'.$volume_horario.'___'.$medidas_horario.']" class="form-check-label check-green">'.$value.'</label>
		                                                    </div>
		                                                </td>
		                                                <td>'.$volume_final.'</td>
		                                                <td>'.$volume_horario.'</td>
		                                                <td>'.(($sistema == 'aberto_po' || $sistema = 'aberto_liquido') ? str_replace('.', '', $nf_kcal_dia) : numberFormatPrecision($valor_calorio, 0)).'</td>
		                                                <td>'.(($sistema == 'aberto_po' || $sistema = 'aberto_liquido') ? str_replace('.', '', $nf_ptn_dia) : numberFormatPrecision($valor_proteico, 1)).'</td>
		                                                <td>'.$valor_fibra.'</td>
		                                            </tr>';
		                                $titulo = "";

		                            }

		                            $cont_array = $cont_array+1;
		                        }

		                        // ajustar o rowspan da listagem de produtos caso esteja errado
		                        // if (($rowspan <> $medida_dc) and ($produtos[$i]['apres_enteral'] == '["Aberto (Pó)"]')){
		                        //     $retorno = str_replace('<td rel="'.$produtos[$i]['id'].'" rowspan="'.count($medida_dc).'">', '<td rel="'.$produtos[$i]['id'].'" rowspan="'.$rowspan.'">', $retorno);
		                        // }
		                    }
		                }
		            }
		        }
		        if ($retorno<>"") $retorno .= "</tbody>";

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}

		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_gtProdutoRelatorioSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // construção de query MySQL
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
				if (isset($dados['margem_calorica']) and ($dados['margem_calorica'] <> "")){ $margem_calorica = explode(",", $dados['margem_calorica']); $margem_calorica[0] = strtok($margem_calorica[0],' '); $margem_calorica[1] = strtok($margem_calorica[1],' '); }else{ $margem_calorica[0] = 0; $margem_calorica[1] = 0;}
		        if (isset($dados['margem_proteica']) and ($dados['margem_proteica'] <> "")){ $margem_proteica = explode(",", $dados['margem_proteica']); $margem_proteica[0] = strtok($margem_proteica[0],' '); $margem_proteica[1] = strtok($margem_proteica[1],' '); }else{ $margem_proteica[0] = 0; $margem_proteica[1] = 0;}

		        $query = '';
		        if (isset($dados['categoria']) and ($dados['categoria'] <> "")) $query.= ' AND (especialidade LIKE "%'.$dados['categoria'].'%")';
		        if (isset($dados['tipo_produto']) and ($dados['tipo_produto'] <> "")) $query.= ' AND (via LIKE "%'.$dados['tipo_produto'].'%")';

		        if ($dados['tipo_produto'] == "Enteral"){
		            if (!isset($dados['calculo_apres_fechado'])) $dados['calculo_apres_fechado'] = null;
		            if (!isset($dados['calculo_apres_aberto_liquido'])) $dados['calculo_apres_aberto_liquido'] = null;
		            if (!isset($dados['calculo_apres_aberto_po'])) $dados['calculo_apres_aberto_po'] = null;
		            if (($dados['calculo_apres_fechado'] <> "") or ($dados['calculo_apres_aberto_liquido'] <> "") or ($dados['calculo_apres_aberto_po'] <> "")){
		                $query.= ' AND (';
		                    $_or = '';
		                    if ($dados['calculo_apres_fechado'] <> ""){
		                        $query.= '(apres_enteral LIKE "%Fechado%")';
		                        $_or = ' OR ';
		                    }
		                    if ($dados['calculo_apres_aberto_liquido'] <> ""){
		                        $query.= $_or.' (apres_enteral LIKE "%Aberto (Líquido)%")';
		                        $_or = ' OR ';
		                    }
		                    if ($dados['calculo_apres_aberto_po'] <> ""){
		                        $query.= $_or.' (apres_enteral LIKE "%Aberto (Pó)%")';
		                    }
		                $query.= ' )';
		            }
		            if (isset($dados['calculo_fil_polimerico']) and ($dados['calculo_fil_polimerico'] == "Polimérico")) $query.= ' AND (carac_enteral LIKE "%Polimérico%")';
		            if (isset($dados['calculo_fil_polimerico']) and ($dados['calculo_fil_polimerico'] == "Oligomérico")) $query.= ' AND (carac_enteral LIKE "%Oligomérico%")';
		            if (isset($dados['calculo_fil_polimerico']) and ($dados['calculo_fil_polimerico'] == "Ambos")) $query.= ' AND ((carac_enteral LIKE "%Polimérico%") OR (carac_enteral LIKE "%Oligomérico%"))';
		            if (isset($dados['calculo_fil_comfibras']) and ($dados['calculo_fil_comfibras'] == "Com Fibras")) $query.= ' AND (carac_enteral LIKE "%Com Fibras%")';
		            if (isset($dados['calculo_fil_comfibras']) and ($dados['calculo_fil_comfibras'] == "Sem Fibras")) $query.= ' AND (carac_enteral LIKE "%Sem Fibras%")';
		            if (isset($dados['calculo_fil_comfibras']) and ($dados['calculo_fil_comfibras'] == "Ambos")) $query.= ' AND ((carac_enteral LIKE "%Com Fibras%") OR (carac_enteral LIKE "%Sem Fibras%"))';
		            if (isset($dados['calculo_fil_semlactose']) and ($dados['calculo_fil_semlactose'] <> "")) $query.= ' AND (carac_enteral LIKE "%Sem Lactose%")';
		            if (isset($dados['calculo_fil_semsacarose']) and ($dados['calculo_fil_semsacarose'] <> "")) $query.= ' AND (carac_enteral LIKE "%Sem Sacarose%")';
		            if (isset($dados['calculo_fil_100proteina']) and ($dados['calculo_fil_100proteina'] <> "")) $query.= ' AND (carac_enteral LIKE "%100% Proteína Vegetal%")';
		        }
		        else{
		            if (!isset($dados['calculo_apres_liquidocreme'])) $dados['calculo_apres_liquidocreme'] = null;
		            if (!isset($dados['calculo_apres_po'])) $dados['calculo_apres_po'] = null;
		            if (($dados['calculo_apres_liquidocreme'] <> "") or ($dados['calculo_apres_po'] <> "")){
		                $query.= ' AND (';
		                    $_or = '';
		                    if ($dados['calculo_apres_liquidocreme'] <> ""){
		                        $query.= '(apres_oral LIKE "%Líquido / Creme%")';
		                        $_or = ' OR ';
		                    }
		                    if ($dados['calculo_apres_po'] <> ""){
		                        $query.= $_or.' (apres_oral LIKE "%Pó%")';
		                        $_or = ' OR ';
		                    }
		                $query.= ' )';
		            }
		            if (isset($dados['calculo_fil_todos2']) and ($dados['calculo_fil_todos2'] == "Todos")){
		            }else{
		                if (isset($dados['calculo_fil_semsacarose2']) and ($dados['calculo_fil_semsacarose2'] <> "")) $query.= ' AND (carac_oral LIKE "%Sem Sacarose%")';
		                if (isset($dados['calculo_fil_comfibras2']) and ($dados['calculo_fil_comfibras2'] <> "")) $query.= ' AND (carac_oral LIKE "%Com Fibras%")';
		                if (isset($dados['calculo_fil_semlactose2']) and ($dados['calculo_fil_semlactose2'] <> "")) $query.= ' AND (carac_oral LIKE "%Sem Lactose%")';
		                if (isset($dados['calculo_fil_100proteina2']) and ($dados['calculo_fil_100proteina2'] <> "")) $query.= ' AND (carac_oral LIKE "%100% Proteína Vegetal%")';
		                if (isset($dados['calculo_fil_semfibras2']) and ($dados['calculo_fil_semfibras2'] <> "")) $query.= ' AND (carac_oral LIKE "%Sem Fibras%")';
		            }
		        }

		        if ($query <> '') $query = 'WHERE (status=1 '.$query.')';
		        $produtos = $db->select_to_array("produtos",
		                                            "id, nome, fabricante, apres_enteral, kcal, cho, ptn, lip, fibras, medida_dc, medida_g, medida, unidmedida, volume, apresentacao, final",
		                                            $query." ORDER BY apres_enteral, apres_oral ASC,
															CASE 
																WHEN fabricante = 'PRODIET' THEN 1
																WHEN fabricante = 'DANONE' THEN 2
																WHEN fabricante = ' Danone e Nutrimed' THEN 3
																ELSE 4
															END", 
		                                            null);
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


		        $retorno = '';
		        $retorno_thead = '';
		        if ($produtos){
		            if (isset($dados['fracionamento_dia']) and ($dados['fracionamento_dia'] <> "")){
		                $fracionamento_dia = $dados['fracionamento_dia'];
		                if ($fracionamento_dia == "0") $fracionamento_dia = 1;
		            }
		            else{
		                $fracionamento_dia = 1;
		            }

					$qtd_fechado = 0;
					$qtd_aberto_liquido = 0;
					$qtd_aberto_po = 0;

		            for ($i = 0; $i < count($produtos); $i++){
		                $kcal = $produtos[$i]['kcal'];
		                $ptn = $produtos[$i]['ptn'];
		                if ($kcal<>"") $kcal = str_replace(",", ".", $kcal); else $kcal = 0;
		                if ($ptn<>"") $ptn = str_replace(",", ".", $ptn); else $ptn = 0;
		                $kcal = floatval($kcal);
		                $ptn = floatval($ptn);

		                // se tiver mais de 01 volume cadastrado
		                $margem_liberadas = false;
		                $volume_produto = json_decode($produtos[$i]['volume'], true);
		                if (json_last_error() === 0) {
		                    if (is_array($volume_produto)){
		                        if (count($volume_produto)>0){

		                            $medida_dc = json_decode($produtos[$i]['medida_dc'], true);
		                            $_nome = "";  // retirar depois

		                            for ($j = 0; $j < count($volume_produto); $j++){
		                                $_volume = str_replace(" ","", trim($volume_produto[$j]));

		                                $valor_calorio = "-";
		                                $valor_proteico = "-";
		                                $valor_fibra = "-";


		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // formatação de string
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                if (strpos($_volume, 'mL') !== false) {
		                                    $_volume = str_replace("mL","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else if ($_volume == "1L"){
		                                    $_volume = 1000;
		                                }
		                                else if (strpos($_volume, 'g cada') !== false) {
		                                    $_volume = str_replace("g cada","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else if (strpos($_volume, 'g/cada') !== false) {
		                                    $_volume = str_replace("g/cada","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else if (strpos($_volume, 'g') !== false) {
		                                    $_volume = str_replace("g","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else{
		                                    $_volume = chkfloat($_volume);
		                                }
		                                
		                                $calorias_dia = "";
		                                $proteina_dia = "";
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-




		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // 1º validação da pesquisa:  referente ao range de caloria e proteína
		                                // somente para testar o ranger 
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                if ($produtos[$i]['apres_enteral'] == '["Fechado"]'){

											$_medida_dc = 1;
											if (isset($medida_dc[0])){
												$_medida_dc = $medida_dc[0];
											}
		                                    /*
		                                    - valor caloria =====================================================================================================
		                                    1) ver numero inteiro de bolsas: 
		                                        Frebini Original - Volume Total: 500
		                                        kcal_valor minimo / volume total / dc = 1260 / 500 / 1,0  = 2,52
		                                        kcal_valor maximo / volume total / dc = 1540 / 500 / 1,0 = 3,08

		                                        2430 / 500 = 4,86 = 5 = arredondar para cima
		                                        2970 / 500 = 5,94 = 5 = arredondar para baixo

		                                        qtd bolsas min = 2,1 = o valor arredondado para cima nao pode ser maior que o max arredondado para baixo
		                                        qtd bolsas max = 2,5
		                                    
		                                    2) qtd de bolsas * Volume Total * dc
		                                        valor caloria = 3 * 500 * 1,0 = 1500

		                                        variação calórica = 1500
		                                    */
											if($_volume == 0 || $_medida_dc == 0){
												$kcal_valor_minimo = 0;
												$kcal_valor_minimo = ceil($kcal_valor_minimo);
												$kcal_valor_maximo = 1;
												$kcal_valor_maximo = floor($kcal_valor_maximo);
											} else{
												$kcal_valor_minimo = $margem_calorica[0] / $_volume / $_medida_dc;

												$kcal_valor_minimo1 = $kcal_valor_minimo;
												$kcal_valor_minimo = ceil($kcal_valor_minimo);

												$kcal_valor_maximo = $margem_calorica[1] / $_volume / $_medida_dc;
												$kcal_valor_maximo1 = $kcal_valor_maximo;
												$kcal_valor_maximo = floor($kcal_valor_maximo);
											}
		                                    if ($kcal_valor_minimo <= $kcal_valor_maximo){
		                                        $qtd_bolsas = $kcal_valor_minimo;
		                                        // $_kcal_total = $qtd_bolsas * $_volume * $_medida_dc;
												$kcal = 1;
		                                        if (trim($produtos[$i]['kcal']) <> ""){
		                                            $kcal = trim($produtos[$i]['kcal']);
		                                            $kcal = str_replace(",",".", $kcal);
		                                        }

		                                        $_kcal_total = ($qtd_bolsas * $_volume * $kcal) / 100;

		                                        /*
		                                        - valor proteina ===================================================================================================
		                                        1) ver numero inteiro de bolsas: 
		                                            Frebini Original - Volume Total: 500

		                                            (qtd bolsa * volume total * PTN) / 100
		                                            (3 * 500 * 2,5) / 100 = 37,5
		                                        
		                                            variação protêica = 37,5
		                                        */
		                                        $ptn = 1;
		                                        if (trim($produtos[$i]['ptn']) <> ""){
		                                            $ptn = trim($produtos[$i]['ptn']);
		                                            $ptn = str_replace(",",".", $ptn);
		                                        }
		                                        $_ptn_total = ($qtd_bolsas * $_volume * $ptn) / 100;


		                                        $valor_calorio = $_kcal_total;
		                                        $valor_proteico = $_ptn_total;
		                                        $calorias_dia = $_kcal_total;
		                                        $proteina_dia = $_ptn_total;


		                                        if (
		                                            ((intval($margem_calorica[0]) <= intval($_kcal_total)) and (intval($margem_calorica[1]) >= intval($_kcal_total))) and
		                                            ((intval($margem_proteica[0]) <= intval($_ptn_total)) and (intval($margem_proteica[1]) >= intval($_ptn_total)))
		                                            ){
		                                            $margem_liberadas = true;
		                                            $_nome = "";
		                                        }else{
													$margem_liberadas = false;
												}
		                                    }
		                                }
		                                else if ($produtos[$i]['apres_enteral'] == '["Aberto (Líquido)"]'){
		                                    /*
		                                    - variacao calorica nao precisa condicao
		                                    - PROTEINA
		                                        2400 / 1,2 (Densidade Calórica) = 2000
		                                        2000 / 100 = 20
		                                        20 * 4,4 (PTN) = 88
		                                        */

											$_medida_dc = 1;
											if (isset($medida_dc[0])){
												$_medida_dc = $medida_dc[0];
											}
		                                    $_kcal = $dados['kcal_valor'];
		                                    $_ptn = ($_kcal / $_medida_dc);
		                                    $_ptn = ($_ptn / 100);
		                                    $ptn = 1;
		                                    if (trim($produtos[$i]['ptn']) <> ""){
		                                        $ptn = trim($produtos[$i]['ptn']);
		                                        $ptn = str_replace(",",".", $ptn);
		                                    }                                
		                                    $_ptn_total = $_ptn * $ptn;

		                                    $calorias_dia = $_kcal;
		                                    $proteina_dia = $_ptn_total;

		                                    $valor_calorio = $_kcal;
		                                    $valor_proteico = $_ptn_total;

		                                    if (($margem_proteica[0] <= $_ptn_total) and ($margem_proteica[1] >= $_ptn_total)){
		                                        $margem_liberadas = true;
		                                        $_nome = "";
		                                    }
		                                }
		                                else if ($produtos[$i]['apres_enteral'] == '["Aberto (Pó)"]'){
											$_medida_dc = 1;
											if (isset($medida_dc[$j])){
												$_medida_dc = str_replace(",",".", trim($medida_dc[$j]));
												if ($_medida_dc=="") $_medida_dc = 1;
											}
		                                    $_kcal = $dados['kcal_valor'];
		                                    $volume_final_dieta = $_kcal / $_medida_dc;
		                                    $volume_horario = $volume_final_dieta / $fracionamento_dia;

		                                    $range_kcal = ($volume_horario * $_medida_dc) * $fracionamento_dia;


		                                    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                    // formatação de string
		                                    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                    $medida_g = json_decode($produtos[$i]['medida_g'], true);
		                                    if (!isset($medida_g[0])) $medida_g = 1; else $medida_g = $medida_g[0];
		                                    $medida_g = str_replace(",", ".", $medida_g);
		                                    $medida = json_decode($produtos[$i]['medida'], true);
		                                    if (!isset($medida[0])) $medida = 1; else $medida = $medida[0];
		                                    $_volume_final = json_decode($produtos[$i]['final'], true);
		                                    if (!isset($_volume_final[0])) $_volume_final = 1; else $_volume_final = $_volume_final[0];
		                                    if (strpos($_volume_final, 'mL') !== false) {
		                                        $_volume_final = str_replace("mL","", $_volume_final);
		                                        $_volume_final = str_replace(",",".", $_volume_final);
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }
		                                    else if ($_volume_final == "1L"){
		                                        $_volume_final = 1000;
		                                    }
		                                    else if (strpos($_volume_final, 'g cada') !== false) {
		                                        $_volume_final = str_replace("g cada","", $_volume_final);
		                                        $_volume_final = str_replace(",",".", $_volume_final);
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }
		                                    else if (strpos($_volume_final, 'g/cada') !== false) {
		                                        $_volume_final = str_replace("g/cada","", $_volume_final);
		                                        $_volume_final = str_replace(",",".", $_volume_final);
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }
		                                    else if (strpos($_volume_final, 'g') !== false) {
		                                        $_volume_final = str_replace("g","", $_volume_final);
		                                        $_volume_final = str_replace(",",".", $_volume_final);
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }
		                                    else{
		                                        $_volume_final = chkfloat($_volume_final);
		                                    }                                    
		                                    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                    
		                                    $medida_grama = ($medida * $volume_final_dieta) / $_volume_final;
		                                    $range_ptn = ($medida_grama * $medida_g) / $medida;
		                                    $range_ptn = ($range_ptn * $produtos[$i]['ptn']) / 100;

		                                    $valor_calorio = $range_kcal;
		                                    $valor_proteico = $range_ptn;

		                                    $calorias_dia = $range_kcal;
		                                    $proteina_dia = $range_ptn;

		                                    if (
		                                        (($margem_calorica[0] <= $range_kcal) and ($margem_calorica[1] >= $range_kcal)) and
		                                        (($margem_proteica[0] <= $range_ptn) and ($margem_proteica[1] >= $range_ptn))
		                                        ){
		                                        $_nome = "";
		                                        $margem_liberadas = true;
		                                    }
		                                    else{
												// $cal_atual = $range_kcal;
												// $prot_atual = $range_ptn;
												// $cal_min = $margem_calorica[0];
												// $cal_max = $margem_calorica[1];
												// $prot_min = $margem_proteica[0];
												// $prot_max = $margem_proteica[1];
												// $peso_atual = $_volume_final;

												// // Calorias e proteínas por grama do produto
												// $cal_per_g = $cal_atual / $peso_atual;
												// $prot_per_g = $prot_atual / $peso_atual;

												// // Determinar o peso necessário para ficar dentro da faixa de calorias
												// $peso_cal_min = $cal_min / $cal_per_g;
												// $peso_cal_max = $cal_max / $cal_per_g;

												// // Determinar o peso necessário para ficar dentro da faixa de proteínas
												// $peso_prot_min = $prot_min / $prot_per_g;
												// $peso_prot_max = $prot_max / $prot_per_g;

												// // Interseção dos pesos permitidos
												// $peso_min = max($peso_cal_min, $peso_prot_min);
												// $peso_max = min($peso_cal_max, $peso_prot_max);

												// // Verificar se existe uma interseção válida
												// if ($peso_min <= $peso_max) {
												// 	// Calcular as calorias e proteínas correspondentes ao peso ajustado
												// 	$peso_ajustado = $peso_min; // Pegamos o peso mínimo válido dentro do intervalo
												// 	$cal_ajustado = $peso_ajustado * $cal_per_g;
												// 	$prot_ajustado = $peso_ajustado * $prot_per_g;

												// 	return [
												// 		'peso' => $peso_ajustado,
												// 		'calorias' => $cal_ajustado,
												// 		'proteinas' => $prot_ajustado,
												// 	];
												// }
		                                        //echo "((".$margem_calorica[0]." <= $range_kcal) and (".$margem_calorica[1]." >= $range_kcal)) and ((".$margem_proteica[0]." <= $range_ptn) and (".$margem_proteica[1]." >= $range_ptn)) \n\n ";
		                                    }
		                                }
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            }
		                        }
		                    }
		                }


		                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                // se for liberada: se passou pelo ranger acima
		                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                if ($margem_liberadas){
		                    $medida_dc = 0;
		                    if ($produtos[$i]['medida_dc'] <> ""){
		                        $medida_dc = json_decode($produtos[$i]['medida_dc'], true);
		                        $medida = json_decode($produtos[$i]['medida'], true);
		                        $final = json_decode($produtos[$i]['final'], true);
		                        $grama = json_decode($produtos[$i]['medida_g'], true);
								$medida_dc = array_unique($medida_dc);

		                        $titulo = '<td rel="'.$produtos[$i]['id'].'" rowspan="'.count($medida_dc).'"><div class="form-check col-sm-12"><input id="check_dieta'.$produtos[$i]['id'].'" rel="'.$produtos[$i]['id'].'" class="form-check-input styled-checkbox check_dieta" onclick="check_dieta(this, '.$produtos[$i]['id'].');" name="check_dieta'.$produtos[$i]['id'].'" type="checkbox" value=""><label for="check_dieta'.$produtos[$i]['id'].'" class="form-check-label collapseSistema check-green">&nbsp;</label></div> </td>';
		                        $titulo .= '<td rel="'.$produtos[$i]['id'].'" rowspan="'.count($medida_dc).'">'.$produtos[$i]['nome']."  ".$_nome.'</td>';

		                        $cont_array = 0;
		                        $rowspan = 0;
		                        foreach ($medida_dc as $key => &$value) {

		                            $dc = str_replace(",", ".", $value);
		                            if ($dados['kcal_valor'] > 0){
		                                if (($dc == "") or ($dc == "0")) $dc = 1;
		                                $volume_final = $dados['kcal_valor'] / $dc;
		                                if (($fracionamento_dia == "") or ($fracionamento_dia == "0")) $fracionamento_dia = 1;
		                                $volume_horario = $volume_final / $fracionamento_dia;
		                            }
		                            else{
		                                $volume_final = 0;
		                                $volume_horario = 0;
		                            }

		                            $medidas_horario = 0; // informação aberto po
		                            $_volume_final = $volume_final;                      

		                            $volume_horario = (($volume_horario / 10) * 10);
		                            $volume_horario = (round($volume_horario / 10) * 10);

		                            $_volume_horario = $volume_horario;
		                            $volume_final = $volume_horario * $fracionamento_dia;
		                            $volume_final = (round($volume_final / 10) * 10)." ml";
		                            $volume_horario = numberFormatPrecision($volume_horario, 2)." ml";

		                            // faz o reteste sobre o valor calorico e proteico - reversivo para saber se ainda se enquadra.                            
		                            $_valor_calorico = 0;
		                            $_valor_proteico = 0;
		                            if (trim($produtos[$i]['kcal'])<>"") $_kcal = str_replace(",",".", $produtos[$i]['kcal']); else $_kcal = 1;
		                            if (trim($produtos[$i]['ptn'])<>"") $_ptn = str_replace(",",".", $produtos[$i]['ptn']); else $_ptn = 1;
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-



		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // 2º validação da pesquisa:  refente aos calculos dos dados dos produtos -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // calculo reverco de produtos FECHADO =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            $sistema = "";
		                            if ($produtos[$i]['apres_enteral'] == '["Fechado"]'){

		                                if (isset($volume_produto[0])){
		                                    $_volume_produto = str_replace(",",".", trim($volume_produto[0]));
		                                    $_volume_produto = chkfloat($_volume_produto);
		                                    $_volume_final_arredondado = round_up($_volume_final, $_volume_produto);
		                                }else{
		                                    $$_volume_final_arredondado = $_volume_final;
		                                }

		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                $_kcal = $dados['kcal_valor'];

		                                if ($_volume > 0) $_kcal = (($_kcal / $_medida_dc) / $_volume); else $_kcal = ($_kcal / $_medida_dc);
		                                $_kcal = floor($_kcal);
		                                $_volume_final_arredondado = $_kcal * $_volume_produto;
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		                                $_valor_calorico = ($_volume_final_arredondado / 100) * $_kcal; // (500 / 100) * 1   = 5 
		                                $_valor_proteico = ($_volume_final_arredondado / 100) * $_ptn;  // (500 / 100) * 4.5 = 22.5
		                                $volume_final = numberFormatPrecision($_volume_final_arredondado, 2)." ml";   

		                                // 2023-03-06 =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // formula para ajustar volume final
		                                if (!is_numeric($valor_calorio)) $valor_calorio = 1;
		                                if (!is_numeric($_medida_dc)) $_medida_dc = 1;
		                                $volume_final = $qtd_bolsas * $_volume;
		                                $volume_final = numberFormatPrecision($volume_final, 2)." ml";
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		                                $sistema = "fechado";


		                                $_volume_final = chkfloat($volume_final);
		                                $_fibra = chkstring2float($produtos[$i]['fibras']);
		                                if ($_fibra > 0)
		                                    $valor_fibra = ($_volume_final * $_fibra)/100;
		                                else
		                                    $valor_fibra = 0;


		                            // calculo reverco de produtos ABERTO LÍQUIDO =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		                            }
		                            else if ($produtos[$i]['apres_enteral'] == '["Aberto (Líquido)"]'){
		                                $_valor_calorico = ($_volume_final / 100) * $_kcal;
		                                $_valor_proteico = ($_volume_horario / 100) * $_ptn;
		                                $sistema = "aberto_liquido";
		                                $_volume_final = chkfloat($volume_final);

		                                $nf_kcal_dia = ($_volume_final * str_replace(",", ".", $produtos[$i]['kcal'])) / 100;
		                                $nf_kcal_dia = numberFormatPrecision($nf_kcal_dia, 0);

										$nf_ptn_dia = ($_volume_final * str_replace(",", ".", $produtos[$i]['ptn'])) / 100;
		                                $nf_ptn_dia = numberFormatPrecision($nf_ptn_dia, 1);

		                                $_fibra = chkstring2float($produtos[$i]['fibras']);               
		                                $valor_fibra = ($_volume_final * $_fibra);                                
		                                if ($valor_fibra>0) $valor_fibra = $valor_fibra /100; else $valor_fibra = 0;


		                            // calculo reverco de produtos ABERTO PÓ =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		                            }
		                            else if ($produtos[$i]['apres_enteral'] == '["Aberto (Pó)"]'){

		                                
		                                $_kcal = $dados['kcal_valor'];
		                                $volume_final_dieta = $_kcal / $_medida_dc;                        
		                                $volume_horario = $volume_final_dieta / $fracionamento_dia;
		                                $volume_horario = (round($volume_horario / 10) * 10);


		                                $volume_final_dieta = $volume_horario * $fracionamento_dia;
		                                $_valor_calorico = ($volume_horario * $_medida_dc) * $fracionamento_dia;

		                                $medida_g = json_decode($produtos[$i]['medida_g'], true);
		                                if (!isset($medida_g[0])) $medida_g = 1; else $medida_g = $medida_g[0];
		                                $medida_g = str_replace(",", ".", $medida_g);
		                                
		                                $_medida = (isset($medida[$key])?$medida[$key]:0);

		                                $_volume_final = json_decode($produtos[$i]['final'], true);
		                                if (!isset($_volume_final[0])) $_volume_final = 1; else $_volume_final = $_volume_final[0];
		                                if (strpos($_volume_final, 'mL') !== false) {
		                                    $_volume_final = str_replace("mL","", $_volume_final);
		                                    $_volume_final = str_replace(",",".", $_volume_final);
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                else if ($_volume_final == "1L"){
		                                    $_volume_final = 1000;
		                                }
		                                else if (strpos($_volume_final, 'g cada') !== false) {
		                                    $_volume_final = str_replace("g cada","", $_volume_final);
		                                    $_volume_final = str_replace(",",".", $_volume_final);
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                else if (strpos($_volume_final, 'g/cada') !== false) {
		                                    $_volume_final = str_replace("g/cada","", $_volume_final);
		                                    $_volume_final = str_replace(",",".", $_volume_final);
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                else if (strpos($_volume_final, 'g') !== false) {
		                                    $_volume_final = str_replace("g","", $_volume_final);
		                                    $_volume_final = str_replace(",",".", $_volume_final);
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                else{
		                                    $_volume_final = chkfloat($_volume_final);
		                                }
		                                $medida_grama = ($_medida * $volume_final_dieta) / $_volume_final;

		                                $_valor_proteico = ($medida_grama * $medida_g) / $_medida;
		                                $_valor_proteico = ($_valor_proteico * $produtos[$i]['ptn']) / 100;

		                                $medidas_horario = ($medida_grama / $fracionamento_dia);
		                                $medidas_horario = floor($medidas_horario * 2) / 2;                
		                                $volume_horario = (chknumber($volume_final) / $fracionamento_dia)." ml";


		                                $nf_medida = ((chkstring2float($medida[$key]) * chkstring2float($volume_horario)) / chkfloat($final[$key]));
		                                $nf_medida = round($nf_medida * 2) / 2;

		                                $nf_grama = chkstring2float($grama[$key]);
		                                $nf_grama = (($nf_grama * $nf_medida) / chkstring2float($medida[$key]));

		                                $nf_dias_grama = ($nf_grama * $fracionamento_dia);

		                                $nf_kcal_dia = ($nf_dias_grama * $produtos[$i]['kcal']) / 100;
		                                $nf_kcal_dia = numberFormatPrecision($nf_kcal_dia, 0);

		                                $nf_ptn_dia = ($nf_dias_grama * $produtos[$i]['ptn']) / 100;
		                                $nf_ptn_dia = numberFormatPrecision($nf_ptn_dia, 1);

		                                $_valor_calorico = $nf_kcal_dia;
		                                $_valor_proteico = $nf_ptn_dia;


		                                // fibra/dia = calculo  =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                $fibras_dia = $nf_dias_grama * chkstring2float($produtos[$i]['fibras']);
		                                if ($fibras_dia<>0) $fibras_dia = $fibras_dia / 100;
		                                $valor_fibra = numberFormatPrecision($fibras_dia, 1);
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // 3ª validacao revalida o range das KCAL e PTN -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                //$margem_liberadas = false;
		                                if (
		                                    (($margem_calorica[0] <= $_valor_calorico) and ($margem_calorica[1] >= $_valor_calorico)) and
		                                    (($margem_proteica[0] <= $_valor_proteico) and ($margem_proteica[1] >= $_valor_proteico))
		                                    ){
		                                    $margem_liberadas = true;
		                                    $rowspan = $rowspan+1;
		                                }
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		                                
		                                $sistema = "aberto_po";
		                            }
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            
		                            if (!isset($nf_kcal_dia)) $nf_kcal_dia = null;
		                            if (!isset($nf_ptn_dia)) $nf_ptn_dia = null;


		                            // se tiver no ranger, listar
		                            if ($margem_liberadas){
		                                if ($produtos[$i]['apres_enteral'] == '["Fechado"]'){
		                                    $volume_horario = " - ";
		                                }

		                                $apres_enteral = $produtos[$i]['apres_enteral'];
		                                $apres_enteral_num = '0';
		                                if ($apres_enteral == '["Fechado"]'){ $apres_enteral = 'Fechado'; $apres_enteral_num = '1';
		                                }else if ($apres_enteral == '["Aberto (Líquido)"]'){ $apres_enteral = 'Aberto (Líquido)';  $apres_enteral_num = '2';
		                                }else if ($apres_enteral == '["Aberto (Pó)"]'){ $apres_enteral = 'Aberto (Pó)'; $apres_enteral_num = '3'; }

		                                if ($retorno_thead <> $apres_enteral){
		                                    $retorno_thead = $apres_enteral;
		                                    $retorno .= '<thead>
		                                                    <tr>
		                                                        <th colspan="8" class="entric_group_destaque4 text-center">
		                                                        '.$apres_enteral.' <a href="javascript:void(0);" onclick="fc_collapseSistema(\''.$apres_enteral_num.'\');" class="pull-right" style="color: #fff;"><i class="fa fa-minus-square"></i></a></th>
		                                                    </tr>
		                                                    <tr>
		                                                        <th class="entric_group_destaque5"> <input class="form-check-input collapseSistema" id="collapseSistema'.$apres_enteral_num.'" type="checkbox" value="" onclick="fc_collapsecheckbox('.$apres_enteral_num.')"> </th>
		                                                        <th class="entric_group_destaque5">DIETA</th>
		                                                        <th class="entric_group_destaque5">DILUIÇÃO (KCAL/ML)</th>
		                                                        <th class="entric_group_destaque5">VOLUME FINAL</th>
		                                                        <th class="entric_group_destaque5">VOLUME POR HORÁRIO</th>
		                                                        <th class="entric_group_destaque5">CALORIA</th>
		                                                        <th class="entric_group_destaque5">PROTEÍNA</th>
		                                                        <th class="entric_group_destaque5">FIBRA</th>
		                                                    </tr>
		                                                </thead>
		                                                <tbody id="tbody'.$apres_enteral_num.'">';
		                                }

		                                if (trim($produtos[$i]['kcal'])<>"") $_kcal = str_replace(",",".", $produtos[$i]['kcal']); else $_kcal = 1;
		                                if (trim($produtos[$i]['ptn'])<>"") $_ptn = str_replace(",",".", $produtos[$i]['ptn']); else $_ptn = 1;
		                                if (trim($produtos[$i]['fibras'])<>"") $_fibras = str_replace(",",".", $produtos[$i]['fibras']); else $_fibras = 1;
		    
		                                $retorno .= '<tr>'. $titulo.'
		                                                <td>
		                                                    <div class="form-check col-sm-12">
		                                                        <input id="produto_dc['.$produtos[$i]['id'].'___'.$produtos[$i]['nome'].'___'.$value.'___'.$volume_final.'___'.$volume_horario.'___'.$medidas_horario.']" disabled class="form-check-input styled-checkbox check_apagado diluicao'.$produtos[$i]['id'].'" name="produto_dc['.$produtos[$i]['id'].'___'.$value.']" type="checkbox" value="'.$produtos[$i]['id'].'___'.$produtos[$i]['nome'].'___'.$value.'___'.$volume_final.'___'.$volume_horario.'___'.$medidas_horario.'___'.$sistema.'___'.(($sistema == 'aberto_po' || $sistema == 'aberto_liquido') ? str_replace('.', '', $nf_kcal_dia) : $calorias_dia).'___'.(($sistema == 'aberto_po' || $sistema == 'aberto_liquido') ? $nf_ptn_dia : $proteina_dia).'___'.(isset($medida[$key])?$medida[$key]:0).'___'.(isset($final[$key])?$final[$key]:0).'___'.(isset($grama[$key])?$grama[$key]:0).'___'.$_kcal.'___'.$_ptn.'___'.$_fibras.'">
		                                                        <label for="produto_dc['.$produtos[$i]['id'].'___'.$produtos[$i]['nome'].'___'.$value.'___'.$volume_final.'___'.$volume_horario.'___'.$medidas_horario.']" class="form-check-label check-green">'.$value.'</label>
		                                                    </div>
		                                                </td>
		                                                <td>'.$volume_final.'</td>
		                                                <td>'.$volume_horario.'</td>
		                                                <td>'.(($sistema == 'aberto_po' || $sistema == 'aberto_liquido') ? str_replace('.', '', $nf_kcal_dia) : numberFormatPrecision($valor_calorio, 0)).'</td>
		                                                <td>'.(($sistema == 'aberto_po' || $sistema == 'aberto_liquido') ? $nf_ptn_dia : numberFormatPrecision($valor_proteico, 1)).'</td>
		                                                <td>'.$valor_fibra.'</td>
		                                            </tr>';
		                                $titulo = "";
		                            }

		                            $cont_array = $cont_array+1;
		                        }

		                        // ajustar o rowspan da listagem de produtos caso esteja errado
		                        if (($rowspan <> count($medida_dc)) && ($produtos[$i]['apres_enteral'] == '["Aberto (Pó)"]')){
		                            $retorno = str_replace('<td rel="'.$produtos[$i]['id'].'" rowspan="'.count($medida_dc).'">', '<td rel="'.$produtos[$i]['id'].'" rowspan="'.$rowspan.'">', $retorno);
		                        }
		                    }
		                }
		            }
		        }
		        if ($retorno<>"") $retorno .= "</tbody>";



		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/produto_gtProdutoRelatorioSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // construção de query MySQL
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
				if (isset($dados['margem_calorica']) and ($dados['margem_calorica'] <> "")){ $margem_calorica = explode(",", $dados['margem_calorica']); $margem_calorica[0] = strtok($margem_calorica[0],' '); $margem_calorica[1] = strtok($margem_calorica[1],' '); }else{ $margem_calorica[0] = 0; $margem_calorica[1] = 0;}
		        if (isset($dados['margem_proteica']) and ($dados['margem_proteica'] <> "")){ $margem_proteica = explode(",", $dados['margem_proteica']); $margem_proteica[0] = strtok($margem_proteica[0],' '); $margem_proteica[1] = strtok($margem_proteica[1],' '); }else{ $margem_proteica[0] = 0; $margem_proteica[1] = 0;}

		        $query = '';
		        if (isset($dados['categoria']) and ($dados['categoria'] <> "")) $query.= ' AND (especialidade LIKE "%'.$dados['categoria'].'%")';
		        if (isset($dados['tipo_produto']) and ($dados['tipo_produto'] <> "")) $query.= ' AND (via LIKE "%'.$dados['tipo_produto'].'%")';

				if (!isset($dados['calculo_apres_liquidocreme'])) $dados['calculo_apres_liquidocreme'] = null;
				if (!isset($dados['calculo_apres_po'])) $dados['calculo_apres_po'] = null;
				if (($dados['calculo_apres_liquidocreme'] <> "") or ($dados['calculo_apres_po'] <> "")){
					$query.= ' AND (';
						$_or = '';
						if ($dados['calculo_apres_liquidocreme'] <> ""){
							$query.= '(apres_oral LIKE "%Líquido / Creme%")';
							$_or = ' OR ';
						}
						if ($dados['calculo_apres_po'] <> ""){
							$query.= $_or.' (apres_oral LIKE "%Pó%")';
							$_or = ' OR ';
						}
					$query.= ' )';
				}
				if(isset($dados['carac_oral'])){
					$array_carac = $dados['carac_oral'];

					if(in_array('Sem Sacarose', $array_carac)){
						$query.= ' AND (carac_oral LIKE "%Sem Sacarose%")';
					}
					if(in_array('Sem Lactose', $array_carac)){
						$query.= ' AND (carac_oral LIKE "%Sem Lactose%")';
					}
					if (in_array('Com Fibras', $array_carac) or in_array('Sem Fibras', $array_carac)){
						$query.= ' AND (';
							$_or = '';
							if (in_array('Com Fibras', $array_carac)){
								$query.= '(carac_oral LIKE "%Com Fibras%")';
								$_or = ' OR ';
							}
							if (in_array('Sem Fibras', $array_carac)){
								$query.= $_or.' (carac_oral LIKE "%Sem Fibras%")';
								$_or = ' OR ';
							}
						$query.= ' )';
					}
					if(in_array('100% Proteína Vegetal', $array_carac)){
						$query.= ' AND (carac_oral LIKE "%100% Proteína Vegetal%")';
					}
					if(in_array('Cicatrização', $array_carac)){
						$query.= ' AND (carac_oral LIKE "%Cicatrização%")';
					}
					if(in_array('Com Ômega 3', $array_carac)){
						$query.= ' AND (carac_oral LIKE "%Com Ômega 3%")';
					}
					if(in_array('Imunonutrição cirúrgica', $array_carac)){
						$query.= ' AND (carac_oral LIKE "%Imunonutrição cirúrgica%")';
					}
				}

		        if ($query <> '') $query = 'WHERE (status=1 '.$query.')';
		        $produtos = $db->select_to_array("produtos",
		                                            "id, nome, fabricante, apres_enteral, kcal, cho, ptn, lip, fibras, medida_dc, medida_g, medida, unidmedida, volume, apresentacao, final, apres_oral",
		                                            $query." ORDER BY apres_oral, apres_enteral,
															CASE 
																WHEN fabricante = 'PRODIET' THEN 1
																WHEN fabricante = 'DANONE' THEN 2
																WHEN fabricante = ' Danone e Nutrimed' THEN 3
																ELSE 4
															END", 
		                                            null);
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


		        $retorno = '';
		        $retorno_thead = '';
		        if ($produtos){
		            if (isset($dados['fracionamento_dia']) and ($dados['fracionamento_dia'] <> "")){
		                $fracionamento_dia = $dados['fracionamento_dia'];
		                if ($fracionamento_dia == "0") $fracionamento_dia = 1;
		            }
		            else{
		                $fracionamento_dia = 1;
		            }

		            for ($i = 0; $i < count($produtos); $i++){
		                $kcal = $produtos[$i]['kcal'];
		                $ptn = $produtos[$i]['ptn'];
		                if ($kcal<>"") $kcal = str_replace(",", ".", $kcal); else $kcal = 0;
		                if ($ptn<>"") $ptn = str_replace(",", ".", $ptn); else $ptn = 0;
		                $kcal = floatval($kcal);
		                $ptn = floatval($ptn);

		                // se tiver mais de 01 volume cadastrado
		                $margem_liberadas = false;
		                $volume_produto = json_decode($produtos[$i]['volume'], true);
		                if (json_last_error() === 0) {
		                    if (is_array($volume_produto)){
		                        if (count($volume_produto)>0){

		                            $medida_dc = json_decode($produtos[$i]['medida_dc'], true);
		                            $_nome = "";  // retirar depois
									$_medida_dc = 1;
		                            for ($j = 0; $j < count($volume_produto); $j++){
		                                $_volume = str_replace(" ","", trim($volume_produto[$j]));

		                                $valor_calorio = "-";
		                                $valor_proteico = "-";
		                                $valor_fibra = "-";


		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // formatação de string
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                if (strpos($_volume, 'mL') !== false) {
		                                    $_volume = str_replace("mL","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else if ($_volume == "1L"){
		                                    $_volume = 1000;
		                                }
		                                else if (strpos($_volume, 'g cada') !== false) {
		                                    $_volume = str_replace("g cada","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else if (strpos($_volume, 'g/cada') !== false) {
		                                    $_volume = str_replace("g/cada","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else if (strpos($_volume, 'g') !== false) {
		                                    $_volume = str_replace("g","", $_volume);
		                                    $_volume = str_replace(",",".", $_volume);
		                                    $_volume = chkfloat($_volume);
		                                }
		                                else{
		                                    $_volume = chkfloat($_volume);
		                                }
		                                if (isset($medida_dc[$j]) && $medida_dc[$j] != ''){
											
		                                    $_medida_dc = str_replace(",",".", trim($medida_dc[$j]));
		                                }
		                                $calorias_dia = "";
		                                $proteina_dia = "";
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

										$margem_liberadas = true;
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                            }
		                        }
		                    }
		                }


		                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                // se for liberada: se passou pelo ranger acima
		                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		                if ($margem_liberadas){
		                    $medida_dc = 0;
		                    if ($produtos[$i]['medida_dc'] <> ""){
		                        $medida_dc = json_decode($produtos[$i]['medida_dc'], true);
		                        $medida = json_decode($produtos[$i]['medida'], true);
		                        $final = json_decode($produtos[$i]['final'], true);
		                        $volume = json_decode($produtos[$i]['volume'], true);
		                        $unidmedida = $produtos[$i]['unidmedida'];
		                        $grama = json_decode($produtos[$i]['medida_g'], true);

		                        $titulo = '<td rel="'.$produtos[$i]['id'].'" rowspan="'.count($medida_dc).'"><div class="form-check col-sm-12"><input id="check_dieta'.$produtos[$i]['id'].'" rel="'.$produtos[$i]['id'].'" class="form-check-input styled-checkbox check_dieta" onclick="check_dieta(this, '.$produtos[$i]['id'].');" name="check_dieta'.$produtos[$i]['id'].'" type="checkbox" value=""><label for="check_dieta'.$produtos[$i]['id'].'" class="form-check-label collapseSistema check-green">&nbsp;</label></div> </td>';
		                        $titulo .= '<td rel="'.$produtos[$i]['id'].'" rowspan="'.count($medida_dc).'">'.$produtos[$i]['nome']."  ".$_nome.'</td>';

		                        $cont_array = 0;
		                        $rowspan = 0;
								for ($m=0; $m < count($medida_dc); $m++) { 
									$dc = str_replace(",", ".", $medida_dc[$m]);

		                            // se tiver no ranger, listar
		                            if ($margem_liberadas){
		                                // if ($produtos[$i]['apres_enteral'] == '["Fechado"]'){
		                                //     $volume_horario = " - ";
		                                // }

		                                $apres_oral = $produtos[$i]['apres_oral'];
		                                $apres_oral_num = '0';
		                                if ($apres_oral == '["Pó"]'){
											$apres_oral = 'Pó'; 
											$apres_oral_num = '1';
		                                }else if ($apres_oral == '["Líquido / Creme"]'){
											$apres_oral = 'Líquido / Creme';
											$apres_oral_num = '2';
		                                }

		                                if ($retorno_thead <> $apres_oral){
		                                    $retorno_thead = $apres_oral;
		                                    $retorno .= '<thead>
		                                                    <tr>
		                                                        <th colspan="8" class="entric_group_destaque4 text-center">
		                                                        '.$apres_oral.' <a href="javascript:void(0);" onclick="fc_collapseSistema(\''.$apres_oral_num.'\');" class="pull-right" style="color: #fff;"><i class="fa fa-minus-square"></i></a></th>
		                                                    </tr>
		                                                    <tr>
		                                                        <th class="entric_group_destaque5">
																	<input class="form-check-input collapseSistema" id="collapseSistema'.$apres_oral_num.'" type="checkbox" value="" onclick="fc_collapsecheckbox('.$apres_oral_num.')">
																	PRODUTO 
																</th>
		                                                        <th class="entric_group_destaque5">DENSIDADE CALÓRICA</th>
		                                                        <th class="entric_group_destaque5">VOLUME '.(($apres_oral_num == 2) ? '(und.)' : '(porção)').'</th>
		                                                        <th class="entric_group_destaque5">VOLUME (dia)</th>
		                                                        <th class="entric_group_destaque5">CALORIA/dia</th>
		                                                        <th class="entric_group_destaque5">PROTEÍNA/dia</th>
		                                                    </tr>
		                                                </thead>
		                                                <tbody id="tbody'.$apres_oral_num.'">';
		                                }

		                                if (trim($produtos[$i]['kcal'])<>"") $_kcal = str_replace(",",".", $produtos[$i]['kcal']); else $_kcal = 1;
		                                if (trim($produtos[$i]['ptn'])<>"") $_ptn = str_replace(",",".", $produtos[$i]['ptn']); else $_ptn = 1;
		                                if (trim($produtos[$i]['fibras'])<>"") $_fibras = str_replace(",",".", $produtos[$i]['fibras']); else $_fibras = 1;
		    

										//verificar caracteristicas tnevo
										$valor_ptn = $db->select_to_array("produtos_composicao",
											"valor",
											'WHERE descricao = "Proteínas" and id_produto = '.$produtos[$i]['id'], 
											null);

										if(!isset($valor_ptn[0]['valor'])){
											$valor_ptn[0]['valor'] = 0;
										}else{
											if($valor_ptn[0]['valor'] == null){
												$valor_ptn[0]['valor'] = 0;
											}
										}

										$verificar_carac = true;
										if(isset($dados['carac_oral'])){
											$array_carac = $dados['carac_oral'];

											
											if(in_array('Hipocalórico', $array_carac) && $_medida_dc <= 1.2) {
												$verificar_carac = true;
											} elseif (in_array('Hipercalórico', $array_carac) && $_medida_dc > 1.2) {
												$verificar_carac = true;
											} else {
												$verificar_carac = false;
											}
											
											if ($verificar_carac && isset($valor_ptn[0]['valor'])) {
												$valor_ptn_valor = floatval($valor_ptn[0]['valor']);
											
												if (in_array('Hipoproteico', $array_carac) && $valor_ptn_valor < 10) {
													$verificar_carac = true;
												} elseif (in_array('Normoproteico', $array_carac) && $valor_ptn_valor >= 10 && $valor_ptn_valor < 20) {
													$verificar_carac = true;
												} elseif (in_array('Hiperproteico', $array_carac) && $valor_ptn_valor >= 20) {
													$verificar_carac = true;
												} else {
													$verificar_carac = false;
												}
											} else {
												$verificar_carac = false;
											}
											
										}

										

										if($verificar_carac){
											if($produtos[$i]['apres_oral'] == '["Líquido / Creme"]'){
												$volume_und = $volume[$m] . ' ' . $unidmedida;
												$volume_dia = intval($volume[$m]) * intval($fracionamento_dia);
												$caloria_dia = ($volume_dia * $kcal) / 100;
												$proteina_dia = ($volume_dia * $ptn) / 100;
												$sistema = 'Líquido/Creme';
											}else if($produtos[$i]['apres_oral'] == '["Pó"]'){
												$volume_und = str_replace('mL', '', $final[$m]) . ' mL';
												$volume_dia = intval($final[$m]) * intval($fracionamento_dia);
												$valor_energetico = $db->select_to_array("produtos_info_nutri",
												"valor",
												'WHERE descricao = "Valor Energético" and id_produto = '.$produtos[$i]['id'], 
												null);
												if(!isset($valor_energetico[0]['valor'])){
													$valor_energetico[0]['valor'] = 0;
												}else{
													if($valor_energetico[0]['valor'] == null){
														$valor_energetico[0]['valor'] = 0;
													}
												}

												$valor_ptn_100ml = $db->select_to_array("produtos_info_nutri",
												"valor",
												'WHERE descricao = "Proteína (g)" and id_produto = '.$produtos[$i]['id'], 
												null);
												if(!isset($valor_ptn_100ml[0]['valor'])){
													$valor_ptn_100ml[0]['valor'] = 0;
												}else{
													if($valor_ptn_100ml[0]['valor'] == null){
														$valor_ptn_100ml[0]['valor'] = 0;
													}
												}
												
												$caloria_dia = ($volume_dia *  floatval(str_replace(',', '.', $valor_energetico[0]['valor']))) / 100;
												$proteina_dia = ($volume_dia * floatval(str_replace(',', '.', $valor_ptn_100ml[0]['valor']))) / 100;
												$sistema = 'Pó';
											}
											$retorno .= '<tr>
															<td>
																<div class="form-check col-sm-12">
																	<input onclick="check_dieta(this)" id="produto_dc['.$produtos[$i]['id'].'___'.$produtos[$i]['nome'].'___'.$medida_dc[$m].'___'.$volume_dia.'___'.$volume_und.']" class="form-check-input check_dieta styled-checkbox diluicao'.$produtos[$i]['id'].'" name="produto_dc['.$produtos[$i]['id'].'___'.$medida_dc[$m].']" type="checkbox" value="'.$produtos[$i]['id'].'___'.$produtos[$i]['nome'].'___'.$medida_dc[$m].'___'.$volume_dia.'___'.$volume_und.'___'.$sistema.'___'.$calorias_dia.'___'.$proteina_dia.'___'.(isset($medida[$m])?$medida[$m]:0).'___'.(isset($final[$m])?$final[$m]:0).'___'.(isset($grama[$m])?$grama[$m]:0).'___'.$_kcal.'___'.$_ptn.'___'.$_fibras.'">
																	<label for="produto_dc['.$produtos[$i]['id'].'___'.$produtos[$i]['nome'].'___'.$medida_dc[$m].'___'.$volume_dia.'___'.$volume_und.']" class="form-check-label check-green">'.$produtos[$i]['nome']."  ".$_nome.'</label>
																</div>
		                                                	</td>
															<td>'.$medida_dc[$m].'</td>
															<td>'.$volume_und.'</td>
															<td>'.$volume_dia. ' mL'.'</td>
															<td>'.$caloria_dia.'</td>
															<td>'.$proteina_dia.'</td>
														</tr>';
											$titulo = "";
										}
		                            }
		                            $cont_array = $cont_array+1;
		                        }

		                        // ajustar o rowspan da listagem de produtos caso esteja errado
		                        if (($rowspan <> $medida_dc) and ($produtos[$i]['apres_enteral'] == '["Aberto (Pó)"]')){
		                            //$retorno = str_replace('<td rel="'.$produtos[$i]['id'].'" rowspan="'.count($medida_dc).'">', '<td rel="'.$produtos[$i]['id'].'" rowspan="'.$rowspan.'">', $retorno);
		                        }
		                    }
		                }
		            }
		        }
		        if ($retorno<>"") $retorno .= "</tbody>";



		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_videosalta_editar2", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
				$link = $request->getParam("link");

                $bind = array(  ':id'=> $id,
                                ':link'=> $link);
                $db->update("videos", "WHERE id=:id", $bind);
		        $data = true;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_videosalta_editar1", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
		        $bind = array(  ':categoria' => $dados['categoria'],
		                        ':titulo' => $dados['titulo'],
		                        ':data_criacao' => date("Y-m-d H:i:s"));
		        $retorno = $db->update("videos", "WHERE id=".$dados['id'], $bind);  
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_videosalta_cadastrar2", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
				$link = $request->getParam("link");

                $bind = array(  ':id'=> $id,
                                ':link'=>$link);
                $db->update("videos", "WHERE id=:id", $bind);    
		        $data = true;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_videosalta_cadastrar1", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
		        $bind = array(  ':categoria' => $dados['categoria'],
		                        ':titulo' => $dados['titulo'],
		                        ':data_criacao' => date("Y-m-d H:i:s"));
		        $retorno = $db->insert("videos", $bind);      
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_videosalta_getDado", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
		        $retorno = $db->select_single_to_array("videos",
		                                            "*",
		                                            "
		                                            WHERE id=".$id." ORDER BY id ASC", 
		                                            null);        
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_videosalta_getDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
		        $retorno = array();

		        $relatorio = $db->select_to_array("videos",
		                                            "*",
		                                            "
		                                            ORDER BY id ASC", 
		                                            null);
		        if ($relatorio){
		            for($i = 0; $i < count($relatorio); $i++){
		                $retorno[$relatorio[$i]['categoria']][] = $relatorio[$i];
		            }
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_relatorioalta_buscarDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
				$retorno = null;

		        if (($dados['nome'] == "") and ($dados['cpf'] == "")){
		            $retorno = array("error" => "Preencha o formulário corretamente.");
		        }
		        else{
		            unset($dados['action']);

		            $bind = array();
		            $bind_query = "";
		            foreach ($dados as $key => $val) {
		                if ($val <> ""){
		                    if ($bind_query<>"") $bind_query .= " AND ";

		                    if ($key == "data_nascimento") $val = date2sql($val);
		                    if ($key == "nome"){
		                        $bind_query .= " ".$key." LIKE :".$key;
		                        $bind[":".$key] = "%".$val."%";
		                    }
		                    else{
		                        $bind_query .= " ".$key."=:".$key;
		                        $bind[":".$key] = $val;
		                    }                   
		                    
		                }
		            }

		            if ($bind_query <> ""){
		                $buscar = $db->select_to_array("pacientes", "*", "WHERE ".$bind_query, $bind);
		                $retorno = $buscar;
		            }
		            else{
		                $retorno = array("error" => "Preencha o formulário corretamente.");
		            }
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_fornecedores_getDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id_paciente = $request->getParam("id_paciente");
		        $fornecedores = $db->select_to_array("distribuidores",
		                                            "*",
		                                            "
		                                            WHERE id_paciente=".$id_paciente." 
		                                            ORDER BY id ASC", 
		                                            null);		        
		        $data = $fornecedores;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_ferramentas_getRelatorio", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id_paciente = $request->getParam("id_paciente");

		        $relatorio = $db->select_to_array("relatorios AS r",
		                                            
		                                            "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
		                                            
		                                            "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
		                                            LEFT JOIN pacientes pa ON r.id_paciente = pa.id
		                                            WHERE r.id_paciente=".$id_paciente." 
		                                            ORDER BY r.data_criacao DESC", 
		                                            null);
		        
		        $data = $relatorio;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_consultarproduto_getUnidades", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
        
		        $retorno = array();
		        $produtos = $db->select_to_array("unidades", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $retorno[""] = "...";
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_consultarproduto_getFornecedores", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
		        $retorno = array();
		        $produtos = $db->select_to_array("fabricantes", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $retorno[""] = "Todos";
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/prescritor_consultarproduto_getRelatorio", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id_paciente = $request->getParam("id_paciente");

		        $relatorio = $db->select_to_array("relatorios AS r",
		                                            
		                                            "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
		                                            
		                                            "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
		                                            LEFT JOIN pacientes pa ON r.id_paciente = pa.id
		                                            WHERE r.id_paciente=".$id_paciente." 
		                                            ORDER BY r.data_criacao DESC", 
		                                            null);
		        $data = $relatorio;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/paciente_videosalta_getDados", function (Request $request, Response $response) {
		// $token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		// $result = JWTAuth::verifyToken($token);
		$data = array();
		$db = new Database();
		$retorno = array();

		$relatorio = $db->select_to_array("videos",
											"*",
											"
											ORDER BY id ASC", 
											null);
		if ($relatorio){
			for($i = 0; $i < count($relatorio); $i++){
				$retorno[$relatorio[$i]['categoria']][] = $relatorio[$i];
			}
		}

		$data = $retorno;
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/paciente_relatorioalta_getRelatorio", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id_paciente = $request->getParam("id_paciente");

		        $relatorio = $db->select_to_array("relatorios AS r",
		                                            "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
		                                            "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
		                                            LEFT JOIN pacientes pa ON r.id_paciente = pa.id
		                                            WHERE r.id_paciente=".$id_paciente." AND r.status=1
		                                            ORDER BY r.data_criacao DESC", 
		                                            null);
		        $data = $relatorio;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/paciente_distribuidores_getDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				
		        $distribuidores = $db->select_to_array("distribuidores",
		                                            "*",
		                                            "
		                                            ORDER BY id ASC", 
		                                            null);

		        $data = $distribuidores;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/paciente_contato_getDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$id_usuario = $request->getParam("id_usuario");
				
		        $prescritor = $db->select_single_to_array("prescritores",
		                                            "*",
		                                            "
		                                            WHERE id_usuario=".$id_usuario." AND (telefone_disp LIKE '%0%' OR email_disp='0')
		                                            ORDER BY id ASC", 
		                                            null);

		        $data = $prescritor;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/home_getDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$id_usuario = $request->getParam("id_usuario");
				$tipo = $request->getParam("tipo");

		    	$retorno = array();
		        if ($tipo == "prescritor"){
		            $relatorio = $db->select_to_array("relatorios AS r",
		                                                
		                                                "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
		                                                
		                                                "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
		                                                LEFT JOIN pacientes pa ON r.id_paciente = pa.id
		                                                WHERE r.id_prescritor=".$id_usuario." 
		                                                ORDER BY r.data_criacao DESC", 
		                                                null);
		            if ($relatorio){
		                $retorno['relatorios'] = count($relatorio);
		            }else{
		                $retorno['relatorios'] = 0;
		            }
		        }
		        else if ($tipo == "paciente"){
		            $relatorio = $db->select_to_array("relatorios AS r",
		                                                
		                                                "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
		                                                
		                                                "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
		                                                LEFT JOIN pacientes pa ON r.id_paciente = pa.id
		                                                WHERE r.id_paciente=".$id_usuario." 
		                                                ORDER BY r.data_criacao DESC", 
		                                                null);
		            if ($relatorio){
		                $retorno['relatorios'] = count($relatorio);
		            }else{
		                $retorno['relatorios'] = 0;
		            }
		        }
		        else if ($tipo == "administrador"){
		            $relatorio = $db->select_to_array("relatorios AS r",
		                                                
		                                                "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
		                                                
		                                                "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
		                                                LEFT JOIN pacientes pa ON r.id_paciente = pa.id
		                                                WHERE r.id_prescritor=".$id_usuario." 
		                                                ORDER BY r.data_criacao DESC", 
		                                                null);
		            if ($relatorio){
		                $retorno['relatorios'] = count($relatorio);    
		            }
		            else{
		                $retorno['relatorios'] = 0;    
		            }            
		        }
		        else if ($tipo == "patrocinador"){
		            $relatorio = $db->select_to_array("relatorios AS r",
		                                                
		                                                "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
		                                                
		                                                "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
		                                                LEFT JOIN pacientes pa ON r.id_paciente = pa.id
		                                                WHERE r.id_prescritor=".$id_usuario." 
		                                                ORDER BY r.data_criacao DESC", 
		                                                null);
		            if ($relatorio){
		                $retorno['relatorios'] = count($relatorio);    
		            }
		            else{
		                $retorno['relatorios'] = 0;    
		            }            
		        }


		        $videos = $db->select_to_array("videos", "id", "ORDER BY id DESC", null);
		        $retorno['videos'] = count($videos);

		        $contatos = $db->select_to_array("contatos", "id", "WHERE id_paciente=".$id_usuario." ORDER BY id DESC", null);
		        if ($contatos){
		            $retorno['contatos'] = count($contatos);  
		        }
		        else{
		            $retorno['contatos'] = 0;     
		        }  

		        $fornecedores = $db->select_to_array("distribuidores", "id", "WHERE id_paciente=".$id_usuario." ORDER BY id DESC", null);
		        if ($fornecedores){
		            $retorno['fornecedores'] = count($fornecedores);  
		        }
		        else{
		            $retorno['fornecedores'] = 0;     
		        }    

		        $produtos = $db->select_to_array("produtos", "id", "WHERE status=1", null);
		        if ($produtos){
		            $retorno['produtos'] = count($produtos);  
		        }
		        else{
		            $retorno['produtos'] = 0;     
		        }


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/distribuidores_editar", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$dados = $request->getParam("dados");
				
		        $check_fabricante = $db->select_single_to_array("fabricantes", "*", "WHERE descricao='".$dados['fabricante']."'",  null);
		        if (!$check_fabricante){
		            $bind = array(  ':descricao' => $dados["fabricante"],
		                            ':status' => 0,                  
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $fabricantes = $db->insert("fabricantes", $bind);
		        }

		        $bind = array(  ':fabricante' => $dados['fabricante'],
		                        ':distribuidor' => $dados['distribuidor'],
		                        ':principal_regiao' => $dados['principal_regiao'],
		                        ':desconto' => $dados['desconto'],
		                        ':cupom' => $dados['cupom'],
		                        ':uf' => $dados['uf'],
		                        ':endereco' => $dados['endereco'],
		                        ':email' => $dados['email'],
		                        ':site' => $dados['site'],
		                        ':telefone' => $dados['telefone'],
		                        ':whatsapp' => $dados['whatsapp'],
		                        ':mapa' => $dados['mapa']);
		        $retorno = $db->update("distribuidores", "WHERE id=".$dados['id'], $bind);

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/distribuidores_cadastrar", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$dados = $request->getParam("dados");
				
		        $check_fabricante = $db->select_single_to_array("fabricantes", "*", "WHERE descricao='".$dados['fabricante']."'",  null);
		        if (!$check_fabricante){
		            $bind = array(  ':descricao' => $dados["fabricante"],
		                            ':status' => 0,                  
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $fabricantes = $db->insert("fabricantes", $bind);
		        }

		        $bind = array(  ':id_paciente' => 1,
								':fabricante' => $dados['fabricante'],
		                        ':distribuidor' => $dados['distribuidor'],
		                        ':principal_regiao' => $dados['principal_regiao'],
		                        ':desconto' => $dados['desconto'],
		                        ':cupom' => $dados['cupom'],
		                        ':uf' => $dados['uf'],
		                        ':endereco' => $dados['endereco'],
		                        ':email' => $dados['email'],
		                        ':site' => $dados['site'],
		                        ':telefone' => $dados['telefone'],
		                        ':whatsapp' => $dados['whatsapp'],
		                        ':mapa' => $dados['mapa'],
		                        ':data_criacao' => date("Y-m-d H:i:s"));

		        $retorno = $db->insert("distribuidores", $bind);

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/distribuidores_getDado", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$id = $request->getParam("id");

		        $distribuidores = $db->select_single_to_array("distribuidores",
		                                            "*",
		                                            "
		                                            WHERE id=".$id, 
		                                            null);

		        $data = $distribuidores;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/distribuidores_getDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$id_paciente = $request->getParam("id_paciente");

		        $distribuidores = $db->select_to_array("distribuidores",
		                                            "*",
		                                            "
		                                            WHERE id_paciente=".$id_paciente." 
		                                            ORDER BY id ASC", 
		                                            null);
		        $data = $distribuidores;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/dashboard_getDadosRelatorios", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$uf = $request->getParam("uf");
				$data1 = $request->getParam("data1");
				$data2 = $request->getParam("data2");

		    	$retorno = array();
		        $retorno_categories = array();
		        $retorno_series = array();
		        
		        if (!$uf){
		            $logs = $db->select_to_array(	"relatorios",
		                                            "id, data_criacao",
		                                            "WHERE (data_criacao >= '".date2sql($data2)."' AND data_criacao <= '".date2sql($data1)."') ORDER BY data_criacao ASC", 
		                                            null);
		        }
		        else{
		            $logs = $db->select_to_array( "relatorios AS rel",
		                                            "rel.id, rel.data_criacao",
		                                            "WHERE (rel.data_criacao >= '".date2sql($data2)."' AND rel.data_criacao <= '".date2sql($data1)."') AND EXISTS (SELECT pre.uf FROM prescritores AS pre WHERE rel.id_prescritor=pre.id AND pre.uf='".$uf."') ORDER BY rel.data_criacao ASC", 
		                                            null);
		        }
		        if ($logs){
		        	for ($i = 0; $i < count($logs); $i++){
		        		$key = date("M", strtotime($logs[$i]['data_criacao']));
		        		
		        		if (isset($retorno[$key])){
		        			$retorno[$key] = $retorno[$key] + 1;
		        		}else{
		        			$retorno[$key] = 1;
		        		}
		        	}
		        }

		        foreach ($retorno as $chave => $valor) {
		            $retorno_categories[] = $chave;
		            $retorno_series[] = $valor;
		        }
		        $retorno = array();
		        $retorno['categories'] = $retorno_categories;
		        $retorno['series'] = $retorno_series;

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/dashboard_getDadosVideos", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$data1 = $request->getParam("data1");
				$data2 = $request->getParam("data2");

		    	$retorno = array();
		        $retorno_categories = array();
		        $retorno_series = array();
		        
		        $logs = $db->select_to_array(	"log",
		                                        "id, data_criacao",
		                                        "WHERE funcao LIKE 'video%' AND (data_criacao >= '".date2sql($data2)."' AND data_criacao <= '".date2sql($data1)."') ORDER BY data_criacao ASC", 
		                                        null);
		        if ($logs){
		        	for ($i = 0; $i < count($logs); $i++){
		        		$key = date("M", strtotime($logs[$i]['data_criacao']));
		        		
		        		if (isset($retorno[$key])){
		        			$retorno[$key] = $retorno[$key] + 1;
		        		}else{
		        			$retorno[$key] = 1;
		        		}
		        	}
		        }

		        foreach ($retorno as $chave => $valor) {
		            $retorno_categories[] = $chave;
		            $retorno_series[] = $valor;
		        }
		        $retorno = array();
		        $retorno['categories'] = $retorno_categories;
		        $retorno['series'] = $retorno_series;

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/dashboard_getDadosSite", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$data1 = $request->getParam("data1");
				$data2 = $request->getParam("data2");

		        $retorno = array();
		        $retorno_categories = array();
		        $retorno_series = array();
		        
		        $logs = $db->select_to_array(	"log",
		                                        "id, data_criacao",
		                                        "WHERE funcao LIKE 'login_%' AND (data_criacao >= '".date2sql($data2)."' AND data_criacao <= '".date2sql($data1)."') ORDER BY data_criacao ASC", 
		                                        null);
		        if ($logs){
		        	for ($i = 0; $i < count($logs); $i++){
		        		$key = date("M", strtotime($logs[$i]['data_criacao']));
		        		
		        		if (isset($retorno[$key])){
		        			$retorno[$key] = $retorno[$key] + 1;
		        		}else{
		        			$retorno[$key] = 1;
		        		}
		        	}
		        }

		        foreach ($retorno as $chave => $valor) {
		            $retorno_categories[] = $chave;
		            $retorno_series[] = $valor;
		        }
		        $retorno = array();
		        $retorno['categories'] = $retorno_categories;
		        $retorno['series'] = $retorno_series;

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/dashboard_getDadosLog", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
		        $logs = $db->select_to_array( "log",
		                                        "login, funcao, ipaddress, dados, data_criacao",
		                                        "ORDER BY id DESC LIMIT 50", 
		                                        null);
		        $data = $logs;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/consultarproduto_getRelatorio", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$id_paciente = $request->getParam("id_paciente");	

		        $relatorio = $db->select_to_array("relatorios AS r",
		                                            
		                                            "r.*, pa.nome AS pa_nome, pre.nome AS pre_nome",
		                                            
		                                            "LEFT JOIN prescritores pre ON r.id_prescritor = pre.id
		                                            LEFT JOIN pacientes pa ON r.id_paciente = pa.id
		                                            WHERE r.id_paciente=".$id_paciente." 
		                                            ORDER BY r.data_criacao DESC", 
		                                            null);     
		        $data = $relatorio;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/consultarproduto_getFornecedores", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
		        $retorno = array();
		        $produtos = $db->select_to_array("fabricantes", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $retorno[""] = "Todos";
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/consultarproduto_getUnidades", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
		        $retorno = array();
		        $produtos = $db->select_to_array("unidades", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $retorno[""] = "...";
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/config_getDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){		        
		        $retorno = $db->select_single_to_array("config",
		                                            "*",
		                                            "WHERE id=1", 
		                                            null);		        
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/config_SalvarOrientacoes", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){	
				$dados = $request->getParam("dados");	        

		        $bind = array(  ':higienizacao' => $dados['higienizacao'],
		                        ':cuidados' => $dados['cuidados'],
		                        ':preparo' => $dados['preparo']);
		        $retorno = $db->update("config", "WHERE id=1", $bind);

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_cadastrarAdministrador", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
				        
		        $retorno = array();

		        $admin = $db->select_single_to_array("admin", "*", "WHERE email='".$dados['login']."'",  null);
		        if (!$admin){
		            $codigo = strtolower(randomCode(20));
		            $bind = array(  ':email' => $dados['login'],
		                            ':senha' => null,
		                            ':extra' => $codigo,    
		                            ':tipo' => 3,                  
		                            ':status' => $dados['admin_acesso'],
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $usuario = $db->insert("usuarios", $bind);

		            $bind = array(  ':id_usuario' => $usuario,
		                            ':nome' => $dados['nome'],
		                            ':cpf' => $dados['cpf'],
		                            ':celular' => $dados['celular'],
		                            ':email_contato' => $dados['login'],
		                            ':email' => $dados['login'],
		                            ':senha' => null,
		                            ':tipo' => 1,
		                            ':status' => $dados['admin_acesso'],
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->insert("admin", $bind);

		            $bind = array(  ':tipo'=> 'email',
		                            ':template'=> 'email_admin_senha',
		                            ':email' => $dados['login'],                            
		                            ':assunto'=> 'Cadastro de Administrador',
		                            ':conteudo' => json_encode(array('||NOME||' => strtok($dados['nome'], " "), '||CODIGO||' => $codigo, 'email' => $dados['login'])),
		                            ':status'=> 0,
		                            ':extra'=> $usuario,
		                            ':data_criacao'=> date("Y-m-d H:i:s"));
		            $interacoes = $db->insert('interacoes', $bind);
		        }
		        
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_cadastrarPatrocinador", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
				        
		        $retorno = array();
		        $patrocinadores = $db->select_single_to_array("patrocinadores", "*", "WHERE email='".$dados['login']."'",  null);
		        if (!$patrocinadores){
		            $codigo = strtolower(randomCode(20));
		            $bind = array(  ':email' => $dados['login'],
		                            ':senha' => null,
		                            ':extra' => $codigo,    
		                            ':tipo' => 4,
		                            ':status' => $dados['patrocinador_acesso'],
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $usuario = $db->insert("usuarios", $bind);

		            $bind = array(  ':id_usuario' => $usuario,
		                            ':nome' => $dados['nome'],
		                            ':cpf' => $dados['cpf'],
		                            ':celular' => $dados['celular'],
		                            ':email_contato' => $dados['login'],
		                            ':email' => $dados['login'],
		                            ':senha' => null,
		                            ':status' => $dados['patrocinador_acesso'],
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->insert("patrocinadores", $bind);

		            $bind = array(  ':tipo'=> 'email',
		                            ':template'=> 'email_patrocinador_senha',
		                            ':email' => $dados['login'],
		                            ':assunto'=> 'Cadastro de Patrocinador',
		                            ':conteudo' => json_encode(array('||NOME||' => strtok($dados['nome'], " "), '||CODIGO||' => $codigo, 'email' => $dados['login'])),
		                            ':status'=> 0,
		                            ':extra'=> $usuario,
		                            ':data_criacao'=> date("Y-m-d H:i:s"));
		            $interacoes = $db->insert('interacoes', $bind);
		        }
		        
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_cadastrarPrescritor", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

				$retorno = array();
		        $prescritores = $db->select_single_to_array("prescritores", "*", "WHERE cpf_cnpj='".$dados['cpf_cnpj']."'",  null);
		        if ($prescritores){
		            $retorno['error'] = "O CPF informado já possui cadastro em nosso banco de dados.";

		        }else{
		            if ($dados['profissional'] == "Nutricionista"){
		                $dados['regiao_crm'] = null;
		                $dados['numero_crm'] = null;  
		            }
		            else{             
		                $dados['regiao_crn'] = null;
		                $dados['numero_crn'] = null; 
		            }

		            $codigo = strtolower(randomCode(20));
		            $bind = array(  ':email' => $dados['email'],
		                            ':senha' => null,
		                            ':tipo' => 2,
		                            ':extra' => $codigo, 
		                            ':status' => $dados['acesso'],
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $usuario = $db->insert("usuarios", $bind);

		            $bind = array(  ':id_usuario' => $usuario,
		                            ':nome' => $dados['nome'],
		                            ':email_contato' => $dados['email'],
		                            ':cpf_cnpj' => $dados['cpf_cnpj'],
		                            ':feedback' => $dados['feedback'],
		                            ':uf' => $dados['uf'],
		                            ':cidade' => $dados['cidade'],
		                            ':email' => $dados['email'],
		                            ':email_disp' => $dados['disp_email'],
		                            ':telefone' => json_encode($dados['telefone']),
		                            ':telefone_disp' => json_encode($dados['disp_telefone']),
		                            ':profissional' => $dados['profissional'],   
		                            ':regiao_crm' => $dados['regiao_crm'],   
		                            ':numero_crm' => $dados['numero_crm'],   
		                            ':regiao_crn' => $dados['regiao_crn'],   
		                            ':numero_crn' => $dados['numero_crn'],   
		                            ':status' => $dados['acesso'],
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            /*
		            if (isset($_FILES['foto']['error']) and ($_FILES['foto']['error'] == 0)){
		                $upfoto = uploadFile(  $_FILES['foto'], 
		                                        "/carteiras");
		                $bind[':carteira_frente'] = "/carteiras/".$upfoto;
		            }
		            if (isset($_FILES['foto2']['error']) and ($_FILES['foto2']['error'] == 0)){
		                $upfoto = uploadFile(  $_FILES['foto2'], 
		                                        "/carteiras");
		                $bind[':carteira_verso'] = "/carteiras/".$upfoto;
		            }*/
		            $retorno = $db->insert("prescritores", $bind);

		            $bind = array(  ':tipo'=> 'email',
		                            ':template'=> 'email_prescritor_senha',
		                            ':assunto'=> 'Cadastro de Prescritor',
		                            ':email' => $dados['email'],                            
		                            ':conteudo' => json_encode(array('||NOME||' => strtok($dados['nome'], " "), '||CODIGO||' => $codigo, 'email' => $dados['email'])),
		                            ':status'=> 0,
		                            ':extra'=> $usuario,
		                            ':data_criacao'=> date("Y-m-d H:i:s"));
		            $interacoes = $db->insert('interacoes', $bind);
		        }
		        
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_editarAdministrador", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $id_usuario = false;
		        $admin = $db->select_single_to_array("admin", "*", "WHERE email='".$dados['login']."' AND id<>'".$dados['_admin_id']."'",  null);
		        if (!$admin){            
		            $bind = array(  ':nome' => $dados['nome'],
		                            ':cpf' => $dados['cpf'],
		                            ':celular' => $dados['celular'],
		                            ':email_contato' => $dados['login'],
		                            ':email' => $dados['login'],
		                            ':status' => $dados['admin_acesso'] );
		            $retorno = $db->update("admin","WHERE id=".$dados['_admin_id'], $bind);
		            $id_usuario = $db->select_single_to_array("admin", "*", "WHERE id=".$dados['_admin_id']."",  null);

		            $bind = array(  ':email' => $dados['login'],
		                            ':status' => $dados['admin_acesso'] );
		            $usuario = $db->update("usuarios", "WHERE id=".$id_usuario['id_usuario'], $bind);
		        }
		        
		        $data = $id_usuario;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_editarPatrocinador", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $id_usuario = false;
		        $admin = $db->select_single_to_array("patrocinadores", "*", "WHERE email='".$dados['login']."' AND id<>'".$dados['_patroc_id']."'",  null);
		        if (!$admin){            
		            $bind = array(  ':nome' => $dados['nome'],
		                            ':cpf' => $dados['cpf'],
		                            ':celular' => $dados['celular'],
		                            ':email_contato' => $dados['login'],
		                            ':email' => $dados['login'],
		                            ':status' => $dados['patrocinador_acesso'] );
		            $retorno = $db->update("patrocinadores","WHERE id=".$dados['_patroc_id'], $bind);
		            $id_usuario = $db->select_single_to_array("patrocinadores", "*", "WHERE id=".$dados['_patroc_id']."",  null);

		            $bind = array(  ':email' => $dados['login'],
		                            ':status' => $dados['patrocinador_acesso'] );
		            $usuario = $db->update("usuarios", "WHERE id=".$id_usuario['id_usuario'], $bind);
		        }

		        $data = $id_usuario;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_editarPrescritor", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
				$files = $request->getParam("files");
		        
		        $retorno = array();
		        $prescritores = $db->select_single_to_array("prescritores", "*", "WHERE cpf_cnpj='".$dados['cpf_cnpj']."' AND id<>".$dados["_presc_id"],  null);
		        if ($prescritores){
		            $retorno['error'] = "O CPF informado já possui cadastro em nosso banco de dados.";

		        }else{
		            if ($dados['profissional'] == "Nutricionista"){
		                $dados['regiao_crm'] = null;
		                $dados['numero_crm'] = null;  
		            }
		            else{             
		                $dados['regiao_crn'] = null;
		                $dados['numero_crn'] = null; 
		            }
		            $bind = array(  ':nome' => $dados['nome'],
		                            ':email_contato' => $dados['email'],
		                            ':cpf_cnpj' => $dados['cpf_cnpj'],
		                            ':feedback' => $dados['feedback'],
		                            ':uf' => $dados['uf'],
		                            ':cidade' => $dados['cidade'],
		                            ':email' => $dados['email'],
		                            ':email_disp' => $dados['disp_email'],
		                            ':telefone' => json_encode($dados['telefone']),
		                            ':telefone_disp' => json_encode($dados['disp_telefone']),
		                            ':profissional' => $dados['profissional'],   
		                            ':regiao_crm' => $dados['regiao_crm'],   
		                            ':numero_crm' => $dados['numero_crm'],   
		                            ':regiao_crn' => $dados['regiao_crn'],   
		                            ':numero_crn' => $dados['numero_crn'],   
		                            ':status' => $dados['acesso'],
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            /*
		            if (isset($_FILES['foto']['error']) and ($_FILES['foto']['error'] == 0)){
		                $upfoto = uploadFile(  $_FILES['foto'], 
		                                        "/carteiras");
		                $bind[':carteira_frente'] = "/carteiras/".$upfoto;
		            }
		            if (isset($_FILES['foto2']['error']) and ($_FILES['foto2']['error'] == 0)){
		                $upfoto = uploadFile(  $_FILES['foto2'], 
		                                        "/carteiras");
		                $bind[':carteira_verso'] = "/carteiras/".$upfoto;
		            }*/

		            $retorno = $db->update("prescritores", "WHERE id=".$dados["_presc_id"], $bind);
		            $id_usuario = $db->select_single_to_array("prescritores", "*", "WHERE id=".$dados['_presc_id']."",  null);

		            $bind = array(  ':email' => $dados['email'],
		                            ':status' => $dados['acesso'] );
		            $usuario = $db->update("usuarios", "WHERE id=".$id_usuario['id_usuario'], $bind);
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_getDados", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id_paciente = $request->getParam("id_paciente");

		        $distribuidores = $db->select_to_array("distribuidores",
		                                            "*",
		                                            "
		                                            WHERE id_paciente=".$id_paciente." 
		                                            ORDER BY id ASC", 
		                                            null);

		        $data = $distribuidores;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/paciente_getDadoSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$sistema = $request->getParam("sistema");
				if($sistema == 'ibranutro'){
					$id_admissao = $request->getParam("id_admissao");
					$paciente = $db->select_single_to_array("pacientes_suplemento",
														"*",
														"
														WHERE id_admissao=".$id_admissao, 
														null);
				}
				if($sistema == 'EN'){
					$id_paciente = $request->getParam("id_paciente");
					$paciente = $db->select_single_to_array("pacientes_suplemento",
														"*",
														"
														WHERE id_paciente=".$id_paciente, 
														null);
				}
				

		        $data = $paciente;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/paciente_getDadoSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$sistema = $request->getParam("sistema");
				if($sistema == 'ibranutro'){
					$id_admissao = $request->getParam("id_admissao");
					$paciente = $db->select_single_to_array("pacientes_simplificada",
														"*",
														"
														WHERE id_admissao=".$id_admissao, 
														null);
				}
				if($sistema == 'EN'){
					$id_paciente = $request->getParam("id_paciente");
					$paciente = $db->select_single_to_array("pacientes_simplificada",
														"*",
														"
														WHERE id_paciente=".$id_paciente, 
														null);
				}

		        $data = $paciente;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/paciente_getDadoIbranutro", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$sistema = $request->getParam("sistema");
				if($sistema == 'EN'){
					$id_paciente = $request->getParam("id_paciente");
		        	$paciente = $db_ibranutro->select_single_to_array("tb_paciente_estado_nutricional",
		                                            "*",
		                                            "
		                                            WHERE id_paciente=".$id_paciente, 
		                                            null);
				}
				if($sistema == 'ibranutro'){
					$id_admissao = $request->getParam("id_admissao");
		        	$paciente_admissao = $db_ibranutro->select_single_to_array("tb_admissao",
		                                            "*",
		                                            "
		                                            WHERE id_admissao=".$id_admissao, 
		                                            null);

					$paciente = $db_ibranutro->select_single_to_array("tb_paciente",
		                                            "*",
		                                            "
		                                            WHERE id_paciente=".$paciente_admissao['id_paciente'], 
		                                            null);

					$paciente['nu_atendimento'] = $paciente_admissao['nu_atendimento'];
					$paciente['id_hospital'] = $paciente_admissao['id_hospital'];
				}

		        $data = $paciente;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_getDado", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");

		        $distribuidores = $db->select_single_to_array("distribuidores",
		                                            "*",
		                                            "
		                                            WHERE id=".$id, 
		                                            null);
		        $data = $distribuidores;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_cadastrar", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
				$id_usuario = $request->getParam("id_usuario");

		        $retorno = array();

		        $admin = $db->select_single_to_array("admin", "*", "WHERE email='".$dados['login']."'",  null);
		        if (!$admin){
		            $senha = hashPass($dados['senha']);
		            $bind = array(  ':id_usuario' => $id_usuario,
		                            ':nome' => $dados['nome'],
		                            ':cpf' => $dados['cpf'],
		                            ':celular' => $dados['celular'],
		                            ':email_contato' => $dados['email'],
		                            ':email' => $dados['login'],
		                            ':senha' => $senha,
		                            ':status' => 0,                  
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->insert("admin", $bind);

		            $bind = array(  ':email' => $dados['login'],
		                            ':senha' => $senha,
		                            ':tipo' => 3,                  
		                            ':status' => 0,
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->insert("usuarios", $bind);
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_cadastrarPrescritor2", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();

		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){ 
				$dados = $request->getParam("dados");
				$id_usuario = $request->getParam("id_usuario");

		        $retorno = array();

		        $prescritores = $db->select_single_to_array("prescritores", "*", "WHERE email='".$dados['login']."'",  null);
		        if (!$prescritores){
		            $senha = hashPass($dados['senha']);
		            $bind = array(  ':id_usuario' => $bruker->usuario['id'],
		                            ':nome' => $dados['nome'],
		                            ':cpf_cnpj' => $dados['cpf_cnpj'],
		                            ':email_contato' => $dados['email'],
		                            ':uf' => $dados['uf'],
		                            ':cidade' => $dados['cidade'],
		                            ':email' => $dados['login'],
		                            ':senha' => $senha,
		                            ':status' => $dados['acesso'],                
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->insert("prescritores", $bind);

		            $bind = array(  ':email' => $dados['login'],
		                            ':senha' => $senha,
		                            ':tipo' => 2,                  
		                            ':status' => 0,
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->insert("usuarios", $bind);

					if($retorno){
						// Create the Transport
						$transport = (new Swift_SmtpTransport('smtp.example.org', 25))
						->setUsername('your username')
						->setPassword('your password')
						;

						// Create the Mailer using your created Transport
						$mailer = new Swift_Mailer($transport);

						// Create a message
						$message = (new Swift_Message('Wonderful Subject'))
						->setFrom(['john@doe.com' => 'John Doe'])
						->setTo([$dados['login']])
						->setBody('
						<p>Olá '.$dados['ds_nome'].',</p>
						<br>
						<br>
						<p>Seja bem-vindo ao <strong>Entric</strong></p>
						<br>
						<br>
						<p>A partir de agora, você tem acesso a mais completa solução para prescrever e orientar pacientes em Terapia Nutricional. </p>
						<br>
						<p>Aqui, você encontra todas as dietas e suplementos para consultar as informações nutricionais ou realizar prescrições de forma intuitiva e simples. Conta ainda com diversas ferramentas práticas de apoio, além de vídeos para orientar o paciente, que podem ser assistidos novamente a qualquer hora e em qualquer lugar.</p>
						<br>
						<br>
						<br>
						<p>Acesse o sistema agora mesmo: [link de acesso].</p>
						<br>
						<br>
						<p>Atenciosamente,</p>
						<p>Equipe Entric</p>
						<br>
						<br>
						<div style="display:flex;justify-content:space-between;padding:20px;padding-left: 70px;padding-right: 70px;background-color:#0092c51f;">
							<div>
								<img src="https://entric.com.br/relatorio_simplificada2/imagem/logo.png" height="45px">
							</div>
							<div style="display:block;margin-top:13px;">
								<a href="mailto:contato@entric.com.br">contato@entric.com.br</a>
								<p style="color:#0092c5;">site.entric.com.br</p>
							</div>
						</div>
						')
						;

						// Send the message
						$result = $mailer->send($message);
					}
		        }
		        
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastros_editar", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
		

		        $check_fabricante = $db->select_single_to_array("fabricantes", "*", "WHERE descricao='".$dados['fabricante']."'",  null);
		        if (!$check_fabricante){
		            $bind = array(  ':descricao' => $dados["fabricante"],
		                            ':status' => 0,                  
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $fabricantes = $db->insert("fabricantes", $bind);
		        }

		        $bind = array(  ':fabricante' => $dados['fabricante'],
		                        ':distribuidor' => $dados['distribuidor'],
		                        ':desconto' => $dados['desconto'],
		                        ':cupom' => $dados['cupom'],
		                        ':uf' => $dados['uf'],
		                        ':endereco' => $dados['endereco'],
		                        ':email' => $dados['email'],
		                        ':site' => $dados['site'],
		                        ':telefone' => $dados['telefone'],
		                        ':whatsapp' => $dados['whatsapp'],
		                        ':mapa' => $dados['mapa']);
		        $retorno = $db->update("distribuidores", "WHERE id=".$dados['id'], $bind);

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastro_cadastrar", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			// $login = $request->getParam("login");
			// if($login == 'ibranutro'){
			// 	$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			// }elseif($login == 'entric'){
			// 	$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			// }

			$dados = $request->getParam("dados");

			$retorno = array();

			$prescritores = $db->select_single_to_array("prescritores", "*", "WHERE cpf_cnpj='".$dados['cpf_cnpj']."' OR email='".$dados['email']."'",  null);
			if ($prescritores){
				$retorno['error'] = "O CPF ou E-mail informado já possui cadastro em nosso banco de dados. <a href=\'senha/prescritor\'>Clique aqui</a> para recuperar sua senha.";

			}
			else{
				if ($dados['profissional'] == "Nutricionista"){
					$dados['regiao_crm'] = null;
					$dados['numero_crm'] = null;  
				}
				else{             
					$dados['regiao_crn'] = null;
					$dados['numero_crn'] = null; 
				}

				$senha = hashPass($dados['senha']);
				$bind = array(  ':email' => $dados['email'],
								':senha' => $senha,
								':tipo' => 2,
								':status' => 0, // solicitado para liberar automaticamente  
								':data_criacao' => date("Y-m-d H:i:s") );
				$usuario = $db->insert("usuarios", $bind);

				$bind = array(  ':id_usuario' => $usuario,
								':nome' => $dados['nome'],
								':email_contato' => $dados['email'],
								':cpf_cnpj' => $dados['cpf_cnpj'],
								':uf' => $dados['uf'],
								':cidade' => $dados['cidade'],
								':telefone' => json_encode($dados['telefone']),
								':telefone_disp' => json_encode($dados['disp_telefone']),
								':email' => $dados['email'],
								':email_disp' => $dados['disp_email'],
								':profissional' => $dados['profissional'],   
								':regiao_crm' => $dados['regiao_crm'],   
								':numero_crm' => $dados['numero_crm'],   
								':regiao_crn' => $dados['regiao_crn'],   
								':numero_crn' => $dados['numero_crn'],   
								':aceito' => (isset($dados['aceito'])?$dados['aceito']:null),
								//':status' => 1,  
								':status' => 0, // solicitado para liberar automaticamente  
								':data_criacao' => date("Y-m-d H:i:s") );

				/*if (isset($_FILES['foto']['error']) and ($_FILES['foto']['error'] == 0)){
					$upfoto = uploadFile(  $_FILES['foto'], 
											"/carteiras");
					$bind[':carteira_frente'] = "/carteiras/".$upfoto;
				}

				if (isset($_FILES['foto2']['error']) and ($_FILES['foto2']['error'] == 0)){
					$upfoto = uploadFile(  $_FILES['foto2'], 
											"/carteiras");
					$bind[':carteira_verso'] = "/carteiras/".$upfoto;
				}*/

				$retorno = $db->insert("prescritores", $bind);
			}
			
			$data = $retorno;

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastro_cadastrarPaciente", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");

		        $bind = array(  ':codigo' => $dados['_codigo'] );
		        $usuario = $db->select_single_to_array(   "usuarios",
		                                                    "*",
		                                                    "WHERE codigo=:codigo", 
		                                                    $bind);

		        $senha = hashPass($dados['senha']);
		        $bind = array(  ':email' => $dados['email'],
		                        ':senha' => $senha,
		                        ':tipo' => 1,                  
		                        ':status' => 0);
		        $retorno = $db->update("usuarios", "WHERE id='".$usuario['id']."'", $bind);

		        $bind = array(  ':id_usuario' => $usuario['id'] );
		        $paciente = $db->select_single_to_array(  "pacientes",
		                                                    "*",
		                                                    "WHERE id_usuario=:id_usuario ORDER BY id DESC", 
		                                                    $bind);
		        if (!$paciente){
		            $bind = array(  ':id_usuario' => $usuario['id'],
		                            ':id_prescritor' => $paciente['id_prescritor'],
		                            ':nome' => $dados['nome'],
		                            ':cpf' => $dados['cpf'],
		                            ':cpf_possui' => 1,
		                            ':email' => $dados['email'],
		                            ':celular' => $paciente['celular'],
		                            ':parentesco' => $paciente['parentesco'],
		                            ':pertence' => $paciente['pertence'],
		                            ':data_nascimento' => $paciente['data_nascimento'],
		                            ':sexo' => $paciente['sexo'],
		                            ':mae' => $paciente['mae'],
		                            ':mae_possui' => $paciente['mae_possui'],
		                            ':codigo' => $dados['_codigo'],
		                            ':status' => 0,
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $paciente = $db->insert("pacientes", $bind);
		        }
		        
		        $data = $paciente;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/cadastro_chkCodigo", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$dados = $request->getParam("dados");
				$retorno = null;
		        
		        $bind = array(  ':codigo' => $codigo );
		        $retorno = $db->select_single_to_array(   "usuarios",
		                                                    "id, email, status",
		                                                    "WHERE codigo=:codigo", 
		                                                    $bind);
		        if ($retorno){
		            $bind = array(  ':id_usuario' => $retorno['id'], ':codigo' => $codigo );
		            $paciente = $db->select_single_to_array(  "pacientes",
		                                                        "nome, cpf",
		                                                        "WHERE id_usuario=:id_usuario AND codigo=:codigo ORDER BY id DESC", 
		                                                        $bind);
		            $retorno = $retorno + $paciente;
		        }
		        
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_getPatrocinador", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$output = $request->getParam("output");

		        $retorno = array();
		        $start = (isset($output['start'])?$output['start']:0);
		        $length = (isset($output['length'])?$output['length']:10);

		        $search = "";
		        if (isset($output['search']['value']) and (trim($output['search']['value']) <> "")){
		            $search = "AND (nome LIKE '%".$output['search']['value']."%'";
		            $search .= "OR cpf LIKE '%".$output['search']['value']."%'";
		            $search .= "OR email LIKE '%".$output['search']['value']."%'";
		        }
		        if ($search<>"") $search .= ")";

		        $q_status = "";
		        if (isset($output['status'])){
		            if ($output['status'] == "todos"){
		                $q_status = " AND (status>=0)";
		            }else{
		                $q_status = " AND (status=".$output['status'].")";                    
		            }
		        }

		        $_opstatus = _patro_status(); $_qopstatus = "CASE"; foreach ($_opstatus as $key => $value) { $_qopstatus .= " WHEN status = ".$key." THEN '".$value."' "; } $_qopstatus .= " END AS status";
		        $base = $db->select_to_array("patrocinadores", "nome, cpf, {$_qopstatus}, id", "WHERE id>0 $q_status $search ORDER BY nome ASC LIMIT $start, $length", null);
		        $base_total = $db->select_to_array("patrocinadores", "id", "WHERE id>0 $q_status ORDER BY id ASC", null);
		        $base_filtered = $db->select_to_array("patrocinadores", "id", "WHERE id>0 $q_status  $search", null);
		        $base_values = array();            
		        if ($base){
		            for ($t = 0; $t < count($base); $t++) {
		                foreach($base[$t] as $k => $v):
		                    $base_values[$t][] = $v;
		                endforeach;
		            }
		        }

		        $retorno['recordsTotal'] = count($base_total);
		        $retorno['recordsFiltered'] = count($base_filtered);
		        $retorno['data'] = $base_values;
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_getAdministrador", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$output = $request->getParam("output");

				$retorno = array();
		        $start = (isset($output['start'])?$output['start']:0);
		        $length = (isset($output['length'])?$output['length']:10);

		        $search = "";
		        if (isset($output['search']['value']) and (trim($output['search']['value']) <> "")){
		            $search = "AND (nome LIKE '%".$output['search']['value']."%'";
		            $search .= "OR cpf LIKE '%".$output['search']['value']."%'";
		            $search .= "OR email LIKE '%".$output['search']['value']."%'";
		        }
		        if ($search<>"") $search .= ")";

		        $q_status = "";
		        if (isset($output['status'])){
		            if ($output['status'] == "todos"){
		                $q_status = " AND (status>=0)";
		            }else{
		                $q_status = " AND (status=".$output['status'].")";                    
		            }
		        }
		        $_opstatus = _admin_status(); $_qopstatus = "CASE"; foreach ($_opstatus as $key => $value) { $_qopstatus .= " WHEN status = ".$key." THEN '".$value."' "; } $_qopstatus .= " END AS status";
		        $base = $db->select_to_array("admin", "nome, cpf, {$_qopstatus}, id", "WHERE tipo>=0 $q_status $search ORDER BY nome ASC LIMIT $start, $length", null);
		        $base_total = $db->select_to_array("admin", "id", "WHERE id>=0 $q_status ORDER BY id ASC", null);
		        $base_filtered = $db->select_to_array("admin", "id", "WHERE tipo>=0 $q_status $search", null);
		        $base_values = array();            
		        if ($base){
		            for ($t = 0; $t < count($base); $t++) {
		                foreach($base[$t] as $k => $v):
		                    $base_values[$t][] = $v;
		                endforeach;
		            }
		        }

		        $retorno['recordsTotal'] = count($base_total);
		        $retorno['recordsFiltered'] = count($base_filtered);
		        $retorno['data'] = $base_values;
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_getPrescritor", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$output = $request->getParam("output");

		        $retorno = array();
		        $start = (isset($output['start'])?$output['start']:0);
		        $length = (isset($output['length'])?$output['length']:10);

		        $search = "";
		        if (isset($output['search']['value']) and (trim($output['search']['value']) <> "")){
		            $search = "AND (nome LIKE '%".$output['search']['value']."%'";
		            $search .= "OR cpf_cnpj LIKE '%".$output['search']['value']."%'";
		            $search .= "OR email_contato LIKE '%".$output['search']['value']."%'";
		            $search .= "OR uf LIKE '%".$output['search']['value']."%'";
		            $search .= "OR cidade LIKE '%".$output['search']['value']."%'";
		            $search .= "OR email LIKE '%".$output['search']['value']."%'";
		        }
		        if ($search<>"") $search .= ")";

		        $q_status = "";
		        if (isset($output['status'])){
		            if ($output['status'] == "todos"){
		                $q_status = " AND (status>=0)";
		            }else{
		                $q_status = " AND (status=".$output['status'].")";                    
		            }
		        }

		        $_opstatus = _pres_status(); $_qopstatus = "CASE"; foreach ($_opstatus as $key => $value) { $_qopstatus .= " WHEN status = ".$key." THEN '".$value."' "; } $_qopstatus .= " END AS status";
		        $base = $db->select_to_array("prescritores", "nome, cpf_cnpj AS cpf, uf, cidade, email, {$_qopstatus}, id", "WHERE id>0 $q_status $search ORDER BY id DESC, nome ASC LIMIT $start, $length", null);
		        $base_total = $db->select_to_array("prescritores", "id", "WHERE id>0 $q_status ORDER BY id ASC", null);
		        $base_filtered = $db->select_to_array("prescritores", "id", "WHERE id>0 $q_status $search", null);
		        $base_values = array();            
		        if ($base){
		            for ($t = 0; $t < count($base); $t++) {
		                foreach($base[$t] as $k => $v):
		                    $base_values[$t][] = $v;
		                endforeach;
		            }
		        }
		        $retorno['recordsTotal'] = count($base_total);
		        $retorno['recordsFiltered'] = count($base_filtered);
		        $retorno['data'] = $base_values;
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_getUnidades", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
		        $retorno = array();
		        $produtos = $db->select_to_array("unidades", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }

		        $fabricante = array();
		        $produtos = $db->select_to_array("unidades", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $fabricante[0]['id'] = "";
		            $fabricante[0]['text'] = "...";
		            for ($i = 0; $i < count($produtos); $i++){
		                $fabricante[ ($i+1) ]['id'] = $produtos[$i]['descricao'];
		                $fabricante[ ($i+1) ]['text'] = $produtos[$i]['descricao'];
		            }
		        }

		        $retorno_completo = array();
		        $retorno_completo['rm'] = $retorno;
		        $retorno_completo['unidades'] = $fabricante;

		        $data = $retorno_completo;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_gt_admin", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
		        $retorno = $db->select_single_to_array("admin", "*", "WHERE id=".$id, null);
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_gt_patroc", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
        		$retorno = $db->select_single_to_array("patrocinadores", "*", "WHERE id=".$id, null);
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_gt_prescritores", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");
        		$retorno = $db->select_single_to_array("prescritores", "*", "WHERE id=".$id, null);
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_gt_endereco_distribuidor", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}

			if ($usuario){
				$id = $request->getParam("id");

		        $retorno = "";
		        $endereco = $db->select_single_to_array("distribuidores", "uf, endereco, telefone, whatsapp, email, site, mapa", "WHERE id=".$id, null);
		        if ($endereco){
		            $retorno .= "<label class='grid_label'>Endereço:</label> ".ucfirst(strtolower($endereco["endereco"]))."<br>";
		            $retorno .= "<label class='grid_label'>UF:</label> ".$endereco["uf"]."<br>";
		            if ($endereco["telefone"] <> ""){
		                $retorno .= "<label class='grid_label'>Telefone:</label> ".$endereco["telefone"]."<br>";
		            }
		            if ($endereco["whatsapp"] <> ""){
		                $retorno .= "<label class='grid_label'>Whatsapp:</label> ".$endereco["whatsapp"]."<br>";
		            }
		            if ($endereco["email"] <> ""){
		                $retorno .= "<label class='grid_label'>E-mail:</label> ".strtolower($endereco["email"])."<br>";
		            }
		            if ($endereco["site"] <> ""){
		                $retorno .= "<label class='grid_label'>Site:</label> ".strtolower($endereco["site"])."<br>";
		            }
		            if ($endereco["site"] <> ""){
		                $retorno .= "<br>".$endereco["mapa"];
		            }
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_unidades_cadastrar", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        
		        $bind = array(  ':descricao' => $dados['unidade'],
		                        ':status' => 0,
		                        ':data_criacao' => date("Y-m-d H:i:s"));
		        $retorno = $db->insert("unidades", $bind);

		        $retorno = array();
		        $produtos = $db->select_to_array("unidades", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }
		        $fabricante = array();
		        $produtos = $db->select_to_array("unidades", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $fabricante[0]['id'] = "";
		            $fabricante[0]['text'] = "...";
		            for ($i = 0; $i < count($produtos); $i++){
		                $fabricante[ ($i+1) ]['id'] = $produtos[$i]['descricao'];
		                $fabricante[ ($i+1) ]['text'] = $produtos[$i]['descricao'];
		            }
		        }

		        $retorno_completo = array();
		        $retorno_completo['rm'] = $retorno;
		        $retorno_completo['unidades'] = $fabricante;

		        $data = $retorno_completo;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_unidades_editar", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        
		        $bind = array(':descricao' => $dados['unidade']);
		        $retorno = $db->update("unidades", "WHERE descricao='".$dados['unidade2']."'", $bind);

		        $retorno = array();
		        $produtos = $db->select_to_array("unidades", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }
		        $fabricante = array();
		        $produtos = $db->select_to_array("unidades", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $fabricante[0]['id'] = "";
		            $fabricante[0]['text'] = "...";
		            for ($i = 0; $i < count($produtos); $i++){
		                $fabricante[ ($i+1) ]['id'] = $produtos[$i]['descricao'];
		                $fabricante[ ($i+1) ]['text'] = $produtos[$i]['descricao'];
		            }
		        }

		        $retorno_completo = array();
		        $retorno_completo['rm'] = $retorno;
		        $retorno_completo['unidades'] = $fabricante;


		        $data = $retorno_completo;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_rmUnidade", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        
		        $retorno = $db->delete("unidades", "WHERE descricao='".$dados."'", null); 


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_fabricantes_editar", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        
		        $bind = array(':descricao' => $dados['fabricante']);
		        $retorno = $db->update("fabricantes", "WHERE descricao='".$dados['fabricante2']."'", $bind);

		        $retorno = array();
		        $produtos = $db->select_to_array("fabricantes", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }
		        $fabricante = array();
		        $produtos = $db->select_to_array("fabricantes", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $fabricante[0]['id'] = "";
		            $fabricante[0]['text'] = "...";
		            for ($i = 0; $i < count($produtos); $i++){
		                $fabricante[ ($i+1) ]['id'] = $produtos[$i]['descricao'];
		                $fabricante[ ($i+1) ]['text'] = $produtos[$i]['descricao'];
		            }
		        }

		        $retorno_completo = array();
		        $retorno_completo['rm'] = $retorno;
		        $retorno_completo['fabricantes'] = $fabricante;


		        $data = $retorno_completo;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_fabricantes_cadastrar", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        
		        $bind = array(  ':descricao' => $dados['fabricante'],
		                        ':status' => 0,
		                        ':data_criacao' => date("Y-m-d H:i:s"));
		        $retorno = $db->insert("fabricantes", $bind);

		        $retorno = array();
		        $produtos = $db->select_to_array("fabricantes", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }
		        $fabricante = array();
		        $produtos = $db->select_to_array("fabricantes", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $fabricante[0]['id'] = "";
		            $fabricante[0]['text'] = "...";
		            for ($i = 0; $i < count($produtos); $i++){
		                $fabricante[ ($i+1) ]['id'] = $produtos[$i]['descricao'];
		                $fabricante[ ($i+1) ]['text'] = $produtos[$i]['descricao'];
		            }
		        }

		        $retorno_completo = array();
		        $retorno_completo['rm'] = $retorno;
		        $retorno_completo['fabricantes'] = $fabricante;


		        $data = $retorno_completo;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_VerVideo", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        
		        $retorno = $db->insert("log", $dados);


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_rmVideo", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$id = $request->getParam("id");

		        $retorno = $db->delete("videos", "WHERE id='".$id."'", null); 

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_rmDistribuidor", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$id = $request->getParam("id");

		        $retorno = $db->delete("distribuidores", "WHERE id='".$id."'", null);  

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_rmFabricante", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        $retorno = $db->delete("fabricantes", "WHERE descricao='".$dados."'", null); 

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_getFabricantes", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){

		        $retorno = array();
		        $produtos = $db->select_to_array("fabricantes", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            for ($i = 0; $i < count($produtos); $i++){
		                $retorno[ $produtos[$i]['descricao'] ] = $produtos[$i]['descricao'];
		            }
		        }

		        $fabricante = array();
		        $produtos = $db->select_to_array("fabricantes", "DISTINCT(descricao) AS descricao", "WHERE (descricao <> '' AND descricao IS NOT NULL) ORDER BY descricao ASC",  null);
		        if ($produtos){
		            $fabricante[0]['id'] = "";
		            $fabricante[0]['text'] = "...";
		            for ($i = 0; $i < count($produtos); $i++){
		                $fabricante[ ($i+1) ]['id'] = $produtos[$i]['descricao'];
		                $fabricante[ ($i+1) ]['text'] = $produtos[$i]['descricao'];
		            }
		        }

		        $retorno_completo = array();
		        $retorno_completo['rm'] = $retorno;
		        $retorno_completo['fabricantes'] = $fabricante;

		        $data = $retorno_completo;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_gt_fabricantes", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){

	        	$retorno = array();

	            $start = (isset($output['start'])?$output['start']:0);
	            $length = (isset($output['length'])?$output['length']:10);
	            if (($output['order'][0]['column']+1) == 1)
	                $order = "descricao";
	            $dir = (isset($output['order'][0]['dir'])?$output['order'][0]['dir']:"ASC");

	            $search = "";
	            if (isset($output['search']['value']) and (trim($output['search']['value']) <> "")){
	                $search = "AND (descricao LIKE '%".$output['search']['value']."%')";
	            }

	            $base = $db->select_to_array("fabricantes", "id, descricao, id AS acao", "WHERE status=0 $search ORDER BY $order $dir LIMIT $start, $length", null);
	            $base_total = $db->select_to_array("fabricantes", "descricao", "WHERE status=0", null);
	            $base_filtered = $db->select_to_array("fabricantes", "descricao", "WHERE status=0 $search", null);

	            $base_values = array();            
	            if ($base){
	                for ($t = 0; $t < count($base); $t++) {
	                    foreach($base[$t] as $k => $v):
	                        $base_values[$t][] = $v;
	                    endforeach;
	                }
	            }

	            $retorno['recordsTotal'] = count($base_total);
	            $retorno['recordsFiltered'] = count($base_filtered);
	            $retorno['data'] = $base_values;

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stHistoria", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				if($dados['login_tipo'] == 'ibranutro'){
					$id_prescritor_ibranutro = $id_prescritor;
					$id_prescritor = null;
				}elseif($dados['login_tipo'] == 'entric'){
					$id_prescritor_ibranutro = null;
				}

		        $paciente = $db->select_single_to_array("pacientes", "email", "WHERE id=".$dados['id_paciente'], null);
		        
		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':id_paciente' => $dados['id_paciente'],
		                            ':id_prescritor' => $id_prescritor,
		                            ':id_prescritor_ibranutro' => $id_prescritor_ibranutro,
		                            ':historia' => $dados["historia"],
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->insert("relatorios", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "email" => $paciente['email'], "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno) );
		        }
		        else{
		            $bind = array(  ':id_paciente' => $dados['id_paciente'],
		                            ':id_prescritor' => $id_prescritor,
		                            ':id_prescritor_ibranutro' => $id_prescritor_ibranutro,
		                            ':historia' => $dados["historia"],
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio'], $bind);  
		            $retorno = array("success" => "Dados salvos com sucesso.", "email" => $paciente['email'], "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stAvaliacao", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");


		        if (!isset($dados["circunferencia_lado"])) $dados["circunferencia_lado"] = array();
		        if (!isset($dados["dobras_lado"])) $dados["dobras_lado"] = array();

		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':data' => date2sql($dados['data']),
		                            ':altura' => $dados["altura"],
		                            ':altura_valor' => $dados["altura_valor"],
		                            ':peso' => array_json($dados["peso"]),
		                            ':peso_valor' => array_json($dados["peso_valor"]),
		                            ':imc' => array_json($dados["imc"]),
		                            ':circunferencias' => array_json($dados["circunferencias"]),
		                            ':circunferencias_valor' => array_json($dados["circunferencias_valor"]),
		                            ':circunferencia_lado' => array_json($dados["circunferencia_lado"]),
		                            ':dobras' => array_json($dados["dobras"]),
		                            ':dobras_valor' => array_json($dados["dobras_valor"]),
		                            ':dobras_lado' => array_json($dados["dobras_lado"]),
		                            ':observacao' => $dados["observacao"],
		                            ':exames_nutricionais_complementares' => $dados["exames_nutricionais_complementares"],
		                            ':diagnostico_nutricional' => $dados["diagnostico_nutricional"],
		                            ':triagem_nutricional' => $dados["triagem_nutricional"],
		                            ':exame_fisico' => $dados["exame_fisico"],
		                            ':exame_bioquimico' => $dados["exame_bioquimico"] );

		            $retorno = $db->insert("relatorios", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $bind = array(  ':data' => date2sql($dados['data']),
		                            ':altura' => $dados["altura"],
		                            ':altura_valor' => $dados["altura_valor"],
		                            ':peso' => array_json($dados["peso"]),
		                            ':peso_valor' => array_json($dados["peso_valor"]),
		                            ':imc' => array_json($dados["imc"]),
		                            ':circunferencias' => array_json($dados["circunferencias"]),
		                            ':circunferencias_valor' => array_json($dados["circunferencias_valor"]),
		                            ':circunferencia_lado' => array_json($dados["circunferencia_lado"]),
		                            ':dobras' => array_json($dados["dobras"]),
		                            ':dobras_valor' => array_json($dados["dobras_valor"]),
		                            ':dobras_lado' => array_json($dados["dobras_lado"]),
		                            ':observacao' => $dados["observacao"],
		                            ':exames_nutricionais_complementares' => $dados["exames_nutricionais_complementares"],
		                            ':diagnostico_nutricional' => $dados["diagnostico_nutricional"],
		                            ':triagem_nutricional' => $dados["triagem_nutricional"],
		                            ':exame_fisico' => $dados["exame_fisico"],
		                            ':exame_bioquimico' => $dados["exame_bioquimico"] );

		            $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio'], $bind);  

		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stNecessidades", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");


		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':nec_calorias_peso' => $dados['nec_calorias_peso'],
		                            ':nec_calorias_peso_valor' => $dados["nec_calorias_peso_valor"],
		                            ':nec_calorias_total' => $dados["nec_calorias_total"],
		                            ':calorias' => $dados["tab_calorias"],
		                            ':formula_valor' => $dados["formula_valor"],
		                            ':fator_atividade_valor' => $dados["fator_atividade_valor"],
		                            ':fator_injuria_tipo' => $dados["fator_injuria_tipo"],
		                            ':fator_injuria_valor' => $dados["fator_injuria_valor"],
		                            ':fator_termico_valor' => $dados["fator_termico_valor"],
		                            ':nec_proteinas_peso' => $dados["nec_proteinas_peso"],
		                            ':nec_proteinas_peso_valor' => $dados["nec_proteinas_peso_valor"],
		                            ':nec_proteinas_total' => $dados["nec_proteinas_total"],
		                            ':proteinas_valor' => $dados["proteinas_valor"],
		                            ':nec_agua_peso' => $dados["nec_agua_peso"],
		                            ':nec_agua_peso_valor' => $dados["nec_agua_peso_valor"],
		                            ':nec_agua_total' => $dados["nec_agua_total"],
		                            ':agua_valor' => $dados["agua_valor"] );

		            $retorno = $db->insert("relatorios", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $bind = array(  ':nec_calorias_peso' => $dados['nec_calorias_peso'],
		                            ':nec_calorias_peso_valor' => $dados["nec_calorias_peso_valor"],
		                            ':nec_calorias_total' => $dados["nec_calorias_total"],
		                            
		                            ':calorias' => $dados["tab_calorias"],
		                            ':formula_valor' => $dados["formula_valor"],
		                            ':fator_atividade_valor' => $dados["fator_atividade_valor"],
		                            ':fator_injuria_tipo' => $dados["fator_injuria_tipo"],
		                            ':fator_injuria_valor' => $dados["fator_injuria_valor"],
		                            ':fator_termico_valor' => $dados["fator_termico_valor"],

		                            ':nec_proteinas_peso' => $dados["nec_proteinas_peso"],
		                            ':nec_proteinas_peso_valor' => $dados["nec_proteinas_peso_valor"],
		                            ':nec_proteinas_total' => $dados["nec_proteinas_total"],          

		                            ':proteinas_valor' => $dados["proteinas_valor"],
		                            ':nec_agua_peso' => $dados["nec_agua_peso"],
		                            ':nec_agua_peso_valor' => $dados["nec_agua_peso_valor"],
		                            ':nec_agua_total' => $dados["nec_agua_total"],                            
		                            ':agua_valor' => $dados["agua_valor"] );

		            $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio'], $bind);  
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stCalculo", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				if($dados['login_tipo'] == 'ibranutro'){
					$campo_prescritor = ':id_prescritor_ibranutro';
				}elseif($dados['login_tipo'] == 'entric'){
					$campo_prescritor = ':id_prescritor';
				}

				$id_prescritor = $request->getParam("id_prescritor"); 

				if (!isset($dados['categoria'])) $dados['categoria'] = null;
		        if (!isset($dados['tipo_produto'])) $dados['tipo_produto'] = null;
		        if (!isset($dados['tipo_prescricao'])) $dados['tipo_prescricao'] = null;
		        if (!isset($dados['dispositivo'])) $dados['dispositivo'] = null;
		        if (!isset($dados['calculo_apres_fechado'])) $dados['calculo_apres_fechado'] = null; else $dados['calculo_apres_fechado'] = true;
		        if (!isset($dados['calculo_apres_aberto_liquido'])) $dados['calculo_apres_aberto_liquido'] = null; else $dados['calculo_apres_aberto_liquido'] = true;
		        if (!isset($dados['calculo_apres_aberto_po'])) $dados['calculo_apres_aberto_po'] = null; else $dados['calculo_apres_aberto_po'] = true;
		        if (!isset($dados['calculo_fil_todos'])) $dados['calculo_fil_todos'] = null; else $dados['calculo_fil_todos'] = true;
		        if (!isset($dados['calculo_apres_liquidocreme'])) $dados['calculo_apres_liquidocreme'] = null; else $dados['calculo_apres_liquidocreme'] = true;
		        if (!isset($dados['calculo_apres_po'])) $dados['calculo_apres_po'] = null; else $dados['calculo_apres_po'] = true;
		        if (!isset($dados['calculo_fil_semlactose'])) $dados['calculo_fil_semlactose'] = null; else $dados['calculo_fil_semlactose'] = true;
		        if (!isset($dados['calculo_fil_semfibras'])) $dados['calculo_fil_semfibras'] = null; else $dados['calculo_fil_semfibras'] = true;
		        if (!isset($dados['calculo_fil_polimerico'])) $dados['calculo_fil_polimerico'] = null; else $dados['calculo_fil_polimerico'] = true;
		        if (!isset($dados['calculo_fil_semsacarose'])) $dados['calculo_fil_semsacarose'] = null; else $dados['calculo_fil_semsacarose'] = true;
		        if (!isset($dados['calculo_fil_100proteina'])) $dados['calculo_fil_100proteina'] = null; else $dados['calculo_fil_100proteina'] = true;
		        if (!isset($dados['calculo_fil_oligomerico'])) $dados['calculo_fil_oligomerico'] = null; else $dados['calculo_fil_oligomerico'] = true;
		        if (!isset($dados['calculo_fil_comfibras'])) $dados['calculo_fil_comfibras'] = null; else $dados['calculo_fil_comfibras'] = true;
		        if ($dados['tipo_produto'] == "Oral"){
		            if (!isset($dados['calculo_fil_todos2'])) $dados['calculo_fil_todos'] = null; else $dados['calculo_fil_todos'] = true;
		            if (!isset($dados['calculo_fil_semsacarose2'])) $dados['calculo_fil_semsacarose'] = null; else $dados['calculo_fil_semsacarose'] = true;
		            if (!isset($dados['calculo_fil_comfibras2'])) $dados['calculo_fil_comfibras'] = null; else $dados['calculo_fil_comfibras'] = true;
		            if (!isset($dados['calculo_fil_semlactose2'])) $dados['calculo_fil_semlactose'] = null; else $dados['calculo_fil_semlactose'] = true;
		            if (!isset($dados['calculo_fil_semfibras2'])) $dados['calculo_fil_semfibras'] = null; else $dados['calculo_fil_semfibras'] = true;
		            if (!isset($dados['calculo_fil_100proteina2'])) $dados['calculo_fil_100proteina'] = null; else $dados['calculo_fil_100proteina'] = true;
		        }
		        if (!isset($dados['dieta_formula'])) $dados['dieta_formula'] = null;
		        if (!isset($dados['dieta_volume'])) $dados['dieta_volume'] = null;
		        if (!isset($dados['dieta_infusao'])) $dados['dieta_infusao'] = null;
		        if (!isset($dados['dieta_fracionamento_dia'])) $dados['dieta_fracionamento_dia'] = null;
		        if (!isset($dados['dieta_horario_administracao'])) $dados['dieta_horario_administracao'] = null;
		        if (!isset($dados['dieta_vazao_h'])) $dados['dieta_vazao_h'] = null;
		        if (!isset($dados['dieta_horario_inicio'])) $dados['dieta_horario_inicio'] = null;
		        if (!isset($dados['modulo_produto'])) $dados['modulo_produto'] = null;
		        if (!isset($dados['modulo_quantidade'])) $dados['modulo_quantidade'] = null;
		        if (!isset($dados['modulo_volume'])) $dados['modulo_volume'] = null;
		        if (!isset($dados['modulo_horario'])) $dados['modulo_horario'] = null;
		        if (!isset($dados['modulo_volume_total'])) $dados['modulo_volume_total'] = null;
		        if (!isset($dados['suplemento_produto'])) $dados['suplemento_produto'] = null;
		        if (!isset($dados['suplemento_quantidade'])) $dados['suplemento_quantidade'] = null;
		        if (!isset($dados['suplemento_horario'])) $dados['suplemento_horario'] = null;
		        if (!isset($dados['suplemento_volume_total'])) $dados['suplemento_volume_total'] = null;
		        if (!isset($dados['hidratacao_agua_livre'])) $dados['hidratacao_agua_livre'] = null;

		        $bind = array(  $campo_prescritor => $id_prescritor,
								':categoria' => $dados['categoria'],
		                        ':tipo_produto' => $dados["tipo_produto"],
		                        ':tipo_prescricao' => $dados["tipo_prescricao"],
		                        ':dispositivo' => $dados["dispositivo"],
		                        ':calculo_apres_fechado' => $dados["calculo_apres_fechado"],
		                        ':calculo_apres_aberto_liquido' => $dados["calculo_apres_aberto_liquido"],
		                        ':calculo_apres_aberto_po' => $dados["calculo_apres_aberto_po"],
		                        ':calculo_apres_liquidocreme' => $dados["calculo_apres_liquidocreme"],
		                        ':calculo_apres_po' => $dados["calculo_apres_po"],
		                        ':calculo_fil_todos' => $dados["calculo_fil_todos"],
		                        ':calculo_fil_semlactose' => $dados["calculo_fil_semlactose"],
		                        ':calculo_fil_semfibras' => $dados["calculo_fil_semfibras"],
		                        ':calculo_fil_polimerico' => $dados["calculo_fil_polimerico"],
		                        ':calculo_fil_semsacarose' => $dados["calculo_fil_semsacarose"],
		                        ':calculo_fil_100proteina' => $dados["calculo_fil_100proteina"],
		                        ':calculo_fil_oligomerico' => $dados["calculo_fil_oligomerico"],
		                        ':calculo_fil_comfibras' => $dados["calculo_fil_comfibras"],
		                        ':dieta_formula' => array_json($dados["dieta_formula"], false),
		                        ':dieta_volume' => array_json($dados["dieta_volume"], false),
		                        ':dieta_infusao' => array_json($dados["dieta_infusao"], false),
		                        ':dieta_fracionamento_dia' => array_json($dados["dieta_fracionamento_dia"], false),
		                        ':dieta_horario_administracao' => array_json($dados["dieta_horario_administracao"], false),
		                        ':dieta_vazao_h' => array_json($dados["dieta_vazao_h"], false),
		                        ':dieta_horario_inicio' => array_json($dados["dieta_horario_inicio"], false),
		                        ':modulo_produto' => array_json($dados["modulo_produto"], false),
		                        ':modulo_quantidade' => array_json($dados["modulo_quantidade"], false),
		                        ':modulo_volume' => array_json($dados["modulo_volume"], false),
		                        ':modulo_horario' => array_json($dados["modulo_horario"], false),
		                        ':modulo_volume_total' => array_json($dados["modulo_volume_total"], false) ,
		                        ':suplemento_produto' => array_json($dados["suplemento_produto"], false) ,
		                        ':suplemento_quantidade' => array_json($dados["suplemento_quantidade"], false) ,
		                        ':suplemento_horario' => array_json($dados["suplemento_horario"], false) ,
		                        ':suplemento_volume_total' => array_json($dados["suplemento_volume_total"], false) ,
		                        ':hidratacao_agua_livre' => array_json($dados["hidratacao_agua_livre"], false) );

		        if ($dados['id_relatorio'] == ""){
		            $retorno = $db->insert("relatorios", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio'], $bind);  
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stCalculoSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

				if($dados['login_tipo'] == 'ibranutro'){
					$campo_prescritor = ':id_prescritor_ibranutro';
				}elseif($dados['login_tipo'] == 'entric'){
					$campo_prescritor = ':id_prescritor';
				}

				$id_prescritor = $request->getParam("id_prescritor");

				if (!isset($dados['categoria'])) $dados['categoria'] = null;
		        if (!isset($dados['tipo_produto'])) $dados['tipo_produto'] = null;
		        if (!isset($dados['tipo_prescricao'])) $dados['tipo_prescricao'] = null;
		        if (!isset($dados['dispositivo'])) $dados['dispositivo'] = null;
		        if (!isset($dados['calculo_apres_fechado'])) $dados['calculo_apres_fechado'] = null; else $dados['calculo_apres_fechado'] = true;
		        if (!isset($dados['calculo_apres_aberto_liquido'])) $dados['calculo_apres_aberto_liquido'] = null; else $dados['calculo_apres_aberto_liquido'] = true;
		        if (!isset($dados['calculo_apres_aberto_po'])) $dados['calculo_apres_aberto_po'] = null; else $dados['calculo_apres_aberto_po'] = true;
		        if (!isset($dados['calculo_fil_todos'])) $dados['calculo_fil_todos'] = null; else $dados['calculo_fil_todos'] = true;
		        if (!isset($dados['calculo_apres_liquidocreme'])) $dados['calculo_apres_liquidocreme'] = null; else $dados['calculo_apres_liquidocreme'] = true;
		        if (!isset($dados['calculo_apres_po'])) $dados['calculo_apres_po'] = null; else $dados['calculo_apres_po'] = true;
		        if (!isset($dados['calculo_fil_semlactose'])) $dados['calculo_fil_semlactose'] = null; else $dados['calculo_fil_semlactose'] = true;
		        if (!isset($dados['calculo_fil_semfibras'])) $dados['calculo_fil_semfibras'] = null; else $dados['calculo_fil_semfibras'] = true;
		        if (!isset($dados['calculo_fil_polimerico'])) $dados['calculo_fil_polimerico'] = null; else $dados['calculo_fil_polimerico'] = true;
		        if (!isset($dados['calculo_fil_semsacarose'])) $dados['calculo_fil_semsacarose'] = null; else $dados['calculo_fil_semsacarose'] = true;
		        if (!isset($dados['calculo_fil_100proteina'])) $dados['calculo_fil_100proteina'] = null; else $dados['calculo_fil_100proteina'] = true;
		        if (!isset($dados['calculo_fil_oligomerico'])) $dados['calculo_fil_oligomerico'] = null; else $dados['calculo_fil_oligomerico'] = true;
		        if (!isset($dados['calculo_fil_comfibras'])) $dados['calculo_fil_comfibras'] = null; else $dados['calculo_fil_comfibras'] = true;
		        if ($dados['tipo_produto'] == "Oral"){
		            if (!isset($dados['calculo_fil_todos2'])) $dados['calculo_fil_todos'] = null; else $dados['calculo_fil_todos'] = true;
		            if (!isset($dados['calculo_fil_semsacarose2'])) $dados['calculo_fil_semsacarose'] = null; else $dados['calculo_fil_semsacarose'] = true;
		            if (!isset($dados['calculo_fil_comfibras2'])) $dados['calculo_fil_comfibras'] = null; else $dados['calculo_fil_comfibras'] = true;
		            if (!isset($dados['calculo_fil_semlactose2'])) $dados['calculo_fil_semlactose'] = null; else $dados['calculo_fil_semlactose'] = true;
		            if (!isset($dados['calculo_fil_semfibras2'])) $dados['calculo_fil_semfibras'] = null; else $dados['calculo_fil_semfibras'] = true;
		            if (!isset($dados['calculo_fil_100proteina2'])) $dados['calculo_fil_100proteina'] = null; else $dados['calculo_fil_100proteina'] = true;
		        }
		        if (!isset($dados['dieta_formula'])) $dados['dieta_formula'] = null;
		        if (!isset($dados['dieta_volume'])) $dados['dieta_volume'] = null;
		        if (!isset($dados['dieta_infusao'])) $dados['dieta_infusao'] = null;
		        if (!isset($dados['dieta_fracionamento_dia'])) $dados['dieta_fracionamento_dia'] = null;
		        if (!isset($dados['dieta_horario_administracao'])) $dados['dieta_horario_administracao'] = null;
		        if (!isset($dados['dieta_vazao_h'])) $dados['dieta_vazao_h'] = null;
		        if (!isset($dados['dieta_horario_inicio'])) $dados['dieta_horario_inicio'] = null;
		        if (!isset($dados['modulo_produto'])) $dados['modulo_produto'] = null;
		        if (!isset($dados['modulo_quantidade'])) $dados['modulo_quantidade'] = null;
		        if (!isset($dados['modulo_volume'])) $dados['modulo_volume'] = null;
		        if (!isset($dados['modulo_horario'])) $dados['modulo_horario'] = null;
		        if (!isset($dados['modulo_volume_total'])) $dados['modulo_volume_total'] = null;
		        if (!isset($dados['suplemento_produto'])) $dados['suplemento_produto'] = null;
		        if (!isset($dados['suplemento_quantidade'])) $dados['suplemento_quantidade'] = null;
		        if (!isset($dados['suplemento_horario'])) $dados['suplemento_horario'] = null;
		        if (!isset($dados['suplemento_volume_total'])) $dados['suplemento_volume_total'] = null;
		        if (!isset($dados['hidratacao_agua_livre'])) $dados['hidratacao_agua_livre'] = null;

		        $bind = array( 
								$campo_prescritor => $id_prescritor,
								':categoria' => $dados['categoria'],
		                        ':tipo_produto' => $dados["tipo_produto"],
		                        ':tipo_prescricao' => $dados["tipo_prescricao"],
		                        ':dispositivo' => $dados["dispositivo"],
		                        ':calculo_apres_fechado' => $dados["calculo_apres_fechado"],
		                        ':calculo_apres_aberto_liquido' => $dados["calculo_apres_aberto_liquido"],
		                        ':calculo_apres_aberto_po' => $dados["calculo_apres_aberto_po"],
		                        ':calculo_apres_liquidocreme' => $dados["calculo_apres_liquidocreme"],
		                        ':calculo_apres_po' => $dados["calculo_apres_po"],
		                        ':calculo_fil_todos' => $dados["calculo_fil_todos"],
		                        ':calculo_fil_semlactose' => $dados["calculo_fil_semlactose"],
		                        ':calculo_fil_semfibras' => $dados["calculo_fil_semfibras"],
		                        ':calculo_fil_polimerico' => $dados["calculo_fil_polimerico"],
		                        ':calculo_fil_semsacarose' => $dados["calculo_fil_semsacarose"],
		                        ':calculo_fil_100proteina' => $dados["calculo_fil_100proteina"],
		                        ':calculo_fil_oligomerico' => $dados["calculo_fil_oligomerico"],
		                        ':calculo_fil_comfibras' => $dados["calculo_fil_comfibras"],
		                        ':dieta_formula' => array_json($dados["dieta_formula"], false),
		                        ':dieta_volume' => array_json($dados["dieta_volume"], false),
		                        ':dieta_infusao' => array_json($dados["dieta_infusao"], false),
		                        ':dieta_fracionamento_dia' => array_json($dados["dieta_fracionamento_dia"], false),
		                        ':dieta_horario_administracao' => array_json($dados["dieta_horario_administracao"], false),
		                        ':dieta_vazao_h' => array_json($dados["dieta_vazao_h"], false),
		                        ':dieta_horario_inicio' => array_json($dados["dieta_horario_inicio"], false),
		                        ':modulo_produto' => array_json($dados["modulo_produto"], false),
		                        ':modulo_quantidade' => array_json($dados["modulo_quantidade"], false),
		                        ':modulo_volume' => array_json($dados["modulo_volume"], false),
		                        ':modulo_horario' => array_json($dados["modulo_horario"], false),
		                        ':modulo_volume_total' => array_json($dados["modulo_volume_total"], false) ,
		                        ':suplemento_produto' => array_json($dados["suplemento_produto"], false) ,
		                        ':suplemento_quantidade' => array_json($dados["suplemento_quantidade"], false) ,
		                        ':suplemento_horario' => array_json($dados["suplemento_horario"], false) ,
		                        ':suplemento_volume_total' => array_json($dados["suplemento_volume_total"], false) ,
		                        ':hidratacao_agua_livre' => array_json($dados["hidratacao_agua_livre"], false) );


		        if ($dados['id_relatorio'] == ""){
					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_simplificada", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $retorno = $db->update("relatorios_simplificada", "WHERE id=".$dados['id_relatorio'], $bind);  
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stCalculoSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				if($dados['login_tipo'] == 'ibranutro'){
					$campo_prescritor = ':id_prescritor_ibranutro';
				}elseif($dados['login_tipo'] == 'entric'){
					$campo_prescritor = ':id_prescritor';
				}

				$id_prescritor = $request->getParam("id_prescritor");

				if (!isset($dados['categoria'])) $dados['categoria'] = null;
		        if (!isset($dados['tipo_produto'])) $dados['tipo_produto'] = null;
		        if (!isset($dados['tipo_prescricao'])) $dados['tipo_prescricao'] = null;
		        if (!isset($dados['dispositivo'])) $dados['dispositivo'] = null;
		        if (!isset($dados['calculo_apres_fechado'])) $dados['calculo_apres_fechado'] = null; else $dados['calculo_apres_fechado'] = true;
		        if (!isset($dados['calculo_apres_aberto_liquido'])) $dados['calculo_apres_aberto_liquido'] = null; else $dados['calculo_apres_aberto_liquido'] = true;
		        if (!isset($dados['calculo_apres_aberto_po'])) $dados['calculo_apres_aberto_po'] = null; else $dados['calculo_apres_aberto_po'] = true;
		        if (!isset($dados['calculo_fil_todos'])) $dados['calculo_fil_todos'] = null; else $dados['calculo_fil_todos'] = true;
		        if (!isset($dados['calculo_apres_liquidocreme'])) $dados['calculo_apres_liquidocreme'] = null; else $dados['calculo_apres_liquidocreme'] = true;
		        if (!isset($dados['calculo_apres_po'])) $dados['calculo_apres_po'] = null; else $dados['calculo_apres_po'] = true;

				if(isset($dados['carac_oral'])){
					$array_carac = $dados['carac_oral'];

					if(in_array('Sem Sacarose', $array_carac)){
						$dados['calculo_fil_semsacarose'] = true;
					}else{
						$dados['calculo_fil_semsacarose'] = null;
					}
					if(in_array('Sem Lactose', $array_carac)){
						$dados['calculo_fil_semlactose'] = true;
					}else{
						$dados['calculo_fil_semlactose'] = null;
					}
					if(in_array('Hipocalórico', $array_carac)){
						$dados['calculo_fil_hipocalorico'] = true;
					}else{
						$dados['calculo_fil_hipocalorico'] = null;
					}
					if(in_array('Hipoproteico', $array_carac)){
						$dados['calculo_fil_hipoproteico'] = true;
					}else{
						$dados['calculo_fil_hipoproteico'] = null;
					}
					if(in_array('Com Fibras', $array_carac)){
						$dados['calculo_fil_comfibras'] = true;
					}else{
						$dados['calculo_fil_comfibras'] = null;
					}
					if(in_array('Hipercalórico', $array_carac)){
						$dados['calculo_fil_hipercalorico'] = true;
					}else{
						$dados['calculo_fil_hipercalorico'] = null;
					}
					if(in_array('Normoproteico', $array_carac)){
						$dados['calculo_fil_normoproteico'] = true;
					}else{
						$dados['calculo_fil_normoproteico'] = null;
					}
					if(in_array('Sem Fibras', $array_carac)){
						$dados['calculo_fil_semfibras'] = true;
					}else{
						$dados['calculo_fil_semfibras'] = null;
					}
					if(in_array('100% Proteína Vegetal', $array_carac)){
						$dados['calculo_fil_100proteina'] = true;
					}else{
						$dados['calculo_fil_100proteina'] = null;
					}
					if(in_array('Hiperproteico', $array_carac)){
						$dados['calculo_fil_hiperproteico'] = true;
					}else{
						$dados['calculo_fil_hiperproteico'] = null;
					}
					if(in_array('Cicatrização', $array_carac)){
						$dados['calculo_fil_cicatrizacao'] = true;
					}else{
						$dados['calculo_fil_cicatrizacao'] = null;
					}
					if(in_array('Com Ômega 3', $array_carac)){
						$dados['calculo_fil_omega3'] = true;
					}else{
						$dados['calculo_fil_omega3'] = null;
					}
					if(in_array('Imunonutrição cirúrgica', $array_carac)){
						$dados['calculo_fil_imunonutricao'] = true;
					}else{
						$dados['calculo_fil_imunonutricao'] = null;
					}
					if (!isset($dados['calculo_fil_todos1'])) $dados['calculo_fil_todos1'] = null; else $dados['calculo_fil_todos1'] = true;
		            if (!isset($dados['calculo_fil_todos2'])) $dados['calculo_fil_todos2'] = null; else $dados['calculo_fil_todos2'] = true;
		            if (!isset($dados['calculo_fil_todos3'])) $dados['calculo_fil_todos3'] = null; else $dados['calculo_fil_todos3'] = true;
				}else{
					$dados['calculo_fil_semsacarose'] = null;
					$dados['calculo_fil_semlactose'] = null;
					$dados['calculo_fil_hipocalorico'] = null;
					$dados['calculo_fil_hipoproteico'] = null;
					$dados['calculo_fil_comfibras'] = null;
					$dados['calculo_fil_hipercalorico'] = null;
					$dados['calculo_fil_normoproteico'] = null;
					$dados['calculo_fil_semfibras'] = null;
					$dados['calculo_fil_100proteina'] = null;
					$dados['calculo_fil_hiperproteico'] = null;
					$dados['calculo_fil_cicatrizacao'] = null;
					$dados['calculo_fil_omega3'] = null;
					$dados['calculo_fil_imunonutricao'] = null;
					$dados['calculo_fil_todos1'] = null;
					$dados['calculo_fil_todos2'] = null;
					$dados['calculo_fil_todos3'] = null;
				}
		        if (!isset($dados['dieta_formula'])) $dados['dieta_formula'] = null;
		        if (!isset($dados['dieta_volume'])) $dados['dieta_volume'] = null;
		        if (!isset($dados['dieta_infusao'])) $dados['dieta_infusao'] = null;
		        if (!isset($dados['dieta_fracionamento_dia'])) $dados['dieta_fracionamento_dia'] = null;
		        if (!isset($dados['dieta_horario_administracao'])) $dados['dieta_horario_administracao'] = null;
		        if (!isset($dados['dieta_vazao_h'])) $dados['dieta_vazao_h'] = null;
		        if (!isset($dados['dieta_horario_inicio'])) $dados['dieta_horario_inicio'] = null;
		        if (!isset($dados['modulo_produto'])) $dados['modulo_produto'] = null;
		        if (!isset($dados['modulo_quantidade'])) $dados['modulo_quantidade'] = null;
		        if (!isset($dados['modulo_volume'])) $dados['modulo_volume'] = null;
		        if (!isset($dados['modulo_horario'])) $dados['modulo_horario'] = null;
		        if (!isset($dados['modulo_volume_total'])) $dados['modulo_volume_total'] = null;
		        if (!isset($dados['suplemento_produto'])) $dados['suplemento_produto'] = null;
		        if (!isset($dados['suplemento_quantidade'])) $dados['suplemento_quantidade'] = null;
		        if (!isset($dados['suplemento_horario'])) $dados['suplemento_horario'] = null;
		        if (!isset($dados['suplemento_volume_total'])) $dados['suplemento_volume_total'] = null;
		        if (!isset($dados['hidratacao_agua_livre'])) $dados['hidratacao_agua_livre'] = null;

		        $bind = array( 
								$campo_prescritor => $id_prescritor,
								':categoria' => $dados['categoria'],
		                        ':tipo_produto' => $dados["tipo_produto"],
		                        ':tipo_prescricao' => $dados["tipo_prescricao"],
		                        ':dispositivo' => $dados["dispositivo"],
		                        ':calculo_apres_fechado' => $dados["calculo_apres_fechado"],
		                        ':calculo_apres_aberto_liquido' => $dados["calculo_apres_aberto_liquido"],
		                        ':calculo_apres_aberto_po' => $dados["calculo_apres_aberto_po"],
		                        ':calculo_apres_liquidocreme' => $dados["calculo_apres_liquidocreme"],
		                        ':calculo_apres_po' => $dados["calculo_apres_po"],
		                        ':calculo_fil_semsacarose' => $dados["calculo_fil_semsacarose"],
		                        ':calculo_fil_semlactose' => $dados["calculo_fil_semlactose"],
		                        ':calculo_fil_hipocalorico' => $dados["calculo_fil_hipocalorico"],
		                        ':calculo_fil_hipoproteico' => $dados["calculo_fil_hipoproteico"],
		                        ':calculo_fil_comfibras' => $dados["calculo_fil_comfibras"],
		                        ':calculo_fil_hipercalorico' => $dados["calculo_fil_hipercalorico"],
		                        ':calculo_fil_normoproteico' => $dados["calculo_fil_normoproteico"],
		                        ':calculo_fil_semfibras' => $dados["calculo_fil_semfibras"],
		                        ':calculo_fil_100proteina' => $dados["calculo_fil_100proteina"],
		                        ':calculo_fil_hiperproteico' => $dados["calculo_fil_hiperproteico"],
		                        ':calculo_fil_cicatrizacao' => $dados["calculo_fil_cicatrizacao"],
		                        ':calculo_fil_omega3' => $dados["calculo_fil_omega3"],
		                        ':calculo_fil_imunonutricao' => $dados["calculo_fil_imunonutricao"],
		                        ':calculo_fil_todos1' => $dados["calculo_fil_todos1"],
		                        ':calculo_fil_todos2' => $dados["calculo_fil_todos2"],
		                        ':calculo_fil_todos3' => $dados["calculo_fil_todos3"],
		                        ':dieta_formula' => array_json($dados["dieta_formula"], false),
		                        ':dieta_volume' => array_json($dados["dieta_volume"], false),
		                        ':dieta_infusao' => array_json($dados["dieta_infusao"], false),
		                        ':dieta_fracionamento_dia' => array_json($dados["dieta_fracionamento_dia"], false),
		                        ':dieta_horario_administracao' => array_json($dados["dieta_horario_administracao"], false),
		                        ':dieta_vazao_h' => array_json($dados["dieta_vazao_h"], false),
		                        ':dieta_horario_inicio' => array_json($dados["dieta_horario_inicio"], false),
		                        ':modulo_produto' => array_json($dados["modulo_produto"], false),
		                        ':modulo_quantidade' => array_json($dados["modulo_quantidade"], false),
		                        ':modulo_volume' => array_json($dados["modulo_volume"], false),
		                        ':modulo_horario' => array_json($dados["modulo_horario"], false),
		                        ':modulo_volume_total' => array_json($dados["modulo_volume_total"], false) ,
		                        ':suplemento_produto' => array_json($dados["suplemento_produto"], false) ,
		                        ':suplemento_quantidade' => array_json($dados["suplemento_quantidade"], false) ,
		                        ':suplemento_horario' => array_json($dados["suplemento_horario"], false) ,
		                        ':suplemento_volume_total' => array_json($dados["suplemento_volume_total"], false) ,
		                        ':hidratacao_agua_livre' => array_json($dados["hidratacao_agua_livre"], false) );

		        if ($dados['id_relatorio'] == ""){
					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_suplemento", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $retorno = $db->update("relatorios_suplemento", "WHERE id=".$dados['id_relatorio'], $bind);  
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stFracionamento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");


		        if (!isset($dados['h_i_dieta'])) $dados['h_i_dieta'] = null;
		        if (!isset($dados['h_inf_dieta'])) $dados['h_inf_dieta'] = null;
		        if (!isset($dados['fracionamento_dia'])) $dados['fracionamento_dia'] = null;
		        if (!isset($dados['qtas_horas'])) $dados['qtas_horas'] = null;
		        if (!isset($dados['dieta_horario'])) $dados['dieta_horario'] = null;
		        if (!isset($dados['hidratacao_dia'])) $dados['hidratacao_dia'] = null;
		        if (!isset($dados['volume_horario'])) $dados['volume_horario'] = null;
		        if (!isset($dados['hidrahorario'])) $dados['hidrahorario'] = null;
		        if (!isset($dados['info_complementares'])) $dados['info_complementares'] = null;
		        if (!isset($dados['in_volume_ml'])) $dados['in_volume_ml'] = null;

		        $bind = array(  ':fra_h_i_dieta' => $dados["h_i_dieta"],
		                        ':fra_h_inf_dieta' => $dados["h_inf_dieta"],
		                        ':fra_fracionamento_dia' => $dados["fracionamento_dia"],
		                        ':fra_qtas_horas' => $dados["qtas_horas"],
		                        ':fra_dieta_horario' => array_json($dados["dieta_horario"]),
		                        ':fra_hidratacao_dia' => $dados["hidratacao_dia"],
		                        ':fra_volume_horario' => $dados["volume_horario"],
		                        ':fra_hidrahorario' => array_json($dados["hidrahorario"]),
		                        ':fra_info_complementares' => $dados["info_complementares"],
		                        ':fra_volume_ml' => $dados["in_volume_ml"]);

		        if ($dados['id_relatorio'] == ""){
		            $retorno = $db->insert("relatorios", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stFracionamentoSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");


		        if (!isset($dados['h_i_dieta'])) $dados['h_i_dieta'] = null;
		        if (!isset($dados['h_inf_dieta'])) $dados['h_inf_dieta'] = null;
		        if (!isset($dados['fracionamento_dia'])) $dados['fracionamento_dia'] = null;
		        if (!isset($dados['qtas_horas'])) $dados['qtas_horas'] = null;
		        if (!isset($dados['dieta_horario'])) $dados['dieta_horario'] = null;
		        if (!isset($dados['hidratacao_dia'])) $dados['hidratacao_dia'] = null;
		        if (!isset($dados['volume_horario'])) $dados['volume_horario'] = null;
		        if (!isset($dados['hidrahorario'])) $dados['hidrahorario'] = null;
		        if (!isset($dados['info_complementares'])) $dados['info_complementares'] = null;
		        if (!isset($dados['in_volume_ml'])) $dados['in_volume_ml'] = null;

		        $bind = array(  ':fra_h_i_dieta' => $dados["h_i_dieta"],
		                        ':fra_h_inf_dieta' => $dados["h_inf_dieta"],
		                        ':fra_fracionamento_dia' => $dados["fracionamento_dia"],
		                        ':fra_qtas_horas' => $dados["qtas_horas"],
		                        ':fra_dieta_horario' => array_json($dados["dieta_horario"]),
		                        ':fra_hidratacao_dia' => $dados["hidratacao_dia"],
		                        ':fra_volume_horario' => $dados["volume_horario"],
		                        ':fra_hidrahorario' => array_json($dados["hidrahorario"]),
		                        ':fra_info_complementares' => $dados["info_complementares"],
		                        ':fra_volume_ml' => $dados["in_volume_ml"]);

		        if ($dados['id_relatorio'] == ""){
					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_simplificada", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $retorno = $db->update("relatorios_simplificada", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stFracionamentoSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");


		        if (!isset($dados['h_i_dieta'])) $dados['h_i_dieta'] = null;
		        if (!isset($dados['h_inf_dieta'])) $dados['h_inf_dieta'] = null;
		        if (!isset($dados['fracionamento_dia'])) $dados['fracionamento_dia'] = null;
		        if (!isset($dados['qto_tempo'])) $dados['qto_tempo'] = null;
		        if (!isset($dados['qtas_horas'])) $dados['qtas_horas'] = null;
		        if (!isset($dados['dieta_horario'])) $dados['dieta_horario'] = null;
		        if (!isset($dados['hidratacao_dia'])) $dados['hidratacao_dia'] = null;
		        if (!isset($dados['volume_horario'])) $dados['volume_horario'] = null;
		        if (!isset($dados['hidrahorario'])) $dados['hidrahorario'] = null;
		        if (!isset($dados['info_complementares'])) $dados['info_complementares'] = null;
		        if (!isset($dados['in_volume_ml'])) $dados['in_volume_ml'] = null;

		        $bind = array(  ':fra_h_i_dieta' => $dados["h_i_dieta"],
		                        ':fra_h_inf_dieta' => $dados["h_inf_dieta"],
		                        ':fra_fracionamento_dia' => $dados["fracionamento_dia"],
		                        ':fra_qto_tempo' => $dados["qto_tempo"],
		                        ':fra_qtas_horas' => $dados["qtas_horas"],
		                        ':fra_dieta_horario' => array_json($dados["dieta_horario"]),
		                        ':fra_hidratacao_dia' => $dados["hidratacao_dia"],
		                        ':fra_volume_horario' => $dados["volume_horario"],
		                        ':fra_hidrahorario' => array_json($dados["hidrahorario"]),
		                        ':fra_info_complementares' => $dados["info_complementares"],
		                        ':fra_volume_ml' => $dados["in_volume_ml"]);

		        if ($dados['id_relatorio'] == ""){
					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_suplemento", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $retorno = $db->update("relatorios_suplemento", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stSelecao", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");


		        if (!isset($dados['produto_dc'])) $dados['produto_dc'] = null;
		        if (!isset($dados['margem_calorica'])) $dados['margem_calorica'] = null;
		        if (!isset($dados['margem_proteica'])) $dados['margem_proteica'] = null;

		        $bind = array(  ':dieta_produto_dc' => array_json($dados["produto_dc"]),
		                        ':margem_calorica' => $dados["margem_calorica"],
		                        ':margem_proteica' => $dados["margem_proteica"]);

		        if ($dados['id_relatorio'] == ""){
		            $retorno = $db->insert("relatorios", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stSelecaoSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");


		        if (!isset($dados['produto_dc'])) $dados['produto_dc'] = null;
		        if (!isset($dados['margem_calorica'])) $dados['margem_calorica'] = null;
		        if (!isset($dados['margem_proteica'])) $dados['margem_proteica'] = null;

		        $bind = array(  ':dieta_produto_dc' => array_json($dados["produto_dc"]),
		                        ':margem_calorica' => $dados["margem_calorica"],
		                        ':margem_proteica' => $dados["margem_proteica"]);

		        if ($dados['id_relatorio'] == ""){
					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_simplificada", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $retorno = $db->update("relatorios_simplificada", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stSelecaoSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");


		        if (!isset($dados['produto_dc'])) $dados['produto_dc'] = null;

		        $bind = array(  ':dieta_produto_dc' => array_json($dados["produto_dc"]));

		        if ($dados['id_relatorio'] == ""){
					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_suplemento", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $retorno = $db->update("relatorios_suplemento", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stObservacoes", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':observacoes' => $dados['observacoes']);
		            $retorno = $db->insert("relatorios", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $bind = array(  ':observacoes' => $dados['observacoes']);
		            $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stDistribuidores", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':distribuidores' => $dados['cad_distribuidores']);
		            $retorno = $db->insert("relatorios", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $bind = array(  ':distribuidores' => $dados['cad_distribuidores']);
		            $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stDistribuidoresSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':distribuidores' => $dados['cad_distribuidores']);
					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_simplificada", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $bind = array(  ':distribuidores' => $dados['cad_distribuidores']);
		            $retorno = $db->update("relatorios_simplificada", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stDistribuidoresSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");

		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':distribuidores' => $dados['cad_distribuidores']);
					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_suplemento", $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{
		            $bind = array(  ':distribuidores' => $dados['cad_distribuidores']);
		            $retorno = $db->update("relatorios_suplemento", "WHERE id=".$dados['id_relatorio'], $bind);
		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stRelatorio", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$set_codigo = $request->getParam("set_codigo");


		        if ($set_codigo){
		            $codigo = strtolower( randomCode(6) );
		        }else{
		            $codigo = null;
		        }
		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':codigo' => $codigo,
		                            ':rel_logo' => (isset($dados['rel_logo'])?true:null),
		                            ':rel_identificacao' => (isset($dados['rel_identificacao'])?true:null),
		                            ':rel_historia' => (isset($dados['rel_historia'])?true:null),
		                            ':rel_avaliacao' => (isset($dados['rel_avaliacao'])?true:null),
		                            ':rel_necessidades' => (isset($dados['rel_necessidades'])?true:null),
		                            ':rel_prescricao' => (isset($dados['rel_prescricao'])?true:null),
		                            ':rel_calculo' => (isset($dados['rel_calculo'])?true:null),
		                            ':rel_observacoes' => (isset($dados['rel_observacoes'])?true:null),
		                            ':rel_distribuidores' => (isset($dados['rel_distribuidores'])?true:null) );
		            $retorno = $db->insert("relatorios", $bind);
		            
		            if ($set_codigo){
		                $paciente = $db->select_single_to_array("pacientes", "*", "WHERE id=".$dados['id_paciente'], null);
		                $bind = array( ':codigo' => $codigo);
		                $pacientes = $db->update("pacientes", "WHERE id=".$dados['id_paciente'], $bind);
		                $bind = array( ':codigo' => $codigo, ':status' => 2);
		                $usuarios = $db->update("usuarios", "WHERE id=".$paciente['id_usuario'], $bind);
		            }

		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{

		            if (!$set_codigo){
		                $bind = array(  ':rel_logo' => (isset($dados['rel_logo'])?true:null),
		                                ':rel_identificacao' => (isset($dados['rel_identificacao'])?true:null),
		                                ':rel_historia' => (isset($dados['rel_historia'])?true:null),
		                                ':rel_avaliacao' => (isset($dados['rel_avaliacao'])?true:null),
		                                ':rel_necessidades' => (isset($dados['rel_necessidades'])?true:null),
										':rel_prescricao' => (isset($dados['rel_prescricao'])?true:null),
		                                ':rel_calculo' => (isset($dados['rel_calculo'])?true:null),
		                                ':rel_observacoes' => (isset($dados['rel_observacoes'])?true:null),
		                                ':rel_distribuidores' => (isset($dados['rel_distribuidores'])?true:null) );
		                $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio'], $bind);
		                $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		            }
		            else{
		                $relatorio = $db->select_single_to_array("relatorios", "*", "WHERE id=".$dados['id_relatorio']." AND codigo IS NULL", null);
		                if ($relatorio){
		                    if ($set_codigo){
		                        $paciente = $db->select_single_to_array("pacientes", "*", "WHERE id=".$dados['id_paciente'], null);
		                        $bind = array( ':codigo' => $codigo);
		                        $pacientes = $db->update("pacientes", "WHERE id=".$dados['id_paciente'], $bind);
		                        $bind = array( ':codigo' => $codigo, ':status' => 2);
		                        $usuarios = $db->update("usuarios", "WHERE id=".$paciente['id_usuario'], $bind);
		                    }
		                    $bind = array(  ':codigo' => $codigo,
		                                    ':rel_logo' => (isset($dados['rel_logo'])?true:null),
		                                    ':rel_identificacao' => (isset($dados['rel_identificacao'])?true:null),
		                                    ':rel_historia' => (isset($dados['rel_historia'])?true:null),
		                                    ':rel_avaliacao' => (isset($dados['rel_avaliacao'])?true:null),
		                                    ':rel_necessidades' => (isset($dados['rel_necessidades'])?true:null),
											':rel_prescricao' => (isset($dados['rel_prescricao'])?true:null),
		                                    ':rel_calculo' => (isset($dados['rel_calculo'])?true:null),
		                                    ':rel_observacoes' => (isset($dados['rel_observacoes'])?true:null),
		                                    ':rel_distribuidores' => (isset($dados['rel_distribuidores'])?true:null) );
		                    $retorno = $db->update("relatorios", "WHERE id=".$dados['id_relatorio']." AND codigo IS NULL", $bind);

		                    /*
		                    $paciente = $this->select_single_to_array("pacientes", "*", "WHERE id=".$relatorio['id_paciente'], null);
		                    $bind = array(  ':tipo'=> 'email',
		                                    ':email'=> $paciente['email'],
		                                    ':assunto'=> 'Relatório de alta disponível',
		                                    ':template'=> 'email_relatorio_paciente',                                    
		                                    ':conteudo' => json_encode(array('||NOME||' => strtok($paciente['nome'], " "), '||CODIGO||' => $codigo, 'email' => $paciente['email'])),
		                                    ':status'=> 0,
		                                    ':extra'=> $relatorio['id_paciente'],
		                                    ':data_criacao'=> date("Y-m-d H:i:s"));
		                    $interacoes = $this->insert('interacoes', $bind);
		                    */

		                    $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		                }
		                else{
		                    $retorno = array("error" => array("message" => "Relátorio já foi gerado."));
		                }  
		            }           
		       
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stRelatorioSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$set_codigo = $request->getParam("set_codigo");


		        if ($set_codigo){
		            $codigo = strtolower( randomCode(6) );
		        }else{
		            $codigo = null;
		        }
		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':codigo' => $codigo,
		                            ':rel_logo' => (isset($dados['rel_logo'])?true:null),
		                            ':rel_identificacao' => (isset($dados['rel_identificacao'])?true:null),
		                            ':rel_historia' => (isset($dados['rel_historia'])?true:null),
		                            ':rel_avaliacao' => (isset($dados['rel_avaliacao'])?true:null),
		                            ':rel_necessidades' => (isset($dados['rel_necessidades'])?true:null),
		                            ':rel_calculo' => (isset($dados['rel_calculo'])?true:null),
		                            ':rel_observacoes' => (isset($dados['rel_observacoes'])?true:null),
		                            ':rel_distribuidores' => (isset($dados['rel_distribuidores'])?true:null) );

					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_simplificada", $bind);
		            
		            // if ($set_codigo){
		            //     $paciente = $db->select_single_to_array("pacientes_simplificada", "*", "WHERE id=".$dados['id_paciente'], null);
		            //     $bind = array( ':codigo' => $codigo);
		            //     $pacientes = $db->update("pacientes_simplificada", "WHERE id=".$dados['id_paciente'], $bind);
		            //     $bind = array( ':codigo' => $codigo, ':status' => 2);
		            //     $usuarios = $db->update("usuarios", "WHERE id=".$paciente['id_usuario'], $bind);
		            // }

		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{

		            if (!$set_codigo){
		                $bind = array(  ':rel_logo' => (isset($dados['rel_logo'])?true:null),
		                                ':rel_identificacao' => (isset($dados['rel_identificacao'])?true:null),
		                                ':rel_historia' => (isset($dados['rel_historia'])?true:null),
		                                ':rel_avaliacao' => (isset($dados['rel_avaliacao'])?true:null),
		                                ':rel_necessidades' => (isset($dados['rel_necessidades'])?true:null),
		                                ':rel_calculo' => (isset($dados['rel_calculo'])?true:null),
		                                ':rel_observacoes' => (isset($dados['rel_observacoes'])?true:null),
		                                ':rel_distribuidores' => (isset($dados['rel_distribuidores'])?true:null) );
		                $retorno = $db->update("relatorios_simplificada", "WHERE id=".$dados['id_relatorio'], $bind);
		                $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		            }
		            else{
		                $relatorio = $db->select_single_to_array("relatorios_simplificada", "*", "WHERE id=".$dados['id_relatorio']." AND codigo IS NULL", null);
		                if ($relatorio){
		                    // if ($set_codigo){
		                    //     $paciente = $db->select_single_to_array("pacientes", "*", "WHERE id=".$dados['id_paciente'], null);
		                    //     $bind = array( ':codigo' => $codigo);
		                    //     $pacientes = $db->update("pacientes", "WHERE id=".$dados['id_paciente'], $bind);
		                    //     $bind = array( ':codigo' => $codigo, ':status' => 2);
		                    //     $usuarios = $db->update("usuarios", "WHERE id=".$paciente['id_usuario'], $bind);
		                    // }
		                    $bind = array(  ':codigo' => $codigo,
		                                    ':rel_logo' => (isset($dados['rel_logo'])?true:null),
		                                    ':rel_identificacao' => (isset($dados['rel_identificacao'])?true:null),
		                                    ':rel_historia' => (isset($dados['rel_historia'])?true:null),
		                                    ':rel_avaliacao' => (isset($dados['rel_avaliacao'])?true:null),
		                                    ':rel_necessidades' => (isset($dados['rel_necessidades'])?true:null),
		                                    ':rel_calculo' => (isset($dados['rel_calculo'])?true:null),
		                                    ':rel_observacoes' => (isset($dados['rel_observacoes'])?true:null),
		                                    ':rel_distribuidores' => (isset($dados['rel_distribuidores'])?true:null) );
		                    $retorno = $db->update("relatorios_simplificada", "WHERE id=".$dados['id_relatorio']." AND codigo IS NULL", $bind);

		                    /*
		                    $paciente = $this->select_single_to_array("pacientes", "*", "WHERE id=".$relatorio['id_paciente'], null);
		                    $bind = array(  ':tipo'=> 'email',
		                                    ':email'=> $paciente['email'],
		                                    ':assunto'=> 'Relatório de alta disponível',
		                                    ':template'=> 'email_relatorio_paciente',                                    
		                                    ':conteudo' => json_encode(array('||NOME||' => strtok($paciente['nome'], " "), '||CODIGO||' => $codigo, 'email' => $paciente['email'])),
		                                    ':status'=> 0,
		                                    ':extra'=> $relatorio['id_paciente'],
		                                    ':data_criacao'=> date("Y-m-d H:i:s"));
		                    $interacoes = $this->insert('interacoes', $bind);
		                    */
							//salvar orientado EN
							$dados_paciente = $db->select_single_to_array("pacientes_simplificada", "*", "WHERE id=:id", [':id' => $dados['id_paciente']]);
							if($dados_paciente['sistema'] == 'EN'){
								if($dados_paciente['id_paciente'] != ''){
									$bind = array(':st_orientado' => '1');
									$paciente = $db_ibranutro->update("tb_paciente_estado_nutricional", "WHERE id_paciente=".$dados_paciente['id_paciente'], $bind);
								}
							}
							if($dados_paciente['sistema'] == 'ibranutro'){
								if($dados_paciente['id_admissao'] != ''){
									$bind = array(':st_orientado' => 'S');
									$paciente = $db_ibranutro->update("tb_admissao", "WHERE id_admissao=".$dados_paciente['id_admissao'], $bind);
								}
							}
		                    $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		                }
		                else{
		                    $retorno = array("error" => array("message" => "Relatório já foi gerado."));
		                }  
		            }
					
					
		       
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stRelatorioSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$set_codigo = $request->getParam("set_codigo");


		        if ($set_codigo){
		            $codigo = strtolower( randomCode(6) );
		        }else{
		            $codigo = null;
		        }
		        if ($dados['id_relatorio'] == ""){
		            $bind = array(  ':codigo' => $codigo,
		                            ':rel_logo' => (isset($dados['rel_logo'])?true:null),
		                            ':rel_identificacao' => (isset($dados['rel_identificacao'])?true:null),
		                            ':rel_historia' => (isset($dados['rel_historia'])?true:null),
		                            ':rel_avaliacao' => (isset($dados['rel_avaliacao'])?true:null),
		                            ':rel_necessidades' => (isset($dados['rel_necessidades'])?true:null),
		                            ':rel_calculo' => (isset($dados['rel_calculo'])?true:null),
		                            ':rel_observacoes' => (isset($dados['rel_observacoes'])?true:null),
		                            ':rel_distribuidores' => (isset($dados['rel_distribuidores'])?true:null) );

					$bind[':id_paciente'] = $dados['id_paciente'];
					$bind[':data_criacao'] = date("Y-m-d H:i:s");
		            $retorno = $db->insert("relatorios_suplemento", $bind);
		            
		            // if ($set_codigo){
		            //     $paciente = $db->select_single_to_array("pacientes_simplificada", "*", "WHERE id=".$dados['id_paciente'], null);
		            //     $bind = array( ':codigo' => $codigo);
		            //     $pacientes = $db->update("pacientes_simplificada", "WHERE id=".$dados['id_paciente'], $bind);
		            //     $bind = array( ':codigo' => $codigo, ':status' => 2);
		            //     $usuarios = $db->update("usuarios", "WHERE id=".$paciente['id_usuario'], $bind);
		            // }

		            $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $retorno, "relatorio_code" => endecrypt("encrypt", $retorno));
		        }
		        else{

		            if (!$set_codigo){
		                $bind = array(  ':rel_logo' => (isset($dados['rel_logo'])?true:null),
		                                ':rel_identificacao' => (isset($dados['rel_identificacao'])?true:null),
		                                ':rel_historia' => (isset($dados['rel_historia'])?true:null),
		                                ':rel_avaliacao' => (isset($dados['rel_avaliacao'])?true:null),
		                                ':rel_necessidades' => (isset($dados['rel_necessidades'])?true:null),
		                                ':rel_calculo' => (isset($dados['rel_calculo'])?true:null),
		                                ':rel_observacoes' => (isset($dados['rel_observacoes'])?true:null),
		                                ':rel_distribuidores' => (isset($dados['rel_distribuidores'])?true:null) );
		                $retorno = $db->update("relatorios_suplemento", "WHERE id=".$dados['id_relatorio'], $bind);
		                $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		            }
		            else{
		                $relatorio = $db->select_single_to_array("relatorios_suplemento", "*", "WHERE id=".$dados['id_relatorio']." AND codigo IS NULL", null);
		                if ($relatorio){
		                    // if ($set_codigo){
		                    //     $paciente = $db->select_single_to_array("pacientes", "*", "WHERE id=".$dados['id_paciente'], null);
		                    //     $bind = array( ':codigo' => $codigo);
		                    //     $pacientes = $db->update("pacientes", "WHERE id=".$dados['id_paciente'], $bind);
		                    //     $bind = array( ':codigo' => $codigo, ':status' => 2);
		                    //     $usuarios = $db->update("usuarios", "WHERE id=".$paciente['id_usuario'], $bind);
		                    // }
		                    $bind = array(  ':codigo' => $codigo,
		                                    ':rel_logo' => (isset($dados['rel_logo'])?true:null),
		                                    ':rel_identificacao' => (isset($dados['rel_identificacao'])?true:null),
		                                    ':rel_historia' => (isset($dados['rel_historia'])?true:null),
		                                    ':rel_avaliacao' => (isset($dados['rel_avaliacao'])?true:null),
		                                    ':rel_necessidades' => (isset($dados['rel_necessidades'])?true:null),
		                                    ':rel_calculo' => (isset($dados['rel_calculo'])?true:null),
		                                    ':rel_observacoes' => (isset($dados['rel_observacoes'])?true:null),
		                                    ':rel_distribuidores' => (isset($dados['rel_distribuidores'])?true:null) );
		                    $retorno = $db->update("relatorios_suplemento", "WHERE id=".$dados['id_relatorio']." AND codigo IS NULL", $bind);

		                    /*
		                    $paciente = $this->select_single_to_array("pacientes", "*", "WHERE id=".$relatorio['id_paciente'], null);
		                    $bind = array(  ':tipo'=> 'email',
		                                    ':email'=> $paciente['email'],
		                                    ':assunto'=> 'Relatório de alta disponível',
		                                    ':template'=> 'email_relatorio_paciente',                                    
		                                    ':conteudo' => json_encode(array('||NOME||' => strtok($paciente['nome'], " "), '||CODIGO||' => $codigo, 'email' => $paciente['email'])),
		                                    ':status'=> 0,
		                                    ':extra'=> $relatorio['id_paciente'],
		                                    ':data_criacao'=> date("Y-m-d H:i:s"));
		                    $interacoes = $this->insert('interacoes', $bind);
		                    */
							//salvar orientado EN
							$dados_paciente = $db->select_single_to_array("pacientes_suplemento", "*", "WHERE id=:id", [':id' => $dados['id_paciente']]);
							if($dados_paciente['sistema'] == 'EN'){
								if($dados_paciente['id_paciente'] != ''){
									$bind = array(':st_orientado' => '1');
									$paciente = $db_ibranutro->update("tb_paciente_estado_nutricional", "WHERE id_paciente=".$dados_paciente['id_paciente'], $bind);
								}
							}
							if($dados_paciente['sistema'] == 'ibranutro'){
								if($dados_paciente['id_admissao'] != ''){
									$bind = array(':st_orientado' => 'S');
									$paciente = $db_ibranutro->update("tb_admissao", "WHERE id_admissao=".$dados_paciente['id_admissao'], $bind);
								}
							}

		                    $retorno = array("success" => "Dados salvos com sucesso.", "relatorio" => $dados['id_relatorio'], "relatorio_code" => endecrypt("encrypt", $dados['id_relatorio']));
		                }
		                else{
		                    $retorno = array("error" => array("message" => "Relatório já foi gerado."));
		                }  
		            }           
		       
		        }


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_gtRelatorio", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$id = $request->getParam("id");
				$id_prescritor = $request->getParam("id_prescritor");


		        $relatorio = $db->select_single_to_array("relatorios", "*", "WHERE id=".$id." AND codigo IS NULL", null);
		        if ($relatorio){
		            $relatorio["relatorio_code"] = endecrypt("encrypt", $relatorio['id']);
		            $relatorio["data"] = sql2date($relatorio["data"]);
		            $retorno = array("relatorio" => $relatorio);
		        }
		        else{
		            $retorno = array("error" => array("message" => "Relátorio não encontrado."));
		        }


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_gtRelatorioSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$id = $request->getParam("id");


		        $relatorio = $db->select_single_to_array("relatorios_simplificada", "*", "WHERE id=".$id." AND codigo IS NULL", null);
		        if ($relatorio){
		            $relatorio["relatorio_code"] = endecrypt("encrypt", $relatorio['id']);
		            $relatorio["data"] = date('d/m/Y', strtotime($relatorio["data"]));
		            $retorno = array("relatorio" => $relatorio);
		        }
		        else{
		            $retorno = array("error" => array("message" => "Relátorio não encontrado."));
		        }


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_gtRelatorioSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$id = $request->getParam("id");

		        $relatorio = $db->select_single_to_array("relatorios_suplemento", "*", "WHERE id=".$id." AND codigo IS NULL", null);

		        if ($relatorio){
		            $relatorio["relatorio_code"] = endecrypt("encrypt", $relatorio['id']);
		            $relatorio["data"] = date('d/m/Y', strtotime($relatorio["data"]));
		            $retorno = array("relatorio" => $relatorio);
		        }
		        else{
		            $retorno = array("error" => array("message" => "Relátorio não encontrado."));
		        }


		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_EnviarEmailPaciente", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$retorno = null;

				$paciente = $db->select_single_to_array(   "pacientes",
		                                                    "*",
		                                                    "WHERE id=".$dados['id_paciente'],
		                                                    null);
		        if ($paciente){
		            $codigo = strtolower( randomCode(6) );
		            $bind = array( ':codigo' => $codigo, ':status' => 2);
		            $usuarios = $db->update("usuarios", "WHERE id=".$paciente['id_usuario'], $bind);

		            $bind = array( ':codigo' => $codigo);
		            $pacientes = $db->update("pacientes", "WHERE id_usuario=".$paciente['id_usuario']." AND id=".$paciente['id'], $bind);

		            // indisponibiliza todos os relatorios paciente/prescritor e disponibiliza somente o atual
		            $chk_relatorio = $db->select_single_to_array(  "relatorios","*","WHERE id=".$dados['id_relatorio'],null);
		            $bind = array(  ':id_paciente' => $dados['id_paciente'],
		                            ':id_prescritor' => $chk_relatorio['id_prescritor'],
		                            ':status' => 0);
		            $relatorio = $db->update("relatorios", "WHERE id_paciente=:id_paciente AND id_prescritor=:id_prescritor", $bind);
		            $bind = array( ':id' => $dados['id_relatorio'], ':status' => 1);
		            $relatorio = $db->update("relatorios", "WHERE id=:id", $bind);
		            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		            $db->delete("interacoes", "WHERE tipo='email' AND email='".$paciente['email']."' AND template='email_relatorio_paciente'", null); 

		            $bind = array(  ':tipo'=> 'email',
		                            ':email'=> $paciente['email'],
		                            ':assunto'=> 'Relatório de alta disponível',
		                            ':template'=> 'email_relatorio_paciente',                                    
		                            ':conteudo' => json_encode(array('||NOME||' => strtok($paciente['nome'], " "), '||CODIGO||' => $codigo, 'email' => $paciente['email'])),
		                            ':status'=> 0,
		                            ':extra'=> $dados['id_paciente'],
		                            ':data_criacao'=> date("Y-m-d H:i:s"));
		            $retorno = $db->insert('interacoes', $bind);
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_getPacientes", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				$retorno = null;


				$bind_query = "";
		        if (isset($dados['nome']) and (trim($dados['nome']) <> "")){
		            $bind_query .= "nome LIKE '%".$dados['nome']."%'";
		        }
		        if (isset($dados['data_nascimento']) and (trim($dados['data_nascimento']) <> "")){
		            $bind_query .= " AND data_nascimento='".date2sql($dados['data_nascimento'])."'";
		        }
		        if (isset($dados['cpf']) and (trim($dados['cpf']) <> "")){
		            $bind_query .= " AND cpf='".$dados['cpf']."'";
		        }
		        if ($bind_query <> ""){
		            $bind_query = " ".$bind_query;
		            $pacientes = $db->select_to_array("pacientes",
		                                                "id, nome, cpf, mae, DATE_FORMAT(data_nascimento,'%d/%m/%Y') AS data_nascimento, celular, data_nascimento AS idade, sexo, email, pertence, parentesco, cpf_possui, mae_possui",
		                                                "WHERE ".$bind_query." GROUP BY nome ORDER BY nome ASC",
		                                                null);
		            if ($pacientes){
		                for($i = 0; $i < count($pacientes); $i++){
		                    $relatorios = $db->select_to_array("relatorios",
		                                                        "*, DATE_FORMAT(data_criacao,'%d/%m/%Y %H:%i:%s') AS data_criacao",
		                                                        "WHERE id_paciente='".$pacientes[$i]['id']."' ORDER BY id ASC",
		                                                        null);
		                    if ($relatorios){
		                        $pacientes[$i]['relatorios'] = $relatorios;
		                        rsort($pacientes[$i]['relatorios']);
		                    }else{
		                        $pacientes[$i]['relatorios'] = null;
		                    }

		                    $date = new DateTime($pacientes[$i]['idade']);
		                    $now = new DateTime();
		                    $interval = $now->diff($date);
		                    $pacientes[$i]['idade'] = $interval->y;
		                }
		            }

		            $retorno = $pacientes;

		        }else{
		            $retorno = array();
		        }



		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_getPacientesSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				$retorno = null;


				$bind_query = "";
		        if (isset($dados['nome']) and (trim($dados['nome']) <> "")){
		            $bind_query .= " nome LIKE '%".$dados['nome']."%'";
		        }
				if (isset($dados['data_nascimento']) and (trim($dados['data_nascimento']) <> "")){
		            $bind_query .= " AND data_nascimento='".date2sql($dados['data_nascimento'])."'";
		        }
		        if ($bind_query <> ""){
		            $bind_query = " ".$bind_query;
		            // $bind_query = " id_prescritor=".$id_prescritor." ".$bind_query;
		            $pacientes = $db->select_to_array("pacientes_simplificada",
		                                                "id, nome, DATE_FORMAT(data_nascimento,'%d/%m/%Y') AS data_nascimento, data_nascimento AS idade, peso",
		                                                "WHERE ".$bind_query." GROUP BY nome ORDER BY nome ASC",
		                                                null);
		            if ($pacientes){
		                for($i = 0; $i < count($pacientes); $i++){
		                    $relatorios = $db->select_to_array("relatorios_simplificada",
		                                                        "*, DATE_FORMAT(data_criacao,'%d/%m/%Y %H:%i:%s') AS data_criacao",
		                                                        "WHERE id_paciente='".$pacientes[$i]['id']."' ORDER BY id ASC",
		                                                        null);
		                    if ($relatorios){
								for ($j=0; $j < count($relatorios); $j++) { 
									$relatorios[$j]['relatorio_code'] = endecrypt("encrypt", $relatorios[$j]['id']);
								}
		                        $pacientes[$i]['relatorios'] = $relatorios;
		                        rsort($pacientes[$i]['relatorios']);
		                    }else{
		                        $pacientes[$i]['relatorios'] = null;
		                    }

		                    $date = new DateTime($pacientes[$i]['idade']);
		                    $now = new DateTime();
		                    $interval = $now->diff($date);
		                    $pacientes[$i]['idade'] = $interval->y;
		                }
		            }

		            $retorno = $pacientes;

		        }else{
		            $retorno = array();
		        }



		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_getPacientesSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				$retorno = null;


				$bind_query = "";
		        if (isset($dados['nome']) and (trim($dados['nome']) <> "")){
		            $bind_query .= " nome LIKE '%".$dados['nome']."%'";
		        }
				if (isset($dados['data_nascimento']) and (trim($dados['data_nascimento']) <> "")){
		            $bind_query .= " AND data_nascimento='".date2sql($dados['data_nascimento'])."'";
		        }
		        if ($bind_query <> ""){
		            // $bind_query = " id_prescritor=".$id_prescritor." ".$bind_query;
		            $bind_query = " ".$bind_query;
		            $pacientes = $db->select_to_array("pacientes_suplemento",
		                                                "id, nome, DATE_FORMAT(data_nascimento,'%d/%m/%Y') AS data_nascimento, data_nascimento AS idade, hospital, atendimento, telefone",
		                                                "WHERE ".$bind_query." GROUP BY nome ORDER BY nome ASC",
		                                                null);
		            if ($pacientes){
		                for($i = 0; $i < count($pacientes); $i++){
		                    $relatorios = $db->select_to_array("relatorios_suplemento",
		                                                        "*, DATE_FORMAT(data_criacao,'%d/%m/%Y %H:%i:%s') AS data_criacao",
		                                                        "WHERE id_paciente='".$pacientes[$i]['id']."' ORDER BY id ASC",
		                                                        null);
		                    if ($relatorios){
								for ($j=0; $j < count($relatorios); $j++) { 
									$relatorios[$j]['relatorio_code'] = endecrypt("encrypt", $relatorios[$j]['id']);
								}
		                        $pacientes[$i]['relatorios'] = $relatorios;
								// $pacientes[$i]['relatorios'][$i]['relatorio_code'] = endecrypt("encrypt", $relatorios[0]['id']);
		                        rsort($pacientes[$i]['relatorios']);
		                    }else{
		                        $pacientes[$i]['relatorios'] = null;
		                    }

		                    $date = new DateTime($pacientes[$i]['idade']);
		                    $now = new DateTime();
		                    $interval = $now->diff($date);
		                    $pacientes[$i]['idade'] = $interval->y;
		                }
		            }

		            $retorno = $pacientes;

		        }else{
		            $retorno = array();
		        }



		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_getDistribuidores", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$retorno = null;

		        $retorno = $db->select_to_array(  "distribuidores",
		                                            "*",
		                                            "WHERE uf='".strtoupper($dados['uf'])."' ORDER BY distribuidor ASC",
		                                            null);
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});
	
	$app->post("/ajax_stPaciente", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				$retorno = null;
				if($dados['login_tipo'] == 'ibranutro'){
					$campo_prescritor = 'id_prescritor_ibranutro';
				}elseif($dados['login_tipo'] == 'entric'){
					$campo_prescritor = 'id_prescritor';
				}

				// $campo_prescritor = 'id_prescritor';



				if (isset($dados['cpf']) and ($dados['cpf'] == "") and ($dados['cpf_possui'] == "0")){
		            $retorno = array("error" => "Preencha o formulário corretamente.");
		        }
		        if (!isset($dados['cpf']) or ($dados['cpf'] == "")){
		            $dados['cpf'] = "";
		            $verificar = $db->select_single_to_array("pacientes", "*", "WHERE ".$campo_prescritor."=".$id_prescritor." AND nome='".$dados['nome']."'",  null);
		            $mensagem_error = "Já possui cadastro com estes dados.";
		        }
		        else{
		            $verificar = $db->select_single_to_array("pacientes", "*", "WHERE ".$campo_prescritor."=".$id_prescritor." AND cpf='".$dados['cpf']."'",  null);
		            $mensagem_error = "Este CPF já possui cadastro.";
		        }

				if($dados['mae_possui']){
					$mae = null;
				}else{
					$mae = $dados['mae'];
				}

		        if (!$verificar){
		            $bind = array(  ':email' => $dados["email"],
		                            ':tipo' => 1,
		                            ':status' => 0,                     
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $usuario = $db->insert("usuarios", $bind);

		            $bind = array(  ':id_usuario' => $usuario,
									':'.$campo_prescritor => $id_prescritor,
		                            ':nome' => $dados["nome"],
		                            ':celular' => $dados["celular"],
		                            ':email' => $dados["email"],
		                            ':pertence' => $dados["pertence"],
		                            ':parentesco' => $dados["parentesco"],
		                            ':data_nascimento' => date2sql($dados["data_nascimento"]),
		                            ':sexo' => $dados["sexo"],
		                            ':cpf' => $dados["cpf"],
		                            ':cpf_possui' => $dados["cpf_possui"],
		                            ':mae' => $mae,
		                            ':mae_possui' => $dados["mae_possui"],                     
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->insert("pacientes", $bind);
		            $retorno = array("success" => "Cadastro efetuado com sucesso.", "paciente" => $retorno);

		        }
		        else{
		            $retorno = array("error" => $mensagem_error);
		        }

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_ptPaciente", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				$retorno = null;


				if ($dados['up_cpf_possui']== "1"){
		            $dados['up_cpf'] = "";
		            $dados["up_cpf_possui"] = 1;
		        }
		        if ((isset($dados['up_cpf'])) and ($dados['up_cpf'] == "") and ($dados['up_cpf_possui'] == "0")){
		            $retorno = array("error" => "Preencha o formulário corretamente.");
		        }
		        if ($dados['up_mae_possui'] == "1"){
		            $dados['up_mae'] = "";
		            $dados["up_mae_possui"] = 1;
		        }
		        if (!isset($dados['up_cpf']) or ($dados['up_cpf'] == "")){
		            $dados['up_cpf'] = "";
		            $verificar = $db->select_single_to_array("pacientes", "*", "WHERE id<>".$dados['up_id']." AND id_prescritor=".$id_prescritor." AND nome='".$dados['up_nome']."'",  null);
		            $mensagem_error = "Já possui cadastro com estes dados.";
		        }
		        else{
		            $verificar = $db->select_single_to_array("pacientes", "*", "WHERE id<>".$dados['up_id']." AND id_prescritor=".$id_prescritor." AND cpf='".$dados['up_cpf']."'",  null);
		            $mensagem_error = "Este CPF já possui cadastro.";
		        }

		        if (!$verificar){ 
		            $bind = array(  ':nome' => $dados["up_nome"],
		                            ':celular' => $dados["up_celular"],
		                            ':email' => $dados["up_email"],
		                            ':pertence' => $dados["up_pertence"],
		                            ':parentesco' => $dados["up_parentesco"],
		                            ':data_nascimento' => date2sql($dados["up_data_nascimento"]),
		                            ':sexo' => $dados["up_sexo"],
		                            ':cpf' => $dados["up_cpf"],
		                            ':cpf_possui' => $dados["up_cpf_possui"],
		                            ':mae' => $dados["up_mae"],
		                            ':mae_possui' => $dados["up_mae_possui"],                     
		                            ':data_criacao' => date("Y-m-d H:i:s") );
		            $retorno = $db->update("pacientes", "WHERE id=".$dados['up_id'], $bind);
		            $retorno = array("success" => "Cadastro atualizado com sucesso.");

		        }
		        else{
		            $retorno = array("error" => $mensagem_error);
		        }
				

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_ptPacienteSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				$retorno = null;

				$bind = array(  ':nome' => $dados["up_nome"],
				':peso' => $dados["up_peso"],
				':data_nascimento' => date2sql($dados["up_data_nascimento"]));
				$retorno = $db->update("pacientes_simplificada", "WHERE id=".$dados['up_id'], $bind);
				$retorno = array("success" => "Cadastro atualizado com sucesso.");
				

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_ptPacienteSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				$retorno = null;

				$bind = array(  ':nome' => $dados["up_nome"],
				':telefone' => $dados["up_telefone"],
				':hospital' => $dados["up_hospital"],
				':atendimento' => $dados["up_atendimento"],
				':data_nascimento' => date2sql($dados["up_data_nascimento"]));
				$retorno = $db->update("pacientes_suplemento", "WHERE id=".$dados['up_id'], $bind);
				$retorno = array("success" => "Cadastro atualizado com sucesso.");
				
		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stPacienteSimplificada", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				$retorno = null;

				// if (isset($dados['cpf']) and ($dados['cpf'] == "") and ($dados['cpf_possui'] == "0")){
		        //     $retorno = array("error" => "Preencha o formulário corretamente.");
		        // }
		        // if (!isset($dados['cpf']) or ($dados['cpf'] == "")){
		        //     $dados['cpf'] = "";
		        //     $verificar = $db->select_single_to_array("pacientes_simplificada", "*", "WHERE id_prescritor=".$id_prescritor." AND nome='".$dados['nome']."'",  null);
		        //     $mensagem_error = "Já possui cadastro com estes dados.";
		        // }
		        // else{
		        //     $verificar = $db->select_single_to_array("pacientes_simplificada", "*", "WHERE id_prescritor=".$id_prescritor." AND cpf='".$dados['cpf']."'",  null);
		        //     $mensagem_error = "Este CPF já possui cadastro.";
		        // }

		        // $bind = array(  ':email' => $dados["email"],
				// 				':tipo' => 1,
				// 				':status' => 0,                     
				// 				':data_criacao' => date("Y-m-d H:i:s") );
				// $usuario = $db->insert("usuarios", $bind);


				if($dados['login_tipo'] == 'ibranutro'){
					$id_prescritor_ibranutro = $id_prescritor;
					$id_prescritor = null;
				}elseif($dados['login_tipo'] == 'entric'){
					$id_prescritor_ibranutro = null;
				}

				// $campo_prescritor = ':id_prescritor';

				if(isset($dados['sistema'])){
					$sistema = $dados['sistema'];
					if($sistema == 'ibranutro'){
						if($dados['id_admissao'] == ''){
							$dados['id_admissao'] = null;
						}
		
						$bind = array(	':id_prescritor' => $id_prescritor,
										':id_prescritor_ibranutro' => $id_prescritor_ibranutro,
										':nome' => $dados["nome"],
										':peso' => $dados["peso"],
										':data_nascimento' => date2sql($dados["data_nascimento"]),  
										':id_admissao' => $dados["id_admissao"],    
										':sistema' => $sistema,
										':data_criacao' => date("Y-m-d H:i:s"));
						$retorno = $db->insert("pacientes_simplificada", $bind);
						$retorno = array("success" => "Cadastro efetuado com sucesso.", "paciente" => $retorno);
		
						//retornar para null
						$_SESSION['paciente_redirect']['id_admissao'] = null;
					}
					if($sistema == 'EN'){
						if($dados['id_paciente'] == ''){
							$dados['id_paciente'] = null;
						}
		
						$bind = array(	':id_prescritor' => $id_prescritor,
										':id_prescritor_ibranutro' => $id_prescritor_ibranutro,
										':nome' => $dados["nome"],
										':peso' => $dados["peso"],
										':data_nascimento' => date2sql($dados["data_nascimento"]),  
										':id_paciente' => $dados["id_paciente"],    
										':sistema' => $sistema,
										':data_criacao' => date("Y-m-d H:i:s"));
						$retorno = $db->insert("pacientes_simplificada", $bind);
						$retorno = array("success" => "Cadastro efetuado com sucesso.", "paciente" => $retorno);

		
						//retornar para null
						$_SESSION['paciente_redirect']['id_paciente'] = null;
		
					}
				}else{
					$bind = array(	':id_prescritor' => $id_prescritor,
									':id_prescritor_ibranutro' => $id_prescritor_ibranutro,
								':nome' => $dados["nome"],
								':peso' => $dados["peso"],
								':data_nascimento' => date2sql($dados["data_nascimento"]),  
								':sistema' => 'cadastrado',
								':data_criacao' => date("Y-m-d H:i:s"));
					$retorno = $db->insert("pacientes_simplificada", $bind);
					$retorno = array("success" => "Cadastro efetuado com sucesso.", "paciente" => $retorno);
				}

		        $data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

	$app->post("/ajax_stPacienteSuplemento", function (Request $request, Response $response) {
		$token = str_replace("Bearer ", "", $request->getServerParams()["HTTP_AUTHORIZATION"]);		
		$result = JWTAuth::verifyToken($token);
		$data = array();
		if ($result) {
			$db = new Database();
			$bind = array(':id'=> $result->header->id);
			$db_ibranutro = new Database_ibranutro();
			$login = $request->getParam("login");
			if($login == 'ibranutro'){
				$usuario = $db_ibranutro->select_single_to_array("tb_usuario", "*", "WHERE id_usuario=:id", $bind);
			}elseif($login == 'entric'){
				$usuario = $db->select_single_to_array("usuarios", "*", "WHERE id=:id", $bind);
			}
			if ($usuario){
				$dados = $request->getParam("dados");
				$id_prescritor = $request->getParam("id_prescritor");
				$retorno = null;

				// if (isset($dados['cpf']) and ($dados['cpf'] == "") and ($dados['cpf_possui'] == "0")){
		        //     $retorno = array("error" => "Preencha o formulário corretamente.");
		        // }
		        // if (!isset($dados['cpf']) or ($dados['cpf'] == "")){
		        //     $dados['cpf'] = "";
		        //     $verificar = $db->select_single_to_array("pacientes_simplificada", "*", "WHERE id_prescritor=".$id_prescritor." AND nome='".$dados['nome']."'",  null);
		        //     $mensagem_error = "Já possui cadastro com estes dados.";
		        // }
		        // else{
		        //     $verificar = $db->select_single_to_array("pacientes_simplificada", "*", "WHERE id_prescritor=".$id_prescritor." AND cpf='".$dados['cpf']."'",  null);
		        //     $mensagem_error = "Este CPF já possui cadastro.";
		        // }

		        // $bind = array(  ':email' => $dados["email"],
				// 				':tipo' => 1,
				// 				':status' => 0,                     
				// 				':data_criacao' => date("Y-m-d H:i:s") );
				// $usuario = $db->insert("usuarios", $bind);


				if($dados['login_tipo'] == 'ibranutro'){
					$campo_prescritor = ':id_prescritor_ibranutro';
				}elseif($dados['login_tipo'] == 'entric'){
					$campo_prescritor = ':id_prescritor';
				}
				// $campo_prescritor = ':id_prescritor';
				if(isset($dados['sistema'])){
					$sistema = $dados['sistema'];
					if($sistema == 'ibranutro'){
						if($dados['id_admissao'] == ''){
							$dados['id_admissao'] = null;
						}
		
						$bind = array(	$campo_prescritor => $id_prescritor,
										':nome' => $dados["nome"],
										':telefone' => $dados["telefone"],
										':hospital' => $dados["hospital"],
										':atendimento' => $dados["atendimento"],
										':data_nascimento' => date2sql($dados["data_nascimento"]),    
										':id_admissao' => $dados["id_admissao"],
										':sistema' => $sistema,
										':data_criacao' => date("Y-m-d H:i:s"));
						$retorno = $db->insert("pacientes_suplemento", $bind);
						$retorno = array("success" => "Cadastro efetuado com sucesso.", "paciente" => $retorno);
		
						//retornar para null
						$_SESSION['paciente_redirect']['id_admissao'] = null;
		
					}
					if($sistema == 'EN'){
						if($dados['id_paciente'] == ''){
							$dados['id_paciente'] = null;
						}
		
						$bind = array(	$campo_prescritor => $id_prescritor,
										':nome' => $dados["nome"],
										':telefone' => $dados["telefone"],
										':hospital' => $dados["hospital"],
										':atendimento' => $dados["atendimento"],
										':data_nascimento' => date2sql($dados["data_nascimento"]),    
										':id_paciente' => $dados["id_paciente"],
										':sistema' => $sistema,
										':data_criacao' => date("Y-m-d H:i:s"));
						$retorno = $db->insert("pacientes_suplemento", $bind);
						$retorno = array("success" => "Cadastro efetuado com sucesso.", "paciente" => $retorno);
		
						//retornar para null
						$_SESSION['paciente_redirect']['id_paciente'] = null;
		
					}
				}else{
					$bind = array(	$campo_prescritor => $id_prescritor,
									':nome' => $dados["nome"],
									':telefone' => $dados["telefone"],
									':hospital' => $dados["hospital"],
									':atendimento' => $dados["atendimento"],
									':data_nascimento' => date2sql($dados["data_nascimento"]), 
									':sistema' => 'cadastrado',  
									':data_criacao' => date("Y-m-d H:i:s"));
									$retorno = $db->insert("pacientes_suplemento", $bind);
					$retorno = array("success" => "Cadastro efetuado com sucesso.", "paciente" => $retorno);

					//retornar para null
					$_SESSION['paciente_redirect']['id_paciente'] = null;

				}
				$data = $retorno;
			}
			else{
				$data["status"] = "Erro: Token de autenticação é inválido.";	
			}

		} else {
			$data["status"] = "Erro: Token de autenticação é inválido.";
		}
		$response = $response->withHeader("Content-Type", "application/json");
		$response = $response->withStatus(200, "OK");
		$response = $response->getBody()->write(json_encode($data));
		return $response;
	});

});
?>
