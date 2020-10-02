<?php
// error_reporting(0);
echo ".";
include('includes/cabecalho.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Perfil <?php echo "$user_nome"; ?></title>
  <script type="text/javascript" src="semantic/examples/assets/library/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
  <script src="semantic/dist/semantic.min.js"></script>
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/perfil.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/configconta.css"> -->
  <link rel="stylesheet" type="text/css" href="css/notificacao.css">
  <script type="text/javascript" src="js/notificacao.js"></script>
  <link rel="stylesheet" type="text/css" href="css/timeline.css">
  <!-- icone da aba -->
  <link rel="icon"  href="school.png">
</head>
<body background="#f1f1f1">
  <script type="text/javascript">
    $( document ).ready(function() {

     $('.button')
     .popup({
      inline: true,
      on : 'click',
      position   : 'bottom center'

    })
     ;
   });
 </script>
 <!-- js para modal e dropdown -->
 <script>
  $(document)
  .ready(function() {
    $('.ui.dropdown')
    .dropdown({
      on: 'click'
    })
    ;

    $('.ui.modal.foto')
    .modal('show')
    ;

    $('.ui.small.modal.post')
    .modal('show')
    ;

    $(".ui.button.exlcluir").click(function() {
      $('#modalcomentario').modal('setting', 'scale').modal('show');
    });

    $('#modaledit').modal('setting', 'scale').modal('show');
  })
  ;

</script>
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
      descricao: {
        identifier: 'descsite',
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

<!-- final do js -->
<!-- incluindo menu superior -->
<?php 
include('includes/menu.php');
?>
<!-- fim do menu superior -->
<!-- começo de todo conteudo -->
<div class="ui  stackable five column grid" style="margin-top: 450px;">
  <!-- upload foto de perfil -->
  <?php
  if(isset($_GET['perfil']) AND $_GET['perfil']=='UPLOAD'){
    include('includes/alterarfotoperfil.php');
  }
  ?>
  <!-- fim do upload da foto de perfil -->
  <!-- upload da foto de capa -->
  <?php
  if(isset($_GET['perfil']) AND $_GET['perfil']=='UPLOADCAPA'){
   include('includes/alterarcapa.php');
 }
 ?>
 <!-- fim do upload da foto de capa -->
 <!-- coluna 1 -->
 <div class="column" id="tudo3" style=" 
 width: 100%;height: 75%;
 ">
 <?php
 if (isset($_SESSION['message_seguir'])){
  echo '<div id="msg" style="
  position: fixed;
  z-index: 100;
  /* float: right; */
  right: 3%;
  top: 15%;
  " class="ui '.$_SESSION['message_seguir_type'].' message">
  <i class="close icon"></i>
  <div class="header">
    Sucesso
  </div>
  <p>'.$_SESSION['message_seguir'].'</p>
</div>';
unset($_SESSION['message_seguir']);
}
?>
<?php 
if ($user_perfil == 3) {
  ?>
  <img class="ui fluid image"  src="uploads/usuarios/<?php echo $user_capa; ?>" style="
  width: 100%;height: 105%;
  ">
  <?php
}else{
 ?>
 <img class="ui fluid image"  src="uploads/usuarios/<?php echo $user_capa; ?>" style="
 width: 100%;height: 105%;
 ">
 <?php
}
?>
<?php if($idDaSessao==$idExtrangeiro): ?>
  <a href="perfil.php?perfil=UPLOADCAPA" id="alterar-foto2" ><i class="photo large icon"></i></a>
<?php endif; ?>
<div class="ui clearing segment" style="
width: 100%;
height: 142px;
margin-top: -145px;
margin-top: -2.2em !important;
background: rgba(0,0,0,0.3);
">
<div class="ui right floated" id="divimgperfil">

  <!-- <img id="imgperfil" src="http://graph.facebook.com/<?php echo $_SESSION['senha2']?>/picture?width=300&height=300"> -->

  <img style="position: absolute;" id="imgperfil" src="<?php echo $_SESSION['imagemperfil'] ?>">

  <?php if($idDaSessao==$idExtrangeiro): ?>
    <a href="perfil.php?perfil=UPLOAD" id="alterar-foto"  ><i class="photo large icon"></i></a>
  <?php endif; ?>
</div>
<h1 class="ui center aligned header" style="color: white">  <?php  echo "$user_nome";?></h1>
<?php if($idDaSessao<>$idExtrangeiro){

  $objAmiz->_setSeguindoId($idDaSessao);
  $following = $objAmiz->following();

  $e_meu_amigo = DB::getConn()->prepare('SELECT * FROM `amizade` WHERE (user_id=? AND seguindo_id=?) LIMIT 1');
  $e_meu_amigo->execute(array($idDaSessao,$idExtrangeiro));

  $e_meu_amigo2 = DB::getConn()->prepare('SELECT * FROM `amizade` WHERE (seguindo_id=? AND user_id=?) LIMIT 1');
  $e_meu_amigo2->execute(array($idDaSessao,$idExtrangeiro));

  if($e_meu_amigo->rowCount()==0 and $e_meu_amigo2->rowCount()==0){
   echo "
   <a data-position='top right' data-tooltip='Começar seguir amigo' class='large circular green right floated circular ui button' class='adamigo' href='php/action.php?id=$idExtrangeiro&do=follow'>Seguir</a>
   ";
 }else if ($e_meu_amigo2->rowCount()==1 and $e_meu_amigo->rowCount()==1){
   echo "
   <a data-position='top right' data-tooltip='deixar de seguir amigo' class='large circular red right floated circular ui button' class='adamigo' href='php/action.php?id=$idExtrangeiro&do=unfollow'>Deixar de seguir</a>
   ";
 }else if ($e_meu_amigo->rowCount()==1 or $e_meu_amigo2->rowCount()==0){
  echo "
  <a data-position='top right' data-tooltip='deixar de seguir amigo' class='large circular red right floated circular ui button' class='adamigo' href='php/action.php?id=$idExtrangeiro&do=unfollow'>Deixar de seguir</a>
  ";
}else if($e_meu_amigo->rowCount()==0 or $e_meu_amigo2->rowCount()==1){
  echo "
  <a data-position='top right' data-tooltip='Começar seguir amigo' class='large circular green right floated circular ui button' class='adamigo' href='php/action.php?id=$idExtrangeiro&do=follow'>Seguir</a>
  ";
}
}else{
  ?>
  <a style="
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
  "  data-position='top right' data-tooltip='Altere informaçoes de conta' class="ui circular green right floated button" id="lin" href="configurações">Configurações</a>

  
  <?php
}
?> 

</div>
</div><!-- fim da coluna 1 -->
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
    <div class="ui column grid" style="
    width: 105%;
    margin-top: 5px;
    ">
    <h4 title="Avaliações recentes" class="ui horizontal divider header" style="
    margin-top: 10px;
    ">
    <i title="ícone de uma estrela" class="star icon"></i>
    Avaliações recentes
  </h4>
  <?php
  $objAval->_setUser($idExtrangeiro);
  $postcon =$objAval->show_postsperfil();

  if (count($postcon)){
    ?>
    <?php
    foreach ($postcon as $key => $list){
     include('includes/postperfil.php');   
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

  <div class="ui centered column" style="
  width: 500px;
  ">
  <div class="ui segment">
    <h3>Infelizmente você não fez nenhuma avaliação</h3>
  </div>
</div>
<?php
}
?>
</div>
<span id="status"></span> 
<div  class=" ui centered column" style="
width: 820px;">  
<a style="
margin-bottom: 20px;
width: 100%;
box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
" class="ui orange active button" href="javascript:func()" id="mais">Mais avaliações »</a>
</div>
<!-- codigo responsavel por verificar se editar e do usuario e editar post de local e site -->
<?php 
if(isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['editpost'])) {
   extract($_POST);
   $devolvepost = $objAval->show_postsedit($ideditar);
   $dadosuser = array();
   foreach ($devolvepost as $key => $value){     
     if ($value['tipo_avaliacao'] == "site") {
      include('includes/editarpost.php');
    }else{
      include('includes/editarpostlocal.php');
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
<!-- <?php 
  $objAmiz->getUserId($_SESSION['userid']);
  $users = $objAmiz->show_users();
  var_dump($users);
    
  ?> -->
  <script src="js/efeitos.js"></script>
</body>
</html>
