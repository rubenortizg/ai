<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="clientes">
      <p>Ultimo cliente registrado</p>
      <br>
      <?php if(!$clientes) {echo "No se han creado clientes";} else {
        echo '<table class="table table-bordered table-hover table-sm table-responsive">
          <thead class="bg-primary text-white">
            <th>Identificacion</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Fijo</th>
            <th>Celular</th>
            <th>Ciudad</th>
          </thead>';
      }?>


        <?php if($clientes) {
          echo '<tr>';
          echo '<td> <a href="cliente.php?id='.$clientes['identificacion'].'">'.$clientes['identificacion'].'</a></td>';
          echo '<td>'.$clientes['pnombre'].' '.$clientes['snombre'].'</td>';
          echo '<td>'.$clientes['papellido'].' '.$clientes['sapellido'].'</td>';
          echo '<td>'.$clientes['direccion'].'</td>';
          echo '<td>'.$clientes['telfijo'].'</td>';
          echo '<td>'.$clientes['celular'].'</td>';
          echo '<td>'.$clientes['ciudad'].'</td>';
          echo '</tr>';
        } ?>

  </table>
    </div>

    <div class="inmuebles">
      <p>Ultimo inmueble registrado</p>
      <br>
      <?php if(!$inmuebles) {echo "No se han creado inmuebles";} else {
       echo '<table class="table table-bordered table-hover table-sm table-responsive">
        <thead class="bg-primary text-white">
          <th>Matricula</th>
          <th>Tipo</th>
          <th>Direccion</th>
          <th>Ciudad</th>
          <th>Propietario</th>
          <th>Valor Comercial</th>
        </thead>';
      }?>

        <?php if($inmuebles) {
          echo '<tr>';
          echo '<td> <a href="inmueble.php?id='.$inmuebles['id'].'">'.$inmuebles['matricula'].'</a></td>';
          echo '<td>'.$inmuebles['tipo'].'</td>';
          echo '<td>'.$inmuebles['direccion'].'</td>';
          echo '<td>'.$inmuebles['ciudad'].'</td>';
          echo '<td>'.$inmuebles['pnombre'].' '.$inmuebles['snombre'].' '.$inmuebles['papellido'].' '.$inmuebles['sapellido'].'</td>';
          echo '<td>'.$inmuebles['valor'].'</td>';
          echo '</tr>';
        } ?>


 </table>
    </div>
    <div class="recibos">
      <p>Ultimo comprobante de pago generado</p>
      <br>

      <?php if(!$recibos) {echo "No se han creado recibos";} else {
        echo '<table class="table table-bordered table-hover table-sm table-responsive">
          <thead class="bg-primary text-white">
            <th># Recibo</th>
            <th>Arrendatario</th>
            <th>Concepto</th>
            <th>Inmueble</th>
            <th>Valor</th>
            <th>Fecha de Registro</th>
          </thead>';
      }?>


        <?php if($recibos) {
          echo '<tr>';
          echo '<td> <a href="recibo.php?id='.$recibos['nrecibo'].'">'.$recibos['nrecibo'].'</a></td>';
          echo '<td>'.$recibos['pnombre'].' '.$recibos['snombre'].' '.$recibos['papellido'].' '.$recibos['sapellido'].'</td>';
          echo '<td>'.$recibos['concepto'].'</td>';
          echo '<td>'.$recibos['tipo'].'</td>';
          echo '<td> $ '.$recibos['valorpago'].'</td>';
          echo '<td>'.$recibos['fecha'].'</td>';
          echo '</tr>';
        } ?>

  </table>
    </div>

  </div>

<?php require 'vista/footer.php' ?>
