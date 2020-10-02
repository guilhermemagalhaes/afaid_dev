<!-- classe responsavel por exibir resultado da perquisa de usuarios -->
<?php
include('includes/cabecalho.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buscando por </title>
	<script type="text/javascript" src="semantic/examples/assets/library/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
	<script src="semantic/dist/semantic.min.js"></script>
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/notificacao.css">
	<script type="text/javascript" src="js/notificacao.js"></script>
</head>
<body>
	<?php 
	include('includes/menu.php');
	?>
	<h1 class="ui centered header">Resultado da pesquisa</h1>	
	<div class="ui stackable five column segment grid" style="
	height: 87%;
	" >	
	 <?php
    if (isset($_SESSION['message_seguir'])){
      echo '<div id="msg" style="
      position: fixed;
      z-index: 100;
      /* float: right; */
      right: 1%;
      top: 14%;
      " class="ui '.$_SESSION['message_seguir_type'].' message">
      <i class="close icon"></i>
      <div class="header">
        Sucesso
      </div>
      <p>'.$_SESSION['message_seguir'].'</p>
    </div>';
    unset($_SESSION['message_seguir']);
  }
  ?>
	<?php 
	if(isset($_GET['s']) AND $_GET['s']){
		$_SESSION['devolve'] = $_GET['s'];				
		$explode = explode(' ',$_GET['s']);
		$numP = count($explode);
		if($numP==1){
			$busca = ' `nome` LIKE :nome ';
		}else{
			$busca = ' `nome`=:nome  AND `sobrenome` LIKE :sobrenome ';
		}
		$buscar = DB::getConn()->prepare("SELECT * FROM `usuario` WHERE $busca");
		if($numP==1){
			$buscar->bindValue(":nome",'%'.$explode[0].'%',PDO::PARAM_STR);
		}else{
			$buscar->bindValue(":nome",$explode[0],PDO::PARAM_STR);
			$buscar->bindValue(":sobrenome",'%'.$explode[1].'%',PDO::PARAM_STR);						
		}		
		$buscar->execute();		
		if($buscar->rowCount()>0){			
			while($resbusca=$buscar->fetch(PDO::FETCH_ASSOC)){
				$busca = $resbusca['id'];
				include('includes/resultadobusca.php');
			}
		}else{
			?>
			<div class="ui centered column grid" >
				<h2>Não foram encontrados dados com  "<?php echo $_GET['s']; ?>"</h2>
				<img src="img/empty-search.svg" width="380px" >
				<h3>Tente escrever corretamente o nome do usuario</h3>
			</div>

			<?php
		}
	}
	?>
</div>
</body>
</html>
<!-- echo '<img src=uploads/usuarios/'.$resbusca['imagem'].'>'; -->