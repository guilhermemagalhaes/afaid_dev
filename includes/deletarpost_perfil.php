<!-- <script type="text/javascript">
	alert('oi');
</script> -->

<div class="ui small modal">
	<i class="close icon"></i>
	<div class="header">
   Excluir avaliação
  </div>

  <div class="content">

<p>Tem certeza que deseja excluir essa avaliação </p>

<?php 
	include ('includes/postdelete.php');
?>


<form method="post" action="php/delete_post_perfil.php" >
<input type="hidden" name="idpost" value="<?php echo $value['id'] ?>">
<a class="negative ui button" href="">Cancelar</a>
<input type="submit" class="positive ui button" value="Excluir">
</form>
  	
  </div>




</div>