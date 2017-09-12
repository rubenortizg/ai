<?php require 'header.php'; ?>

  <div class="contenedor">

    <div class="derecha">
      <nav class="nuevo">
        <ul>
          <li><a href="clientes.php"><i class="fa fa-reply fa-lg"></i></a></li>
        </ul>
      </nav>
    </div>
    <div class="recibo">
      <table class="recibo">
        <tr>
          <td>
            <div class="head">
              <img class="logoRecibo" src="imagenes/g&g.jpg" alt="G&G Inmobiliaria">
              <h2>Nuevo Cliente</h2>
            </div>
            <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="contorno">
              <div class="nrecibo">
                <h2>Cliente ID # <span class="enfasis"><?php echo $ncliente; ?></span></h2>
              </div>
            </div>

            <div class="contenidoNuevo">
              <div>
                <label for="tipoid">Tipo de documento</label>
                <select name="tipoid">
                    <option selected value="Cedula de Ciudadanía">Cedula de Ciudadanía </option>
                    <option value="Cedula de Extranjeria">Cedula de Extranjeria </option>
                    <option value="NIT">NIT</option>
                    <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                    <option value="Registro Civil">Registro Civil</option>
                </select>
              </div>
              <div class="identificacion">
                <label for="identificacion">, Numero </label>
                <input type="text" id="identificacion" name="identificacion"/>
                <input type="hidden" name="idcliente" id="idcliente">
              </div>
              <div class="nombres">
                <label for="pnombre">Primer Nombre</label>
                <input type="text" id="pnombre" name="pnombre"/>
                <label for="snombre">Segundo Nombre</label>
                <input type="text" id="snombre" name="snombre"/>
              </div>
              <div class="apellidos">
                <label for="papellido">Primer Apellido</label>
                <input type="text" id="papellido" name="papellido"/>
                <label for="sapellido"> Segundo Apellido</label>
                <input type="text" id="sapellido" name="sapellido"/>
              </div>
              <div class="direccion">
                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" />
                <label for="ciudad">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad" />
              </div>
              <div class="telefonos">
                <label for="telfijo">Telefono Fijo</label>
                <input type="text" id="telfijo" name="telfijo" />
                <label for="celular">Celular</label>
                <input type="text" id="celular" name="celular" />
              </div>
              <div class="notas">
                <label for="notas">Notas Adicionales</label>
                <textarea id="notas" name="notas" /></textarea>
              </div>
            </div>
            <div class="firma">
              <h4>Usuario : <?php echo $usuario['upnombre'].' '.$usuario['usnombre'].' '.$usuario['upapellido'].' '.$usuario['usapellido']; ?></h4>
              <label for="idusuario"></label>
            </div>
            <div class="boton" id="boton">
              <button type="submit">Crear cliente</button>
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
           <td><h2>La identificacion del cliente ingresada existe en la base de datos, verifique el valor</h2></td>
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

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


$(document).ready(iniciar);

function iniciar(){
  $("#identificacion").focusout(validaIdentificacion);
}


function validaIdentificacion(){
  var x = $(this).val();
  $.ajax({
  url: "valorCliente.php",
  type: "post",
  data: "identificacion="+x,
  success: function(data){
    $("#idcliente").val(data);
    if (document.getElementById("idcliente").value == "Cliente Existe") {
      modal.style.display = "block";
      document.getElementById("identificacion").value = null;
    }
  }
  });
}

 </script>
<?php require 'vista/footer.php' ?>
