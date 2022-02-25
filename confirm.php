<?php
include("./includes/sidebar.php");

$code = $_GET['code'] ?? die("Not a vailid confirmation code, If you think there has been a mistake, contact the developer");
$dbCode = DB::query("SELECT conf_code FROM confirmation WHERE user='$user' AND conf_code='$code'");

if (count($dbCode) == 1 && $code == $dbCode[0]['conf_code']) {
	DB::query("UPDATE `users` SET `confirmed` = '1' WHERE `users`.`id` = $userID");
	DB::query("DELETE FROM `confirmation` WHERE conf_code='$code'");
}
?>
