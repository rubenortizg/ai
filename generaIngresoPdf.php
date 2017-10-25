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
  $id_ingreso = id_requerido($_GET['id']);

  if (empty($id_ingreso)) {
    header('Location: ingresos.php');
  }

  $ingreso = obtener_ingreso_por_id($conexion, $id_ingreso);

  if (!$ingreso) {
    header('Location: ingresos.php');
  }

  $ingreso = $ingreso[0];

  $valorLetras = new numeroALetras();
  $valorLetras = $valorLetras->aLetras($ingreso['valorpago'],'COP');

  $pdf = new FPDF('L', 'mm', array(210,140));
  $pdf->AddPage();

  $pdf->SetTitle('Ingreso No ' . $ingreso['ningreso'] . ' - ' . $ingreso['pnombre']. $ingreso['papellido']);

  // Logo
  $pdf->Image('imagenes/logo.png',20,9,30,0,'PNG');
  $pdf->Image('imagenes/logo22.png',60,40,90,0,'PNG');
  // Encabezado
  $pdf->SetFont('Arial','B',16);
  $pdf->Cell(45);
  $pdf->Cell(100,21,'Comprobante de Ingreso',0,1,'C');
  // Contorno
  $pdf->SetFont('Arial','',14);
  $pdf->Cell(8);
  $pdf->Cell(28,9, 'Ingreso No. ', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',14);
  $pdf->Cell(62,9, $ingreso['ningreso'], 0, 0, 'L');
  $pdf->SetFont('Arial','',14);
  $pdf->Cell(50,9, 'Valor: $', 0, 0, 'R');
  $pdf->SetFont('Arial','IU',14);
  $pdf->Cell(40,9, $ingreso['valorpago'], 0, 1, 'L');
  // Contenido
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(8);
  $pdf->Cell(30,9, 'En la ciudad de', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(150,9, utf8_decode($ingreso['ciudad']) . ', ' . fecha($ingreso['fecha']), 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(8);
  $pdf->Cell(30,9, 'Recibi(mos) de ', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $nombre = $ingreso['pnombre'].' '.$ingreso['snombre'].' '.$ingreso['papellido'].' '.$ingreso['sapellido'];
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
  $pdf->Cell(94,9, 'Por concepto de '.$ingreso['concepto'].' del inmueble tipo ', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(86,9, $ingreso['tipo'], 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(23,9, 'Ubicado en', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(157,9, utf8_decode($ingreso['direccion']), 0, 1, 'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(59,9, 'Correspondiente al periodo del', 0, 0, 'L');
  $pdf->SetFont('Arial','IU',12);
  $pdf->Cell(121,9, fecha($ingreso['iperiodo']) . ' al ' . fecha($ingreso['fperiodo']), 0, 1, 'L');
  // Firma
  $pdf->SetY(110);
  $pdf->SetFont('Arial','IU',12);
  $usuario = $ingreso['upnombre'].' '.$ingreso['usnombre'].' '.$ingreso['upapellido'].' '.$ingreso['usapellido'];
  $usuario = utf8_decode($usuario);
  $pdf->Cell(180,7,$usuario , 0, 0, 'C');
  $pdf->SetY(117);
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(180,1, 'Firma autorizada y Sello', 0, 0, 'C');

  $pdf->SetDisplayMode('real');
  $pdf->Output('I', 'Ingreso No ' . $ingreso['ningreso'] . ' - ' . $ingreso['pnombre'].' '.$ingreso['papellido']);

  $pagina = basename(__FILE__ );
  setcookie("pagina_anterior", $pagina, time()+60);



} else {
  header('Location: index.php');
}

?>
