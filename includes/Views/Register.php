
<?php
include 'Header.php';

if(isset($_POST['setter'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if(!Index::userExists($username)){
        if(!(strlen($username) < 4 or strlen($username) >= 32) && preg_match('/[a-zA-Z0-9_]+/',$username)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL) && !Index::emailExists($email)){
                if(!(strlen($password) < 6 or strlen($password) > 50)){
                    Index::addUser($username,$email,$password);
                    echo '<h2>Welcome '. $username.' !</h2>';
                } else {
                    echo '<br><b>Invalid Password</b>';
                }
            } else {
                if(Index::emailExists($email)){
                    echo '<br><b>Email in use</b>';
                } else {
                    echo '<br><b>Invalid Email</b>';
                }
            }
        } else {
            echo '<br><b>Invalid Username</b>';
        }
    } else {
        echo '<br><b>User Exists</b>';
    }
}
?>
<h1 class="text-white">Signup Foorm</h1>
    <div class="w-full max-w-xs align-middle">
        <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="username">
                Username
                </label>
                <input type="text" name="username" value="<?=isset($_POST['username']) ? $_POST['username'] : '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight" >
            </div>
            <div class="mb-6">
                <label for="password">
                Password
                </label>
                <input type="password" name="password" id="pw" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight">
            </div>
            <div class="mb-6">
                <label for="email">
                Email
                </label>
                <input type="email" name="email" id="email" value="<?=isset($_POST['email']) ? $_POST['email'] : '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight">
            </div>
            <input type="submit" value="Sign Up" name="setter" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>

<?php include 'Footer.php'; ?>