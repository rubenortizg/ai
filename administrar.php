<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $acentos = charset($conexion);


  $sqlcliente = 'SELECT MAX(id) AS id FROM clientes';
  $cliente = $conexion->query($sqlcliente);
  $cliente = $cliente->fetch();
  $cliente = (int)$cliente[0];


  $clientes = obtener_cliente_x_id($conexion, $cliente);
  $clientes = $clientes[0];

  $sqlinmueble = 'SELECT MAX(id) AS id FROM inmuebles';
  $inmueble = $conexion->query($sqlinmueble);
  $inmueble = $inmueble->fetch();
  $inmueble = (int)$inmueble[0];

  $inmuebles = obtener_inmueble_x_id($conexion, $inmueble);
  $inmuebles = $inmuebles[0];

  $sqlrecibo = 'SELECT MAX(id) AS id FROM recibos';
  $recibo = $conexion->query($sqlrecibo);
  $recibo = $recibo->fetch();
  $recibo = (int)$recibo[0];

  $recibos = obtener_recibo_x_id($conexion, $recibo);
  $recibos = $recibos[0];

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/administrar.view.php';

} else {
  header('Location: index.php');
}

?>
