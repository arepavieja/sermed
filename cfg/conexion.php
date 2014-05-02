<?php 
class Conexion {
	private $driver, $host, $usr, $pwd, $dbname, $con;

	function __clone() {

	}

	function __construct() {
		
	}

	function postgres() {
		$this->driver = 'pgsql';
		$this->host   = 'localhost';
		$this->usr    = 'sermed';
		$this->pwd    = 'sermed';
		$this->dbname = 'bdsermed';
		try {
			$this->con = new PDO($this->driver.':host='.$this->host.';dbname='.$this->dbname, $this->usr, $this->pwd);
			return $this->con;
		} catch(PDOException $e) {
		 	$e->getMessage('Error');
		}
	}

}

#$a = new Conexion();
#$a->postgres();
?>