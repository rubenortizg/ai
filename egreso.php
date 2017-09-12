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
  $id_egreso = id_requerido($_GET['id']);

  if (empty($id_egreso)) {
    header('Location: egresos.php');
  }

  $egreso = obtener_egreso_por_id($conexion, $id_egreso);

  if (!$egreso) {
    header('Location: egresos.php');
  }

  $egreso = $egreso[0];

  $valorLetras = new numeroALetras();
  $valorLetras = $valorLetras->aLetras(0.9*$egreso['valorpago'],'COP');

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/egreso.view.php';

} else {
  header('Location: index.php');
}

?>
