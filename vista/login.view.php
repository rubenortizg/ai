<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/bootstrap.min.css">

	<script src='https://www.google.com/recaptcha/api.js'></script>

	<title>Administrador Inmobiliario</title>
</head>
  <body>

		<div class="container">
			<div class="row mt-3 justify-content-center mb-3">
				<div class="col-12 col-sm-9 col-md-6 col-lg-4">

					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

						<img class="logotipo" src="imagenes/ai_branch.png" width="200" alt="logotipo">

						<div class="form-group text-center">
							<h2 >Administrador Inmobiliario</h2>
						</div>

						<div class="form-group">
							<label for="usuario"><i class="fa fa-user"></i> Usuario</label>
			        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Escriba su usuario" >
						</div>

						<div class="form-group">
							<label for="password"><i class="fa fa-lock"></i> Contraseña</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Escriba su contraseña">
						</div>

						<div class="form-group d-flex justify-content-center g-recaptcha" data-sitekey="6LcGnjAUAAAAAJIh1gnFo52RT1rjpcTTOjOB_Wyw"></div>

						<div class="form-group">
							<input class="form-control btn btn-primary" type="submit" name="" value="SIGUIENTE">
						</div>

						<div class="form-group text-center">
							<a href="#">¿Has olvidado la contraseña?</a>
							<?php if (!empty($errores)): ?>
								<div class="errores">
									<ul>
										<?php echo $errores; ?>
									</ul>
								</div>
							<?php endif;?>
						</div>



					</form>
				</div>
			</div>
		</div>

<?php require 'vista/footer.php' ?>
