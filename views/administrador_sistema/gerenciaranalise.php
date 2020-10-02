<?php 
include ('../../includes/cabecalho3.php');
if ($user_perfil == 2) {
  header('Location: ../../index.php');
}elseif ($user_perfil == 3) {
  header('Location: ../../index.php');
}elseif ($user_perfil == 1) {
  header('Location:../administrador_empresarial/index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrador </title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<script type="text/javascript" src="../../semantic/examples/assets/library/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../semantic/dist/semantic.min.css">
	<script src="../../semantic/dist/semantic.min.js"></script>
	<link rel="icon"  href="../../img/logo.png">
	<link rel="stylesheet" type="text/css" href="sistema.css">
</head>
<body>
<?php
  include('includes/menu.php');
 ?>
<div class="ui horizontal segments" id="todascolunas">
  <div class="ui segment" id="coluna1">
 	
  </div>
  <div class="ui segment" id="coluna1">
   <h1 class="ui centered header">Gerenciar avaliações</h1>
   <table width="100%"  class="ui table">
      <thead style="background-color:#fff;">
        <tr>
          <th  style="padding-left:80px" >Solicitante</th>
          <th>Denunciado</th>
          <th>Motivação</th>
          <th>Responder</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $adm = $objAdms->analise();
        foreach ($adm as $user => $value): 
         ?>
       <tr>
        <td><?php echo $value['denunciante_id']; ?></td>
        <td><?php echo $value['denunciado_id']; ?></td>
        <td><?php echo $value['motivacao']; ?></td>
        <td><button class="ui yellow button">Responder</button></td>
        <td><button class="ui red button">Deletar avaliação</button></td>
      </tr>
      <?php 
      endforeach;
      ?>
    </tbody>

  </table>
  </div>

</div>
</body>
</html>