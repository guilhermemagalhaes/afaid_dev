<?php
// error_reporting(0);
session_start();//inicia uma nova sessao na pagina
include('../classes/DB.class.php');//conexao com banco de dados
include('../classes/Login.class.php');//pega dados do usuario a partir do login
//inclui todas as funçoes necessarias
include('../src/models/Amizade.php');
include('../src/models/Usuario.php');
include('../src/models/Avaliacao.php');
include('../src/models/Perfil.php');
include('../src/models/Comentario.php');
include('../src/models/Notificacao.php');
include('../src/controllers/UsuarioDAO.php');
include('../src/controllers/AvaliacaoDAO.php');
include('../src/controllers/AmizadeDAO.php');
include('../src/controllers/ComentarioDAO.php');
include('../src/controllers/NotificacaoDAO.php');
$objLogin = new Login;//cria o objeto login
$objAval = new AvaliacaoDAO();
$objAmiz = new AmizadeDAO();
$objCom = new ComentarioDAO();
$objUser = new UsuarioDAO();
$objNoti = new NotificacaoDAO();
$user_id = $_SESSION['userid'];
//varifica se o usuario ja esta logado
if(!$objLogin->logado()){
	include('login.php');
	exit();
}
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
		<a class="ui centered small header" href="notificacoes.php">Ver mais</a>
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