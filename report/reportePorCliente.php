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
$Desde =  $desde =="vacio"? "vacio": new DateTime($desde);
$Hasta =  $hasta =="vacio"? "vacio":new DateTime($hasta);

$Pedido = new Pedido();
$Cliente = new Cliente();
$TipoVenta = new TipoVenta();
$nombreCliente = "Todos";
$resp = [];
$tventa = $TipoVenta->getTipoDeVenta($tipoVentainforme);

// cliente 
if($cliente_id !== "#"){
    $resp = $Pedido->byCliente((int)$cliente_id,$tipoVentainforme);
    $DataCliente = $Cliente->findOne($cliente_id);
    $nombreCliente = $DataCliente[0]['nombre'].' '.$DataCliente[0]['apellido'];
}
// sin cliente
if($cliente_id == "#"){
    $resp = $Pedido->byCliente(0,$tipoVentainforme);
}

// por rango de fecha. 
if( $desde !== "vacio" && $hasta !== "vacio" ){
    $cliente_id == "#" ? 0 :$cliente_id;
    $resp = $Pedido->byDate((int)$cliente_id,$tipoVentainforme,$desde,$hasta);
    
}



// 190
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    // header
    $pdf->ln();
    //var_dump(getcwd());// nombre de la ruta actual
    //var_dump(dirname(__DIR__)); // nombre de la ruta actual __filename__ ; __DIR__ carpeta donde se encuentra el proyecto
    // basename(getcwd()); se usa para el nombre actual de la carpet o ruta 
    $pdf->Image(dirname(__DIR__)."/assets/images/logo/logo.png",10,12,30,0,'');
    $pdf->Cell(190,8,' GAS ANZOATEGUI ',0,10,'C');
    $pdf->ln();
    $pdf->ln();
    $pdf->ln();
    // $pdf->ImprovedTable($header,$data);

    $pdf->Cell(190,8,'Reporte de Ventas',1,10,'C');
    $pdf->ln();
    $pdf->Cell(38,7,'Cliente: '.strtoupper($nombreCliente),0,0,'C');
    $pdf->Cell(38,7,'','',0,'C');
    $pdf->Cell(38,7,'','',0,'C');
    $pdf->Cell(38,7,'FECHA: '.''.date('M d  Y  ').'','B',0,'C');
    $pdf->Cell(38,7,'','',0,'C');
    $pdf->ln();
   
    $pdf->ln();
    // columnas de fechas
    if( $desde !== "vacio" && $hasta !== "vacio" ){        
        $pdf->Cell(38,7,'Desde:'.''.date_format($Desde, 'd-m-Y ').'',0,0,'C');
        $pdf->Cell(38,7,' ',0,0,'C');
        $pdf->Cell(38,7,'Hasta'.date_format($Hasta , 'd-m-Y '),0,0,'C');
        $pdf->ln();
        }
    // fin de columna de fechas
    $pdf->ln();
    $pdf->Cell(38,7,'Tipo de Venta: '.strtoupper($tventa[0]['nombre']),0,0,'C');
    $pdf->Cell(38,7,'',0,0,'C');
    $pdf->ln();
    $pdf->ln();
// tablas de un cliente especifico.
    if($cliente_id !== "#"){
        // cabecera de la tablas
        $pdf->Cell(28,7,'Fecha',1,0,'C');
        $pdf->Cell(28,7,'Numero Venta',1,0,'C');
        $pdf->Cell(48,7,'productos',1,0,'C');
        $pdf->Cell(28,7,'Cantidad',1,0,'C');
        $pdf->Cell(20,7,'Precio Unit.',1,0,'C');
        $pdf->Cell(38,7,'Total',1,0,'C');
        $pdf->ln();
        // contenido de tabla
        foreach($resp  as $key => $value)
        {
            $fechaReport = new DateTime($value['fecha']);
            $pdf->Cell(28,6,date_format($fechaReport, 'd-m-Y '),1,0,"C");
            $pdf->Cell(28,6,$value['pedido_id'],1,0,"C");
            $pdf->Cell(48,6,$value['NombreProducto'],1,0,"C");
            $pdf->Cell(28,6,$value['cantidad'],1,0,'C');
            $pdf->Cell(20,6,"Bs. ".$value['precio'],1,0,'C');
            $pdf->Cell(38,6,number_format($value['total']),1,0,'C');
            $total= $value['total'] + $total;
            $pdf->Ln();
        }
        // total
            $pdf->Cell(28,6,"",0);
            $pdf->Cell(28,6,"",0);
            $pdf->Cell(48,6,"",0);
            $pdf->Cell(28,6,"",0,0,'R');
            $pdf->Cell(20,6,"",0,0,'R');
            $pdf->Cell(38,6,"Total: "."Bs. ".number_format($total),1,0,'C');
        // total
    }
//  fin tablas de un cliente especifico.

//  tablas de todos los clientes
    if($cliente_id == "#"){
        // cabecera de la tablas
            $pdf->Cell(28,7,'Fecha',1,0,'C');
            $pdf->Cell(28,7,'Cliente',1,0,'C');
            $pdf->Cell(28,7,'Numero Venta',1,0,'C');
            $pdf->Cell(28,7,'productos',1,0,'C');
            $pdf->Cell(28,7,'Cantidad',1,0,'C');
            $pdf->Cell(20,7,'Precio Unit.',1,0,'C');
            $pdf->Cell(28,7,'Total',1,0,'C');
            $pdf->ln();
            // contenido de tabla
        foreach($resp  as $key => $value)
        {
            $fechaReport = new DateTime($value['fecha']);
            $pdf->Cell(28,6,date_format($fechaReport, 'd-m-Y '),1,0,"C");
            $pdf->Cell(28,6,$value['nombre']."".$value['apellido'],1,0,"C");
            $pdf->Cell(28,6,$value['pedido_id'],1,0,"C");
            $pdf->Cell(28,6,$value['NombreProducto'],1,0,"C");
            $pdf->Cell(28,6,$value['cantidad'],1,0,'C');
            $pdf->Cell(20,6,$value['precio'],1,0,'C');
            $pdf->Cell(28,6,"Bs. ".number_format($value['total']),1,0,'C');
            $total= $value['total'] + $total;
            $pdf->Ln();
        }
         // total
            $pdf->Cell(28,6,"",0);
            $pdf->Cell(28,6,"",0);
            $pdf->Cell(28,6,"",0);
            $pdf->Cell(28,6,"",0);
            $pdf->Cell(28,6,"",0,0,'R');
            $pdf->Cell(20,6,"",0,0,'R');
            $pdf->Cell(28,6,"Total: "."Bs. ".number_format($total),1,0,'C');
        // total
    }
    // fin  tablas de todos los clientes
    // fin de contenido.
   
    $pdf->Output();
?>