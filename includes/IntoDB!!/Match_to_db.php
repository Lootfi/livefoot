<?php
//match table needs more info and organisation
foreach($matches as $match) {
    if($match->stage == "ROUND_OF_16") {
    ApiTest::insertMatch(
        $match->id,
        $match->homeTeam->name,
        $match->score->fullTime->homeTeam ? $match->score->fullTime->homeTeam : null,
        $match->awayTeam->name,
        $match->score->fullTime->awayTeam ? $match->score->fullTime->awayTeam : null,
        substr($match->utcDate,0,10)
    );
}
}
?>


<?php
// match table needs more info and organisation
foreach($matches as $match) {
    if($match->stage == "ROUND_OF_16" && substr($match->utcDate,0,10) == "2019-03-06" ) {
    ApiTest::insertMatch(
        $match->id,
        $match->homeTeam->id,
        $match->homeTeam->name,
        $match->score->fullTime->homeTeam,
        $match->awayTeam->id,
        $match->awayTeam->name,
        $match->score->fullTime->awayTeam,
        substr($match->utcDate,0,10)
    );
}
}
?>


<?php

    //players to db
    $teamids = array(4,5,6,64,65,66,73,78,81,86,100,109,503,523,524,678);
    print_r($teamids);
    for($i=0; $i< sizeof($teamids);$i++){
     $teamid = $teamids[$i];
     $squad = $api->findTeamById($teamid)->squad;
     foreach($squad as $player){
         print_r($teamid . $player->name );
         ApiTest::insertPlayer($teamid,
                                $player->id,
                                $player->name,
                                $player->position,
                                $player->dateOfBirth,
                                $player->nationality,
                                $player->shirtNumber,
                                $player->role);
     }
    }
?>




<?php
        // match data into db   
            $exists = 0;
    foreach(ApiTest::getMatchId() as $match){
                print_r((int)$match['matchid'].'<br>');
                // var_dump($matchdatamatchreferees[0]);
                // var_dump($matchdata);
                foreach(ApiTest::getMatchIdFromData() as $matchdataid){
                    if((int)$matchdataid[0] == (int)$match['matchid']){
                        $exists = 1;
                        break;
                    }
                }
                if($exists == 1){
                    $exists = 0;
                    continue;
                }
            $matchdata = $api->findMatchById((int)$match['matchid']);

           ApiTest::insertMatchData(
                (int)$match['matchid'],
                $matchdata->match->score->halfTime->homeTeam,
                $matchdata->match->score->penalties->homeTeam,
                $matchdata->match->score->halfTime->awayTeam,
                $matchdata->match->score->penalties->awayTeam,
                $matchdata->head2head->homeTeam->wins,
                $matchdata->head2head->homeTeam->losses,
                $matchdata->head2head->awayTeam->wins,
                $matchdata->head2head->awayTeam->losses,
                $matchdata->match->venue,
                $matchdata->match->stage,
                $matchdata->match->group,
                $matchdata->match->referees[0] ? $matchdata->match->referees[0]->name : null,
                $matchdata->match->referees[1] ? $matchdata->match->referees[1]->name : null

        );
            

    }
?>

