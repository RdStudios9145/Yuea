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
$error = "";
if (@$_POST['register']) {
  	$date = date("Y-m-d");
 	$firstname = strip_tags($_POST['firstname']);
 	$lastname = strip_tags($_POST['lastname']);
 	$username = strip_tags($_POST['username']);
 	$email = strip_tags($_POST['email']);
 	$password1 = strip_tags($_POST['password']);
 	$password2 = strip_tags($_POST['passwordrepeat']);

 	$day = strip_tags($_POST['day']);
 	$month = strip_tags($_POST['month']);
 	$year = strip_tags($_POST['year']);
 	$dob = "$day/$month/$year";

	if ($firstname == "") {
		$error = "Firstname cannot be left empty.";
	}
	else if ($lastname == "") {
		$error = "Lastname cannot be left empty.";
	}
	 else if ($username == "") {
	  $error = "Username cannot be left empty.";
	 }
	 else if ($email == "") {
	  $error = "Email cannot be left empty.";
	 }
	 else if ($password1 == "") {
	  $error = "Password cannot be left empty.";
	 }
	 else if ($password2 == "") {
	  $error = "Repeat Password cannot be left empty.";
	 }
	 else if ($day == "") {
	  $error = "The day you were born cannot be left empty.";
	 }
	 else if ($month == "") {
	  $error = "The month you were born cannot be left empty.";
	 }
	 else if ($year == "") {
	  $error = "The year you were born cannot be left empty.";
	 }
 //Check the username doesn't already exist
	$check_username = DB::query("SELECT `username` FROM `users` WHERE username='$username'"/*, array(":username" => $username)*/);
 print_r($check_username);
 $numrows_username = count($check_username);
 if ($numrows_username != 0) {
  $error = 'That username has already been registered.';
 }
 else
 {
 $check_email = DB::query("SELECT email FROM users WHERE email='$email'"/*, array(":email" => $email)*/);
 $numrows_email = count($check_email);
 if ($numrows_email != 0) {
  $error = 'That email has already been registered.';
 }
 else
 {
 if ($password1 != $password2) {
 $error = 'The passwords don\'t match!';
 }
 else
 {
 //Register the user
 $password = password_hash($password1, PASSWORD_BCRYPT);
 $register = DB::query("INSERT INTO users VALUES('','$firstname','$lastname','$username','$email','$password','$dob','no','','$date')"/*, array(
	":firstname" => $firstname,
	":lastname"  => $lastname,
	":username"  => $username,
	":email"     => $email,
	":password1" => $password1,
	":dob"       => $dob,
	":date"      => $date
)*/);
 die('Registered successfully!');
 }
 }
 }
}
?>
<h2>Create Your Account</h2>
<form action='join.php' method='POST'>
<input type='text' name='firstname' value='Firstname ...' onclick='value=""'/><p />
<input type='text' name='lastname' value='Lastname ...' onclick='value=""'/><p />
<input type='text' name='username' value='Username ...' onclick='value=""'/><p />
<input type='text' name='email' value='Email ...' onclick='value=""'/><p />
<input type='text' name='password' value='Password ...' onclick='value=""'/><p />
<input type='text' name='passwordrepeat' value='Repeat Password ...' onclick='value=""'/><p />
<input type='text' name='day' value='' size='3' maxlength='2' onclick='value=""'/>
<input type='text' name='month' value='' size='6' maxlength='2' onclick='value=""'/>
<input type='text' name='year' value='' size='4' maxlength='4' onclick='value=""'/><p />

<input type='submit' name='register' value='Create Your Account' />
<?php echo $error; ?>
</form>
