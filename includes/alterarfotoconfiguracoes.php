<!-- exibe modal para alterar foto na pagine de configuraçoes -->
<div class="ui modal">
	<i class="close icon"></i>
	<div class="header">
		Alterar foto
	</div>
	<div class="image content">
		<div class="ui medium image">
			<img src="<?php echo $user_imagem; ?>">
		</div>
		<div class="description">
			<div class="ui header">
				<form name="upload-foto-perfil" enctype="multipart/form-data" method="post" action="php/crop.php">
					<input type="file" name="foto-perfil" />
					<input type="hidden" name="imgantiga" value="<?php echo $user_imagem ?>" />
					<input type="hidden" name="upload2" value="perfil" />
					<input type="hidden" name="uid" value="<?php echo $idDaSessao ?>"/>
				</div>
			</div>
		</div>
		<div class="actions">
			<div class="ui red deny button">
				Cancelar
			</div>
			<input class="ui positive right button" type="submit" name="salvar2" value="salvars" />
		</form>
	</div>
</div>