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
// if(!isset($_SESSION['login'])){
// 	Redirect(BASE_PATH);
// }
// session_start();
// var_dump($_SESSION);
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
$relatorio = $db->select_single_to_array("relatorios_modulo", "*", "WHERE id=:id", array(":id"=>$url));
if (!$relatorio) Redirect(BASE_PATH);
if (($p_header) or ($p_produtos) or ($p_footer)){ if ($relatorio['codigo']==""){ die(); }}

$paciente = $db->select_single_to_array("pacientes_modulo", "*", "WHERE id=:id_paciente", array(":id_paciente"=>$relatorio['id_paciente']));
$paciente_ibranutro = $db_ibranutro->select_single_to_array("tb_paciente_estado_nutricional", "*", "WHERE id_paciente=:id_paciente", array(":id_paciente"=>$paciente['id_paciente']));
$config = $db->select_single_to_array("config", "*", "WHERE id=1", null);

if($paciente['id_prescritor_ibranutro'] != ""){
	$usuario = ['login' => 'ibranutro'];
}else{
	$usuario = ['login' => 'entric'];
}
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
				font-size: 13px !important;
			}
			/* .logo_efeito{
				background-image: url("imagem/logo.png"), url("imagem/efeito.png");
				background-repeat: no-repeat;
				background-size: 150px;
				background-position: 2cm 1cm, right bottom;
				visibility: visible;
			} */
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
				padding: 10px 10px 10px 0px;
				margin-top:30px;

			}
			p{
				line-height: 1.3;
			}
			.tabela_p1 tbody tr td{ 
				height: 10px;
			}

			/* Permitir que a tabela seja quebrada entre páginas */
			table {
				page-break-inside: auto; /* Permitir quebra de página dentro da tabela */
			}

			tr {
				page-break-inside: avoid; /* Evitar quebras dentro de linhas */
				page-break-after: auto; /* Quebras após linhas, se necessário */
			}

			td, th {
				page-break-inside: avoid; /* Evitar quebra dentro de células */
			}
			@media print {
				.page {
					margin-top: 0px;
					position: relative !important;
				}

				.page .background {
					position: absolute !important;
				}

				.page .background:first-child {
					left: 1cm !important;
					top: -0.5cm !important;
					width: 150px !important;
				}

				.page .background:last-child {
					bottom: 0cm !important;
					right: 2px !important;
				}
				.print-footer {
					position: static !important;
					margin-top: 30px !important;
				}
			}
			.print-footer {
				position: absolute;
				bottom: 10px;
				right: 10px;
				left: 10px;
			}
			/* Garantir margens adequadas para impressão */

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
				/* .logo_efeito{
					background-image: url("imagem/logo.png"), url("imagem/efeito2.png");
					background-repeat: no-repeat;
					background-size: 150px;
					background-position: 2cm 1cm, right bottom;
					visibility: visible;
				} */
				<?php
			}

			if (($p_header) or ($p_footer)){
				?>
				.page{
					width: 26.5cm;
					box-shadow: 0 0px 0px #fff;
					padding-left: 1cm;
					padding-right: 1cm;
				}
				/* .logo_efeito{
					background-image: url("imagem/logo.png"), url("imagem/efeito2.png");
					background-repeat: no-repeat;
					background-size: 150px;
					background-position: 2cm 1cm, right bottom;
					visibility: visible;
				} */
				<?php
			}
			?>
			<?php if($usuario['login'] == "ibranutro") : ?>
				.col_azul{
					background-color: #df7b1b82 !important;
				}
				.titulo{
					color: #df7b1b;
				}
			<?php endif; ?>
		</style>
	</head>
	<body class="document">

		<?php 
		if (((!$p_produtos) and (!$p_footer)) or ($p_header)){
		?>
			<div class="page <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>" style="position:relative;">
			<?php if($usuario['login'] == 'ibranutro') : ?>
			<img class="background" style="position:absolute;left:2cm;width:150px;" src="imagem/logo_ibranutro.png" alt="">
			<?php else: ?>
			<img class="background" style="position:absolute;left:2cm;width:150px;" src="imagem/logo.png" alt="">
			<img class="background" style="position:absolute;bottom:1cm;right:2px;" src="imagem/efeito.png" alt="">
			<?php endif; ?>
			
			<p class="text-center <?php if($usuario['login'] != 'ibranutro') : ?>linha<?php endif; ?> titulo" style="margin-top:30px;font-size:14px;">PRESCRIÇÃO NUTRICIONAL</p>
			

			<?php if ($relatorio['rel_identificacao']<>""){ ?>
			<p class="text-left subtitutlo">
			<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> DADOS GERAIS</p>
			<div style="display:flex;">
				<div style="width:50%;">
					<p><strong>Nome:</strong> <?php echo ucwords($paciente['nome']);?></p>
				</div>
				<div style="width:50%;">
					<p><strong>Data de Nascimento:</strong> <?php echo sql2date($paciente['data_nascimento']);?></p>
				</div>
			</div>
			<?php } ?>

			<p class="text-left subtitutlo">
			<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> O QUE SÃO OS MÓDULOS NUTRICIONAIS?</p>
			<div style="display:flex;margin-top:15px;">
				<div style="width:68%;">
					<p>Os módulos nutricionais são fórmulas que contêm <span style="color:#0092c5;">nutrientes específicos</span>, escolhidos de acordo com as necessidades de cada paciente. Eles têm o objetivo de complementar a alimentação, ajudando a atender às necessidades nutricionais de forma mais precisa e eficaz.</p>
				</div>
				<div style="text-align:center;width:32%;">
					<h4 class="titulo"style="margin:0px;">SAIBA MAIS!</h4>
					<img src="imagem/QRCode_via_oral.png" style="display:inline-block;" width="80" alt="">
				</div>
			</div>
			
		<?php
		}
		?>
				
		<?php 
		if ((!$p_header) and (!$p_footer)){
		?>
			<p class="text-left subtitutlo" style="margin:0px;">
			<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> PRESCRIÇÃO NUTRICIONAL ESPECIALIZADA - Escolha uma das opções.</p>
			<?php 
				$landscape = false;
				$_produtos_nomes = array();
				// if (!$landscape){
				// 	echo "</div>";
				// }
				if ($relatorio['dieta_produto_dc'] <> ""){
					?> 
					<p style="margin:10px 0px;">
						<strong style="justify-content: center;display: flex;">LÍQUIDO / CREME - PRONTO PARA CONSUMO</strong>
						<table width="100%" margin="0" padding="1" border="1" style="margin-top: 8px;" class="tabela_produtos">
							<tr>
								<th rowspan="2" height="30px">
									Produto
								</th>
								<th colspan="2" class="col_azul">
									Dosagem
								</th>
								<th rowspan="2">
									Porções/dia
								</th>
							</tr>
							<tr>
								<th>
									Medida
								</th>
								<th >
									Porção(g ou ml)
								</th>
							</tr>
					<?php
					
					$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

					$dados_ordem = array();
					foreach ($dieta_produto_dc as &$value) {
						$produto = explode("___", $value);
						var_dump($produto);
					}
					
					?>
					</p>
				<?php
					$landscape = true;
					}
			?>
		<?php
		}
		?>

		<?php 
			if ($relatorio['rel_distribuidores']<>""){
		?>
		<!-- <?php 
		if ($p_footer) {
		?>	
			<div class="page <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>">
		<?php
		}
		?> -->


		<?php 
		if ( ((!$p_produtos) and (!$p_header)) or ($p_footer)) {
		?>	
			<?php if($usuario['login'] == "ibranutro" && $relatorio['distribuidores'] == 'df') : ?>
			<div style="display:flex;">
				<div style="width:50%;padding-left: 10px;padding-right: 10px;">
					<P style="text-align: center;" class="subtitutlo">ONDE ENCONTRAR?</p>
					<p>
						<table width="100%" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<?php 
									$danone = $db->select_to_array("distribuidores", "*", "WHERE principal_regiao=1 AND UPPER(uf)='".strtoupper($relatorio['distribuidores'])."'", null);
									if ($danone){
										echo '<td style="width:  100%; text-align: center;display:flex;border-bottom:1px solid #8fcfe5; padding-bottom:10px;justify-content: space-around;">';
										for ($i = 0; $i < count($danone); $i++) {
											if($usuario['login'] == 'ibranutro' && $danone[$i]['uf'] == 'DF'){
												if($danone[$i]['id'] == '1'){
														echo '<div ">
															<p style="text-align: center;font-size: 13px;">';
															echo '<strong>'.$danone[$i]['distribuidor']."</strong>";
															if (trim($danone[$i]['endereco']) <> "") echo "<br>".$danone[$i]['endereco'];
															if (trim($danone[$i]['telefone']) <> "") echo "<br>".$danone[$i]['telefone'];
															if (trim($danone[$i]['whatsapp']) <> "") echo "<br>".$danone[$i]['whatsapp'];
															if (trim($danone[$i]['site']) <> "") echo "<br>".$danone[$i]['site'];
															if (trim($danone[$i]['cupom']) <> "") echo "<br>Cupom: ".$danone[$i]['cupom'];
															echo "</p>
														</div>";
														echo "";
											
													echo '</div>
													</td>';
												}
											}
											else{
													echo '<div ">
													<p style="text-align: center;font-size: 13px;">';
													echo '<strong>'.$danone[$i]['distribuidor']."</strong>";
													if (trim($danone[$i]['endereco']) <> "") echo "<br>".$danone[$i]['endereco'];
													if (trim($danone[$i]['telefone']) <> "") echo "<br>".$danone[$i]['telefone'];
													if (trim($danone[$i]['whatsapp']) <> "") echo "<br>".$danone[$i]['whatsapp'];
													if (trim($danone[$i]['cupom']) <> "") echo "<br>Cupom: ".$danone[$i]['cupom'];
													echo "</p>
													</div>";
													echo "<div style='display:flex;'>
															<div style='text-align:end;'>
																<h5 class='titulo'style='margin:0px;margin-top:8px;'>FACILITE SUA COMPRA!</h5>
																<h5 class='titulo'style='margin:0px;'>RECEBA ATENDIMENTO PERSONALIZADO</h5>
																<h5 class='titulo'style='margin:0px;'>APONTANDO A CÂMERA PARA O QR CODE:</h5>
															</div>
															<div>
																<img src='imagem/qrcode-sistema.png' style='display:inline-block;margin-left:10px;' width='60' alt=''>
															</div>
														</div>";
										
												echo '</div>
												</td>';
											}
										}
									}
									?>
								</tr>
								<tr>
									<td style="width:  100%; border-left: 0px solid #8fcfe5; text-align: center;display:flex;font-size:11px;padding-top:10px;display:flex;flex-wrap:wrap;justify-content:space-around;">
										<?php 
										$danone = $db->select_to_array("distribuidores", "*", "WHERE principal_regiao=0 AND UPPER(uf)='".strtoupper($relatorio['distribuidores'])."'", null);
										if ($danone){
											//echo "<p><strong>OUTROS</strong></p>";
											for ($i = 0; $i < count($danone); $i++) {
												if($usuario['login'] == 'ibranutro' && $danone[$i]['uf'] == 'DF'){
													if($danone[$i]['id'] == '1' || $danone[$i]['id'] == '8' || $danone[$i]['id'] == '24'){
														echo '<div style="width:40%;margin:10px;">
																<p style="text-align: left;">';									
																	echo '<strong>'.$danone[$i]['distribuidor']."</strong>";
																	if (trim($danone[$i]['endereco']) <> "") echo "<br>".$danone[$i]['endereco'];
																	if (trim($danone[$i]['telefone']) <> "") echo "<br>".$danone[$i]['telefone'];
																	if (trim($danone[$i]['whatsapp']) <> "") echo "<br>".$danone[$i]['whatsapp'];
																	if (trim($danone[$i]['cupom']) <> "") echo "<br>Cupom: ".$danone[$i]['cupom'];
																echo '</p>';
														echo '</div>';
													}
												}
												else{
													echo '<div style="width:40%;margin:10px;">
													<p style="text-align: left;">';									
														echo '<strong>'.$danone[$i]['distribuidor']."</strong>";
														if (trim($danone[$i]['endereco']) <> "") echo "<br>".$danone[$i]['endereco'];
														if (trim($danone[$i]['telefone']) <> "") echo "<br>".$danone[$i]['telefone'];
														if (trim($danone[$i]['whatsapp']) <> "") echo "<br>".$danone[$i]['whatsapp'];
														if (trim($danone[$i]['cupom']) <> "") echo "<br>Cupom: ".$danone[$i]['cupom'];
															echo '</p>';
													echo '</div>';
												}
											}
											
										}
										?>
										
									</td>
								</tr>
							</tbody>
						</table>
					</p>
				</div>
				<div style="width:50%;padding-left: 10px;padding-right: 10px;">
					<P style="text-align: center;" class="subtitutlo">FICOU COM DÚVIDAS?</p>
					<div style="justify-content:center;">
						<div style='margin-top:20px;text-align:center;'>
							<h5 style='margin:0px;margin-top:8px;'>APONTE A CÂMERA PARA O QR CODE E</h5>
							<h5 style='margin:0px;'>RECEBA ATENDIMENTO PERSONALIZADO DA</h5>
							<h5 style='margin:0px;color:#0092c5;'>NUTRICIONISTA CONCIERGE DO IBRANUTRO:</h5>
						</div>
						<div style="margin-top:20px;text-align:center;">
							<img src='imagem/qrcode-concierge.png' style='display:inline-block;' width='80' alt=''>
						</div>
					</div>
				</div>
			</div>
			<?php else : ?>
			<div style="display:flex;">
				<div style="width:100%;padding-left: 10px;padding-right: 10px;">
					<P style="text-align: center;" class="subtitutlo">ONDE ENCONTRAR?</p>
					<p>
						<table width="100%" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<?php 
									$danone = $db->select_to_array("distribuidores", "*", "WHERE principal_regiao=1 AND UPPER(uf)='".strtoupper($relatorio['distribuidores'])."'", null);
									if ($danone){
										echo '<td style="width:  100%; text-align: center;display:flex;border-bottom:1px solid #8fcfe5; padding-bottom:10px;justify-content: space-around;">';
										for ($i = 0; $i < count($danone); $i++) {
											echo '<div ">
													<p style="text-align: center;font-size: 13px;">';
													echo '<strong>'.$danone[$i]['distribuidor']."</strong>";
													if (trim($danone[$i]['endereco']) <> "") echo "<br>".$danone[$i]['endereco'];
													if (trim($danone[$i]['telefone']) <> "") echo "<br>".$danone[$i]['telefone'];
													if (trim($danone[$i]['whatsapp']) <> "") echo "<br>".$danone[$i]['whatsapp'];
													if (trim($danone[$i]['site']) <> "") echo "<br>".$danone[$i]['site'];
													if (trim($danone[$i]['cupom']) <> "") echo "<br>Cupom: ".$danone[$i]['cupom'];
													echo "</p>
													</div>";
													echo "<div style='display:flex;'>
															<div style='text-align:end;'>
																<h5 class='titulo'style='margin:0px;margin-top:8px;'>FACILITE SUA COMPRA!</h5>
																<h5 class='titulo'style='margin:0px;'>RECEBA ATENDIMENTO PERSONALIZADO</h5>
																<h5 class='titulo'style='margin:0px;'>APONTANDO A CÂMERA PARA O QR CODE:</h5>
															</div>
															<div>
																<img src='imagem/qrcode-badare.png' style='display:inline-block;margin-left:10px;' width='60' alt=''>
															</div>
														</div>";
										
												echo '</div>
												</td>';
										}
									}
									?>
								</tr>
								<tr>
									<td style="width:  100%; border-left: 0px solid #8fcfe5; text-align: center;display:flex;font-size:11px;padding-top:10px;display:flex;flex-wrap:wrap;justify-content:space-around;">
										<?php 
										$danone = $db->select_to_array("distribuidores", "*", "WHERE principal_regiao=0 AND UPPER(uf)='".strtoupper($relatorio['distribuidores'])."'", null);
										if ($danone){
											//echo "<p><strong>OUTROS</strong></p>";
											for ($i = 0; $i < count($danone); $i++) {
												echo '<div style="width:40%;margin:10px;">
													<p style="text-align: left;">';									
														echo '<strong>'.$danone[$i]['distribuidor']."</strong>";
														if (trim($danone[$i]['endereco']) <> "") echo "<br>".$danone[$i]['endereco'];
														if (trim($danone[$i]['telefone']) <> "") echo "<br>".$danone[$i]['telefone'];
														if (trim($danone[$i]['whatsapp']) <> "") echo "<br>".$danone[$i]['whatsapp'];
														if (trim($danone[$i]['cupom']) <> "") echo "<br>Cupom: ".$danone[$i]['cupom'];
															echo '</p>';
													echo '</div>';
											}
											
										}
										?>
										
									</td>
								</tr>
							</tbody>
						</table>
					</p>
				</div>
			</div>
			<?php endif; ?>
			<?php 
				$nome_hospital = '';
				$telefone = '';
				if($paciente_ibranutro['id_hospital'] == '11'){
					$nome_hospital = 'ANCHIETA';
					$telefone = '(61) 3353-9939';
				}
				if($paciente_ibranutro['id_hospital'] == '9'){
					$nome_hospital = 'TESTE';
					$telefone = '(99) 9999-9999';
				}
				if($paciente_ibranutro['id_hospital'] == '8'){
					$nome_hospital = 'DF STAR';
					$telefone = '(61) 3251-3608';
				}
				if($paciente_ibranutro['id_hospital'] == '1'){
					$nome_hospital = 'SANTA HELENA';
					$telefone = '(61) 3261-3031';
				}
				if($paciente_ibranutro['id_hospital'] == '3'){
					$nome_hospital = 'SANTA LÚCIA GAMA';
					$telefone = '(61) 3041-6831';
				}
				if($paciente_ibranutro['id_hospital'] == '10'){
					$nome_hospital = 'SANTA LÚCIA NORTE';
					$telefone = '(61) 3448-9120';
				}
				if($paciente_ibranutro['id_hospital'] == '4'){
					$nome_hospital = 'SANTA LÚCIA SUL';
					$telefone = '(61) 3445-0292';
				}
				if($paciente_ibranutro['id_hospital'] == '16'){
					$nome_hospital = 'MORUMBI';
					$telefone = '(11) 3093-2222';
				}
			?>
			<div style="margin-bottom:30px;">
				<div style="justify-content:center;text-align: center;display: flex;margin-top: 50px;">
					<div style="width: 250px;border-top: 1px solid;">
						<div style="margin-bottom:15px;">
							<p>Prescritor</p>
							<p style="margin:0px;">(Assinatura e Carimbo)</p>
						</div>
						<?php if($nome_hospital != '') : ?>
						<!-- <div>
							<strong>IBRANUTRO</strong>
							<p style="margin:0px;"><?php echo $nome_hospital; ?> - Telefone: <?php echo $telefone; ?></p>
						</div> -->
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php if($usuario['login'] == "ibranutro") : ?>
			<div class="print-footer">
				<div style="display:flex;justify-content: end;">
					<p style="color: #0092c5;font-size:9px;">powered by</p>
				</div>
				<div style="display:flex;justify-content: end;padding-bottom:10px;">
					<img src="imagem/logo.png" height="30px" alt="">
				</div>
				<div style="display:flex;background-color:darkgray;padding:12px;justify-content:space-between;color:white;">
					<div>
						<p>www.ibranutro.com.br</p>
					</div>
					<div style="margin-left:200px;">
						<p>SHCS CR 515 BI C Entrada 42 salas: 104, 107 e 109 - ENTRADA PELA Via W2 Sul - Asa Sul, Brasília - DF, 70381-530</p>
					</div>
				</div>
			</div>
			<?php endif; ?>

		<?php
		}
		?>
		<?php
		}
		?>
		</div>
	</body>
</html>
