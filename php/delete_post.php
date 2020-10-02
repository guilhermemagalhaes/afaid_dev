<!-- classe responsavel por pegar dados para editar post do tipo site -->
<?php
session_start();
require_once('../classes/DB.class.php');
require_once('../classes/Login.class.php');
require_once '../src/models/Perfil.php';
require_once('../src/models/Avaliacao.php');
require_once('../src/controllers/AvaliacaoDAO.php');

$idpost = ($_POST['idpost']);
$pagina = ($_SESSION['pagina']);

var_dump($pagina);
// var_dump($idpost);

$objSite = new AvaliacaoDAO();
$objSite->_setId($idpost);
$objSite->delete_post();


if ($pagina == 'perfil') {
	$_SESSION['message_seguir'] = "Avaliação deletada com sucesso";
$_SESSION['message_seguir_type']= "negative";
	header("Location:../perfil");
}else if($pagina == 'timeline'){
	$_SESSION['message_timeline'] = "Avaliação deletada com sucesso";
$_SESSION['message_timeline_type']= "negative";
	header("Location:../timeline");
}




?>