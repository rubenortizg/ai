<?php

if ($_COOKIE['pagina_anterior'] === 'clientes.php') {
  $clientes = $resultados;
  require 'clientes.view.php';
}

elseif ($_COOKIE['pagina_anterior'] === 'inmuebles.php') {
  $inmuebles = $resultados;
  require 'inmuebles.view.php';
}

elseif ($_COOKIE['pagina_anterior'] === 'recibos.php') {
  $recibos = $resultados;
  require 'recibos.view.php';
}

elseif ($_COOKIE['pagina_anterior'] === 'ingresos.php') {
  $ingresos = $resultados;
  require 'ingresos.view.php';
}

elseif ($_COOKIE['pagina_anterior'] === 'egresos.php') {
  $egresos = $resultados;
  require 'egresos.view.php';
}

?>
