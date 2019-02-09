<?php 

class Login extends Controller{
    public static function checkUsername($username){
        if(Database::query('SELECT Username FROM users WHERE Username = :Username',array(':Username'=> $username))) return 1;
        else return 0;
    }

    public static function checkPassword($username,$password){
        if(password_verify($password,Database::query('SELECT Password FROM users WHERE Username = :Username',array(':Username'=> $username))[0]['Password'])) return 1;
        else return 0;
    }
    public static function insertToken($username,$token){
        $userID = Database::query('SELECT userID FROM users WHERE Username=:Username ',array(':Username'=>$username))[0]['userID'];
        Database::query('INSERT INTO login_tokens VALUES (null,:token,:user_id)',array(':token'=>sha1($token),':user_id'=>$userID));
    }
    
}

?>