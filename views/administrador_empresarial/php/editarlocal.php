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
$endereco = ($_POST['endereco']);
$nome = ($_POST['nomelocal']);
$objSite = new Admempresa();
$objSite->_setNome($nome);
$objSite->_setEndereco($endereco);
$objSite->_setIdlocal($idlocal);
 $objSite->editarlocal();
header("Location:../gerenciarlocal.php");