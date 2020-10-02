<?php
Class NotificacaoDAO extends Notificacao{
//adicionar notificação quando seguir usuario
	function addnotificacao(){
		$sql = DB::getConn()->prepare("INSERT INTO notificacoes SET de_id=:de,para_id=:para,status=:status,tipo=:tipo,avaliacao_id=:idavaliacao");
		$id = $this->getDeId();
		$para = $this->getParaId();
		$status = $this->getStatus();
		$tipo = $this->getTipo();
		$idavaliacao = $this->getAvaliacaoId();
		$sql->bindParam(':de',$id);
		$sql->bindParam(':para',$para);
		$sql->bindParam(':status',$status);
		$sql->bindParam(':tipo',$tipo);
		$sql->bindParam(':idavaliacao',$idavaliacao);
		$sql->execute();
	}
//excluir notificação quando deixar de seguir
	function deletenotificacao(){
		$sql = DB::getConn()->prepare("DELETE FROM notificacoes WHERE de_id=:de AND para_id=:para LIMIT 1");
		$de =  $this->getDeId();
		$para = $this->getParaId();
		$sql->bindParam(':de', $de);
		$sql->bindParam(':para', $para);
		$sql->execute();
	}
	function buscarnotificacao(){
		$noticacao = array();
		$sql = DB::getConn()->prepare("SELECT notificacoes.tipo,usuario.imagem,usuario.nome,usuario.id,usuario.sobrenome FROM notificacoes INNER JOIN usuario ON notificacoes.de_id=usuario.id WHERE para_id=:para  ");
		$userid =  $this->getParaId();
		$sql->bindParam(':para', $userid);
		$sql->execute();
		while($data = $sql->fetch(PDO::FETCH_ASSOC)){
			$noticacao[] = $data;
		}
		return $noticacao;
	}
}

