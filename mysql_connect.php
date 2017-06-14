<?php

$conexion = mysql_connect('localhost', 'root', '') or die("No se pudo establecer conexion a BD");

mysql_select_db('bd_ai', $conexion);

$consulta = mysql_query('SELECT * FROM usuarios');

while ($fila = mysql_fetch_object($consulta)) {
  echo 'Id: ' . $fila->id_usuario . ' Usuario: ' .$fila->nombre;
  echo "<br>";
}

?>
