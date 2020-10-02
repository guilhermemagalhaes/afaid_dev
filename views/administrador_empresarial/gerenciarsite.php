<?php 
include ('../../includes/cabecalho3.php');
error_reporting(0);
if ($user_perfil == 2) {
	header('Location: ../../index.php');
}elseif ($user_perfil == 3) {
	header('Location: ../../index.php');
}elseif ($user_perfil == 4) {
	header('Location:../administrador_sistema/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrador </title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<script type="text/javascript" src="../../semantic/examples/assets/library/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../semantic/dist/semantic.min.css">
	<script src="../../semantic/dist/semantic.min.js"></script>
	<link rel="icon"  href="../../img/logo.png">
	<link rel="stylesheet" type="text/css" href="css/empresa.css">
</head>
<script type="text/javascript">
	$(document)
	.ready(function() {
		$('#modaleditsiteadm').modal('setting', 'scale').modal('show');
		$('#modaldeletesite').modal('setting', 'scale').modal('show');
	});

	$(function() {
		$('.ui.form').form({
			nomefantasia: {
				identifier: 'nomefantasia',
				rules: [
				{
					type : 'empty',
					prompt : 'Preencha o nome fantasia corretamente'
				}
				]
			},
			url: {
				identifier: 'url',
				rules: [
				{
					type : 'empty',
					prompt : 'Preencha a url corretamente'
				}
				]
			},
			sitenome: {
				identifier: 'sitenome',
				rules: [
				{
					type : 'empty',
					prompt : 'Preencha o nome fantasia corretamente'
				}
				]
			},

		}, {
			on: 'blur',
			inline: 'true'
		});
	});
</script>
<body>
	<?php
	include('includes/menu.php');
	?>
	<?php
	if (isset($_SESSION['message'])){
		?>
		<div id="message" class="ui inverted negative message">
			<i class="close icon"></i>
			<div class="header">
				Negado
			</div>
			<h2><?php echo $_SESSION['message'] ?></h2></div>
			<?php
			unset($_SESSION['message']);
		}
		?>
		<div class="ui horizontal segments" id="todascolunas">
			<div class="ui segment" id="coluna3">
				<h1 class="ui centered header">Gerenciar sites</h1>
				<form class="ui form segment" method="POST" action="php/novosite.php">
					<h2 class="ui header">Novo site</h2>
					<div class="divider"></div>
					<div class="field">
						<label>Nome Fantasia</label>
						<input type="text" name="nomefantasia" placeholder="Nome fantasia">
					</div>
					<div class="field">
						<label>URL</label>
						<input type="text" name="url" placeholder="URL">
					</div>
					<div class="field">
						<input type="submit" class="ui positive button" name="">
						<input type="reset" class="ui red button" value="Limpar campos">
					</div>
				</form>
				<?php
				$site = $objAdm->buscasite($_SESSION['userid']);
				?>
				<table class="ui teal table">
					<thead>
						<tr><th>Nome site</th>
							<th>URL</th>
							<th>Data de criação</th>
							<th>Editar</th>
							<th>Excluir</th>
						</tr></thead><tbody>
						<?php
						if (count($site)) {
							foreach ($site as $key => $value) {
								$id = $value['id'];
								$nome = $value['Nome'];
								$url = $value['url'];
								?>
								<tr>
									<td><?php echo $value['Nome'] ?></td>
									<td><?php echo $value['url'] ?></td>
									<td><?php
										$date = $value['data'];
										echo strftime("%d de %B de %Y", strtotime( $date )); ?></td>
										<td><a href="<?php echo "gerenciarsite.php?idsite=$id&nome=$nome&url=$url" ?>" id="btn_editar" class="ui blue button"> Editar</a></td>
										<td><a href="<?php echo "gerenciarsite.php?idexsite=$id"?>" id="btn_deletar" class="ui red button"> Excluir</a></td>
									</tr>
									<?php
								}
							} else {
								echo "<td>Nenhum site cadastrado</td>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</body>
		</html>
		<?php
		$ideditar = $_GET['idsite'];
		$idexcluir = $_GET['idexsite'];
		if ($ideditar != "") {
			include('includes/ModalEditSite.php');
		}
		if ($idexcluir != "") {
			include('includes/ModalDeleteSite.php');
		}
		?>