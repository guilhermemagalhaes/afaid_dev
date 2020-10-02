<!-- pagina  responsavel por exibir post-->
<div class=" ui column" style="
width: 100%;
">
<div class="ui segment" style="
margin-bottom: 15px;
">
<div>
  <img class="ui middle aligned circular image" src="<?php echo $value['imagem']; ?>" style="
  width: 70px;
  ">
  <a> <span style="
    /* text-decoration: underline; */
    font-size: 25px;
    margin-left: 10px;
    "><?php echo $value['nome'] ?></span> </a> 
       
    </div>
    <div class="ui items">
      <div class="item">
        <?php if ($value['foto']==''){
        } else{
          ?>
          <a class="ui medium image">
            <img src="uploads/posts/<?php echo $value['foto'] ?>">
          </a>
          <?php
        }
        ?>
        <div class="content">
          <a  class="header"><?php echo $list['local'] ?></a> <br>
          <h4 class=" ui right aligned header"><?php echo $value['data'] ?></h4>
          <div class="description">
            <p><?php echo $value['descricao'] ?></p>
          </div>
        </div>
      </div>
    </div>
    
    
  </div>
</div>