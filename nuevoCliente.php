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

    $tipoid = $_POST['tipoid'];
    $identificacion = (int)limpiarDatos($_POST['identificacion']);
    $pnombre = limpiarDatos($_POST['pnombre']);
    $snombre = limpiarDatos($_POST['snombre']);
    $papellido = limpiarDatos($_POST['papellido']);
    $sapellido = limpiarDatos($_POST['sapellido']);
    $direccion = limpiarDatos($_POST['direccion']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    $telfijo = limpiarDatos($_POST['telfijo']);
    $celular = limpiarDatos($_POST['celular']);
    $notas = limpiarDatos($_POST['notas']);
    $idusuario = (int)$usuario['id'];

    $clientExiste = obtener_cliente_por_identificacion($conexion,$identificacion);

    if ($clientExiste == false) {
      $sql = 'INSERT INTO clientes (id, identificacion, tipoid, pnombre, snombre, papellido, sapellido, direccion, telfijo, celular, ciudad, tipo, notas, idusuario)
      VALUES (null, :identificacion, :tipoid, :pnombre, :snombre, :papellido, :sapellido, :direccion, :telfijo, :celular, :ciudad, null, :notas, :idusuario)';

      $sentencia = $conexion->prepare($sql);
      $sentencia->execute(array(
        ':identificacion' => $identificacion,
        ':tipoid' => $tipoid,
        ':pnombre' => $pnombre,
        ':snombre' => $snombre,
        ':papellido' => $papellido,
        ':sapellido' => $sapellido,
        ':direccion' => $direccion,
        ':telfijo' => $telfijo,
        ':celular' => $celular,
        ':ciudad' => $ciudad,
        ':notas' => $notas,
        ':idusuario' => $idusuario));
    }

        header('Location: ' . RUTA . '/cliente.php?id='.$identificacion);
  }

  else {
    $sql = 'SELECT MAX(id) AS id FROM clientes';

    $resultado = $conexion->query($sql);
  	$resultado = $resultado->fetch();
    $resultado = (int)$resultado[0];
    $ncliente = $resultado + 1;

    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];
  }

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

  require 'vista/nuevoCliente.view.php';

} else {
  header('Location: index.php');
}

?>
