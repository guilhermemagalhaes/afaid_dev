<!-- modal responsavel por exibir formulario para editar post (site) que pode ser chamado
  em qualquer pagina do sistema -->
  <div class="ui modal" id="modaledit">
   <i class=" ui close link big icon"></i>
   <div class="ui centered header">Editar avaliação</div>
   <div class="content">
     <form class="ui form segment" method="POST" action="php/editlocal.php">
      <!-- nota -->
      <div class="field">
        <input type="radio" name="nota" value="1">1
        <input type="radio" name="nota" value="2">2
        <input type="radio" name="nota" value="3">3
        <input type="radio" name="nota" value="4">4
        <input type="radio" name="nota" value="5">5
      </div>
      <!-- site -->
       <div class="field">
        <div class="ui labeled input">
          <div style="
          width: 90px;
          " class="ui orange label">Local</div>
          <div class="ui selection dropdown" style="
          width: 100%;
          ">
          <input type="hidden" name="local">
          <i class="dropdown icon"></i>
          <div class="default text">Selecione o local desejado</div>
          <div class="menu">
            <?php 
            $empresas=$objAval->buscaempresas();
            if (count($empresas)) {
             foreach ($empresas as $key => $list){
              echo ' <div class="item" data-value="'.$list['Nome'].'" data-text="'.$list['Nome'].'">
              '.$list['Nome'].'
            </div>';
            echo '<input type="hidden" name="local_id" value="'.$list['id'].'">';
          }
        }else{
          echo 'Nenhum site cadastrado';
        }
        ?> 
      </div>
    </div>
  </div>
</div>
<!-- categoria -->
<div class="field">
  <div class="ui selection dropdown">
    <input type="hidden" value="<?php echo $value['categoria'] ?>" name="categoriaavl">
    <i class="dropdown icon"></i>
    <div class="default text">Categoria</div>
    <div class="menu">
      <div class="item" data-value="Acessibilidade" data-text="Acessibilidade">
        Acessibilidade
      </div>
      <div class="item" data-value="atendimento" data-text="atendimento">
        Atendimento
      </div>
    </div>
  </div>
</div>
<!-- descricao -->
<div class="field">
  <textarea rows="10" cols="10" name="descsite" placeholder="Descrição"><?php echo $value['descricao'] ?></textarea>
</div>
<input type="hidden" name="idpost" value="<?php echo $value['id'] ?>">
<!-- enviar -->
<input type="submit" class="ui positive button" value="Enviar">
<a class="negative ui button" href="">Cancelar</a>
</form>
</div>
</div>
