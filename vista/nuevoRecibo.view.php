<?php require 'header.php'; ?>

  <div class="container recibos">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="row no-gutters">
            <div class="col-10">
              <img class="img-fluid float-left" width=90px src="imagenes/logo.png" alt="Logo Inmobiliaria">
              <h4 class="text-center mt-3">Nuevo Recibo</h4>
            </div>
            <div class="col-2">
              <nav class="float-right nuevo">
                <ul>
                  <li><a href="recibos.php"><i class="fa fa-reply fa-lg"></i></a></li>
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

          <div class="form-group row mb-0">
            <div class="col-12 col-md-6">
              <h6 class="">Recibo No. <span class="enfasis"><?php echo $nrecibo; ?></span></h6>
            </div>
            <div class="col-12 col-md-2">
              <label for="valorpago"><small>Valor $</small></label>
            </div>
            <div class="col-12 col-md-4">
              <input class="form-control form-control-sm" type="text" id="valorpago" name="valorpago" value="<?php if(!$enviado && isset($valorpago)) {echo $valorpago;} ?>"/>
            </div>
          </div>


          <div class="form-group row mb-0">
            <div class="col-12 col-md-6">
              <label for="ciudad"><small>En la ciudad de</small></label>
              <input class="form-control form-control-sm" type="text" id="ciudad" name="ciudad" value="Funza" readonly="readonly"/>
            </div>
            <div class="col-12 col-md-6">
              <label for="fecha"><small>Fecha</small></label>
              <input class="form-control form-control-sm" type="text" name="fecha" id="datepicker" readonly="readonly" size="10" value="<?php if(!$enviado && isset($fecha)) {echo $fecha;} ?>"/>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12 col-md-12">
              <label for="idarrendatario"><small>Recibi(mos) de</small></label>
              <select class="form-control form-control-sm" name="idarrienda" id="idarrienda">
                <?php if(!$enviado && isset($idarrendatario)) {echo '<option value="'.$idarrendatario.'">'.$cliente.' </option>';} ?>
              </select>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12">
              <label for="valorLetras"><small>La suma de</small></label>
              <input class="form-control form-control-sm"type="text" id="valorLetras" name="valorLetras" readonly="readonly" value="<?php if(!$enviado && isset($valorpagoLetras)) {echo $valorpagoLetras;} ?>"/>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12 col-md-6">
              <label for="concepto"><small>Por concepto de</small></label>
              <select class="form-control form-control-sm" name="concepto" id="concepto">
                <?php if(!$enviado && isset($concepto)) {echo '<option value="'.$concepto.'">'.$concepto.' </option>';} ?>
                <option value="Arrendamiento">Arrendamiento</option>
                <option value="Anticipo de S.">Anticipo Servicios</option>
                <option value="Comision Venta">Comisión Venta</option>
              </select>
            </div>
            <div class="col-12 col-sm-6">
              <label for="tipoinmueble"><small>del inmueble tipo</small></label>
              <input class="form-control form-control-sm" type="text" id="tipoinmueble" name="tipoinmueble" readonly="readonly" value="<?php if(!$enviado && isset($tipoinmueble)) {echo $tipoinmueble;} ?>"/>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12 col-md-12">
              <label for="direccion"><small>Ubicado en la</small></label>
              <select class="form-control form-control-sm" name="iddireccion" id="iddireccion">
                <?php if(!$enviado && isset($idinmueble)) {echo '<option value="'.$idinmueble.'">'.$inmueble.' </option>';} ?>
              </select>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12 col-md-6">
              <label for="iperiodo"><small>Correspondiente al periodo del</small></label>
              <input class="form-control form-control-sm" type="text" name="iperiodo" id="iperiodo" readonly="readonly" size="10" value="<?php if(!$enviado && isset($iperiodo)) {echo $iperiodo;} ?>"/>
            </div>
            <div class="col-12 col-md-6">
              <label for="fperiodo"><small>al</small></label>
              <input class="form-control form-control-sm" type="text" name="fperiodo" id="fperiodo" readonly="readonly" size="10" value="<?php if(!$enviado && isset($fperiodo)) {echo $fperiodo;} ?>"/>
            </div>
          </div>


          <div class="form-group row mb-0">
            <div class="col-12 col-md-8">
              <div class="row">
                <div class="col-12 text-right d-flex justify-content-center my-0">
                  <h5><small><?php echo $usuario['upnombre'].' '.$usuario['usnombre'].' '.$usuario['upapellido'].' '.$usuario['usapellido']; ?></small></h5>
                </div>
                <div class="col-12 text-right d-flex justify-content-center my-0">
                  <label for="idusuario"><h6><small>Firma autorizada y Sello</small></h6></label>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4 d-flex align-items-start">
              <button class=" form-control btn btn-primary" type="submit">Crear Recibo</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

 <script>

 $(document).ready(function() {
     $('#idarrienda').select2({
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

 $(document).ready(function() {
     $('#concepto').select2({
       placeholder: "Seleccione un cliente",
       allowClear: true
     });
 });

 $(document).ready(function() {
     $('#iddireccion').select2({
       placeholder: "Seleccione un inmueble",
       ajax: {
          url: 'valorInmuebles.php',
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


$(document).ready(iniciar);
function iniciar(){
  $("#valorpago").focusout(mostrarValor);
}

function mostrarValor(){
  var x = $(this).val();
  $.ajax({
  url: "valorpago.php",
  type: "post",
  data: "valorpago="+x,
  success: function(data){
    $("#valorLetras").val(data);
  }
  });
}

jQuery(function($){
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '&#x3c;Ant',
    nextText: 'Sig&#x3e;',
    currentText: 'Hoy',
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    'Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
    dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
    weekHeader: 'Sm',
    dateFormat: 'yy-mm-dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''};
  $.datepicker.setDefaults($.datepicker.regional['es']);
});
$('#datepicker').datepicker({
    format: 'mm-dd-yyyy'
});
$('#iperiodo').datepicker({
    format: 'mm-dd-yyyy'
});
$('#fperiodo').datepicker({
    format: 'mm-dd-yyyy'
});
</script>


<?php require 'vista/footer.php' ?>
