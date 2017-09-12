<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">
	<title>Administrador Inmobiliario</title>
</head>
  <body>
    <section>
      <form class="formulario login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
          <img class="logotipo" src="imagenes/ai_branch.png" width="200" alt="logotipo">
        </div>
        <?php
          echo "<h2>Administrador Inmobiliario</h2>";
        ?>
        <label for="usuario"><i class="fa fa-user"></i></label>
        <input type="text" name="usuario" id="usuario" placeholder="Escriba su usuario" >
        <label for="password"><i class="fa fa-lock"></i></label><input type="password" name="password" id="password" placeholder="Escriba su contraseña">
        <br>
        <i class="fa fa-sign-in" aria-hidden="true"></i>
        <input type="submit" name="" value="SIGUIENTE">
        <br>
        <a href="#">¿Has olvidado la contraseña?</a>
        <?php if (!empty($errores)): ?>
          <div class="errores">
            <ul>
              <?php echo $errores; ?>
            </ul>
          </div>
        <?php endif;?></form>
    </section>
<?php require 'vista/footer.php' ?>
