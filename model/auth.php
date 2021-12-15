<?php 
require_once("../config/autoload.php");

class auth extends Conexion{
    private $email;
    private $pw;
    private $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion =  $this->conexion->connect();
    }

    function login($email,$pw){
        $this->email = $email;
        $this->pw = md5($pw); ;
        $msg_incorrect = array("message"=>"correo o clave son incorrecto.", "code"=>403);
        $msg_correct = array("message"=>"Bienvenido al sistema", "code"=>200);
        $sql="SELECT * FROM usuario where email=?";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute(array($this->email));
        $datos = $consulta->fetchall(PDO::FETCH_ASSOC);
        $response = "";
        //forech
        //validar usuario
        if(isset($datos)&& !empty($datos) && sizeof($datos) > 0){
            foreach($datos as $usuario){
                $response = $usuario['contrasena'] == $this->pw ? $msg_correct : $msg_incorrect; 
            }
        }else{
            $response = $msg_incorrect;
        }
        return $response;
    }

}
?>