<?php
require_once("../config/autoload.php");

class TipoVenta extends Conexion{
    private $nombre;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    function getTiposVenta( int $isGranel){
        $sql ="SELECT * FROM tipo_venta where granel=$isGranel ";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    function getTipoDeVenta( int $id){
        $sql ="SELECT * FROM tipo_venta where tipo_venta_id=$id ";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
}