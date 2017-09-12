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
      <p>Recibos de Ingreso</p>
      <br>
      <table>
        <tr>
          <th>Ingreso #</th>
          <th>Recibido de</th>
          <th>Concepto</th>
          <th>Valor</th>
          <th>Fecha de Ingreso</th>
        </tr>
        <?php foreach ($ingresos as $ingreso): ?>
        <tr>
          <td><a href="ingreso.php?id=<?php echo $ingreso['nrecibo']; ?>"><?php echo $ingreso['nrecibo']; ?></a></td>
          <td> <?php echo $ingreso['pnombre'].' '.$ingreso['snombre'].' '.$ingreso['papellido'].' '.$ingreso['sapellido']; ?></td>
          <td> <?php echo $ingreso['concepto']; ?></td>
          <td> <?php echo '$ '.$ingreso['valorpago']; ?></td>
          <td> <?php echo fecha($ingreso['fecha']) ; ?></td>
        </tr>
        <?php endforeach; ?></table>
        <br>
    </div>

  </div>

<?php require 'paginacion.php' ?>
<?php require 'vista/footer.php' ?>
