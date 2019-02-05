<?php 
    include "init.php";
    include $tpl."header.php"; ?>

<!-- Welcome To Index -->

<?php 
    $base = mysqli_connect('localhost','root','');
    mysqli_select_db($base,'livefoot');
    $sql = 'SELECT userID,username,password,email FROM users WHERE userID = 1';
    $req = mysqli_query($base,$sql) or die(mysqli_error($base));
    $data = mysqli_fetch_array($req);
    mysqli_free_result($req);
    mysqli_close($base);
    echo "Username: ".$data['username'];
    echo '<br>';
    echo "Password: " . $data['password'];
    echo '<br>';
    echo var_dump($data);
    ?>

<?php include $tpl."footer.php"; ?>