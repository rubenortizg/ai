<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $acentos = charset($conexion);

  $id = limpiarDatos($_GET['id']);

  if (!$id) {
  	header('Location: ' . RUTA . '/inmuebles.php');
  }

  $statement = $conexion->prepare('DELETE FROM inmuebles WHERE id = :id');
  $statement->execute(array('id' => $id));

  header('Location: ' . RUTA . '/inmuebles.php');


  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

} else {
  header('Location: index.php');
}

?>
