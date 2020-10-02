<!-- pagine exibe mini perfil no canto esquerdo ou onde desejarmos -->
<style type="text/css">
	.cima{
		/*background: #f1f1f1;*/
		padding-left: 10px;
		padding-top: 10px;
		padding-right: 10px;
		padding-bottom: 10px; 
	}
	#itempost{
		margin-top: 16px;
		position: absolute;
	}
	.itemtudo{
		color: black;
		font-family: monospace;
		height: 50px;
		width: 101%;
		/*background: #CCE2FF;*/
		margin-left: -2px;
		margin-top: 10px;
		font-size: 15px;
		/*font-family: mallory;*/
		text-decoration: none;
	}
	#primeiroitem{
		color: black;
		/*font-family: monospace;*/
		height: 50px;
		width: 101%;
		/*background: #CCE2FF;*/
		margin-left: -2px;
		margin-top: 10px;
		font-size: 15px;
		/*font-family: mallory;*/
		text-decoration: none;
		background: #FF5722;
	}
	.itemtudo a{
		color: #767676;
		white-space: nowrap;
		word-wrap: normal;
	}
	#primeiroitem a{
		color: white;
	}
	.itemtudo:hover{
		background: #444444;
		color: white;
	}
	.itemtudo:hover a{
		background: #444444;
		color: white;
	}
	#titulo{
		margin-left: 50px;
		/*margin-top: 7px;*/
	}
	#icon {
		margin-left: 15px;
		/*margin-top: 5px;*/
		position: absolute;
	}
</style>

<div class="column" id="perfilcol" style="height: 493px;">

	<div class="cima">
		<?php 
		if ($user_perfil == 3) {
			?>
			<img  src="<?php echo $user_capa; ?>" style="
			width: 299px;
			position: absolute;
			margin-left: -23px;
			margin-top: -23px;
			height: 125px;
			box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			" >
			<?php
		}else{
			?>
			<img   src="uploads/usuarios/<?php echo $user_capa; ?>" style="
			width: 299px;
			position: absolute;
			margin-left: -23px;
			margin-top: -23px;
			height: 125px;
			box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			">
			<?php
		}
		?>
		<a href="perfil"><img class="imgperfil" src="<?php echo $_SESSION['imagemperfil'] ?>" alt="<?php echo $user_nome ?>" title="<?php echo $user_nome ?>" /></a>
		<!-- <img src="img/person.png" class="imgperfil"> -->
		<a class="nameuser" href="perfil"><?php echo $user_nome ?></a>
	</div>
	<div class="ui middle aligned animated list" style="
	margin-top: 100px;
	">
	<!-- item 1	 -->
	<div id="primeiroitem">
		<a id="hover" href="timeline">
			<div class="item" id="itempost">
				<i id="icon" class="home large icon"></i>
				<div class="content">
					<div id="titulo" class="header">Início</div>
				</div>
			</div>
		</a>
	</div>

	<div class="itemtudo" >
		<a id="hover" href="perfil">
			<div class="item" id="itempost">
				<i id="icon" class="user large icon"></i>
				<div class="content">
					<div id="titulo" class="header">Perfil</div>
				</div>
			</div>
		</a>
	</div>

	<div class="itemtudo" >
		<a id="hover" href="notificacoes.php">
			<div class="item" id="itempost">
				<i id="icon" class="alarm large icon"></i>
				<div class="content">
					<div id="titulo" class="header">Notificações</div>
				</div>
			</div>
		</a>
	</div>

	<div class="itemtudo" >
		<a id="hover" href="configurações">
			<div class="item" id="itempost">
				<i id="icon" class="write large icon"></i>
				<div class="content">
					<div id="titulo" class="header">Editar perfil</div>
				</div>
			</div>
		</a>
	</div>
	<!-- item 2  -->
	<div class="itemtudo">
		<a id="hover" href="ranking.php">
			<div class="item" id="itempost">
				<i id="icon" class="star large icon"></i>
				<div class="content">
					<div id="titulo" class="header">Ranking</div>
				</div>
			</div>
		</a>
	</div>
	<!-- item 3	 -->
	<div class="itemtudo">
		<a id="hover" href="ajuda">
			<div class="item" id="itempost">
				<i id="icon" class="help large icon"></i>
				<div class="content">
					<div id="titulo" class="header">Ajuda</div>
				</div>
			</div>
		</a>
	</div>
</div>
<div>
	<img src="img/10753922125933628534.gif" style="
	
	margin-left: -11px;
	width: 294px;
	">
</div>
</div>
