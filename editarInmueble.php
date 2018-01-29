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

    $id = ($_POST['idinmueble']);
    if (isset($_POST['tipo'])) {
      $tipo = $_POST['tipo'];
    } else {
      $tipo = '';
    }
    $matricula = limpiarDatos($_POST['matricula']);
    $matricula_ori = limpiarDatos($_POST['matricula_ori']);
    if (isset($_POST['idprr'])) {
      $idpropietario = $_POST['idprr'];
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
    $idinmueble = limpiarDatos($_POST['idinmueble']);



// Validacion de ingreso de información a los formularios

    $errores = '';
    $enviado = '';

    $matriculaExiste = obtener_inmueble_por_matricula($conexion,$matricula);

    $matriculaExiste = $matriculaExiste[0];

    $matriculaExiste = $matriculaExiste['matricula'];

    if ($matriculaExiste != null && $matriculaExiste != $matricula_ori) {
      $errores .= 'La matricula del inmueble a actualizar existe en la base de datos para otro cliente, verifique el valor. <br />';
    } else {
      if (empty($matricula)) {
        $errores .= 'Debe ingresar un valor de matricula. <br />';
      }
      if (empty($tipo)) {
        $errores .= 'Debe seleccionar un tipo de inmueble. <br />';
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

      $sql = 'UPDATE inmuebles SET matricula = :matricula, tipo = :tipo, direccion = :direccion, ciudad = :ciudad, valor = :valor, descripcion = :descripcion, idpropietario = :idpropietario, idusuario = :idusuario WHERE id = :id';

      $sentencia = $conexion->prepare($sql);
      $sentencia->execute(array(
        ':id' => $id,
        ':matricula' => $matricula,
        ':tipo' => $tipo,
        ':direccion' => $direccion,
        ':ciudad' => $ciudad,
        ':valor' => $valor,
        ':descripcion' => $descripcion,
        ':idpropietario' => $idpropietario,
        ':idusuario' => $idusuario));

      header('Location: ' . RUTA . '/inmueble.php?id='.$idinmueble);
    }



  }

  else {
    $id_inmueble = id_requerido($_GET['id']);

    if (empty($id_inmueble)) {
      header('Location: inmuebles.php');
    }

    $inmueble = obtener_inmueble_por_id($conexion, $id_inmueble);

    if (!$inmueble) {
      header('Location: inmuebles.php');
    }

    $inmueble = $inmueble[0];

    $clientes = obtener_clientes( $admin_config['rows'], $conexion);
    $numero_paginas = numero_paginas($admin_config['rows'], $conexion);

    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];
    $enviado = '';
  }

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

  require 'vista/editarInmueble.view.php';

} else {
  header('Location: index.php');
}

?>
