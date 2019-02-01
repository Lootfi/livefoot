<?php
require_once('Routes.php');

// spl_autoload_register(function($class_name){
//     if(file_exists('includes/classes/'.$class_name. '.php')){
//         require 'includes/classes/'.$class_name.'.php';}
//     elseif(file_exists('includes/Controllers/'.$class_name. '.php')) {
//         require 'includes/Controllers/'.$class_name. '.php';}
// });

// function autoloader($class){
//     if(file_exists('./includes/classses/'.$class.'.php')){
//         require_once('./includes/classses/'.$class.'.php');
//     } elseif(file_exists('./includes/Controllers/'.$class.'.php')){
//         require_once('./includes/Controllers/'.$class.'.php');
//     }
// };
    
spl_autoload_register(function($class){
    if(file_exists('./includes/classses/'.$class.'.php')){
        require_once('./includes/classses/'.$class.'.php');
    } elseif(file_exists('./includes/Controllers/'.$class.'.php')){
        require_once('./includes/Controllers/'.$class.'.php');
    }
});


?>

