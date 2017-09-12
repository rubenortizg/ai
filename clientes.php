<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }


  $acentos = charset($conexion);
  $clientes = obtener_clientes( $admin_config['rows'], $conexion);
/*

  if (!$clientes) {
    header('Location: clientes.php');
  }

*/
  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/clientes.view.php';


} else {
  header('Location: index.php');
}

?>
