<?php
require_once( '_Globals.php' );
require_once("Routes.php");
    
spl_autoload_register(function($class){
    if(file_exists('./includes/classes/'.$class.'.php')){
        require_once('./includes/classes/'.$class.'.php');
    } else if(file_exists('./includes/Controllers/'.$class.'.php')){
        require_once('./includes/Controllers/'.$class.'.php');
    }
});



?>

