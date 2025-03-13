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
$relatorio = $db->select_single_to_array("relatorios_simplificada", "*", "WHERE id=:id", array(":id"=>$url));
if (!$relatorio) Redirect(BASE_PATH);
if (($p_header) or ($p_produtos) or ($p_footer)){ if ($relatorio['codigo']==""){ die(); }}

$paciente = $db->select_single_to_array("pacientes_simplificada", "*", "WHERE id=:id_paciente", array(":id_paciente"=>$relatorio['id_paciente']));
$usuario = ['login' => 'ibranutro'];
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
				.page-2{
					padding-top: 50px !important;
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
			<p class="text-center linha titulo" style="margin-top:30px;">PRESCRIÇÃO NUTRICIONAL</p>
			

			<?php if ($relatorio['rel_identificacao']<>""){ ?>
			<p class="text-left subtitutlo">
			<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> DADOS GERAIS</p>
			<div style="display:flex;">
				<div style="width:50%;">
					<p><strong>Paciente:</strong> <?php echo ucwords($paciente['nome']);?></p>
				</div>
				<div style="width:50%;">
					<p><strong>Data de Nascimento:</strong> <?php echo sql2date($paciente['data_nascimento']);?></p>
				</div>
			</div>
			<?php } ?>

			<p class="text-left subtitutlo">
			<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> O QUE É A TERAPIA NUTRICIONAL?</p>
			<div style="display:flex;margin-top:15px;">
				<div style="width:68%;">
					<p>A terapia nutricional enteral é um método simples, seguro e eficaz que tem como objetivo a <span style="color:#0092c5;">recuperação ou manutenção da saúde e do estado nutricional.</span> É uma maneira de fornecer nutrição diretamente no estômago ou intestino, quando a alimentação oral não é possível ou suficiente.</p>
				</div>
				<div style="text-align:center;width:32%;">
					<h4 class="titulo" style="margin:0px;">SAIBA MAIS!</h4>
					<img src="imagem/qrcode_video.png" style="display:inline-block;" width="80" alt="">
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
			<?php
			/*  Tipo de prescrição  MANUAL - acredito */
			$margem_calorica_a = "-";
			$margem_calorica_b = "-";
			$margem_calorica = $relatorio["margem_calorica"];
			$margem_calorica = explode(",", $margem_calorica);
			if (count($margem_calorica)>1){
				$margem_calorica_a = $margem_calorica[0];
				$margem_calorica_a = explode(" ", $margem_calorica_a);
				$margem_calorica_a = $margem_calorica_a[0];

				$margem_calorica_b = $margem_calorica[1];
				$margem_calorica_b = explode(" ", $margem_calorica_b);
				$margem_calorica_b = $margem_calorica_b[0];
			}


			$margem_proteica_a = "-";
			$margem_proteica_b = "-";
			$margem_proteica = $relatorio["margem_proteica"];
			$margem_proteica = explode(",", $margem_proteica);
			if (count($margem_proteica)>1){
				$margem_proteica_a = $margem_proteica[0];
				$margem_proteica_a = explode(" ", $margem_proteica_a);
				$margem_proteica_a = $margem_proteica_a[0];

				$margem_proteica_b = $margem_proteica[1];
				$margem_proteica_b = explode(" ", $margem_proteica_b);
				$margem_proteica_b = $margem_proteica_b[0];
			}
			?>
			<div style="display:flex;justify-content:space-around;">
				<div><p><strong>Calorias:</strong> <?php echo $margem_calorica_a;?> a <?php echo $margem_calorica_b;?> Kcal/dia</p></div>
				<div><p><strong>Proteína:</strong> <?php echo $margem_proteica_a;?> a <?php echo $margem_proteica_b;?> g/dia</p></div>
				<div><p><strong>Água:</strong> <?php echo $relatorio["fra_volume_ml"];?> ml/dia</p></div>
			</div>
		<?php } ?>	
		<p class="text-left subtitutlo">
		<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> PRESCRIÇÃO NUTRICIONAL ESPECIALIZADA - Escolha uma das opções</p>
		<?php 
		if ((!$p_header) and (!$p_footer)){
		?>
				<?php 
				// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- SISTEMA FECHADO =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
				$landscape = false;
				$_produtos_nomes = array();
				if ($relatorio['dieta_produto_dc'] <> ""){
					$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

					// para fazer o merge no nome do produto e fabricante;
					$_produtos_nomes_usados = array();
					foreach ($dieta_produto_dc as &$value) {
						$produto = explode("___", $value);
						$produto[1] = trim($produto[1]);
						if ($produto[6] == "fechado"){
							if (isset($_produtos_nomes[ $produto[1] ])) $_produtos_nomes[ $produto[1] ] = $_produtos_nomes[ $produto[1] ] + 1;
							else $_produtos_nomes[ $produto[1] ] = 1;
						}
					}
				}
				if (($relatorio['calculo_apres_fechado'] == 1) and (count($_produtos_nomes) > 0)) {
					// if (!$landscape){
					// 	echo "</div>";
					// }
					?>				
					<p style="margin:10px 0px;">
						<strong style="justify-content: center;display: flex;font-size:11pt;">SISTEMA FECHADO</strong>
						<table width="100%" margin="0" padding="1" border="1" cellspacing="0" cellpadding="1" class="tabela_produtos">
						<?php
						if ($relatorio['dieta_produto_dc'] <> ""){
							?>
							<tr>
								<th rowspan="2" height="10px">
									Produto
								</th>
								<th rowspan="2" class="col_azul">
									Volume/Horário
								</th>
								<th colspan="2">
									Velocidade de administração
								</th>
							</tr>
							<tr>
								<th>
									Bomba de infusão
								</th>
								<th >
									Gotas/min
								</th>
							</tr>
							<?php
							$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

							$dados_ordem = array();
							foreach ($dieta_produto_dc as &$value) {
								$produto = explode("___", $value);
								if ($produto[6] == "fechado"){
									$produto_cad = $db->select_single_to_array("produtos", "*", "WHERE id=:id", array(":id"=>$produto[0]));

									if (isset($dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]]))
										$cont_dados = count( $dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]] );
									else
										$cont_dados = 0;

									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[1];
									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto_cad['fabricante'];
									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[3];
									
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
									$produto[1] = trim($valor[0]);
									?>
									<tr>
										<?php 
										if (isset($_produtos_nomes[$produto[1]]) and ($_produtos_nomes[$produto[1]] > 1) and (!isset($_produtos_nomes_usados[$produto[1]]))){
											$_produtos_nomes_usados[$produto[1]] = true;
											?>
											<td width="24%" height="10px" rowspan="<?php echo $_produtos_nomes[$produto[1]];?>">
												<?php echo $valor[0];?>
											</td>
											<?php
										}
										else if (!isset($_produtos_nomes_usados[$produto[1]])){
											$_produtos_nomes_usados[$produto[1]] = true;
											?>
											<td width="24%" height="10px">
												<?php echo $valor[0];?>
											</td>
											<?php
										}
										?>
										<td width="12%" class="col_azul">
											<?php echo $valor[2];?>
										</td>
										<td width="12%">
											<?php echo $valor[3];?>
										</td>
										<td width="12%">
											<?php echo $valor[4];?>
										</td>
									</tr>
									<?php
								}
							}
						}
						?>
						</table>
						<span class="modo_uso">
							<?php							
							if ($relatorio['fra_hidrahorario'] <> ""){
								$_horarios = json_decode($relatorio['fra_hidrahorario'], true);
								foreach ($_horarios as $chave => $valor) {
									$horarios[] = $valor;
								}
								$_horarios = "";
								for ($i = 0; $i < count($horarios); $i++) {
									if ($i == 0) $_horarios .= " às ";
									else{
										if (($i+1) == count($horarios))
											$_horarios .= " e ";
										else
											$_horarios .= ", ";
									}
									$_horarios .= $horarios[$i]."h ";
								}
								$horarios = $_horarios;
							}
							?>
							<strong>Modo de Uso:</strong> Instalar dieta às <?php echo $relatorio['fra_h_i_dieta'];?>. Após o término da primeira dieta, instalar a próxima (caso haja mais de uma dieta). Correr a dieta em <?php echo $relatorio['fra_h_inf_dieta'];?> h. Com oferta de água extra de <?php echo $relatorio['fra_volume_horario'];?> ml por horário, <?php echo $horarios;?>.
							<?php 
							if (trim($relatorio['fra_info_complementares']) <> ""){
								echo $relatorio['fra_info_complementares'];
							}
							?>
						</span>
					</p>
					<?php
					$landscape = true;
				}
				?>





				<?php
				// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- SISTEMA ABERTO LIQUIDO =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
				$_produtos_nomes = array();
				if ($relatorio['dieta_produto_dc'] <> ""){				
					$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

					// para fazer o merge no nome do produto e fabricante;
					$_produtos_nomes_usados = array();
					foreach ($dieta_produto_dc as &$value) {
						$produto = explode("___", $value);
						$produto[1] = trim($produto[1]);
						if ($produto[6] == "aberto_liquido"){
							if (isset($_produtos_nomes[ $produto[1] ])) $_produtos_nomes[ $produto[1] ] = $_produtos_nomes[ $produto[1] ] + 1;
							else $_produtos_nomes[ $produto[1] ] = 1;
						}
					}
				}
				if ( ($relatorio['calculo_apres_aberto_liquido'] == 1) and (count($_produtos_nomes) > 0)){
					// if (!$landscape){
					// 	echo "</div>";
					// }
					?>				
					<p style="margin:10px 0px;">
						<strong style="justify-content: center;display: flex;font-size:11pt;">SISTEMA ABERTO (LÍQUIDO)</strong>
						<table width="100%" margin="0" padding="1" border="1" cellspacing="0" cellpadding="1" class="tabela_produtos">
						<?php
						if ($relatorio['dieta_produto_dc'] <> ""){
							?>
							<tr>
								<th rowspan="2" height="30px">
									Produto
								</th>
								<th rowspan="2" class="col_azul">
									Volume/Horário
								</th>
								<th colspan="2">
									Velocidade de administração
								</th>
							</tr>
							<tr>
								<th>
									Bomba de infusão
								</th>
								<th >
									Gotas/min
								</th>
							</tr>
							<?php
							$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

							$dados_ordem = array();
							foreach ($dieta_produto_dc as &$value) {
								$produto = explode("___", $value);
								if ($produto[6] == "aberto_liquido"){
									$produto[1] = trim($produto[1]);

									$produto_cad = $db->select_single_to_array("produtos", "*", "WHERE id=:id", array(":id"=>$produto[0]));

									if (isset($dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]]))
										$cont_dados = count( $dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]] );
									else
										$cont_dados = 0;

									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[1];
									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto_cad['fabricante'];									
									
									$volume_dia = chkfloat($produto[3]);
									$volume_horario = ($volume_dia / $relatorio['fra_fracionamento_dia']);
									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = round_up($volume_horario)." ml";
									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[3];	

									$volume_final = round_up($volume_horario);
									$qtd_horas = hoursToMinutes($relatorio['fra_qtas_horas']);
									$velocidade = ($volume_final / ($qtd_horas/60));
									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = round_up($velocidade)." ml/hora";
											
									$volume_final = round_up($volume_horario);
									$qtd_horas = hoursToMinutes($relatorio['fra_qtas_horas']);
									$gotejamento = (($volume_final*20) / ($qtd_horas));
									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = round_up($gotejamento);

									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[7]." kcal";
									$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = numberFormatPrecision($produto[8], 2)." g";

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
									$produto[1] = trim($valor[0]);
									?>
									<tr>
										<?php 
										if (isset($_produtos_nomes[$produto[1]]) and ($_produtos_nomes[$produto[1]] > 1) and (!isset($_produtos_nomes_usados[$produto[1]]))){
											$_produtos_nomes_usados[$produto[1]] = true;
											?>
											<td height="30px" rowspan="<?php echo $_produtos_nomes[$produto[1]];?>" >
												<?php echo $valor[0];?>
											</td>
											
											<?php
											/*
											*/
										}
										else if (!isset($_produtos_nomes_usados[$produto[1]])){
											$_produtos_nomes_usados[$produto[1]] = true;
											?>
											<td >
												<?php echo $valor[0];?>
											</td>											
											<?php
										}
										?>
										<td  class="col_azul">
											<?php echo $valor[2];?>
										</td>
										<td >
											<?php echo $valor[4];?>
										</td>
										<td>
											<?php echo $valor[5];?>
										</td>
									</tr>
									<?php
								}
							}
						}
						?>
						</table>

						<span class="modo_uso">
							<?php
							$horarios = "";
							if ($relatorio['fra_dieta_horario'] <> ""){
								$_horarios = json_decode($relatorio['fra_dieta_horario'], true);
								$horarios = array();
								foreach ($_horarios as $chave => $valor) {
									$horarios[] = $valor;
								}
								$_horarios = "";
								for ($i = 0; $i < count($horarios); $i++) {
									if ($i == 0) $_horarios .= " às ";
									else{
										if (($i+1) == count($horarios))
											$_horarios .= " e ";
										else
											$_horarios .= ", ";
									}
									$_horarios .= $horarios[$i];
								}
								$horarios = $_horarios;
							}

							$horarios_hidra = "";
							if ($relatorio['fra_hidrahorario'] <> ""){
								$_horarios = json_decode($relatorio['fra_hidrahorario'], true);
								$horarios_hidra = array();
								foreach ($_horarios as $chave => $valor) {
									$horarios_hidra[] = $valor;
								}
								$_horarios = "";
								for ($i = 0; $i < count($horarios_hidra); $i++) {
									if ($i == 0) $_horarios .= " às ";
									else{
										if (($i+1) == count($horarios_hidra))
											$_horarios .= " e ";
										else
											$_horarios .= ", ";
									}
									$_horarios .= $horarios_hidra[$i];
								}
								$horarios_hidra = $_horarios;
							}
							?>
							<strong>Modo de Uso:</strong> Fracionar a dieta de acordo com o volume por horário. Instalar a dieta <?php echo $relatorio['fra_fracionamento_dia'];?> vezes ao dia, <?php echo $horarios;?>. Correr cada dieta em <?php echo $relatorio['fra_qtas_horas'];?> horas com oferta de água extra de <?php echo $relatorio['fra_volume_horario'];?> ml por horário, <?php echo $horarios_hidra;?>.
							<?php 
							if (trim($relatorio['fra_info_complementares']) <> ""){
								echo $relatorio['fra_info_complementares'];
							}
							?>
						</span>
					</p>
					<?php
					$landscape = true;
				}
				?>





				<?php
				// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- SISTEMA ABERTO PO =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
				$_produtos_nomes = array();
				if ($relatorio['dieta_produto_dc'] <> ""){
					$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

					// para fazer o merge no nome do produto e fabricante;
					$_produtos_nomes_usados = array();
					foreach ($dieta_produto_dc as &$value) {
						$produto = explode("___", $value);
						$produto[1] = trim($produto[1]);
						if ($produto[6] == "aberto_po"){
							if (isset($_produtos_nomes[ $produto[1] ])){
								$_produtos_nomes[ $produto[1] ] = $_produtos_nomes[ $produto[1] ] + 1;
							}
							else{	
								$_produtos_nomes[ $produto[1] ] = 1;
							}
						}
					}
				}

				if (($relatorio['calculo_apres_aberto_po'] == 1) and (count($_produtos_nomes) > 0)) {
					// if (!$landscape){
					// 	echo "</div>";
					// }
					?>
					<p style="margin:10px 0px;">
						<strong style="justify-content: center;display: flex;font-size:11pt;">SISTEMA ABERTO (PÓ)</strong>

						<table width="100%" margin="0" padding="1" border="1" cellspacing="0" cellpadding="1" class="tabela_produtos tabela_p1">
						<thead>
							<tr>
								<th rowspan="2">Produto</th>
								<th colspan="3" class="col_azul">Quantidade/Horário</th>
								<th colspan="2">
									Velocidade de administração
								</th>
							</tr>
							<tr>
								<th class="col_azul">Gramas</th>
								<th class="col_azul">Medida</th>
								<th class="col_azul">Volume</th>
								<th>
									Bomba de infusão
								</th>
								<th >
									Gotas/min
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($relatorio['dieta_produto_dc'] <> ""){
								$dieta_produto_dc = json_decode($relatorio['dieta_produto_dc'], true);

								$dados_ordem = array();
								foreach ($dieta_produto_dc as &$value) {
									$produto = explode("___", $value);
									if ($produto[6] == "aberto_po"){
										$produto[1] = trim($produto[1]);

										$produto_cad = $db->select_single_to_array("produtos", "*", "WHERE id=:id", array(":id"=>$produto[0]));

										// volume horario e volume dia
										$volume_dia = chkfloat($produto[3]);
										$volume_horario = ($volume_dia / $relatorio['fra_fracionamento_dia']);
										// =-=-=-=-=-=-=-=-=-=-=-=-=-=-

										$medida = ((chkstring2float($produto[9]) * chkstring2float($produto[4])) / chkfloat($produto[10]));
										$medida = round($medida * 2) / 2; // 0.5 arrendodar

										$grama = chkstring2float($produto[11]);
										$grama = (($grama * $medida) / chkstring2float($produto[9]));

										if (isset($dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]]))
											$cont_dados = count( $dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]] );
										else
											$cont_dados = 0;

										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[1];
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto_cad['fabricante'];
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $produto[2];
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = numberFormatPrecision($grama, 1);
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = $medida;
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = chkstring2float($produto[4]);

										$dias_grama = ($grama * $relatorio['fra_fracionamento_dia']);
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = numberFormatPrecision($dias_grama, 1);
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = ($medida * $relatorio['fra_fracionamento_dia']);
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = chkstring2float($produto[3]);
										
										$volume_final = round_up($volume_horario);
										$qtd_horas = hoursToMinutes($relatorio['fra_qtas_horas']);
										$velocidade = ($volume_final / ($qtd_horas/60));
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = round_up($velocidade)." ml/hora";
												
										$volume_final = round_up($volume_horario);
										$qtd_horas = hoursToMinutes($relatorio['fra_qtas_horas']); 
										$gotejamento = (($volume_final*20) / ($qtd_horas));
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = round_up($gotejamento);
												
										$kcal_dia = ($dias_grama * $produto[12]) / 100;
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = numberFormatPrecision($kcal_dia, 0)." kcal";
												
										$ptn_dia = ($dias_grama * $produto[13]) / 100;
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = numberFormatPrecision($ptn_dia, 1)." g";

										$fibras_dia = ($dias_grama * $produto[14]) / 100;
										$dados_ordem[$produto_cad['fabricante']."___".$produto[1]."___".$produto[0]][ $cont_dados ][] = numberFormatPrecision($fibras_dia, 1)." g";
									} 
								}

								ksort($dados_ordem);
								foreach ($dados_ordem as $chave => $valores) {
									for ($i = 0; $i < count($valores); $i++) {
										$valor = $valores[$i];

										$produto[1] = trim($valor[0]);
										?>
										<tr >
											<?php 
											if (isset($_produtos_nomes[ $produto[1] ]) and ($_produtos_nomes[ $produto[1] ] > 1) and (!isset($_produtos_nomes_usados[ $produto[1] ]))){
												$_produtos_nomes_usados[ $produto[1] ] = true;
												?>
												<td rel="<?php echo $produto[0];?>" rowspan="<?php echo $_produtos_nomes[$produto[1]];?>" >
													<?php echo $valor[0];?>
												</td>
												<?php
											}
											else if (!isset($_produtos_nomes_usados[ $produto[1] ])){
												$_produtos_nomes_usados[ ($produto[1]) ] = true;
												?>
												<td >
													<?php echo $valor[0];?>
												</td>
												<?php
											}
											?>
											<td class="col_azul"><?php echo $valor[3];?></td>
											<td class="col_azul"><?php echo $valor[4];?></td>
											<td class="col_azul"><?php echo $valor[5];?></td>
											<td><?php echo $valor[9];?></td>
											<td><?php echo $valor[10];?></td>
										</tr>
										<?php
									}
								}
							}
							?>
						</tbody>
						</table>

						<span class="modo_uso">
							<?php
							$horarios = "";
							if ($relatorio['fra_dieta_horario'] <> ""){
								$_horarios = json_decode($relatorio['fra_dieta_horario'], true);
								$horarios = array();
								foreach ($_horarios as $chave => $valor) {
									$horarios[] = $valor;
								}
								$_horarios = "";
								for ($i = 0; $i < count($horarios); $i++) {
									if ($i == 0) $_horarios .= " às ";
									else{
										if (($i+1) == count($horarios))
											$_horarios .= " e ";
										else
											$_horarios .= ", ";
									}
									$_horarios .= $horarios[$i];
								}
								$horarios = $_horarios;
							}

							$horarios_hidra = "";
							if ($relatorio['fra_hidrahorario'] <> ""){
								$_horarios = json_decode($relatorio['fra_hidrahorario'], true);
								$horarios_hidra = array();
								foreach ($_horarios as $chave => $valor) {
									$horarios_hidra[] = $valor;
								}
								$_horarios = "";
								for ($i = 0; $i < count($horarios_hidra); $i++) {
									if ($i == 0) $_horarios .= " às ";
									else{
										if (($i+1) == count($horarios_hidra))
											$_horarios .= " e ";
										else
											$_horarios .= ", ";
									}
									$_horarios .= $horarios_hidra[$i];
								}
								$horarios_hidra = $_horarios;
							}
							?>
							<strong>Modo de Uso:</strong> Diluir a quantidade por horário (gramas ou medida) em metade do volume e, após misturar bem, completar com água até chegar ao volume total por horário. Instalar dieta <?php echo $relatorio['fra_fracionamento_dia'];?> vezes ao dia, <?php echo $horarios;?>. Correr cada dieta em <?php echo $relatorio['fra_qtas_horas'];?> horas com oferta de água extra de <?php echo $relatorio['fra_volume_horario'];?> ml por horário, <?php echo $horarios_hidra;?>.
							<?php 
							if (trim($relatorio['fra_info_complementares']) <> ""){
								echo $relatorio['fra_info_complementares'];
							}
							?>
						</span>
					</p>
					<?php 
					$landscape = true;
				}
				?>
		<?php
		}
		?>

		<p class="text-left subtitutlo">
		<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> ONDE ENCONTRAR</p>
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
														<img src='imagem/qrcode-concierge.png' style='display:inline-block;margin-left:10px;' width='60' alt=''>
													</div>
												</div>";
								
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
											echo '<div style="width:20%;margin:10px;">
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
										echo '<div style="width:20%;margin:10px;">
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
		<div style="margin-bottom:30px;">
			<div style="justify-content:center;text-align: center;display: flex;margin-top: 50px;">
				<div style="width: 250px;border-top: 1px solid;">
					<div style="margin-bottom:15px;">
						<p>Nutricionista</p>
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
		if ( ((!$p_produtos) and (!$p_header)) or ($p_footer)) {
		?>	
		</div>
		<div class="page <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>" style="position:relative;">
		<?php if($usuario['login'] == 'ibranutro') : ?>
			<img class="background" style="position:absolute;left:2cm;width:140px;" src="imagem/logo_ibranutro.png" alt="">
			<?php else: ?>
			<img class="background" style="position:absolute;left:2cm;width:150px;" src="imagem/logo.png" alt="">
			<img class="background" style="position:absolute;bottom:1cm;right:2px;" src="imagem/efeito.png" alt="">
			<?php endif; ?>
			<p class="text-left subtitutlo page-2" style="margin-top:60px;">
			<?php if($usuario['login'] != 'ibranutro') : ?><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /><?php endif; ?> ORIENTAÇÕES DE PREPARO / MANIPULAÇÃO</p>
			
			<?php 
			if ($relatorio['calculo_apres_fechado'] == 1){
				?>
				<p style="text-align: center;">
				<strong style="justify-content: center;display: flex;">SISTEMA FECHADO</strong>
				</p>
				<?php
				$config = $db->select_single_to_array("config", "*", "WHERE tipo='fechado'", null);
				$relatorio['higienizacao'] = $config['higienizacao'];
				$relatorio['cuidados'] = $config['cuidados'];
				$relatorio['preparo'] = $config['preparo'];
				?>
				<p><strong>Higienização para Manipulação</strong></p>
				<p><?php echo nl2br($relatorio['higienizacao']);?></p>


				<p><strong>Cuidados na Administração e Armazenamento</strong></p>
				<p><?php echo nl2br($relatorio['cuidados']);?></p>


				<p><strong>Preparo e Instalação da Dieta</strong></p>
				<p><?php echo nl2br($relatorio['preparo']);?></p>
				<?php
			}
			?>

			<?php 
			if ($relatorio['calculo_apres_aberto_liquido'] == 1){
				?>
				<p style="text-align: center;">
				<strong>SISTEMA ABERTO (LÍQUIDO)</strong>
				</p>
				<?php
				$config = $db->select_single_to_array("config", "*", "WHERE tipo='aberto'", null);
				$relatorio['higienizacao'] = $config['higienizacao'];
				$relatorio['cuidados'] = $config['cuidados'];
				$relatorio['preparo'] = $config['preparo'];
				?>
				<p><strong>Higienização para Manipulação</strong></p>
				<p><?php echo nl2br($relatorio['higienizacao']);?></p>


				<p><strong>Cuidados na Administração e Armazenamento</strong></p>
				<p><?php echo nl2br($relatorio['cuidados']);?></p>


				<p><strong>Preparo e Instalação da Dieta</strong></p>
				<p><?php echo nl2br($relatorio['preparo']);?></p>
				<?php
			}
			?>

			<?php 
			if ($relatorio['calculo_apres_aberto_po'] == 1){
				?>
				<p style="text-align: center;">
				<strong>SISTEMA ABERTO (PÓ)</strong>
				</p>
				<?php
				$config = $db->select_single_to_array("config", "*", "WHERE tipo='aberto_po'", null);
				$relatorio['higienizacao'] = $config['higienizacao'];
				$relatorio['cuidados'] = $config['cuidados'];
				$relatorio['preparo'] = $config['preparo'];
				?>
				<p><strong>Higienização para Manipulação</strong></p>
				<p><?php echo nl2br($relatorio['higienizacao']);?></p>


				<p><strong>Cuidados na Administração e Armazenamento</strong></p>
				<p><?php echo nl2br($relatorio['cuidados']);?></p>


				<p><strong>Preparo e Instalação da Dieta</strong></p>
				<p><?php echo nl2br($relatorio['preparo']);?></p>
				<?php
			}
			?>
			
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

		</div>
		<?php
		}
		?>
	</body>
</html>
