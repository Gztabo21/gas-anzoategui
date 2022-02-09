<?php
 require_once("../config/autoload.php");

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
  case "GET":
    return getProducto();
    break;
  case "POST":
    return add();
    break;
  default:
    return json_encode("error");
}
    function add(){

        $nombre = $_POST['nombre'];
        $peso = $_POST['peso'];
        $unidadMetrica = $_POST['unidadMetrica'];
        $precioUnitario = $_POST['precioUnitario'];
        
        $objProduct = new Producto();
        if(!$_POST['productoId']){
        $resp = $objProduct->insert($nombre,$precioUnitario,$peso,$unidadMetrica);
        echo($resp);
        }else{
          $id = $_POST['productoId'];
          $resp = $objProduct->update($id,$nombre,$precioUnitario,$peso,$unidadMetrica);
          echo($resp);
        }

     
    }
    function getProducto(){
      $objProduct = new Producto();
      $idProduct = !empty($_GET['id']) ? $_GET['id']: 0;
      $idDeleteProduct = !empty($_GET['DELETEID']) ? $_GET['DELETEID']: 0;
        if($idProduct == 0 && $idDeleteProduct == 0 ){
            $resp = $objProduct->get();
            http_response_code(200);
            echo json_encode(['data'=>$resp]);
        }
        if( $idProduct > 0 ){
            $resp = $objProduct->findOne($idProduct);
            http_response_code(200);
            echo json_encode(['data'=>$resp]);
            
        }

        if($idDeleteProduct > 0){
          $resp = $objProduct->delete($idDeleteProduct);
          echo($resp);
        }
    }
   
 //$resp = $objUser->insertUsuario($nombre,$contrasena,$cedula,$email);
    //consultar clientes
    // function getClient(){
    //     $objUser = new Cliente();
    //     $idUser = count($_GET) > 0 ? $_GET['id']: 0;
    //     if($idUser == 0){
    //         $resp = $objUser->get();
    //         http_response_code(200);
    //         echo json_encode(['data'=>$resp]);
    //     }else{
    //         $resp = $objUser->findOne($idUser);
    //         echo json_encode(['data'=>$resp]);
    //         http_response_code(200);
    //     }
    // }
    
 //$msg=$resp ?"okay":"erro al insertar datos";
 //header("Location:../signin.php");
 //die();
?>