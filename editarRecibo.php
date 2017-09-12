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

    $nrecibo = limpiarDatos($_POST['nrecibo']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    $fecha = limpiarDatos($_POST['fecha']);
    $idarrendatario = limpiarDatos($_POST['idarrendatario']);
    $valor = limpiarDatos($_POST['valor']);
    $idinmueble = limpiarDatos($_POST['idinmueble']);
    $concepto = ($_POST['concepto']);
    $iperiodo = limpiarDatos($_POST['iperiodo']);
    $fperiodo = limpiarDatos($_POST['fperiodo']);
    $idusuario = limpiarDatos($_POST['idusuario']);
    $id = limpiarDatos($_POST['id']);

    $sql = 'UPDATE recibos SET nrecibo = :nrecibo, valor = :valor, ciudad = :ciudad, fecha = :fecha,
            idarrendatario = :idarrendatario, idinmueble = :idinmueble, iperiodo = :iperiodo,
            fperiodo = :fperiodo, idusuario = :idusuario WHERE id = :id';

    $sentencia = $conexion->prepare($sql);
    $sentencia->execute(array(
      ':nrecibo' => $nrecibo,
      ':valor' => $valor,
      ':ciudad' => $ciudad,
      ':fecha' => $fecha,
      ':idarrendatario' => $idarrendatario,
      ':idinmueble' => $idinmueble,
      ':iperiodo' => $iperiodo,
      ':fperiodo' => $fperiodo,
      ':idusuario' => $idusuario,
      ':id' => $id));

    //header('Location: ' . RUTA . '/recibos.php');

  } else {
    $id_recibo = id_requerido($_GET['id']);

    if (empty($id_recibo)) {
      header('Location :' . RUTA . '/recibos.php');
    }

    $recibo = obtener_recibo_por_id($conexion, $id_recibo);

    if (!$recibo) {
      header('Location :' . RUTA . '/recibos.php');
    }

    $recibo = $recibo[0];


  }


  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);
  require 'vista/editarRecibo.view.php';

} else {
  header('Location: index.php');
}

?>
