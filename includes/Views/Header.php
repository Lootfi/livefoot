<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://livefoot.test:81/favicon.ico" type="image/icon">
    <title><?php echo isset($_GET['url']) ? ucwords($_GET['url']) : 'Home' ;  ?></title>
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <!-- <?php include "Styles.php" ?> -->
</head>
<!-- flex flex-col justify-around items-center h-screen -->
<body class="">
<div id ="header">
<a href="/">Home</a>
<a href="/login/">Login</a>
<a href="/register/">Register</a>
<a href="/api-test/">API-TEST</a>
<a href="/teams/">TEAMS</a>
</div>
