<?php require_once "FootballData.php"; 
$api = new FootballData();
?>

<?=var_dump($api->getCLteams()->teams[0]);?>

<h1>Select Favorite Team, for Registration form</h1>
<div>
<?php $i=0; foreach($api->getCLteams()->teams as $team) { ?>
    <?php if($i == 10) break; ?>
    <p><?=$team->name?></p>
    <img src="<?=$team->crestUrl?>" alt="<?$team->id?>" width="50">
<?php $i++; } ?>
</div>

<?php print_r(var_dump($api->getCLmatches()->matches[100]));?>

<h1>Table showing Some Match results from Champions League</h1>


<table>
    <tr>
        <th>homeTeam</th>
        <th>awayTeam</th>
        <th>Score</th>
    </tr>
<?php $i=0; foreach($api->getCLmatches()->matches as $match) {?>
    <?php if(($match->homeTeam->name == "Real Madrid CF" || $match->awayTeam->name == "Real Madrid CF") && $match->status == "FINISHED") { ?>
    <tr>
    <td> <?= $match->homeTeam->name ?></td>
    <td><?=  $match->awayTeam->name ?></td>
    <td><?= $match->score->fullTime->homeTeam,":", $match->score->fullTime->awayTeam ?></td>
    </tr>
    <?php } ?>
    <?php } ?>
</table>