<div class="ui small modal" id="modaldeletelocal">
<div class="ui centered header">
Excluir site
</div>
<div class="content">
<h3 class="ui header">Tem certeza que deseja excluir este local ?</h3>
<form method="POST" action="php/deletelocal.php" class="ui form ">
<div class="field">
<input type="hidden" name="idlocal" value="<?php echo $_GET['idexlocal'] ?>">
<input type="submit" class="ui positive button">
<a class="ui negative button" href="gerenciarsite.php">Cancelar</a>
</div>
</form>
</div>
</div>