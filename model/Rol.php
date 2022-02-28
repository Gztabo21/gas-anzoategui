<?php
require_once("../config/autoload.php");

class Rol extends Conexion{
    private $nombre;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    function getRol($id){
        $sql ="SELECT * FROM rol_usuario where rol_id=$id";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
}