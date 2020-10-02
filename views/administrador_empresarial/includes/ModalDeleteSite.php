<div class="ui small modal" id="modaldeletesite">
<div class="ui centered header">
Excluir site
</div>
<div class="content">
<h3 class="ui header">Tem certeza que deseja excluir este site ?</h3>
<form method="POST" action="php/deletesite.php" class="ui form ">
<div class="field">
<input type="hidden" name="idsite" value="<?php echo $_GET['idexsite'] ?>">
<input type="submit" class="ui positive button">
<a class="ui negative button" href="gerenciarsite.php">Cancelar</a>
</div>
</form>
</div>
</div>