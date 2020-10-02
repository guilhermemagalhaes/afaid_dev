<?php
session_start();
require_once('../../../classes/DB.class.php');
require_once('../../../classes/Login.class.php');
require_once '../../../src/models/Perfil.php';
require_once('../../../src/models/Usuario.php');
require_once('../../../src/models/Site.php');
require_once('../../../src/controllers/UsuarioDAO.php');
require_once('../../../src/controllers/AdministradorDAO.php');

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$perfil = "4";
$objUser = new Adm();
$objUser->_setNome($nome);
$objUser->_setSobrenome($sobrenome);
$objUser->_setEmail($email);
$objUser->_setSenha($senha);
$objUser->_setPerfilId($perfil);
$objUser->novoadm();

header("Location:../gerenciarusuarios.php");

