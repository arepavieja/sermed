<?php 
require '../../../cfg/base.php';
$dp = $mpacientes->getDatosPaciente($paciide); 
$tiposdepaciente = $mpacientes->getTiposDePacientes();
?>

<script>
	$(function(){
		$('.fecha').datepicker({autoclose:true}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		$('.update').validate({
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
				tipo: {
					required: true,
				},
				fecnac: {
					required: true,
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
				tipo: {
					required: 'Obligatorio',
				},
				fecnac: {
					required: 'Obligatorio',
				},
			},
			invalidHandler: function (event, validator) { 
				$('.alert-danger', $('.update')).show();
			},
			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},
			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
				$(e).remove();
			},
			submitHandler: function (form) {
				$.post('app/pacientes/procesos/_update.php',$('.update').serialize(),function(data){
					if(data==1) {
						$('.modal').modal('hide');
						load('app/pacientes/vistas/personales.php','paciide=<?php echo $paciide ?>','.personales')
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

<form action="" class="update">
	<?php echo $fn->modalHeader('Editar Paciente') ?>
	<div class="modal-body">
		<div class="msj"></div>
		
		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Cédula de Identidad:
			</label>
			<div class="col-sm-2">
				<select name="nac" id="" class="form-control">
					<option value="V" <?php echo $fn->select($dp[0]->pacinacion,'V') ?>>
						V
					</option>
					<option value="E" <?php echo $fn->select($dp[0]->pacinacion,'E') ?>>
						E
					</option>
				</select>
			</div>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="ced" value="<?php echo $dp[0]->pacicedula ?>">
			</div>
		</div>

		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Apellidos:
			</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="ape" value="<?php echo $dp[0]->paciapelli ?>">
			</div>
		</div>
		
		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Nombres:
			</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="nom" value="<?php echo $dp[0]->pacinombre ?>">
			</div>
		</div>

		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Fecha Nacimiento:
			</label>
			<div class="col-sm-7">
				<div class="input-group">
					<input type="text" class="form-control fecha" data-date-format="yyyy-mm-dd" name="fecnac" readonly value="<?php echo $dp[0]->pacifecnac ?>">
					<span class="input-group-addon">
						<i class="icon-calendar bigger-110"></i>
					</span>
				</div>
			</div>
		</div>

		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Tipo de Paciente:
			</label>
			<div class="col-sm-7">
				<select name="tipo" id="" class="form-control">
					<option value=""></option>
					<?php foreach($tiposdepaciente as $p) : ?>
						<option value="<?php echo $p->tipaide ?>" <?php echo $fn->select($dp[0]->tipaide,$p->tipaide) ?>><?php echo $p->tipadescri ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Tipo de Sangre:
			</label>
			<div class="col-sm-7">
				<select name="sangre" id="" class="form-control">
					<option value="O-" <?php echo $fn->select($dp[0]->pacitipsan,'O-') ?>>O-</option>
					<option value="O+" <?php echo $fn->select($dp[0]->pacitipsan,'O+') ?>>O+</option>
					<option value="A-" <?php echo $fn->select($dp[0]->pacitipsan,'A-') ?>>A-</option>
					<option value="A+" <?php echo $fn->select($dp[0]->pacitipsan,'A+') ?>>A+</option>
					<option value="B-" <?php echo $fn->select($dp[0]->pacitipsan,'B-') ?>>B-</option>
					<option value="B+" <?php echo $fn->select($dp[0]->pacitipsan,'B+') ?>>B+</option>
					<option value="AB-" <?php echo $fn->select($dp[0]->pacitipsan,'AB-') ?>>AB-</option>
					<option value="AB+" <?php echo $fn->select($dp[0]->pacitipsan,'AB+') ?>>AB+</option>
				</select>
			</div>
		</div>


	</div>
	<div class="clearfix"></div>
	<?php echo $fn->modalFooter1() ?>
	<input type="hidden" name="paciide" value="<?php echo $dp[0]->paciide ?>">
</form>