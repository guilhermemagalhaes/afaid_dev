<?php
include('includes/cabecalho2.php');
// session_start();
// ini_set("display_errors", 0 );
// error_reporting(0);
if (isset($_POST['logar'])) {
  if ($objLogin->logar($_POST['email'], $_POST['senha'])) {
    header('Location: timeline.php');
    exit;
  }
  include("includes/lerro.php");
}
?>
<?php
require_once'_app/facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '959243830854531',
  'app_secret' => 'b54e9d951a35463cf545425bddcd0139',
  'default_graph_version' => 'v2.5',
  ]);
$Login = $fb->getRedirectLoginHelper();
$permissions = ['email','user_photos'];
try {
  if (isset($_SESSION['facebook_access_token'])) {
    $accessToken = $_SESSION['facebook_access_token'];
  } else {
    $accessToken = $Login->getAccessToken();
  }
} catch (Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
if (isset($accessToken)) {
  if (isset($_SESSION['facebook_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
  } else {
    $_SESSION['facebook_access_token'] = (string) $accessToken;
    $oAuth2Client = $fb->getOAuth2Client();
    $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
    $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
  }
  if (isset($_GET['code'])) {
    header('Location: ./');
  }
  try {
        $profile_request = $fb->get('/me?fields=name,first_name,last_name,email,gender,cover');//aqui adiciona mais requisições ao facebook
        $profile = $profile_request->getGraphNode()->asArray();
      } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        header("Location: ./");
        exit;
      } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }
    // var_dump();//aqui mudo para a informação necessaria,como nome,email como $profile['name']
      $_SESSION['email']= $profile['email'];
      $_SESSION['senha']= md5($profile['id']);
      $_SESSION['senha2']= $profile['id'];
      $_SESSION['sobrenome']= $profile['last_name'];
      $_SESSION['nome']= $profile['name'];
      $_SESSION['perfil']= '3';
      $imagemface = "http://graph.facebook.com/".$profile['id']."/picture?width=300&height=300";
      $capaface =  $profile['cover']['source'];
      if ($profile['gender'] == 'male') {
        $_SESSION['sexo']= 'masculino';
      }else if($profile['gender'] == 'female'){
        $_SESSION['sexo']= 'feminino';
      }else if($profile['gender'] == ''){
       $_SESSION['sexo']= 'prefiro não informar';
     }
     $verificar = DB::getConn()->prepare("SELECT `id` FROM `usuario` WHERE `email`=?");
     if($verificar->execute(array($_SESSION['senha2']))){
      if($verificar->rowCount()>=1){
       if ($objLogin->logar($_SESSION['senha2'],$_SESSION['senha2'])) {
         header('Location: timeline.php');
         exit();
       }
       include("includes/lerro.php");
     }else{
       if($profile['id'] > 1){
        // var_dump($profile);
        $status = "ativo";
        $sql= DB::getConn()->prepare  ("INSERT INTO usuario SET  status=?,capa=?,imagem=?,email=?,nome=?,sobrenome=?,senha=?,sexo=?,perfil=?,data_cadastro=NOW()");
        if($sql->execute(array($status,$capaface,$imagemface,$_SESSION['senha2'],$_SESSION['nome'],$_SESSION['sobrenome'],$_SESSION['senha'],$_SESSION['sexo'],$_SESSION['perfil']))){
          if ($objLogin->logar($_SESSION['senha2'],$_SESSION['senha2'])) {
           header('Location: timeline.php');
           exit();
         }
         include("includes/lerro.php");
       }
     }else{
        // header('Location:login.php');
     }
   }
 }
 $logoff = filter_input(INPUT_GET, 'sair2', FILTER_DEFAULT);
 if (isset($logoff) && $logoff == 'true'):
  session_destroy();
        header("Location: login.php");//mudar para timeline.php ou login.php
        endif;
        echo '<a href="?sair2=true">Sair</a>';
    // var_dump($_SESSION);//aqui posso pegar o acess token
      }else {
        $loginUrl = $Login->getLoginUrl('http://localhost:81/afaid/timeline.php', $permissions);
    // echo '<a href="' . $loginUrl . '">Entrar com facebook</a>';//botao de entrar que pode ser de cadastro e mandar as informações para o banco
    // echo $accessToken;
    // var_dump($_SESSION);
      }
      ?>
      <?php
      if (isset($_POST['subct1'])) {
       if(isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
        extract($_POST);
                // include('classes/DB.class.php');
        try{
          $inserir = DB::getConn()->prepare("INSERT INTO `contato` SET `nome`=?, `email`=?, `mensagem`=?,`data_cadastro`=NOW()");
          if($inserir->execute(array($ctnome,$ctemail,$ctmsg))){
            ?>
            <?php
          }
        }catch(PDOException $e){
          echo 'Sistema indisponível';
          logErros($e);
          var_dump($e);
        }
      }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Afaid</title>
      <link rel="stylesheet" href="css/style2.css">
      <link rel="stylesheet" href="css/styles2.css"> 
      <link rel="stylesheet" href="css/slideapp.css">
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <link rel="icon" href="img/Logo.png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script type="text/javascript" src="semantic/examples/assets/library/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
      <script src="semantic/dist/semantic.min.js"></script>
    </head>
    <body>
      <script type="text/javascript">
        $( document ).ready(function() {
          $('.special.cards .image').dimmer({
            on: 'hover'
          });
          $('.ui.dropdown')
          .dropdown()
          ;
          $(function() {
            $('#form').form({
             nome: {
              identifier: 'nome',
              rules: [
              {
                type : 'empty',
                prompt : 'Escreva seu nome corretamente'
              }
              ]
            },
            sexo: {
              identifier: 'sexo',
              rules: [
              {
                type : 'empty',
                prompt : 'Preencha seu sexo corretamente'
              }
              ]
            },
            deficiencia: {
              identifier: 'deficiencia',
              rules: [
              {
                type : 'empty',
                prompt : 'Preencha sua deficiência corretamente'
              }
              ]
            },
            senhacadastro : {
              identifier: 'senhacadastro',
              rules: [
              {
                type : 'empty',
                prompt : 'Escreva sua senha corretamente'
              }
              ]
            },
            emailcadastro: {
              identifier: 'emailcadastro',
              rules: [
              {
                type : 'empty',
                prompt : 'Escreva seu email corretamente'
              }
              ]
            },
            sobrenome: {
              identifier: 'sobrenome',
              rules: [
              {
                type : 'empty',
                prompt : 'Escreva seu sobrenome corretamente'
              }
              ]
            },
          }, {
            on: 'blur',
            inline: 'true'
          });
          });

        }); 

      </script>
      <!-- inicio do cabeçalho da pagina -->

      <section class="principal parallax-window " data-parallax="scroll" data-image-src="img/fundo.jpg" > 
        <header class="login" style="box-sizing: initial;     height: 4.8em;">
         <a href="/afaid"><img src="img/logo2.png" class="logotipo"></a>
         <?php 
         echo '<a class="facelogin" href="' . $loginUrl . '"><img class="loginface" src="img/botaofacebook.PNG" alt="logue com facebook"></a>';
         ?>
         <form id="formulario" class="formlogin"  name="login" method="POST" action="cadastro.php">
          <input type="text" placeholder="Email" name="email" class="input_nome_login" required="true">
          <input type="password" placeholder="Senha" name="senha" class="input_senha_login" required="true">
          <input id="logar" type="submit" value="Login" name="logar" class="btn_login" style="height: 33px;">
        </form>
      </header>
      <h1 class="titulo" style="font-size: 36px;color: #fff;position: relative;top: 1.8em;text-align: center;left: 0em;">
        No A'Faid você pode denunciar sites ou empresas e tambem elogia-las.
      </h1>
      <div class="ui special cards segment" style="
      margin-top: 85px;
      width: 70%;
      margin-left: 14%;
      height: 55%;
      box-shadow: 0 3px 6px rgba(0,0,0,10), 0 3px 6px rgba(0,0,0,0.23);
      ">
      <?php
      try {
        if(isset($_GET['pesquisa']) AND $_GET['pesquisa']){

          $local = $_GET['pesquisa'];
          $buscar = DB::getConn()->prepare("SELECT * FROM avaliacao WHERE `local` LIKE '%$local%'  order by data LIMIT 3 ");
          $buscar->execute();

          while($resbusca=$buscar->fetch(PDO::FETCH_ASSOC)){
            if ($resbusca['tipo_avaliacao'] == 'local') {
             $cor = 'orange';
           }else if ($resbusca['tipo_avaliacao'] == 'site'){
            $cor = 'teal';
          }

          ?>
          <div class="<?php echo $cor ?> card">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                   <a class="ui orange button" style="color: white" href="cadastro.php">Inscreva-se e veja mais </a>
                  </div>
                </div>
              </div>
              <img src="uploads/usuarios/default.png">
            </div>
            <div class="content">
              <a class="header"><?php echo $resbusca['local'] ?></a>
              <div class="meta">
                <span class="date">Criado em <?php $datelist = $resbusca['data'];
                  echo strftime("%d de %B de %Y", strtotime( $datelist ));  ?></span>
                </div>
              </div>
              <div class="extra content">
                <a>
                  <img style="width: 40px;" src="img/localizacao.png">
                  Acessivel
                </a>
              </div>
            </div>
            <?php
          }
        }
      } catch (Exception $e) {
        echo "<h1 class='ui centered header'> Sistema indisponível</h1>";
         var_dump($e);
      }
      ?>
    </div>
  </section>
  <!-- termino do cabeçalho da pagina -->
</div>
<!-- termino da parte principal da pagina onde o usuario pesquisa -->
<!-- apresentaçao do aplicativo -->
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="js/jquery-3.1.1.js"></script> -->
<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
<script src="parallax.js-1.4.2/parallax.js"></script>
<!-- <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> -->
<!-- <script type="text/javascript" src="js/script.js"></script> -->
<!-- <script src="js/slideapp.js"></script> -->
<!-- <script type="text/javascript" src="js/text-slider.js"></script> -->
<?php
$_SESSION['emailcadastro'] = "";
if (isset($_POST['cadastro1'])) {
 if(isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
  extract($_POST);

  try{
    $verificar = DB::getConn()->prepare("SELECT `id` FROM `usuario` WHERE `email`=?");
    if($verificar->execute(array($emailcadastro))){
      if($verificar->rowCount()>=1){

       $_SESSION['emailcadastro'] = $emailcadastro;

       ?>
       <script type="text/javascript">
         $("#existeemail").css({
          "display": "block"
        });
      </script>

      <?php
    }
    else{
     $senhaInsert = md5($senhacadastro);
     $capa="default2.jpg";
     $imagem = "";
     $inserir = DB::getConn()->prepare("INSERT INTO `usuario` SET `email`=?, `senha`=?, `nome`=?, `imagem`=?,`capa`=?, `data_cadastro`=NOW()");
     if($inserir->execute(array($emailcadastro,$senhaInsert,$nome,$imagem,$capa))){
      header("Location:login.php");
    }
  }
}
}catch(PDOException $e){
  echo 'Sistema indisponível';

  logErros($e);
}
}
}
?>


</body>
</html>
