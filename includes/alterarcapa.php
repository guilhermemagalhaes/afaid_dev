<!-- exibe modal para alterar capa na pagina de perfil -->
<div class="ui modal foto">
  <a href="perfil.php"><i class="close icon"></i></a>  
  <div class="header">
    Alterar foto
  </div>
  <div class="image content">
    <div class="ui medium image">
      <img src="uploads/usuarios/<?php echo $user_capa; ?>">
    </div>
    <div class="description">
      <div class="ui header">
        <form name="upload-foto-perfil" enctype="multipart/form-data" method="post" action="php/crop.php">
          <input type="file" accept="image/*" name="foto-perfil" />
          <input type="hidden" name="imgantiga" value="<?php echo $user_capa ?>" />
          <input type="hidden" name="upload4" value="perfil" />
          <input type="hidden" name="uid" value="<?php echo $idDaSessao ?>"/>
        </div>
      </div>
    </div>
    <div class="actions">
      <div class="ui red deny button">
        Cancelar
      </div>        
      <input class="ui positive right button" name="salvar3" type="submit" value="Salvar" />
    </form>
  </div>
</div>