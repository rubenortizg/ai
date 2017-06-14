<?php

try {
  $conexion = new PDO('mysql:host=localhost;dbname=bd_ai','root', '');

  $resultados = $conexion->query('SELECT * FROM usuarios');

  foreach ($resultados as $fila) {
    echo $fila['id_usuario'] . ' - ' . $fila['nombre'] . '<br /> <br />';
  }

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}



?>
