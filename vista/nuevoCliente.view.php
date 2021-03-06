<?php require 'header.php'; ?>

    <div class="container clientes">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="row no-gutters">
              <div class="col-10">
                <img class="img-fluid float-left" width=90px src="imagenes/logo.png" alt="Logo Inmobiliaria">
                <h4 class="text-center mt-3">Nuevo Cliente</h4>
              </div>
              <div class="col-2">
                <nav class="float-right nuevo">
                  <ul>
                    <li><a href="clientes.php"><i class="fa fa-reply fa-lg"></i></a></li>
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
              <h6>Cliente ID No. <span class="enfasis"><?php echo $ncliente; ?></span></h6>
              <input type="hidden" name="ncliente" value="<?php echo $ncliente; ?>">
            </div>

            <div class="form-group row my-0">
              <div class="col-12 col-md-6">
                <label for="tipoid"><small>Tipo de documento</small></label>
                <select class="form-control form-control-sm" name="tipoid" id="tipoid">
                  <?php if(!$enviado && isset($tipoid)) {echo '<option value="'.$tipoid.'">'.$tipoid.' </option>';} ?>

                  <option value="Cedula de Ciudadanía">Cedula de Ciudadanía </option>
                  <option value="Cedula de Extranjeria">Cedula de Extranjeria </option>
                  <option value="NIT">NIT</option>
                  <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                  <option value="Registro Civil">Registro Civil</option>
                </select>
              </div>

              <div class="col-12 col-md-6">
                <label for="identificacion"><small>Numero</small></label>
                <input class="form-control form-control-sm" type="text" id="identificacion" name="identificacion" value="<?php
                if(!$enviado && isset($identificacion)  && ($identificacion == '0')) {echo '';}
                elseif (!$enviado && isset($identificacion)) { echo $identificacion;}
                ?>"/>
                <input type="hidden" name="idcliente" id="idcliente">
              </div>
            </div>

            <div class="form-group row  my-0">
              <div class="col-12 col-md-3">
                <label for="pnombre"><small>Primer Nombre</small></label>
                <input class="form-control form-control-sm" type="text" id="pnombre" name="pnombre" value="<?php if(!$enviado && isset($pnombre)) echo $pnombre; ?>"/>
              </div>
              <div class="col-12 col-md-3">
                <label for="snombre"><small>Segundo Nombre</small></label>
                <input class="form-control form-control-sm" type="text" id="snombre" name="snombre" value="<?php if(!$enviado && isset($snombre)) echo $snombre; ?>"/>
              </div>
              <div class="col-12 col-md-3">
                <label for="papellido"><small>Primer Apellido</small></label>
                <input class="form-control form-control-sm" type="text" id="papellido" name="papellido" value="<?php if(!$enviado && isset($papellido)) echo $papellido; ?>"/>
              </div>
              <div class="col-12 col-md-3">
                <label for="sapellido"><small>Segundo apellido</small></label>
                <input class="form-control form-control-sm" type="text" id="sapellido" name="sapellido" value="<?php if(!$enviado && isset($sapellido)) echo $sapellido; ?>"/>
              </div>

            </div>

            <div class="form-group row  my-0">
              <div class="col-12 col-md-5">
                <label for="direccion"><small>Direccion</small></label>
                <input class="form-control form-control-sm" type="text" id="direccion" name="direccion" value="<?php if(!$enviado && isset($direccion)) echo $direccion; ?>"/>
              </div>
              <div class="col-12 col-md-3">
                <label for="ciudad"><small>Ciudad</small></label>
                <input class="form-control form-control-sm" type="text" id="ciudad" name="ciudad" value="<?php if(!$enviado && isset($ciudad)) echo $ciudad; ?>" />
              </div>
              <div class="col-12 col-md-2">
                <label for="telfijo"><small>Fijo</small></label>
                <input class="form-control form-control-sm pd-0" type="text" id="telfijo" name="telfijo" value="<?php if(!$enviado && isset($telfijo)) echo $telfijo; ?>"/>
              </div>
              <div class="col-12 col-md-2">
                <label for="celular"><small>Celular</small></label>
                <input class="form-control form-control-sm my-0" type="text" id="celular" name="celular" value="<?php if(!$enviado && isset($celular)) echo $celular; ?>"/>
              </div>
            </div>

            <div class="form-group row  my-0">
              <div class="col-12 col-md-4">
                <label for="banco"><small>Banco</small></label>
                <select class="form-control form-control-sm" name="banco" id="banco">
                  <?php if(!$enviado && isset($banco)) {echo '<option value="'.$banco.'">'.$banco.' </option>';} ?>
                  <option></option>
                  <option value="Bancolombia">Bancolombia </option>
                  <option value="Davivienda">Davivienda </option>
                  <option value="Av Villas">Av Villas</option>
                  <option value="Banco Popular">Banco Popular</option>
                  <option value="Banco de Bogota">Banco de Bogota</option>
                  <option value="BBVA">BBVA</option>
                  <option value="Banco de Occidente">Banco de Occidente</option>
                  <option value="Banco Agrario">Banco Agrario</option>
                  <option value="Helm Bank">Helm Bank</option>
                  <option value="Banco Caja Social">Banco Caja Social</option>
                  <option value="Banco Sudameris">Banco Sudameris</option>
                  <option value="Banco Falabella">Banco Falabella</option>
                  <option value="Colpatria">Colpatria</option>
                  <option value="Banco Corpbanca">Banco Corpbanca</option>
                  <option value="Citibank">Citibank</option>
                  <option value="Banco Pichincha">Banco Pichincha</option>
                </select>
              </div>
              <div class="col-12 col-md-4">
                <label for="tcuenta"><small>Tipo de Cuenta</small></label>
                <select class="form-control form-control-sm" name="tcuenta" id="tcuenta">
                  <?php if(!$enviado && isset($tcuenta)) {echo '<option value="'.$tcuenta.'">'.$tcuenta.' </option>';} ?>
                  <option></option>
                  <option value="Ahorros">Ahorros</option>
                  <option value="Corriente">Corriente</option>
                </select>
              </div>
              <div class="col-12 col-md-4">
                <label for="ncuenta"><small>No. de Cuenta</small></label>
                <input class="form-control form-control-sm my-0" type="text" id="ncuenta" name="ncuenta" value="<?php if(!$enviado && isset($ncuenta)) echo $ncuenta; ?>"/>
              </div>

            </div>

            <div class="form-group row  my-0">
              <div class="col-12 col-md-8">
                <label for="notas"><small>Notas Adicionales</small></label>
                <textarea class="form-control form-control-sm" id="notas" name="notas" /><?php if(!$enviado && isset($notas)) echo $notas; ?></textarea>
              </div>
              <div class="col-12 col-md-4 d-flex align-items-end">
                <button class=" form-control btn btn-primary" name="submit" type="submit">Crear cliente</button>
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
    $('#tipoid').select2({
      placeholder: "Seleccione un tipo de documento",
      allowClear: true
   });
});

$(document).ready(function() {
    $('#banco').select2({
      placeholder: "Seleccione un banco",
      allowClear: true
   });
});

$(document).ready(function() {
    $('#tcuenta').select2({
      placeholder: "Seleccione un tipo de cuenta",
      allowClear: true
   });
});
</script>

<?php require 'vista/footer.php' ?>
