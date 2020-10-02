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
$idcomentario = ($_POST['idcomentario']);
$pagina= ($_POST['pagina']);
$idpost= ($_POST['idpost']);
$idpub = ($_SESSION['idextrangeiro']);
$objCom = new ComentarioDAO();
$objCom->_setAvaliacaoId($idcomentario);
$objCom->deletecomentario();

if ($pagina == 'perfil') {
	$_SESSION['message_seguir'] = "Opinião deletada com sucesso";
$_SESSION['message_seguir_type']= "negative";
	header("Location:../perfil-$idpub#$idpost");
}else if($pagina == 'timeline'){
	$_SESSION['message_timeline'] = "Opinião deletada com sucesso";
$_SESSION['message_timeline_type']= "negative";
	header("Location:../timeline#$idpost");
}
?>