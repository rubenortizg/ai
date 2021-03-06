<?php require 'header.php'; ?>

  <div class="container inmuebles">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="row no-gutters">
            <div class="col-10">
              <img class="img-fluid float-left" width=90px src="imagenes/logo.png" alt="Logo Inmobiliaria">
              <h4 class="text-center mt-3">Editar Inmueble</h4>
            </div>
            <div class="col-2">
              <nav class="float-right nuevo">
                <ul>
                  <li><a href="inmueble.php?id=<?php if(isset($inmueble['id'])) { echo $inmueble['id']; } elseif (!$enviado && isset($id)) { echo $id;} ?>"><i class="fa fa-reply fa-lg"></i></a></li>
                </ul>
              </nav>
            </div>
          </div>

          <?php if (!empty($errores)): ?>

            <div class="row">
              <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" id="alerta">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?php echo $errores; ?>
                </div>
              </div>
            </div>

          <?php endif ?>

          <div class="form-group mb-0">
            <h6>Inmueble ID No. <span class="enfasis"><?php if(isset($inmueble['id'])) { echo $inmueble['id']; } elseif (!$enviado && isset($id)) { echo $id;} ?></span></h6>
            <input type="hidden" name="idinmueble" value="<?php if(isset($inmueble['id'])) { echo $inmueble['id']; } elseif (!$enviado && isset($id)) { echo $id;} ?>">
          </div>

          <div class="form-group row my-0">
            <div class="col-12 col-md-6">
              <label for="tipo"><small>Tipo de Inmueble</small></label>
              <select class="form-control form-control-sm" name="tipo" id="tipo">
                <?php if(!$enviado && isset($tipo)) {echo '<option value="'.$tipo.'">'.$tipo.'</option>';}
                else {echo '<option value="'.$inmueble['tipo'].'">'.$inmueble['tipo'].'</option>';}
                ?>
                <option value="Apartamento">Apartamento </option>
                <option value="Casa">Casa </option>
                <option value="Local">Local</option>
                <option value="Bodega">Bodega</option>
                <option value="Lote">Lote</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label for="matricula"><small>No. Matricula</small></label>
              <input class="form-control form-control-sm" type="text" id="matricula" name="matricula" value="<?php if(isset($inmueble['matricula'])) { echo $inmueble['matricula']; } elseif (!$enviado && isset($matricula)) { echo $matricula;} ?>"/>
              <input type="hidden" name="matricula_ori" value="<?php if(isset($inmueble['matricula'])) { echo $inmueble['matricula']; } elseif (!$enviado && isset($matricula_ori)) { echo $matricula_ori;} ?>">
            </div>
          </div>

          <div class="form-group row my-0">
            <div class="col-12 col-sm-12">
              <label for="idpropietario"><small>Propietario</small></label>
              <select class="form-control form-control-sm" name="idprr" id="idprr">
                <?php if(!$enviado && isset($idpropietario)) {echo '<option value="'.$idpropietario.'">'.$cliente.' </option>';}
                else {echo '<option value="'.$inmueble['idpropietario'].'">'.$inmueble['pnombre'].' '.$inmueble['snombre'].' '.$inmueble['papellido'].' '.$inmueble['sapellido'].'</option>';}
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row my-0">
            <div class="col-12 col-md-8">
              <label for="direccion"><small>Direccion</small></label>
              <input class="form-control form-control-sm" type="text" id="direccion" name="direccion" value="<?php if(isset($inmueble['direccion'])) { echo $inmueble['direccion']; } elseif (!$enviado && isset($direccion)) { echo $direccion;} ?>" />
            </div>
            <div class="col-12 col-md-4">
              <label for="ciudad"><small>Ciudad</small></label>
              <input class="form-control form-control-sm" type="text" id="ciudad" name="ciudad" value="<?php if(isset($inmueble['ciudad'])) { echo $inmueble['ciudad']; } elseif (!$enviado && isset($ciudad)) { echo $ciudad;} ?>"/>
              <label for="valor"><small>Valor</small></label>
              <input class="form-control form-control-sm" type="text" id="valor" name="valor" value="<?php
                if(isset($inmueble['valor'])) { echo $inmueble['valor']; }
                elseif(!$enviado && isset($valor)  && ($valor == '0')) {echo '';}
                elseif(!$enviado && isset($valor)) { echo $valor;}
              ?>"/>
            </div>
          </div>

          <div class="form-group row my-0">
            <div class="col-12 col-md-8">
              <label for="descripcion"><small>Descripción del inmueble</small></label>
              <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" /><?php if(isset($inmueble['descripcion'])) { echo $inmueble['descripcion']; } elseif (!$enviado && isset($descripcion)) { echo $descripcion;} ?></textarea>
            </div>
            <div class="col-12 col-md-4 d-flex align-items-end">
              <button class=" form-control btn btn-primary" type="submit">Modificar Inmueble</button>
            </div>
          </div>


          <div class="row justify-content-center">
            <p><small>Usuario : <?php echo $usuario['upnombre'].' '.$usuario['usnombre'].' '.$usuario['upapellido'].' '.$usuario['usapellido']; ?></small></p>
            <label for="idusuario"></label>
          </div>




        </form>
      </div>
    </div>
  </div>

 <script>

 $(document).ready(function() {
     $('#tipo').select2({
       placeholder: "Seleccione un tipo de inmueble",
       allowClear: true
    });
 });


 $(document).ready(function() {
     $('#idprr').select2({
       placeholder: "Seleccione un cliente",
       ajax: {
          url: 'valorClientes.php',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        },
       allowClear: true
     });
 });

 </script>

<?php require 'vista/footer.php' ?>
