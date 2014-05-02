<?php 
require '../../../cfg/base.php';
$dp = $mpacientes->getDatosPaciente($paciide);
?>

<script>
	
</script>

<div class="table-responsive">
	<div class="table-header">
		Datos Personales
		<button class="btn btn-success pull-right btn-xs bolder" onclick="modal('app/pacientes/vistas/personales.update.php','paciide=<?php echo $paciide ?>')">
			<i class="fa fa-pencil"></i> Editar
		</button>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="col-sm-6">Tipo de Paciente</th>
				<th class="col-sm-6">Cédula</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $dp[0]->tipadescri ?></td>
				<td><?php echo $dp[0]->pacinacion,$dp[0]->pacicedula ?></td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th>Apellidos</th>
				<th>Nombres</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $dp[0]->paciapelli ?></td>
				<td><?php echo $dp[0]->pacinombre ?></td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th>Fecha de Nac.</th>
				<th>Edad</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $dp[0]->pacifecnac ?></td>
				<td></td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th colspan="2">Tipo de Sangre</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="2"><?php echo $dp[0]->pacitipsan ?></td>
			</tr>
		</tbody>
	</table>
</div>
<div class="clearfix"></div>