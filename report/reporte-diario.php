<?php
require('../assets/fpdf/fpdf.php');
// 190
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190,8,'NOTA DE ENTREGA',1,10,'C');
    $pdf->Output();
?>