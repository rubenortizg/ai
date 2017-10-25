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

          <div class="form-group row mb-0">
            <div class="col-12 col-md-6">
              <h6 class="">Recibo No. <span class="enfasis"><?php echo $nrecibo; ?></span></h6>
            </div>
            <div class="col-12 col-md-2">
              <label for="valorpago"><small>Valor $</small></label>
            </div>
            <div class="col-12 col-md-4">
              <input class="form-control form-control-sm" type="text" id="valorpago" name="valorpago" value=""/>
            </div>
          </div>


          <div class="form-group row mb-0">
            <div class="col-12 col-md-6">
              <label for="ciudad"><small>En la ciudad de</small></label>
              <input class="form-control form-control-sm" type="text" id="ciudad" name="ciudad" value="Funza" readonly="readonly"/>
            </div>
            <div class="col-12 col-md-6">
              <label for="fecha"><small>Fecha</small></label>
              <input class="form-control form-control-sm" type="text" name="fecha" id="datepicker" readonly="readonly" size="10" />
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12 col-md-11">
              <label for="idarrendatario"><small>Recibi(mos) de</small></label>
              <input class="form-control form-control-sm" type="text" id="idarrendatario" name="idarrendatario" readonly="readonly"/>
              <input type="hidden" name="idarr" id="idarr">
            </div>
            <div class="col-12 col-sm-1 d-flex justify-content-center align-items-end">
              <a class="form-control-sm" id="ClienteBtn" href="#" ><i class="fa fa-users fa-lg"></i></a>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12">
              <label for="valorLetras"><small>La suma de</small></label>
              <input class="form-control form-control-sm"type="text" id="valorLetras" name="valorLetras" readonly="readonly" />
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12 col-md-6">
              <label for="concepto"><small>Por concepto de</small></label>
              <select class="form-control form-control-sm" name="concepto">
                  <option selected value="Arrendamiento">Arrendamiento</option>
                  <option value="Anticipo de S.">Anticipo Servicios</option>
                  <option value="Comision Venta">Comisión Venta</option>
              </select>
            </div>
            <div class="col-12 col-sm-6">
              <label for="tipoinmueble"><small>del inmueble tipo</small></label>
              <input class="form-control form-control-sm" type="text" id="tipoinmueble" name="tipoinmueble" readonly="readonly" />
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12 col-md-11">
              <label for="direccion"><small>Ubicado en la</small></label>
              <input class="form-control form-control-sm" type="text" id="direccion" name="direccion" value="" readonly="readonly"/>
              <input type="hidden" name="iddireccion" id="iddireccion">
            </div>
            <div class="col-12 col-sm-1 d-flex justify-content-center align-items-end">
              <a class="form-control-sm" id="InmuebleBtn" href="#" ><i class="fa fa-building fa-lg"></i></a>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-12 col-md-6">
              <label for="iperiodo"><small>Correspondiente al periodo del</small></label>
              <input class="form-control form-control-sm" type="text" name="iperiodo" id="iperiodo" readonly="readonly" size="10"/>
            </div>
            <div class="col-12 col-md-6">
              <label for="fperiodo"><small>al</small></label>
              <input class="form-control form-control-sm" type="text" name="fperiodo" id="fperiodo" readonly="readonly" size="10" />
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

 <div id="ClienteModal" class="modal">

   <div class="modal-content">
     <div class="modal-header">
       <span class="close">&times;</span>
       <h3>Clientes Registrados</h3>
     </div>
     <div class="modal-body">
       <br>
       <table>
         <tr>
           <th>Id Cliente</th>
           <th>Nombres</th>
           <th>Apellidos</th>
           <th>Fijo</th>
           <th>Celular</th>
           <th>Fecha Creación</th>
         </tr>
       <?php foreach ($clientes as $cliente): ?>
         <tr idcliente="<?php echo $cliente['id'];?>" cliente="<?php echo $cliente['pnombre'].' '.$cliente['snombre'].' '.$cliente['papellido'].' '.$cliente['sapellido'];?>" class="click">
           <td> <?php echo $cliente['id']; ?></td>
           <td> <?php echo $cliente['pnombre'].' '.$cliente['snombre']; ?></td>
           <td> <?php echo $cliente['papellido'].' '.$cliente['sapellido']; ?></td>
           <td> <?php echo $cliente['telfijo']; ?></td>
           <td> <?php echo $cliente['celular']; ?></td>
           <td> <?php echo $cliente['ciudad']; ?></td>
         </tr>
       <?php endforeach; ?>
     </table>
     <br/>

     <?php require 'paginacionModal.php' ?>


     </div>
     <div class="modal-footer">
       <h5>Seleccione el cliente </h5>
     </div>
   </div>

 </div>


<div id="InmuebleModal" class="modal">

   <div class="modal-content">
     <div class="modal-header">
       <span class="closeInmueble">&times;</span>
       <h3>Clientes Registrados</h3>
     </div>
     <div class="modal-body">
       <br>
       <table>
         <tr>
           <th>Id Inmueble</th>
           <th>Tipo</th>
           <th>Direccion</th>
           <th>Ciudad</th>
         </tr>
       <?php foreach ($inmuebles as $inmueble): ?>
         <tr tipo="<?php echo $inmueble['tipo'];?>" idinmueble="<?php echo $inmueble['id'];?>" direccion="<?php echo $inmueble['direccion'];?>" class="clickInmueble">
           <td> <?php echo $inmueble['id']; ?></td>
           <td> <?php echo $inmueble['tipo']; ?></td>
           <td> <?php echo $inmueble['direccion']; ?></td>
           <td> <?php echo $inmueble['ciudad']; ?></td>
         </tr>
       <?php endforeach; ?>
     </table>
     <br/>

     <?php require 'paginacionModal.php' ?>


     </div>
     <div class="modal-footer">
       <h5>Seleccione el cliente </h5>
     </div>
   </div>

</div>





 <script>
 // Get the modal
 var modal = document.getElementById('ClienteModal');
 var inmuebleModal = document.getElementById('InmuebleModal');

 // Get the button that opens the modal
 var btn = document.getElementById("ClienteBtn");
 var inmuebleBtn = document.getElementById("InmuebleBtn");

 // Get the <span> element that closes the modal
 var span = document.getElementsByClassName("close")[0];
 var spanInmueble = document.getElementsByClassName("closeInmueble")[0];

 // When the user clicks the button, open the modal
 btn.onclick = function() {
     modal.style.display = "block";
 }

 inmuebleBtn.onclick = function() {
     inmuebleModal.style.display = "block";
 }

 // When the user clicks on <span> (x), close the modal
 span.onclick = function() {
     modal.style.display = "none";
 }

 spanInmueble.onclick = function() {
     inmuebleModal.style.display = "none";
 }

 // When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
     }

     if (event.target == inmuebleModal) {
         inmuebleModal.style.display = "none";
     }

 }

$(function(){

      $(".click").click(function(e) {
          e.preventDefault();
          var cliente = $(this).attr("cliente");
          var idcliente = $(this).attr("idcliente");
          document.getElementById("idarrendatario").value = cliente;
          document.getElementById("idarr").value = idcliente;
          modal.style.display = "none";
      });

      $(".clickInmueble").click(function(e) {
          e.preventDefault();
          var direccion = $(this).attr("direccion");
          var idinmueble = $(this).attr("idinmueble");
          var tipo = $(this).attr("tipo");
          document.getElementById("direccion").value = direccion;
          document.getElementById("iddireccion").value = idinmueble;
          document.getElementById("tipoinmueble").value = tipo;
          inmuebleModal.style.display = "none";
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
