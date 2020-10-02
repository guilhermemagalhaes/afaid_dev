<!-- classe onde o usuario pode atualizar suas informaçoes pessoais -->
<?php
include('includes/cabecalho.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>A'FAID <?php echo $user_nome ?> </title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<script type="text/javascript" src="semantic/examples/assets/library/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
	<script src="semantic/dist/semantic.min.js"></script>
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/configconta.css">
	<link rel="stylesheet" type="text/css" href="css/notificacao.css">
	<script type="text/javascript" src="js/notificacao.js"></script>
	<!-- leitor de libras -->
	<script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
	<script>
		var wl = new WebLibras();
	</script>
	<!-- fim leitor de libras -->
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	<script>
		$(document)
		.ready(function() {
			$('.menu .item')
			.tab()
			;
			$('.ui.dropdown')
			.dropdown({
				on: 'click'
			})
			;
			$('.ui.modal')
			.modal('show')
			;
		})
		;
	</script>
	<script type="text/javascript">

		$('.ui.dropdown')
		.dropdown()
		;
		$(function() {
			$('.ui.form').form({    
				email: {
					identifier: 'email',
					rules: [
					{
						type : 'empty',
						prompt : 'Prencha seu email corretamente'
					}
					]
				}, 
				senha: {
					identifier: 'senha',
					rules: [
					{
						type : 'empty',
						prompt : 'Prencha sua senha corretamente'
					}
					]
				}, 
				sexo: {
					identifier: 'sexo',
					rules: [
					{
						type : 'empty',
						prompt : 'Prencha sua senha corretamente'
					}
					]
				}, 
				nome: {
					identifier: 'nome',
					rules: [
					{
						type : 'empty',
						prompt : 'Prencha seu nome corretamente'
					}
					]
				}, 
				data_nascimento: {
					identifier: 'data_nascimento',
					rules: [
					{
						type : 'empty',
						prompt : 'Prencha sua data de nascimento corretamente'
					}
					]
				}, 	
				deficiencia: {
					identifier: 'deficiencia',
					rules: [
					{
						type : 'empty',
						prompt : 'Prencha a sua deficiência corretamente'
					}
					]
				},
			}, {
				on: 'blur',
				inline: 'true'
			});
		});
	</script>
</head>
<body>
	<?php 
	include('includes/menu.php');
	?>
	<div class="ui stackable two column grid" id="tudo">
		<?php
		if (isset($_SESSION['message'])){
			echo '<div id="msg" style="
			position: absolute;
			z-index: 100;
			/* float: right; */
			right: 3%;
			top: 15%;
			" class="ui positive message">
			<i class="close icon"></i>
			<div class="header">
				Sucesso
			</div>
			<p>'.$_SESSION['message'].'</p>
		</div>';
		unset($_SESSION['message']);
	}
	?>
	<div class="ui  centered column segment" style="width: 95%;margin-top: 60px">
		<h1 class="ui centered header">Configurações de conta </h1>
		<div class="ui centered card">
			<div class="column">
				<div class="ui fluid card">
					<div class="image">
						<img style="
						height: 285px;
						" src="<?php echo $user_imagem; ?>" >
					</div>
					<div class="content">
						<a class="header"><?php echo $user_nome; ?>  <?php if($idDaSessao==$idExtrangeiro): ?>
							<a href="configuracoes.php?configuracoes=UPLOAD"  >Alterar foto</a>
						<?php endif; ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php
		if(isset($_GET['configuracoes']) AND $_GET['configuracoes']=='UPLOAD'){
			include('includes/alterarfotoconfiguracoes.php');
		}
		?>
		<form class="ui form segment" method="post" action="php/uppconfiguracoes.php">
			<div class="three fields">
				<div class="field">
					<label>Nome</label>
					<input placeholder="Nome" name="nome" value="<?php echo $user_nome?>" type="text">
				</div>
				<div class="field">
					<label>Sexo</label>
					<div class="ui selection dropdown">
						<input name="sexo" value="<?php echo $user_sexo?>" type="hidden">
						<div class="default text"><?php echo $user_sexo?></div>
						<i class="dropdown icon"></i>
						<div class="menu">
							<div class="item" data-value="Masculino">Masculino</div>
							<div class="item" data-value="Feminino">Feminino</div>
							<div class="item" data-value="Nao informado">Prefiro não informar</div>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Deficiência</label>
					<div class="ui selection dropdown">
						<input type="hidden" name="deficiencia"  value="<?php echo $user_deficiencia?>">
						<div class="default text"><?php echo $user_deficiencia?></div>
						<i class="dropdown icon"></i>
						<div class="menu">
							<div class="item" data-value="Fisica" data-text="Fisica">
								Fisica
							</div>
							<div class="item" data-value="Visual" data-text="Visual">
								Visual
							</div>
							<div class="item" data-value="Intelectual" data-text="Intelectual">
								Intelectual
							</div>
							<div class="item" data-value="Auditiva" data-text="Auditiva">
								Auditiva
							</div>
							<div class="item" data-value="Não possuo" data-text="Não possuo">
								Não possuo
							</div>
							<div class="item" data-value="Prefiro não informar" data-text="Prefiro não informar">
								Prefiro não informar
							</div>
						</div>
					</div>
				</div>	
			</div>
			<script type="text/javascript">
				moment(data_nascimento).format("DD/MM/YY");
			</script>
			<div class="field">
				<label>Data de nascimento</label>
				<input type="date" name="data_nascimento" value="<?php echo $user_data_nascimento?>" placeholder="dd/mm/yyyy" >
			</div>
			<div class="field">
				<label>Email</label>
				<?php 
				if ($user_perfil==3) {
					?>
					<div class="ui disabled input">
						<input placeholder="Email" type="text" name="email"  value="Logado com facebook" type="text">
					</div>
					<?php
				}else{
					?>
					<input placeholder="Email" type="text" name="email" value="<?php echo $user_email; ?>" >
					<?php
				}
				?>
			</div>
				<!-- <div class="field">
					<label>Senha</label>
					<input name="senha" type="password">
				</div> -->
				<input class="ui positive button" type="submit"  value="Enviar">
			</form>
		</div>
		<script src="js/efeitos.js"></script>
	</body>
	</html>