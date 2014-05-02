<?php 
require '../../../cfg/base.php'; 
$tiposdepaciente = $mpacientes->getTiposDePacientes();
?>

<script>
	$(function(){
		$('.fecha').datepicker({autoclose:true}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
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
				$.post('app/pacientes/procesos/_insert.php',$('.insert').serialize(),function(data){
					if(data==1) {
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

<form action="" class="insert">
	<?php echo $fn->modalHeader('Registro Paciente') ?>
	<div class="modal-body">
		<div class="msj"></div>
		
		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Cédula de Identidad:
			</label>
			<div class="col-sm-2">
				<select name="nac" id="" class="form-control">
					<option value="V">V</option>
					<option value="E">E</option>
				</select>
			</div>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="ced">
			</div>
		</div>

		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Apellidos:
			</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="ape">
			</div>
		</div>
		
		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Nombres:
			</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="nom">
			</div>
		</div>

		<div class="form-group col-sm-12">
			<label for="" class="control-label bolder col-sm-5">
				Fecha Nacimiento:
			</label>
			<div class="col-sm-7">
				<div class="input-group">
					<input type="text" class="form-control fecha" data-date-format="yyyy-mm-dd" name="fecnac" readonly>
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
						<option value="<?php echo $p->tipaide ?>"><?php echo $p->tipadescri ?></option>
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
					<option value="O-">O-</option>
					<option value="O+">O+</option>
					<option value="A-">A-</option>
					<option value="A+">A+</option>
					<option value="B-">B-</option>
					<option value="B+">B+</option>
					<option value="AB-">AB-</option>
					<option value="AB+">AB+</option>
				</select>
			</div>
		</div>


	</div>
	<div class="clearfix"></div>
	<?php echo $fn->modalFooter1() ?>
</form>