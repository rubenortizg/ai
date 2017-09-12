<?php

  require 'numeroLetras.php';

  $valorpago = $_POST['valorpago'];

  function obtenerValor($val){
    $valorLetras = new numeroALetras();
    $valorLetras = $valorLetras->aLetras($val,'COP');
    return $valorLetras;
  }

  echo obtenerValor($valorpago);

?>
