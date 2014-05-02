<?php 
require '../../../cfg/base.php';
$res = $cusuarios->valInsert($nac,$ced,$usu);
if($res==1) :
	echo $musuarios->insert($nac,$ced,$ape,$nom,$tel,$usu,$cla);
else :
	foreach($res as $r) :
		echo $r.'<br>';
	endforeach;
endif;
?>