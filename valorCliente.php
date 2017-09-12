<?php

  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $identificacion = $_POST['identificacion'];

  function clientExiste($conexion, $val){
    $cliente = obtener_cliente_por_identificacion($conexion,$val);
    if (!$cliente == false) {
      $cliente = "Cliente Existe";
    } else {
      $cliente = $val;
    }
    return $cliente;
  }

  echo clientExiste($conexion, $identificacion);

?>
