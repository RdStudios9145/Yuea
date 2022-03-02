<?php

// TODO: Post with images
// include  ('./includes/functions.php');
// includeWithVariables('./includes/sidebar.php', array('e' => 'hello', 'functions' => true, 'browser' => $browser));
include ( './includes/sidebar.php' );

if (isset($_POST['post']) && $loggedIn) {
	$body = htmlspecialchars($_POST['post_body']);
	$channel = $_POST['channel'];
	$date = date("Y-m-d");
	DB::query('INSERT INTO posts VALUES("", $body, $channel, $user, $date, 0)');
}

if (isset($_POST['error'])) {
	echo $_POST['errorMSG'];
}

if (isset($_POST['message'])) {
	echo $_POST['MSG'];
}

?>
<div class="timelineposts">
	<?php
	if ($loggedIn) {
		$a = DB::query("SELECT channel_name, id FROM channels WHERE created_by='$user'");
		$b = '';
		for ($i = 0; $i < count($a); $i++) {
			$b .= '<option value="'.$a[$i]['id'].'">'.$a[$i]['channel_name'].'</option>';
		}
		echo '<div class="create_post">
			<form action="index.php" method="post" style="position:relative;">
				Channel: <select id="channel" name="channel" required="true">
					<option value="">-----</option>
					'.$b.'
				</select>
				<textarea class="post_body" name="post_body" maxlength="255" required="true" style="background-color:transparent"></textarea>
				<div class="char_number" contenteditable="false">
					<p class="char_number_p">255</p>
				</div><br />
				<input type="submit" name="post" value="post" id="post" disabled="true">
			</form>
		</div>';
	}
	?>
</div>
<?php include ( './includes/footer.php' ); ?>
