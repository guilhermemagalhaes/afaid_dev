<div class="ui modal" id="modaleditsiteadm">
 <i class=" ui close link big icon"></i>
 <div class="ui centered header">Editar site</div>
 <div class="content">
   <form class="ui form segment" method="POST" action="php/editarsite.php">
    <div class="field">
      <label>Nome do site</label>
      <input type="text" name="sitenome" value="<?php echo $_GET['nome']; ?>">
    </div>
    <div class="field">
      <label>URL</label>
      <input type="text" name="url" value="<?php echo $_GET['url']; ?>">
    </div>
    
    <input type="hidden" name="idsite" value="<?php echo $_GET['idsite'] ?>">
    <!-- enviar -->
    <input type="submit" class="ui positive button" value="Enviar">
    <a class="negative ui button" href="gerenciarsite.php">Cancelar</a>
  </form>
</div>
</div>