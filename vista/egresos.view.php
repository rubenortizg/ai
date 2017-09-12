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
        </ul>
      </nav>
    </div>

    <div class="recibos">
      <p>Recibos de Egreso</p>
      <br>
      <table>
        <tr>
          <th>Egreso #</th>
          <th>Pagado a</th>
          <th>Concepto</th>
          <th>Valor</th>
          <th>Fecha de Egreso</th>
        </tr>
        <?php foreach ($egresos as $egreso): ?>
        <tr>
          <td><a href="egreso.php?id=<?php echo $egreso['nrecibo']; ?>"><?php echo $egreso['nrecibo']; ?></a></td>
          <td> <?php echo $egreso['pnombre'].' '.$egreso['snombre'].' '.$egreso['papellido'].' '.$egreso['sapellido']; ?></td>
          <td> <?php echo $egreso['concepto']; ?></td>
          <td> <?php $valorEgreso = 0.9*$egreso['valorpago']; echo '$ '.$valorEgreso; ?></td>
          <td> <?php echo fecha($egreso['fecha']) ; ?></td>
        </tr>
        <?php endforeach; ?></table>
        <br>
    </div>

  </div>

<?php require 'paginacion.php' ?>
<?php require 'vista/footer.php' ?>
