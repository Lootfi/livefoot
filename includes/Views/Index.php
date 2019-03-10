<?php include 'Header.php' ?>

<h1 class="text-blue-dark">HOME</h1>
<form action="" method="post">
<label for="logout">
Would you like to Log out ?
</label>
    <input type="submit" value="Log out">
</form>
<?php 
    if(Index::isLoggedin()){
        echo 'logged in';
        $userID = Index::getuserID()[0]['user_id'];
        echo '<b>'.$userID.'</b>';
    } else {
        echo 'not logged in';
    }
?>
<?php include 'Footer.php' ?>
