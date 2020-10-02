<?php
include('../classes/DB.class.php');
session_start();
include('../src/models/Amizade.php');
include('../src/models/Usuario.php');
include('../src/models/Avaliacao.php');
include('../src/models/Perfil.php');
include('../src/models/Comentario.php');
include('../src/controllers/UsuarioDAO.php');
include('../src/controllers/AvaliacaoDAO.php');
include('../src/controllers/AmizadeDAO.php');
include('../src/controllers/ComentarioDAO.php');

$objAval = new AvaliacaoDAO();
$objAmiz = new AmizadeDAO();
$objCom = new ComentarioDAO();
$objUser = new UsuarioDAO();

// Recuperando informações
$ultimo = (int) $_POST['ultimo'];



// Selecionando mais três frases, a partir da última
// $query=DB::getConn()->prepare("SELECT * FROM avaliacao WHERE id < {$ultimo} ORDER BY id DESC LIMIT 0,3");

$query = DB::getConn()->prepare("SELECT  avaliacao.tipo_avaliacao,avaliacao.id,usuario.nome,descricao,local,foto,data,user,usuario.imagem from avaliacao INNER JOIN usuario on avaliacao.user=usuario.id
			where avaliacao.id < {$ultimo}  order by avaliacao.id desc LIMIT 0,3");


$query->execute();
// Retornando frases
foreach ($query as $key => $list) {
	 include('../includes/post.php');
	 ?>
	  <p lang="<?php echo $list['id']; ?>" ></p>
	 <?php
}

    
?>