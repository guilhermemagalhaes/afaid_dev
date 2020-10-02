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
$local = ($_POST['endereco']);
$nome = ($_POST['nomefantasia']);

$sql = DB::getConn()->prepare('SELECT * FROM local WHERE Nome=:nome and Tipo="local"');
$sql->bindParam(':nome', $nome);
$sql->execute();

if ($sql->rowCount()>=1) {
	$_SESSION['message'] = 'Local já cadastrado';
	header("Location:../gerenciarlocal.php");
}else{
	$objLocal = new Admempresa();
	$objLocal->_setNome($nome);
	$objLocal->_setEndereco($local);
	$objLocal->_setUsuarioId($userid);
	$objLocal->adicionarlocal();
	header("Location:../gerenciarlocal.php");
}

