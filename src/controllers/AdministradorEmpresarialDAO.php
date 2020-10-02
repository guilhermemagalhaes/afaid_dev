<?php
Class Admempresa extends Site{
	function buscaempresas($userid){
		// tipo empresa 
		// 1 = publica
		// 2 = privada
		$empresas = array();
		$sql = DB::getConn()->prepare('SELECT * FROM local WHERE usuario_id=:userid AND tipo=:tipo ORDER BY data desc');
		$tipo = 'local';
		$sql->bindParam(':userid', $userid);
		$sql->bindParam(':tipo', $tipo);
		$sql->execute();
		while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) {
			$empresas[] = $dados;
		}
		return $empresas;
	}
	function buscasite($userid){
		// tipo empresa 
		// 1 = publica
		// 2 = privada
		$empresas = array();
		$sql = DB::getConn()->prepare('SELECT * FROM local WHERE usuario_id=:userid AND tipo=:tipo ORDER BY data desc');
		$tipo = 'site';
		$sql->bindParam(':userid', $userid);
		$sql->bindParam(':tipo', $tipo);
		$sql->execute();
		while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) {
			$empresas[] = $dados;
		}
		return $empresas;
	}
	function adicionarsite(){
		$sql = DB::getConn()->prepare('INSERT INTO local SET Nome=:nome,data=NOW(),usuario_id=:userid,url=:url,tipo=:tipo');
		$nome = $this->getNome() ;
		$userid = $this->getUsuarioId() ;
		$url = $this->getUrl() ;
		$tipo = "site";
		$sql->bindParam(':nome', $nome);
		$sql->bindParam(':userid', $userid);
		$sql->bindParam(':url', $url);
		$sql->bindParam(':tipo', $tipo);
		$sql->execute();
	}
	function adicionarlocal(){
		$sql = DB::getConn()->prepare('INSERT INTO local SET Nome=:nome,data=NOW(),usuario_id=:userid,Endereco=:endereco,tipo=:tipo');
		$nome = $this->getNome() ;
		$userid = $this->getUsuarioId() ;
		$endereco = $this->getEndereco() ;
		$tipo = "local";
		$sql->bindParam(':nome', $nome);
		$sql->bindParam(':userid', $userid);
		$sql->bindParam(':endereco', $endereco);
		$sql->bindParam(':tipo', $tipo);
		$sql->execute();
	}
	function editarsite(){
		$sql = DB::getConn()->prepare('UPDATE local SET Nome=:nome,data=NOW(),url=:url WHERE id=:id');
		$nome = $this->getNome();
		$id = $this->getIdsite();
		$url = $this->getUrl();
		$sql->bindParam(':nome', $nome);
		$sql->bindParam(':id', $id);
		$sql->bindParam(':url', $url);
		$sql->execute();
	}
	function deletarsite(){
		$sql = DB::getConn()->prepare('DELETE FROM local  WHERE id=:id');
		$id = $this->getIdsite();
		$sql->bindParam(':id', $id);
		$sql->execute();

	}
	function editarlocal(){
		$sql = DB::getConn()->prepare('UPDATE local SET Nome=:nome,data=NOW(),endereco=:endereco WHERE id=:id');
		$nome = $this->getNome();
		$id = $this->getIdlocal();
		$endereco = $this->getEndereco();
		$sql->bindParam(':nome', $nome);
		$sql->bindParam(':id', $id);
		$sql->bindParam(':endereco', $endereco);
		$sql->execute();
	}
	function deletarlocal(){
		$sql = DB::getConn()->prepare('DELETE FROM local  WHERE id=:id');
		$id = $this->getIdlocal();
		$sql->bindParam(':id', $id);
		$sql->execute();
	}
	
	function solicitacaoanalise($userid){
		$avaliacoes = array();
		$sql = DB::getConn()->prepare('SELECT * FROM avaliacao INNER JOIN local ON avaliacao.local_id=local.id WHERE local.usuario_id=:usuarioid AND tipo="site"');
		$id = $this->getIdlocal();
		$sql->bindParam(':usuarioid', $userid);
		$sql->execute();
		while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) {
			$avaliacoes[] = $dados;
		}
		return $avaliacoes;
	}
	function solicitacaoanaliselocal($userid){
		$avaliacoes = array();
		$sql = DB::getConn()->prepare('SELECT * FROM avaliacao INNER JOIN local ON avaliacao.local_id=local.id WHERE local.usuario_id=:usuarioid AND tipo="local"');
		$id = $this->getIdlocal();
		$sql->bindParam(':usuarioid', $userid);
		$sql->execute();
		while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) {
			$avaliacoes[] = $dados;
		}
		return $avaliacoes;
	}

	function contavaliacao($userid){
		$sql = DB::getConn()->prepare('SELECT * FROM avaliacao INNER JOIN local ON avaliacao.local_id=local.id WHERE local.usuario_id=:usuarioid');
		$id = $this->getIdlocal();
		$sql->bindParam(':usuarioid', $userid);
		$sql->execute();		
		$colcount = $sql->RowCount();	
		return $colcount;
	}

	function novaanalise(){
		$sql = DB::getConn()->prepare('INSERT INTO denuncia SET denunciado_id=:denunciadoid,denunciante_id=:denuncianteid,data=NOW(),avaliacao_id=:avaliacaoid,motivacao=:motivacao,conteudoavaliacao=:conteudo');
		$denunciadoid = $this->getDenunciado();;
		$denuncianteid = $this->getUsuarioId();
		$avaliacao_id = $this->getIdlocal();
		$motivacao = $this->getMotivacao();; 
		$conteudo = $this->getConteudo();;
		$sql->bindParam(':denunciadoid', $denunciadoid);
		$sql->bindParam(':denuncianteid', $denuncianteid);
		$sql->bindParam(':avaliacaoid', $avaliacao_id);
		$sql->bindParam(':motivacao', $motivacao);
		$sql->bindParam(':conteudo', $conteudo);
		$sql->execute();
	}
}
