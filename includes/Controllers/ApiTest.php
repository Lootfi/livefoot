<?php

class ApiTest extends Controller {

    public static function insertMatch($mID,$homeid,$homeN,$homeS,$awayid,$awayN,$awayS,$matchDate){
        Database::query('INSERT INTO clmatches VALUES (:matchid,:homeid,:homename,:homescore,:awayid,:awayname,:awayscore,:matchdate)',
        array(':matchid'=>$mID,':homeid'=>$homeid,':homename'=> $homeN,':homescore'=>$homeS,':awayid'=>$awayid,':awayname'=>$awayN,':awayscore'=>$awayS,':matchdate'=>$matchDate));
    }
    public static function insertTeams($tid,$name,$crest,$website){
        Database::query('INSERT INTO clteams VALUES (:teamid,:teamname,:crest,:website)',
        array(':teamid'=>$tid,':teamname'=>$name,':crest'=>$crest,':website'=>$website));
    }

    public static function insertPlayer($tid,$pid,$name,$position,$bd,$nation,$shirt,$role){
        Database::query('INSERT INTO players VALUES (:teamuid,:teamid,:playerid,:playername,:position,:birthdate,:nationality,:shirtNumber,:playerRole)',
        array(':teamuid'=>null,':teamid'=>$tid,':playerid'=>$pid,':playername'=>$name,':position'=>$position,':birthdate'=>$bd,':nationality'=>$nation,':shirtNumber'=>$shirt,':playerRole'=>$role));
    }
    
    public static function insertMatchData($mid,$hh,$hp,$ah,$ap,$hw,$hl,$aw,$al,$venue,$stage,$group,$ref1,$ref2){
        Database::query('INSERT INTO matchesdatas VALUES (:matchid,:homehalf,:homepenal,:awayhalf,:awaypenal,:homewins,:homelosses,:awaywins,:awaylosses,:venue,:stage,:clgroup,:ref1,:ref2)',
        array(':matchid'=>$mid,':homehalf'=>$hh,':homepenal'=>$hp,':awayhalf'=>$ah,':awaypenal'=>$ap,':homewins'=>$hw,':homelosses'=>$hl,':awaywins'=>$aw,':awaylosses'=>$al,':venue'=>$venue,':stage'=>$stage,':clgroup'=>$group,':ref1'=>$ref1,':ref2'=>$ref2));
    
    }

    public static function insertMoreMatchData($hh,$hp,$ah,$ap){
        Database::query('INSERT INTO matchesdatas VALUES (:homehalf,:homepenal,:awayhalf,:awaypenal)',
        array(':homehalf'=>$hh,':homepenal'=>$hp,':awayhalf'=>$ah,':awaypenal'=>$ap));
    }

    public static function getMatchId(){
        return  Database::query('SELECT matchid FROM clmatches');
    }

    public static function getMatchIdFromData(){
        return  Database::query('SELECT matchid FROM matchesdatas');
    }

}