<?php 
require '../../../cfg/base.php';
$usuarios = $musuarios->usuarios();

?>
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Cédula</th>
			<th>Apellidos</th>
			<th>Nombres</th>
			<th>Usuario</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($usuarios)>0) : ?>
			<?php foreach($usuarios as $u) : ?>
				<tr>
					<td><?php echo $u->usuanacion.$u->usuacedula ?></td>
					<td><?php echo $u->usuaapelli ?></td>
					<td><?php echo $u->usuanombre ?></td>
					<td><?php echo $u->usuausuari ?></td>
					<td>
						<button class="btn btn-danger btn-xs" onclick="modal('app/usuarios/vistas/delete.php','usuaide=<?php echo $u->usuaide ?>')">
							<i class="fa fa-trash-o"></i>
						</button>
						<button class="btn btn-success btn-xs" onclick="modal('app/usuarios/vistas/update.php','usuaide=<?php echo $u->usuaide ?>')">
							<i class="fa fa-edit"></i>
						</button>
						<button class="btn btn-info btn-xs" onclick="modal('app/usuarios/vistas/permisos.admin.php','usuaide=<?php echo $u->usuaide ?>')">
							<i class="fa fa-lock"></i>
						</button>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="5">No hay usuarios registrados</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>