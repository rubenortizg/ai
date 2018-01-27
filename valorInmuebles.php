<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';
  require 'numeroLetras.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $acentos = charset($conexion);

  $sqlInmuebles = "SELECT * FROM inmuebles WHERE direccion LIKE '%".$_GET['q']."%' LIMIT 20";
  $resultadoInmuebles = $conexion->prepare($sqlInmuebles);
  $resultadoInmuebles->execute();

  $json = [];
  while($row = $resultadoInmuebles->fetch()){
    $json[] = ['id'=>$row['id'], 'text'=>$row['direccion'], 'tipo'=>$row['tipo']];
  }
  echo json_encode($json);

} else {
  header('Location: index.php');
}

?>
