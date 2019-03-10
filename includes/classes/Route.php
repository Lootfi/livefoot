<?php

class Route {

    public static $validRoutes = array();
//set up another function to get sub routes for team pages
    public static function set($route,$function){
        self::$validRoutes[] = $route;
        if($_SERVER['REQUEST_URI'] == BASEDIR.$route){
            $function();
        }
        }
}

?>