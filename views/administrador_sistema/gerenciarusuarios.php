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
    <div class="ui segment" id="coluna2">
     <h1 class="ui centered header">Gerenciar usuarios</h1>
     <form class="ui form segment" action="php/novoadmin.php"  method="post">

      <div class="field">
        <label>Nome</label>
        <input type="text" name="nome" placeholder="Digite um nome">

      </div>
      
      <div class="field">
        <label>Sobrenome</label>
        <input type="text" name="sobrenome" placeholder="Digite um sobrenome">

      </div>

      <div class="field">
        <label>Email</label>
        <input type="text" name="email" placeholder="Digite um email">
      </div>
      
      <div class="field">
        <label>Senha</label>
        <input type="text" name="senha" placeholder="Digite uma senha">
      </div>
      <div style="margin-top: 10px;">
        <button class="ui blue button" type="submit"><i class="check green icon"></i>Cadastrar</button>
      </div>
      
    </form>
    <div class="ui divider"></div>
    <h2 style="color:green;"><i class="users icon"></i>Lista de usuarios cadastrados</h2>
    <table width="100%"  class="ui table">
      <thead style="background-color:#fff;">
        <tr>
          <th  style="padding-left:80px" >Nome</th>
          <th>Sobrenome</th>
          <th>Email</th>
          <th>Editar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $users = $objAdms->todosusuarios();
        foreach ($users as $user => $value): 
         ?>
       <tr>
        <td><?php if($value['perfil'] == 1 || $value['perfil'] == 4){ ?> <div class="ui blue ribbon label">Admin</div> <?php }else if ($value['perfil'] == 2||$value['perfil'] == 3){?> <div class="ui orange ribbon label">User</div>  <?php } ?><?php  echo $value['nome']; ?></td>
        <td><?php echo $value['sobrenome']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><a href="?p=editaradmin&edit=true&id=<?php echo $value['id']; ?>" class="ui green button"><i class="edit icon"></i>Editar</a></td>
        <td><a href="?excluir=true&id=<?php echo $value['id']; ?>" class="ui red button"><i class="remove icon"></i>Deletar</a></td> 
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