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

    $ncliente = ($_POST['ncliente']);
    if (isset($_POST['tipoid'])) {
      $tipoid = $_POST['tipoid'];
    } else {
      $tipoid = '';
    }
    $identificacion = (int)limpiarDatos($_POST['identificacion']);
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

    if ($clientExiste) {
      $errores .= 'La identificacion del cliente ingresada existe en la base de datos, verifique el valor. <br />';
    } else {
      if (empty($tipoid)) {
        $errores .= 'Debe seleccionar un tipo de identificación. <br />';
      }
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

      if ($clientExiste == false) {
        $sql = 'INSERT INTO clientes (id, identificacion, tipoid, pnombre, snombre, papellido, sapellido, direccion, telfijo, celular, ciudad, tipo, banco, tcuenta, ncuenta, notas, idusuario)
        VALUES (null, :identificacion, :tipoid, :pnombre, :snombre, :papellido, :sapellido, :direccion, :telfijo, :celular, :ciudad, null, :banco, :tcuenta, :ncuenta, :notas, :idusuario)';

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
        ':banco' => $banco,
        ':tcuenta' => $tcuenta,
        ':ncuenta' => $ncuenta,
        ':notas' => $notas,
        ':idusuario' => $idusuario));
      }

      header('Location: ' . RUTA . '/cliente.php?id='.$identificacion);
    }

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
    $enviado = '';
  }

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);

  require 'vista/nuevoCliente.view.php';

} else {
  header('Location: index.php');
}

?>
