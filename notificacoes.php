<!-- esse pagina e responsavel por oferecer ajuda aos usuarios quanto a suas
	duvidas frequentes quanto ao ambiente social -->
	<?php
	include('includes/cabecalho.php');
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Perguntas frequentes</title>
		<!-- icone da aba -->
		<link rel="icon"  href="school.png">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
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
		<script type="text/javascript">
			$( document ).ready(function() {
				$('.ui.accordion')
				.accordion()
				;
			});
		</script>
		<div class="ui centered stackable  column grid" id="tudo">
			<!-- inclui o menu esquerdo perfil -->
			<?php
			include('includes/perfilmenu.php');
			?>
			<div class="column" style="width: 60%;margin-top: -10px;">
				<div class="ui orange centered huge header">Notificações</div>
				<div class="ui segment">
					<?php 
					$objNoti->_setParaId($_SESSION['idex']);
					$notificacao = $objNoti->buscarnotificacao();
					if (count($notificacao)){
						?>
						<?php
						foreach ($notificacao as $key => $list){
							if ($list['tipo'] == 'amizade') {
								$msgnotifi = 'começou te seguir';
							}elseif ($list['tipo'] == 'opiniao') {
								$msgnotifi = 'opinou na sua avaliação';
							}
							?>
							<div id="feed" class="ui feed">
								<div class="event">
									<div class="label">
										<img src="<?php echo $list['imagem']?>">
									</div>
									<div class="content">
										<a href="perfil-<?php echo $list['id'] ?>"><?php echo $list['nome'] ?> <?php echo $msgnotifi ?></a>
									</div>
								</div>
								<?php 
							}
							?>
						</div>
					</div>
					<?php
				}else{
					?>
					<style type="text/css">
		#vermaisn{
						display: none;
					}
				</style>
				<!-- erro quando não existe avaliações -->
				<div id="feed" class="ui centered column" style="
				width: 300px; margin-left: 11px
				">
				<div id="feed"  class="ui">
					<h3>Você não tem notificações</h3>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>
</div>
</body>
</html>