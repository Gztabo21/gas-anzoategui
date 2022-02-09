<?php
require_once("../config/autoload.php");

class TipoPago extends Conexion{
    private $nombre;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    function getTiposPagos(){
        $sql ="SELECT * FROM tipo_pago";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
}