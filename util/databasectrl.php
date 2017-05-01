<?php 
	
	/**
	* 
	*/
	class DataBaseCtrl {
		
		public $host; 

		public $dbname;

		public $user;

		public $password;

		public $port;

		public $c;

			private function __construct()
			{
				$this->host = 'localhost';
				$this->dbname = 'alternatrip';
				$this->user = 'root';
				$this->password = '';
				$this->port = '';
				$toto = $this->getConnecInfo();
				$this->c = new PDO(array_shift($toto), array_shift($toto), array_shift($toto));

			}

			function getConnecInfo() {

				$ret = array();
				array_push($ret, "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8");
	            array_push($ret, $this->user);
	            array_push($ret, $this->password);

	            return $ret;



			}

			function prepare($arg) {

				return $this->c->prepare($arg);

			}

			function execute($obj){

				$obj->execute();
			}

static function isThere(){

	if(!empty($_SESSION['db'])) {
$ret = $_SESSION['db'];
	}else {
$ret = new DataBaseCtrl();
	}
return $ret;
}
}

 ?>