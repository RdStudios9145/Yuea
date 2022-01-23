<?php
include ( './includes/sidebar.php' );
$videoid = $_GET['videoid'];

$check = DB::query("SELECT * FROM videos WHERE video_id='$videoid'");
if (count($check) == 1) {
	for ($i = 0; $i < count($check); $i++) {  // This data is only specific to the video itself
		$row = $check[$i];
		$id = $row['id'];
		$video_title = $row['video_title'];
		$video_description = $row['video_description'];
		$video_keywords = $row['video_keywords'];
		$uploaded_by = $row['uploaded_by'];
		$date_uploaded = $row['date_uploaded'];
		$views = $row['views'];
		$videosrc = $row['file_name'];
		$video_id = $row['video_id'];
		$privacy = $row['privacy'];
		$newviews = $views + 1;
		$updateviews = DB::query("UPDATE videos SET views='$newviews' WHERE video_id='$videoid'");
	}
	?>
	<h2><?php echo $video_title; ?></h2>
	<div style="float: left;">
	<video width="480" height="320" autoplay controls>
	<source src="<?php echo $videosrc; ?>" type="video/mp4">
	Your browser doesn't support the HTML5 video tag.
	</video>
	</div>
	<div style="float: left;margin: 0px 0px 0px 5px;border: 1px solid #ccc;background-color: #f2f2f2;padding: 5px;min-height: 100px;width: 300px;">
	<p><strong>Video Description:</strong></p>
	<?php echo $video_description; ?>
	</div>
	<div style="float: left;margin: 0px 0px 0px 5px;border: 1px solid #ccc;border-top: none;background-color: #f2f2f2;padding: 5px;width: 300px;">
	<strong>Video Tags:</strong>
	<?php echo $video_keywords; ?>
	</div>
	<p/>
	<div style="float: left;width: 300px;font-size: 14px;margin: 0px 0px 0px 5px;font-weight: bold;">
	<?php echo $views; ?> Views
	</div>
	<?php

	/* Check if already liked / disliked */
	$check_l = DB::query("SELECT * FROM ratings WHERE videoid='$videoid' AND username='$user'");
	if (count($check_l) != 0) {
		for ($i = 0; $i < count($check_l); $i++) {
			$rating = $check_l[$i];
			$videoid_l = $rating['videoid'];
			$type = $rating['type'];
			$user_l = $rating['username'];

			$d = "";
			$d2 = "";

			if ($type == 'like') {
				$d = 'disabled';
	      		} else {
				$d2 = 'disabled';
		    	}

	    		/* Add ratings code */

			if ($user == '' && isset($_POST['like']) || $user == '' && isset($_POST['dislike'])) {
				header("Location: login.php");
			} else if (isset($_POST['like'])) {
				//DB::query("UPDATE ratings SET type='like' WHERE videoid='$videoid' AND username='$user'");
				header("Location: watch.php?videoid=$videoid");
			} else if (isset($_POST['dislike'])) {
				//DB::query("UPDATE ratings SET type='dislike' WHERE videoid='$videoid' AND username='$user'");
				header("Location: watch.php?videoid=$videoid");
			}

	  	}
	} else {
		$d = "";
		$d2 = "";
		  /* Add ratings code */

		if ($user == '' && isset($_POST['like']) || $user == '' && isset($_POST['dislike'])) {
	  		header("Location: login.php");
	  	} else if (isset($_POST['like'])) {
			DB::query("INSERT INTO ratings VALUES ('','$videoid','like','$user')");
			header("Location: watch.php?videoid=$videoid");
		} else if (isset($_POST['dislike'])) {
			DB::query("INSERT INTO ratings VALUES ('','$videoid','dislike','$user')");
			header("Location: watch.php?videoid=$videoid");
		}
	}

	/* Comment Post Code */
	if (isset($_POST['post_comment'])) {
	        $comment_text = trim(htmlentities(strip_tags(stripslashes(htmlspecialchars($_POST['write_comment'])))));
	        $date_commented = date("Y-m-d");
	        DB::query("INSERT INTO comments VALUES ('','$user','$comment_text','$date_commented','$videoid')");
	}

	/* Calculate Likes */
	$total_width = 180;
	$green = 0;
	$red = 0;
	$get_likes = DB::query("SELECT * FROM ratings WHERE videoid='$videoid' AND type='like'");
	$num_of_likes = count($get_likes);

	$get_dislikes = DB::query("SELECT * FROM ratings WHERE videoid='$videoid' AND type='dislike'");
	$num_of_dislikes = count($get_dislikes);

	$total_num_db = $num_of_likes + $num_of_dislikes;

	if ($total_num_db == 0) {
		echo '';
	}
	else {

		$total_num = $num_of_likes + $num_of_dislikes;

		$width_of_one = $total_width / $total_num;
		$green  = $width_of_one * $num_of_likes;
		$red = $width_of_one * $num_of_dislikes;
	}

	?>
	<div style="float: left;width: 100%;margin: 10px 5px 0px 5px;">
	        <div style="float: left; height: 25px; width: 475px;">
	        	<div style="float: left; width: 50%;">
	        		<div style="margin-top: -5px;">
	              			<form action='watch.php?videoid=<?php echo $videoid; ?>' method='POST'>
	                			<input type='submit' name='like' value='Like' <?php echo $d; ?>>
	                			<input type='submit' name='dislike' value='Dislike' <?php echo $d2; ?>>
	              			</form>
	            		</div>
	            	</div>
	        	<div style="float: right; width: <?php echo $total_width; ?>;">
	           		<div style="float: right; width: <?php echo $red; ?>px; height: 5px; background-color: red;">
				</div>
	           		<div style="float: right; width: <?php echo $green; ?>px; height: 5px; background-color: green;">
				</div>
	           	</div>
	        </div>
	        <div style="float: left; width: 100%;">
	        	<form action="watch.php?videoid=<?php echo $videoid; ?>" method="POST">
	        		<textarea name="write_comment" rows="7" cols="43" style="float: left;"></textarea>
	           		<input type="submit" name="post_comment" value="Post Comment" style="height: 120px; float: left;">
	           	</form>
	        </div>
		<?php
		// This is the section of the watch page that isn't specific to the video

		$select_comment = DB::query("SELECT * FROM comments WHERE video_id='$videoid' ORDER BY id DESC");
		if (count($select_comment) != 0) {
		 //The video has some comments
			for ($i = 0; $i < count($select_comment); $i++) {
				$r = $select_comment[$i];
		           	$id = $r['id'];
		           	$user_commented = $r['user_commented'];
		           	$comment = $r['comment'];
		           	$date_posted = $r['date_posted'];
		        	?>

		<div style="float: left;">
			<form action="watch.php?videoid=<?php echo $videoid; ?>" method="POST">
		        </form>
		</div><br />
		<div style="float: left; width: 150px;">
		 	<?php
		 	echo "On ".$date_posted;
		 	echo " <a href='#'>".$user_commented.'</a> said: <br />';
			?>
		</div>
		<div style="float: left;">
			<?php
			echo $comment;
			?>
		</div>
		<br /><br />
		<hr width="98%" style="height: 1px; border: none; border-top: 1px solid #CCCCCC"/>
	</div>
	<?php
	}

	} else {
	 // The video has no comments

	}
}
else {
	header("Location: index.php");
	exit;
}
?>
