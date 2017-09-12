<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="derecha">
      <nav class="nuevo">
        <ul>
          <li><a href="inmuebles.php"><i class="fa fa-reply fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>
    <div class="recibo">
      <table class="recibo">
        <tr>
          <td>
            <div class="head">
              <img class="logoRecibo" src="imagenes/g&g.jpg" alt="G&G Inmobiliaria">
              <h2>Detalle Inmueble</h2>
            </div>
            <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="contorno">
              <div class="nrecibo">
                <h2>Inmueble ID # <span class="enfasis"><?php echo $inmueble['id']; ?></span></h2>
              </div>
            </div>

            <div class="contenido">
              <img class="imagenReciboFondo"src="imagenes/g&g22.png" alt="G&G Inmobiliaria">
              <div class="topLeft">
                <p>Tipo inmueble: <span class="enfasis"><?php echo $inmueble['tipo'];?></span>, con la matricula: <span class="enfasis"><?php echo $inmueble['matricula'];?></span></p>
                <p>Propietario: <span class="enfasis"><?php echo $inmueble['pnombre'].' '.$inmueble['snombre'].' '.$inmueble['papellido'].' '.$inmueble['sapellido'];?></span></p>
                <p>Dirección del inmueble: <span class="enfasis"><?php echo $inmueble['direccion'];?></span> , en la ciudad de: <span class="enfasis"><?php echo $inmueble['ciudad'];?></span></p>
                <p>Valor del inmueble: <span class="enfasis"><?php echo '$ '.$inmueble['valor'];?></span></p>
                <p>Descripción del inmueble: <span class="enfasis"><?php echo $inmueble['descripcion'];?></span></p>
              </div>
            </div>
            <div class="firma">
              <h4>Creado por: <?php echo $inmueble['upnombre'].' '.$inmueble['usnombre'].' '.$inmueble['upapellido'].' '.$inmueble['usapellido']; ?></h4>
              <label for="idusuario"></label>
            </div>
          </form>
        </td>
      </tr>
    </table>
   </div>
 </div>

<?php require 'vista/footer.php' ?>
