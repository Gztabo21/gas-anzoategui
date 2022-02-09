<?php
require_once("../config/autoload.php");

class Cliente extends Conexion{
    private $nombre;
    private $apellido;
    private $cedula;
    private $tipo_documento;
    private $direccion;
    private $telefono;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion =  $this->conexion->connect();  
    }

    function insert(string $nombre, string $apellido , string $tipo_documento, int $cedula ,string $direccion, string $telefono ){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipo_documento = $tipo_documento;
        $this->cedula = $cedula;
        $this->direccion =$direccion;
        $this->telefono = $telefono;
        $sql= "INSERT INTO cliente( nombre, apellido,tipo_documento, cedula, direccion, telefono)VALUES (?,?,?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->nombre,$this->apellido,$this->tipo_documento,$this->cedula,$this->direccion,$this->telefono);
        $exe = $insert->execute($arrData);
        $idLast = $this->conexion->lastInsertId();
        return $idLast;
    }

    public  function get(){
        $sql="SELECT * FROM cliente";
        $exe = $this->conexion->query($sql);
        $request = $exe->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public  function findOne(int $id){
        $sql="SELECT * FROM cliente where cliente_id=?";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute(array($id));
        $datos = $consulta->fetchall(PDO::FETCH_ASSOC);       
        return $datos;
    }

    public function update(int $id ,string $nombre, string $apellido , string $tipo_documento, int $cedula ,string $direccion, string $telefono ){        
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->tipo_documento = $tipo_documento;
        $this->direccion = $direccion;
        $this->telefono = $telefono;

        $sql= "UPDATE cliente SET nombre=?,apellido=?,tipo_documento=?,cedula=?,direccion=?,telefono=? where cliente_id=$id";
        $update = $this->conexion->prepare($sql);
        $arrData = array($this->nombre,$this->apellido,$this->tipo_documento,$this->cedula,$this->direccion,$this->telefono);
        $exe = $update->execute($arrData);
        return $exe;
    }

    public  function delete(int $id){
        $sql="DELETE FROM cliente where cliente_id=$id";
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute(array($id));
        return $del;
    }
}