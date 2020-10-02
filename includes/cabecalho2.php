<?php
// error_reporting(0);
session_start();//inicia uma nova sessao na pagina
include('classes/DB.class.php');//conexao com banco de dados
include('classes/Login.class.php');//pega dados do usuario a partir do login
//inclui todas as funçoes necessarias
include('src/models/Usuario.php');
include('src/models/Avaliacao.php');
include('src/models/Amizade.php');
include('src/models/Perfil.php');
include('src/models/Comentario.php');
include('src/controllers/UsuarioDAO.php');
include('src/controllers/AvaliacaoDAO.php');
include('src/controllers/AmizadeDAO.php');
include('src/controllers/ComentarioDAO.php');
$objLogin = new Login;//cria o objeto login
$objAval = new AvaliacaoDAO();
$objAmiz = new AmizadeDAO();
$objCom = new ComentarioDAO();
$objUser = new UsuarioDAO();
// $_SESSION['imagemperfil'] = $user_imagem = (file_exists($user_imagem)) ? $user_imagem : 'default.png'; 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');