<?php
require_once("../config/autoload.php");

class Producto extends Conexion{
    private $nombre;
    private $precioUnitario;
    private $unidadMetrica;
    private $peso;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion =  $this->conexion->connect();  
    }

    function insert(string $nombre, float $precioUnitario ,float $peso , string $unidadMetrica ){        
        $this->nombre = $nombre;
        $this->precioUnitario = $precioUnitario;
        $this->unidadMetrica = $unidadMetrica;
        $this->peso = $peso;
        $sql= "INSERT INTO producto( nombre, precioUnitario,unidadMetrica, peso)VALUES (?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->nombre,$this->precioUnitario,$this->unidadMetrica,$this->peso);
        $exe = $insert->execute($arrData);
        $idLast = $this->conexion->lastInsertId();
        return $idLast;
    }
    public function update(int $id , string $nombre, float $precioUnitario ,float $peso , string $unidadMetrica ){        
        $this->nombre = $nombre;
        $this->precioUnitario = $precioUnitario;
        $this->unidadMetrica = $unidadMetrica;
        $this->peso = $peso;

        $sql= "UPDATE producto SET nombre=?,precioUnitario=?,unidadMetrica=?,peso=? where productoId=$id";
        $update = $this->conexion->prepare($sql);
        $arrData = array($this->nombre,$this->precioUnitario,$this->unidadMetrica,$this->peso,);
        $exe = $update->execute($arrData);
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