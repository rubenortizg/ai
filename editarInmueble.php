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
    $tipo = $_POST['tipo'];
    $matricula = limpiarDatos($_POST['matricula']);
    $idpropietario = $_POST['idprr'];
    $direccion = limpiarDatos($_POST['direccion']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    $valor = limpiarDatos($_POST['valor']);
    $descripcion = limpiarDatos($_POST['descripcion']);
    $idusuario = (int)$usuario['id'];
    $idinmueble = limpiarDatos($_POST['idinmueble']);

    $matriculaExiste = obtener_inmueble_por_matricula($conexion,$matricula);

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
  }

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

  require 'vista/editarInmueble.view.php';

} else {
  header('Location: index.php');
}

?>
