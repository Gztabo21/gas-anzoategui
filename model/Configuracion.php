<?php
require_once("../config/autoload.php");

class Configuracion extends Conexion{
    private $nombre;
    private $conexion;
    private $respaldo;

    function __construct(){
        $this->conexion = new Conexion();
        $this->respaldo = $this->conexion;
        $this->conexion =  $this->conexion->connect();  
    }

    function respaldo(){
        return $this->respaldo->respaldo();
    }


}