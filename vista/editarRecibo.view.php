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
              <h2>Editar Comprobante de Pago</h2>
            </div>
            <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="contorno">
              <div class="nrecibo">
                <label for="nrecibo">Recibo # </label>
                <input type="text" id='nrecibo' name="nrecibo" value="" />
              </div>
              <div class="valor">
                <label for="valorpago">Valor $</label>
                <input type="text" id='valorpago' name="valorpago" value="" />
              </div>
            </div>
            <div class="contenidoNuevo">
              <div class="ciudad">
                <label for="ciudad">En la ciudad de</label>
                <input type="text" id='ciudad' name="ciudad" value="" />
              </div>
              <div class="fecha">
                <label for="fecha">, el día</label>
                <input type="text" id='fecha' name="fecha" value="" />
              </div>
              <div class="arrendatario">
                <label for="arrendatario">Recibi(mos) de</label>
                <input type="text" id='arrendatario' name="arrendatario" value="" />
              </div>
              <div class="valorLetras">
                <label for="valorLetras">La suma de</label>
                <input type="text" id='valorLetras' name="valorLetras" value="" />
              </div>
              <div class="concepto">
                <label for="concepto">Por concepto de</label>
                <input type="text" id='concepto' name="concepto" value="" />
              </div>
              <div class="inmueble">
                <label for="inmueble">del inmueble tipo</label>
                <input type="text" id='inmueble' name="inmueble" value="" />
              </div>
              <div class="direccion">
                <label for="direccion">Ubicado en la</label>
                <input type="text" id='direccion' name="direccion" value="" />
              </div>
              <div class="iperiodo">
                <label for="iperiodo">Correspondiente al periodo del</label>
                <input type="text" id='iperiodo' name="iperiodo" value="" />
              </div>
              <div class="fperiodo">
                <label for="fperiodo">al</label>
                <input type="text" id='fperiodo' name="fperiodo" value="" />
              </div>
            </div>
            <div class="firma">
              <h2>Ruben Dario Ortiz</h2>
              <p>Firma autorizada y Sello</p>
            </div>
            <div class="boton">
              <button type="submit">Actualizar recibo</button>
            </div>
          </form>
        </td>
      </tr>
    </table>
   </div>
 </div>

<?php require 'vista/footer.php' ?>
