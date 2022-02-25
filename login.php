<?php
include ('./includes/sidebar.php');

// TODO: Make signup tokens temperary
// TODO: Make session tokens instead of username

if (isset($_POST['submit'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if (DB::query("SELECT users.username FROM users WHERE users.username=:username", array(':username'=>$username))) {

                $dbPassword = DB::query("SELECT users.password FROM users WHERE users.username=:username", array(':username'=>$username))[0]['password'];
                if (password_verify($password, $dbPassword)) {
                        echo 'logged in';

			$_SESSION['username'] = $username;
			$_SESSION['id'] = DB::query("SELECT id FROM users WHERE username='$username'")[0]['id'];
			//$_SESSION['channelname'] = DB::query('SELECT channel_name FROM channels WHERE created_by=:created_by', array(':created_by'=>$username))[0]['channel_name'];
			header('Location: index.php');
			exit;

                } else {
                        echo 'invalid password';
                }

        } else {
                echo 'user not registered';
        }
}

if ($loggedIn) {
	die("already logged in");
}

?>
<h2>Login to Your Account</h2>
<form action='login.php' method='POST'>
<input type='text' name='username' placeholder='Username ...'/><p />
<input type='password' name='password' placeholder='Password ...'/><p />
<input type='submit' name='submit' value='Login to my Account' />
</form>
