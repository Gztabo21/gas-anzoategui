<?php
require_once("../config/autoload.php");
$method = $_SERVER['REQUEST_METHOD'];

// verificar metodo.
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


//var_dump($post);
// var_dump($json);

function post(){
    $post = file_get_contents('php://input');
    $json =json_decode($post);
    $Pedido = new Pedido();
    if($json->{'pedido_id'} == 0 ){
        $resp = $Pedido->insertPedido($json->{'Cliente_id'},$json->{'tipo_pago'},$json->{'total'},$json->{'items'},$json->{'isGranel'},$json->{'tipoOrder'},$json->{'refPago'});
        http_response_code($resp['code']);
        echo json_encode(['data'=>$resp]);
    }else{
        $resp = $Pedido->update($json->{'pedido_id'},$json->{'Cliente_id'},$json->{'tipo_pago'},$json->{'total'},$json->{'items'},$json->{'isGranel'},$json->{'tipoOrder'},$json->{'refPago'});
        http_response_code($resp['code']);
        echo json_encode(['data'=>$resp]);
    }
    
    //echo('items'.$json->{'items'}.'cliente:'.$json->{'Cliente_id'}.'tipo_pago'.$json->{'tipo_pago'}.'total:'.$json->{'total'});
}

function get(){
    $id = !empty($_GET['id']) ? $_GET['id'] : 0 ;  
    $idDelete = !empty($_GET['DELETEID']) ? $_GET['DELETEID'] : 0 ;  
    $idAuthPed = !empty($_GET['AUTHPEDID']) ? $_GET['AUTHPEDID'] : 0 ;  
    $Pedido = new Pedido(); // conexion a la DDBB (BASE DE DATOS).
    // traer todos los datos.
    if($id == 0 && $idDelete == 0 ){
        $resp = $Pedido->getAll();
        echo json_encode(['data'=>$resp]);
    }
    // consultar por un pedido
    if($id>0){
        $resp = $Pedido->findOne($id);
        echo json_encode(['data'=>$resp]);
    }
    // eliminar pedido
    if($idDelete > 0){

        $resp = $Pedido->delete($idDelete);
        echo json_encode(['data'=>"delete"]);
    }
       // Autorizar pedido
    if($idAuthPed > 0){
        $resp = $Pedido->authPedido($idAuthPed);
        echo json_encode(['data'=>"delete"]);
    }
}