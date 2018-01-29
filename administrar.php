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

  $sqlinmueble = 'SELECT MAX(id) AS id FROM inmuebles';
  $inmueble = $conexion->query($sqlinmueble);
  $inmueble = $inmueble->fetch();
  $inmueble = (int)$inmueble[0];

  $inmuebles = obtener_inmueble_x_id($conexion, $inmueble);

  $sqlrecibo = 'SELECT MAX(id) AS id FROM recibos';
  $recibo = $conexion->query($sqlrecibo);
  $recibo = $recibo->fetch();
  $recibo = (int)$recibo[0];

  $recibos = obtener_recibo_x_id($conexion, $recibo);

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/administrar.view.php';

} else {
  header('Location: index.php');
}

?>
