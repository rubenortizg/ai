<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="derecha">
      <nav class="nuevo">
        <ul>
          <li><a href="clientes.php"><i class="fa fa-reply fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>
    <div class="recibo">
      <table class="recibo">
        <tr>
          <td>
            <div class="head">
              <img class="logoRecibo" src="imagenes/g&g.jpg" alt="G&G Inmobiliaria">
              <h2>Detalle Cliente</h2>
            </div>
            <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="contorno">
              <div class="nrecibo">
                <h2>Cliente ID # <span class="enfasis"><?php echo $cliente['id']; ?></span></h2>
              </div>
            </div>

            <div class="contenido">
              <img class="imagenReciboFondo"src="imagenes/g&g22.png" alt="G&G Inmobiliaria">
              <div class="topLeft">
                <p>Tipo documento: <span class="enfasis"><?php echo $cliente['tipoid'];?></span>, con el numero: <span class="enfasis"><?php echo $cliente['identificacion'];?></span></p>
                <p>Nombre: <span class="enfasis"><?php echo $cliente['pnombre'].' '.$cliente['snombre'].' '.$cliente['papellido'].' '.$cliente['sapellido'];?></span></p>
                <p>Dirección actual: <span class="enfasis"><?php echo $cliente['direccion'];?></span> , en la ciudad de: <span class="enfasis"><?php echo $cliente['ciudad'];?></span></p>
                <p>Telefono fijo: <span class="enfasis"><?php echo $cliente['telfijo'];?></span> , Celular: <span class="enfasis"><?php echo $cliente['celular'];?></span></p>
                <p>Notas: <span class="enfasis"><?php echo $cliente['notas'];?></span></p>
              </div>
            </div>
            <div class="firma">
              <h4>Creado por: <?php echo $cliente['upnombre'].' '.$cliente['usnombre'].' '.$cliente['upapellido'].' '.$cliente['usapellido']; ?></h4>
              <label for="idusuario"></label>
            </div>
          </form>
        </td>
      </tr>
    </table>
   </div>
 </div>

<?php require 'vista/footer.php' ?>
