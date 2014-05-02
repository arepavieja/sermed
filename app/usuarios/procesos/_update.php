<?php 
require '../../../cfg/base.php';
$res = $cusuarios->valUpdate($nac,$ced,$usu,$usuaide);
if($res==1) :
	echo $musuarios->update($nac,$ced,$ape,$nom,$tel,$usu,$cla,$usuaide);
else :
	foreach($res as $r) :
		echo $r.'<br>';
	endforeach;
endif;
?>