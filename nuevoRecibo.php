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
    if (limpiarDatos($_POST['valorpago']) == null) {
      $valorpago = '';
    } else {
      $valorpago = (int)limpiarDatos($_POST['valorpago']);
      $valorIngreso = $valorpago;
      $valorEgreso = 0.9*$valorpago;
    }
    $valorpagoLetras = obtenerValor($valorpago);
    $ciudad = limpiarDatos($_POST['ciudad']);
    if (isset($_POST['idarrienda'])) {
      $idarrendatario = (int)$_POST['idarrienda'];
    } else {
      $idarrendatario = '';
    }
    $cliente = obtener_nombre_cliente($conexion, $idarrendatario);
    if (isset($_POST['iddireccion'])) {
      $idinmueble = (int)$_POST['iddireccion'];
      $inmueble = obtener_inmueble_por_id($conexion, $idinmueble);
      $inmueble = $inmueble[0];
      $inmueble = $inmueble['direccion'];
      $tipoinmueble = obtener_inmueble_por_id($conexion, $idinmueble);
      $tipoinmueble = $tipoinmueble[0];
      $tipoinmueble = $tipoinmueble['tipo'];
    } else {
      $idinmueble = '';
      $inmueble = '';
      $tipoinmueble = '';
    }
    $fecha = $_POST['fecha'];
    $iperiodo = $_POST['iperiodo'];
    $fperiodo = $_POST['fperiodo'];
    $idusuario = (int)$usuario['id'];
    if (isset($_POST['concepto'])) {
    $concepto = $_POST['concepto'];
    } else {
    $concepto = '';
    }


    $periodo = (strtotime($fperiodo) - strtotime($iperiodo))/86400;

// Validacion de ingreso de información a los formularios

    $errores = '';
    $enviado = '';

    if (empty($valorpago) or ($valorpago == 0)) {
      $errores .= 'Debe ingresar un valor para el recibo a generar. <br />';
    }
    if (empty($fecha)) {
      $errores .= 'Debe especificar la fecha de creacion del recibo. <br />';
    }
    if (empty($idarrendatario)) {
      $errores .= 'Debe seleccionar un cliente existente. <br />';
    }
    if (empty($concepto)) {
      $errores .= 'Debe seleccionar un concepto. <br />';
    }
    if (empty($idinmueble)) {
      $errores .= 'Es necesario seleccionar un inmueble. <br />';
    }
    if (empty($iperiodo)) {
      $errores .= 'Es necesario seleccionar una fecha inicial. <br />';
    }
    if (empty($fperiodo)) {
      $errores .= 'Es necesario seleccionar una fecha final. <br />';
    }
    if ($periodo < '0') {
      $errores .= 'La fecha final es anterior a la fecha inicial, es necesario verificar el periodo de tiempo. <br />';
    }


    if (!$errores) {
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

  }

  else {

    $sql = 'SELECT MAX(id) AS id FROM recibos';

    $resultado = $conexion->query($sql);
  	$resultado = $resultado->fetch();
    $resultado = (int)$resultado[0];
    $nrecibo = $resultado + 1 + $admin_config['rinicial'];

    // $clientes = obtener_clientes( $admin_config['rows'], $conexion);
    // $numero_paginas = numero_paginas($admin_config['rows'], $conexion);
    // $inmuebles = obtener_inmuebles( $admin_config['rows'], $conexion);

    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];
    $enviado = '';
  }

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

  require 'vista/nuevoRecibo.view.php';

} else {
  header('Location: index.php');
}

?>
