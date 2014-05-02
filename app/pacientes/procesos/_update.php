<?php 
require '../../../cfg/base.php';
$res = $cpacientes->valUpdate($nac,$ced,$paciide);
if($res==1) :
	echo $mpacientes->update($nac,$ced,$ape,$nom,$fecnac,$tipo,$sangre,$paciide);
else :
	foreach($res as $r) :
		echo $r.'<br>';
	endforeach;
endif;
?>