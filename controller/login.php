<?php
 require('../model/auth.php');
$email = isset($_POST['email']) ? $_POST['email']:'';
$pw = isset($_POST['contrasena'])?$_POST['contrasena']:'';


$verification = new auth;
$data = $verification->login($email,$pw);
echo(json_encode($data));
http_response_code($data['code']);

?>