<?php 
if(file_exists('cfg/config.php')) :
	require 'cfg/config.php';
	require 'cfg/conexion.php';
	require 'cfg/funciones.php';
else :
	require '../../../cfg/config.php';
	require '../../../cfg/conexion.php';
	require '../../../cfg/funciones.php';
endif;

$apps = array(
		'usuarios',
		'pacientes',
	);
$files = array(
		array('mUsuarios','cUsuarios'),
		array('mPacientes','cPacientes'),
	);

foreach($apps as $appind=>$app) {
	foreach($files[$appind] as $file) {
		if (file_exists('app/'.$app.'/clases/')) :
			require 'app/'.$app.'/clases/'.$file.'.php';
		elseif (file_exists('../../'.$app.'/clases/')) :
			require '../../'.$app.'/clases/'.$file.'.php';
		else :
			require '../clases/'.$file.'.php';
		endif;
	}
}

$fn = new Funciones();
foreach($apps as $appind=>$app) {
	foreach($files[$appind] as $file) {
		$clase = strtolower($file);
		$$clase = new $file();
	}
}

?>