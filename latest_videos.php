<?php
include ( './includes/sidebar.php' );
?>
<br /><br /><br />
<?php
$get_videos = DB::query("SELECT * FROM videos ORDER by date_uploaded DESC");
if (count($get_videos) == 0) {
	echo "There are no videos yet!";
}
else {
	for ($i = 0; $i < count($get_videos); $i++) {
		$row = $get_videos[$i];
		$id = $row['id'];
		$video_title = $row['video_title'];
		$video_description = $row['video_description'];
		$video_keywords = $row['video_keywords'];
		$uploaded_by = $row['channel'];
		$privacy = $row['privacy'];
		$views = $row['views'];
		$video_id = $row['video_id'];
		$thumbnail = $row['thumbnail'];
		$deleted = $row['deleted'];
		?>
		<div class="myvideosdiv" style="max-height: 90px;">
			<a href="<?php echo 'watch.php?videoid='.$video_id ?>">
				<div style="float: left;">
					<img src="data/channels/videos/thumbnails/<?php echo $thumbnail; ?>" width="150" height="80"/>
				</div>
				<h2><?php echo $video_title; ?></h2>
				<div class="myvideosdiv_desc"><?php echo $video_description; ?></div><br />
				Video Views: <strong><?php echo $views; ?></strong>
			</a>
		</div>

		<?php

	}
}
?>
