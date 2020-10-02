<!-- classe responsavel por cadastrar ou atualizar foto do usuario -->
<?php
	if(isset($_POST['upload']) AND $_POST['upload']=='perfil'){

		$uid = $_POST['uid'];

		$imgantiga =$_POST['imgantiga'];

		if($imgantiga<>'default.png' AND file_exists('../'.$imgantiga)){
			unlink('../'.$imgantiga);
		}
		// include('funcoes.php');

		$imagem = $_FILES['foto-perfil'];

		$nome = 'uploads/usuarios/'.$uid.date('s').'.jpg';

		$ext = array('image/jpeg','image/pjpeg','image/jpg','image/gif','image/png');

		if(in_array($imagem['type'],$ext)){
			upload($imagem['tmp_name'],$imagem['name'],$nome,700,'../');
			include('../classes/DB.class.php');
			$update = DB::getConn()->prepare('UPDATE `usuario` SET `imagem`=? WHERE `id`=?');
			$update->execute(array($nome,$uid));
			if(file_exists('../uploads/usuarios/'.$nome)){
				header('Location: ../perfil.php');
				exit();
			}
		}
	}
	if(isset($_POST['salvar'])){
		$img = imagecreatefromjpeg('../'.$_POST['imagem']);
		$largura = 300;
		$altura = ($largura * $_POST['h']) / $_POST['w'];
		$nova = imagecreatetruecolor($largura,$altura);
		imagecopyresampled($nova,$img,0,0,$_POST['x'],$_POST['y'],$largura,$altura,$_POST['w'],$_POST['h']);
		imagejpeg($nova,'../'.$_POST['imagem'],80);
		header('Location: ../perfil.php');
	}
	
	if(isset($_POST['upload2']) AND $_POST['upload2']=='perfil'){
		$uid = $_POST['uid'];

		$imgantiga =$_POST['imgantiga'];

		if($imgantiga<>'default.png' AND file_exists('../'.$imgantiga)){
			unlink('../'.$imgantiga);
		}
		include('funcoes.php');

		$imagem = $_FILES['foto-perfil'];

		$nome = 'uploads/usuarios/'.$uid.date('s').'.jpg';

		$ext = array('image/jpeg','image/pjpeg','image/jpg','image/gif','image/png');

		if(in_array($imagem['type'],$ext)){
			upload($imagem['tmp_name'],$imagem['name'],$nome,700,'../');
			include('../classes/DB.class.php');
			$update = DB::getConn()->prepare('UPDATE `usuario` SET `imagem`=? WHERE `id`=?');
			$update->execute(array($nome,$uid));
			if(file_exists('../uploads/usuarios/'.$nome)){
				header('Location: ../comfiguracoes.php');
				exit();
			}
		}
	}
	if(isset($_POST['salvar2'])){
		$img = imagecreatefromjpeg('../uploads/usuarios/'.$_POST['imagem']);
		$largura = 160;
		$altura = ($largura * $_POST['h']) / $_POST['w'];
		$nova = imagecreatetruecolor($largura,$altura);
		imagecopyresampled($nova,$img,0,0,$_POST['x'],$_POST['y'],$largura,$altura,$_POST['w'],$_POST['h']);
		imagejpeg($nova,'../uploads/usuarios/'.$_POST['imagem'],80);
		header('Location: ../configuracoes.php');
	}
	if(isset($_POST['salvar3'])){
		$img = imagecreatefromjpeg('../uploads/usuarios/'.$_POST['imagem']);
		$largura = 160;
		$altura = ($largura * $_POST['h']) / $_POST['w'];
		$nova = imagecreatetruecolor($largura,$altura);
		imagecopyresampled($nova,$img,0,0,$_POST['x'],$_POST['y'],$largura,$altura,$_POST['w'],$_POST['h']);
		imagejpeg($nova,'../uploads/usuarios/'.$_POST['imagem'],80);
		header('Location: ../perfil.php');
	}
	


	if(isset($_POST['upload3']) AND $_POST['upload3']=='perfil'){
		$uid = $_POST['uid'];

		$imgantiga =$_POST['imgantiga'];

		if($imgantiga<>'default.png' AND file_exists('../'.$imgantiga)){
			unlink('../'.$imgantiga);
		}
		include('funcoes.php');

		$imagem = $_FILES['foto-perfil'];

		$nome = 'uploads/usuarios/'.$uid.date('s').'.jpg';

		$ext = array('image/jpeg','image/pjpeg','image/jpg','image/gif','image/png');

		if(in_array($imagem['type'],$ext)){
			upload($imagem['tmp_name'],$imagem['name'],$nome,700,'../');
			include('../classes/DB.class.php');
			$update = DB::getConn()->prepare('UPDATE `usuario` SET `imagem`=? WHERE `id`=?');
			$update->execute(array($nome,$uid));
			if(file_exists('../uploads/usuarios/'.$nome)){
				header('Location: ../perfil.php');
				exit();
			}
		}
	}
	if(isset($_POST['upload4']) AND $_POST['upload4']=='perfil'){
		$uid = $_POST['uid'];
		$imgantiga = $_POST['imgantiga'];
		if($imgantiga<>'default.png' AND file_exists('../uploads/usuarios/'.$imgantiga)){
			unlink('../uploads/usuarios/'.$imgantiga);
		}
		include('funcoes.php');
		$imagem = $_FILES['foto-perfil'];
		$nome = $uid.date('s').'.jpg';
		$ext = array('image/jpeg','image/pjpeg','image/jpg','image/gif','image/png');	
		if(in_array($imagem['type'],$ext)){
			upload($imagem['tmp_name'],$imagem['name'],$nome,700,'../uploads/usuarios');
			include('../classes/DB.class.php');
			$update = DB::getConn()->prepare('UPDATE `usuario` SET `capa`=? WHERE `id`=?');
			$update->execute(array($nome,$uid));
			if(file_exists('../uploads/usuarios/'.$nome)){
				header('Location: ../perfil.php');
				exit();
			}
		}
	}


	if(isset($_POST['salvar'])){
		$img = imagecreatefromjpeg('uploads/usuarios/'.$_POST['imagem']);
		$largura = 500;
		$altura = ($largura * $_POST['h']) / $_POST['w'];
		$nova = imagecreatetruecolor($largura,$altura);
		imagecopyresampled($nova,$img,0,0,$_POST['x'],$_POST['y'],$largura,$altura,$_POST['w'],$_POST['h']);
		imagejpeg($nova,'../uploads/usuarios/'.$_POST['imagem'],80);
		header('Location: ../perfil.php.php');
	}
	

