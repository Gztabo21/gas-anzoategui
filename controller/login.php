<?php
 require('../model/auth.php');
$email = isset($_POST['email']) ? $_POST['email']:'';
$pw = isset($_POST['contrasena'])?$_POST['contrasena']:'';


$verification = new auth;
$verification->login($email,$pw)

?>