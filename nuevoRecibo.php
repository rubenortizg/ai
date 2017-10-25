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
    $sqlIngreso = 'SELECT MAX(id) AS id FROM ingresos';
    $sqlEgreso = 'SELECT MAX(id) AS id FROM egresos';

    $resultado = $conexion->query($sql);
  	$resultado = $resultado->fetch();
    $resultado = (int)$resultado[0];
    $nrecibo = $resultado + 1 + $admin_config['rinicial'];

    $resultadoIngreso = $conexion->query($sqlIngreso);
  	$resultadoIngreso = $resultadoIngreso->fetch();
    $resultadoIngreso = (int)$resultadoIngreso[0];
    $ningreso = $resultadoIngreso + 1 + $admin_config['rinicial'];

    $resultadoEgreso = $conexion->query($sqlEgreso);
  	$resultadoEgreso = $resultadoEgreso->fetch();
    $resultadoEgreso = (int)$resultadoEgreso[0];
    $negreso = $resultadoEgreso + 1 + $admin_config['rinicial'];

    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];

    $nrecibo = (int)$nrecibo;
    $ningreso = (int)$ningreso;
    $negreso = (int)$negreso;
    $valorpago = limpiarDatos($_POST['valorpago']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    $idarrendatario = (int)$_POST['idarr'];
    $idinmueble = (int)$_POST['iddireccion'];
    $iperiodo = $_POST['iperiodo'];
    $fperiodo = $_POST['fperiodo'];
    $idusuario = (int)$usuario['id'];
    $concepto = $_POST['concepto'];

    $valorIngreso = $valorpago;
    $valorEgreso = 0.9*$valorpago;

    if ($concepto == "Arrendamiento") {

      $sql = 'INSERT INTO ingresos (id, ningreso, valorpago, ciudad, fecha, idarrendatario, idinmueble, iperiodo, fperiodo, idusuario, concepto)
      VALUES (null, :ningreso, :valorpago, :ciudad, null, :idarrendatario, :idinmueble, :iperiodo, :fperiodo, :idusuario, :concepto)';

      $sentenciaIngreso = $conexion->prepare($sql);
      $sentenciaIngreso->execute(array(
        ':ningreso' => $ningreso,
        ':valorpago' => $valorIngreso,
        ':ciudad' => $ciudad,
        ':idarrendatario' => $idarrendatario,
        ':idinmueble' => $idinmueble,
        ':iperiodo' => $iperiodo,
        ':fperiodo' => $fperiodo,
        ':idusuario' => $idusuario,
        ':concepto' => $concepto));

        $sql = 'INSERT INTO egresos (id, negreso, valorpago, ciudad, fecha, idarrendatario, idinmueble, iperiodo, fperiodo, idusuario, concepto)
        VALUES (null, :negreso, :valorpago, :ciudad, null, :idarrendatario, :idinmueble, :iperiodo, :fperiodo, :idusuario, :concepto)';

        $sentenciaEgreso = $conexion->prepare($sql);
        $sentenciaEgreso->execute(array(
          ':negreso' => $negreso,
          ':valorpago' => $valorEgreso,
          ':ciudad' => $ciudad,
          ':idarrendatario' => $idarrendatario,
          ':idinmueble' => $idinmueble,
          ':iperiodo' => $iperiodo,
          ':fperiodo' => $fperiodo,
          ':idusuario' => $idusuario,
          ':concepto' => $concepto));
    } else {

      $sql = 'INSERT INTO ingresos (id, ningreso, valorpago, ciudad, fecha, idarrendatario, idinmueble, iperiodo, fperiodo, idusuario, concepto)
      VALUES (null, :ningreso, :valorpago, :ciudad, null, :idarrendatario, :idinmueble, :iperiodo, :fperiodo, :idusuario, :concepto)';

      $sentenciaIngreso = $conexion->prepare($sql);
      $sentenciaIngreso->execute(array(
        ':ningreso' => $ningreso,
        ':valorpago' => $valorIngreso,
        ':ciudad' => $ciudad,
        ':idarrendatario' => $idarrendatario,
        ':idinmueble' => $idinmueble,
        ':iperiodo' => $iperiodo,
        ':fperiodo' => $fperiodo,
        ':idusuario' => $idusuario,
        ':concepto' => $concepto));
    }

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
