<?php
include("./includes/sidebar.php");
if ($loggedIn) {
	if (isset($_POST['submit'])) {
		$email = htmlspecialchars($_POST['email']);
		mail::send(0, $email, DB::query("SELECT inv_code FROM users WHERE email='$email'")[0]['inv_code']);
	}
} else {
	die("You need to be logged in to do this");
}
?>
<br><br><br>
<h2>Enter the email of someone you would like to invite</h2>
<form class="invite" action="invite.php" method="post">
	<input type="email" name="email" placeholder="example@website.com" required="true">
	<input type="submit" name="submit" value="Invite" id="invite">
</form>
This page has been currently taken down, soon to return
