<?php
require_once("../config/autoload.php");

class ListaPrecio extends Conexion{
    private $nombre;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    function getPriceByProduct(int $productoId){
        $sql ="SELECT * FROM lista_precio where productoId=$productoId";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    function getPriceByProductAndTypeSale(int $productoId , int $tipo_ventaId){
        $sql ="SELECT * FROM lista_precio where productoId=$productoId AND tipo_ventaId=$tipo_ventaId";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
}