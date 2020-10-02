<!-- classe responsavel por seguir e deixar de seguir na tela de busca -->
<?php
session_start();//inicia uma nova sessao na pagina
include('../classes/DB.class.php');//conexao com banco de dados
include('../classes/Login.class.php');//pega dados do usuario a partir do login
//inclui todas as funçoes necessarias
include('../src/models/Usuario.php');
include('../src/models/Avaliacao.php');
include('../src/models/Amizade.php');
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

$id = $_GET['id'];
$do = $_GET['do'];
$iduser = $_SESSION['idex'];
$status = '1';
$status2 = '2';
$tipo = 'amizade';

if (count($id)) {
	$sql= DB::getConn()->prepare("SELECT nome from usuario WHERE id=$id");
	$sql->execute();
	
	foreach ($sql as $key => $value) {
		$_SESSION['nome'] = $value['nome'];
	}

}


switch ($do){
	case "follow":
	$objAmiz->_setUserId($iduser);
	$objAmiz->_setSeguindoId($id);
	$objNoti->_setDeId($iduser);
	$objNoti->_setParaId($id);
	$objNoti->_setStatus($status);
	$objNoti->_setTipo($tipo);
	$response =$objNoti->addnotificacao();
	$response = $objAmiz->follow_user();

	$msg =  "Você começou a seguir ".$_SESSION['nome']." ";
	$type = "positive";
	break;

	case "unfollow":
	$objAmiz->_setUserId($iduser);
	$objAmiz->_setSeguindoId($id);
	$objNoti->_setDeId($iduser);
	$objNoti->_setParaId($id);
	$objNoti->_setStatus($status2);
	$response =$objNoti->deletenotificacao();
	$response = $objAmiz->unfollow_user();
	$msg = "Você deixou de seguir ".$_SESSION['nome']."";
	$type = "negative";
	break;
}
$_SESSION['message_seguir'] = $msg;
$_SESSION['message_seguir_type'] = $type;
header("Location:../perfil-$id");
?>