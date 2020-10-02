<div class="ui modal" id="modalanalise">
 <i class=" ui close link big icon"></i>
 <div class="ui centered header">Solicitar analise</div>
 <div class="content">
   <form class="ui form segment" method="POST" action="php/analise.php">
    <div class="field">
      <label>Motivação</label>
      <textarea name="motivacao" cols="5">
      </textarea>
    </div>

    <input type="hidden" name="idlocal" value="<?php echo $_GET['localid'] ?>">
    <input type="hidden" name="localnome" value="<?php echo $_GET['localnome'] ?>">
    <input type="hidden" name="denunciado" value="<?php echo $_GET['denunciado'] ?>">
    <input type="hidden" name="conteudo" value="<?php echo $_GET['conteudo'] ?>">
    <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
    <!-- enviar -->
    <input type="submit" class="ui positive button" value="Enviar">
    <a class="negative ui button" href="gerenciarsite.php">Cancelar</a>
  </form>
</div>
</div>