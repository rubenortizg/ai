<?php require 'header.php'; ?>

  <div class="container clientes">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="row no-gutters">
          <div class="col-10">
            <img class="img-fluid float-left" width=90px src="imagenes/logo.png" alt="Logo Inmobiliaria">
            <h4 class="text-center mt-3">Detalle Cliente</h4>
          </div>
          <div class="col-2">
            <nav class="float-right nuevo">
              <ul>
                <li><a href="clientes.php"><i class="fa fa-reply fa-lg"></i></a></li>
              </ul>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <h6>Cliente ID No. <span class="enfasis"><?php echo $cliente['id']; ?></span></h6>
          </div>
          <div class="col-4 d-flex justify-content-end">
            <ul class="my-0">
              <li class="d-inline-flex"><a href="editarCliente.php?id=<?php echo $cliente['identificacion']; ?>" ><i class="fa fa-pencil-square-o fa-lg" style="color: #2980b9;"></i></a></li>
              <li class="d-inline-flex"><a href="#borrar" aria-expanded="false" aria-controls="borrar" data-toggle="collapse"><i class="fa fa-trash-o fa-lg" style="color: #2980b9;"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="collapse" id="borrar">
              <div class="card card-body">
                <div class="card-text">
                  <h6><strong>Eliminar Cliente</strong></h6>
                  <p><small>Desea eliminar el cliente <?php echo $cliente['pnombre'].' '.$cliente['snombre'].' '.$cliente['papellido'].' '.$cliente['sapellido'];?>.</small></p>
                  <a href="borrarCliente.php?id=<?php echo $cliente['id']; ?>" class="btn btn-primary btn-sm">Eliminar</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center my-1">
          <div class="col-12 col-md-6">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Tipo de documento</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['tipoid'];?></small></div>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Numero</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['identificacion'];?></small></div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center my-1">
          <div class="col-12">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Nombre</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['pnombre'].' '.$cliente['snombre'].' '.$cliente['papellido'].' '.$cliente['sapellido'];?></small></div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center my-1">
          <div class="col-12 col-md-8">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Dirección</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['direccion'];?></small></div>
            </div>
          </div>

          <div class="col-12 col-md-4">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Ciudad</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['ciudad'];?></small></div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center my-1">
          <div class="col-12 col-md-6">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Tel. Fijo</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['telfijo'];?></small></div>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Celular</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['celular'];?></small></div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center my-1">
          <div class="col-12 col-md-4">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Banco</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['banco'];?></small></div>
            </div>
          </div>

          <div class="col-12 col-md-4">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Tipo de cuenta</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['tcuenta'];?></small></div>
            </div>
          </div>

          <div class="col-12 col-md-4">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Numero de cuenta</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['ncuenta'];?></small></div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center my-1">
          <div class="col-12">
            <div class="card border-secondary">
              <div class="card-header mx-1 p-0"><small>Notas</small></div>
              <div class="card-text mx-1 py-1"><small><?php echo $cliente['notas'];?></small></div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
            <p><small>Creado por: <?php echo $cliente['upnombre'].' '.$cliente['usnombre'].' '.$cliente['upapellido'].' '.$cliente['usapellido']; ?></small></p>
            <label for="idusuario"></label>
        </div>

      </div>
    </div>
  </div>

<?php require 'vista/footer.php' ?>
