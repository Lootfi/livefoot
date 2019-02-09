<?php

class Index extends Controller{
    public static function userData($num){
        return Database::query('SELECT * FROM users')[$num];
    }
    public static function userExists($username){
        $x = Database::query('SELECT Username FROM users WHERE Username=:Username',array(':Username'=>$username)) ? 1: 0;
        return $x;
    }

    public static function emailExists($email){
        $x = Database::query('SELECT Email from users WHERE Email = :Email',array(':Email' => $email));
        return $x? 1 : 0;
    }

    public static function addUser($username,$email,$password){
        Database::query('INSERT INTO users VALUES (null,:Username,:Password,:Email)',array(':Username'=>$username,':Password'=> password_hash($password,PASSWORD_BCRYPT),':Email'=>$email));
    }

    public static function getuserID(){
        return Database::query('SELECT user_id from login_tokens WHERE token=:token',array(':token'=>sha1($_COOKIE['LFID'])));
    }

    public static function isLoggedin(){
        if(isset($_COOKIE['LFID'])){
            if(self::getuserID()){
                return true;
            }

        }
        return false;
    }
}

?>