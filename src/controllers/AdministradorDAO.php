<?php
Class Adm extends Usuario{
	
	function todosusuarios(){
		$usuarios = array();
		$sql = DB::getConn()->prepare('SELECT * FROM usuario ORDER BY data_cadastro');
		$sql->execute();
		while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) {
			$usuarios[] = $dados;
		}
		return $usuarios;
	}

	function novoadm(){
		$sql = DB::getConn()->prepare('INSERT INTO usuario SET email=:email,perfil=:perfil,nome=:nome,sobrenome=:nome2');
		$nome = $this->getNome() ;
		$email=  $this->getEmail();
		$senha= $this->getSenha() ;
		$perfil= "4";
		$sobrenome = $this->getSobrenome() ;
		$sql->bindParam(':email', $email);
		$sql->bindParam(':perfil', $perfil);
		$sql->bindParam(':nome', $nome);
		$sql->bindParam(':nome2', $sobrenome);
		$sql->execute();
	}

	function analise(){
		$usuarios = array();
		$sql = DB::getConn()->prepare('SELECT * FROM denuncia ORDER BY data');
		$sql->execute();
		while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) {
			$usuarios[] = $dados;
		}
		return $usuarios;
	}
}
