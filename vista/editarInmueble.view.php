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
              <select class="form-control form-control-sm" name="tipo">
                  <option selected value="Apartamento">Apartamento </option>
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
            <div class="col-12 col-sm-11">
              <label for="idpropietario"><small>Propietario</small></label>
              <input class="form-control form-control-sm" type="text" id="idpropietario" name="idpropietario" readonly="readonly" value="<?php echo $inmueble['pnombre'].' '.$inmueble['snombre'].' '.$inmueble['papellido'].' '.$inmueble['sapellido']; ?>"/>
              <input type="hidden" name="idprr" id="idprr">
            </div>
            <div class="col-12 col-sm-1 d-flex justify-content-center align-items-end">
              <a class="form-control-sm" id="ClienteBtn" href="#" ><i class="fa fa-users fa-lg"></i></a>
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

 <script>

 // Get the modal
 var modal = document.getElementById('ClienteModal');

 // Get the button that opens the modal
 var btn = document.getElementById("ClienteBtn");

 // Get the <span> element that closes the modal
 var span = document.getElementsByClassName("close")[0];

 // When the user clicks the button, open the modal
 btn.onclick = function() {
     modal.style.display = "block";
 }

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

</script>

<?php require 'vista/footer.php' ?>
