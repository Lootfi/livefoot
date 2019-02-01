<?php

class Database {
    // $base = mysqli_connect('localhost','root','');
        // mysqli_select_db($base,'livefoot');
    // $sql = 'SELECT userID,username,password,email FROM users WHERE userID = 1';
    // $req = mysqli_query($base,$sql) or die(mysqli_error($base));
    // $data = mysqli_fetch_array($req);
    // mysqli_free_result($req);
    // mysqli_close($base);
    // echo "Username: ".$data['username'];
    // echo '<br>';
    // echo "Password: " . $data['password'];
    // echo '<br>';
    // echo var_dump($data);
    public static $host = "localhost";
    public static $dbName = "livefoot";
    public static $username = "root";
    public static $password = ""; 
    
    private static function connect(){
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$username,self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;    
    }
    public static function query($query,$params = array()){
        $stm = self::connect()->prepare($query);
        $stm->execute($params);
        if(explode(' ',$query[0] == 'SELECT')){
            $data = $stm->fetchAll();
            return $data;
        }
    }



}


?>