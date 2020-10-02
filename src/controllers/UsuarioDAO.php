<?php

Class UsuarioDAO extends Usuario{
	// função para editar perfil
	function upconf(){
		$sqlconf= DB::getConn()->prepare("UPDATE usuario SET nome=:nome,deficiencia=:deficiencia,data_nascimento=:data_nascimento,email=:email,sexo=:sexo WHERE id=:id");
		$nome= $this->getNome()  ;
		$deficiencia= $this->getDeficiencia() ;
		$data= $this->getDataNascimento();
		$email= $this->getEmail() ;
		$sexo=  $this->getSexo();
		$id= $this->getId() ;
		$sqlconf->bindParam(':nome', $nome);
		$sqlconf->bindParam(':deficiencia',$deficiencia);
		$sqlconf->bindParam(':data_nascimento',$data);
		$sqlconf->bindParam(':email',$email);
		$sqlconf->bindParam(':sexo',$sexo);
		$sqlconf->bindParam(':id',$id);
		$sqlconf->execute();
	}
}