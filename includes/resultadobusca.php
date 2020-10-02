<!-- classe exibe resultado da pesquisa de amigos -->

<div class="column">
	<div  class="ui  card">
		<a class="image" href="perfil-<?php echo $resbusca['id'] ?>">
			<img src=<?php echo $resbusca['imagem'] ?>>
		</a>
		<div class="content">
			<a class="header" href="perfil-<?php echo $resbusca['id']  ?>"><?php echo "".$resbusca['nome']."";  ?></a>
			<div class="meta">
				<span class="date"></span>
			</div>
			<div class="description"></div>
		</div>
		<div class="extra content">
			<a>
				<?php
				$e_meu_amigo = DB::getConn()->prepare('SELECT * FROM `amizade` WHERE (user_id=? AND seguindo_id=?) LIMIT 1');
				$e_meu_amigo->execute(array($idDaSessao,$resbusca['id']));
				$e_meu_amigo2 = DB::getConn()->prepare('SELECT * FROM `amizade` WHERE (seguindo_id=? AND user_id=?) LIMIT 1');
				$e_meu_amigo2->execute(array($idDaSessao,$resbusca['id']));

				if($e_meu_amigo->rowCount()==0 and $e_meu_amigo2->rowCount()==0){
					echo "
					<a id='eumesmo".$_SESSION['idex']."'  class='large circular green right floated circular ui button' class='adamigo' href='php/action2.php?id=$busca&do=follow'>Seguir</a>
					";
				}else if ($e_meu_amigo2->rowCount()==1 and $e_meu_amigo->rowCount()==1){
					echo "
					<a class='large circular red right floated circular ui button' <a id='eumesmo".$_SESSION['idex']."'  class='adamigo' href='php/action2.php?id=$busca&do=unfollow'>Deixar de seguir</a>
					";
				}else if ($e_meu_amigo->rowCount()==1 or $e_meu_amigo2->rowCount()==0){
					echo "
					<a class='large circular red right floated circular ui button'  class='adamigo' href='php/action2.php?id=$busca&do=unfollow'>Deixar de seguir</a>
					";
				}else if($e_meu_amigo->rowCount()==0 or $e_meu_amigo2->rowCount()==1){
					echo "
					<a class='large circular green right floated circular ui button' id='eumesmo'  class='adamigo' href='php/action2.php?id=$busca&do=follow'>Seguir</a>
					";
				}
				?>
			</a>
		</div>
	</div>
</div>



