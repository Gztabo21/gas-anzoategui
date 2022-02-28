<?php
 require_once("../config/autoload.php");

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
  case "GET":
    return getRol();
    break;
  default:
    return json_encode("error");
}


function getRol(){
    $id = $_GET['id'];
    $objRol =  new Rol();
    $datos = $objRol->getRol($id);
    echo json_encode(['data'=>$datos]);
    http_response_code(200);
}