<?php 
class mPacientes {
	
	protected $dbh, $con, $msj;

	function __clone() {

	}

	function __construct() {
		$this->dbh = new Conexion();
		$this->con = $this->dbh->postgres();
		$this->msj = array();
	}

	function getPacientes() {
		$sql = "SELECT * FROM vw_pacientes";
		$res = $this->con->prepare($sql);
		$rt = ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
		return $rt;
	}

	function getTiposDePacientes() {
		$sql = "SELECT * FROM sf_tiposdepaciente()";
		$res = $this->con->prepare($sql);
		$rt = ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
		return $rt;
	}
	/**
	 * Compara las cédulas con las de pacientes registrados
		* @param  [char] 		$nac [Nacionalidad]
		* @param  [integer] $ced [Cédula de identidad]
		* @return [integer]      [Total de registros encontrados]
	 */
	function cmpInsertCedula($nac,$ced) {
		$sql = "SELECT * FROM sf_cmpinsertcedulapaciente(?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$nac);
		$res->bindParam(2,$ced);
		$res->execute();
		return $res->fetchALl(PDO::FETCH_OBJ);
	}
	function cmpUpdateCedula($nac,$ced,$usuaide) {
		$sql = "SELECT * FROM sf_cmpupdatecedulapaciente(?,?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$nac);
		$res->bindParam(2,$ced);
		$res->bindParam(3,$paciide);
		$res->execute();
		return $res->fetchALl(PDO::FETCH_OBJ);
	}

	function insert($nac,$ced,$ape,$nom,$fecnac,$tipo, $sangre) {
		$sql = "SELECT sf_insertpaciente(?,?,?,?,?,?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$nac);
		$res->bindParam(2,$ced);
		$res->bindParam(3,$ape);
		$res->bindParam(4,$nom);
		$res->bindParam(5,$fecnac);
		$res->bindParam(6,$tipo);
		$res->bindParam(7,$sangre);
		return ($res->execute()==true) ? 1 : print_r($res->errorInfo());
	}

	function getDatosPaciente($paciide) {
		$sql = "SELECT * FROM sf_datospaciente(?) 
			AS rows(paciide integer, pacinacion char(1), pacicedula integer, paciapelli character varying(30), pacinombre character varying(30), pacifecnac date, tipaide smallint, pacitipsan character varying(3), tipadescri character varying(20))";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$paciide);
		return ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
	}

	function update($nac,$ced,$ape,$nom,$fecnac,$tipo,$sangre,$paciide) {
		$sql = "SELECT sf_updatepaciente(?,?,?,?,?,?,?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$nac);
		$res->bindParam(2,$ced);
		$res->bindParam(3,$ape);
		$res->bindParam(4,$nom);
		$res->bindParam(5,$fecnac);
		$res->bindParam(6,$tipo);
		$res->bindParam(7,$sangre);
		$res->bindParam(8,$paciide);
		return ($res->execute()==true) ? 1 : print_r($res->errorInfo());
	}
	
}