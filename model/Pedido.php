<?php
require_once("../config/autoload.php");

class Pedido extends Conexion{
    private $cliente_id;
    private $tipo_pago_id;
    private $item_ids;
    private $total;
    private $fecha;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion =  $this->conexion->connect();  
    }

    public function insertPedido(int $cliente_id,int $tipo_pago_id, int $total,array $items){
        $this->cliente_id = $cliente_id;
        $this->tipo_pago_id = $tipo_pago_id;
        $this->total =$total;
        $this->items_ids = $items;
        // inserta la cabecera del pedido. 
        $sql= "INSERT INTO pedido (cliente_id, tipo_pago_id, total) VALUES (?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->cliente_id,$this->tipo_pago_id,$this->total);
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
    
}