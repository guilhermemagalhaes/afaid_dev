<!-- esse pagina e responsavel por exibir as avaliaçoes de acordo
com as escolhas do usuario, ou seja quem ele segue, aqui o usuario
tambem pode comentar e editar e cadastrar novos post, alem de navegar
entre as paginas -->
<?php
// error_reporting(0);
include('includes/cabecalho.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>A'FAID</title>
 <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
 <!-- css desta pagina -->
 <link rel="stylesheet" type="text/css" href="css/configconta.css">
 <!-- links menu superior -->
 <link rel="stylesheet" href="css/menu.css">
 <!-- link semantic ui  -->
 <script type="text/javascript" src="semantic/examples/assets/library/jquery.min.js"></script>
 <script src="js/timeline.js"></script>
 <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
 <script src="semantic/dist/semantic.min.js"></script>
 <!-- <link rel="stylesheet" type="text/css" href="css/timeline.css"> -->
 <!-- icone da aba -->
 <link rel="icon"  href="img/logo2.png">
 <!-- <link rel="stylesheet" type="text/css" href="css//menu2.css"> -->
 <link rel="stylesheet" type="text/css" href="css/notificacao.css">
 <script type="text/javascript" src="js/notificacao.js"></script>
 <link rel="stylesheet" type="text/css" href="css/timeline.css">
</head>
<body style="background: #f1f1f1">
  <script type="text/javascript">
    $('.ui.dropdown')
    .dropdown()
    ;
    $(function() {
      $('.ui.form').form({
        Site: {
          identifier: 'nome_site',
          rules: [
          {
            type : 'url',
            prompt : 'Qual site deseja avaliar ?'
          }
          ]
        },
        Veracidade: {
          identifier: 'veracidade',
          rules: [
          {
            type : 'empty',
            prompt : 'Selecione a veracidade'
          }
          ]
        },
        editcomentario: {
          identifier: 'editcomentario',
          rules: [
          {
            type : 'empty',
            prompt : 'Opine em detalhes'
          }
          ]
        },
        descricao: {
          identifier: 'descsite',
          rules: [
          {
            type : 'empty',
            prompt : 'Conte em detalhes'
          }
          ]
        },
        comentario: {
          identifier: 'comentario',
          rules: [
          {
            type : 'empty',
            prompt : 'Conte em detalhes'
          }
          ]
        },
        categoria: {
          identifier: 'categoriaavl',
          rules: [
          {
            type : 'empty',
            prompt : 'Qual a categoria da avaliação?'
          }
          ]
        },
      }, {
        on: 'blur',
        inline: 'true'
      });
    });
  </script>
  <!-- inclui o menu superior -->
  <?php
  include('includes/menu.php');
  ?>
  <!-- contem todo conteudo da pagina -->
  <div class="ui centered stackable  column grid" id="tudo">
    <!-- inclui o menu esquerdo perfil -->
    <?php
    include('includes/perfilmenu.php');
    ?>
    <div id="clposts" class="ui column" >
     <!-- inclui modal de post local -->
     <?php
     include('includes/modalpostlocal.php');
     ?>
     <!-- inclui modal de post site -->
     <?php
     include('includes/modalpostsite.php');
     ?>
     <!-- <h3 class="ui header">Avalie ou denuncie</h3> -->
     <!-- botao adicionar novo post (site) -->
     <div class="ui centered basic segment" id="clpostsbuttons">
      <!-- <img src="img/webicon.png" > -->
      <button style=" box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);" id="btnsite" id="btnsite" class="ui teal button"><h2>Avaliar site</h2></button>
      <!-- botao adicionar novo post (local) -->
      <button style=" box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);" id="btnlocal" class="ui orange button" id="btnlocal"><h2>Avaliar local</h2></button>
    </div>
<!-- função responsavel por pegar os usuarios que você segue
  e incluir na timeline os post deles e o seus -->
  <script type="text/javascript" language="javascript">
    $(function($) {
        // Quando clicando em "Mais frases"
        $("#mais").click(function() {
            // Recuperamos o ID da última frase selecionada
            var ultimo = $("#tudo p:last").attr("lang");
            $("#mais").removeClass("ui active button");
            $("#mais").addClass("ui loading button");
            // Mensagem de carregando
            // $("#status").html("<img src='' alt='Enviando' />");
            // Faz requisição ajax e envia o ID da última frase via método POST
            setTimeout(function(resposta) {
              $.post("php/BuscaUltimoPost.php", {ultimo: ultimo}, function(resposta) {
               // Limpa a mensagem de carregamento
               $("#status").empty();
               $("#mais").removeClass("ui loading button");
               $("#mais").addClass("ui active button");
               // Coloca as frases na DIV
               $("#clposts").append(resposta);
             });
            }, 500);
          });
      });
    </script>
    <script type="text/javascript">
      $( document ).ready(function() {
        $('.small.modal')
        .modal('show')
        ;

        $(".ui.button.exlcluir").click(function() {
          $('#modalcomentario').modal('setting', 'scale').modal('show');
        });
      }); 
    </script>
    <?php
    $users = $objAmiz->show_users($_SESSION['userid']);
    $myusers = array();
    foreach ($users as $key => $value){
      array_push($myusers, $value['id']);
    }
    if (count($myusers)) {
      $myuser = array_keys($myusers);
    }else{
      $myuser = array();
    }
    array_push($myusers, $_SESSION['userid']);
    $sqlpost = DB::getConn()->prepare("SELECT id FROM avaliacao");
    $sqlpost->execute();
    $limite2 = $sqlpost->rowCount();
    if ($limite2>1) {
      for ($i=0; $i<6;$i++) { 
        $_SESSION['i'] = $i;
      }
    }
    $posts = $objAval->show_posts($myusers,$_SESSION['i']); 
    if (count($posts)){
      ?>
      <?php
      foreach ($posts as $key => $list){
        // inclui os post da timeline
        include('includes/post.php');
        ?>
        <p lang="<?php echo $list['id']; ?>" ></p>
        <?php
      }
      ?>
      <?php
    }else{
      ?>
      <style type="text/css">
        #mais{
          display: none;
        }
      </style>
      <!-- erro quando não existe avaliações -->
      <div id="semavaliacao" class="ui centered column">
        <div class="ui segment">
          <h3>Infelizmente você nem seus amigos fizeram avaliaçoes <b style="
            color: #c0392b;
            ">    FAÇA JA UMA AVALIAÇÃO</b></h3>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
  <span id="status"></span> 
  <a style="
  margin-left: 467px;
  margin-bottom: 20px;
  width: 41.5%;
  " class="ui orange active button" href="javascript:func()" id="mais">Mais avaliações »</a>
  <!-- <button class="ui loading button" style="opacity: 0;">Loading</button> -->
  <!-- codigo responsavel por verificar se editar e do usuario e editar post de local e site -->
  <?php 
  if(isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['editpost'])) {
     extract($_POST);
     $devolvepost = $objAval->show_postsedit($ideditar);
     $dadosuser = array();
     foreach ($devolvepost as $key => $value){     
      if ($idDaSessao==$value['user']) {
        include('includes/editarpost.php');
      }else{
        var_dump('não encontrado');
        exit();
      }
    }
  }
}
?>
<!-- função para deletar avaliaçoes da timeline -->
<?php 
if(isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['deletepost'])) {
   extract($_POST);
   $devolvepost = $objAval->show_postsedit($iddelete);
   $dadosuser = array();
   foreach ($devolvepost as $key => $value){   
    if ($idDaSessao==$value['user']) {
      include('includes/deletarpost.php');
    }else{
      var_dump('não encontrado');
      exit();
    }
  }
}
}
?>
</div><!-- fim de todo conteudo -->
<script type="text/javascript" src="js/editar.js"></script>
</body>
</html>

