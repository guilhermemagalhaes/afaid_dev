<?php
class AmizadeDAO extends amizade {
	// função para pegar uma lista de usuario que ele segue
	function show_users($user_id){
		if ($user_id > 0){
			$follow = array();
			$fsql = DB::getConn()->prepare("SELECT seguindo_id from amizade
				where user_id='$user_id'");
			$fsql->execute();
			while($f = $fsql-> fetch(PDO::FETCH_ASSOC) ){
				foreach ($f as $key => $list2){
					array_push($follow, $list2);
				}
			}
			if (count($follow)){
				$id_string = implode(',', $follow);
				$extra =  " and id in ($id_string)";
			}else{
				return array();
			}
		}
		$users = array();
		$sqlu = DB::getConn()->prepare("SELECT id, nome from usuario
			where status='ativo'
			$extra order by nome");
		$sqlu->execute();
		while ($datau = $sqlu ->fetch(PDO::FETCH_ASSOC)) {
			array_push($users, $datau);
		}
		return $users;
	}
	function following(){
		$users = array();
		$sqlfollow = DB::getConn()->prepare("SELECT distinct user_id from amizade where seguindo_id=:seguindo_id");
		$seguindo_id = $this->getSeguindoId() ;
		$sqlfollow->bindParam(':seguindo_id', $seguindo_id);
		$sqlfollow->execute();
		while($data2 = $sqlfollow->fetch(PDO::FETCH_ASSOC)){
			array_push($users, $data2);
		}
		return $users;
		// var_dump($users);
	}
	// função para checar se você ja segue tal usuario
	function check_count(){
		$sqlcheck = DB::getConn()->prepare("SELECT count(*) from amizade
			where user_id=:user_id and seguindo_id=:seguindo_id");
		$seguindo_id= $this->getSeguindoId() ;
		$user_id= $this->getUserId() ;
		$sqlcheck->bindParam(':user_id', $seguindo_id);
		$sqlcheck->bindParam(':seguindo_id',$user_id);
		$sqlcheck->execute();
		$resultcheck = $sqlcheck->fetch(PDO::FETCH_ASSOC,PDO::FETCH_NUM);
		while ($row = $sqlcheck->fetch(PDO::FETCH_NUM,PDO::FETCH_ASSOC)) {
			$data = $row['0'];
			return $row[0];
		}
	}
	// função para seguir um usuario
	function follow_user(){
		$count = $this->check_count();
		if ($count == 0){
			$sqlfollowuser = DB::getConn()->prepare ("INSERT INTO amizade (user_id, seguindo_id) values (:user_id,:seguindo_id)");
			$seguindo_id= $this->getSeguindoId() ;
			$user_id= $this->getUserId() ;
			$sqlfollowuser->bindParam(':user_id',$user_id);
			$sqlfollowuser->bindParam(':seguindo_id',$seguindo_id);
			$sqlfollowuser->execute();
			$follow = "true";
		}else{
			$follow = "false";
		}
		return $follow;
		// var_dump($follow);
	}
	// função para deixar de seguir um usuario
	function unfollow_user(){
		$count = $this->check_count();
		if ($count != 1){
			$sqlunfollowuser = DB::getConn()->prepare ("DELETE from amizade where user_id=:user_id and seguindo_id=:seguindo_id limit 1");
			$seguindo_id= $this->getSeguindoId() ;
			$user_id= $this->getUserId() ;
			$sqlunfollowuser->bindParam(':user_id',$user_id);
			$sqlunfollowuser->bindParam(':seguindo_id',$seguindo_id);
			$sqlunfollowuser->execute();
			$unfollow = "true";
		}else{
			$unfollow = "false";
		}
		return $unfollow;
		// var_dump($unfollow);
	}
}