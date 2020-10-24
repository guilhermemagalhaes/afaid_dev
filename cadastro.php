<?php
include('includes/cabecalho2.php');
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
if (isset($_POST['cadastro1'])) {
 if(isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
  extract($_POST);
  try{
    $verificar = DB::getConn()->prepare("SELECT `id` FROM `usuario` WHERE `email`=?");
    if($verificar->execute(array($emailcadastro))){
      if($verificar->rowCount()>=1){
       $_SESSION['emailcadastro'] = $emailcadastro;
       $_SESSION['nomecadastro'] = $nome;
       $_SESSION['sobrenomecadastro'] = $sobrenome;
       $aviso1 = "<div id='existeemail'     class='ui pointing red basic label'>
       Este email ja está cadastrado em nosso sistema
     </div>";
     $_SESSION['aviso']= $aviso1;
   }
   else{
     $senhaInsert = md5($senhacadastro);
     $capa="default.png";
     $imagem = "null";
     $status = "ativo";
     $_SESSION['emaillogar']=$emailcadastro;
     $_SESSION['senhalogar']=$senhacadastro;
     $inserir = DB::getConn()->prepare("INSERT INTO `usuario` SET `perfil`=?,`email`=?, `senha`=?, `nome`=?, `imagem`=?,`capa`=?, `data_cadastro`=NOW(),`RazaoSocial`=?,`NomeFantasia`=?,`CNPJ`=?,`telefone`=?,`deficiencia`=?,`sexo`=?,`status`=?");
     if($inserir->execute(array($perfil,$emailcadastro,$senhaInsert,$nome,$imagem,$capa,$razaosocial,$nomefantasia,$cnpj,$telefone,$deficiencia,$sexo,$status))){
       if ($objLogin->logar($_SESSION['emaillogar'],$_SESSION['senhalogar'])) {
         header('Location:timeline');
       }
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
      <script type="text/javascript" src="semantic/examples/assets/library/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
      <script src="semantic/dist/semantic.min.js"></script>
    </head>
    <body>
      <script type="text/javascript">
        $(document).ready(function() {
  // aumentando a fonte
  $(".inc-font").click(function () {
    var size = $("body").css('font-size');
    size = size.replace('px', '');
    size = parseInt(size) + 1;
    $("body p ").animate({'font-size':'25px'});
    $("body label").animate({'font-size':'17px'});
    $("body h1").animate({'font-size':'38px'});
  });
  //diminuindo a fonte
  $(".dec-font").click(function () {
    var size = $("body").css('font-size');
    size = size.replace('px', '');
    size = parseInt(size) - 1.4;
    $("body p").animate({'font-size' : '22px'});
    $("body h1").animate({'font-size':'34px'});
    $("body label").animate({'font-size':'.92857143em'});
  });

  // resetando a fonte
  $(".res-font").click(function () {
    $("body").animate({'font-size' : '10px'});
  });

  $("#checkempresa").click(function () {
   $(".empresa").css({
    "display": "block"
  });
 });
  $("#checkusuario").click(function () {
   $(".empresa").css({
    "display": "none"
  });
 });
});
</script>
<script type="text/javascript">
  $( document ).ready(function() {
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
     perfil: {
      identifier: 'perfil',
      rules: [
      {
        type : 'radio',
        type : 'checked',
        prompt : 'Selecione o seu perfil'
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
  <div class="ui basic segment" style="">
    <header class="login" style="box-sizing: initial;     height: 4.8em;">
      <a href="/"><img src="img/Logo_atual_A'faid.png" style="
        width: 9em;
        top: 11px;
        position: absolute;
        left: 3em;
        "></a>
        <form id="formulario" class="ui basic form formlogin"  name="login" method="POST" action="cadastro.php" style="
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
            left: -480px;
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
            left: -425px;
            width: 17px;
            " class='dec-font' title="Diminuir fonte" > A-</a>
          </div>
          <div class="field">
            <?php 
            echo '<a href="' . $loginUrl . '"><img style="
            width: 162px;
            margin-top: 13px;
            margin-left: -440px;
            position: absolute;
            " src="img/botaofacebook.PNG" alt="logue com facebook"></a>';
            ?>
          </div>
          <div class="field"> 
            <input type="text" placeholder="Email" name="email" class="input_nome_login" required="true" style="
            height: 20px;
            width: 187px;
            margin-left: -290px;
            position: absolute;
            ">
          </div>
          <div class="field">  
           <input type="password" placeholder="Senha" name="senha" class="input_senha_login" required="true" style="
           height: 20px;
           width: 187px;
           margin-left: -70px;
           position: absolute;
           ">
         </div>
         <div class="field">  
           <input type="submit" value="Entrar" name="logar" class="ui button positive btn_login" style="
           height: 20px;
           margin-left: 0px;
           ">
         </div>
       </div>
     </form>
   </header>
   <h1 class="titulo" style="font-size: 36px;color: #fff;position: relative;top: 3em;text-align: center;left: 0em;">
    No A'Faid você pode denunciar sites ou empresas e tambem elogia-las.
  </h1>
  <form class="ui form segment busca" id="form"  name="busca" method="POST" action="cadastro.php" style="margin-top: -119px;position: absolute;left: 25%;top: 310%;">
    <h1 class="ui centered header">Esta prestes a descobrir um novo mundo</h1>
    <div class="field">
      <label>Sou</label>
      <div class="ui checkbox">
        <input type="radio" id="checkempresa" name="perfil" value="1">
        <label>Empresa</label>
      </div>
      <div class="ui checkbox">
        <input type="radio" id="checkusuario" name="perfil" value="2">
        <label>Usuario</label>
      </div>
    </div>
    <div class="two fields">
      <div class="field">
        <label>Nome</label>
        <input type="text"  name="nome" placeholder="Nome">
      </div>
      <div class="field">
        <label>Sobrenome</label>
        <input type="text" name="sobrenome" placeholder="Sobrenome">
      </div>
    </div>
    <div class="two fields">
      <div class="field">
        <label>Sexo</label>
        <div class="ui selection dropdown">
          <input name="sexo"  type="hidden">
          <div class="default text">Sexo</div>
          <i class="dropdown icon"></i>
          <div class="menu">
            <div class="item" data-value="Masculino">Masculino</div>
            <div class="item" data-value="Feminino">Feminino</div>
            <div class="item" data-value="Nao informado">Prefiro não informar</div>
          </div>
        </div>
      </div>
      <div class="field">
        <label>Deficiência</label>
        <div class="ui selection dropdown">
          <input type="hidden" name="deficiencia" >
          <div class="default text">Deficiência</div>
          <i class="dropdown icon"></i>
          <div class="menu">
            <div class="item" data-value="Fisica" data-text="Fisica">
              Fisica
            </div>
            <div class="item" data-value="Visual" data-text="Visual">
              Visual
            </div>
            <div class="item" data-value="Intelectual" data-text="Intelectual">
              Intelectual
            </div>
            <div class="item" data-value="Auditiva" data-text="Auditiva">
              Auditiva
            </div>
            <div class="item" data-value="Não possuo" data-text="Não possuo">
              Não possuo
            </div>
            <div class="item" data-value="Prefiro não informar" data-text="Prefiro não informar">
              Prefiro não informar
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="field">
      <label>Email</label>
      <input type="email" name="emailcadastro" placeholder="Email">
      <?php
      if (isset($_SESSION['aviso'])){
        echo "<b>". $_SESSION['aviso']."</b>";
        unset($_SESSION['aviso']);
      }
      ?>
    </div>
    <div class="field">
      <label>Senha</label>
      <input type="password" name="senhacadastro" placeholder="Senha">
    </div>
    <div class="empresa" style="display: none;">
      <div class="ui horizontal divider">
        Informações empresariais
      </div>
      <div class="two fields">
        <div class="field">
          <label>Razão Social</label>
          <input value="" type="text"  name="razaosocial" placeholder="Razão social">
        </div>
        <div class="field">
          <label>Nome fantasia</label>
          <input value="" type="text" name="nomefantasia" placeholder="Nome fantasia">
        </div>
      </div>
      <div class="two fields">
        <div class="field">
          <label>CNPJ</label>
          <input value="" type="text"  name="cnpj" placeholder="CNPJ">
        </div>
        <div class="field">
          <label>Telefone</label>
          <input value="" type="text" name="telefone" placeholder="Telefone">
        </div>
        <div class="field">
          <label>Plano</label>
          <select>
              <option>Plano A - R$100,00</option>
              <option>Plano B - R$150,00</option>
              <option>Plano C - R$200,00</option>
              <option>Plano D - R$250,00</option>
          </select>          
        </div>
      </div>
    </div>
    <!-- daqui pra cima -->
    <div class="field">
      <input class="ui positive button" name="cadastro1" value="Inscrever-se" type="submit" name="enviar">
    </div>
  </form>
</section>
</div>


<!-- termino do cabeçalho da pagina -->
<!-- termino da parte principal da pagina onde o usuario pesquisa -->
<!-- apresentaçao do aplicativo -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="js/jquery-3.1.1.js"></script> -->
<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
<script src="parallax.js-1.4.2/parallax.js"></script>
<!-- <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> -->
<!-- <script type="text/javascript" src="js/script.js"></script> -->
<!-- <script src="js/slideapp.js"></script> -->
<!-- <script type="text/javascript" src="js/text-slider.js"></script> -->
</body>
</html>