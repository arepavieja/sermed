<?php 
require '../../../cfg/base.php';
$usuario = $musuarios->usuaIde($usuaide);
?>

<script>
	$(function(){
		$('.delete').submit(function(e){
			e.preventDefault();
			$.post('app/usuarios/procesos/_delete.php',$('.delete').serialize(),function(data){
					if(data==1) {
						load('app/usuarios/vistas/lista.php','','.lista-usuarios')
						$('.modal').modal('hide');
					} else {
						alerta('.msj','danger',data);
					}
				})
		})
	})
</script>

<?php foreach($usuario as $u) : ?>
	<form action="" class="delete">
		<?php echo $fn->modalHeader('Eliminar usuario') ?>
		<div class="modal-body">
			<div class="msj"></div>
			<div class="alert alert-info">
				¿Borrar al usuario seleccionado?
			</div>
			<div class="col-sm-4 bolder">
				Cédula de Identidad:
			</div>
			<div class="col-sm-8">
				<?php echo $u->usuanacion.$u->usuacedula ?>
			</div>
			<div class="col-sm-4 bolder">
				Apellidos y Nombres:
			</div>
			<div class="col-sm-8">
				<?php echo $u->usuaapelli.' '.$u->usuanombre ?>
			</div>
		</div>
		<div class="clearfix"></div>
		<?php echo $fn->modalFooter1() ?>
		<input type="hidden" name="usuaide" value="<?php echo $u->usuaide ?>">
	</form>
<?php endforeach; ?>