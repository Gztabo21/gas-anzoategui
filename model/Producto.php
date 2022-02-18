<?php
require_once("../config/autoload.php");

class Producto extends Conexion{
    private $nombre;
    private $precioUnitario;
    private $unidadMetrica;
    private $peso;
    private $isGranel;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion =  $this->conexion->connect();  
    }

    function insert(string $nombre, float $precioUnitario ,float $peso , string $unidadMetrica,int $isGranel ,array $listaPrecio){        
        $this->nombre = $nombre;
        $this->precioUnitario = $precioUnitario;
        $this->unidadMetrica = $unidadMetrica;
        $this->peso = $peso;
        $this->isGranel = $isGranel;
        $sql= "INSERT INTO producto( nombre, precioUnitario,unidadMetrica, peso,isGranel)VALUES (?,?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->nombre,$this->precioUnitario,$this->unidadMetrica,$this->peso,$this->isGranel);
        $exe = $insert->execute($arrData);
        $idLast = $this->conexion->lastInsertId();
        // insertar items
        $sqlItems = "INSERT INTO lista_precio (productoId,precio,tipo_ventaId) values(?,?,?)";
        $insertItems = $this->conexion->prepare($sqlItems);
 
        foreach ($listaPrecio as $key => $value) {
            $arr = array((int)$idLast,$value->{'precio'},$value->{'tipo_ventaId'});
            $exe = $insertItems->execute($arr);
        }
        return  array("message"=>"registro guardado correctamente", "code"=>200) ; 
    }
    public function update(int $id , string $nombre, float $precioUnitario ,float $peso , string $unidadMetrica , array $listaPrecio){        
        $this->nombre = $nombre;
        $this->precioUnitario = $precioUnitario;
        $this->unidadMetrica = $unidadMetrica;
        $this->peso = $peso;

        $sql= "UPDATE producto SET nombre=?,precioUnitario=?,unidadMetrica=?,peso=? where productoId=$id";
        $update = $this->conexion->prepare($sql);
        $arrData = array($this->nombre,$this->precioUnitario,$this->unidadMetrica,$this->peso,);
        $exe = $update->execute($arrData);
        // insertar items
        $sqlItems = "UPDATE lista_precio SET precio=? where productoId=$id and tipo_ventaId=?";
        $updateItems = $this->conexion->prepare($sqlItems);
 
        foreach ($listaPrecio as $key => $value) {
            $arr = array($value->{'precio'},$value->{'tipo_ventaId'});
            $exe = $updateItems->execute($arr);
        }
        return  array("message"=>"registro guardado correctamente", "code"=>200) ;

        return $exe;
    }

    public  function get(){
        $sql="SELECT * FROM producto";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    public  function findOne(int $id){
        $sql="SELECT * FROM producto where productoId=?";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute(array($id));
        $datos = $consulta->fetchall(PDO::FETCH_ASSOC);
        
        
        return $datos;
    }
    public  function delete(int $id){
        
        $sql="DELETE FROM producto where productoId=$id";
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute(array($id));
        return $del;
    }
}