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

    $tipo = $_POST['tipo'];
    $matricula = limpiarDatos($_POST['matricula']);
    $idpropietario = $_POST['idprr'];
    $direccion = limpiarDatos($_POST['direccion']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    $valor = limpiarDatos($_POST['valor']);
    $descripcion = limpiarDatos($_POST['descripcion']);
    $idusuario = (int)$usuario['id'];

    $matriculaExiste = obtener_inmueble_por_matricula($conexion,$matricula);

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

    header('Location: ' . RUTA . '/inmueble.php?id='.$matricula);
  }

  else {
    $sql = 'SELECT MAX(id) AS id FROM inmuebles';

    $resultado = $conexion->query($sql);
  	$resultado = $resultado->fetch();
    $resultado = (int)$resultado[0];
    $ninmueble = $resultado + 1;

    $clientes = obtener_clientes( $admin_config['rows'], $conexion);
    $numero_paginas = numero_paginas($admin_config['rows'], $conexion);

    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];
  }

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

  require 'vista/nuevoInmueble.view.php';

} else {
  header('Location: index.php');
}

?>
