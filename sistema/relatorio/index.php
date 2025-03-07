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
$relatorio = $db->select_single_to_array("relatorios", "*", "WHERE id=:id", array(":id"=>$url));
if (!$relatorio) Redirect(BASE_PATH);
if (($p_header) or ($p_produtos) or ($p_footer)){ if ($relatorio['codigo']==""){ die(); }}

$paciente = $db->select_single_to_array("pacientes", "*", "WHERE id=:id_paciente", array(":id_paciente"=>$relatorio['id_paciente']));

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
			
			<p class="text-center linha titulo">RELATÓRIO NUTRICIONAL DE ALTA</p>
			

			<?php if ($relatorio['rel_identificacao']<>""){ ?>
			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> IDENTIFICAÇÃO DO PACIENTE</p>
			<p><strong>Paciente:</strong> <?php echo ucwords($paciente['nome']);?></p>
			<?php if ($paciente['mae_possui']==0) { echo "<p><strong>Nome da Mãe:</strong> ".ucwords($paciente['mae'])."</p>"; } ?>
			<p><strong>Data de Nascimento:</strong> <?php echo sql2date($paciente['data_nascimento']);?></p>
			<?php } ?> 



			<?php if (trim($relatorio['historia'])<>""){ ?>
			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> HISTÓRIA CLÍNICA</p>
			<p><?php echo nl2br($relatorio['historia']);?></p>
			<?php } ?>



			<?php if ($relatorio['rel_avaliacao']<>""){ ?>
				<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> AVALIAÇÃO NUTRICIONAL</p>
				<p><strong>Data de realização da avaliação:</strong> <?php echo sql2date($relatorio['data']);?></p>
				<?php 
				$array_pesos = array();
				$array_imcs = array();
				if ($relatorio['peso']<>""){
					$pesos = json_decode($relatorio['peso'], true);
					$pesos_valor = json_decode($relatorio['peso_valor'], true);
					$imc = json_decode($relatorio['imc'], true);
					$i = 0;
					foreach ($pesos as $chave => $valores) {
						if (!isset($pesos_valor[$i])) $pesos_valor[$i] = "";
						if (!isset($imc[$i])) $imc[$i] = "";
						if (isset($pesos[$chave])){
							$array_pesos[] = "<strong>".$pesos[$chave].":</strong> ".$pesos_valor[$i]." kg";
							$array_imcs[] = "<strong>IMC (kg/m²):</strong> ".$imc[$i];
						}
						$i = $i+1;
					}
				}
				?>
				<table width="100%" margin="0" padding="0" border="0" cellspacing="0" cellpadding="0" style="margin-top: 0.5cm;">
				<?php 
				if ($array_pesos){
					for ($i = 0; $i < count($array_pesos); $i++){
					?>
					<tr>
						<td width="40%" height="30px">
							<?php 
							if ($i == 0){
							?>
								<p><strong><?php if ($relatorio['altura']<>""){ echo $relatorio['altura']; }else{ echo "Altura";}?>:</strong> <?php if ($relatorio['altura']<>""){ echo $relatorio['altura_valor']." m";}?></p>
							<?php 
							}
							?>
						</td>
						<td width="30%">
							<p>
								<?php echo $array_pesos[$i];?> 
							</p>
						</td>
						<td width="30%">
							<p>
								<?php echo $array_imcs[$i];?>
							</p>
						</td>
					</tr>
					<?php 
					}
				}
				?>
				</table>


				<?php 
				if ($relatorio['circunferencias']<>""){
					$circunferencias = json_decode($relatorio['circunferencias'], true);
					$circunferencias_valor = json_decode($relatorio['circunferencias_valor'], true);
					$circunferencia_lado = json_decode($relatorio['circunferencia_lado'], true);
					?>
					<table width="100%" margin="0" padding="0" border="0" cellspacing="0" cellpadding="0" style="margin-top: 0.5cm;">
					<?php 
					if ($circunferencias){
						$i = 0;

						foreach ($circunferencias as $chave => $valores) {	
							if ($valores <> ""){
								?>
								<tr>
									<td width="40%" height="30px">
										<p><strong><?php if (isset($circunferencias[$chave])) echo $circunferencias[$chave];?></strong> </p>								
									</td>
									<td width="60%">
										<p>
											<?php if (isset($circunferencias_valor[$i])) echo $circunferencias_valor[$i]." cm";?>
											<?php if (isset($circunferencia_lado[$chave])) echo "&nbsp;&nbsp;&nbsp;".$circunferencia_lado[$chave];?>
										</p>
									</td>
								</tr>
								<?php 
								$i = $i+1;
							}
						}
					}
					?>
					</table>
					<?php
				}
				?>	


				<?php 
				if ($relatorio['dobras']<>""){
					$dobras = json_decode($relatorio['dobras'], true);
					$dobras_valor = json_decode($relatorio['dobras_valor'], true);
					$dobras_lado = json_decode($relatorio['dobras_lado'], true);
					?>
					<table width="100%" margin="0" padding="0" border="0" cellspacing="0" cellpadding="0" style="margin-top: 0.5cm;">
					<?php 
					if ($dobras){
						$i = 0;
						foreach ($dobras as $chave => $valores) {		
							if ($valores <> ""){				
								?>
								<tr>
									<td width="40%" height="30px">
										<p><strong><?php if (isset($dobras[$chave])) echo $dobras[$chave];?></strong> </p>								
									</td>
									<td width="60%">
										<p>
											<?php if (isset($dobras_valor[$i])) echo $dobras_valor[$i]." cm";?>
											<?php if (isset($dobras_lado[$chave])) echo "&nbsp;&nbsp;&nbsp;".$dobras_lado[$chave];?>
										</p>
									</td>
								</tr>
								<?php 
								$i = $i+1;
							}
						}
					}
					?>
					</table>
					<?php
				}
				?>		
				<br>
				<?php if (strlen($relatorio['triagem_nutricional'])>3){ ?>
				<p><strong>Triagem Nutricional:</strong> <?php echo $relatorio['triagem_nutricional'];?></p>
				<?php } ?>
				<?php if (strlen($relatorio['diagnostico_nutricional'])>3){ ?>
				<p><strong>Diagnóstico Nutricional:</strong> <?php echo $relatorio['diagnostico_nutricional'];?></p>
				<?php } ?>
				<?php if (strlen($relatorio['exames_nutricionais_complementares'])>3){ ?>
				<p><strong>Exames Nutricionais Complementares:</strong> <?php echo $relatorio['exames_nutricionais_complementares'];?></p>
				<?php } ?>
				<?php if (strlen($relatorio['exame_fisico'])>3){ ?>
				<p><strong>Exame Físico:</strong> <?php echo $relatorio['exame_fisico'];?></p>
				<?php } ?>
				<?php if (strlen($relatorio['exame_bioquimico'])>3){ ?>
				<p><strong>Exames Bioquímicos:</strong> <?php echo $relatorio['exame_bioquimico'];?></p>
				<?php } ?>
				<?php if (strlen($relatorio['observacao'])>3){ ?>
				<p><strong>Observação:</strong> <?php echo $relatorio['observacao'];?></p>
				<?php } ?>
			<?php } ?>



			<?php if ($relatorio['rel_necessidades']<>""){ ?>
			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> NECESSIDADES NUTRICIONAIS</p>
			<p><strong>KCAL TOTAL:</strong> <?php echo $relatorio['nec_calorias_total'];?></p>
			<p><strong>PTN:</strong> <?php echo $relatorio['nec_proteinas_total'];?></p>
			<p><strong>Água:</strong> <?php echo $relatorio['nec_agua_total'];?></p>
			<?php } ?>

			<?php if ($relatorio['rel_prescricao']<>""){ ?>
				<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> INDICAÇÃO DE PRODUTOS - Escolha uma das opções</p>
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
										Velocidade de adminstração
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
										Velocidade de adminstração
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
										Velocidade de adminstração
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

			<?php } ?>

			<?php if ((trim($relatorio['rel_observacoes'])<>"") and (strlen($relatorio['rel_observacoes']) > 3)){ ?>
			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> OBSERVAÇÕES</p>
			<p><?php echo $relatorio['observacoes'];?></p>
			<?php } ?>

			<?php
			}
			?>




		<?php 
		if (((!$p_produtos) and (!$p_footer)) or ($p_header)){
		?>
			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> CONDUTA</p>
			<p>
			- Prescrevo terapia nutricional via <?php echo $relatorio['tipo_produto'];?>
			<?php 
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
			if ($relatorio['tipo_produto']=="Enteral"){ 
			?>
				, dispositivo via <?php echo $relatorio['dispositivo'];?>, 
			<?php } ?>

			<?php 
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
			if ($relatorio['tipo_produto']=="Oral"){ 
			?>
				fracionada em <?php echo $relatorio['fra_hidratacao_dia']; if ($relatorio['fra_hidratacao_dia']>1) echo " vezes"; else echo  " vez";?> 
				às 
				<?php 
				$hidrahorario = json_decode($relatorio['fra_hidrahorario'], true);
				if ($hidrahorario){
					$cont = 0;
					foreach ($hidrahorario as &$value) {
						if ($cont > 0) echo ", ";
						echo $value;
						$cont = $cont+1;
					}
				}
				?>
				, com volume total de <?php echo $relatorio['fra_volume_horario']." ml";?>

				perfazendo um total de: <?php echo ($relatorio['fra_hidratacao_dia']*$relatorio['fra_volume_horario'])." ml por dia.";?>
			<?php } ?>	

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
			<span>fornecendo de <?php echo $margem_calorica_a;?> a <?php echo $margem_calorica_b;?> calorias/dia, <?php echo $margem_proteica_a;?> a <?php echo $margem_proteica_b;?> gramas de proteína/dia, conforme sugestões de produtos abaixo.</span></p>
			<p>- Água livre <?php echo $relatorio["fra_volume_ml"];?> ml/dia;</p>
		<?php } ?>	


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

			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> ORIENTAÇÕES DE PREPARO / MANIPULAÇÃO</p>
			
			<?php 
			if ($relatorio['calculo_apres_fechado'] == 1){
				?>
				<p style="text-align: center;">
				<strong>SISTEMA FECHADO</strong>
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


			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> CONTATOS DO PRESCRITOR</p>
			<p>
				<?php 
				$prescritor = $db->select_single_to_array("prescritores", "*", "WHERE id=".$relatorio['id_prescritor'], null);
				if ($prescritor){
					echo '<p style="text-align: left;">';
						if ($prescritor['profissional'] == "Nutricionista"){
							echo '<strong>'.$prescritor['nome']."</strong><br>";
							if (($prescritor['regiao_crn']<>"") and ($prescritor['numero_crn'])) echo $prescritor['regiao_crn']." - ".$prescritor['numero_crn'];
						}else{
							echo '<strong>'.$prescritor['nome']."</strong><br>";
							if (($prescritor['regiao_crn']<>"") and ($prescritor['numero_crn']))  echo $prescritor['regiao_crm']." - ".$prescritor['numero_crm'];
						}
						

						if (trim($prescritor['cidade']) <> "") echo "<br>".$prescritor['cidade']." ".$prescritor['uf'];
						
						if ($prescritor['telefone'] <> ""){
							$telefone = json_decode($prescritor['telefone'], true);
							$telefone_disp = json_decode($prescritor['telefone_disp'], true);
							$telefone_t = false;
							foreach ($telefone as $k => $v) {
								if (isset($telefone_disp[$k])){
									if ($telefone_disp[$k] == "0"){
										if (!$telefone_t){
											echo '<br><strong>Telefone:</strong><br>';
											$telefone_t = true;
										}
										echo $v."<br>";
									}
								}
							}
						}

						if ($prescritor["email_disp"] == "0"){
							echo '<strong>E-mail:</strong><br>';
							echo $prescritor["email"]."<br>";
						}

					echo '</p>';
				}
				?>
			</p>

			<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> PONTOS DE VENDA</p>
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
													<h5 style='color:#45cfb3;margin:0px;margin-top:8px;'>FACILITE SUA COMPRA!</h5>
													<h5 style='color:#45cfb3;margin:0px;'>RECEBA ATENDIMENTO PERSONALIZADO</h5>
													<h5 style='color:#45cfb3;margin:0px;'>APONTANDO A CÂMERA PARA O QR CODE:</h5>
												</div>
												<div>
													<img src='imagem/qrcode-sistema.png' style='display:inline-block;margin-left:10px;' width='60' alt=''>
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

			<?php if ($relatorio['rel_calculo']<>""){ ?>

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
					if (!$landscape){
						echo "</div>";
					}
					?>				
					<div class="page_land <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>" style="page-break-before: always;">
						<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> INFORMAÇÕES NUTRICIONAIS COMPLEMENTARES</p>

						<p style="padding-top: 30px;">
							<strong>SISTEMA FECHADO</strong>
							<table width="100%" margin="0" padding="1" border="1" cellspacing="0" cellpadding="1" class="tabela_produtos">
							<?php
							if ($relatorio['dieta_produto_dc'] <> ""){
								?>
								<tr>
									<th width="24%" height="30px">
										Produto
									</th>
									<th width="10%">
										Fabricante
									</th>
									<th width="12%" class="col_azul">
										Volume/Dia
									</th>
									<th width="12%">
										Velocidade<br>
										(bomba de infusão)
									</th>
									<th width="12%">
										Gotejamento<br>
										(gotas por minuto)
									</th>
									<th width="10%">
										Calorias/dia
									</th>
									<th width="10%">
										Proteína/dia
									</th>
									<th width="10%">
										Fibra/dia
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

										$font_destaque = "";
										if ($valor[1] == "Danone"){
											$font_destaque = "style='font-size: 14px;'";
										}
										?>
										<tr>
											<?php 
											if (isset($_produtos_nomes[$produto[1]]) and ($_produtos_nomes[$produto[1]] > 1) and (!isset($_produtos_nomes_usados[$produto[1]]))){
												$_produtos_nomes_usados[$produto[1]] = true;
												?>
												<td width="24%" height="30px" rowspan="<?php echo $_produtos_nomes[$produto[1]];?>" <?php echo $font_destaque;?>>
													<?php echo $valor[0];?>
												</td>
												<td width="10%" rowspan="<?php echo $_produtos_nomes[$produto[1]];?>">
													<?php echo $valor[1];?>
												</td>
												<?php
											}
											elseif (!isset($_produtos_nomes_usados[$produto[1]])){
												$_produtos_nomes_usados[$produto[1]] = true;
												?>
												<td width="24%" height="30px" <?php echo $font_destaque;?>>
													<?php echo $valor[0];?>
												</td>
												<td width="10%">
													<?php echo $valor[1];?>
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
											<td width="12%">
												<?php echo $valor[5];?>									
											</td>
											<td width="12%">
												<?php echo $valor[6];?>
											</td>
											<td width="12%">
												<?php echo $valor[7];?>
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
					if (!$landscape){
						echo "</div>";
					}
					?>				
					<div class="page_land <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>"  style="page-break-before: always;">
						<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> SUGESTÃO DE PRODUTOS</p>
					
						<p style="padding-top: 30px;">
							<strong>SISTEMA ABERTO (LÍQUIDO)</strong>
							<table width="100%" margin="0" padding="1" border="1" cellspacing="0" cellpadding="1" style="margin-top: 0.5cm;" class="tabela_produtos">
							<?php
							if ($relatorio['dieta_produto_dc'] <> ""){
								?>
								<tr>
									<th width="18%" height="30px">
										Produto
									</th>
									<th width="14%">
										Fabricante
									</th>
									<th width="8%" class="col_azul">
										Volume/Horário
									</th>
									<th width="8%">
										Volume/Dia
									</th>
									<th width="14%">
										Velocidade<br>
										(bomba de infusão)
									</th>
									<th width="10%">
										Gotejamento<br>
										(gotas por minuto)
									</th>
									<th width="8%">
										Calorias/dia
									</th>
									<th width="8%">
										Proteína/dia
									</th>
									<th width="8%">
										Fibra/dia
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

										$font_destaque = "";
										if ($valor[1] == "Danone"){
											$font_destaque = "style='font-size: 14px;'";
										}
										?>
										<tr>
											<?php 
											if (isset($_produtos_nomes[$produto[1]]) and ($_produtos_nomes[$produto[1]] > 1) and (!isset($_produtos_nomes_usados[$produto[1]]))){
												$_produtos_nomes_usados[$produto[1]] = true;
												?>
												<td height="30px" rowspan="<?php echo $_produtos_nomes[$produto[1]];?>" <?php echo $font_destaque;?>>
													<?php echo $valor[0];?>
												</td>
												<td rowspan="<?php echo $_produtos_nomes[$produto[1]];?>">
													<?php echo $valor[1];?>
												</td>
												
												<?php
												/*
												*/
											}
											else if (!isset($_produtos_nomes_usados[$produto[1]])){
												$_produtos_nomes_usados[$produto[1]] = true;
												?>
												<td <?php echo $font_destaque;?>>
													<?php echo $valor[0];?>
												</td>
												<td>
													<?php echo $valor[1];?>
												</td>											
												<?php
											}
											?>
											<td  class="col_azul">
												<?php echo $valor[2];?>
											</td>
											<td>
												<?php echo $valor[3];?>
											</td>
											<td >
												<?php echo $valor[4];?>
											</td>
											<td>
												<?php echo $valor[5];?>
											</td>
											<td>
												<?php echo $valor[6];?>
											</td>
											<td>
												<?php echo $valor[7];?>
											</td>
											<td>
												<?php echo $valor[8];?>
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
					if (!$landscape){
						echo "</div>";
					}
					?>
					<div class="page_land <?php if ($relatorio['rel_logo']<>"") echo "logo_efeito";?>" style="page-break-before: always;">
						<p class="text-left subtitutlo"><img src="imagem/simbolo.png" width="18px" border="0" style="vertical-align:bottom; margin-right: 5px;" /> SUGESTÃO DE PRODUTOS</p>

						<p style="padding-top: 30px;">
							<strong>SISTEMA ABERTO (PÓ)</strong>

							<table width="100%" margin="0" padding="1" border="1" cellspacing="0" cellpadding="1" style="margin-top: 0.5cm;" class="tabela_produtos tabela_p1">
							<thead>
							  <tr>
							    <th rowspan="2">Produto</th>
							    <th rowspan="2">Fabricante</th>
							    <th rowspan="2">Diluição<br>(Kcal/ml)</th>
							    <th colspan="3" class="col_azul">Quantidade/Horário</th>
							    <th colspan="3">Quantidade/dia</th>
							    <th rowspan="2">Velocidade<br>(bomba de infusão)</th>
							    <th rowspan="2">Gotejamento<br>(gotas por minuto)</th>
							    <th rowspan="2">Calorias/dia</th>
							    <th rowspan="2">Proteína/dia</th>
							    <th rowspan="2">Fibra/dia</th>
							  </tr>
							  <tr>
							    <th class="col_azul">Gramas</th>
							    <th class="col_azul">Medida</th>
							    <th class="col_azul">Volume</th>
							    <th>Gramas</th>
							    <th>Medida</th>
							    <th>Volume</th>
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
											$font_destaque = "";
											if ($valor[1] == "Danone"){
												$font_destaque = "style='font-size: 14px;'";
											}
											?>
											<tr>
												<?php 
												if (isset($_produtos_nomes[ $produto[1] ]) and ($_produtos_nomes[ $produto[1] ] > 1) and (!isset($_produtos_nomes_usados[ $produto[1] ]))){
													$_produtos_nomes_usados[ $produto[1] ] = true;
													?>
													<td rel="<?php echo $produto[0];?>" rowspan="<?php echo $_produtos_nomes[$produto[1]];?>" <?php echo $font_destaque;?>>
														<?php echo $valor[0];?>
													</td>
													<td rowspan="<?php echo $_produtos_nomes[$produto[1]];?>">
														<?php echo $valor[1];?>
													</td>
													<?php
												}
												else if (!isset($_produtos_nomes_usados[ $produto[1] ])){
													$_produtos_nomes_usados[ ($produto[1]) ] = true;
													?>
													<td <?php echo $font_destaque;?>>
														<?php echo $valor[0];?>
													</td>
													<td>
														<?php echo $valor[1];?>
													</td>
													<?php
												}
												?>
												<td><?php echo $valor[2];?></td>
												<td class="col_azul"><?php echo $valor[3];?></td>
												<td class="col_azul"><?php echo $valor[4];?></td>
												<td class="col_azul"><?php echo $valor[5];?></td>
												<td><?php echo $valor[6];?></td>
												<td><?php echo $valor[7];?></td>
												<td><?php echo $valor[8];?></td>
												<td><?php echo $valor[9];?></td>
												<td><?php echo $valor[10];?></td>
												<td><?php echo $valor[11];?></td>
												<td><?php echo $valor[12];?></td>
												<td><?php echo $valor[13];?></td>
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
			}
			?>
			<?php
			}
			?>

		<?php
		}
		?>
		</div>
	</body>
</html>
