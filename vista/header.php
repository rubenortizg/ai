<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">

	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<title>Administrador Inmobiliario</title>
</head>
<body>

				<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
					<div class="container">

						<a href="<?php echo RUTA; ?>/index.php" class="navbar-brand"><h6>Administrador<br>Inmobiliario</h6></a>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Menu de Navegación">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbar">


							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									<a href="clientes.php" class="nav-link active">Clientes <i class="fa fa-users"></i></a>
								</li>
								<li class="nav-item">
									<a href="inmuebles.php" class="nav-link active">Inmuebles <i class="fa fa-building"></i></a>
								</li>

								<li class="nav-item dropdown">
									<a href="#" class="nav-link dropdown-toggle active" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recibos <i class="fa fa-credit-card"></i></a>
									<div class="dropdown-menu" aria-labelledby="submenu">
										<a href="recibos.php" class="dropdown-item">Recibos <i class="fa fa-credit-card"></i></a>
										<a href="ingresos.php" class="dropdown-item">Ingresos<i class="fa fa-arrow-left"></i></a>
										<a href="egresos.php" class="dropdown-item">Egresos <i class="fa fa-arrow-right"></i></a>
									</div>
								</li>

								<li class="nav-item">
									<a href="cerrar.php" class="nav-link active">Salir <i class="fa fa-power-off"></i></a>
								</li>

							</ul>

								<form class="form-inline my-2 my-lg-0" action="<?php echo RUTA; ?>/buscar.php" name="busqueda" method="get">
							<?php if($pagina == 'administrar.php'): ?>
								<fieldset disabled>
							<?php endif; ?>
									<input type="text" name="busqueda" class="form-control form-control-sm mr-sm-2" placeholder="Buscar" aria-label="Buscar">
									<button class="btn btn-primary form-control btn-sm my-sm-0 fa fa-search" type="submit" name="button"></button>
							<?php if($pagina == 'administrar.php'): ?>
								</fieldset>
							<?php endif; ?>
								</form>








						</div>

					</div>
				</nav>
