<?php
require_once("../config/autoload.php");

class Pedido extends Conexion{
    private $cliente_id;
    private $tipo_pago_id;
    private $item_ids;
    private $total;
    private $fecha;
    private $isGranel;
    private $tipo_ventaId;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion =  $this->conexion->connect();  
    }

    public function insertPedido(int $cliente_id,int $tipo_pago_id, int $total,array $items,int $isGranel,int $tipo_ventaId, string $refPAgo){
        $this->cliente_id = $cliente_id;
        $this->tipo_pago_id = $tipo_pago_id;
        $this->total =$total;
        $this->isGranel = $isGranel;
        $this->tipo_ventaId = $tipo_ventaId;
        $this->items_ids = $items;
        // inserta la cabecera del pedido. 
        $sql= "INSERT INTO pedido (cliente_id, tipo_pago_id, total,isGranel,tipo_ventaId,refPago) VALUES (?,?,?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->cliente_id,$this->tipo_pago_id,$this->total,$this->isGranel,$this->tipo_ventaId,$refPAgo);
        $exe = $insert->execute($arrData);
        $idLast = $this->conexion->lastInsertId(); // retorn ultimo id ingresado
        // insertar items
        $sqlItems = "INSERT INTO pedido_item (pedido_id,productoId,cantidad, precio_unitario, total) values(?,?,?,?,?)";
        $insertItems = $this->conexion->prepare($sqlItems);

        foreach ($items as $key => $value) {
            $arr = array((int)$idLast,$value->{'producto_id'},$value->{'cantidad'},$value->{'precio_unitario'},$value->{'total'});
            $exe = $insertItems->execute($arr);
        }
        return  array("message"=>"registro guardado correctamente", "code"=>200) ;//$idLast;
    }

    public  function getAll(){
        $sql="SELECT * FROM pedido";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    
    // public function update(int $id , string $nombre_completo, int $cedula, string $email  ){        
    //     $this->nombre_completo = $nombre_completo;
    //     $this->cedula = $cedula;
    //     $this->email = $email;

    //     $sql= "UPDATE usuario SET nombre_completo=?,cedula=?,email=? where usuario_id=$id";
    //     $update = $this->conexion->prepare($sql);
    //     $arrData = array($this->nombre_completo,$this->cedula,$this->email);
    //     $exe = $update->execute($arrData);
    //     return $exe;
    // }

    public  function findOne(int $id){
        $sql="SELECT * FROM pedido where pedido_id=?";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute(array($id));
        $datos = $consulta->fetchall(PDO::FETCH_ASSOC);

        return $datos;
    }

    public  function delete(int $id){
        $sql="DELETE FROM pedido where pedido_id=$id";
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute(array($id));
        return $del;
    }
    
    // SELECT pedido.pedido_id,pedido.fecha, pedido.total, pedido_item.productoId, pedido.isGranel, producto.nombre, producto.precioUnitario,lista_precio.precio FROM pedido INNER JOIN pedido_item ON pedido.pedido_id=pedido_item.pedido_id JOIN producto ON producto.productoId = pedido_item.productoId JOIN lista_precio ON lista_precio.productoId = producto.productoId WHERE pedido.cliente_id = 1 AND lista_precio.tipo_ventaId = 1 
    public  function byCliente(int $cliente_id , int $tipo_ventaId){
        // var_dump($tipo_ventaId);
        //$sql="SELECT * FROM pedido where cliente_id=? ";
        $sinCliente="SELECT pedido.pedido_id,pedido.fecha, pedido_item.total, pedido_item.productoId,pedido_item.cantidad,pedido_item.item_id, pedido.isGranel, cliente.nombre,cliente.apellido, producto.nombre as NombreProducto,lista_precio.precio FROM pedido INNER JOIN pedido_item ON pedido.pedido_id=pedido_item.pedido_id JOIN cliente ON cliente.cliente_id = pedido.cliente_id JOIN producto ON producto.productoId = pedido_item.productoId JOIN lista_precio ON lista_precio.productoId = producto.productoId WHERE pedido.tipo_ventaId = $tipo_ventaId AND lista_precio.tipo_ventaId = $tipo_ventaId";
        $conCliente="SELECT pedido.pedido_id,pedido.fecha, pedido_item.total, pedido_item.productoId,pedido_item.cantidad,pedido_item.item_id, pedido.isGranel, producto.nombre as NombreProducto,lista_precio.precio FROM pedido INNER JOIN pedido_item ON pedido.pedido_id=pedido_item.pedido_id JOIN producto ON producto.productoId = pedido_item.productoId JOIN lista_precio ON lista_precio.productoId = producto.productoId WHERE pedido.cliente_id = $cliente_id  AND pedido.tipo_ventaId = $tipo_ventaId AND lista_precio.tipo_ventaId = $tipo_ventaId";
        $sql= $cliente_id == 0 ? $sinCliente :$conCliente;
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        $datos = $consulta->fetchall(PDO::FETCH_ASSOC);

        return $datos;
    }

    public  function byDate(int $cliente_id, int $tipo_ventaId,string $desde, string $hasta){
        //las fecha deben estar dentro de  comillas.
        $rankByDateAndCliente ="SELECT pedido.pedido_id,pedido.fecha, pedido_item.total, pedido_item.productoId,pedido_item.cantidad,pedido_item.item_id, pedido.isGranel, producto.nombre as NombreProducto,lista_precio.precio FROM pedido INNER JOIN pedido_item ON pedido.pedido_id=pedido_item.pedido_id JOIN producto ON producto.productoId = pedido_item.productoId JOIN lista_precio ON lista_precio.productoId = producto.productoId WHERE pedido.cliente_id = $cliente_id AND pedido.tipo_ventaId = $tipo_ventaId AND lista_precio.tipo_ventaId = $tipo_ventaId AND pedido.fecha BETWEEN "." ' ".$desde." ' "." AND"." ' ".$hasta." ' ";
        $rankByDate ="SELECT pedido.pedido_id,pedido.fecha,pedido_item.total,pedido_item.productoId,pedido_item.cantidad,pedido_item.item_id, pedido.isGranel, producto.nombre as NombreProducto,lista_precio.precio, cliente.nombre,cliente.apellido FROM pedido INNER JOIN pedido_item ON pedido.pedido_id=pedido_item.pedido_id JOIN cliente ON cliente.cliente_id = pedido.cliente_id JOIN producto ON producto.productoId = pedido_item.productoId JOIN lista_precio ON lista_precio.productoId = producto.productoId WHERE pedido.tipo_ventaId = $tipo_ventaId AND lista_precio.tipo_ventaId = $tipo_ventaId AND pedido.fecha BETWEEN "." ' ".$desde." ' "." AND"." ' ".$hasta." ' ";
        $sql= $cliente_id == 0 ? $rankByDate : $rankByDateAndCliente;
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        $datos = $consulta->fetchall(PDO::FETCH_ASSOC);
        return $datos;
    }

}