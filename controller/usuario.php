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
 function post(){
    $email=$_POST['email'];
    $nombre_completo=$_POST['nombre_completo'];
    $contrasena=$_POST['contrasena'];  
    $cedula=$_POST['cedula'];
    $objUser = new Usuario();
 
    if(!$_POST['usuario_id']){
        $resp = $objUser->insertUsuario($nombre_completo,$contrasena,$cedula,$email);
       echo($resp);
    }else{
      $id = $_POST['usuario_id'];
      $resp = $objUser->update($id,$nombre_completo,$cedula,$email);
      echo($resp);
    } 
}
//  metodos GET
function get(){
    $objUser = new Usuario();
    $idUsuario = !empty($_GET['id']) ? $_GET['id']: 0;
    $idDeleteUsuario = !empty($_GET['DELETEID']) ? $_GET['DELETEID']: 0;
      if($idUsuario == 0 && $idDeleteUsuario == 0 ){
          $resp = $objUser->getUsuarios();
          http_response_code(200);
          echo json_encode(['data'=>$resp]);
      }
      if( $idUsuario > 0 ){
          $resp = $objUser->findOne($idUsuario);
          http_response_code(200);
          echo json_encode(['data'=>$resp]);
          
      }

      if($idDeleteUsuario > 0){
        $resp = $objUser->delete($idDeleteUsuario);
        http_response_code(200);
        echo json_encode(['data'=>$resp]);
      }
  }

?>