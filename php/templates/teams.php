<?php include_once "header.php" ?>

<?php require_once "FootballData.php"; 
$api2 = new FootballData();
?>

<select>
<?php foreach($api2->getCLteams()->teams as $team) { ?>
    <option value="<?=$team->id?>"><?=$team->name?></option>
<?php } ?>
</select>

<p>heey</p>

<?php include_once "footer.php" ?>