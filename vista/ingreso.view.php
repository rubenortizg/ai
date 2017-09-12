<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="derecha">
      <nav class="nuevo">
        <ul>
          <li><a href="ingresos.php"><i class="fa fa-reply fa-lg"></i></a></li>
          <li><a href="generaIngresoPdf.php?id=<?php echo $ingreso['nrecibo']; ?>" target="_blank"><i class="fa fa-file-pdf-o fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>

    <div class="recibo">
      <table class="recibo">
        <tr>
          <td>

            <div class="head">
              <img class="logoRecibo" src="imagenes/g&g.jpg" alt="G&G Inmobiliaria">
              <h2>Comprobante de Ingreso</h2>

            </div>

            <div class="contorno">

              <div class="nrecibo">
                <h2>Ingreso # <span class="enfasis"><?php echo $ingreso['nrecibo']; ?></span></h2>
              </div>
              <div class="valor">
                <h2>Valor: $ <span class="enfasis"><?php echo $ingreso['valorpago']; ?></span></h2>
              </div>

            </div>

            <div class="contenido">
              <img class="imagenReciboFondo"src="imagenes/g&g22.png" alt="G&G Inmobiliaria">
              <div class="topLeft">
                <p>En la ciudad de <span class="enfasis"><?php echo $ingreso['ciudad'];?></span>, el día <span class="enfasis"><?php echo fecha($ingreso['fecha']);?></span></p>
                <p>Recibi(mos) de <span class="enfasis"><?php echo $ingreso['pnombre'].' '.$ingreso['snombre'].' '.$ingreso['papellido'].' '.$ingreso['sapellido'];?></span></p>
                <p>La suma de <span class="enfasis"><?php echo $valorLetras;?></span></p>
                <p>Por concepto de <?php echo $ingreso['concepto'];?> del inmueble tipo <span class="enfasis"><?php echo $ingreso['tipo'];?></span> </p>
                <p>Ubicado en la <span class="enfasis"><?php echo $ingreso['direccion'];?></span></p>
                <p>Correspondiente al periodo del <span class="enfasis"><?php echo fecha($ingreso['iperiodo']);?></span> al <span class="enfasis"><?php echo fecha($ingreso['fperiodo']);?></span></p>
              </div>
            </div>
            <div class="firma">
              <h2><?php echo $ingreso['upnombre'].' '.$ingreso['usnombre'].' '.$ingreso['upapellido'].' '.$ingreso['usapellido']; ?></h2>
              <p>Firma autorizada y Sello</p>
            </div>

        </td>
      </tr>
    </table>
   </div>
 </div>

<?php require 'vista/footer.php' ?>
