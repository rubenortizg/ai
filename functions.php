<?php

function conexion($db_config){
  try {
    $conexion = new PDO('mysql:host=localhost;dbname='.$db_config['database'], $db_config['usuario'], $db_config['password']);
    return $conexion;
  } catch (PDOException $e) {
    return false;
  }
}

function limpiarDatos($datos){
  $datos = trim($datos);
  $datos = stripcslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

function pagina_actual(){
  return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function charset($conexion){
  $sentencia = $conexion->prepare("SET NAMES 'utf8'");
  $sentencia->execute();
  return $sentencia->fetchAll();
}


function obtener_clientes($results, $conexion){
  $inicio = (pagina_actual() > 1) ? pagina_actual()*$results - $results : 0;
  $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM clientes ORDER BY identificacion LIMIT $inicio,$results";
  $sentencia = $conexion->prepare($sql);
  $sentencia->execute();
  return $sentencia->fetchAll();
}

function obtener_inmuebles($results, $conexion){
  $inicio = (pagina_actual() > 1) ? pagina_actual()*$results - $results : 0;
  $sql = "SELECT SQL_CALC_FOUND_ROWS inmuebles.*, clientes.pnombre, clientes.snombre,
          clientes.papellido, clientes.sapellido FROM inmuebles
          INNER JOIN clientes ON inmuebles.idpropietario = clientes.id
          ORDER BY matricula
          LIMIT $inicio,$results";
  $sentencia = $conexion->prepare($sql);
  $sentencia->execute();
  return $sentencia->fetchAll();
}

function obtener_recibos($results, $conexion){
  $inicio = (pagina_actual() > 1) ? pagina_actual()*$results - $results : 0;
  $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM recibos
          INNER JOIN clientes ON recibos.idarrendatario = clientes.id
          INNER JOIN inmuebles ON recibos.idinmueble = inmuebles.id
          ORDER BY nrecibo
          LIMIT $inicio,$results";
  $sentencia = $conexion->prepare($sql);
  $sentencia->execute();
  return $sentencia->fetchAll();
}


function obtener_egresos($results, $conexion){
  $inicio = (pagina_actual() > 1) ? pagina_actual()*$results - $results : 0;
  $sql = "SELECT SQL_CALC_FOUND_ROWS inmuebles.id, inmuebles.idpropietario, recibos.nrecibo,
          recibos.valorpago, recibos.fecha, clientes.pnombre, clientes.snombre, clientes.papellido,
          clientes.sapellido, recibos.concepto FROM inmuebles
          INNER JOIN clientes ON inmuebles.idpropietario = clientes.id
          INNER JOIN recibos ON  inmuebles.id = recibos.idinmueble
          ORDER BY nrecibo
          LIMIT $inicio,$results";
  $sentencia = $conexion->prepare($sql);
  $sentencia->execute();
  return $sentencia->fetchAll();
}

function numero_paginas($rows, $conexion){
  $total_rows = $conexion->prepare('SELECT FOUND_ROWS() as total');
  $total_rows->execute();
  $total_rows = $total_rows->fetch()['total'];

  $numero_paginas = ceil($total_rows / $rows);
  return $numero_paginas;
}

function id_requerido($id){
	return (int)limpiarDatos($id);
}


function obtener_recibo_por_id($conexion, $id){

  $sql = "SELECT recibos.nrecibo, recibos.valorpago, recibos.ciudad, recibos.fecha,
                 clientes.pnombre, clientes.snombre, clientes.papellido, clientes.sapellido,
                 recibos.concepto, inmuebles.tipo, inmuebles.direccion, inmuebles.matricula, recibos.iperiodo,
                 recibos.fperiodo, usuarios.upnombre, usuarios.usnombre, usuarios.upapellido,
                 usuarios.usapellido FROM recibos
          INNER JOIN clientes ON recibos.idarrendatario = clientes.id
          INNER JOIN inmuebles ON recibos.idinmueble = inmuebles.id
          INNER JOIN usuarios ON recibos.idusuario = usuarios.id
          WHERE recibos.nrecibo = $id
          LIMIT 1";
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function obtener_recibo_x_id($conexion, $id){

  $sql = "SELECT recibos.nrecibo, recibos.valorpago, recibos.ciudad, recibos.fecha,
                 clientes.pnombre, clientes.snombre, clientes.papellido, clientes.sapellido,
                 recibos.concepto, inmuebles.tipo, inmuebles.direccion, recibos.iperiodo,
                 recibos.fperiodo, usuarios.upnombre, usuarios.usnombre, usuarios.upapellido,
                 usuarios.usapellido FROM recibos
          INNER JOIN clientes ON recibos.idarrendatario = clientes.id
          INNER JOIN inmuebles ON recibos.idinmueble = inmuebles.id
          INNER JOIN usuarios ON recibos.idusuario = usuarios.id
          WHERE recibos.id = $id
          LIMIT 1";
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function obtener_cliente_por_id($conexion, $id){

  $sql = "SELECT clientes.id, clientes.tipoid, clientes.identificacion, clientes.direccion,
                 clientes.pnombre, clientes.snombre, clientes.papellido, clientes.sapellido,
                 clientes.ciudad, clientes.telfijo, clientes.celular, clientes.notas,
                 usuarios.upnombre, usuarios.usnombre, usuarios.upapellido, usuarios.usapellido FROM clientes
          INNER JOIN usuarios ON clientes.idusuario = usuarios.id WHERE clientes.identificacion = $id LIMIT 1";
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}


function obtener_cliente_x_id($conexion, $id){

  $sql = "SELECT clientes.id, clientes.tipoid, clientes.identificacion, clientes.direccion,
                 clientes.pnombre, clientes.snombre, clientes.papellido, clientes.sapellido,
                 clientes.ciudad, clientes.telfijo, clientes.celular, clientes.notas,
                 usuarios.upnombre, usuarios.usnombre, usuarios.upapellido, usuarios.usapellido FROM clientes
          INNER JOIN usuarios ON clientes.idusuario = usuarios.id WHERE clientes.id = $id LIMIT 1";
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function obtener_inmueble_por_id($conexion, $id){

  $sql = "SELECT inmuebles.id, inmuebles.matricula, inmuebles.tipo, inmuebles.direccion,
                 inmuebles.ciudad, inmuebles.valor, inmuebles.descripcion,
                 clientes.pnombre, clientes.snombre, clientes.papellido, clientes.sapellido,
                 usuarios.upnombre, usuarios.usnombre, usuarios.upapellido, usuarios.usapellido FROM inmuebles
          INNER JOIN clientes ON inmuebles.idpropietario = clientes.id
          INNER JOIN usuarios ON inmuebles.idusuario = usuarios.id WHERE inmuebles.matricula = $id LIMIT 1";
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function obtener_inmueble_x_id($conexion, $id){

  $sql = "SELECT inmuebles.id, inmuebles.matricula, inmuebles.tipo, inmuebles.direccion,
                 inmuebles.ciudad, inmuebles.valor, inmuebles.descripcion,
                 clientes.pnombre, clientes.snombre, clientes.papellido, clientes.sapellido,
                 usuarios.upnombre, usuarios.usnombre, usuarios.upapellido, usuarios.usapellido FROM inmuebles
          INNER JOIN clientes ON inmuebles.idpropietario = clientes.id
          INNER JOIN usuarios ON inmuebles.idusuario = usuarios.id WHERE inmuebles.id = $id LIMIT 1";
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function obtener_egreso_por_id($conexion, $id){

  $sql = "SELECT recibos.nrecibo, recibos.valorpago, recibos.ciudad, recibos.fecha,
                 clientes.pnombre, clientes.snombre, clientes.papellido, clientes.sapellido,
                 recibos.concepto, inmuebles.tipo, inmuebles.direccion, inmuebles.matricula, recibos.iperiodo,
                 recibos.fperiodo, usuarios.upnombre, usuarios.usnombre, usuarios.upapellido,
                 usuarios.usapellido, inmuebles.idpropietario, inmuebles.id FROM inmuebles
          INNER JOIN clientes ON inmuebles.idpropietario = clientes.id
          INNER JOIN recibos ON inmuebles.id = recibos.idinmueble
          INNER JOIN usuarios ON inmuebles.idusuario = usuarios.id
          WHERE recibos.nrecibo = $id
          LIMIT 1";
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function obtener_cliente_por_identificacion($conexion, $identificacion){

  $sql = "SELECT * FROM clientes WHERE identificacion = $identificacion LIMIT 1";
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}


function obtener_inmueble_por_matricula($conexion, $matricula){

  $sql = "SELECT * FROM inmuebles WHERE matricula = '$matricula' LIMIT 1";
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}



function obtener_usuario_por_id($conexion, $login){

  $sql = "SELECT * FROM usuarios WHERE usuario = '$login' LIMIT 1";
  $resultado = $conexion->query($sql);
  $resultado = $resultado->fetchAll();
  return ($resultado) ? $resultado : false;
}

function obtener_total_clientes($conexion){

  $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM clientes ORDER BY pnombre';
  $resultado = $conexion->prepare($sql);
  $resultado->execute();

  $rows = $resultado->rowCount();

  $total = '';

  if($rows > 0){
    while($fila = $resultado->fetch()){
        $total.= '"' . $fila['pnombre'] .' '.$fila['snombre'].' '.$fila['papellido'].' '.$fila['sapellido']. '",';
    }
  return ($total) ? $total : false;
  }
}


function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = "$dia de " . $meses[$mes] . " del $year";
	return $fecha;
}
?>
