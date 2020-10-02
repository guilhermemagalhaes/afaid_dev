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
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<!-- icone da aba -->
		<link rel="icon"  href="school.png">
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

		<div class="ui centered stackable  column grid" id="tudo" style="margin-top: 81px;">

			<!-- inclui o menu esquerdo perfil -->
			<?php
			include('includes/perfilmenu.php');
			?>
			<div class="column" style="width: 60%;margin-top: -10px;">
				<div class="ui orange centered huge header">Perguntas frequentes</div>
				<div class="ui styled fluid accordion">
					<div class="title"><i class="dropdown icon"></i>Como editar meu perfil ?</div>
					<div class="content">
						<p>A dog is a type of domesticated animal. Known for its loyalty and faithfulness, it can be found as a welcome guest in many households across the world.</p>
					</div>
					<div class="title"><i class="dropdown icon"></i>Como alterar minha foto de perfil e capa ?</div>
					<div class="content">
						<p>There are many breeds of dogs. Each breed varies in size and temperament. Owners often select a breed of dog that they find to be compatible with their own lifestyle and desires from a companion.</p>
					</div>
					<div class="title"><i class="dropdown icon"></i>Como buscar amigos ?</div>
					<div class="content">
						<p>Three common ways for a prospective owner to acquire a dog is from pet shops, private owners, or shelters.</p>
						<p>A pet shop may be the most convenient way to buy a dog. Buying a dog from a private owner allows you to assess the pedigree and upbringing of your dog before choosing to take it home. Lastly, finding your dog from a shelter, helps give a good home to a dog who may not find one so readily.</p>
					</div>
				</div>

			</div>
		</div>

	</body>
	</html>