<?php
if (isset($_POST['logar'])) {
  if ($objLogin->logar($_POST['email'], $_POST['senha'])) {
   header('Location: timeline.php');
 }
header('Location: /afaid_hospedagem');
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
$permissions = ['email'];
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
       $loginUrl = $Login->getLoginUrl('http://localhost/afaid/timeline.php', $permissions);
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
        }
      }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>A'FAID</title>
      <link rel="stylesheet" href="css/style2.css">
      <link rel="stylesheet" href="css/styles2.css"> 
      <link rel="stylesheet" href="css/slideapp.css">
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <link rel="icon" href="img/Logo.png">
      <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
    </head>
    <body>
      <script type="text/javascript">
        $(document).ready(function() {
  // aumentando a fonte
  $(".inc-font").click(function () {
    var size = $("body").css('font-size');
    size = size.replace('px', '');
    size = parseInt(size) + 1;
    $("body p").animate({'font-size':'25px'});
    $("body h1").animate({'font-size':'38px'});
  });
  //diminuindo a fonte
  $(".dec-font").click(function () {
    var size = $("body").css('font-size');
    size = size.replace('px', '');
    size = parseInt(size) - 1.4;
    $("body p").animate({'font-size' : '22px'});
    $("body h1").animate({'font-size':'34px'});
  });
  // resetando a fonte
  $(".res-font").click(function () {
    $("body").animate({'font-size' : '10px'});
  });

});
</script>
<!-- inicio do cabeçalho da pagina -->
<section class="principal parallax-window
" data-parallax="scroll" data-image-src="img/fundo.jpg" > 
<header class="login" style="box-sizing: initial;     height: 4.8em;">
  <a href="/"><img src="img/Logo_atual_A'faid.png" style="
    width: 9em;
    top: 11px;
    position: absolute;
    left: 3em;
    "></a>
    <form id="formulario" class="ui basic form formlogin"  name="login" method="POST" style="
    position: absolute;
    ">
    <div class="six fields">
      <div class="field">
        <a style="
        border: solid 1px white;
        padding: 10px;
        color: white;
        text-decoration: none;
        position: absolute;
        cursor: pointer;
        height: 20px;
        top: 13px;
        left: -725px;
        " class='inc-font' title='Aumentar fonte' > A+</a>
      </div>
      <div class="field">
        <a style="
        border: solid 1px white;
        padding: 10px;
        color: white;
        text-decoration: none;
        position: absolute;
        cursor: pointer;
        height: 20px;
        top: 13px;
        left: -670px;
        width: 17px;
        " class='dec-font' title="Diminuir fonte" > A-</a>
      </div>
      <div class="field">
        <?php 
        echo '<a href="' . $loginUrl . '"><img style="
        width: 162px;
        margin-top: 13px;
        margin-left: -620px;
        position: absolute;
        " src="img/botaofacebook.PNG" alt="logue com facebook"></a>';
        ?>
      </div>
      <div class="field"> 
        <input type="text" placeholder="Email" name="email" class="input_nome_login" required="true" style="
        width: 187px;
        margin-left: -535px;
        position: absolute;
        border-radius: .28571429rem;
        ">
      </div>
      <div class="field">  
       <input type="password" placeholder="Senha" name="senha" class="input_senha_login" required="true" style="
       width: 187px;
       margin-left: -315px;
       position: absolute;
       border-radius: .28571429rem;
       ">
     </div>
     <div class="field">  
       <input type="submit" value="Entrar" name="logar" class=" btn_login" style="
       height: 46px;
       margin-left: -80px;
       position: absolute;
       border-radius: .28571429rem;
       " auto focus>
     </div>
   </div>
 </form>
 <a href="cadastro.php" style="background:#2185D0;position: absolute; width: 110px; height: 44px; text-decoration:none; border-radius: .28571429rem; color: white; top: 14px; right: 10px;" class="ui blue button"><span style="padding: 10px; position: absolute;">Inscreva-se</span></a>
</header>
<h1 class="titulo">
  No A'FAID você pode denunciar sites ou empresas e tambem elogia-las.
</h1>
<form class="busca" autocomplete="off" name="busca" method="GET" action="pesquisaindex.php">
  <input style="
  border-radius: 4px;
  " type="text" placeholder="Pesquise locais e veja sua reputação" name="pesquisa" class="barrapesquisa">
</form>
<a href="#"><img src="img/botaopesquisa.PNG" class="botao" alt=""></a>
</section>
<!-- termino do cabeçalho da pagina -->

<!-- parte principal da pagina onde o usuario pesquisa -->
<section class="conteudo">
  <div class="jumbotron">
    <div class="slide">
      <div class="slider-item">
        <p class="lead">Avalie sites que você navega</p>
      </div>
      <div class="slider-item">
        <p class="lead">Avalie locais que frequenta</p>
      </div>
      <div class="slider-item">
        <p class="lead">Ajude um ao outro e faça o mundo melhor</p>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $('.slide').textSlider();
    });
  </script>
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script> 
</section>
</div>
<div class="seta">
  <a href ="#apresentacao" class="seta_rolagem" id="setalink"><img src="img/setabranca.png"></a>
</div>
<!-- termino da parte principal da pagina onde o usuario pesquisa -->

<!-- apresentaçao do aplicativo -->
<section class="apresentacao" id="apresentacao">
  <div>
    <div id="slideshow">
     <div>
       <img style="width:310px;height:553px;position:absolute;" src="img/mobilewire/tela_inicial_android.png">
     </div>
     <div>
       <img style="width:310px;height:553px;" src="img/mobilewire/timeline.PNG">
     </div>
     <div>
       <img style="width:310px;height:553px;" src="img/mobilewire/avaliar.PNG">
     </div>
     <div>
       <img style="width:310px;height:553px;" src="img/mobilewire/navegador.PNG">
     </div>
   </div>
   <a href="https://play.google.com/store/apps?hl=pt_br"><img src="img/google.png" class="imgoogle"></a> 
   <img src="img/nexus5.png" class="imgcelular">
 </div>
 <h1 class="titulodescricaoapp">Reclame em qualquer lugar</h1>
 <p class="subdescricaoapp">Instale o nosso aplicativo e sai por ai mostrando o que tem errado quanto a acessibilidade e tambem elogiando o que está certo.<br>
   <a href="img/61410.png">Baixar</a>
 </p>
 <a href="#sobrenos" class="rolagem" id="setalink2"><img class="setapreta" src="img/setapreta.png" ></a>
 <hr class="hr1"/>
 <hr class="hr2" size="10px" width="3px"
 />
 <img src="img/localizacao.png" class="imglocalizacao">
</section>
<!-- termino da apresentação do aplicativo -->
<!-- inicio section ideia -->
<section class="sobrenos"  id="sobrenos">
  <div class="lampadaimg">
  </div>
  <div class="ideia">
    <div class="tituloideia">
      <h1>A IDEIA</h1>
      <p>a</p>
    </div>
  </div>
  <hr class="hrideia" size="10px" width="3px">
  <img src="img/localizacao.png" class="imglocalizacao2">
</div>
<!-- termino section ideia -->

<!-- cabeçalho da pagina  -->
<footer class="rodapé" id="footer">
  <h1 class="titulofooter">Contate-nos</h1>
  <img id="email" src="img/email.png">
  <form action="" method="post" class="formulario_contato ui form" >
    <input type="text" placeholder="Nome" name="ctnome" class="input_nome_contato" required="true">
    <input  placeholder= "Email" name="ctemail" class="input_email_contato" required="true">
    <textarea wrap="off" placeholder="Escreva sua mensagem" name="ctmsg" cols="43" rows="5" class="mensagem_contato" maxlength="250" ></textarea>
    <input type="hidden" name="subct1" value="1">
    <input id="enviar" type="submit" value="Enviar" name="subct" class="btn_envia">
  </form>
</footer>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="parallax.js-1.4.2/parallax.js"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="js/slideapp.js"></script>
<script type="text/javascript" src="js/text-slider.js"></script>
</body>
</html>