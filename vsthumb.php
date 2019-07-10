<?php
header('Content-type: image/jpeg');
  // Create Image From Existing File
  if(isset($_GET['image']))
  {
	  $jpg_image = imagecreatefromjpeg($_GET['image']);
  }
  else
  {
  $jpg_image = imagecreatefromjpeg('Greetings/frame_rakhi_01.jpg');
  }
?>