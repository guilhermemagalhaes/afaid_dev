<!-- classe responsavel por pegar dados da view e cadastrar avaliacao do tipo site -->
<?php
session_start();
require_once('../classes/DB.class.php');
require_once('../classes/Login.class.php');
require_once '../src/models/Perfil.php';
require_once('../src/models/Avaliacao.php');
require_once('../src/controllers/AvaliacaoDAO.php');

	date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
 
      $ext = strtolower(substr($_FILES['imagem_avaliacao']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $dir = '../uploads/posts/'; //Diretório para uploads
 
 move_uploaded_file($_FILES['imagem_avaliacao']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

 if ($new_name == date("Y.m.d-H.i.s")) {
 	$new_name = '';
 }


$userid = $_SESSION['userid'];
$local = ($_POST['empresa']);
$tipo_avaliacao = 'local';
$categoria = ($_POST['categoriaavl']);
$foto = $new_name ;
$desclocal = substr($_POST['desclocal'],0,140);
$nota = ($_POST['notalocal']);
$localid = ($_POST['local_id']);



$objAval = new AvaliacaoDAO();
$objAval->_setUser($userid);
$objAval->_setLocal($local);
$objAval->_setTipoAvaliacao($tipo_avaliacao);
$objAval->_setCategoria($categoria);
$objAval->_setFoto($foto);
$objAval->_setDescricao($desclocal);
$objAval->_setNota($nota);
$objAval->_setLocalId($localid);


$objAval->add_postLocal();
if (!is_null($objAval)) {
	$_SESSION['message_timeline'] = "Avaliação postada com sucesso";
	$_SESSION['message_timeline_type']= "positive";
	header("Location:../timeline");
}

?>