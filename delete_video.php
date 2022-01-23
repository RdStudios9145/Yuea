<?php
include ( './includes/sidebar.php' );
$videoid = $_GET['videoid'];

DB::query("UPDATE videos SET deleted='yes' WHERE video_id='$videoid'");
header("Location: my_videos.php");
?>
