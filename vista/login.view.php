<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador Inmobiliario</title>
    <meta name="viewport" content="width=device-width, user-scalable=no,
  	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">


  </head>
  <body>

    <section>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

        <div>
          <img class="logotipo" src="imagenes/ai_branch.png" width="200" alt="logotipo">
        </div>
        <?php
          echo "<h2>Administrador Inmobiliario</h2>";
        ?>
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" placeholder="Escriba su usuario" >

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Escriba su contraseña">

        <br>
        <input type="submit" name="" value="SIGUIENTE">
        <br>
        <a href="#">¿Has olvidado la contraseña?</a>

        <?php if (!empty($errores)): ?>
          <div class="errores">
            <ul>
              <?php echo $errores; ?>
            </ul>
          </div>
        <?php endif;?>
      </form>
    </section>






  </body>
</html>
