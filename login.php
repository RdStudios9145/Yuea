<?php
include ( './includes/sidebar.php' );
?>
<style>
body {
	transform: translate(0, -15px);
}
#menu {
	margin-bottom: 20px;
}
</style>
<?php
if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
	echo '1';

        if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
		echo '2';

                $dbPassword = DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password'];
                if (password_verify($password, $dbPassword)) {
                        echo 'logged in';

			$_SESSION['username'] = $username;
			if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
				$uri = 'https://';
			} else {
				$uri = 'http://';
			}
			$uri .= $_SERVER['HTTP_HOST'];
			echo $uri;
			header('Location: '.$uri.'/tutorials/videobox/members.php');
			exit;

                } else {
                        echo 'invalid password';
                }

        } else {
                echo 'user not registered';
        }
}

?>
<h2>Login to Your Account</h2>
<form action='login.php' method='POST'>
<input type='text' name='username' placeholder='Username ...'/><p />
<input type='password' name='password' placeholder='Password ...'/><p />
<input type='submit' name='submit' value='Login to my Account' />
</form>
