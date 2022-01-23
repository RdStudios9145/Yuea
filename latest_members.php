<?php
include ( './includes/sidebar.php' );
?>
<br /><br /><br />
<?php
$get_users = DB::query("SELECT * FROM users ORDER by date_joined DESC");
if (count($get_users) == 0) {
	echo "There are no users yet!";
}
else {
	for ($i = 0; $i < count($get_users); $i++) {
		$row = $get_users[$i];
		$id = $row['id'];
		$username = $row['username'];

		echo $username."<br />";
	}
}
?>
