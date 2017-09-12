<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="derecha">
      <nav class="nuevo">
        <ul>
          <li><a href="recibos.php"><i class="fa fa-reply fa-lg"></i></a></li>
          <li><a href="generaReciboPdf.php?id=<?php echo $recibo['nrecibo']; ?>" target="_blank"><i class="fa fa-file-pdf-o fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>



    <div class="recibo">
      <table class="recibo">
        <tr>
          <td>

            <div class="head">
              <img class="logoRecibo" src="imagenes/g&g.jpg" alt="G&G Inmobiliaria">
              <h2>Comprobante de Pago</h2>

            </div>

            <div class="contorno">

              <div class="nrecibo">
                <h2>Recibo # <span class="enfasis"><?php echo $recibo['nrecibo']; ?></span></h2>
              </div>
              <div class="valor">
                <h2>Valor: $ <span class="enfasis"><?php echo $recibo['valorpago']; ?></span></h2>
              </div>

            </div>

            <div class="contenido">
              <img class="imagenReciboFondo"src="imagenes/g&g22.png" alt="G&G Inmobiliaria">
              <div class="topLeft">
                <p>En la ciudad de <span class="enfasis"><?php echo $recibo['ciudad'];?></span>, el día <span class="enfasis"><?php echo fecha($recibo['fecha']);?></span></p>
                <p>Recibi(mos) de <span class="enfasis"><?php echo $recibo['pnombre'].' '.$recibo['snombre'].' '.$recibo['papellido'].' '.$recibo['sapellido'];?></span></p>
                <p>La suma de <span class="enfasis"><?php echo $valorLetras;?></span></p>
                <p>Por concepto de <?php echo $recibo['concepto'];?> del inmueble tipo <span class="enfasis"><?php echo $recibo['tipo'];?></span> </p>
                <p>Ubicado en la <span class="enfasis"><?php echo $recibo['direccion'];?></span></p>
                <p>Correspondiente al periodo del <span class="enfasis"><?php echo fecha($recibo['iperiodo']);?></span> al <span class="enfasis"><?php echo fecha($recibo['fperiodo']);?></span></p>
              </div>
            </div>
            <div class="firma">
              <h2><?php echo $recibo['upnombre'].' '.$recibo['usnombre'].' '.$recibo['upapellido'].' '.$recibo['usapellido']; ?></h2>
              <p>Firma autorizada y Sello</p>
            </div>

        </td>
      </tr>
    </table>
   </div>
 </div>

<?php require 'vista/footer.php' ?>
