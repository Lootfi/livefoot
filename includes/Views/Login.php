<?php include 'Header.php' ?>

<?php 
    if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(Login::checkUsername($username)){
        if(Login::checkPassword($username,$password)){
            echo 'Welcome in';
            $cstrong = True; // can't pass True directly to openssl_random function
            $token = bin2hex(openssl_random_pseudo_bytes(64,$cstrong));
            Login::insertToken($username,$token);
            setcookie('LFID',$token, time() + 60 * 60 * 24 * 7, '/',NULL,NULL,TRUE);
        } else {
            echo 'Wrong Password';
        }
    } else {
        echo 'Wrong Username';
    }
}
?>

<h1 class="text-white">Login Page</h1>
<div class="w-full max-w-xs align-middle">
    <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="username">
            Username
            </label>
            <input type="text" name="username" id="username" value="<?=isset($_POST['username']) ? $_POST['username'] : '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight">
        </div>
        <div class="mb-4">
            <label for="password">
            Password
            </label>
            <input type="password" name="password" id="password" value="<?=isset($_POST['password']) ? $_POST['password'] : '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight">
        </div>
        <input type="submit" value="Login" name="login" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
    </form>
</div>
<?php include 'Footer.php' ?>
