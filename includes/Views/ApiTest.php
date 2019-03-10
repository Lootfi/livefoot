<?php
include "Header.php";
$api = new FBData();
$matches = $api->getCLmatches()->matches;
// $teams = $apigetCLteams()teams;
// $team = $apifindTeamById(1);
// $CL = $apifindCompetitionById('CL');
    // $match = $api->findMatchById(254907);
    // $match2 = $api->findMatchesByCompetitionAndMatchday(2003,1);
?>

<pre>
<?php
    //         $i = 0;
    // foreach(ApiTest::getMatchId() as $match){
    //             print_r((int)$match['matchid'].'<br>');
    //         $matchdata = $api->findMatchById((int)$match['matchid']);
    //        ApiTest::insertMoreMatchData(
    //             $matchdata->match->score->halfTime->homeTeam,
    //             $matchdata->match->score->penalties->homeTeam,
    //             $matchdata->match->score->halfTime->awayTeam,
    //             $matchdata->match->score->penalties->awayTeam
    //                 );
    // }
?>
</pre>


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
<h1>API TEST PAGE</h1>

<?php include "Footer.php" ?>