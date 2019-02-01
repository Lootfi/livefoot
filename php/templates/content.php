<?php require_once "FootballData.php"; 
$api = new FootballData();
?>

<h1>Premiere League</h1>
<table>
    <tr>
        <th>HomeTeam</th>
        <th></th>
        <th>AwayTeam</th>
        <th colspan="3">Result</th>
    </tr>
    <?php foreach ($api->findMatchesByCompetitionAndMatchday(2021, 1)->matches as $match) { ?>
        <tr>
            <td><?php echo $match->homeTeam->name; ?></td>
            <td> </td>
            <td><?php echo $match->awayTeam->name; ?></td>
            <td><?php echo $match->score->fullTime->homeTeam;  ?></td>
            <td>:</td>
            <td><?php echo $match->score->fullTime->awayTeam;  ?></td>
        </tr>
    <?php } ?>

</table>

