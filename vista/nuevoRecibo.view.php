<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="derecha">
      <nav class="nuevo">
        <ul>
          <li><a href="recibos.php"><i class="fa fa-reply fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>
    <div class="recibo">
      <table class="recibo">
        <tr>
          <td>
            <div class="head">
              <img class="logoRecibo" src="imagenes/g&g.jpg" alt="G&G Inmobiliaria">
              <h2>Nuevo Comprobante de Pago</h2>
            </div>
            <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="contorno">
              <div class="nrecibo">
                <h2>Recibo # <span class="enfasis"><?php echo $nrecibo; ?></span></h2>
              </div>
              <div class="valor">
                <label for="valorpago">Valor $</label>
                <input type="text" id="valorpago" name="valorpago" value="" />
              </div>
            </div>

            <div class="contenidoNuevo">
              <div class="ciudad">
                <label for="ciudad">En la ciudad de</label>
                <input type="text" id="ciudad" name="ciudad" value="Funza" readonly="readonly" />
              </div>
              <div class="fecha">
                <label for="fecha">, el día</label>
                <input type="text" name="fecha" id="datepicker" readonly="readonly" size="10" />
              </div>
              <div class="arrendatario">
                <label for="idarrendatario">Recibi(mos) de</label>
                <input type="text" id="idarrendatario" name="idarrendatario" readonly="readonly"/>
                <input type="hidden" name="idarr" id="idarr">
                <a id="ClienteBtn" href="#" ><i class="fa fa-users fa-lg"></i></a>
              </div>
              <div class="valorLetras">
                <label for="valorLetras">La suma de</label>
                <input type="text" id="valorLetras" name="valorLetras" readonly="readonly" />
              </div>
              <div class="concepto">
                <label for="concepto">Por concepto de</label>
                <select name="concepto">
                    <option selected value="Arrendamiento">Arrendamiento</option>
                    <option value="Anticipo de S.">Anticipo Servicios</option>
                </select>
              </div>
              <div class="inmueble">
                <label for="tipoinmueble">del inmueble tipo</label>
                <input type="text" id="tipoinmueble" name="tipoinmueble" readonly="readonly" />
              </div>
              <div class="direccion">
                <label for="direccion">Ubicado en la</label>
                <input type="text" id="direccion" name="direccion" value="" readonly="readonly"/>
                <input type="hidden" name="iddireccion" id="iddireccion">
                <a id="InmuebleBtn" href="#" ><i class="fa fa-building fa-lg"></i></a>
              </div>
              <div class="iperiodo">
                <label for="iperiodo">Correspondiente al periodo del</label>
                <input type="text" name="iperiodo" id="iperiodo" readonly="readonly" size="10"/>
              </div>
              <div class="fperiodo">
                <label for="fperiodo">al</label>
                <input type="text" name="fperiodo" id="fperiodo" readonly="readonly" size="10" />
              </div>
            </div>
            <div class="firma">
              <h2><?php echo $usuario['upnombre'].' '.$usuario['usnombre'].' '.$usuario['upapellido'].' '.$usuario['usapellido']; ?></h2>
              <label for="idusuario"><p>Firma autorizada y Sello</p></label>
            </div>
            <div class="boton" id="boton">
              <button type="submit">Crear recibo</button>
            </div>
          </form>
        </td>
      </tr>
    </table>
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

$(document).ready(function() {
   $("#datepicker").datepicker({
     changeMonth: true
   });

});

$(document).ready(function() {
   $("#iperiodo").datepicker({
     changeMonth: true
   });
});

$(document).ready(function() {
   $("#fperiodo").datepicker({
     changeMonth: true
   });

});



 </script>


<?php require 'vista/footer.php' ?>
