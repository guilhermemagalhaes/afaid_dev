<div class="ui modal" id="modaleditlocal">
 <i class=" ui close link big icon"></i>
 <div class="ui centered header">Editar local</div>
 <div class="content">
   <form class="ui form segment" method="POST" action="php/editarlocal.php">
    <div class="field">
      <label>Nome do local</label>
      <input type="text" name="nomelocal" value="<?php echo $_GET['nome']; ?>">
    </div>
    <div class="field">
      <label>Endereço</label>
      <input type="text" name="endereco" value="<?php echo $_GET['endereco']; ?>">
    </div>
    
    <input type="hidden" name="idlocal" value="<?php echo $_GET['idlocal'] ?>">
    <!-- enviar -->
    <input type="submit" class="ui positive button" value="Enviar">
    <a class="negative ui button" href="gerenciarsite.php">Cancelar</a>
  </form>
</div>
</div>