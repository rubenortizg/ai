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
  $id_ingreso = id_requerido($_GET['id']);

  if (empty($id_ingreso)) {
    header('Location: ingresos.php');
  }

  $ingreso = obtener_recibo_por_id($conexion, $id_ingreso);

  if (!$ingreso) {
    header('Location: ingresos.php');
  }

  $ingreso = $ingreso[0];
  
  $valorLetras = new numeroALetras();
  $valorLetras = $valorLetras->aLetras($ingreso['valorpago'],'COP');

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/ingreso.view.php';

} else {
  header('Location: index.php');
}

?>
