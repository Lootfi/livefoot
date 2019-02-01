<?php

require_once("Routes.php");
    
spl_autoload_register(function($class){
    if(file_exists('./includes/classses/'.$class.'.php')){
        require_once('./includes/classses/'.$class.'.php');
    } else if(file_exists('./includes/Controllers/'.$class.'.php')){
        require_once('./includes/Controllers/'.$class.'.php');
    }
});



?>

