<script type="text/javascript">
  $( document ).ready(function() {
    $('.message .close')
    .on('click', function() {
      $(this)
      .closest('.message')
      .transition('fade');
    })
    ;
    setTimeout(function() {
      $('.message').fadeOut('fast');}, 9000);
    $('.button')
    .popup({
      inline: true,
      on : 'click',
      position   : 'bottom center'
    })
    ;
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
  // aumentando a fonte
  $(".inc-font").click(function () {
    var size = $("body").css('font-size');
    size = size.replace('px', '');
    size = parseInt(size) + 1;
    $("body p,h3,h1 ").animate({'font-size':'30px'});
    $("body label").animate({'font-size':'17px'});
    $("body #lin").animate({'font-size' : '17px'});
    $("body a ").animate({'font-size' : '17px'});
  });
  //diminuindo a fonte
  $(".dec-font").click(function () {
    var size = $("body").css('font-size');
    size = size.replace('px', '');
    size = parseInt(size) - 1.4;
    $("body h1").animate({'font-size':'27px'});
    $("body label").animate({'font-size':'10PX'});
    $("body p,h3 ").animate({'font-size':'20px'});
    $("body label").animate({'font-size':'17px'});
    $("body a ").animate({'font-size' : '15px'});
  });
  // resetando a fonte
  $(".res-font").click(function () {
    $("body").animate({'font-size' : '10px'});
  });
  $(".contrasteOn").click(function() {
    $("body,#tudo,#menucon,#notif,#configuracoes,button,input,textarea,.field,h1,#post2_post,a,#perfilcol,#primeiroitem,#acess,label,.item,.menu,.text,ui.column,ui.modal,#modalsite,p").css({
      "background": "black",
      "color":"white"
    });
    $("#perfilcol,button,input,#post2_post,#menucon,#acess").css({
      "background": "black",
      "color":"white",
      "border": "solid 1px white"
    });
  });
  $(".contrasteOff").click(function() {
   $("#menucon,#notif,#configuracoes").css({
    "background": "orange",
    "color":"red"
  });
 });
});
</script>
<script type="text/javascript" language="javascript">
  $(function($) {
        // Quando clicando em "Mais frases"
        $("#notif,#body").click(function() {
            // Recuperamos o ID da última frase selecionada
            var ultimo = $("#resnoti p").attr("lang");
            $("#resnoti").empty();
            // Mensagem de carregando
            // $("#status").html("<img src='' alt='Enviando' />");
            // Faz requisição ajax e envia o ID da última frase via método POST
            setTimeout(function(resposta) {
              $.post("php/notificacao.php", {ultimo: ultimo}, function(resposta) {
               // Limpa a mensagem de carregamento
               $("#status").empty();
               // Coloca as frases na DIV
               $("#resnoti").append(resposta);
             });
            });
          });
      });
    </script>
    <header id="menucon" >
      <h1 class="float-l">
        <a id="naoaumenta" href="timeline" title="A'FAID" style="
        color: #fff;
        text-decoration: none;
        position: absolute;
        left: 16%;
        font-size: 40px;
        top: 5%;
        "><img style="width: 25%;" src="img/Logo_atual_A'faid.png"></a>
      </h1>
      <div style="
      position: absolute;
      margin-left: 25px;
      top: 19px;
      /* text-decoration: none; */
      /* text-align: center; */
      ">
      <a style="
      border: solid 1px white;
      padding: 10px;
      color: white;
      text-decoration: none;
      cursor: pointer;
      " class='inc-font' title='Aumentar fonte' > A+</a>
      <a style="
      border: solid 1px white;
      padding: 10px 12px 10px 10px;
      color: white;
      text-decoration: none;
      cursor: pointer;
      " class='dec-font' title="Diminuir fonte" > A-</a>
      <a style="
      border: solid 1px white;
      padding: 10px 12px 10px 10px;
      color: white;
      text-decoration: none;
      cursor: pointer;
      " class='contrasteOn' id="contraste" title="Diminuir fonte" > 0</a>
    </div>
    <input type="checkbox" id="control-nav" />
    <label for="control-nav" class="control-nav"></label>
    <label for="control-nav" class="control-nav-close"></label>
    <nav class="float-r">
      <ul class="">
        <li>
          <!-- 1 -->
          <form id="busca-menu" method="get" action="busca.php" >
            <div id="">
              <div class="ui action input">
                <input type="text" name="s" placeholder="Pesquisar..." style="
                width: 142px;
                ">
                <button class="ui green icon button">
                  <i class="search icon"></i>
                </button>
              </div> 
            </div>
          </form>



          <div class="ui middle aligned animated list" id="perfilmenu2" style="
          margin-top: 35px;
          color: white;
          margin-left: 11px;
          ">
          <div class="cima">
            <?php 
            if ($user_perfil == 3) {
              ?>
              <img  src="<?php echo $user_capa; ?>" style="
              width: 325px;
              position: absolute;
              margin-left: -21px;
              margin-top: -23px;
              height: 125px;
              box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
              ">
              <?php
            }else{
              ?>
              <img   src="uploads/usuarios/<?php echo $user_capa; ?>" style="
              width: 299px;
              position: absolute;
              margin-left: -23px;
              margin-top: -23px;
              height: 125px;
              box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
              ">
              <?php
            }
            ?>
            <a href="perfil"><img class="imgperfil" src="<?php echo $_SESSION['imagemperfil'] ?>" alt="<?php echo $user_nome ?>" title="<?php echo $user_nome ?>" /></a>
            <!-- <img src="img/person.png" class="imgperfil"> -->
            <a class="nameuser" href="perfil"><?php echo $user_nome ?></a>
          </div>
          <!-- item 1  -->
          <div id="primeiroitem2">
            <a id="hover" href="timeline">
              <div class="item" id="itempost">
                <i id="icon" class="home large icon"></i>
                <div class="content">
                  <div id="titulo" class="header">Início</div>
                </div>
              </div>
            </a>
          </div>

          <div class="itemtudo2" >
            <a id="hover" href="perfil">
              <div class="item" id="itempost">
                <i id="icon" class="user large icon"></i>
                <div class="content">
                  <div id="titulo" class="header">Perfil</div>
                </div>
              </div>
            </a>
          </div>

          <div class="itemtudo2" >
            <a id="hover" href="notificacoes.php">
              <div class="item" id="itempost">
                <i id="icon" class="alarm large icon"></i>
                <div class="content">
                  <div id="titulo" class="header">Notificações</div>
                </div>
              </div>
            </a>
          </div>

          <div class="itemtudo2" >
            <a id="hover" href="configurações">
              <div class="item" id="itempost">
                <i id="icon" class="write large icon"></i>
                <div class="content">
                  <div id="titulo" class="header">Editar perfil</div>
                </div>
              </div>
            </a>
          </div>
          <!-- item 2  -->
          <div class="itemtudo2">
            <a id="hover" href="ranking.php">
              <div class="item" id="itempost">
                <i id="icon" class="star large icon"></i>
                <div class="content">
                  <div id="titulo" class="header">Ranking</div>
                </div>
              </div>
            </a>
          </div>
          <!-- item 3  -->
          <div class="itemtudo2">
            <a id="hover" href="ajuda">
              <div class="item" id="itempost">
                <i id="icon" class="help large icon"></i>
                <div class="content">
                  <div id="titulo" class="header">Ajuda</div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li id="linot" class="not-menu">
        <div id="notif" style="
        background: #FF5722;
        color: white;
        margin-top: -10px;
        /* margin-left: -400px; */
        position: absolute;
        right: 31%;
        " class="ui right floated button"><i class=" big alarm  icon"></i></div>
        <div id="resnoti" class="ui popup inverted" style="width: 300px; ">
          <p lang="<?php echo $_SESSION['userid'] ?>" style="display:none"></p>

        </div>   
      </li>
      <li id="liconf" class="conf-menu">
        <!-- 3 -->
        <div id="configuracoes" style="
        background: #FF5722;
        color: white;
        margin-top: -10px;
        margin-left: 20px;
        position: absolute;
        right: 26%;
        " class="ui right floated button"><i class=" big setting outline icon"></i></div>
        <div class="ui popup inverted" style="width: 300px; ">
          <a href="configuracoes.php"><i class="user icon"></i>Configurações de conta</a>
          <a href="?sair=true"><i class="sign out icon"></i>Sair</a>
        </div> 
      </li>
      <li>
        <!-- 4 -->
      </li>
    </ul>
  </nav>
</header>