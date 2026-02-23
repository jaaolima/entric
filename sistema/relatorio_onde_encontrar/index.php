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
			.marca-dagua{
				content: "NÃO CONCLUÍDA"; /* Texto da marca d'água */
				/* Posição e aparência */
				position: absolute;
				top: 50%;
				left: 50%;
				
				/* Rotação e posicionamento */
				transform: translate(-50%, -50%) rotate(-45deg); 
				
				/* Estilo do texto */
				font-size: 5em; /* Tamanho do texto */
				font-weight: bold;
				color: rgba(0, 0, 0, 0.1); /* Cor semi-transparente (RGBA é ótimo para isso) */
				
				/* Para garantir que a marca d'água fica no fundo */
				z-index: 1; 
				
				/* Impede que a marca d'água receba eventos de clique do mouse */
				pointer-events: none;
				
				/* Outros estilos */
				white-space: nowrap; /* Impede quebras de linha */
				text-transform: uppercase;
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
			.col_azul{
				background-color: #df7b1b82 !important;
			}
			.titulo{
				color: #df7b1b;
			}
		</style>
	</head>
	<body class="document">
		<div class="page logo_efeito" style="position:relative;">
			<img class="background" style="position:absolute;left:2cm;width:150px;" src="imagem/logo_ibranutro.png" alt="">
			<div style="display:flex;">
				<div style="width:50%;padding-left: 10px;padding-right: 10px;">
					<P style="text-align: center;" class="subtitutlo">ONDE ENCONTRAR?</p>
					<p>
						<table width="100%" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<?php 
									$danone = $db->select_to_array("distribuidores", "*", "WHERE principal_regiao=1  and id <> 8 AND UPPER(uf)='DF'", null);
									if ($danone){
										echo '<td style="width:  100%; text-align: center;display:flex; padding-bottom:10px;justify-content: space-around;">';
										for ($i = 0; $i < count($danone); $i++) {
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
									}
									?>
								</tr>
								<tr>
									<td style="width:  100%; border-left: 0px solid #8fcfe5; text-align: center;display:flex;font-size:11px;padding-top:10px;display:flex;flex-wrap:wrap;justify-content:space-around;">
										<?php 
										// $danone = $db->select_to_array("distribuidores", "*", "WHERE principal_regiao=0 AND UPPER(uf)='".strtoupper($relatorio['distribuidores'])."'", null);
										if(isset($_REQUEST['hsl'])){
											$danone = $db->select_to_array("distribuidores", "*", "WHERE id = 24", null);
											if ($danone){
												//echo "<p><strong>OUTROS</strong></p>";
												for ($i = 0; $i < count($danone); $i++) {
													echo '<div style="width:40%;margin:10px;">
															<p>';									
																echo '<strong>'.$danone[$i]['distribuidor']."</strong>";
																if (trim($danone[$i]['endereco']) <> "") echo "<br>".$danone[$i]['endereco'];
																if (trim($danone[$i]['telefone']) <> "") echo "<br>".$danone[$i]['telefone'];
																if (trim($danone[$i]['whatsapp']) <> "") echo "<br>".$danone[$i]['whatsapp'];
																if (trim($danone[$i]['cupom']) <> "") echo "<br>Cupom: ".$danone[$i]['cupom'];
															echo '</p>';
													echo '</div>';
												}
												
											}
										}else{
											$danone = $db->select_to_array("distribuidores", "*", "WHERE id = 26", null);
											if ($danone){
												//echo "<p><strong>OUTROS</strong></p>";
												for ($i = 0; $i < count($danone); $i++) {
													echo '<div style="width:40%;margin:10px;">
															<p>';									
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
							<img src='imagem/qrcode-concierge-log.png' style='display:inline-block;' width='90'>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
