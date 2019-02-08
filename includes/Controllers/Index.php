<?php

class Index extends Controller{
    public static function userData($num){
        return self::query('SELECT * FROM users')[$num];
    }
    public static function userExists($username){
        $x = self::query('SELECT Username FROM users WHERE Username=:Username',array(':Username'=>$username)) ? 1: 0;
        return $x;
    }
    public static function addUser($username,$email,$password){
        self::query('INSERT INTO users VALUES (null,:Username,:Password,:Email)',array(':Username'=>$username,':Password'=>$password,':Email'=>$email));
}
}

?>