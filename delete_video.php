<?php
include ( './includes/header.php' );
$videoid = $_GET['videoid'];

DB::query("UPDATE videos SET deleted='yes' WHERE video_id='$videoid'");
header("Location: my_videos.php");
?>
