<?php 
require 'cfg/base.php';
$musuarios->redirectIndex();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Servicios Médicos IUTAI</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php require 'css/ace.php'; ?>
	</head>

	<body>
		<div class="col-sm-10 col-sm-offset-1">
			<img src="img/header-new.jpg" alt="" class="logo">
			<form action="" class="well col-sm-4 col-sm-offset-4 login">
				<div class="msj"></div>
				<div class="form-group col-sm-12">
					<label for="" class="col-sm-12 bolder control-label">Usuario</label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="usuario" placeholder="Indique su nombre de usuario">
					</div>
				</div>
				<div class="form-group col-sm-12">
					<label for="" class="col-sm-12 bolder control-label">Clave</label>
					<div class="col-sm-12">
						<input type="password" class="form-control" name="clave" placeholder="Indique su clave de acceso">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-actions clearfix">
					<button class="btn btn-primary pull-right"><i class="fa fa-key"></i> Entrar</button>
				</div>
			</form>
			<div class="clearfix"></div>
			<div class="col-sm-12">
				<hr>
				<span class="text-muted pull-right">
					Unidad de Sistemas IUTAI
				</span>
			</div>
		</div>
		<?php require 'js/ace.php'; ?>
		
		<script>
			$(function(){
				$('.login').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						usuario: {
							required: true,
						},
						clave: {
							required: true,
						},
					},

					messages: {
						usuario: {
							required: 'Obligatorio',
						},
						clave: {
							required: 'Obligatorio',
						},
					},

					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-danger', $('.login')).show();
					},

					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},

					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
						$(e).remove();
					},

					submitHandler: function (form) {
						$.post('app/usuarios/procesos/_login.php',$('.login').serialize(), function(data){
							if(data==1) {
								location.reload();
							} else {
								alerta('.msj','danger',data);
							}
						});
					},
					invalidHandler: function (form) {
					}
				});
			})
		</script>

	</body>
</html>