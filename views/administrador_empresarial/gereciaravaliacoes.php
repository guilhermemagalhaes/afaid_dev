<?php 
include ('../../includes/cabecalho3.php');
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
		$(".ui.blue.button").click(function() {
			$('#modaleditsiteadm').modal('setting', 'scale').modal('show');
		});
		
		$('#modalanalise').modal('setting', 'scale').modal('show');

	});
</script>
<body>
	
	<?php
	include('includes/menu.php');
	?>
	<div class="ui horizontal segments" id="todascolunas">
		<div class="ui segment" id="coluna3">
			<h1 class="ui centered header">Gerenciar avaliações </h1>
			<?php
			$local = $objAdm->solicitacaoanalise($_SESSION['userid']);
			?>
			<h2>Sites</h2>
			<table class="ui yellow table">
				<thead>
					<tr><th>Site</th>
						<th>Conteudo da avaliação</th>
						<th>Data de criação</th>
						<th>Solicitar analise</th>
						
					</tr></thead><tbody>
					<?php
					if (count($local)) {
						foreach ($local as $key => $value) {
							$localid = $value['local_id'];
							$denunciado = $value['user'];
							$descricao= $value['descricao'];
							$local= $value['local'];
							?>
							<tr>
								<td><?php echo $value['url'] ?></td>
								<td><?php echo $value['descricao'] ?></td>
								<td><?php
									$date = $value['data'];
									echo strftime("%d de %B de %Y", strtotime( $date )); ?></td>
									<td><a href="<?php echo "gereciaravaliacoes.php?localid=$localid&denunciado=$denunciado&conteudo=$descricao&localnome=$local" ?>" id="btn_analise"  class="ui yellow button">Solicitar analise</a></td>
								</tr>
								<?php
							}
						} else {
							echo "<td>Nenhum avaliação realizada</td>";
						}
						?>
					</tbody>
				</table>
				<h2>Locais</h2>
				<?php
				$local = $objAdm->solicitacaoanaliselocal($_SESSION['userid']);
				?>
				<table class="ui yellow table">
					<thead>
						<tr><th>Local</th>
							<th>Conteudo da avaliação</th>
							<th>Endereço</th>
							<th>Data de criação</th>
							<th>Solicitar analise</th>
							<th></th>
						</tr></thead><tbody>
						<?php
						if (count($local)) {
							foreach ($local as $key => $value) {
								$localid = $value['local_id'];
								$denunciado = $value['user'];
								$descricao= $value['descricao'];
								$local= $value['local'];
								?>
								<tr>
									<td><?php echo $value['Nome'] ?></td>
									<td><?php echo $value['descricao'] ?></td>
									<td><?php echo $value['Endereco'] ?></td>
									<td><?php
										$date = $value['data'];
										echo strftime("%d de %B de %Y", strtotime( $date )); ?></td>
										<td><a href="<?php echo "gereciaravaliacoes.php?localid=$localid&denunciado=$denunciado&conteudo=$descricao&localnome=$local" ?>" id="btn_analise"  class="ui yellow button">Solicitar analise</a></td>
										<td></td>
									</tr>
									<?php
								}
							} else {
								echo "<td>Nenhum avaliação realizada</td>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</body>
		</html>
		<?php
		if ($_GET['localid'] != "") {
			include('includes/ModalAnalise.php');
		}
		?>