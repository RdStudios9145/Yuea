<?php
include ( './includes/sidebar.php' );
?>
<br /><br /><br />
<?php
$get_videos = DB::query("SELECT * FROM videos ORDER by views DESC");
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
		echo '<div class="videos" onclick="link(\'watch.php?videoid='.$video_id.'\')">
			<img alt="" src="data/channels/videos/thumbnails/'.$thumbnail.'" width="150" height="80" class="video_thumbnail"/>
			<div class="video_title">
				<h2>'.$video_title.'</h2>
			</div>
			<div class="video_desc">
				<p class="video_desc_p">'.$video_description.'</p>
			</div><br />
			<div class="video_tags">
				<p>'.$video_keywords.'</p>
			</div>
			<div class="video_views">
				<p>Video Views: <strong>'.$views.'</strong></p>
			</div>
		</div>';

	}
}
?>
