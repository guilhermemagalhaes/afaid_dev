<?php
include('classes/DB.class.php');
include('classes/Login.class.php');

$objLogin = new Login;

//varifica se o usuario ja esta logado
if(!$objLogin->logado()){
    include('login.php');
    exit;
}

// para eliminar as sessoes
if(true==$_GET['sair']){
    $objLogin->sair();
    header('Location: ./');
}
// pega o id do usuario e da pagina de perfil que ele esteja visitando
$idExtrangeiro = (isset($_GET['uid'])) ? $_GET['uid'] : $_SESSION['socialbigui_uid'];
$idDaSessao = $_SESSION['socialbigui_uid'];

$dados = $objLogin->getDados($idExtrangeiro);

if(is_null($dados)){
    header('Location: ./');
    exit();
}else{
    extract($dados,EXTR_PREFIX_ALL,'user'); 
}

$user_imagem = (file_exists('uploads/usuarios/'.$user_imagem)) ? $user_imagem : 'default.png';

?>


    <a href="index.php" class="logo">A'FAID</a>





    <form id="searchbox" name="pesquisa-all" action="busca.php" method="get" autocomplete="off">
        <input name="s" type="text" size="25" placeholder="Digite aqui sua pesquisa..." />
        <input id="button-submit" type="submit" value=" "/>

       

     
        
           
              <a href="perfil.php?uid=<?php echo $idExtrangeiro ?>"><img src="uploads/usuarios/<?php echo $user_imagem; ?>" class="img-circle" alt="<?php echo $user_nome ?>" title="<?php echo $user_nome ?>" /></a>
               

                <?php if($idDaSessao==$idExtrangeiro): ?>
                <a href="perfil.php?perfil=UPLOAD" id="alterar-foto" >alterar foto</a>

                <?php endif; ?>
            
            <h5 class="centered"><?php echo $user_nome?></h5>



           

