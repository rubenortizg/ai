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
  $id_recibo = id_requerido($_GET['id']);

  if (empty($id_recibo)) {
    header('Location: recibos.php');
  }

  $recibo = obtener_recibo_por_id($conexion, $id_recibo);

  if (!$recibo) {
    header('Location: recibos.php');
  }

  $recibo = $recibo[0];

  $valorLetras = new numeroALetras();
  $valorLetras = $valorLetras->aLetras($recibo['valorpago'],'COP');

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/recibo.view.php';

} else {
  header('Location: index.php');
}

?>
