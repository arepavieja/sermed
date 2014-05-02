<?php 
$menu = $musuarios->opcionesMenu();
?>
<li>
	<a href="index.php">
		<i class="fa fa-home bigger-130"></i>
		<span class="menu-text"> &nbsp;&nbsp;Inicio</span>
	</a>
</li>
<li>
	<a href="?var2=usuarios/vistas/micuenta">
		<i class="fa fa-user bigger-130"></i>
		<span class="menu-text"> &nbsp;&nbsp;Mi Cuenta</span>
	</a>
</li>
<?php foreach($menu as $m) : ?>
	<li>
		<a href="?var=<?php echo $m->submide ?>">
			<i class="fa fa-<?php echo $m->submicono; ?>  bigger-130"></i>
			<span class="menu-text"> 
				&nbsp;&nbsp;<?php echo $m->submtitulo; ?>
			</span>
		</a>
	</li>
<?php endforeach; ?>
<li>
	<a href="logout.php">
		<i class="fa fa-sign-in bigger-130"></i>
		<span class="menu-text"> &nbsp;&nbsp;Cerrar Sesión</span>
	</a>
</li>