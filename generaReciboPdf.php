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
  $id_recibo = id_requerido($_GET['id']);

  if (empty($id_recibo)) {
    header('Location: recibos.php');
  }

  $recibo = obtener_recibo_por_id($conexion, $id_recibo);

  if (!$recibo) {
    header('Location: recibos.php');
  }

  $recibo = $recibo[0];

  $valorLetras = new numeroALetras();
  $valorLetras = $valorLetras->aLetras($recibo['valorpago'],'COP');

  $pdf = new FPDF('L', 'mm', array(210,140));
  $pdf->AddPage();

  $pdf->SetTitle('Comprobante # ' . $recibo['nrecibo'] . ' - ' . $recibo['pnombre']. $recibo['papellido']);

  // Logo
  $pdf->Image('imagenes/g&g.jpg',20,9,30,0,'JPG');
  $pdf->Image('imagenes/g&g22.png',60,40,90,0,'PNG');
  // Encabezado
  $pdf->SetFont('Arial','B',16);
  $pdf->Cell(45);
  $pdf->Cell(100,21,'Comprobante de Pago',0,1,'C');
  // Contorno
  $pdf->SetFont('Arial','',14);
  $pdf->Cell(8);
  $pdf->Cell(21,9, 'Recibo #', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',14);
  $pdf->Cell(69,9, $recibo['nrecibo'], 0, 0, 'L');
  $pdf->SetFont('Arial','',14);
  $pdf->Cell(50,9, 'Valor: $', 0, 0, 'R');
  $pdf->SetFont('Arial','IU',14);
  $pdf->Cell(40,9, $recibo['valorpago'], 0, 1, 'L');
  // Contenido
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(8);
  $pdf->Cell(30,9, 'En la ciudad de', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(150,9, utf8_decode($recibo['ciudad']) . ', ' . fecha($recibo['fecha']), 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(8);
  $pdf->Cell(30,9, 'Recibi(mos) de ', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $nombre = $recibo['pnombre'].' '.$recibo['snombre'].' '.$recibo['papellido'].' '.$recibo['sapellido'];
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
  $pdf->Cell(94,9, 'Por concepto de '.$recibo['concepto'].' del inmueble tipo ', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(86,9, $recibo['tipo'], 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(23,9, 'Ubicado en', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(157,9, utf8_decode($recibo['direccion']), 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(59,9, 'Correspondiente al periodo del', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(121,9, fecha($recibo['iperiodo']) . ' al ' . fecha($recibo['fperiodo']), 0, 1, 'L');
  // Firma
  $pdf->SetY(110);
  $pdf->SetFont('Arial','IU',12);
  $usuario = $recibo['upnombre'].' '.$recibo['usnombre'].' '.$recibo['upapellido'].' '.$recibo['usapellido'];
  $usuario = utf8_decode($usuario);
  $pdf->Cell(180,7,$usuario , 0, 0, 'C');
  $pdf->SetY(117);
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(180,1, 'Firma autorizada y Sello', 0, 0, 'C');

  $pdf->SetDisplayMode('real');
  $pdf->Output('I', 'Comprobante # ' . $recibo['nrecibo'] . ' - ' . $recibo['pnombre'].' '.$recibo['papellido']);

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);



} else {
  header('Location: index.php');
}

?>
