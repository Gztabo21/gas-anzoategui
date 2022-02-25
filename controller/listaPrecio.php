<?php
 require_once("../config/autoload.php");

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
  case "GET":
    return get();
    break;
  default:
    return json_encode("error");
}


function get(){ 
    $objListaPrecio =  new ListaPrecio();
    $productoId = $_GET['productoId'] ;
    $tipoVentaId = empty($_GET['tipoVentaId']) ? 0 :$_GET['tipoVentaId']  ;
   
    if($tipoVentaId == 0){
    $datos = $objListaPrecio->getPriceByProduct((int)$productoId);
    echo json_encode(['data'=>$datos]);
    http_response_code(200);
    }else{
      $datos = $objListaPrecio->getPriceByProductAndTypeSale($productoId,$tipoVentaId);
      echo json_encode(['data'=>$datos]);
      http_response_code(200);
    }
}