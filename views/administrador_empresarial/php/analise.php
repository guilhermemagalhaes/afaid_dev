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
$idsoli = ($_POST['userid']);
$motivacao = ($_POST['motivacao']);
$idlocal = ($_POST['idlocal']);
$denunciado = ($_POST['denunciado']);
$conteudo = ($_POST['conteudo']);
$objLocal = new Admempresa();
$objLocal->_setUsuarioId($idsoli);
$objLocal->_setMotivacao($motivacao);
$objLocal->_setIdlocal($idlocal);
$objLocal->_setDenunciado($denunciado);
$objLocal->_setConteudo($conteudo);
$objLocal->novaanalise();
header("Location:../gereciaravaliacoes.php");


