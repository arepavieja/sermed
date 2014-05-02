<?php 
$pacientes = $mpacientes->getPacientes();
?>
<script>
	$(function(){
		$('.buscar-paciente').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				paciente: {
					required: true,
				},
			},

			messages: {
				paciente: {
					required: 'Obligatorio',
				},
			},
			invalidHandler: function (event, validator) {
				$('.alert-danger', $('.buscar-paciente')).show();
			},
			highlight: function (e) {
				$(e).closest('.input-group').removeClass('has-info').addClass('has-error');
			},
			success: function (e) {
				$(e).closest('.input-group').removeClass('has-error').addClass('has-info');
				$(e).remove();
			},
			submitHandler: function (form) {
				$.post('app/pacientes/vistas/perfil.php',$('.buscar-paciente').serialize(),function(data){
					$('.perfil').fadeIn().html(data);
				})
			},
			invalidHandler: function (form) {
			}
		});
		$(".chosen-select").chosen({
			no_results_text: "<a href=\"#\" onclick=\"modal('app/pacientes/vistas/insert.php',''); return false;\">No hay resultados, Registrar<br></a>",
			max_selected_options: 1,
		});
	})
</script>
<form action="" class="buscar-paciente col-sm-5">
	<div class="input-group">
		<select name="paciide" class="chosen-select col-sm-11 tag-input-style clearfix" multiple data-placeholder="Buscar por nombre o cédula">
			<option value=""></option>
			<?php foreach($pacientes as $p) : ?>
				<option value="<?php echo $p->paciide ?>">
					<?php echo ' '.$p->paciapelli.' '.$p->pacinombre.' - '.$p->pacinacion.$p->pacicedula ?>
				</option>
			<?php endforeach; ?>
		</select>
		<span class="input-group-btn">	
			<button class="btn btn-primary btn-xs" style="padding-top:7px;padding-bottom:2px">
				<i class="fa fa-search bigger-130"></i>
			</button>
		</span>
	</div>	
</form>

<div class="clearfix"></div>
<div class="space-4"></div>
<div class="perfil"></div>