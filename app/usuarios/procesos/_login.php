<?php 
require '../../../cfg/base.php';
$res = $musuarios->login($usuario,$clave);
if(count($res)>0) :
	$_SESSION = array(
			'usuaide'=>$res[0]->usuaide,
			'usuanombre'=>$res[0]->usuanombre,
		);
	echo 1;
else :
	echo '¡Error!. Datos no válidos';
endif;
?>