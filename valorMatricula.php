<?php

  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $matricula = $_POST['matricula'];


  function matriculaExiste($conexion, $val){

    $matricula = obtener_inmueble_por_matricula($conexion,$val);
    $matricula = $matricula[0];
    if (!$matricula == false) {
      $matricula = "Matricula Existe";
    } else {
      $matricula = $val;
    }
    return $matricula;
  }

  echo matriculaExiste($conexion, $matricula);

?>
