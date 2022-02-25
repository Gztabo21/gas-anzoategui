<?php
 require_once("../config/autoload.php");
$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
  case "GET":
    return get();
    break;
  case "POST":
    return post();
    break;

  default:
    return json_encode("error");
}


function get(){
    $objConfig = new Configuracion();
    $resp = $objConfig->respaldo();
    echo json_encode(['file' => $resp]);
}