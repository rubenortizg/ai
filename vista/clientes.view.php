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
          <li><a href="nuevoCliente.php"><i class="fa fa-plus-circle fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>

    <div class="clientes">
      <p>Clientes registrados</p>
      <br>
      <table>
        <tr>
          <th>Identificacion</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Direccion</th>
          <th>Telefono Fijo</th>
          <th>Celular</th>
          <th>Ciudad</th>
        </tr>
      <?php foreach ($clientes as $cliente): ?>
  <tr>
          <td> <a href="cliente.php?id=<?php echo $cliente['identificacion']; ?>"><?php echo $cliente['identificacion']; ?></a></td>
          <td> <?php echo $cliente['pnombre'].' '.$cliente['snombre']; ?></td>
          <td> <?php echo $cliente['papellido'].' '.$cliente['sapellido']; ?></td>
          <td> <?php echo $cliente['direccion']; ?></td>
          <td> <?php echo $cliente['telfijo']; ?></td>
          <td> <?php echo $cliente['celular']; ?></td>
          <td> <?php echo $cliente['ciudad']; ?></td>
        </tr>
      <?php endforeach; ?>
  </table>
  <br>
    </div>
  </div>

<?php require 'paginacion.php' ?>
<?php require 'vista/footer.php' ?>
