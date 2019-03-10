<?php
    require_once 'vendor/mashape/unirest-php/src/Unirest.php';
    foreach(glob("vendor/mashape/unirest-php/src/Unirest") as $filename){
        require_once('$filename');
    }
class Unirrest{
    public static $headers = array('Accept' => 'application/json');
    public static function getResponse(){
        $response = Request::get("https://heisenbug-champions-league-live-scores-v1.p.rapidapi.com/api/championsleague/formations?team1=Manchester+United&team2=FC+Basel+1893",
        array(
          "X-RapidAPI-Key" => "deedfb1ebfmshe986db2f5bb0edep1502abjsn79e6f4d8f5e0")
      );
      return $response;
    }
}