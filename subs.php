<?php
include 'includes/sidebar.php';

// TODO: Load videos from channels

$subs = DB::query("SELECT * FROM subscriptions WHERE user_who_subscribed='$user'");
if (count($subs) == 0) {
	echo 'go subscribe to someone';
} else {
	$j = 0;
	$css = '';
	for ($i = 0; $i < count($subs); $i++) {
		$vids = DB::query("SELECT * FROM videos WHERE channel=:channel", array(':channel' => $subs[$i]['channel_name']));
		$vidChannel = $subs[$i]['channel_name'];
		$vidMember = $subs[$i]['member_name'];
		if (count($vids) > 0) {
			echo '<blockquote class="post"><header class="post_header"><img src="data/users/images/icons/default.jpg" style="border-radius: 100%;" class="post_img"><img src="images/arrow_down.png" style="height:16px;position:absolute;right:5px;top:calc(50% - 8px);'.$css.'" class="post_arrow"><h2 class="post_channel_name">'.$vidChannel.'</h2><h4 class="post_member_name">'.$vidMember.'</h2></header></blockquote>';
			$css = 'transform:rotate(90deg)';
		}
	}
}

?>
