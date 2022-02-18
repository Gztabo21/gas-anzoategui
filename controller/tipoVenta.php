<?php
 require_once("../config/autoload.php");

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
  case "GET":
    return getTipoVenta();
    break;
  default:
    return json_encode("error");
}


function getTipoVenta(){
    $boolean = $_GET['isGranel'] == "false" ? 0 : 1;
    $objTipoVenta =  new TipoVenta();
    $datos = $objTipoVenta->getTiposVenta($boolean);
    echo json_encode(['data'=>$datos]);
    http_response_code(200);
}