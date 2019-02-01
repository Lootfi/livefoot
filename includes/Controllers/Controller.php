<?php
include "./includes/classes/Database.php";
class Controller extends Database {

    public static function CreateView($viewName){
        require_once('./includes/Views/'.$viewName.'.php');
    }
}

?>