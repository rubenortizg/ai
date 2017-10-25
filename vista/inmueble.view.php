<?php require 'header.php'; ?>

<div class="container clientes">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
      <div class="row no-gutters">
        <div class="col-10">
          <img class="img-fluid float-left" width=90px src="imagenes/logo.png" alt="Logo Inmobiliaria">
          <h4 class="text-center mt-3">Detalle Inmueble</h4>
        </div>
        <div class="col-2">
          <nav class="float-right nuevo">
            <ul>
              <li><a href="inmuebles.php"><i class="fa fa-reply fa-lg"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-8">
          <h6>Inmueble ID No. <span class="enfasis"><?php echo $inmueble['id']; ?></span></h6>
        </div>
        <div class="col-4 d-flex justify-content-end">
          <ul class="my-0">
            <li class="d-inline-flex"><a href="editarInmueble.php?id=<?php echo $inmueble['id']; ?>" ><i class="fa fa-pencil-square-o fa-lg" style="color: #2980b9;"></i></a></li>
            <li class="d-inline-flex"><a href="#borrar" aria-expanded="false" aria-controls="borrar" data-toggle="collapse"><i class="fa fa-trash-o fa-lg" style="color: #2980b9;"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="collapse" id="borrar">
            <div class="card card-body">
              <div class="card-text">
                <h6><strong>Eliminar Inmueble</strong></h6>
                <p><small>Desea eliminar el inmueble .</small></p>
                <a href="borrarInmueble.php?id=<?php echo $inmueble['id'];?>" class="btn btn-primary btn-sm">Eliminar</a>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row justify-content-center my-1">
        <div class="col-12 col-md-6">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Tipo de inmueble</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $inmueble['tipo'];?></small></div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>No. Matricula</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $inmueble['matricula'];?></small></div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center my-1">
        <div class="col-12 col-md-8">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Propietario</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $inmueble['pnombre'].' '.$inmueble['snombre'].' '.$inmueble['papellido'].' '.$inmueble['sapellido'];?></small></div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Valor Inmueble</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $inmueble['valor'];?></small></div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center my-1">
        <div class="col-12 col-md-8">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Dirección del inmueble</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $inmueble['direccion'];?></small></div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Ciudad</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $inmueble['ciudad'];?></small></div>
          </div>
        </div>
      </div>

      <div class="row my-1">
        <div class="col-12">
          <div class="card border-secondary">
            <div class="card-header mx-1 p-0"><small>Descripción del inmueble</small></div>
            <div class="card-text mx-1 py-1"><small><?php echo $inmueble['descripcion'];?></small></div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
          <p><small>Creado por: <?php echo $inmueble['upnombre'].' '.$inmueble['usnombre'].' '.$inmueble['upapellido'].' '.$inmueble['usapellido']; ?></small></p>
          <label for="idusuario"></label>
      </div>

    </div>
  </div>
</div>

<?php require 'vista/footer.php' ?>
