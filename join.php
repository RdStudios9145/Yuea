<?php
include ( './includes/sidebar.php' );



$error = "";
$invCode = $_GET['inv'] ?? null;
$check_inv = DB::query("SELECT inv_code FROM users WHERE inv_code='$invCode'");
if (count($check_inv) == 1) {
	if (@$_POST['register']) {
	  	$date = date("Y-m-d");
	 	$firstname = htmlspecialchars(strip_tags($_POST['firstname']));
	 	$lastname = htmlspecialchars(strip_tags($_POST['lastname']));
	 	$username = htmlspecialchars(strip_tags($_POST['username']));
	 	$email = htmlspecialchars(strip_tags($_POST['email']));
	 	$password1 = htmlspecialchars(strip_tags($_POST['password']));
	 	$password2 = htmlspecialchars(strip_tags($_POST['passwordrepeat']));

	 	$dob = htmlspecialchars(strip_tags($_POST['date']));

		if ($firstname == "") {
			$error = "Firstname cannot be left empty.";
		} else if ($lastname == "") {
			$error = "Lastname cannot be left empty.";
		} else if ($username == "") {
			$error = "Username cannot be left empty.";
		} else if ($email == "") {
			$error = "Email cannot be left empty.";
		} else if ($password1 == "") {
			$error = "Password cannot be left empty.";
		} else if ($password2 == "") {
			$error = "Repeat Password cannot be left empty.";
		} else if ($invCode == null) {
			$error = "inv";
			die("You must have been invited to join");
		}
		//Check the username doesn't already exist
		$check_username = DB::query("SELECT `username` FROM `users` WHERE username='$username'"/*, array(":username" => $username)*/);
		$numrows_username = count($check_username);
		if ($numrows_username != 0) {
			$error = 'That username has already been registered.';
		} else {
			$check_email = DB::query("SELECT email FROM users WHERE email='$email'"/*, array(":email" => $email)*/);
			$numrows_email = count($check_email);
			if ($numrows_email != 0) {
				$error = 'That email has already been registered.';
			} else {
				if ($password1 != $password2) {
					$error = 'The passwords don\'t match!';
				} else if ($error == "") {
					//Register the user
					$password = password_hash($password1, PASSWORD_BCRYPT);
					$work = true;
					$confWork = true;
					$newInvCode = "";
					$newConfCode = "";
					$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+=-_!@#$%^&*()`~abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+=-_!@#$%^&*()`~';
					while ($work || $confWork) {
						if ($work) {
							$newInvCode = substr(str_shuffle($chars), 0, 50);
							$invCheck = DB::query("SELECT inv_code FROM users WHERE inv_code='$newInvCode'");
							if (count($invCheck) == 0)
								$work = false;
						}
						if ($confWork) {
							$newConfCode = substr(str_shuffle($chars), 0, 120);
							$confCheck = DB::query("SELECT conf_code FROM confirmation WHERE conf_code='$newConfCode'");
							if (count($invCheck) == 0)
								$confWork = false;
						}
					}
					try {
						$register = DB::query("INSERT INTO users VALUES('','$firstname','$lastname','$username','$email', '$password','$dob','no','','$date','$newInvCode','0')") ?? throw new \Exception("Error Processing Request", 1);
						$confRegister = DB::query("INSERT INTO confirmation VALUES('','$newConfCode','$username','$email')") ?? throw new \Exeption("Error Processing Request", 1);
						mail::send(1, $email, $newConfCode);
					} catch (Exeption) {
						die("There was an error trying to create your account, please try again at another time");
					}
				}
			}
		}
	}
} else {
	die("You must have been invited to join");
}
?>
<h2>Create Your Account</h2>
<form action='join.php?inv=<?php echo $invCode ?>' method='POST'>
<input type='text' name='firstname' placeholder='Firstname ...'/><p />
<input type='text' name='lastname' placeholder='Lastname ...'/><p />
<input type='text' name='username' placeholder='Username ...'/><p />
<input type='email' name='email' placeholder='Email ...'/><p />
<input type='password' name='password' placeholder='Password ...'/><p />
<input type='password' name='passwordrepeat' placeholder='Repeat Password ...'/><p />
<input type='date' name='date'/><p />

<input type='submit' name='register' value='Create Your Account' />
<?php echo '<div id=""'.$error; ?>
</form>
