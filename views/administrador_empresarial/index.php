<?php 
include ('../../includes/cabecalho3.php');
if ($user_perfil == 2) {
	header('Location: ../../index.php');
}elseif ($user_perfil == 3) {
	header('Location: ../../index.php');
}elseif ($user_perfil == 4) {
	header('Location:../administrador_sistema/index.php');
}
// error_reporting(0);
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
	$( document ).ready(function() {
		$('.ui.accordion')
		.accordion()
		;
	});
</script>
<body>
	<?php 
	include('includes/menu.php');
	?>
	<div class="ui horizontal segments" id="todascolunas">
		<div class="ui segment" id="coluna2">
			<h1 class="ui centered header">Bem vindo administrador <?php echo $_SESSION['nome'];?></h1>
			<?php
			$local = $objAdm->buscaempresas($_SESSION['userid']);
			$site = $objAdm->buscasite($_SESSION['userid']);
			if (count($site) or count($local)) {
				?>
				<div class="ui segment" id="seglocal">
					<h2 class="ui centered header">Estatística (Seus sites e locais)</h2>
					<div id="todasstatic" class="ui statistics">
						<div class="ui statistic">
							<div class="value">
								<?php $conta = $objAdm->contavaliacao($_SESSION['userid']);
								echo $conta;
								 ?>
							</div>
							<div class="label">
								Avaliações citadas
							</div>
						</div>
						<div class="ui statistic">
							<div class="value">
								3º
							</div>
							<div class="label">
								Posição no ranking
							</div>
						</div>
					</div>
				</div>
				<div id="analise">
					<h2 class="ui centered header">Pedidos de analise</h2>
					<table class="ui yellow celled padded table">
						<thead>
							<tr>
								<th>Site/Local</th>
								<th>Data</th>
								<th>Motivação</th>
								<th>Feedback</th>
							</tr></thead>
							<tbody>
								<tr>
									<td>Mercado</td>
									<td>17/11/2016</td>
									<td>A veracidade dessa avaliação e falsa</td>
									<td>Constatamos que a veracidade e verdadeira</td>
								</tr>
							</tbody>
						</table>
					</div>
					<?php
				} else {
					?>
					<h1 class="ui centered header"><?php echo "Parece que você ainda não cadastrou sites nem locais, comece já"; ?></h1>
					<div class="ui segment" id="botoesadd">
						<a href="gerenciarsite.php" id="btn_novosite" class="ui massive teal button">Novo site</a>
						<a href="gerenciarlocal.php" id="btn_novolocal" class="ui massive orange button">Novo local</a>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</body>
	</html>