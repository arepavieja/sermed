<?php 
	if(isset($_GET['var']) AND !empty($_GET['var'])) :
		$content = $musuarios->getContent($_GET['var']);
		if(count($content)>0) :
			if(file_exists('app/'.$content[0]->submurl.'.php')) :
?>
				<div class="page-content">
					<div class="page-header">
						<h1>
							<i class="fa fa-<?php echo $content[0]->submicono ?>"></i>   
							<?php echo $content[0]->submtitulo ?>
							<small>
								<i class="icon-double-angle-right"></i>
								<?php echo $content[0]->submdescri ?>
							</small>
						</h1>
					</div>
					<div class="col-sm-12">
						<?php require 'app/'.$content[0]->submurl.'.php'; ?>
					</div>
				</div>
<?php				
			else :
?>
				<div class="page-content">
					<div class="page-header">
						<h1>
							<i class="fa fa-exclamation-circle"></i>   
							¡ERROR!
							<small>
								<i class="icon-double-angle-right"></i>
								Archivo no encontrado
							</small>
						</h1>
					</div>
					<div class="col-sm-12">
						<div class="alert alert-danger">
							El archivo solicitado no se encuentra o está fuera de su área de acceso.
						</div>
					</div>
				</div>
<?php
			endif;
		else :
			echo '<div class="alert alert-danger">No tiene permisos de acceso.</div>';
		endif;
	elseif(isset($_GET['var2']) and !empty($_GET['var2'])) :
		if(file_exists('app/'.$_GET['var2'].'.php')) :
?>
			<?php require 'app/'.$_GET['var2'].'.php'; ?>
<?php				
		else :
?>
			<div class="page-content">
				<div class="page-header">
					<h1>
						<i class="fa fa-exclamation-circle"></i>   
						¡ERROR!
						<small>
							<i class="icon-double-angle-right"></i>
							Archivo no encontrado
						</small>
					</h1>
				</div>
				<div class="col-sm-12">
					<div class="alert alert-danger">
						El archivo solicitado no se encuentra o está fuera de su área de acceso.
					</div>
				</div>
			</div>
<?php		
		endif;
	else :
?>
		<div class="page-content">
			<div class="page-header">
				<h1>
					<i class="fa fa-home"></i>  
					Inicio
					<small>
						<i class="icon-double-angle-right"></i>
						Servicios Médicos IUTAI
					</small>
				</h1>
			</div>
			<div class="col-sm-12">
				<?php require 'default.php'; ?>
			</div>
		</div>
<?php		
	endif;
?>