<?php
session_start();
include("../includes/connect_to_mysql.php");

// TODO: Improve post loading

$start = $_GET['start'] ?? 50;
$length = $_GET['length'] ?? 15;
$user = $_SESSION['username'];

$dbSubs = DB::query("SELECT * FROM subscriptions WHERE user_who_subscribed='$user'");
$subs = '';

for ($i = 0; $i < count($dbSubs); $i++) {
	$subs .= '"'.$dbSubs[$i][2].'"';
	if ($i + 1 < count($dbSubs))
		$subs .= ',';
}

$dbPosts = DB::query("SELECT * FROM posts WHERE id BETWEEN $start AND $start+$length AND postedChannel IN ($subs)");
$data = array();

foreach ($dbPosts as $i) {
	array_push($data, array('PostBody' => $i['postBody'], 'PostChannel' => $i['postedChannel'], 'PostMember' => $i['postedMember'], 'PostDate' => $i['postDate'], 'PostId' => $i['id'], 'PostLikes' => $i['likes']));
}

echo json_encode($data);
?>
