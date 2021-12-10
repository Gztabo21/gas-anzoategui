<?php

class Conexion{
    private $host ="localhost";
    private $username = "GUS";
    private $password = "124578";
    private $db ="gas_anzoategui";
    private $conect;


    function __construct() {
        $connectionString = "mysql:host=".$this->host.";dbname=".$this->db;
        try{
            $this->conect = new PDO($connectionString,$this->username,$this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            $this->conect ="ERROR DE CONEXION";
            echo "Connection failed: " . $e->getMessage();
          }
      }

    function connect(){
        return $this->conect;
    }
}
?> 