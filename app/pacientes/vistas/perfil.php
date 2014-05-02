<?php 
require '../../../cfg/base.php';
?>
<script>
	load('app/pacientes/vistas/personales.php','paciide=<?php echo $paciide ?>','.personales')
	load('app/pacientes/vistas/academicos.php','paciide=<?php echo $paciide ?>','.academicos')
	load('app/pacientes/vistas/antc.familiares.php','paciide=<?php echo $paciide ?>','.familiares')
	load('app/pacientes/vistas/antc.patologicos.php','paciide=<?php echo $paciide ?>','.patologicos')
	load('app/pacientes/vistas/antc.quirurgicos.php','paciide=<?php echo $paciide ?>','.quirurgicos')
</script>
<hr>
<div class="btn-group pull-right">
	<button class="btn btn-inverse">
		<i class="fa fa-check-square"></i> Asistencia
	</button>
	<button class="btn btn-inverse" onclick="load('app/pacientes/vistas/perfil.php','paciide=<?php echo $paciide ?>','.perfil')">
		<i class="fa fa-file"></i> Historia
	</button>
	<button class="btn btn-inverse">
		<i class="fa fa-road"></i> Antropometría
	</button>
	<button class="btn btn-inverse">
		<i class="fa fa-plus-square"></i> Signos Vitales
	</button>
	<button class="btn btn-inverse">
		<i class="fa fa-user-md"></i> Consultas
	</button>
</div>
<div class="clearfix"></div>
<div class="space-10"></div>
<div class="row">
	<div class="personales col-sm-6"></div>
	<div class="academicos col-sm-6"></div>
</div>
<div class="row">
	<div class="familiares col-sm-4"></div>
	<div class="patologicos col-sm-4"></div>
	<div class="quirurgicos col-sm-4"></div>
</div>
