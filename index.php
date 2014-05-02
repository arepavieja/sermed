<?php 
require 'cfg/base.php';
$musuarios->redirectLogin();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Servicios Médicos IUTAI</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php require 'css/ace.php'; ?>
		<?php require 'js/ace.php'; ?>
	</head>
	<body class="col-sm-12">
		<div class="bootbox modal fade in" role="dialog" tabindex="-1" style="" aria-hidden="false">
			<div class="modal-dialog">
				<div class="modal-content"></div>
			</div>
		</div>
		<img src="img/header-new.jpg" alt="" class="logo">
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<a class="menu-toggler" id="menu-toggler" href="#"><span class="menu-text"></span></a>	
			<div class="sidebar" id="sidebar">		
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>		
				<ul class="nav nav-list"><?php require 'menu.php'; ?></ul>	
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
				</div>	
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
			<div class="main-content"><?php require 'contenido.php'; ?></div>
		</div>
		<div class="col-sm-12">
			<hr>
			<span class="text-muted pull-right">
				Unidad de Sistemas IUTAI
			</span>
		</div>
	</body>
</html>