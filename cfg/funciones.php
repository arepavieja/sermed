<?php 
class Funciones {
	
	function modalFooter1() {
		$rt = '<div class="modal-footer">
		<button data-dismiss="modal" class="btn btn-default" type="button" data-bb-handler="cancel"><i class="fa fa-times"></i> Cerrar</button>
		<button class="btn btn-primary" type="submit" data-bb-handler="confirm"><i class="fa fa-check"></i> Aceptar</button>
		</div>';
		return $rt;
	}

	function modalFooter2() {
		$rt = '<div class="modal-footer">
		<button data-dismiss="modal" class="btn btn-default" type="button" data-bb-handler="cancel"><i class="fa fa-times"></i> Cerrar</button>';
		return $rt;
	}

	function modalHeader($titulo) {
		$rt = '<div class="modal-header">
		<button data-dismiss="modal" class="bootbox-close-button close" type="button">×</button>
		<h4 class="modal-title">'.$titulo.'</h4>
		</div>';
		return $rt;
	}

	function select($var,$var2) {
		$rt = (!strcmp($var,$var2)) ? 'selected' : null;
		return $rt;
	}

}
?>