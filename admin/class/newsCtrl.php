<?php 

include('../util/databasectrl.php');

class newsCtrl{

	public $db;

	function __construct(){
		$this->db = DataBaseCtrl::isThere();
}

	public function save($data){

		$sql = "INSERT INTO news (titre, contenu, timestamp) VALUES (?, ?, ?)";
		$time = time();
		$insert = $this->db->prepare($sql);
		$insert->execute(array($data['titre'], $data['contenu'], $time));

	}



}


?>