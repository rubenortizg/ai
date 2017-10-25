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
          <li><a href="nuevoInmueble.php"><i class="fa fa-plus-circle fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>

    <div class="inmuebles">
      <p>Inmuebles registrados</p>
      <br>
      <table class="table table-bordered table-hover table-sm table-responsive">
        <thead class="bg-primary text-white">
          <th>Matricula</th>
          <th>Tipo</th>
          <th>Dirección</th>
          <th>Ciudad</th>
          <th>Propietario</th>
          <th>Valor Comercial</th>
        </thead>
      <?php foreach ($inmuebles as $inmueble): ?>
  <tr>
          <td> <a href="inmueble.php?id=<?php echo $inmueble['id']; ?>"><?php echo $inmueble['matricula']; ?></a></td>
          <td> <?php echo $inmueble['tipo']; ?></td>
          <td> <?php echo $inmueble['direccion']; ?></td>
          <td> <?php echo $inmueble['ciudad']; ?></td>
          <td> <?php echo $inmueble['pnombre'].' '.$inmueble['snombre'].' '.$inmueble['papellido'].' '.$inmueble['sapellido']; ?></td>
          <td> <?php echo '$ '.$inmueble['valor']; ?></td>
        </tr>
      <?php endforeach; ?>
</table>
    <br>
    </div>
  </div>

<?php require 'paginacion.php' ?>
<?php require 'vista/footer.php' ?>
