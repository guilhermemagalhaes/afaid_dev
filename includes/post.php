    <?php 
    if ($list['tipo_avaliacao'] == 'local') {
     $cor = 'orange';
   }else if ($list['tipo_avaliacao'] == 'site'){
    $cor = 'teal';
  }
  ?>
  <div  style=" width: 78%;"    class="ui column" id="<?php echo $list['id'] ?>" >
    <div style=" box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);" id="post2_post" class="ui <?php $_SESSION['disa'] ?> <?php echo $cor; ?> segment">
      <div>
        <a href="perfil-<?php echo $list['user'] ?>"><img id="imguser" class="ui middle aligned circular image" src="<?php echo $list['imagem']; ?>" ></a>
        <a  href="perfil.php?uid=<?php echo $list['user'] ?>"> <span id="nomeuser_post"><?php echo $list['nome'] ?></span> </a> 
        <?php if ($list['user']==$_SESSION['idex']): ?>
         <!-- <h3 class="ui header">Avalie ou denuncie</h3> -->
         <div id="acess" style="
         background: white;
         color: black;
         padding-right: 0;
         padding-top: 20px;
         " class="ui right floated button"><i class=" big angle down icon"></i></div>
         <div class="ui inverted popup">
          <form action="timeline" method="POST" >
           <input type="hidden" name="editpost" value="<?php $_SESSION['pagina'] = 'timeline' ?>">
           <input type="hidden" name="ideditar" value="<?php echo $list['id'] ?>">
           <button class="ui button" style="width: 160px;margin-left: -13px;" id="acao_post"><a type="submit" class="ui header"><i class="icon inverted edit"></i>Editar</a></button>
         </form>
         <form action="timeline" method="POST">
          <input type="hidden" name="deletepost" value="<?php $_SESSION['pagina'] = 'timeline' ?>">
          <input type="hidden" name="iddelete" value="<?php echo $list['id'] ?>">
          <button style="width: 160px;margin-left: -13px;" class="ui button" id="acao_post" ><a type="submit" class="ui header"><i class=" icon inverted delete"></i>Excluir</a></button>
        </form>
      </div>
      <?php
      endif ?>
    </div>
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
          <h4 class=" ui right aligned header" style="
          color: #bdc3c7;
          "><?php
          $datelist = $list['data'];
          echo strftime("%d de %B de %Y", strtotime( $datelist )); ?></h4>
          <div class="description">
            <p><?php echo $list['descricao'] ?></p>
          </div>
        </div>
      </div>
    </div>
    <h4 class="ui horizontal divider header">
      <i class="comments icon"></i>
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

                 $("#textocomentario2<?php echo $valuecomentario['id']; ?>").css({
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
         <div id="textocomentario<?php echo $valuecomentario['id']; ?>" class="text comentario"><p> <?php echo $valuecomentario['comentario']; ?> </p> </div>

         <div id="textocomentario2<?php echo $valuecomentario['id']; ?>" class="text comentario"><p>Veracidade: <?php echo $valuecomentario['veracidade']; ?>   </p> </div>

         <form method="POST" id="form<?php echo $valuecomentario['id']; ?>" class="ui form " action="php/editarcomentario.php">
         <div class="field">
         <label style="display:none" id="acess" id="lbopniao<?php echo $valuecomentario['id']; ?>">Opinião</label>
         <div class="field">
          <input type="text" style="display: none" id="txteditcomentario<?php echo $valuecomentario['id']; ?>" name="editcomentario" value="<?php echo $valuecomentario['comentario'] ?>">
          </div>
          </div>
          <input type="hidden" name="pagina" value="timeline">
          <input type="hidden" name="idpost" value="<?php echo $list['id'] ?>">
          <input type="hidden" name="idcomentario" value="<?php echo $valuecomentario['id'] ?>;">
          <input type="hidden" name="idusuario" value="<?php echo $valuecomentario['usuario_id'] ?>">
          <div class="field">
          <div  id='dpveracidade<?php echo $valuecomentario['id']; ?>' class="ui compact selection dropdown" style="
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
          </div>
          <div class="ui rigth floated buttons">
          <input type="submit" class="ui positive button" id="enviarcomentario<?php echo $valuecomentario['id'] ?>" name="enviar" style='display: none; margin-top: 15px;'>
          <input type="submit" class="ui negative button" id="cancelacomentario<?php echo $valuecomentario['id'] ?>" value="Cancelar" name="cancelar" style='display: none; margin-top: 15px; '>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="ui modal" id="modalcomentario">
    <i class="close icon"></i>
    <div class="header">
      Excluir Opinião
    </div>
    <div class="content">
      <p>Tem certeza que deseja excluir essa opinião ? </p>
      <form method="post" action="php/deletecomentario.php" >
        <input type="hidden" name="pagina" value="timeline">
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
  <div class=" field">
    <input type="hidden" name="pagina" value="timeline">
    <input type="hidden" name="iddono" value="<?php echo $list['user'] ?>">
    <input type="hidden" name="idpost" value="<?php echo $list['id'] ?>">
    <div class="ui fluid action input">
      <input type="hidden" name="idpost_comentario" value="<?php echo $list['id'] ?>">
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
      <div class="ui compact selection dropdown" style="padding: 5px 15px 5px 10px">
        <input type="hidden" name="reacao">
        <i class="dropdown icon"></i>
        <div class="text"><img src="images/default.jpeg"></div>
        <div class="menu">
          <div class="item"><img src="images/haha.png"></div>
          <div class="item"><img src="images/love.png"></div>
          <div class="item"><img src="images/plus.png"></div>
          <div class="item"><img src="images/raiva.png"></div>
          <div class="item"><img src="images/triste.png"></div>
          <div class="item"><img src="images/uau.png"></div>
        </div>
      </div>
      <button class="ui positive button" type="submit"><i class="white large send outline icon"></i></button>
    </div>
  </div>
</form>
</div>
</div>




