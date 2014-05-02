<?php 
require '../../../cfg/base.php';
$usuario = $musuarios->usuaIde($usuaide);
?>

<script>
	$(function(){
		$('.telefono').mask('0999-9999999');
		$('.insert').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				ced: {
					required: true,
					number: true,
					maxlength: 9,
					minlength: 7,
				},
				ape: {
					required: true,
				},
				nom: {
					required: true,
				},
				tel: {
					required: true,
				},
				usu: {
					required: true,
				},
				cla: {
					required: true,
				},
				cla1: {
					equalTo: '#cla',
				},
			},

			messages: {
				ced: {
					required: 'Obligatorio',
					number: 'Numérico',
					maxlength: 'Máximo 9 dígitos',
					minlength: 'Mínimo 7 dígitos',
				},
				ape: {
					required: 'Obligatorio',
				},
				nom: {
					required: 'Obligatorio',
				},
				tel: {
					required: 'Obligatorio',
				},
				usu: {
					required: 'Obligatorio',
				},
				cla: {
					required: 'Obligatorio',
				},
				cla1: {
					equalTo: 'Las claves no coinciden',
				},
			},
			invalidHandler: function (event, validator) { 
				$('.alert-danger', $('.insert')).show();
			},
			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},
			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
				$(e).remove();
			},
			submitHandler: function (form) {
				$.post('app/usuarios/procesos/_update.php',$('.insert').serialize(),function(data){
					if(data==1) {
						load('app/usuarios/vistas/lista.php','','.lista-usuarios')
						$('.modal').modal('hide');
					} else {
						alerta('.msj','danger',data);
					}
				})
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>
<?php foreach($usuario as $u) : ?>
	<form action="" class="insert">
		<?php echo $fn->modalHeader('Editar usuario') ?>
		<div class="modal-body">
			<div class="msj"></div>
			<div class="form-group col-sm-12">
				<label for="" class="control-label bolder col-sm-5">
					Cédula de Identidad:
				</label>
				<div class="col-sm-2">
					<select name="nac" id="" class="form-control">
						<option value="V" <?php echo $fn->select('V',$u->usuanacion) ?>>V</option>
						<option value="E" <?php echo $fn->select('E',$u->usuanacion) ?>>E</option>
					</select>
				</div>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="ced" value="<?php echo $u->usuacedula ?>">
				</div>
			</div>

			<div class="form-group col-sm-12">
				<label for="" class="control-label bolder col-sm-5">
					Apellidos:
				</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="ape" value="<?php echo $u->usuaapelli ?>">
				</div>
			</div>

			<div class="form-group col-sm-12">
				<label for="" class="control-label bolder col-sm-5">
					Nombres:
				</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="nom" value="<?php echo $u->usuanombre ?>">
				</div>
			</div>

			<div class="form-group col-sm-12">
				<label for="" class="control-label bolder col-sm-5">
					Teléfono:
				</label>
				<div class="col-sm-7">
					<input type="text" class="form-control telefono" name="tel" value="<?php echo $u->usuatelefo ?>">
				</div>
			</div>

			<div class="form-group col-sm-12">
				<label for="" class="control-label bolder col-sm-5">
					Nombre de Usuario:
				</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="usu" value="<?php echo $u->usuausuari ?>">
				</div>
			</div>

			<div class="form-group col-sm-12">
				<label for="" class="control-label bolder col-sm-5">
					Clave de Acceso:
				</label>
				<div class="col-sm-7">
					<input type="password" class="form-control" name="cla" id="cla" value="<?php echo $u->usuaclave ?>">
				</div>
			</div>

			<div class="form-group col-sm-12">
				<label for="" class="control-label bolder col-sm-5">
					Confirme Clave:
				</label>
				<div class="col-sm-7">
					<input type="password" class="form-control" name="cla1" value="<?php echo $u->usuaclave ?>">
				</div>
			</div>

		</div>
		<div class="clearfix"></div>
		<?php echo $fn->modalFooter1() ?>
		<input type="hidden" name="usuaide" value="<?php echo $u->usuaide ?>">
	</form>
<?php endforeach; ?>