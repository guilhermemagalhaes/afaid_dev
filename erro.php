<?php
include('includes/cabecalho.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="semantic/examples/assets/library/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
	<script src="semantic/dist/semantic.min.js"></script>
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/notificacao.css">
	<script type="text/javascript" src="js/notificacao.js"></script>
</head>
<body style="overflow: hidden;">

<!-- incluindo menu superior -->
  <?php 
  include('includes/menu.php');
  ?>
  <div class="ui  stackable  column grid" style="margin-top: 150px;overflow: hidden;">
	<div class="ui centered column grid">
		<h3>Não foram encontrados dados</h3>
		<img src="img/empty-search.svg" width="260px">
		<p>Desculpe mais nada foi encontrado , URL quebrada</p>

	</div>
  </div>
</body>
</html>