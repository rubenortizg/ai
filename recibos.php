<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $acentos = charset($conexion);
  $recibos= obtener_recibos( $admin_config['rows'], $conexion);

/*  if (!$recibos) {
    header('Location: recibos.php');
  }

*/
  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/recibos.view.php';

} else {
  header('Location: index.php');
}

?>
