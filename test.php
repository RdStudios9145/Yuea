<?php
  /* Calculate Likes */
  $total_width = 180;
  $green = 0;
  $red = 0;
  $get_likes = mysql_query("SELECT * FROM ratings WHERE videoid='$videoid' AND type='like'");
  $num_of_likes = mysql_num_rows($get_likes);

  $get_dislikes = mysql_query("SELECT * FROM ratings WHERE videoid='$videoid' AND type='dislike'");
  $num_of_dislikes = mysql_num_rows($get_dislikes);

  $total_num = $num_of_likes + $num_of_dislikes;
  
  $width_of_one = $total_width / $total_num;
  $green  = $width_of_one * $num_of_likes;
  $red = $width_of_one * $num_of_dislikes;


  echo $num_of_likes;
  
  
  2 likes AND 0 dislikes
  green = 100%
  red = 0%
  1 like AND 1 dislike
  green = 50%
  red = 50%
  
  if red == 0 then
     set green = 100
  else if green == 0 then
     set red = 100
  else if red == 1 AND green == 1 then
     set red and green = 50


  180px == 100%
  1% = 18px
  
  3 likes 1 dislikes

  3 + 1 = 4

  4 = total = 100% = 180px
  180 / 4 = 45px * 3 =
  
  
  


?>