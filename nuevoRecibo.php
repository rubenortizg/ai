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

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = 'SELECT MAX(id) AS id FROM recibos';

    $resultado = $conexion->query($sql);
  	$resultado = $resultado->fetch();
    $resultado = (int)$resultado[0];
    $nrecibo = $resultado + 1 + $admin_config['rinicial'];

    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];

    $nrecibo = (int)$nrecibo;
    $valorpago = limpiarDatos($_POST['valorpago']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    $idarrendatario = (int)$_POST['idarr'];
    $idinmueble = (int)$_POST['iddireccion'];
    $iperiodo = $_POST['iperiodo'];
    $fperiodo = $_POST['fperiodo'];
    $idusuario = (int)$usuario['id'];
    $concepto = $_POST['concepto'];


    $sql = 'INSERT INTO recibos (id, nrecibo, valorpago, ciudad, fecha, idarrendatario, idinmueble, iperiodo, fperiodo, idusuario, concepto)
    VALUES (null, :nrecibo, :valorpago, :ciudad, null, :idarrendatario, :idinmueble, :iperiodo, :fperiodo, :idusuario, :concepto)';

    $sentencia = $conexion->prepare($sql);
    $sentencia->execute(array(
      ':nrecibo' => $nrecibo,
      ':valorpago' => $valorpago,
      ':ciudad' => $ciudad,
      ':idarrendatario' => $idarrendatario,
      ':idinmueble' => $idinmueble,
      ':iperiodo' => $iperiodo,
      ':fperiodo' => $fperiodo,
      ':idusuario' => $idusuario,
      ':concepto' => $concepto));

    header('Location: ' . RUTA . '/recibo.php?id='.$nrecibo);
  }

  else {

    $sql = 'SELECT MAX(id) AS id FROM recibos';

    $resultado = $conexion->query($sql);
  	$resultado = $resultado->fetch();
    $resultado = (int)$resultado[0];
    $nrecibo = $resultado + 1 + $admin_config['rinicial'];

    $clientes = obtener_clientes( $admin_config['rows'], $conexion);
    $numero_paginas = numero_paginas($admin_config['rows'], $conexion);
    $inmuebles = obtener_inmuebles( $admin_config['rows'], $conexion);
    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];
  }

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

  require 'vista/nuevoRecibo.view.php';

} else {
  header('Location: index.php');
}

?>
