<?php
session_start();
include ( './includes/functions.php' );
include ( './includes/connect_to_mysql.php' );
$user = "";
if (isset($_SESSION['username'])) {
 	$user = $_SESSION['username'];
}
else
{
 	$user = "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Yuea &bull; <?php echo page_title('Where amazing things happen'); ?></title>
    <?php if ($browser == "Google Chrome" || $browser == "Apple Safari") {
	echo '
	<link rel="stylesheet" type="text/css" href="/css/sitestyle.css" />
    <link id="edu_menu" rel="stylesheet" type="text/css" href="/css/webkit/menu_black.css" />
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
</head>
<body>
<div class="menu_bg"></div>
	<div id="wrapper">
    		<div id="menu">
            		<ul>
                        <li class="menu_featured"><a href="#">FEATURED</a></li>
	                <li class="menu_popular"><a href="popular.php">POPULAR VIDEOS</a></li>
                        <li class="menu_latest"><a href="latest_videos.php">LATEST VIDEOS</a></li>
                        <li class="menu_newmembers"><a href="latest_members.php">RECENT MEMBERS</a></li>
                        <li class="menu_channels"><a href="#">CHANNELS</a></li>
                        <?php if ($user == "") { echo '
                        <li class="menu_login"><a href="login.php">LOGIN</a></li>
                        <li class="menu_join"><a href="join.php">CREATE AN ACCOUNT</a></li>
                         ';
                         }
                         else
                         {
                        echo '<li class="menu_login"><a href="members.php">MEMBERS</a></li>
                        <li class="menu_login"><a href="logout.php">LOGOUT</a></li>';
                         }
                         ?>

                        </ul>
                    <form action="./search" id="search_form" method="post">
                     <?php if ($browser == "Google Chrome" || $browser == "Safari") {
	echo '
	<input type="text" name="search_box" onBlur="swap_menu(\'./css/webkit/menu_black.css\')" id="search_box" onFocus="swap_menu(\'./css/webkit/menu_lighter.css\')" value="" />
	';
	}
	else if ($browser == "Mozilla Firefox") {
	echo '
	<input type="text" name="search_box" onBlur="swap_menu(\'./css/firefox/menu_black.css\')" id="search_box" onFocus="swap_menu(\'./css/firefox/menu_lighter.css\')" value="" />
	';
	}
	else if ($browser == "Internet Explorer") {
	echo '
	<input type="text" name="search_box" onBlur="swap_menu(\'./css/ie/menu_black.css\')" id="search_box" onFocus="swap_menu(\'./css/ie/menu_lighter.css\')" value="" />
	';
	}
        else
        {
        echo '
	<input type="text" name="search_box" onBlur="swap_menu(\'./css/webkit/menu_black.css\')" id="search_box" onFocus="swap_menu(\'./css/webkit/menu_lighter.css\')" value="" />
        ';
        }?>
    <input type="submit" name="search_button" id="search_button" value="" />
                        </form>
            </div>
