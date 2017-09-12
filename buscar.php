<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $acentos = charset($conexion);
  $pagina = $_COOKIE['pagina_anterior'];


  if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda']) && $_COOKIE['pagina_anterior'] != 'administrar.php') {
    $busqueda = limpiarDatos($_GET['busqueda']);


    if ($_COOKIE['pagina_anterior'] === 'clientes.php') {
      $sql = 'SELECT * FROM clientes WHERE identificacion LIKE :busqueda or pnombre LIKE :busqueda or snombre
              LIKE :busqueda or papellido LIKE :busqueda or sapellido LIKE :busqueda';
    }

    elseif ($_COOKIE['pagina_anterior'] === 'inmuebles.php') {
      $sql = 'SELECT inmuebles.*, clientes.pnombre, clientes.snombre, clientes.papellido, clientes.sapellido FROM inmuebles
              INNER JOIN clientes ON inmuebles.idpropietario = clientes.id
              WHERE inmuebles.matricula LIKE :busqueda or inmuebles.direccion LIKE :busqueda or inmuebles.ciudad
              LIKE :busqueda or inmuebles.tipo LIKE :busqueda or clientes.pnombre LIKE :busqueda or clientes.snombre
              LIKE :busqueda or clientes.papellido LIKE :busqueda or clientes.sapellido LIKE :busqueda';
    }

    elseif ($_COOKIE['pagina_anterior'] === 'recibos.php') {
      $sql = 'SELECT * FROM recibos
              INNER JOIN clientes ON recibos.idarrendatario = clientes.id
              INNER JOIN inmuebles ON recibos.idinmueble = inmuebles.id
              WHERE nrecibo LIKE :busqueda or pnombre LIKE :busqueda or snombre LIKE :busqueda or papellido LIKE :busqueda or sapellido LIKE :busqueda';
    }

    elseif ($_COOKIE['pagina_anterior'] === 'ingresos.php') {
      $sql = 'SELECT * FROM recibos
              INNER JOIN clientes ON recibos.idarrendatario = clientes.id
              INNER JOIN inmuebles ON recibos.idinmueble = inmuebles.id
                WHERE nrecibo LIKE :busqueda or pnombre LIKE :busqueda or snombre LIKE :busqueda or papellido LIKE :busqueda or sapellido LIKE :busqueda';
    }

    elseif ($_COOKIE['pagina_anterior'] === 'egresos.php') {
      $sql = 'SELECT inmuebles.id, inmuebles.idpropietario, recibos.nrecibo, recibos.valorpago,
              recibos.fecha, clientes.pnombre, clientes.snombre, clientes.papellido, clientes.sapellido,
              recibos.concepto FROM inmuebles
              INNER JOIN clientes ON inmuebles.idpropietario = clientes.id
              INNER JOIN recibos ON  inmuebles.id = recibos.idinmueble
              WHERE nrecibo LIKE :busqueda or pnombre LIKE :busqueda or snombre LIKE :busqueda or papellido LIKE :busqueda or sapellido LIKE :busqueda';
    }

    $sentencia = $conexion->prepare($sql);
    $sentencia->execute(array(':busqueda' => "%$busqueda%"));
    $resultados = $sentencia->fetchAll();

    if (empty($resultados)) {
      $titulo = 'No se encontraron resultados de la busqueda: ' . $busqueda;
    } else {
      $titulo = 'Resultados de la busqueda: ' . $busqueda;
    }

  } else {
    header('Location: '. RUTA . '/' .$pagina);
  }

  require 'vista/buscar.view.php';

} else {
  header('Location: index.php');
}

?>
