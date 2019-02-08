<?= 'Username : '. Index::userData(0)['Username']; ?>
<br>
<?= 'Password : '. Index::userData(0)['Password']; ?>
<br>
<?= 'Email : '. Index::userData(0)['Email']; ?>

<?php
if(isset($_POST['setter'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if(!Index::userExists($username)){
        Index::addUser($username,$email,$password);
    } else {
        echo 'User Exists';
    }
}
?>

<form action="" method="POST">
    <label for="username">
    Username: <input type="text" name="username" >
    </label>
    <label for="password">
    Password: <input type="password" name="password" id="pw">
    </label>
    <label for="email">
    Email: <input type="email" name="email" id="email">
    </label>
    <input type="submit" value="SET USERNAME" name="setter">
</form>