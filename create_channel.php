<?php
include ( './includes/header.php' );

if (isset($_POST['create_channel'])) {
 $channel_name = @$_POST['channel_name'];
 $date = date("Y-m-d");
$channel_check = DB::query("SELECT channel_name FROM channels WHERE created_by='$user'");
$numrows_cc = count($channel_check);
if ($numrows_cc < 5) {
 $channel_name_db = DB::query("SELECT channel_name FROM channels WHERE channel_name='$channel_name'");
 $numrows = count($channel_name_db);
 if ($numrows != 0) {
  echo 'That channel already exists';
 }
 else if ($channel_name == '') {
  echo '';
 }
  else {
 $create_channel = DB::query("INSERT INTO channels VALUES ('','$channel_name','$user','$date','')");
 echo "Your channel was created succesfully";
  }
}
else
{
 echo 'You can only create 5 channels per account.';
}
}
?>
<h2>Create Your Channel</h2>
<form action='create_channel.php' method='POST'>
<input type='text' size='40' maxlength='32' name='channel_name' value='Give your Channel a name ...' onclick='value=""' />
<input type='submit' name='create_channel' value='Create Channel'>
</form>
