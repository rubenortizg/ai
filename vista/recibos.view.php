<?php require 'header.php'; ?>

  <div class="contenedor">

    <?php
      if (isset($titulo)) {
      echo '<div class="buscar">';
      echo "<p> " . $titulo . " </p>";
      echo "</div><br>";
      }
    ?>

    <div class="derecha">
      <nav class="nuevo">
        <ul>
          <li><a href="administrar.php"><i class="fa fa-reply fa-lg"></i></a></li>
          <li><a href="nuevoRecibo.php"><i class="fa fa-plus-circle fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>

    <div class="recibos">
      <p>Comprobantes de Pago </p>
      <br>
      <table>
        <tr>
          <th># Recibo</th>
          <th>Arrendatario</th>
          <th>Concepto</th>
          <th>Inmueble</th>
          <th>Valor</th>
          <th>Fecha de Registro</th>
        </tr>
        <?php foreach ($recibos as $recibo): ?>
        <tr>
          <td><a href="recibo.php?id=<?php echo $recibo['nrecibo']; ?>"><?php echo $recibo['nrecibo']; ?></a></td>
          <td> <?php echo $recibo['pnombre'].' '.$recibo['snombre'].' '.$recibo['papellido'].' '.$recibo['sapellido']; ?></td>
          <td> <?php echo $recibo['concepto']; ?></td>
          <td> <?php echo $recibo['tipo']; ?></td>
          <td> <?php echo '$ '.$recibo['valorpago']; ?></td>
          <td> <?php echo fecha($recibo['fecha']) ; ?></td>
        </tr>
        <?php endforeach; ?></table>
        <br>
    </div>

  </div>

<?php require 'paginacion.php' ?>
<?php require 'vista/footer.php' ?>
