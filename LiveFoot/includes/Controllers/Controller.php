<?php

class Controller {
    public static function CreateView($viewName){
        require_once('./includes/Views/'.$viewName.'.php');
    }
}

?>