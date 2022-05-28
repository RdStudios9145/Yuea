<?php
include ( './includes/sidebar.php' );

if (isset($_POST['create_channel'])) {
	header("Location: create_channel.php");
}
$get_profile_pic = DB::query("SELECT profile_pic, id FROM users WHERE username='$user'");
$numrows_profile_pic = count($get_profile_pic);
if ($numrows_profile_pic >0) {
	for ($i = 0; $i < count($get_profile_pic); $i++) {
		$row = $get_profile_pic[$i];
		$profile_pic = $row['profile_pic'];

		if ($profile_pic == '') {
			echo "<img alt='' src='./data/users/images/icons/default.jpg' height='120'>";
		} else {
			echo "<img alt='' src='./data/users/images/icons/$profile_pic' height='120'>";
		}
	}
} else {
	print_r($get_profile_pic);
	die('failed to log in '.$numrows_profile_pic.",".$user);
}
?>
<h2>Members Page</h2>

Your channels:<p />
<?php
$channel_check = DB::query("SELECT channel_name FROM channels WHERE created_by='$user'");
$numrows_cc = count($channel_check);
if ($numrows_cc == 0) {
 echo ''; // They don't have any channels so they need to create one
 ?>
 You haven't made any channels yet, click the button to make one.
 <form action='create_channel.php'>
 <input type='submit' name='goto_channel_create' value='Create my Channel' />
 </form>
 <?php
}
else
{
 for ($i = 0; $i < count($channel_check); $i++) {
	$row = $channel_check[$i];
  $channel_name = $row['channel_name'];
  echo "<b>$channel_name</b> - <a href='channel.php?c=$channel_name'>View Channel</a> | <a href='channel_settings.php?c=$channel_name'>Channel Settings</a><p />";
 }
echo "$numrows_cc/5 Channels Created";
if ($numrows_cc < 5) {
	echo "<form action='create_channel.php'>
        <input type='submit' name='goto_channel_create' value='Create a New Channel' />
        </form>";
}
}
?>
