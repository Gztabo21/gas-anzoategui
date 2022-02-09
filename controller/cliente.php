<?php
 require_once("../config/autoload.php");
$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
  case "GET":
    return getClient();
    break;
  case "POST":
    return postClient();
    break;

  default:
    return json_encode("error");
}

 //$resp = $objClient->insertUsuario($nombre,$contrasena,$cedula,$email);
    //consultar clientes
    function getClient(){
        $objClient = new Cliente();
        $idUser = !empty($_GET['id'])? $_GET['id']: 0;
        $idUserDelete =  !empty($_GET['DELETEID'])? $_GET['DELETEID']: 0;
        // el id del usuario es igual 0 consulta todos
        if($idUser == 0){
            $resp = $objClient->get();
            http_response_code(200);
            echo json_encode(['data'=>$resp]);
        }
        // si el id del cliente  tiene valor diferente de cero busca al cliente solicitado
        if($idUser > 0 ){
            $resp = $objClient->findOne($idUser);
            echo json_encode(['data'=>$resp]);
            http_response_code(200);
        }
        // si el deleteid  tiene valor se procede a eliminar el cliente
        if($idUserDelete>0){
          $resp = $objClient->delete($idUserDelete);
          http_response_code(200);
          echo json_encode(['data'=>$resp]);
        }
    }

    function postClient(){
      $cliente_id = $_POST['cliente_id'] ? $_POST['cliente_id'] : 0 ;
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $cedula = $_POST['cedula'];
      $tipo_documento = $_POST['tipo_documento'];
      $telefono = $_POST['telefono'];
      $direccion = $_POST['direccion'];
      
      $objClient = new Cliente();
      // si id del cliente es igual a 0 se inserta nuevo cliente.
      if($cliente_id == 0){
      $resp = $objClient->insert($nombre,$apellido,$tipo_documento,$cedula,$direccion,$telefono);
      http_response_code(200);
      echo json_encode(['data'=>$resp]);
      }
      // si el cliente id tiene un valor asignado diferente de 0 se realiza actualizacion
      if($cliente_id > 0){
        $cliente_id;
        $resp = $objClient->update($cliente_id,$nombre,$apellido,$tipo_documento,$cedula,$direccion,$telefono);
        http_response_code(200);
        echo json_encode(['data'=>$resp]);
      }
    }
    
 //$msg=$resp ?"okay":"erro al insertar datos";
 //header("Location:../signin.php");
 //die();
?>