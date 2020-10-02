<!-- classe responsavel por pegar dados para editar post do tipo site -->
<?php
session_start();
require_once('../classes/DB.class.php');
require_once('../classes/Login.class.php');
require_once '../src/models/Perfil.php';
require_once('../src/models/Avaliacao.php');
require_once('../src/controllers/AvaliacaoDAO.php');
$de = $_SESSION['userid'];
$local = ($_POST['local']);
$tipo_avaliacao = '1';
$categoria = ($_POST['categoriaavl']);
$foto = '';
$descsite = substr($_POST['descsite'],0,140);
$nota = ($_POST['nota']);
$idpost = ($_POST['idpost']);
$pagina = ($_SESSION['pagina']);
$editid = ($_POST['local_id']);


$objSite = new AvaliacaoDAO();
$objSite->_setLocal($local);
$objSite->_setCategoria($categoria);
$objSite->_setFoto($foto);
$objSite->_setDescricao($descsite);
$objSite->_setNota($nota);
$objSite->_setId($idpost);
$objSite->_setLocalId($editid);
$objSite->editpostlocal();

if ($pagina == 'perfil') {
	$_SESSION['message_seguir'] = "Avaliação editada com sucesso";
$_SESSION['message_seguir_type']= "positive";
	header("Location:../perfil#$idpost");
}else if($pagina == 'timeline'){
	$_SESSION['message_timeline'] = "Avaliação editada com sucesso";
$_SESSION['message_timeline_type']= "positive";
	header("Location:../timeline#$idpost");
}
?>