<?php require 'header.php'; ?>

    <div class="contenedor">
        <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div>
            <img class="logotipo" src="imagenes/ai_branch.png" width="200" alt="logotipo">
          </div>
          <?php
          echo "<h2>Registrar Nuevo Usuario</h2>";
          ?>
          <label for="usuario"><i class="fa fa-user"></i></label>
          <input type="text" name="usuario" id="usuario" placeholder="Escriba el usuario a crear" >

          <label for="password"><i class="fa fa-lock"></i></label>
          <input type="password" name="password" id="password" placeholder="Escriba la contraseña">

          <label for="password2"><i class="fa fa-lock"></i></label>
          <input type="password" name="password2" id="password2" placeholder="Confirme la contraseña">

          <br>
          <input type="submit" name="" value="SIGUIENTE">

          <?php if (!empty($errores)): ?>
            <div class="errores">
              <ul>
                <?php echo $errores; ?>
              </ul>
            </div>
          <?php endif;?>
        </form>
      </div>







  </body>
</html>
