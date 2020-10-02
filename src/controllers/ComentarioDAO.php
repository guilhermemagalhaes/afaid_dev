<?php
Class ComentarioDAO extends Comentario{
	// função para adicionar um comentario a uma avaliação
	function add_comentario(){
		$sqladdcomentario = DB::getConn()->prepare("INSERT INTO comentario SET avaliacao_id=:avaliacao_id,usuario_id=:usuario_id,comentario=:comentario,veracidade=:veracidade,data=NOW()");
		$avaliacao_id= $this->getAvaliacaoId() ;
		$usuario_id= $this->getUsuarioId() ;
		$comentario= $this->getComentario() ;
		$veracidade= $this->getVeracidade() ;
		$sqladdcomentario->bindParam(':avaliacao_id', $avaliacao_id);
		$sqladdcomentario->bindParam(':usuario_id', $usuario_id);
		$sqladdcomentario->bindParam(':comentario', $comentario);
		$sqladdcomentario->bindParam(':veracidade', $veracidade);
		$sqladdcomentario->execute();
	}
	// função para exibir comentarios de uma determinada avaliação
	function show_comentario($idpost){
		$comentario = array();
		$sqleditpost = DB::getConn()->prepare("SELECT comentario.id,comentario.veracidade,usuario.imagem,usuario.nome,avaliacao_id,usuario_id,comentario,data FROM comentario INNER JOIN usuario ON comentario.usuario_id=usuario.id WHERE avaliacao_id=$idpost ORDER BY data");
		$sqleditpost->execute();
		while($datacomentario = $sqleditpost->fetch(PDO::FETCH_ASSOC)){
			// var_dump($data);
			$comentario[] = $datacomentario;
		}
		return $comentario;
	}
	function editcomentario(){
		$sqleditcomentario = DB::getConn()->prepare("UPDATE comentario SET comentario=:comentario,veracidade=:veracidade,data=NOW() WHERE id =:avaliacao_id");
		$avaliacao_id= $this->getAvaliacaoId() ;
		$comentario= $this->getComentario() ;
		$veracidade= $this->getVeracidade() ;
		$sqleditcomentario->bindParam(':avaliacao_id',$avaliacao_id);
		$sqleditcomentario->bindParam(':comentario',$comentario);
		$sqleditcomentario->bindParam(':veracidade',$veracidade);
		$sqleditcomentario->execute();
	}
	function deletecomentario(){
		$sqleditcomentario = DB::getConn()->prepare("DELETE FROM comentario WHERE id =:avaliacao_id");
		$avaliacao_id= $this->getAvaliacaoId() ;
		$sqleditcomentario->bindParam(':avaliacao_id',$avaliacao_id);
		$sqleditcomentario->execute();
	}
}
