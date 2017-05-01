<?php
//Pattern de recherche pour kayak
$pattern = "/\/kayak\.php$/";
//Création du path d'inclusion
 $inc = (preg_match($pattern, $_SERVER['PHP_SELF']) !== 1 )? "../":"";
$inc.="util/databasectrl.php";

//Inclusion
include($inc);

class usersCtrl{

public $db;

public function __construct(){

	$this->db = databasectrl::isThere();
}

public function create($infos){

//Hash du mot de passe
	$password = password_hash($infos['motdepasse'], PASSWORD_DEFAULT);

	$sql = "INSERT INTO users (pseudo, motdepasse, email) VALUES (?,?,?);";
	$middleware = $this->db->prepare($sql);
	$middleware->execute(array($infos['pseudo'], $password, $infos['email']));
}


public function exists($pseudo){

$sql = "SELECT id, pseudo, motdepasse FROM users wHERE pseudo=?";
$middleware = $this->db->prepare($sql);
$middleware->execute(array($pseudo));
$data = $middleware->fetch();

//Si data est un tableau, le compte existe, sinon, il n'existe pas
return is_array($data);

}


public function get($pseudo){
	$sql = "SELECT * FROM users WHERE pseudo = ?";
	$middle = $this->db->prepare($sql);
	$middle->execute(array($pseudo));
	return $middle->fetch();
}


public function checkPass($data){
	$item = $this->get($data['pseudo']);
	if(is_array($item)){
		return password_verify($data['motdepasse'], $item['motdepasse']);
	}else{
		return false;
	}
	}



}

?>