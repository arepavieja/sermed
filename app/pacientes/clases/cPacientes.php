<?php 
class cPacientes extends mPacientes {
	function valCed($nac,$ced) {
		$total = $this->cmpInsertCedula($nac,$ced);
		if($total[0]->sf_cmpinsertcedulapaciente>0) :
			$rt = "Cédula ya registrada";
		else :
			$rt = 1;
		endif;
		return $rt;
	}

	function valInsert($nac,$ced) {
		$a = $this->valCed($nac,$ced);
		$a1 = ($a==1) ? 1 : $this->msj[] = $a;
		$rt = ($a1==1) ? 1 : $this->msj;
		return $rt;
	}

	function valUpdateCed($nac,$ced,$paciide) {
		$total = $this->cmpUpdateCedula($nac,$ced,$paciide);
		if($total[0]->sf_cmpupdatecedulapaciente>0) :
			$rt = "Cédula ya registrada";
		else :
			$rt = 1;
		endif;
		return $rt;
	}

	function valUpdate($nac,$ced,$paciide) {
		$a = $this->valUpdateCed($nac,$ced,$paciide);
		$a1 = ($a==1) ? 1 : $this->msj[] = $a;
		$rt = ($a1==1) ? 1 : $this->msj;
		return $rt;
	}
}
?>