<?php
// error_reporting(0);
session_start();//inicia uma nova sessao na pagina
include('../../classes/DB.class.php');//conexao com banco de dados
include('../../classes/Login.class.php');//pega dados do usuario a partir do login
//inclui todas as funçoes necessarias
include('../../src/models/Amizade.php');
include('../../src/models/Usuario.php');
include('../../src/models/Avaliacao.php');
include('../../src/models/Site.php');
include('../../src/models/Perfil.php');
include('../../src/models/Comentario.php');
include('../../src/controllers/UsuarioDAO.php');
include('../../src/controllers/AvaliacaoDAO.php');
include('../../src/controllers/AmizadeDAO.php');
include('../../src/controllers/ComentarioDAO.php');
include('../../src/controllers/AdministradorEmpresarialDAO.php');
include('../../src/controllers/AdministradorDAO.php');
$objLogin = new Login;//cria o objeto login
$objAval = new AvaliacaoDAO();
$objAmiz = new AmizadeDAO();
$objCom = new ComentarioDAO();
$objUser = new UsuarioDAO();
$objAdm = new Admempresa();
$objAdms = new Adm();
//varifica se o usuario ja esta logado
if(!$objLogin->logado()){
	header('Location: ../../');
}
// para eliminar as sessoes
if(isset($_GET['sair'])){
  $objLogin->sair();
  session_destroy();
  header('Location: ../../');
}
// pega o id do usuario e da pagina de perfil que ele esteja visitando
$idExtrangeiro = (isset($_GET['uid'])) ? $_GET['uid'] : $_SESSION['socialbigui_uid'];
$idDaSessao = $_SESSION['socialbigui_uid'];
$dados = $objLogin->getDados($idExtrangeiro);
if(is_null($dados)){
  
  exit();
}else{
  extract($dados,EXTR_PREFIX_ALL,'user'); 
}
// guarda os dados do usuario para ser exibido nas demais paginas
$_SESSION['userid'] = $user_id;
$_SESSION['data_nascimento'] = $user_data_nascimento;
$_SESSION['email'] = $user_email;
$_SESSION['nome'] = $user_nome;
$_SESSION['sexo'] = $user_sexo;
$_SESSION['deficiencia'] = $user_deficiencia;
$_SESSION['idex'] = $idDaSessao;
$_SESSION['idextrangeiro'] = $idExtrangeiro;
// $_SESSION['imagemperfil'] = $user_imagem = (file_exists($user_imagem)) ? $user_imagem : 'default.png'; 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');