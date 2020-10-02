<?php
Class AvaliacaoDAO extends Avaliacao{
	// função para adicionar uma nova avaliacao
	//$de,$url,$tipo_avaliacao,$categoriaavl,$foto,$descsite,$nota
	function add_post(){
		$sql= DB::getConn()->prepare  ("INSERT INTO avaliacao SET `local_id`=:localid,`user`=:user,`local`=:local,`tipo_avaliacao`=:tipo_avaliacao,`categoria`=:categoria,`foto`=:foto,`descricao`=:descricao,`data`=NOW(),`nota`=:nota");
		$user = $this->getUser();
		$local = $this->getLocal() ;
		$tipo_avaliacao = $this->getTipoAvaliacao();
		$categoria = $this->getCategoria() ;
		$foto = $this->getFoto() ;
		$descricao = $this->getDescricao() ;
		$nota = $this->getNota() ;
		$siteid = $this->getSiteId();
		$sql->bindParam(':localid', $siteid);
		$sql->bindParam(':user', $user);
		$sql->bindParam(':local', $local);
		$sql->bindParam(':tipo_avaliacao', $tipo_avaliacao);
		$sql->bindParam(':categoria', $categoria);
		$sql->bindParam(':foto', $foto);
		$sql->bindParam(':descricao', $descricao);
		$sql->bindParam(':nota', $nota);
		$sql->execute();
	}
	function add_postLocal(){	
		$sql= DB::getConn()->prepare  ("INSERT INTO avaliacao SET `local_id`=:localid,`user`=:user,`local`=:local,`tipo_avaliacao`=:tipo_avaliacao,`categoria`=:categoria,`foto`=:foto,`descricao`=:descricao,`data`=NOW(),`nota`=:nota");
		$user = $this->getUser();
		$local = $this->getLocal() ;
		$tipo_avaliacao = $this->getTipoAvaliacao();
		$categoria = $this->getCategoria() ;
		$foto = $this->getFoto() ;
		$descricao = $this->getDescricao() ;
		$nota = $this->getNota() ;
		$localid = $this->getLocalId();
		$sql->bindParam(':localid', $localid);
		$sql->bindParam(':user',$user);
		$sql->bindParam(':local',$local);
		$sql->bindParam(':tipo_avaliacao',$tipo_avaliacao);
		$sql->bindParam(':categoria',$categoria);
		$sql->bindParam(':foto',$foto);
		$sql->bindParam(':descricao',$descricao);
		$sql->bindParam(':nota',$nota);
		$sql->execute();
	}
	// função para editar avaliacões
	function editpostsite(){
		$sql= DB::getConn()->prepare ("UPDATE avaliacao SET `local_id`=:localid,`local`=:local,`categoria`=:categoria,`foto`=:foto,`descricao`=:descricao,`nota`=:nota WHERE`id`=:id");
		$local = $this->getLocal() ;
		$tipo_avaliacao = $this->getTipoAvaliacao();
		$categoria = $this->getCategoria() ;
		$foto = $this->getFoto() ;
		$descricao = $this->getDescricao() ;
		$nota = $this->getNota() ;
		$id = $this->getId();
		$editid = $this->getSiteId();
		$sql->bindParam(':localid', $editid);
		$sql->bindParam(':local',$local);
		$sql->bindParam(':categoria',$categoria);
		$sql->bindParam(':foto',$foto);
		$sql->bindParam(':descricao',$descricao);
		$sql->bindParam(':nota',$nota);
		$sql->bindParam(':id',$id);
		if($sql->execute()){
			// $result = mysqli_query($sql);
		}
	}
	function editpostlocal(){
		$sql= DB::getConn()->prepare ("UPDATE avaliacao SET `local_id`=:localid,`local`=:local,`categoria`=:categoria,`foto`=:foto,`descricao`=:descricao,`nota`=:nota WHERE`id`=:id");
		$local = $this->getLocal() ;
		$tipo_avaliacao = $this->getTipoAvaliacao();
		$categoria = $this->getCategoria() ;
		$foto = $this->getFoto() ;
		$descricao = $this->getDescricao() ;
		$nota = $this->getNota() ;
		$id = $this->getId();
		$editid = $this->getLocalId();
		$sql->bindParam(':localid', $editid);
		$sql->bindParam(':local',$local);
		$sql->bindParam(':categoria',$categoria);
		$sql->bindParam(':foto',$foto);
		$sql->bindParam(':descricao',$descricao);
		$sql->bindParam(':nota',$nota);
		$sql->bindParam(':id',$id);
		if($sql->execute()){
			// $result = mysqli_query($sql);
		}
	}
	// função para deletar uma avaliação
	function delete_post(){
		$sql= DB::getConn()->prepare("DELETE FROM avaliacao WHERE `id`=:id");
		$id = $this->getId();
		$sql->bindParam(':id', $id);
		$sql->execute();
	}
	// função para editar avaliação do perfil
	function show_postsedit($idpost){
		$editposts = array();
		$sqleditpost = DB::getConn()->prepare("SELECT  usuario.imagem,avaliacao.tipo_avaliacao,avaliacao.id,usuario.nome,descricao,local,foto,avaliacao.user,categoria, data from avaliacao INNER JOIN usuario on avaliacao.user=usuario.id
			where avaliacao.id = '$idpost'");
		$sqleditpost->execute();
		while($data = $sqleditpost->fetch(PDO::FETCH_ASSOC)){
			// var_dump($data);
			$editposts[] = $data;
		}
		return $editposts;
	}
	// função que recebe lista de usuarios que você segue e exibi as avaliações na timeline
	function show_posts($userid,$limit=0){
		$posts = array();
		$user_string = implode(',', $userid);
		$extra = "and in in ($user_string)";
		if ($limit > 0) {
			$extra = "limit $limit";
		}else{
			$extra = '';
		}
		$sqlpost = DB::getConn()->prepare("SELECT  avaliacao.tipo_avaliacao,avaliacao.id,usuario.nome,descricao,local,foto,data,user,usuario.imagem from avaliacao INNER JOIN usuario on avaliacao.user=usuario.id
			where user in ($user_string)  order by data desc $extra");
		$sqlpost->execute();
		while($data = $sqlpost->fetch(PDO::FETCH_ASSOC)){
			$posts[] = $data;
		}
		return $posts;
	}
	// função para erxibir avaliacões no perfil
	function show_postsperfil(){
		$posts = array();
		$sqlpost = DB::getConn()->prepare("SELECT  avaliacao.tipo_avaliacao,avaliacao.user,usuario.nome,descricao,local,foto,avaliacao.id, data from avaliacao INNER JOIN usuario on avaliacao.user=usuario.id
			where user = :userid order by data desc");
		$userid = $this->getUser() ;
		$sqlpost->bindParam(':userid', $userid);
		$sqlpost->execute();
		while($data = $sqlpost->fetch(PDO::FETCH_ASSOC)){
			// var_dump($data);
			$posts[] = $data;
		}
		return $posts;
	}
	function buscaempresas(){
		// tipo empresa 
		// 1 = publica
		// 2 = privada
		$tipo = 'local';
		$empresas = array();
		$sql = DB::getConn()->prepare("SELECT * FROM local WHERE tipo=:tipo");
		$sql->bindParam(':tipo', $tipo);
		$sql->execute();
		while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) {
			$empresas[] = $dados;
		}
		return $empresas;
	}
	function buscasite(){
		// tipo empresa 
		// 1 = publica
		// 2 = privada
		$tipo = 'site';
		$empresas = array();
		$sql = DB::getConn()->prepare("SELECT * FROM local WHERE tipo=:tipo");
		$sql->bindParam(':tipo', $tipo);
		$sql->execute();
		while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) {
			$empresas[] = $dados;
		}
		return $empresas;
	}

	function ranking(){
		$sql = DB::getConn()->prepare("SELECT local,local_id, SUM(nota)/COUNT(id) AS media FROM avaliacao GROUP BY local_id");
		$sql->execute();
		return $sql;

	}
}
