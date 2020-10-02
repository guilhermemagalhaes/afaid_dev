<div class="ui inverted segment" style="border-radius: 0px">
  <div class="ui inverted secondary pointing menu">
    <a href="index.php" id="logo" class="item"><img src="../../img/Logo_atual_A'faid.png"></a>
    <a href="gerenciarsite.php" id="item" class="item">
      Gerenciar sites
    </a>
    <a href="gerenciarlocal.php" id="item" class="item">
      Gerenciar Locais
    </a>
    <a href="gereciaravaliacoes.php" id="item" class="item">
      Gerenciar avaliações
    </a>
    <a href="configuracoes.php" id="item" class="item">
      Configurações
    </a>
    <a href="?sair=true" id="item" class="item">
      <i class="power icon"></i>
      Sair
    </a>
  </div>
</div>

<script type="text/javascript" style="display: none;">
  $(document).ready(function(){
    $('.message .close')
    .on('click', function() {
      $(this)
      .closest('.message')
      .transition('fade');

    })
    ;
    setTimeout(function() {
      $('.message').fadeOut('fast');}, 9000);
  });
</script>