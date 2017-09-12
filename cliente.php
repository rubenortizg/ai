<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $acentos = charset($conexion);
  $id_cliente = id_requerido($_GET['id']);

  if (empty($id_cliente)) {
    header('Location: clientes.php');
  }

  $cliente = obtener_cliente_por_id($conexion, $id_cliente);

  if (!$cliente) {
    header('Location: clientes.php');
  }

  $cliente = $cliente[0];
  $usuario = $_SESSION['usuario'];

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/cliente.view.php';

} else {
  header('Location: index.php');
}

?>
