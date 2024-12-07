<?php




require('/modules/FPDF/fpdf.php');


// Crear una instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Agregar contenido al PDF
$pdf->Cell(40, 10, 'SI SIRVE');

// Guardar el PDF y forzar la descarga en el navegador
$pdf->Output('D', 'memo.pdf'); // 'D' para descargar directamente


// // Recibir datos del formulario
// $user = $_POST['user'];
// $userJob = $_POST['userJob'];
// $asunto = $_POST['textInput'];
// $cantidad = $_POST['quantityInput'];
// $marcas = $_POST['marca'];
// $tipos = $_POST['tipo'];
// $modelos = $_POST['modelo'];
// $series = $_POST['serie'];

// // Guardar la firma en un archivo temporal
// if (isset($_FILES['signatureImage'])) {
//     $signature = $_FILES['signatureImage'];
//     $signatureFilename = 'firma_temp.png';
//     move_uploaded_file($signature['tmp_name'], $signatureFilename);
// }

// // Crear el PDF
// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial', 'B', 12);

// $pdf->Cell(0, 10, 'MEMO', 0, 1, 'C');
// $pdf->Ln(10);

// $pdf->SetFont('Arial', '', 12);
// $pdf->Cell(50, 10, 'Para: ', 0, 0);
// $pdf->Cell(50, 10, $user, 0, 1);

// $pdf->Cell(50, 10, 'Puesto: ', 0, 0);
// $pdf->Cell(50, 10, $userJob, 0, 1);

// $pdf->Cell(50, 10, 'Asunto: ', 0, 0);
// $pdf->Cell(50, 10, $asunto, 0, 1);

// $pdf->Ln(10);
// $pdf->SetFont('Arial', 'B', 12);
// $pdf->Cell(40, 10, 'Marca', 1);
// $pdf->Cell(40, 10, 'Tipo', 1);
// $pdf->Cell(40, 10, 'Modelo', 1);
// $pdf->Cell(40, 10, 'Numero de serie', 1);
// $pdf->Ln();

// for ($i = 0; $i < $cantidad; $i++) {
//     $pdf->SetFont('Arial', '', 12);
//     $pdf->Cell(40, 10, $marcas[$i], 1);
//     $pdf->Cell(40, 10, $tipos[$i], 1);
//     $pdf->Cell(40, 10, $modelos[$i], 1);
//     $pdf->Cell(40, 10, $series[$i], 1);
//     $pdf->Ln();
// }

// if (file_exists($signatureFilename)) {
//     $pdf->Image($signatureFilename, 150, 250, 40, 30); // Agregar la firma en la parte inferior del PDF
// }

// // Guardar el PDF
// $pdfFilename = 'memo_' . time() . '.pdf';
// $pdf->Output('F', $pdfFilename);

// // Devolver la URL del PDF para su descarga
// echo $pdfFilename;


