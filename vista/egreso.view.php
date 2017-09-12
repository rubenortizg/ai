<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="derecha">
      <nav class="nuevo">
        <ul>
          <li><a href="egresos.php"><i class="fa fa-reply fa-lg"></i></a></li>
          <li><a href="generaEgresoPdf.php?id=<?php echo $egreso['nrecibo']; ?>" target="_blank"><i class="fa fa-file-pdf-o fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>

    <div class="recibo">
      <table class="recibo">
        <tr>
          <td>

            <div class="head">
              <img class="logoRecibo" src="imagenes/g&g.jpg" alt="G&G Inmobiliaria">
              <h2>Comprobante de Egreso</h2>

            </div>

            <div class="contorno">

              <div class="nrecibo">
                <h2>Egreso # <span class="enfasis"><?php echo $egreso['nrecibo']; ?></span></h2>
              </div>
              <div class="valor">
                <h2>Valor: $ <span class="enfasis"><?php echo 0.9*$egreso['valorpago']; ?></span></h2>
              </div>

            </div>

            <div class="contenido">
              <img class="imagenReciboFondo"src="imagenes/g&g22.png" alt="G&G Inmobiliaria">
              <div class="topLeft">
                <p>En la ciudad de <span class="enfasis"><?php echo $egreso['ciudad'];?></span>, el día <span class="enfasis"><?php echo fecha($egreso['fecha']);?></span></p>
                <p>Pagado a <span class="enfasis"><?php echo $egreso['pnombre'].' '.$egreso['snombre'].' '.$egreso['papellido'].' '.$egreso['sapellido'];?></span></p>
                <p>La suma de <span class="enfasis"><?php echo $valorLetras;?></span></p>
                <p>Por concepto de <?php echo $egreso['concepto'];?> del inmueble tipo <span class="enfasis"><?php echo $egreso['tipo'];?></span> </p>
                <p>Ubicado en la <span class="enfasis"><?php echo $egreso['direccion'];?></span></p>
                <p>Correspondiente al periodo del <span class="enfasis"><?php echo fecha($egreso['iperiodo']);?></span> al <span class="enfasis"><?php echo fecha($egreso['fperiodo']);?></span></p>
              </div>
            </div>
            <div class="firma">
              <h2><?php echo $egreso['upnombre'].' '.$egreso['usnombre'].' '.$egreso['upapellido'].' '.$egreso['usapellido']; ?></h2>
              <p>Firma autorizada y Sello</p>
            </div>

        </td>
      </tr>
    </table>
   </div>
 </div>

<?php require 'vista/footer.php' ?>
