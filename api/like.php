<?php
include('../includes/connect_to_mysql.php');

$id = $_GET['id'];
$data = $_GET['data'];
$html = $_GET['html'];

if (strval($data + 1).' Likes' == $html)
	return ':(';

$likes = DB::query("SELECT likes FROM posts WHERE id=$id")[0][0] + 1;

DB::query("UPDATE posts SET likes=$likes WHERE id=$id");
?>
