<?php

class Index extends Controller{
    public static function test(){
        print_r(self::query('SELECT userID,username,password,email FROM users WHERE userID = 1'));
    }
}

?>