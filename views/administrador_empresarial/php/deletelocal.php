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

$idlocal = ($_POST['idlocal']);


$objSite = new Admempresa();
$objSite->_setIdlocal($idlocal);
$objSite->deletarlocal();

header("Location:../gerenciarlocal.php");