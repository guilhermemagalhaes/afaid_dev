<!-- classe responsavel por pegar dados para atualizar informaçoes do usuario -->
<?php
session_start();//inicia uma nova sessao na pagina
include('../classes/DB.class.php');//conexao com banco de dados
include('../classes/Login.class.php');//pega dados do usuario a partir do login
//inclui todas as funçoes necessarias
include('../src/models/Usuario.php');
include('../src/models/Amizade.php');
include('../src/models/Avaliacao.php');
include('../src/models/Perfil.php');
include('../src/models/Comentario.php');
include('../src/controllers/UsuarioDAO.php');
include('../src/controllers/AvaliacaoDAO.php');
include('../src/controllers/AmizadeDAO.php');
include('../src/controllers/ComentarioDAO.php');
$objLogin = new Login;//cria o objeto login
$objAval = new AvaliacaoDAO();
$objAmiz = new AmizadeDAO();
$objCom = new ComentarioDAO();
$objUser = new UsuarioDAO();
$userid2 = $_SESSION['userid'];
$nome = ($_POST['nome']);
$deficiencia = ($_POST['deficiencia']);
$data_nascimento = ($_POST['data_nascimento']);
if ($email = ($_POST['email']) == 'Logado com facebook') {
	$email = $_SESSION['senha2'];
}else{
	$email = ($_POST['email']);
}
$sexo = ($_POST['sexo']);
$objUser->_setId($userid2);
$objUser->_setNome($nome);
$objUser->_setDeficiencia($deficiencia);
$objUser->_setDataNascimento($data_nascimento);
$objUser->_setEmail($email);
$objUser->_setSexo($sexo);
$response= $objUser->upconf();

$_SESSION['message'] = "Informações alteradas com sucesso";
header("Location:../configuracoes.php");
?>