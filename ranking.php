<!-- esse pagina e responsavel por oferecer ajuda aos usuarios quanto a suas
	duvidas frequentes quanto ao ambiente social -->
	<?php
	include('includes/cabecalho.php');
	?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Ranking</title>
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<!-- icone da aba -->
		<link rel="icon"  href="img/Logo.png">
		<!-- links semantic ui -->
		<script type="text/javascript" src="semantic/examples/assets/library/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
		<script src="semantic/dist/semantic.min.js"></script>
		<!-- links do menu superior -->
		<link rel="stylesheet" href="css/menu.css">
		<link rel="stylesheet" type="text/css" href="css/notificacao.css">
		<script type="text/javascript" src="js/notificacao.js"></script>
	</head>
	<body>
		<!-- inclui o menu superior -->
		<?php
		include('includes/menu.php');
		?>
		<div class="ui centered stackable  column grid" id="tudo" style="margin-top: 81px;">
			<!-- inclui o menu esquerdo perfil -->
			<?php
			include('includes/perfilmenu.php');
			?>
			<div class="column" id="colunaranking" >
				<div id="titulork" class="ui centered huge header"><i class="star orange icon"></i>RANKING EFICIENTE</div>
				<?php 
				$todorank = $objAval->ranking();
				$posicao = 0;
				foreach ($todorank as $key => $value) {
					$posicao = $posicao + 1;
					?>
					<div id="segment" class="ui clearing segment php" >
						<div id="barra" class="ui clearing segment php" >
							<div class="ui statistic">
								<div id="value" class="value">
									<?php echo "{$posicao}º" ?>
								</div>
							</div>
						</div>
						<div class="value2 php" id="value2">
							<a href="#"><?php echo $value['local'] ?></a>
						</div>	
						<img id="imglocal" class="ui floated right image php" src="img/localizacao.png">
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</body>
	</html>
	<style type="text/css">
		#maisd{
			position: absolute;
			top: 60%;
			left: 45%;
			background: white;
			color: black;
			font-size: 15px;

		}
		#corpocomentario{
			/*position: absolute;*/
			width: 96%;
			height: 22%;
			top: 8%;
		}
		#divisaonota{
			position: absolute;
			/*background: red;*/
			top: 29%;
			right: 1%;
			width: 46%;
			height: 75%;
		}
		#titulonota{
			position: absolute;
			font-size: 20px;
		}

		#divultimas{
			position: absolute;
			top: 29%;
			left: : 4%;
			/*background: red;*/
			width: 50%;
			height: 75%;
			/*border-right: 1px solid #bdc3c7;*/
			border-radius: 1px;
		}
		#tituloultimas{
			position: absolute;
			/*left: : 0%;*/
			font-size: 20px
		}
		#mais{
			margin-left: 10px;
			width: 96%;
			font-size: 15px;
			display: none;
		}
		#titulork{
			margin-top: 15px;
		}
		#imglocal{
			width: 7%;
			position: absolute;
			left: 88%;
			top: 22%;

		}
		#value2{
			position: absolute;
			left: 30%;
			/*color: black;*/
			font-size: 41px;
			/*top: 7%; script*/
			top: 30%;
		}
		#value2 a {
			color: black;
		}
		#colunaranking{
			width: 60%;
			margin-top: 28px;
			background: white;
			height: 100%;
			margin-left: 10px;
			box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
			/*position: absolute;*/
		}
		#segment{
			height: 110px;
			/*position: absolute;*/
			left: 10px;
			width: 96%;
			box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.1);
		}
		#barra{
			position: absolute;
			background: #F2711C;
			/*width: 100%;*/
			height: 100%;
			top: 0%;
			left: 0%;
			border-radius: 0px;
			box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.1);
		}
		#value{
			color: white;
			margin-left: 19px;
			margin-top: 5px;
		}
	</style>
