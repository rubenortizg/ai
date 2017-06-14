<?php

//array
$semana = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
echo $semana[2];

//recorrer Array
$meses = array(
  'Enero',
  'Febrero',
  'Marzo',
  'Abril',
  'Mayo',
  'Junio',
  'Julio',
  'Agosto',
  'Septiembre',
  'Octubre',
  'Noviembre',
  'Diciembre'
);

sort($meses);




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Meses del año</title>
  </head>
  <body>
    <h1>Meses del año</h1>
    <ul>
      <?php

      foreach ($meses as $mes) {
        echo '<li>'.$mes.'</li>';
      }

      ?>


    </ul>
  </body>
</html>
