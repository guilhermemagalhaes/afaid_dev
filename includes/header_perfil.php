
<a href="index.php" class="logo">A'FAID</a>


<form id="searchbox" name="pesquisa-all" action="busca.php" method="get" autocomplete="off">
  <input name="s" type="text" size="25" placeholder="Digite aqui sua pesquisa..." />
  <input id="button-submit" type="submit" value=" "/>
</form>


      <div class="blocos" id="foto-perfil">
        <a href="#"><img src="uploads/usuarios/<?php echo $user_imagem; ?>" alt="<?php echo $user_nome ?>" title="<?php echo $user_nome ?>" /></a>
        <?php if($idDaSessao==$idExtrangeiro): ?>
          <a href="perfil.php?perfil=UPLOAD" id="alterar-foto" >alterar foto</a>
        <?php endif; ?>
      </div><!--blocos-->

      <!-- <p class="centered"><a href="perfil.php?uid=<?php echo $idExtrangeiro ?>" class="perfil"><img src="uploads/usuarios/<?php echo $user_imagem; ?>" alt="<?php echo $user_nome ?>" title="<?php echo $user_nome ?>" class="img-circle" width="60"></a></p> -->
      <h5 class="centered"><?php echo $user_nome?></h5>


      <li class="mt">         
        <a href="?sair=true">
          <span>Sair</span>
        </a>
      </li>


      <li>
        <?php 
        if($idDaSessao<>$idExtrangeiro){
          $e_meu_amigo = DB::getConn()->prepare('SELECT * FROM `amizade` WHERE (de=? AND para=?) OR (para=? AND de=?) LIMIT 1');
          $e_meu_amigo->execute(array($idDaSessao,$idExtrangeiro,$idDaSessao,$idExtrangeiro));

          if($e_meu_amigo->rowCount()==0){
            echo '<a href="php/amizade.php?ac=convite&de='.$idDaSessao.'&para='.$idExtrangeiro.'">adicionar amigo</a>';
          }else{
            $asstatusamisade = $e_meu_amigo->fetch(PDO::FETCH_ASSOC);
            if($asstatusamisade['status']==0){
              echo '<a href="php/amizade.php?ac=remover&id='.$asstatusamisade['id'].'&de='.$idDaSessao.'&para='.$idExtrangeiro.'">cancelar pedido</a>';
            }else{
              echo '<a href="php/amizade.php?ac=remover&id='.$asstatusamisade['id'].'&de='.$idDaSessao.'&para='.$idExtrangeiro.'">remover amigo</a>';
            }
          }
        }
        ?>
        
      </li>
