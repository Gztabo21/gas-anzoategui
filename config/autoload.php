<?php 
    function autoload($clase){
        //echo(realpath(dirname(__FILE__)));
        $url = $clase == 'Conexion'? $clase.'.php' : '../model/'.$clase.'.php' ;
        require_once($url);
    }
    spl_autoload_register("autoload");
?>