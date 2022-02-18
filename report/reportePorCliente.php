<?php
require('../assets/fpdf/fpdf.php');
require_once("../config/autoload.php");
date_default_timezone_set('UTC');
// $post = file_get_contents('php://input');
// $json =json_decode($post);

$cliente_id = !empty($_POST['select-client']) ? $_POST['select-client'] : 0;
$isGranel = !empty($_POST['granel-informe']) ? 1 : 0 ;
$tipoVentainforme = $_POST['select-tipoVentainforme'];
$desde = !empty($_POST['desde']) ? $_POST['desde'] : "vacio" ;
$hasta = !empty($_POST['hasta']) ?$_POST['hasta'] : "vacio";
$total = 0;

$Pedido = new Pedido();
$Cliente = new Cliente();
$TipoVenta = new TipoVenta();
$nombreCliente = "Todos";
$resp = $Pedido->getAll();
$tventa = $TipoVenta->getTipoDeVenta($tipoVentainforme);

// var_dump($tventa);
if($cliente_id !== "#"){
    $resp = $Pedido->byCliente((int)$cliente_id,$tipoVentainforme);
    $DataCliente = $Cliente->findOne($cliente_id);
    $nombreCliente = $DataCliente[0]['nombre'].' '.$DataCliente[0]['apellido'];

//    var_dump($resp);
}



// 190
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    $pdf->Header();
    $pdf->ln();
    // $pdf->ImprovedTable($header,$data);
    $pdf->Cell(190,8,'Reporte por Cliente',1,10,'C');
    $pdf->ln();
    $pdf->Cell(38,7,'Cliente: '.strtoupper($nombreCliente),0,0,'C');
    $pdf->Cell(38,7,'','',0,'C');
    $pdf->Cell(38,7,'','',0,'C');
    $pdf->Cell(38,7,'FECHA:'.''.date('M d  Y  ').'','B',0,'C');
    $pdf->Cell(38,7,'','',0,'C');
    $pdf->ln();
   
    $pdf->ln();
    if( $desde !== "vacio" && $hasta !== "vacio" ){

       
        $Desde = new DateTime($desde);
        $Hasta = new DateTime($hasta);
        $pdf->Cell(38,7,'Desde:'.''.date_format($Desde, 'd-m-Y ').'',0,0,'C');
        $pdf->Cell(38,7,' ',0,0,'C');
        $pdf->Cell(38,7,'Hasta'.date_format($Hasta , 'd-m-Y '),0,0,'C');
        $pdf->ln();
        }
    $pdf->ln();
    $pdf->Cell(38,7,'Tipo de Venta: '.strtoupper($tventa[0]['nombre']),0,0,'C');
    $pdf->Cell(38,7,'',0,0,'C');
    $pdf->ln();
    // cabecera de la tablas
    $pdf->Cell(38,7,'Fecha',1,0,'C');
    $pdf->Cell(28,7,'Numero Venta',1,0,'C');
    $pdf->Cell(38,7,'productos',1,0,'C');
    $pdf->Cell(28,7,'Cantidad',1,0,'C');
    $pdf->Cell(20,7,'Precio Unit.',1,0,'C');
    $pdf->Cell(38,7,'Total',1,0,'C');
    $pdf->ln();
    
    // contenido
 
    
    foreach($resp  as $key => $value)
    {
        //var_dump($value);
        $pdf->Cell(38,6,$value['fecha'],1);
        $pdf->Cell(28,6,$value['pedido_id'],1);
        $pdf->Cell(38,6,$value['NombreProducto'],1,0,"C");
        $pdf->Cell(28,6,$value['cantidad'],1,0,'R');
        $pdf->Cell(20,6,$value['precio'],1,0,'R');
        $pdf->Cell(38,6,number_format($value['total']),1,0,'C');
        $total= $value['total'] + $total;
        $pdf->Ln();
    }
    $pdf->Cell(38,6,"",0);
        $pdf->Cell(28,6,"",0);
        $pdf->Cell(38,6,"",0);
        $pdf->Cell(28,6,"",0,0,'R');
        $pdf->Cell(20,6,"",0,0,'R');
        $pdf->Cell(38,6,"Total: ".number_format($total),1,0,'C');
    $pdf->Output();
?>