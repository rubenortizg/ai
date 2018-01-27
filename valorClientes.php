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

  $sqlClientes = "SELECT * FROM clientes WHERE pnombre LIKE '%".$_GET['q']."%' or snombre LIKE '%".$_GET['q']."%' or papellido LIKE '%".$_GET['q']."%' or sapellido LIKE '%".$_GET['q']."%' LIMIT 20";
  $resultadoClientes = $conexion->prepare($sqlClientes);
  $resultadoClientes->execute();

  $json = [];
  while($row = $resultadoClientes->fetch()){
    $json[] = ['id'=>$row['id'], 'text'=>$row['pnombre'].' '.$row['snombre'].' '.$row['papellido'].' '.$row['sapellido']];
  }
  echo json_encode($json);

} else {
  header('Location: index.php');
}

?>
