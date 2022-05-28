<?php
include ( './includes/sidebar.php' );
?>
<br /><br /><br />
<?php
$getvideos = DB::query("SELECT * FROM videos WHERE uploaded_by='$user'");
$numrows = count($getvideos);
if ($numrows == 0) {
	die("You haven't uploaded a video yet.");
}
else {
	for ($i = 0; $i < count($getvideos); $i++) {
		$row = $getvideos[$i];
		$title = $row['video_title'];
		$desc = $row['video_description'];
		$keywords = $row['video_keywords'];
		$uploaded_by = $row['uploaded_by'];
		$privacy = $row['privacy'];
		$date_uploaded = $row['date_uploaded'];
		$thumbnail = $row['thumbnail'];
		$video_id = $row['video_id'];
		$deleted = $row['deleted'];
		if ($deleted == "no") {
		?>
		<div class="myvideosdiv">
			<div style="float: left;">
				<img alt="" src="data/channels/videos/thumbnails/<?php echo $thumbnail; ?>" width="150" height="80"/>
			</div>
			<h2><?php echo $title; ?></h2>
			<div class="myvideosdiv_desc"><?php echo $desc; ?></div><br />
			<div><a href="edit_video.php?videoid=<?php echo $video_id; ?>">Edit Video</a> | <a href="upload_thumbnail.php?videoid=<?php echo $video_id; ?>">Edit Thumbnail</a> | <a href="delete_video.php?videoid=<?php echo $video_id; ?>">Delete Video</a></div>
			<div class="myvideosdiv_tags"><strong>Tags:</strong> <?php echo $keywords; ?></div>
		</div>
		<?php
	}
	else {
		echo "";
	}

	}
}
?>
