<?php
require_once("../config/autoload.php");

class Usuario extends Conexion{
    private $nombre_completo;
    private $contrasena;
    private $cedula;
    private $email;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion =  $this->conexion->connect();  
    }

    function insertUsuario(string $nombre_completo, string $contrasena, int $cedula, string $email ){

        $this->nombre_completo = $nombre_completo;
        $this->contrasena = md5($contrasena);
        $this->cedula =$cedula;
        $this->email = $email;
        $sql= "INSERT INTO usuario(email, contrasena, nombre_completo, cedula) VALUES (?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->email,$this->contrasena,$this->nombre_completo,$this->cedula);
        $exe = $insert->execute($arrData);
        $idLast = $this->conexion->lastInsertId();
        return $idLast;
    }

    public  function getUsuarios(){
        $sql="SELECT * FROM usuario";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
}