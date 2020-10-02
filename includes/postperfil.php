<!-- exibe post no perfil do usuario -->
<?php 
if ($list['tipo_avaliacao'] == 'local') {
 $cor = 'orange';
}else if ($list['tipo_avaliacao'] == 'site'){
  $cor = 'teal';
}

?>

<div id="acess" class=" ui centered column" style="
width: 805px;
">
<div  class="ui <?php echo $cor; ?> segment" id="<?php echo $list['id'] ?>">
  <div>
    <img class="ui middle aligned circular image" src="<?php echo $user_imagem; ?>" style="
    width: 70px;
    ">
    <a href="perfil.php?uid=<?php echo $idExtrangeiro ?>"> <span style="
      /* text-decoration: underline; */
      font-size: 25px;
      margin-left: 10px;
      "><?php echo $list['nome'] ?></span> </a> 
    </div>
    <?php if ($list['user']==$idDaSessao): ?>         
      <div style="
      background: white;
      color: black;
      margin-top: -60px;
      " class="ui right floated button"><i class=" big angle down icon"></i></div>
      <div class="ui inverted popup">
        <div class="ui">
          <form action="perfil" method="POST" >
           <input type="hidden" name="editpost" value="<?php $_SESSION['pagina'] = 'perfil' ?>">
           <input type="hidden" name="ideditar" value="<?php echo $list['id'] ?>">
           <button class="ui button" style="width: 160px;margin-left: -13px;" id="acao_post"><a type="submit" class="ui header"><i class="icon inverted edit"></i>Editar</a></button>
         </form>
       </div>
       <div class="ui ">
         <form action="perfil" method="POST">
          <input type="hidden" name="deletepost" value="<?php $_SESSION['pagina'] = 'perfil' ?>">
          <input type="hidden" name="iddelete" value="<?php echo $list['id'] ?>">
          <button style="width: 160px;margin-left: -13px;" class="ui button" id="acao_post" ><a type="submit" class="ui header"><i class=" icon inverted delete"></i>Excluir</a></button>
        </form>
      </div>
    </div>
    <?php 
    endif ?> 
    <div class="ui items">
      <div class="item">
        <?php if ($list['foto']==''){
        } else{
          ?>
          <a class="ui medium image">
            <img src="uploads/posts/<?php echo $list['foto'] ?>">
          </a>
          <?php
        }
        ?>
        <div class="content">
          <a  class="header"><?php echo $list['local'] ?></a> <br>
          <h4 class=" ui right aligned header"><?php
            $datelist = $list['data'];
            echo strftime("%d de %B de %Y", strtotime( $datelist )); ?></h4>
            <div class="description">
              <p><?php echo $list['descricao'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <h4 class="ui horizontal divider header">
        <i class="user icon"></i>
        Opiniões
      </h4>
      <?php 



      $devolvecomentario = $objCom->show_comentario($list['id']);
      foreach ($devolvecomentario as $key => $valuecomentario){
        ?>

        <div class="ui comments">
        <div class="comment">
          <a class="avatar" href="perfil-<?php echo $valuecomentario['usuario_id'] ?>">
            <img id="imgcomentario_post"  class="ui small imagem" src="<?php echo $valuecomentario['imagem']; ?> ">
          </a>
          <div class="content">
            <a class="author" href="perfil.php?uid=<?php echo $valuecomentario['usuario_id']; ?>"><?php echo $valuecomentario['nome']; ?></a>
            <div class="metadata" >
              <div class="date" ><?php
                $date = $valuecomentario['data'];
                echo strftime("%d de %B de %Y", strtotime( $date )); ?></div>
                <?php if ($valuecomentario['usuario_id'] == $_SESSION['idex']): ?>
                <div class="date">

                  <button id="editarcomentario"  style="
                  background: white;
                  color: orange;
                  " class="ui button editar <?php echo $valuecomentario['id']; ?>">
                  Editar
                </button>

                <button class="ui button exlcluir" style="
                background: white;
                color: orange;
                ">
                Excluir
              </button>
            </div>
            <?php
            endif ?>

            <script type="text/javascript" style="display:none;">

             $(function editarcoment(){

               $(".ui.button.editar.<?php echo $valuecomentario['id']; ?>").click(function() {

                $("#enviarcomentario<?php echo $valuecomentario['id']; ?>").css({
                  "display": "block"
                });

                $("#textocomentario<?php echo $valuecomentario['id']; ?>").css({
                  "display": "none"
                });

                $("#dpveracidade<?php echo $valuecomentario['id']; ?>").css({
                  "display": "block"
                });

                $("#txteditcomentario<?php echo $valuecomentario['id']; ?>").css({
                  "display": "block"
                });

                $("#lbopniao<?php echo $valuecomentario['id']; ?>").css({
                  "display": "block"
                });

                $("#cancelacomentario<?php echo $valuecomentario['id']; ?>").css({
                  "display": "block"
                });

                $("#form<?php echo $valuecomentario['id']; ?>").removeClass("ui form");

                 $("#form<?php echo $valuecomentario['id']; ?>").addClass("ui form segment");

              });
             });
           </script>
         </div>
         <div id="textocomentario<?php echo $valuecomentario['id']; ?>" class="text comentario"><p> <?php echo $valuecomentario['comentario']; ?>   </p> </div>
         <form method="POST" id="form<?php echo $valuecomentario['id']; ?>" class="ui form " action="php/editarcomentario.php">
         <div class="field">
         <label style="display:none" id="lbopniao<?php echo $valuecomentario['id']; ?>">Opinião</label>
          <input type="text" style="display: none" id="txteditcomentario<?php echo $valuecomentario['id']; ?>" name="editcomentario" value="<?php echo $valuecomentario['comentario'] ?>">
          </div>
          <input type="hidden" name="pagina" value="perfil">
          <input type="hidden" name="idpost" value="<?php echo $list['id'] ?>">
          <input type="hidden" name="idcomentario" value="<?php echo $valuecomentario['id'] ?>;">
          <input type="hidden" name="idusuario" value="<?php echo $valuecomentario['usuario_id'] ?>">

          <div id='dpveracidade<?php echo $valuecomentario['id']; ?>' class="ui compact selection dropdown" style="
            display: none;
            " >
            <input type="hidden" name="veracidade">
            <i id='setadp' class="dropdown icon"></i>
            <div class="text">VERACIDADE: <?php echo strtoupper($valuecomentario['veracidade']); ?></div>
            <div class="menu">
              <div class="item">Verdadeira</div>
              <div class="item">Falsa</div>
              <div class="item">Duvidosa</div>
            </div>
          </div>
          <div class="ui rigth floated buttons">
          <input type="submit" class="ui positive button" id="enviarcomentario<?php echo $valuecomentario['id'] ?>" name="enviar" style='display: none; margin-top: 15px;'>
          <input type="submit" class="ui negative button" id="cancelacomentario<?php echo $valuecomentario['id'] ?>" value="Cancelar" name="cancelar" style='display: none; margin-top: 15px; '>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="ui small modal" id="modalcomentario">
    <i class="close icon"></i>
    <div class="header">
      Excluir Opinião
    </div>
    <div class="content">
      <p>Tem certeza que deseja excluir essa opinião ? </p>
      <form method="post" action="php/deletecomentario.php" >
        <input type="hidden" name="pagina" value="perfil">
        <input type="hidden" name="idpost" value="<?php echo $list['id'] ?>">
        <input type="hidden" name="idcomentario" value="<?php echo $valuecomentario['id'] ?>">
        <input type="hidden" name="idusuario" value="<?php echo $valuecomentario['usuario_id'] ?>">
        <a class="negative ui button" href="">Cancelar</a>
        <input type="submit" class="positive ui button" value="Excluir">
      </form> 
    </div>
  </div>

       
    <?php
  }
  ?>
  <form method="POST" id="comentario" class="ui form" action="php/addcomentario.php">
    <div class="field">
      <div class="ui fluid action input">
        <input type="hidden" name="idpost_comentario" value="<?php echo $list['id'] ?>">
        <input type="hidden" name="idpost" value="<?php echo $list['id'] ?>">
        <input type="hidden" name="iddono" value="<?php echo $list['user'] ?>">
        <input type="hidden" name="pagina" value="perfil">
        <input autocomplete="off" type="text" name="comentario" placeholder="Opine sobre a avaliação">
        <div class="ui compact selection dropdown">
          <input type="hidden" name="veracidade">
          <i class="dropdown icon"></i>
          <div class="text">Veracidade</div>
          <div class="menu">
            <div class="item">Verdadeira</div>
            <div class="item">Falsa</div>
            <div class="item">Duvidosa</div>
          </div>
        </div>
        <button class="ui positive button" type="submit"><i class="white large send outline icon"></i></button>
      </div>
    </div>
  </form>
</div>
</div>