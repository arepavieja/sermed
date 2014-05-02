<?php 
require '../../../cfg/base.php';
$res = $cpacientes->valInsert($nac,$ced);
if($res==1) :
	echo $mpacientes->insert($nac,$ced,$ape,$nom,$fecnac,$tipo,$sangre);
else :
	foreach($res as $r) :
		echo $r.'<br>';
	endforeach;
endif;
?>