<?php require 'header.php'; ?>

<div class="container recibos">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
      <div class="row no-gutters">
        <div class="col-10">
          <img class="img-fluid float-left" width=90px src="imagenes/logo.png" alt="Logo Inmobiliaria">
          <h4 class="text-center mt-3">Recibo de Ingreso</h4>
        </div>
        <div class="col-2">
          <nav class="float-right nuevo">
            <ul>
              <li><a href="ingresos.php"><i class="fa fa-reply fa-lg"></i></a></li>
              <li><a href="generaIngresoPdf.php?id=<?php echo $ingreso['ningreso']; ?>" target="_blank"><i class="fa fa-file-pdf-o fa-lg"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>

      <div class="row justify-content-center my-1">
        <div class="col-12 col-md-6">
          <h6>Ingreso No. <span class="enfasis"><?php echo $ingreso['ningreso']; ?></span></h6>
        </div>
        <div class="col-12 col-md-6 text-right">
          <h6>Valor: <span class="enfasis">$ <?php echo $ingreso['valorpago']; ?></span></h6>
        </div>
      </div>


      <div class="row justify-content-center my-1">
        <div class="col-12 col-md-6">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>En la ciudad de</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $ingreso['ciudad'];?></small></div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>El día</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo fecha($ingreso['fecha']);?></small></div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center my-1">
        <div class="col-12">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Recibimos de</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $ingreso['pnombre'].' '.$ingreso['snombre'].' '.$ingreso['papellido'].' '.$ingreso['sapellido'];?></small></div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center my-1">
        <div class="col-12">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>La suma de</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $valorLetras;?></small></div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center my-1">
        <div class="col-12 col-md-6">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Por concepto de</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $ingreso['concepto'];?></small></div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>del inmueble tipo</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $ingreso['tipo'];?></small></div>
          </div>
        </div>
      </div>

      <div class="row my-1">
        <div class="col-12">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Ubicado en la</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $ingreso['direccion'];?></small></div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center my-1">
        <div class="col-12 col-md-6">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Correspondiente al periodo del</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo fecha($ingreso['iperiodo']);?></small></div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>al</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo fecha($ingreso['fperiodo']);?></small></div>
          </div>
        </div>
      </div>

      <div class="form-group row mb-0">
        <div class="col-12">
          <div class="row">
            <div class="col-12 text-right d-flex justify-content-center my-0">
              <h5><small><?php echo $ingreso['upnombre'].' '.$ingreso['usnombre'].' '.$ingreso['upapellido'].' '.$ingreso['usapellido']; ?></small></h5>
            </div>
            <div class="col-12 text-right d-flex justify-content-center my-0">
              <label for="idusuario"><h6><small>Firma autorizada y Sello</small></h6></label>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require 'vista/footer.php' ?>
