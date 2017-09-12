<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="derecha">
      <nav class="nuevo">
        <ul>
          <li><a href="inmuebles.php"><i class="fa fa-reply fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>
    <div class="recibo">
      <table class="recibo">
        <tr>
          <td>
            <div class="head">
              <img class="logoRecibo" src="imagenes/g&g.jpg" alt="G&G Inmobiliaria">
              <h2>Nuevo Inmueble</h2>
            </div>
            <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="contorno">
              <div class="nrecibo">
                <h2>Inmueble ID # <span class="enfasis"><?php echo $ninmueble; ?></span></h2>
              </div>
            </div>

            <div class="contenidoNuevo">
              <div>
                <label for="tipo">Tipo de Inmueble</label>
                <select name="tipo">
                    <option selected value="Apartamento">Apartamento </option>
                    <option value="Casa">Casa </option>
                    <option value="Local">Local</option>
                    <option value="Bodega">Bodega</option>
                    <option value="Lote">Lote</option>
                </select>
                <label for="matricula">, No. Matricula </label>
                <input type="text" id="matricula" name="matricula"/>
                <input type="hidden" name="idmatricula" id="idmatricula">
              </div>
              <div class="arrendatario">
                <label for="idpropietario">Propietario</label>
                <input type="text" id="idpropietario" name="idpropietario" readonly="readonly"/>
                <input type="hidden" name="idprr" id="idprr">
                <a id="ClienteBtn" href="#" ><i class="fa fa-users fa-lg"></i></a>
              </div>
              <div class="direccion">
                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" />
              </div>
              <div>
                <label for="ciudad">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad" />
                <label for="valor">Valor</label>
                <input type="text" id="valor" name="valor" />
              </div>
              <div class="descripcion">
                <label for="descripcion">Descripción del inmueble:</label>
                <textarea id="descripcion" name="descripcion" /></textarea>
              </div>
            </div>
            <div class="firma">
              <h4>Usuario : <?php echo $usuario['upnombre'].' '.$usuario['usnombre'].' '.$usuario['upapellido'].' '.$usuario['usapellido']; ?></h4>
              <label for="idusuario"></label>
            </div>
            <div class="boton" id="boton">
              <button type="submit">Crear Inmueble</button>
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
           <td> <?php echo $cliente['identificacion']; ?></td>
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
       <h3>Inmuebles Registrados</h3>
     </div>
     <div class="modal-body">
       <br>
       <table>
         <tr>
           <td><h2>La matricula ingresada existe en la base de datos, verifique el valor</h2></td>
         </tr>
     </table>
     <br/>
     </div>
     <div class="modal-footer">
     </div>
   </div>
 </div>


 <script>
 // Get the modal
 var modal = document.getElementById('ClienteModal');
 var inmuebleModal = document.getElementById('InmuebleModal');

 // Get the button that opens the modal
 var btn = document.getElementById("ClienteBtn");

 // Get the <span> element that closes the modal
 var span = document.getElementsByClassName("close")[0];
 var spanInmueble = document.getElementsByClassName("closeInmueble")[0];

 // When the user clicks the button, open the modal
 btn.onclick = function() {
     modal.style.display = "block";
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
          document.getElementById("idpropietario").value = cliente;
          document.getElementById("idprr").value = idcliente;
          modal.style.display = "none";
      });

 });


 $(document).ready(iniciar);

 function iniciar(){
   $("#matricula").focusout(validaMatricula);
 }


 function validaMatricula(){
   var x = $(this).val();
   $.ajax({
   url: "valorMatricula.php",
   type: "post",
   data: "matricula="+x,
   success: function(data){
     $("#idmatricula").val(data);
     if (document.getElementById("idmatricula").value == "Matricula Existe") {
       inmuebleModal.style.display = "block";
       document.getElementById("matricula").value = null;
     }
   }
   });
 }


 </script>

<?php require 'vista/footer.php' ?>
