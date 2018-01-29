<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $acentos = charset($conexion);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];

    if (isset($_POST['tipo'])) {
      $tipo = $_POST['tipo'];
    } else {
      $tipo = '';
    }
    $matricula = limpiarDatos($_POST['matricula']);
    if (isset($_POST['idarrienda'])) {
    $idpropietario = $_POST['idarrienda'];
    } else {
    $idpropietario = '';
    }
    $cliente = obtener_nombre_cliente($conexion, $idpropietario);
    $direccion = limpiarDatos($_POST['direccion']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    if (limpiarDatos($_POST['valor']) == 0) {
      $valor = null;
    } else {
      $valor = limpiarDatos($_POST['valor']);
    }
    $descripcion = limpiarDatos($_POST['descripcion']);
    $idusuario = (int)$usuario['id'];
    $ninmueble = $_POST['ninmueble'];

// Validacion de ingreso de información a los formularios

    $errores = '';
    $enviado = '';

    $matriculaExiste = obtener_inmueble_por_matricula($conexion,$matricula);

    if ($matriculaExiste) {
      $errores .= 'La matricula del cliente ingresada existe en la base de datos, verifique el valor. <br />';
    } else {
      if (empty($tipo)) {
        $errores .= 'Debe seleccionar un tipo de inmueble. <br />';
      }
      if (empty($matricula)) {
        $errores .= 'Debe ingresar un valor de matricula. <br />';
      }
      if (empty($idpropietario)) {
        $errores .= 'Debe seleccionar un cliente existente. <br />';
      }
      if (empty($direccion)) {
        $errores .= 'Es necesario ingresar una direccion. <br />';
      }
      if (empty($ciudad)) {
        $errores .= 'Es necesario ingresar una ciudad. <br />';
      }
    }

    if (!$errores) {
      if ($matriculaExiste == false) {
        $sql = 'INSERT INTO inmuebles (id, matricula, tipo, direccion, ciudad, valor, descripcion, idpropietario, idusuario)
        VALUES (null, :matricula, :tipo, :direccion, :ciudad, :valor, :descripcion, :idpropietario, :idusuario)';

        $sentencia = $conexion->prepare($sql);
        $sentencia->execute(array(
          ':matricula' => $matricula,
          ':tipo' => $tipo,
          ':direccion' => $direccion,
          ':ciudad' => $ciudad,
          ':valor' => $valor,
          ':descripcion' => $descripcion,
          ':idpropietario' => $idpropietario,
          ':idusuario' => $idusuario));
      }

      header('Location: ' . RUTA . '/inmueble.php?id='.$ninmueble);
    }
  }

  else {
    $sql = 'SELECT MAX(id) AS id FROM inmuebles';

    $resultado = $conexion->query($sql);
  	$resultado = $resultado->fetch();
    $resultado = (int)$resultado[0];
    $ninmueble = $resultado + 1;

    // $clientes = obtener_clientes( $admin_config['rows'], $conexion);
    // $numero_paginas = numero_paginas($admin_config['rows'], $conexion);

    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];
    $enviado = '';


  }

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

  require 'vista/nuevoInmueble.view.php';

} else {
  header('Location: index.php');
}

?>
