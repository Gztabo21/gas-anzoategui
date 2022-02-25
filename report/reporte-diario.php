<?php
require('../assets/fpdf/fpdf.php');
require_once("../config/autoload.php");

class PDF extends FPDF {
        // Una tabla más completa 
    function Header()
   {

       $this->Image('./assets/images/logo/logo.png',10,8,33);

      $this->SetFont('Arial','B',12);

      $this->Cell(30,10,'Cabecera',1,0,'C');

   }

};

// 190
    $pdf = new FPDF();
    $header = array('País', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
    $data = array('Austria','Vienna','83859','8075');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    $pdf->Header();
    $pdf->ln();
    // $pdf->ImprovedTable($header,$data);
    $pdf->Cell(190,8,'NOTA DE ENTREGA',1,10,'C');
    $pdf->ln();
    $pdf->Cell(38,7,'Nombre:_____________________',0,0,'C');
    $pdf->Cell(38,7,'','B',0,'C');
    $pdf->ln();
    // cabecera de la tablas
    $pdf->Cell(38,7,'capacidad',1,0,'C');
    $pdf->Cell(38,7,'cantidad',1,0,'C');
    $pdf->Cell(38,7,'Servicio',1,0,'C');
    $pdf->Cell(38,7,'precio Unitario',1,0,'C');
    $pdf->Cell(38,7,'Total',1,0,'C');
    $pdf->ln();
    
    // contenido
    $Pedido = new Pedido();
    $resp = $Pedido->getAll();
    
    foreach($resp  as $key => $value)
    {
        //var_dump($value);
        $pdf->Cell(38,6,$value['cliente_id'],1);
        $pdf->Cell(38,6,$value['pedido_id'],1);
        $pdf->Cell(38,6,$value['pedido_id'],1);
        $pdf->Cell(38,6,number_format($value['total']),1,0,'R');
        $pdf->Cell(38,6,number_format($value['total']),1,0,'R');
        $pdf->Ln();
    }
    $pdf->Output();
?>