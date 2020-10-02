<?php
// error_reporting(0);
session_start();//inicia uma nova sessao na pagina
include('classes/DB.class.php');//conexao com banco de dados
include('classes/Login.class.php');//pega dados do usuario a partir do login
//inclui todas as funçoes necessarias
include('src/models/Amizade.php');
include('src/models/Usuario.php');
include('src/models/Avaliacao.php');
include('src/models/Perfil.php');
include('src/models/Comentario.php');
include('src/models/Notificacao.php');
include('src/controllers/UsuarioDAO.php');
include('src/controllers/AvaliacaoDAO.php');
include('src/controllers/AmizadeDAO.php');
include('src/controllers/ComentarioDAO.php');
include('src/controllers/NotificacaoDAO.php');
$objLogin = new Login;//cria o objeto login
$objAval = new AvaliacaoDAO();
$objAmiz = new AmizadeDAO();
$objCom = new ComentarioDAO();
$objUser = new UsuarioDAO();
$objNoti = new NotificacaoDAO();
//varifica se o usuario ja esta logado
if(!$objLogin->logado()){
  include('login.php');
  exit();
}
// para eliminar as sessoes
if(isset($_GET['sair'])){
  $objLogin->sair();
  session_destroy();
  header('Location: login.php');
}
// pega o id do usuario e da pagina de perfil que ele esteja visitando
$idExtrangeiro = (isset($_GET['uid'])) ? (int)$_GET['uid'] : $_SESSION['socialbigui_uid'];
$idDaSessao = $_SESSION['socialbigui_uid'];
$dados = $objLogin->getDados($idExtrangeiro);
if(is_null($dados)){
  header('Location: ./');
  exit();
}else{
  extract($dados,EXTR_PREFIX_ALL,'user'); 
}
// verifica se o usuario tem foto cadastrado no banco de dados
if ($user_perfil==3) {
  $_SESSION['imagemperfil'] = $user_imagem;
}else if($user_imagem == "null"){
  $_SESSION['imagemperfil'] = 'uploads/usuarios/default.png';
}else{
 $_SESSION['imagemperfil'] = $user_imagem;
}
if ($user_perfil == 4) {
  header('Location: views/administrador_sistema/index.php');
}elseif ($user_perfil == 1) {
  header('Location: views/administrador_empresarial/index.php');
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