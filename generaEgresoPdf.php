<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';
  require 'numeroLetras.php';
  require 'fpdf.php';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $acentos = charset($conexion);
  $id_egreso = id_requerido($_GET['id']);

  if (empty($id_egreso)) {
    header('Location: egresos.php');
  }

  $egreso = obtener_egreso_por_id($conexion, $id_egreso);

  if (!$egreso) {
    header('Location: egresos.php');
  }

  $egreso = $egreso[0];

  $valorLetras = new numeroALetras();
  $valorLetras = $valorLetras->aLetras($egreso['valorpago'],'COP');

  $pdf = new FPDF('L', 'mm', array(210,140));
  $pdf->AddPage();

  $pdf->SetTitle('Egreso No ' . $egreso['negreso'] . ' - ' . $egreso['pnombre']. $egreso['papellido']);

  // Logo
  $pdf->Image('imagenes/logo.png',20,9,30,0,'PNG');
  $pdf->Image('imagenes/logo22.png',60,40,90,0,'PNG');
  // Encabezado
  $pdf->SetFont('Arial','B',16);
  $pdf->Cell(45);
  $pdf->Cell(100,21,'Comprobante de Egreso',0,1,'C');
  // Contorno
  $pdf->SetFont('Arial','',14);
  $pdf->Cell(8);
  $pdf->Cell(28,9, 'Egreso No. ', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',14);
  $pdf->Cell(62,9, $egreso['negreso'], 0, 0, 'L');
  $pdf->SetFont('Arial','',14);
  $pdf->Cell(50,9, 'Valor: $', 0, 0, 'R');
  $pdf->SetFont('Arial','IU',14);
  $pdf->Cell(40,9, $egreso['valorpago'], 0, 1, 'L');
  // Contenido
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(8);
  $pdf->Cell(30,9, 'En la ciudad de', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(150,9, utf8_decode($egreso['ciudad']) . ', ' . fecha($egreso['fecha']), 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(8);
  $pdf->Cell(30,9, 'Pagamos a:', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $nombre = $egreso['pnombre'].' '.$egreso['snombre'].' '.$egreso['papellido'].' '.$egreso['sapellido'];
  $nombre = utf8_decode($nombre);
  $pdf->Cell(150,9, $nombre, 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(8);
  $pdf->Cell(23,9, 'La suma de ', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->SetLeftMargin(18);
  $pdf->Write(9, $valorLetras);
  $pdf->Cell(1,9, '', 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(94,9, 'Por concepto de '.$egreso['concepto'].' del inmueble tipo ', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(86,9, $egreso['tipo'], 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(23,9, 'Ubicado en', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(157,9, utf8_decode($egreso['direccion']), 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(59,9, 'Correspondiente al periodo del', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(121,9, fecha($egreso['iperiodo']) . ' al ' . fecha($egreso['fperiodo']), 0, 1, 'L');
  // Firma
  $pdf->SetY(110);
  $pdf->SetFont('Arial','IU',12);
  $usuario = $egreso['upnombre'].' '.$egreso['usnombre'].' '.$egreso['upapellido'].' '.$egreso['usapellido'];
  $usuario = utf8_decode($usuario);
  $pdf->Cell(180,7,$usuario , 0, 0, 'C');
  $pdf->SetY(117);
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(180,1, 'Firma autorizada y Sello', 0, 0, 'C');

  $pdf->SetDisplayMode('real');
  $pdf->Output('I', 'Comprobante No ' . $egreso['negreso'] . ' - ' . $egreso['pnombre'].' '.$egreso['papellido']);

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);



} else {
  header('Location: index.php');
}

?>
