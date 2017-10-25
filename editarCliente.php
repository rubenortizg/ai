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

    $id = ($_POST['idcliente']);
    $tipoid = $_POST['tipoid'];
    $identificacion = (int)limpiarDatos($_POST['identificacion']);
    $identificacion_ori = (int)limpiarDatos($_POST['identificacion_ori']);
    $pnombre = limpiarDatos($_POST['pnombre']);
    $snombre = limpiarDatos($_POST['snombre']);
    $papellido = limpiarDatos($_POST['papellido']);
    $sapellido = limpiarDatos($_POST['sapellido']);
    $direccion = limpiarDatos($_POST['direccion']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    $telfijo = limpiarDatos($_POST['telfijo']);
    $celular = limpiarDatos($_POST['celular']);
    $banco = limpiarDatos($_POST['banco']);
    $tcuenta = limpiarDatos($_POST['tcuenta']);
    $ncuenta = limpiarDatos($_POST['ncuenta']);
    $notas = limpiarDatos($_POST['notas']);
    $idusuario = (int)$usuario['id'];


    $errores = '';
    $enviado = '';

    $clientExiste = obtener_cliente_por_identificacion($conexion,$identificacion);

    $clientExiste = $clientExiste[0];

    $clientExiste = $clientExiste['identificacion'];

    if ($clientExiste != null && $clientExiste != $identificacion_ori) {
      $errores .= 'La identificacion del cliente a actualizar existe en la base de datos para otro cliente, verifique el valor. <br />';
    } else {
      if (empty($identificacion)) {
        $errores .= 'Debe ingresar un numero de identificación. <br />';
      }
      if (empty($pnombre)) {
        $errores .= 'Es necesario ingresar un nombre. <br />';
      }
      if (empty($papellido)) {
        $errores .= 'Es necesario ingresar un apellido. <br />';
      }
      if (empty($direccion)) {
        $errores .= 'Es necesario ingresar una dirección. <br />';
      }
      if (empty($ciudad)) {
        $errores .= 'Es necesario ingresar una ciudad para la dirección. <br />';
      }
      if (empty($telfijo or $celular)) {
        $errores .= 'Es necesario ingresar al menos un numero fijo o celular. <br />';
      }
    }


    if (!$errores) {

      $sql = 'UPDATE clientes SET identificacion = :identificacion, tipoid = :tipoid, pnombre = :pnombre, snombre = :snombre, papellido = :papellido, sapellido = :sapellido, direccion = :direccion, telfijo = :telfijo, celular = :celular, ciudad = :ciudad, banco = :banco, tcuenta = :tcuenta, ncuenta = :ncuenta, notas = :notas, idusuario = :idusuario WHERE id = :id';

      $sentencia = $conexion->prepare($sql);
      $sentencia->execute(array(
        ':id' => $id,
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
        ':banco' => $banco,
        ':tcuenta' => $tcuenta,
        ':ncuenta' => $ncuenta,
        ':notas' => $notas,
        ':idusuario' => $idusuario));


        header('Location: ' . RUTA . '/cliente.php?id='.$identificacion);
    }

  }

  else {
    $id_cliente = id_requerido($_GET['id']);

    if (empty($id_cliente)) {
      header('Location: clientes.php');
    }

    $cliente = obtener_cliente_por_id($conexion, $id_cliente);

    if (!$cliente) {
      header('Location: clientes.php');
    }

    $cliente = $cliente[0];

    $login = $_SESSION['usuario'];
    $usuario = obtener_usuario_por_id($conexion,$login);
    $usuario = $usuario[0];

  }

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

  require 'vista/editarCliente.view.php';

} else {
  header('Location: index.php');
}

?>
