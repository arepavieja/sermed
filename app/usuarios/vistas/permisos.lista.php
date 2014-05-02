<?php 
require '../../../cfg/base.php';
$subm = $musuarios->submodulos();
?>

<script>
	function permisoUpdate(datos) {
		$.post('app/usuarios/procesos/_permisos.update.php',datos,function(data){
			if(data==1) {
				load('app/usuarios/vistas/permisos.lista.php','usuaide=<?php echo $usuaide ?>','.modal-body')
			} else {
				alerta('.msj','danger',data);
			}
		})
	}	
</script>

<div class="msj"></div>
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>Módulo</th>
			<th>Submódulo</th>
			<th>Estado</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($subm as $s) : ?>
			<?php $perm 	 = $musuarios->permisos($usuaide,$s->submide) ?>
			<?php $permiso = (count($perm)>0) ? $cusuarios->cpermisos($perm[0]->permestado) : $cusuarios->cpermisos(0); ?>
			<tr>
				<td><?php echo $s->modudescri ?></td>
				<td><?php echo $s->submdescri ?></td>
				<td><?php echo $permiso['texto'] ?></td>
				<td>
					<button class="btn btn-<?php echo $permiso['clase']?> btn-xs" onclick="permisoUpdate('usuaide=<?php echo $usuaide ?>&submide=<?php echo $s->submide ?>&estado=<?php echo $permiso['valor'] ?>')"> 
						<i class="fa fa-<?php echo $permiso['icono']; ?>"></i> 
						<?php echo $permiso['boton'] ?>
					</button></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>