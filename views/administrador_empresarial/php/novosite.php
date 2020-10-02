<!-- classe responsavel por pegar dados da view e cadastrar avaliacao do tipo site -->
<?php
session_start();
require_once('../../../classes/DB.class.php');
require_once('../../../classes/Login.class.php');
require_once '../../../src/models/Perfil.php';
require_once('../../../src/models/Avaliacao.php');
require_once('../../../src/models/Site.php');
require_once('../../../src/controllers/AvaliacaoDAO.php');
require_once('../../../src/controllers/AdministradorEmpresarialDAO.php');

$userid = $_SESSION['userid'];
$url = ($_POST['url']);
$nome = ($_POST['nomefantasia']);

$sql = DB::getConn()->prepare('SELECT * FROM local WHERE url=:url');
$sql->bindParam(':url', $url);
$sql->execute();

if ($sql->rowCount()>=1) {
	$_SESSION['message'] = 'Site ja cadastrado';
	header("Location:../gerenciarsite.php");
}else{
	$objSite = new Admempresa();
	$objSite->_setNome($nome);
	$objSite->_setUrl($url);
	$objSite->_setUsuarioId($userid);
	$objSite->adicionarsite();
	header("Location:../gerenciarsite.php");
}

