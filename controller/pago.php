<?php
 require_once("../config/autoload.php");

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
  case "GET":
    return getTipoPago();
    break;
  case "POST":
    echo "Your favorite color is blue!";
    break;
  case "PUT":
    echo "Your favorite color is green!";
    break;
  case "DELETE":
    echo "Your favorite color is green!";
    break;
  default:
    return json_encode("error");
}


function getTipoPago(){
    $objTipoPago =  new TipoPago();
    $datos = $objTipoPago->getTiposPagos();
    echo json_encode(['data'=>$datos]);
    http_response_code(200);
}