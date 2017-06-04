<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador Inmobiliario</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  </head>
  <body>

    <section>

      <form action="login.php" method="post">

        <div>
          <img class="logotipo" src="imagenes/ai_branch.png" width="200" alt="logotipo">
        </div>
        <?php
          echo "<h2>Administrador Inmobiliario</h2>";
        ?>
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" placeholder="Escriba su usuario" >

        <label for="password">Contraseña</label>
        <input type="password" id="password" placeholder="Escriba su contraseña">

        <br>
        <input type="submit" name="" value="SIGUIENTE">
        <br>
        <a href="#">¿Has olvidado la contraseña?</a>
      </form>
    </section>






  </body>
</html>
