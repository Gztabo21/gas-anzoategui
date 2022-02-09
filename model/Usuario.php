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

    public function insertUsuario(string $nombre_completo, string $contrasena, int $cedula, string $email ){

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
    
    public function update(int $id , string $nombre_completo, int $cedula, string $email  ){        
        $this->nombre_completo = $nombre_completo;
        $this->cedula = $cedula;
        $this->email = $email;

        $sql= "UPDATE usuario SET nombre_completo=?,cedula=?,email=? where usuario_id=$id";
        $update = $this->conexion->prepare($sql);
        $arrData = array($this->nombre_completo,$this->cedula,$this->email);
        $exe = $update->execute($arrData);
        return $exe;
    }

    public  function findOne(int $id){
        $sql="SELECT * FROM usuario where usuario_id=?";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute(array($id));
        $datos = $consulta->fetchall(PDO::FETCH_ASSOC);

        return $datos;
    }
    public  function delete(int $id){
        $sql="DELETE FROM usuario where usuario_id=$id";
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute(array($id));
        return $del;
    }
    
}