<?php

$r = rand(0,99);

if ($r < 90) {
	echo "It looks like your lost, weary traveler<br>Why don't you take a break and rest here for a while";
} else if ($r < 98) {
	echo "Were sorry, but the demon you're summoning is currently unavalable.<br>Your ritual is important to us!<br>Please hold while we connect you to the next avalable Servant of Darkness.<br>error #666";
} else {
	echo "hewwo, it looks like you're lost, and i can help you find your way";
}

?>
