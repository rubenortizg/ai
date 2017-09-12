<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $acentos = charset($conexion);
  $id_inmueble = id_requerido($_GET['id']);

  if (empty($id_inmueble)) {
    header('Location: inmuebles.php');
  }

  $inmueble = obtener_inmueble_por_id($conexion, $id_inmueble);

  if (!$inmueble) {
    header('Location: inmuebles.php');
  }

  $inmueble = $inmueble[0];
  $usuario = $_SESSION['usuario'];

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/inmueble.view.php';

} else {
  header('Location: index.php');
}

?>
