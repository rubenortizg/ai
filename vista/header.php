<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">

	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<title>Administrador Inmobiliario</title>
</head>
<body>
	<header>
		<div class="contenedor">
			<div class="logo izquierda">
				<p><a href="<?php echo RUTA; ?>/index.php"><i class="fa fa-home"></i> Administrador Inmobiliario</a></p>
			</div>

			<div class="derecha">

			<?php if($pagina == 'administrar.php'): ?>

		  <?php else: ?>
				<form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.php" method="get">
					<input type="text" name="busqueda" placeholder="Buscar">
					<button type="submit" class="icono fa fa-search"></button>
				</form>
		  <?php endif; ?>


				<nav class="menu">
					<ul>
						<li><a href="clientes.php">Clientes <i class="fa fa-users"></i></a></li>
						<li><a href="inmuebles.php">Inmuebles <i class="fa fa-building"></i></a></li>
						<li><a href="recibos.php">Recibos <i class="fa fa-credit-card"></i></a>
							<ul>
								<li><a href="ingresos.php">Ingresos<i class="fa fa-arrow-left"></i></a></li>
								<li><a href="egresos.php">Egresos <i class="fa fa-arrow-right"></i></a></li>
							</ul>
						</li>
						<li><a href="cerrar.php"><i class="fa fa-power-off fa-lg"></i></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
