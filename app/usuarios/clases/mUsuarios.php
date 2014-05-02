<?php 
class mUsuarios {
	
	protected $dbh, $con, $msj;

	function __clone() {

	}

	function __construct() {
		$this->dbh = new Conexion();
		$this->con = $this->dbh->postgres();
		$this->msj = array();
	}

	function redirectLogin() {
		if(!isset($_SESSION['usuaide']) OR $_SESSION['usuaide']==null) {
			header('location: login.php');
		}
	}

	function redirectIndex() {
		if(isset($_SESSION['usuaide']) and $_SESSION['usuaide']!=null) {
			header('location: index.php');
		}
	}

	function login($usuario,$clave) {
		$sql = "SELECT * FROM sf_login(?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$usuario);
		$res->bindParam(2,$clave);
		$rt = ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
		return $rt;
	}

	function opcionesMenu() {
		$sql = "SELECT * FROM sf_menu(?) AS rows(submide int, submtitulo character varying(30), submicono character varying(20))";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$_SESSION['usuaide']);
		return ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
	}

	function getContent($var) {
		$sql = "SELECT * FROM sf_content(?,?) AS rows(submide integer, submtitulo character varying(30), submdescri character varying(50), submicono character varying(20), submurl character varying(50))";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$_SESSION['usuaide']);
		$res->bindParam(2,$var);
		return ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
	}

	function usuarios() {
		$sql = "SELECT * FROM vw_usuarios";
		$res = $this->con->prepare($sql);
		return ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
	}
	/**
	 * Compara las cédulas con las de usuarios registrados
		* @param  [char] 		$nac [Nacionalidad]
		* @param  [integer] $ced [Cédula de identidad]
		* @return [integer]      [Total de registros encontrados]
	 */
	function cmpInsertCedula($nac,$ced) {
		$sql = "SELECT * FROM sf_cmpinsertcedula(?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$nac);
		$res->bindParam(2,$ced);
		$res->execute();
		return $res->fetchALl(PDO::FETCH_OBJ);
	}
	function cmpUpdateCedula($nac,$ced,$usuaide) {
		$sql = "SELECT * FROM sf_cmpupdatecedula(?,?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$nac);
		$res->bindParam(2,$ced);
		$res->bindParam(3,$usuaide);
		$res->execute();
		return $res->fetchALl(PDO::FETCH_OBJ);
	}
	/**
	 * Compara los nombres de usuario con los usuarios registrados
		* @param  [varchar] $usua [Nombre de usuario]
		* @return [integer]      	[Total de registros encontrados]
	 */
	function cmpInsertUsuario($usu) {
		$sql = "SELECT * FROM sf_cmpinsertusuario(?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$usu);
		$res->execute();
		return $res->fetchALl(PDO::FETCH_OBJ);
	}

	function cmpUpdateUsuario($usu,$usuaide) {
		$sql = "SELECT * FROM sf_cmpupdateusuario(?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$usu);
		$res->bindParam(2,$usuaide);
		$res->execute();
		return $res->fetchALl(PDO::FETCH_OBJ);
	}

	function insert($nac,$ced,$ape,$nom,$tel,$usu,$cla) {
		$sql = "SELECT sf_insertusuario(?,?,?,?,?,?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$nac);
		$res->bindParam(2,$ced);
		$res->bindParam(3,$ape);
		$res->bindParam(4,$nom);
		$res->bindParam(5,$tel);
		$res->bindParam(6,$usu);
		$res->bindParam(7,$cla);
		return ($res->execute()==true) ? 1 : print_r($res->errorInfo());
	}

	/**
	 * Selecciona usuario por identificador
	 * @param  [integer] $usuaide [Identificador del usuario]
	 * @return [array]          	[Datos del usuario]
	 */
	function usuaIde($usuaide) {
		$sql = "SELECT * FROM sf_usuaide(?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$usuaide);
		return ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
	}

	function update($nac,$ced,$ape,$nom,$tel,$usu,$cla,$usuaide) {
		$sql = "SELECT sf_updateusuario(?,?,?,?,?,?,?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$nac);
		$res->bindParam(2,$ced);
		$res->bindParam(3,$ape);
		$res->bindParam(4,$nom);
		$res->bindParam(5,$tel);
		$res->bindParam(6,$usu);
		$res->bindParam(7,$cla);
		$res->bindParam(8,$usuaide);
		return ($res->execute()==true) ? 1 : print_r($res->errorInfo());
	}

	function submodulos() {
		$sql = "SELECT * FROM sf_submodulos() AS rows(modudescri character varying(30), submdescri character varying(50), submide integer)";
		$res = $this->con->prepare($sql);
		return ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
	}

	function permisos($usuaide,$submide) {
		$sql = "SELECT * FROM sf_permisos(?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$usuaide);
		$res->bindParam(2,$submide);
		return ($res->execute()==true) ? $res->fetchAll(PDO::FETCH_OBJ) : print_r($res->errorInfo());
	}

	function permisosUpdate($usuaide, $submide, $estado) {
		$total = count($this->permisos($usuaide,$submide));
		$sql = "SELECT sf_permisosupdate(?,?,?,?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$usuaide);
		$res->bindParam(2,$submide);
		$res->bindParam(3,$estado);
		$res->bindParam(4,$total);
		return ($res->execute()==true) ? 1 : print_r($res->errorInfo());
	}

	function delete($usuaide) {
		$sql = "SELECT sf_deleteusuario(?)";
		$res = $this->con->prepare($sql);
		$res->bindParam(1,$usuaide);
		return ($res->execute()==true) ? 1 : print_r($res->errorInfo());
	}

}
?>