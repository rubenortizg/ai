<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }


  $acentos = charset($conexion);
  $idcliente = $_GET['id'];
  $cliente =  obtener_cliente_por_id($conexion, $idcliente);

  if (!$cliente) {
    header('Location: error.php');
  }

  return $cliente;

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

} else {
  header('Location: index.php');
}

?>
