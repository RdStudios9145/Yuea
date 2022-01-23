<?php
include ( './includes/sidebar.php' );
$channel = $_GET['c'];
$check_subscribe = DB::query("SELECT * FROM subscriptions WHERE user_who_subscribed='$user'");
$count_s  = count($check_subscribe);
if ($count_s > 0) {
	$subbutton = 'Unsubscribe';
} else {
	$subbutton = 'Subscribe';
}
$check_channel = DB::query("SELECT * FROM channels WHERE channel_name='$channel'");
$count = count($check_channel);
if ($count == 1) {
	for ($i = 0; $i < count($check_channel); $i++) {
		$row = $check_channel[$i];
		$id = $row['id'];
		$channel_name = $row['channel_name'];
		$created_by = $row['created_by'];
		$date_created = $row['date_created'];
		$channel_icon = $row['channel_icon'];
		if (isset($_POST['subscribe'])) {
			$check_subscribe = DB::query("SELECT * FROM subscriptions WHERE user_who_subscribed='$user' && channel_name='$channel_name'");
			$count_s = count($check_subscribe);
			if ($user != '') {
				if ($count_s > 0) {
					$subscribe_query = DB::query("DELETE FROM subscriptions WHERE user_who_subscribed='$user' && channel_name='$channel_name'");
					header("Location: channel.php?c=$channel_name");
				} else {
					$subscribe_query = DB::query("INSERT INTO subscriptions VALUES ('','$user','$channel_name','no')");
					header("Location: channel.php?c=$channel_name");
				}
			} else {
				header('Location: login.php');
			}
		}

		?>
		<div class='channeloptions'>
			<h2><?php echo $channel_name; ?></h2>
			<center>
				<img src='data/channels/images/icons/<?php echo $channel_icon; ?>' height='140' width='140' />
				<br /><br />
				<form action='channel.php?c=<?php echo $channel_name; ?>' method='POST'>
					<input type='submit' name='subscribe' value='<?php echo $subbutton; ?>' />
				</form>
			</center>
		</div>
		<div class='channelvideocontainer'>
			<?php
			$check_channel = DB::query("SELECT * FROM videos WHERE channel='$channel'");
			$count = count($check_channel);
			if ($count >= 1) {
				$videos = '';
				for ($i = 0; $i < count($check_channel); $i++) {
					$row = $check_channel[$i];
				      	$id = $row['id'];
				      	$account_name = $row['account'];
				      	$channel_name = $row['channel'];
				      	$date_created = $row['date_uploaded'];
				      	$video_id = $row['video_id'];
					$thumbnail = $row['thumbnail'];
					$title = $row['video_title'];
					$description = $row['video_description'];
					$tags = $row['video_keywords'];

					$template = '<div class="videos" onclick="window.location = \'watch.php?videoid='.$video_id.'\'">
					<img src="./data/channels/videos/thumbnails/'.$thumbnail.'" width="150" height="80" class="video_thumbnail" />
					<div class="video_title">
						<h2>'.$title.'</h2>
					</div>
					<div class="video_desc">
						<p class="video_desc_p">'.$description.'</p>
					</div>
					<div class="video_tags">
						<p>'.$tags.'</p>
					</div>
					</div><br />';
					$videos = $videos.$template;
				}
				echo $videos;
			}
			?>
			<!--<img src='#' height='100' width='180' />-->
		</div>
		<?php
	}
} else {
	header("Location: index.php");
}
?>
