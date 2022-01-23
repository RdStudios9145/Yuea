<?php
include ( './includes/sidebar.php' );
$username = $_GET['u'];
$check_username = DB::query("SELECT * FROM users WHERE username='$username'");
$count  = count($check_username);
if ($count == 1) {
for ($i = 0; $i < count($check_username); $i++) {
	$row = $check_username[$i];
      $id = $row['id'];
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $username = $row['username'];
      $email = $row['email'];
      $password = $row['password'];
      $date_of_birth = $row['dob'];

      echo "<h2>$username's Profile</h2><br />
      Name: $firstname $lastname<br />
      Email: $email
      ";
}
}
else
{
 header("Location: index.php");
}
?>
