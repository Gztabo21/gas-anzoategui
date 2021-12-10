<?php
 require_once("../config/autoload.php");

 $email=$_POST['email'];
 $nombre=$_POST['nombre'];
 $contrasena=$_POST['contrasena'];  
 $cedula=$_POST['cedula'];

 $objUser = new Usuario();
 $resp = $objUser->insertUsuario($nombre,$contrasena,$cedula,$email);

 $msg=$resp ?"okay":"erro al insertar datos";
 header("Location:../signin.php");
 die();
?>