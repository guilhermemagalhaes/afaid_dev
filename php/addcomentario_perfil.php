<!-- classe responsavel por pegar dados da view e cadastrar avaliacao do tipo site -->
<?php
session_start();
include('../classes/DB.class.php');
include('../classes/Login.class.php');
include('../src/models/Comentario.php');
include('../src/models/Avaliacao.php');
include('../src/models/Perfil.php');
include('../src/controllers/ComentarioDAO.php');
include('funcoes.php');


$idavaliacao = ($_POST['idpost_comentario']);
$user = $_SESSION['userid'];
$comentario = ($_POST['comentario']);

$objCom = new ComentarioDAO();

$objCom->_setAvaliacaoId($idavaliacao);
$objCom->_setUsuarioId($user);
$objCom->_setComentario($comentario);

$objCom->add_comentario();

$_SESSION['message_seguir'] = "Opinião postada com sucesso";
$_SESSION['message_seguir_type']= "positive";

// $_SESSION['message'] = "Postado com sucesso";
header("Location:../perfil#$idavaliacao");
?>