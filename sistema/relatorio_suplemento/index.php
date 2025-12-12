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
$relatorio = $db->select_single_to_array("relatorios_suplemento", "*, DATE_FORMAT(data_criacao, '%d/%m/%Y %H:%i') as data_criacao", "WHERE id=:id", array(":id"=>$url));
if (!$relatorio) Redirect(BASE_PATH);
if($relatorio['codigo'] != "") $_GET['imprimir'] = true;
if (($p_header) or ($p_produtos) or ($p_footer)){ if ($relatorio['codigo']==""){ die(); }} 

$paciente = $db->select_single_to_array("pacientes_suplemento", "*", "WHERE id=:id_paciente", array(":id_paciente"=>$relatorio['id_paciente']));
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
			<?php if(!isset($_GET['imprimir'])) : ?>
			<div class="marca-dagua">RASCUNHO</div>
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
			<div style="display:flex;">
				<?php if($paciente['hospital'] <> '') echo "<div style='width:50%;'><p><strong>Hospital:</strong> ".$paciente['hospital']." </p></div>"; ?>
				<?php if($paciente['atendimento'] <> '') echo "<div style='width:50%;'><p><strong>Atendimento:</strong> ".$paciente['atendimento']." </p></div>"; ?>
			</div>
			<?php } ?>

			<p class="text-left subtitutlo">
			<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> O QUE É A TERAPIA NUTRICIONAL POR VIA ORAL?</p>
			<div style="display:flex;margin-top:15px;">
				<div style="width:68%;">
					<p>A Terapia Nutricional Enteral por Via Oral, também conhecida como <span style="color:#0092c5;">suplemento nutricional</span>, completa as calorias, proteínas e nutrientes que não estão sendo supridos com a dieta convencional, e tem como objetivo a <span style="color:#0092c5;">recuperação ou manutenção da saúde e do estado nutricional</span>.</p>
				</div>
				<div style="text-align:center;width:32%;">
					<h4 class="titulo"style="margin:0px;">SAIBA MAIS!</h4>
					<img src="imagem/QRCode_viaOral.png" style="display:inline-block;" width="80" alt="">
				</div> 
			</div>
			
		<?php
		}
		?>

		<?php 
		if (((!$p_produtos) and (!$p_footer)) or ($p_header)){
		?>
			<p class="text-left subtitutlo">
			<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> CONDUTA</p>
			<p style='margin:0px;'>Utilizar <?php echo $relatorio['fra_fracionamento_dia']; ?> <?php if($relatorio['fra_fracionamento_dia'] == '1') echo "vez"; else echo "vezes"; ?> ao dia<?php if($relatorio['fra_qto_tempo'] != "") echo " por ". $relatorio['fra_qto_tempo'] . ' dias.'; ?></p>
			<?php 
				if ($relatorio['fra_dieta_horario'] <> ""){
					$_horarios = json_decode($relatorio['fra_dieta_horario'], true);
					$horarios = array();
					foreach ($_horarios as $chave => $valor) {
						$horarios[] = $valor;
					}
					$_horarios = "";
					for ($i = 0; $i < count($horarios); $i++) {
						if($horarios[$i] != ''){
							if($i == count($horarios) - 1){
								$_horarios .= $horarios[$i];
							}else{
								$_horarios .= $horarios[$i] . ', ';
							}
						}
					}
					if($_horarios != ''){
						echo "<p style='margin:0px;'>Horários sugeridos: ".$_horarios.".</p>";
					}
				} 
			?>	
			<?php if($relatorio['fra_instrucao_uso'] != "") : ?>
			<p style="margin:0px;">Instruções de Uso: <?php echo $relatorio['fra_instrucao_uso']; ?></p>
			<?php endif; ?>
		<?php } ?>	


		<?php if ($relatorio['rel_prescricao']<>""){ ?>		
		<?php 
		if ((!$p_header) and (!$p_footer)){
		?>
				<p class="text-left subtitutlo" style="margin:0px;">
				<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> PRESCRIÇÃO NUTRICIONAL ESPECIALIZADA - Escolha uma das opções.</p>
				<?php 
				// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- LÍQUIDO =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
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
					// if (!$landscape){
					// 	echo "</div>";
					// }
					if ($relatorio['dieta_produto_dc'] <> ""){

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
						if($dados_ordem != []){
						?>
						<p style="margin:10px 0px;">
							<strong style="justify-content: center;display: flex;">LÍQUIDO - PRONTO PARA CONSUMO</strong>
							<table width="100%" margin="0" padding="1" border="1" style="margin-top: 8px;" class="tabela_produtos">
							<?php
							if ($relatorio['dieta_produto_dc'] <> ""){
								?>
								<tr>
									<th width="24%" height="30px">
										Produto
									</th>
									<th width="12%" class="col_azul">
										Volume (unidade)
									</th>
								</tr>
								<?php
								// ksort($dados_ordem);
								foreach ($dados_ordem as $chave => $valores) {
									for ($i = 0; $i < count($valores); $i++) {
										$valor = $valores[$i];

										?>
										<tr height="10px">
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
					<?php
						$landscape = true;
						}
					}
				}
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
					if ($relatorio['dieta_produto_dc'] <> ""){
						// if (!$landscape){
						// 	echo "</div>";
						// }
						$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

						$dados_ordem = array();
						foreach ($dieta_produto_dc as &$value) {
							$produto = explode("___", $value);
							if ($produto[5] == "Pó"){
								$produto[1] = trim($produto[1]);

								$produto_cad = $db->select_single_to_array("produtos", "*", "WHERE id=:id", array(":id"=>$produto[0]));

								$medida_dc = json_decode($produto_cad['medida_dc'], true);
								$unidade = json_decode($produto_cad['unidade'], true);
								for ($i=0; $i < count($medida_dc); $i++) { 
									if($medida_dc[$i] == $produto[2]){
										$unidade_prod = $unidade[$i];
									}
								}


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
								$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $unidade_prod;
							} 
						}
						if($dados_ordem != []){
						?>
							<p style="margin:10px 0px;">
								<strong style="justify-content: center;display: flex;;">EM PÓ - PARA DILUIR</strong>

								<table width="100%" margin="0" padding="1" border="1" style="margin-top: 8px;" class="tabela_produtos tabela_p1">
								<thead>
								<tr>
									<th rowspan="2">Produto</th>
									<th colspan="2" class="col_azul">Quantidade (Porção)</th>
									<th rowspan="2">Volume (Porção)</th>
								</tr>
								<tr>
									<th class="col_azul">Gramas</th>
									<th class="col_azul">Medidas</th>
								</tr>
								</thead>
								<tbody>
									<?php
									// ksort($dados_ordem);
									foreach ($dados_ordem as $chave => $valores) {
										for ($i = 0; $i < count($valores); $i++) {
											$valor = $valores[$i];

											// $font_destaque = "";
											// if ($valor[1] == "Danone"){
											// 	$font_destaque = "style='font-size: 14px;'";
											// }
											?>
											<tr height="10px">
												<td rel="<?php echo $produto[0];?>" rowspan="<?php echo $_produtos_nomes[$produto[1]];?>">
													<?php echo $valor[0];?>
												</td>
												<td class="col_azul"><?php echo $valor[3];?></td>
												<td class="col_azul"><?php echo $valor[4] . " " . $valor[6];?></td>
												<td><?php echo $valor[5];?></td>
											</tr>
											<?php
										}
									}
									?>
								</tbody>
								</table>
							</p>
					<?php
						$landscape = true;
						}
					}
				}


				if (($relatorio['calculo_apres_cremoso'] == 1)) {
					// if (!$landscape){
					// 	echo "</div>";
					// }
					if ($relatorio['dieta_produto_dc'] <> ""){

						$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

						$dados_ordem = array();
						foreach ($dieta_produto_dc as &$value) {
							$produto = explode("___", $value);
							if ($produto[5] == "Cremoso"){
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
						if($dados_ordem != []){
						?>
						<p style="margin:10px 0px;">
							<strong style="justify-content: center;display: flex;">CREMOSO - PRONTO PARA CONSUMO</strong>
							<table width="100%" margin="0" padding="1" border="1" style="margin-top: 8px;" class="tabela_produtos">
							<?php
							if ($relatorio['dieta_produto_dc'] <> ""){
								?>
								<tr>
									<th width="24%" height="30px">
										Produto
									</th>
									<th width="12%" class="col_azul">
										Volume (unidade)
									</th>
								</tr>
								<?php
								// ksort($dados_ordem);
								foreach ($dados_ordem as $chave => $valores) {
									for ($i = 0; $i < count($valores); $i++) {
										$valor = $valores[$i];

										?>
										<tr height="10px">
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
					<?php
						$landscape = true;
						}
					}
				}
				?>

				<?php
				// if ($relatorio['rel_distribuidores']<>""){
				// 	if ((!$p_produtos) and (!$p_header)){
				// 		if ($landscape){
				// 			echo '<div class="page '.($relatorio['rel_logo']<>""?"logo_efeito":"").'">';	
				// 		}
				// 	}
				// }
				?>
		<?php
		}
		?>
		<?php } ?>

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
			<?php 
				if ($relatorio['rel_distribuidores']<>""){
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
										$danone = $db->select_to_array("distribuidores", "*", "WHERE principal_regiao=1  and id <> 8 AND UPPER(uf)='".strtoupper($relatorio['distribuidores'])."'", null);
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
											if($paciente['hospital'] == "HOSPITAL SANTA LUCIA SUL" || $paciente['hospital'] == "HOSPITAL SANTA LÚCIA NORTE"){
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
								<img src='imagem/qrcode-concierge-log.png' style='display:inline-block;' width='150'>
							</div>
						</div>
					</div>
				</div>
				<?php else :?>
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
												
											?>
											
										</td>
									</tr>
								</tbody>
							</table>
						</p>
					</div>
				</div>
				<?php endif;?>
			<?php
				}
			?>
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
			<p style="margin-top:10px; font-size:10px; margin-bottom:70px;">Em respeito à sua autonomia e conforme o Código de Ética, a lista acima é meramente sugestiva para sua comodidade. A aquisição dos itens prescritos é de livre escolha e pode ser realizada em qualquer estabelecimento de sua confiança.</p>
			<div style="margin-bottom:30px;">
				<div style="justify-content:center;text-align: center;display: flex;margin-top: 50px;">
					<div style="width: 250px;border-top: 1px solid;">
						<div style="margin-bottom:15px;">
							<p>Prescritor</p>
							<p style="margin:0px;">(Assinatura e Carimbo)</p>
						</div>
						<div style="margin-top:10px;margin-bottom:5px;">
							<p><?php echo $relatorio['data_criacao']; ?></p>
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
				<?php if($relatorio['rel_logo'] <> "") : ?>
				<div style="display:flex;justify-content: end;">
					<p style="color: #0092c5;font-size:9px;">powered by</p>
				</div>
				<div style="display:flex;justify-content: end;padding-bottom:10px;">
					<img src="imagem/logo.png" height="30px" alt="">
				</div>
				<?php endif; ?>
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
