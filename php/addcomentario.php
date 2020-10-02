<!-- classe responsavel por pegar dados da view e cadastrar avaliacao do tipo site -->
<?php
session_start();
include('../classes/DB.class.php');
include('../classes/Login.class.php');
include('../src/models/Usuario.php');
include('../src/models/Amizade.php');
include('../src/models/Perfil.php');
include('../src/models/Comentario.php');
include('../src/models/Notificacao.php');
include('../src/models/Avaliacao.php');
include('../src/controllers/ComentarioDAO.php');
include('../src/controllers/NotificacaoDAO.php');
include('funcoes.php');
$objCom = new ComentarioDAO();
$objNoti = new NotificacaoDAO();
$idavaliacao = ($_POST['idpost_comentario']);
$user = ($_SESSION['idex']);
$usered = ($_SESSION['userid']);
$comentario = ($_POST['comentario']);
$veracidade = ($_POST['veracidade']);
$pagina = ($_POST['pagina']);
$redirect = ($_POST['idpost']);
$iddono = ($_POST['iddono']);

$tipo = 'opiniao';
$status = '1';
// var_dump($redirect);
$objCom->_setAvaliacaoId($idavaliacao);
$objCom->_setUsuarioId($user);
$objCom->_setComentario($comentario);
$objCom->_setVeracidade($veracidade);
$objNoti->_setDeId($user);
$objNoti->_setParaId($iddono);
$objNoti->_setAvaliacaoId($idavaliacao);
$objNoti->_setStatus($status);
$objNoti->_setTipo($tipo);
$objNoti->addnotificacao();
$objCom->add_comentario();
$_SESSION['message_timeline'] = "Opinião postada com sucesso";
$_SESSION['message_timeline_type']= "positive";

var_dump($pagina);
if ($pagina == 'timeline') {
	header("Location:../timeline.php#$redirect");
}elseif ($pagina == 'perfil') {
	$_SESSION['message_seguir'] = "Opinião postada com sucesso";
$_SESSION['message_seguir_type']= "positive";
	header("Location:../perfil-$usered#$redirect");
}
?>