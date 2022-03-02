<?php
session_start();

// TODO: Create icons for sidebar
// TODO: Make sidebar collapseable?

// echo $e;

include  ('./includes/functions.php');
include ('./includes/connect_to_mysql.php');
include('./includes/mail.php');
try {
	$user = "";
	$loggedIn = false;
	$userID = -1;
	$heart = '/tutorials/videobox/images/support_heart.ico';
	$supportImg = array($heart, $heart, $heart, $heart, $heart, $heart, $heart, $heart, $heart, '/tutorials/videobox/images/support_money.png')[rand(0, 9)];
	unset($heart);
	//$channel = "";
	if (isset($_SESSION['username'])) {
		$user = $_SESSION['username'] ?? throw new \Exception("error logging in");
		$userID = $_SESSION['id'] ?? throw new \Exception("error logging in");
		$loggedIn = true;
	} else {
		if ($_SERVER['REQUEST_URI'] != "/tutorials/videobox/login.php" && $_SERVER['REQUEST_URI'] != "tutorials/videobox/login/" && $_SERVER['REQUEST_URI'] != "/tutorials/videobox/join.php" && $_SERVER['REQUEST_URI'] != "tutorials/videobox/join/") {
			header("Location: login.php");
		}
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Yuea &bull; <?php echo 'Where amazing things happen'; ?></title>
	    <?php if ($browser == "Google Chrome" || $browser == "Apple Safari") {
		echo '
		<link rel="stylesheet" type="text/css" href="/tutorials/videobox/css/sitestyle.css" />
	    <link id="edu_menu" rel="stylesheet" type="text/css" href="/tutorials/videobox/css/webkit/menu_black.css" />
		';
		}
		else if ($browser == "Mozilla Firefox") {
		echo '
		<link rel="stylesheet" type="text/css" href="./css/sitestyle.css" />
	    <link id="edu_menu" rel="stylesheet" type="text/css" href="./css/firefox/menu_black.css" />
		';
		}
		else if ($browser == "Internet Explorer") {
		echo '
		<link rel="stylesheet" type="text/css" href="./css/sitestyle.css" />
	    <link id="edu_menu" rel="stylesheet" type="text/css" href="./css/ie/menu_black.css" />
		';
		}
	        else
	        {
	        echo '
	        <link rel="stylesheet" type="text/css" href="./css/sitestyle.css" />
	    <link id="edu_menu" rel="stylesheet" type="text/css" href="./css/webkit/menu_black.css" />
	        ';
	        }
		?>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <script type="text/javascript" src="js/functions.js"></script>
		<script type="text/javascript" src="js/links.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript"> var user = '"<?php echo $user; ?>"' </script>
	</head>
	<body>
		<div class="menu_bg"></div>
		<div class="sidebar_bg"></div>
		<div class="login_popup">

		</div>
		<div id="sidebar_full">
			<div id="sidebar_content">
				<div id="posts" class="hover_sidebar" onclick="link('index.php')">
					<img src="#" class="sidebar_img">
					<p style="font-family:comicSansMS;font-weight:bold;font-size:large" class="sidebar_text">Posts</p><br />
				</div>
				<div id="videos" class="hover_sidebar" onclick="link('popular.php')">
					<img src="#" class="sidebar_img">
					<p style="font-family:comicSansMS;font-weight:bold;font-size:large" class="sidebar_text">Videos</p><br />
				</div>
				<div id="Explore" class="hover_sidebar" onclick="link('latest_videos.php')">
					<img src="#" class="sidebar_img">
					<p style="font-family:comicSansMS;font-weight:bold;font-size:large" class="sidebar_text">Explore</p><br />
				</div>
				<div id="Subscriptions" class="hover_sidebar" onclick="link('subs.php')">
					<img src="#" class="sidebar_img">
					<p style="font-family:comicSansMS;font-weight:bold;font-size:large" class="sidebar_text">Subscriptions</p><br />
				</div>
				<div style="width:100%;border-bottom:1px solid darkgray;margin-bottom:10px;"></div>
				<div id="videos" class="hover_sidebar" onclick="link('popular.php')">
					<img src="#" class="sidebar_img">
					<p style="font-family:comicSansMS;font-weight:bold;font-size:large" class="sidebar_text">Popular</p><br />
				</div>
				<div id="invite" class="hover_sidebar" onclick="link('invite.php')">
					<img src="#" class="sidebar_img">
					<p style="font-family:comicSansMS;font-weight:bold;font-size:large" class="sidebar_text">Invite</p><br />
				</div>
				<div style="width:100%;border-bottom:1px solid darkgray;margin-bottom:10px;"></div>
				<div id="support" class="hover_sidebar" onclick="link('#')">
					<img src="<?php echo $supportImg; unset($supportImg); ?>" style="width:32px;height:32px" class="sidebar_img">
					<p style="font-family:comicSansMS;font-weight:bold;font-size:large" class="sidebar_text">Support Me</p><br />
				</div>
			</div>
		</div>
		<div id="wrapper">
	    		<div id="menu">
	            		<ul>
	                        <li class="menu_featured"><a href="#">FEATURED</a></li>
		                <li class="menu_popular"><a href="/popular.php">POPULAR VIDEOS</a></li>
	                        <li class="menu_latest"><a href="/latest_videos.php">LATEST VIDEOS</a></li>
	                        <li class="menu_newmembers"><a href="/latest_members.php">RECENT MEMBERS</a></li>
	                        <li class="menu_channels"><a href="#">CHANNELS</a></li>
	                        <?php if ($user == "") {
					echo '<li class="menu_login"><a href="login.php">LOGIN</a></li>
					<li class="menu_join"><a href="join.php">CREATE AN ACCOUNT</a></li>';
				} else {
		                        echo '<li class="menu_login"><a href="members.php">MEMBERS</a></li>
		                        <li class="menu_login"><a href="logout.php">LOGOUT</a></li>';
				}
	                        ?>

	                        </ul>
	                    	<form action="./search" id="search_form" method="post">
	                     		<?php if ($browser == "Google Chrome" || $browser == "Safari") {
						echo '<input type="text" name="search_box" onBlur="swap_menu(\'./css/webkit/menu_black.css\')" id="search_box" onFocus="swap_menu(\'./css/webkit/menu_lighter.css\')" value="" />';
						} else if ($browser == "Mozilla Firefox") {
						echo '<input type="text" name="search_box" onBlur="swap_menu(\'./css/firefox/menu_black.css\')" id="search_box" onFocus="swap_menu(\'./css/firefox/menu_lighter.css\')" value="" />';
						} else if ($browser == "Internet Explorer") {
						echo '<input type="text" name="search_box" onBlur="swap_menu(\'./css/ie/menu_black.css\')" id="search_box" onFocus="swap_menu(\'./css/ie/menu_lighter.css\')" value="" />';
						} else {
					        	echo '<input type="text" name="search_box" onBlur="swap_menu(\'./css/webkit/menu_black.css\')" id="search_box" onFocus="swap_menu(\'./css/webkit/menu_lighter.css\')" value="" />';
					        }
					?>
					<input type="submit" name="search_button" id="search_button" value="" />
	                        </form>
	            	</div>
			<br><br><br>
<?php
} catch(Exception $e) {
	if ($e->getMessage() == "error logging in") {
		if ($_SERVER['REQUEST_URI'] != "/tutorials/videobox/login.php" && $_SERVER['REQUEST_URI'] != "tutorials/videobox/login/" && $_SERVER['REQUEST_URI'] != "/tutorials/videobox/join.php" && $_SERVER['REQUEST_URI'] != "tutorials/videobox/join/") {
			echo '<script type="text/javascript">link("login.php")</script>';
		}
	} else
		die("an error has occured");
}
?>
