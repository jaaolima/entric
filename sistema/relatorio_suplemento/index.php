<!DOCTYPE html>
<?php 
// /usr/local/bin/wkhtmltoimage -f jpg --encoding UTF-8 "https://entric.storm.expert/sistema/relatorio/MUk4M1NjelVNQmVPbGUwQXFBS1hFUT09" arquivo.jpg
// /usr/local/bin/wkhtmltoimage -f jpg --encoding UTF-8 --enable-local-file-access --include-in-outline --enable-plugins --xsl-style-sheet "https://entric.storm.expert/sistema/relatorio/index2.php?url=MUk4M1NjelVNQmVPbGUwQXFBS1hFUT09" arquivo.jpg

//	wkhtmltopdf https://sistema.entric.com.br/relatorio/OGlEUEUzeXQ1OGJ6alpKQ0QwRkFjZz09 teste1.pdf
//	wkhtmltopdf -O Landscape https://sistema.entric.com.br/relatorio/OGlEUEUzeXQ1OGJ6alpKQ0QwRkFjZz09___p teste2.pdf

/*
<!--
 * HTML-Sheets-of-Paper (https://github.com/delight-im/HTML-Sheets-of-Paper)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
-->
*/
require __DIR__ . '/libs/conf6ion.php';
require __DIR__ . '/libs/common.php';
require __DIR__ . '/libs/database.class.php';
//echo endecrypt("encrypt", 466);
//die();
if (!isset($_GET['url'])) Redirect(BASE_PATH);


// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// imprimir = somente secao de header =-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$p_header = false;
if (strpos($_GET['url'], "___h") !== false) {
	$url = explode("___h", $_GET['url']);
	$url = $url[0];
	$p_header = true;
}
else{
	$url = $_GET['url'];
}
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// imprimir = somente secao de produtos =-=-=-=-=-=-=-=-=-=-=-=-=-=-
$p_produtos = false;
if (strpos($_GET['url'], "___p") !== false) {
	$url = explode("___p", $_GET['url']);
	$url = $url[0];
	$p_produtos = true;
}
else{
	$url = $_GET['url'];
}
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// imprimir = somente secao de footer =-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$p_footer = false;
if (strpos($_GET['url'], "___f") !== false) {
	$url = explode("___f", $_GET['url']);
	$url = $url[0];
	$p_footer = true;
}
else{
	$url = $_GET['url'];
}
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=


$url = endecrypt("decrypt", $url);
if ($url=="") Redirect(BASE_PATH);
$relatorio = $db->select_single_to_array("relatorios_suplemento", "*", "WHERE id=:id", array(":id"=>$url));
if (!$relatorio) Redirect(BASE_PATH);
if (($p_header) or ($p_produtos) or ($p_footer)){ if ($relatorio['codigo']==""){ die(); }}

$paciente = $db->select_single_to_array("pacientes_suplemento", "*", "WHERE id=:id_paciente", array(":id_paciente"=>$relatorio['id_paciente']));

$config = $db->select_single_to_array("config", "*", "WHERE id=1", null);
if (trim($relatorio['higienizacao'])=="") $relatorio['higienizacao'] = $config['higienizacao'];
if (trim($relatorio['cuidados'])=="") $relatorio['cuidados'] = $config['cuidados'];
if (trim($relatorio['preparo'])=="") $relatorio['preparo'] = $config['preparo'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<title>Relatório - <?php echo $url;?></title>
		<link rel="stylesheet" type="text/css" href="css/sheets-of-paper-a4.css">
		<style>
			body{
				text-align: justify;
				text-justify: inter-word;
			}
			.logo_efeito{
				background-image: url("imagem/logo.png"), url("imagem/efeito.png");
				background-repeat: no-repeat;
				background-size: 150px;
				background-position: 2cm 1cm, right bottom;
				visibility: visible;
			}
			.titulo {
				font-weight: bold;
				color: #45cfb3;
			}
			.text-center{
				text-align: center;
				font-size: 12pt;
			}
			.linha{
				background-image: url("imagem/linha.png");
				background-repeat: no-repeat;
				background-position: left 30px;
				visibility: visible;
				padding: 0px 20px 40px 20px;
				margin: 0px 0px 20px 0px;
			}
			.subtitutlo {
				font-weight: bold;
				font-size: 11pt;
				color: #0092c5;
				border-bottom: 1px solid #8fcfe5;
				border-width: 0px 0px 1px 1px !important;
				padding: 60px 10px 10px 0px;
			}
			p{
				line-height: 1.3;
			}
			.tabela_p1 tbody tr td{ 
				height: 30px;
			}

			<?php
			if (($p_produtos) or ($p_header) or ($p_footer)){
				?>
				html, body {
					background-color: #fff !important;
				}
				.page_land{
					size: A4 landscape;
					width: 38cm;
					box-shadow: 0 0px 0px #fff;

					padding-left: 2cm;
					padding-right: 2cm;
				}
				.logo_efeito{
					background-image: url("imagem/logo.png"), url("imagem/efeito2.png");
					background-repeat: no-repeat;
					background-size: 150px;
					background-position: 2cm 1cm, right bottom;
					visibility: visible;
				}
				<?php
			}

			if (($p_header) or ($p_footer)){
				?>
				.page{
					width: 26.5cm;
					box-shadow: 0 0px 0px #fff;
					padding-left: 2cm;
					padding-right: 2cm;
				}
				.logo_efeito{
					background-image: url("imagem/logo.png"), url("imagem/efeito2.png");
					background-repeat: no-repeat;
					background-size: 150px;
					background-position: 2cm 1cm, right bottom;
					visibility: visible;
				}
				<?php
			}
			?>
		</style>
	</head>
	<body class="document">

		<?php 
		if (((!$p_produtos) and (!$p_footer)) or ($p_header)){
		?>
			<div class="page <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>">
			
			<p class="text-center linha titulo">RELATÓRIO NUTRICIONAL TNEVO</p>
			

			<?php if ($relatorio['rel_identificacao']<>""){ ?>
			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> DADOS GERAIS</p>
			<p><strong>Nome:</strong> <?php echo ucwords($paciente['nome']);?></p>
			<p><strong>Data de Nascimento:</strong> <?php echo sql2date($paciente['data_nascimento']);?></p>
			<?php if($paciente['hospital'] <> '') echo "<p><strong>Hospital:</strong> ".$paciente['hospital']." </p>"; ?>
			<?php if($paciente['atendimento'] <> '') echo "<p><strong>Atendimento:</strong> ".$paciente['atendimento']." </p>"; ?>
			<?php } ?>

			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> O QUE É A TERAPIA NUTRICIONAL POR VIA ORAL?</p>
			<div style="display:flex;margin-top:15px;">
				<div style="width:68%;">
					<p>A Terapia Nutricional Enteral por Via Oral, também conhecida como <span style="color:#0092c5;">suplemento nutricional</span>, completa as calorias, proteínas e nutrientes que não estão sendo supridos com a dieta convencional, e tem como objetivo a <span style="color:#0092c5;">recuperação ou manutenção da saúde e do estado nutricional</span>.</p>
				</div>
				<div style="text-align:center;width:32%;">
					<h4 style="color:#45cfb3;margin:0px;">SAIBA MAIS!</h4>
					<img src="imagem/qrcode.png" style="display:inline-block;" width="120" alt="">
				</div>
			</div>
			
		<?php
		}
		?>

		<?php 
		if (((!$p_produtos) and (!$p_footer)) or ($p_header)){
		?>
			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> CONDUTA</p>
			<p>Utilizar <?php echo $relatorio['fra_fracionamento_dia']; ?> vezes ao dia por <?php echo $relatorio['fra_qto_tempo']; ?>.</p>
			<?php 
				if ($relatorio['fra_dieta_horario'] <> ""){
					$_horarios = json_decode($relatorio['fra_dieta_horario'], true);
					$horarios = array();
					foreach ($_horarios as $chave => $valor) {
						$horarios[] = $valor;
					}
					$_horarios = "";
					for ($i = 0; $i < count($horarios); $i++) {
						if($i == count($horarios) - 1){
							$_horarios .= $horarios[$i];
						}else{
							$_horarios .= $horarios[$i] . ', ';
						}
					}
					echo "<p>Horários sugeridos: ".$_horarios.".</p>";
				} 
			?>	
		<?php } ?>	


				
		<?php 
		if ((!$p_header) and (!$p_footer)){
		?>
				<?php 
				// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- LÍQUIDO / CREME =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
				$landscape = false;
				$_produtos_nomes = array();
				// if ($relatorio['dieta_produto_dc'] <> ""){
				// 	$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

				// 	// para fazer o merge no nome do produto e fabricante;
				// 	$_produtos_nomes_usados = array();
				// 	foreach ($dieta_produto_dc as &$value) {
				// 		$produto = explode("___", $value);
				// 		$produto[1] = trim($produto[1]);
				// 		if ($produto[5] == "fechado"){
				// 			if (isset($_produtos_nomes[ $produto[1] ])) $_produtos_nomes[ $produto[1] ] = $_produtos_nomes[ $produto[1] ] + 1;
				// 			else $_produtos_nomes[ $produto[1] ] = 1;
				// 		}
				// 	}
				// }
				if (($relatorio['calculo_apres_liquidocreme'] == 1)) {
					if (!$landscape){
						echo "</div>";
					}
					?>				
					<div class="page_land <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>" style="page-break-before: always;">
						<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> SUGESTÃO DE PRODUTOS</p>

						<p style="padding-top: 30px;">
							<strong>LÍQUIDO / CREME - PRONTO PARA CONSUMO</strong>
							<table width="100%" margin="0" padding="1" border="1" cellspacing="0" cellpadding="1" class="tabela_produtos">
							<?php
							if ($relatorio['dieta_produto_dc'] <> ""){
								?>
								<tr>
									<th width="24%" height="30px">
										Produto
									</th>
									<th width="12%" class="col_azul">
										Volume(unidade)
									</th>
								</tr>
								<?php
								$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

								$dados_ordem = array();
								foreach ($dieta_produto_dc as &$value) {
									$produto = explode("___", $value);
									if ($produto[5] == "Líquido/Creme"){
										$produto_cad = $db->select_single_to_array("produtos", "*", "WHERE id=:id", array(":id"=>$produto[0]));

										if (isset($dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]]))
											$cont_dados = count( $dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]] );
										else
											$cont_dados = 0;

										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[1];
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto_cad['fabricante'];
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[3];
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[4];
										
										$volume_final = chkfloat($produto[3]);
										$qtd_horas = hoursToMinutes($relatorio['fra_h_inf_dieta']);
										if (($qtd_horas>0) and ($volume_final>0)) $velocidade = ($volume_final / ($qtd_horas/60));
										else $velocidade = 0;
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = round_up($velocidade)." ml/hora";

										$volume_final = chkfloat($produto[3]);
										$qtd_horas = hoursToMinutes($relatorio['fra_h_inf_dieta']);
										if (($qtd_horas>0) and ($volume_final>0)) $gotejamento = (($volume_final*20) / ($qtd_horas));
										else $gotejamento = 0;
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = round_up($gotejamento);

										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[7]." kcal";
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[8]." g";

										$volume_final = chkfloat($produto[3]);											
										if ($produto_cad){ $fibra = moeda2float($produto_cad['fibras']); } else{ $fibra = 0;	 }
										$fibra_dia = ($volume_final * $fibra)/100;

										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $fibra_dia." g";
									}
								}

								ksort($dados_ordem);
								foreach ($dados_ordem as $chave => $valores) {
									for ($i = 0; $i < count($valores); $i++) {
										$valor = $valores[$i];

										$font_destaque = "";
										if ($valor[1] == "Danone"){
											$font_destaque = "style='font-size: 14px;'";
										}

										?>
										<tr>
											<td width="12%" >
												<?php echo $valor[0];?>
											</td>
											<td width="12%" class="col_azul">
												<?php echo $valor[3];?>
											</td>
										</tr>
										<?php
									}
								}
							}
							?>
							</table>
						</p>
					</div>			
					<?php
					$landscape = true;
				}
				?>

				<?php
				// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- SISTEMA PO =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
				$_produtos_nomes = array();
				// if ($relatorio['dieta_produto_dc'] <> ""){
				// 	$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

				// 	// para fazer o merge no nome do produto e fabricante;
				// 	$_produtos_nomes_usados = array();
				// 	foreach ($dieta_produto_dc as &$value) {
				// 		$produto = explode("___", $value);
				// 		$produto[1] = trim($produto[1]);
				// 		if ($produto[6] == "aberto_po"){
				// 			if (isset($_produtos_nomes[ $produto[1] ])){
				// 				$_produtos_nomes[ $produto[1] ] = $_produtos_nomes[ $produto[1] ] + 1;
				// 			}
				// 			else{	
				// 				$_produtos_nomes[ $produto[1] ] = 1;
				// 			}
				// 		}
				// 	}
				// }

				if (($relatorio['calculo_apres_po'] == 1)) {
					if (!$landscape){
						echo "</div>";
					}
					?>
					<div class="page_land <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>" style="page-break-before: always;">
						<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> SUGESTÃO DE PRODUTOS</p>

						<p style="padding-top: 30px;">
							<strong>EM PÓ - PARA DILUIR</strong>

							<table width="100%" margin="0" padding="1" border="1" cellspacing="0" cellpadding="1" style="margin-top: 0.5cm;" class="tabela_produtos tabela_p1">
							<thead>
							  <tr>
							    <th rowspan="2">Produto</th>
							    <th colspan="2" class="col_azul">Quantidade(Porção)</th>
							    <th rowspan="2">Volume(Porção)</th>
							  </tr>
							  <tr>
							    <th class="col_azul">Gramas</th>
							    <th class="col_azul">Medidas</th>
							  </tr>
							</thead>
							<tbody>
								<?php
								if ($relatorio['dieta_produto_dc'] <> ""){
									$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

									$dados_ordem = array();
									foreach ($dieta_produto_dc as &$value) {
										$produto = explode("___", $value);
										var_dump($produto);
										if ($produto[5] == "Pó"){
											$produto[1] = trim($produto[1]);

											$produto_cad = $db->select_single_to_array("produtos", "*", "WHERE id=:id", array(":id"=>$produto[0]));

											$medida = chkstring2float($produto[8]); // 0.5 arrendodar

											$grama = chkstring2float($produto[10]);

											if (isset($dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]]))
												$cont_dados = count( $dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]] );
											else
												$cont_dados = 0;

											$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[1];
											$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto_cad['fabricante'];
											$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[2];
											$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $grama;
											$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $medida;
											$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[4];
										} 
									}

									ksort($dados_ordem);
									foreach ($dados_ordem as $chave => $valores) {
										for ($i = 0; $i < count($valores); $i++) {
											$valor = $valores[$i];

											$font_destaque = "";
											if ($valor[1] == "Danone"){
												$font_destaque = "style='font-size: 14px;'";
											}
											?>
											<tr>
												<td rel="<?php echo $produto[0];?>" rowspan="<?php echo $_produtos_nomes[$produto[1]];?>" <?php echo $font_destaque;?>>
													<?php echo $valor[0];?>
												</td>
												<td class="col_azul"><?php echo $valor[3];?></td>
												<td class="col_azul"><?php echo $valor[4];?></td>
												<td><?php echo $valor[5];?></td>
											</tr>
											<?php
										}
									}
								}
								?>
							</tbody>
							</table>
						</p>
					</div>	
					<?php 
					$landscape = true;
				}
				?>





				<?php
				if ((!$p_produtos) and (!$p_header)){
					if ($landscape){
						echo '<div class="page '.($relatorio['rel_logo']<>""?"logo_efeito":"").'">';	
					}
				}
				?>
		<?php
		}
		?>


		<?php 
		if ($p_footer) {
		?>	
			<div class="page <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>">
		<?php
		}
		?>


		<?php 
		if ( ((!$p_produtos) and (!$p_header)) or ($p_footer)) {
		?>	

			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> ONDE ENCONTRAR</p>
			<p>
				<table width="100%" cellspacing="0" cellpadding="0">
					<tbody>
					<tr>
						<td style="width:  50%; border-right: 1px solid #8fcfe5; text-align: center;">
							<?php 
							$danone = $db->select_to_array("distribuidores", "*", "WHERE principal_regiao=1 AND UPPER(uf)='".strtoupper($relatorio['distribuidores'])."'", null);
							if ($danone){
								//echo "<p><strong>PRINCIPAL</strong></p>";
								for ($i = 0; $i < count($danone); $i++) {
									echo '<p style="text-align: center;font-size: 18px;">';
										echo '<strong>'.$danone[$i]['distribuidor']."</strong><br>".$danone[$i]['fabricante'];
										if (trim($danone[$i]['endereco']) <> "") echo "<br>".$danone[$i]['endereco'];
										if (trim($danone[$i]['telefone']) <> "") echo "<br>".$danone[$i]['telefone'];
										if (trim($danone[$i]['whatsapp']) <> "") echo "<br>".$danone[$i]['whatsapp'];
										if (trim($danone[$i]['cupom']) <> "") echo "<br>Cupom: ".$danone[$i]['cupom'];
										echo "<br><h5 style='color:#45cfb3;margin:0px;margin-top:15px;'>FACILITE SUA COMPRA!</h5>
										<h5 style='color:#45cfb3;margin:0px;'>APONTE A CÂMERA PARA O QR CODE E RECEBA NOSSO ATENDIMENTO PERSONALIZADO:</h5>
										<br><img src='imagem/qrcode-sistema.png' style='display:inline-block;' width='80' alt=''>";
									echo '</p>';
								}
							}
							?>
						</td>
						<td style="width:  50%; border-left: 0px solid #8fcfe5; text-align: center;">
							<?php 
							$danone = $db->select_to_array("distribuidores", "*", "WHERE principal_regiao=0 AND UPPER(uf)='".strtoupper($relatorio['distribuidores'])."'", null);
							if ($danone){
								//echo "<p><strong>OUTROS</strong></p>";
								for ($i = 0; $i < count($danone); $i++) {
									echo '<p style="text-align: left; padding-left: 20px;">';									
										echo '<strong>'.$danone[$i]['distribuidor']."</strong><br>".$danone[$i]['fabricante'];
										if (trim($danone[$i]['endereco']) <> "") echo "<br>".$danone[$i]['endereco'];
										if (trim($danone[$i]['telefone']) <> "") echo "<br>".$danone[$i]['telefone'];
										if (trim($danone[$i]['whatsapp']) <> "") echo "<br>".$danone[$i]['whatsapp'];
										if (trim($danone[$i]['cupom']) <> "") echo "<br>Cupom: ".$danone[$i]['cupom'];
									echo '</p>';
								}
							}
							?>
							
						</td>
					</tr>
					</tbody>
				</table>
			</p>


			<?php 
			if ($relatorio['codigo']<>""){
			?>
				<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> FINAL DO RELATÓRIO</p>
				<p>
				<table style="width:100%">
					<thead>
						<tr>
							<td style="width:20%">
								<img src="imagem/qrcode-sistema.png" width="100%" border="0" />
							</td>
							<td style="width:5%"></td>
							<td style="width:75%">
								<p>Scaneie ao qrcode ao lado com a camera do celular para:</p>
								<p>
								- Reimprimir orientação de alta;<br>
								- Acessar vídeos instrutivos;<br>
								- Consultar pontos de vendas de dieta;</p>
							</td>
						</tr>
					</thead>
				</table>
				</p>
			<?php 
			}
			?>

		<?php
		}
		?>
		</div>
	</body>
</html>
