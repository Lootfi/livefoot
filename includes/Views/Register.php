
<?php
if(isset($_POST['setter'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if(!Index::userExists($username)){
        if(!(strlen($username) < 4 or strlen($username) >= 32) && preg_match('/[a-zA-Z0-9_]+/',$username)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                Index::addUser($username,$email,$password);
                echo '<h2>Welcome '. $username.' !</h2>';
            } else {
                echo '<br><b>Invalid Email</b>';
            }
        } else {
            echo '<br><b>Invalid Username</b>';
        }
    } else {
        echo '<br><b>User Exists</b>';
    }
}
?>

<form action="" method="POST">
    <label for="username">
    Username: <input type="text" name="username" value="<?=isset($_POST['username']) ? $_POST['username'] : '' ?>" >
    </label>
    <label for="password">
    Password: <input type="password" name="password" id="pw"     >
    </label>
    <label for="email">
    Email: <input type="email" name="email" id="email" value="<?=isset($_POST['email']) ? $_POST['email'] : '' ?>">
    </label>
    <input type="submit" value="SET USERNAME" name="setter">
</form>


<?= isset($username) ? 'Username : '. $username : '' ?>
<br>
<?= isset($password) ? 'Password : '. $password : '' ?>
<br>
<?= isset($email) ? 'Email : '. $email : '' ?>

<?php include 'Footer.php'; ?>