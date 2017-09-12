<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="clientes">
      <p>Ultimo cliente registrado</p>
      <br>
      <table>
        <tr>
          <th>Identificacion</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Direccion</th>
          <th>Fijo</th>
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
    </div>

    <div class="inmuebles">
      <p>Ultimo inmueble registrado</p>
      <br>
      <table>
        <tr>
          <th>Matricula</th>
          <th>Tipo</th>
          <th>Direccion</th>
          <th>Ciudad</th>
          <th>Propietario</th>
          <th>Valor Comercial</th>
        </tr>
      <?php foreach ($inmuebles as $inmueble): ?>
  <tr>
          <td> <a href="inmueble.php?id=<?php echo $inmueble['matricula']; ?>"><?php echo $inmueble['matricula']; ?></a></td>
          <td> <?php echo $inmueble['tipo']; ?></td>
          <td> <?php echo $inmueble['direccion']; ?></td>
          <td> <?php echo $inmueble['ciudad']; ?></td>
          <td> <?php echo $inmueble['pnombre'].' '.$inmueble['snombre'].' '.$inmueble['papellido'].' '.$inmueble['sapellido']; ?></td>
          <td> <?php echo '$ '.$inmueble['valor']; ?></td>
        </tr>
      <?php endforeach; ?>
 </table>
    </div>
    <div class="recibos">
      <p>Ultimo comprobante de pago generado</p>
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
          <td> <?php echo fecha($recibo['fecha']); ?></td>
        </tr>
      <?php endforeach; ?>

  </table>
    </div>

  </div>

<?php require 'vista/footer.php' ?>
