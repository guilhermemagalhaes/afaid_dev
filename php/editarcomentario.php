<!-- classe responsavel por pegar dados para editar post do tipo site -->
<?php
session_start();
require_once('../classes/DB.class.php');
require_once('../classes/Login.class.php');
require_once '../src/models/Perfil.php';
require_once '../src/models/Comentario.php';
require_once('../src/models/Avaliacao.php');
require_once('../src/controllers/AvaliacaoDAO.php');
require_once('../src/controllers/ComentarioDAO.php');
$usuario = ($_POST['idusuario']); 
$comentario = ($_POST['editcomentario']);
$idcomentario = ($_POST['idcomentario']);
$pagina= ($_POST['pagina']);
$veracidade= ($_POST['veracidade']);
$idpost= ($_POST['idpost']);
$idpub = ($_SESSION['idextrangeiro']);
$objCom = new ComentarioDAO();
$objCom->_setAvaliacaoId($idcomentario);
$objCom->_setUsuarioId($usuario);
$objCom->_setComentario($comentario);
$objCom->_setVeracidade($veracidade);
$objCom->editcomentario();
if ($pagina == 'perfil') {
	$_SESSION['message_seguir'] = "Opinião editada com sucesso";
$_SESSION['message_seguir_type']= "positive";
	header("Location:../perfil-$idpub#$idpost");
}else if($pagina == 'timeline'){
	$_SESSION['message_timeline'] = "Opinião editada com sucesso";
$_SESSION['message_timeline_type']= "positive";
	header("Location:../timeline");
}
?>