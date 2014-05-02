<?php 
class cUsuarios extends mUsuarios {

	function valCed($nac,$ced) {
		$total = $this->cmpInsertCedula($nac,$ced);
		if($total[0]->sf_cmpinsertcedula>0) :
			$rt = "Cédula ya registrada";
		else :
			$rt = 1;
		endif;
		return $rt;
	}

	function valUsu($usu) {
		$total = $this->cmpInsertUsuario($usu);
		if($total[0]->sf_cmpinsertusuario>0) :
			$rt = "Usuario ya registrado";
		else :
			$rt = 1;
		endif;
		return $rt;
	}

	function valInsert($nac,$ced,$usu) {
		$a = $this->valCed($nac,$ced);
		$b = $this->valUsu($usu);
		$a1 = ($a==1) ? 1 : $this->msj[] = $a;
		$b1 = ($b==1) ? 1 : $this->msj[] = $b;
		$rt = ($a1==1 and $b1==1) ? 1 : $this->msj;
		return $rt;
	}

	function valUpdateCed($nac,$ced,$usuaide) {
		$total = $this->cmpUpdateCedula($nac,$ced,$usuaide);
		if($total[0]->sf_cmpupdatecedula>0) :
			$rt = "Cédula ya registrada";
		else :
			$rt = 1;
		endif;
		return $rt;
	}

	function valUpdateUsu($usu,$usuaide) {
		$total = $this->cmpUpdateUsuario($usu,$usuaide);
		if($total[0]->sf_cmpupdateusuario>0) :
			$rt = "Usuario ya registrado";
		else :
			$rt = 1;
		endif;
		return $rt;
	}

	function valUpdate($nac,$ced,$usu,$usuaide) {
		$a = $this->valUpdateCed($nac,$ced,$usuaide);
		$b = $this->valUpdateUsu($usu,$usuaide);
		$a1 = ($a==1) ? 1 : $this->msj[] = $a;
		$b1 = ($b==1) ? 1 : $this->msj[] = $b;
		$rt = ($a1==1 and $b1==1) ? 1 : $this->msj;
		return $rt;
	}

	function cpermisos($estado) {
		$texto = ($estado==1) ? 'Permitido' : 'Denegado';
		$boton = ($estado==1) ? 'Denegar' : 'Permitir';
		$valor = ($estado==1) ? 0 : 1;
		$clase = ($estado==1) ? 'danger' : 'success';
		$icono = ($estado==1) ? 'lock' : 'unlock';
		$rt = array(
			'texto'=>$texto,
			'boton'=>$boton,
			'valor'=>$valor,
			'clase'=>$clase,
			'icono'=>$icono,
			);
		return $rt;
	}
}
?>