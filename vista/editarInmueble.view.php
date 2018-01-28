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
                  <li><a href="inmueble.php?id=<?php echo $inmueble['id'];?>"><i class="fa fa-reply fa-lg"></i></a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="form-group mb-0">
            <h6>Inmueble ID No. <span class="enfasis"><?php echo $inmueble['id']; ?></span></h6>
            <input type="hidden" name="idinmueble" value="<?php echo $inmueble['id']; ?>">
          </div>

          <div class="form-group row my-0">
            <div class="col-12 col-md-6">
              <label for="tipo"><small>Tipo de Inmueble</small></label>
              <select class="form-control form-control-sm" name="tipo" id="tipo">
                <option value="<?php echo $inmueble['tipo']?>"><?php echo $inmueble['tipo']; ?></option>
                <option value="Apartamento">Apartamento </option>
                <option value="Casa">Casa </option>
                <option value="Local">Local</option>
                <option value="Bodega">Bodega</option>
                <option value="Lote">Lote</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label for="matricula"><small>No. Matricula</small></label>
              <input class="form-control form-control-sm" type="text" id="matricula" name="matricula" value="<?php echo $inmueble['matricula']; ?>"/>
              <input type="hidden" name="idmatricula" id="idmatricula">
            </div>
          </div>

          <div class="form-group row my-0">
            <div class="col-12 col-sm-12">
              <label for="idpropietario"><small>Propietario</small></label>
              <select class="form-control form-control-sm" name="idprr" id="idprr">
                 <option value="<?php echo $inmueble['idpropietario']?>"><?php echo $inmueble['pnombre'].' '.$inmueble['snombre'].' '.$inmueble['papellido'].' '.$inmueble['sapellido']; ?></option>
              </select>
            </div>
          </div>

          <div class="form-group row my-0">
            <div class="col-12 col-md-8">
              <label for="direccion"><small>Direccion</small></label>
              <input class="form-control form-control-sm" type="text" id="direccion" name="direccion" value="<?php echo $inmueble['direccion']; ?>" />
            </div>
            <div class="col-12 col-md-4">
              <label for="ciudad"><small>Ciudad</small></label>
              <input class="form-control form-control-sm" type="text" id="ciudad" name="ciudad" value="<?php echo $inmueble['ciudad']; ?>"/>
              <label for="valor"><small>Valor</small></label>
              <input class="form-control form-control-sm" type="text" id="valor" name="valor" value="<?php echo $inmueble['valor']; ?>"/>
            </div>
          </div>

          <div class="form-group row my-0">
            <div class="col-12 col-md-8">
              <label for="descripcion"><small>Descripción del inmueble</small></label>
              <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" /><?php echo $inmueble['descripcion']; ?></textarea>
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
