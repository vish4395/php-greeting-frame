<?php
set_time_limit(20);
header('Content-type: image/jpeg');
 // header('Content-Disposition: attachment; filename="'.uniqid('Greeting_').'.png"');
  
  // Create Image From Existing File
  if(isset($_GET['frame']))
  {
	  
	  //$jpg_image = imagecreatefrompng('blank.png');
	  $jpg_image = imagecreatefrompng('Greetings/'.$_GET['frame'].'.png');
	  $png_image = imagecreatefrompng('Greetings/'.$_GET['frame'].'.png');
imagealphablending( $png_image, false );
imagesavealpha( $png_image, true );
	  list($frmwidth, $frmheight) = getimagesize('Greetings/'.$_GET['frame'].'.png') ;
  }
  else
  {
  $jpg_image = imagecreatefrompng('blank.png');
  $png_image = imagecreatefrompng('blank.png');
  list($frmwidth, $frmheight) = getimagesize('blank.png') ;
  }
  //Get DP
 if(isset($_GET['dp']))
  {
	  $tempfilename = 'temp/'.uniqid('temp');
	  if(strpos($_GET['dp'],'pravatar')){
    copy('http://'.$_GET['dp'], $tempfilename);
    }else{
    copy($_GET['dp'], $tempfilename);
    }
	  list($width, $height) = getimagesize($tempfilename) ;
	  if($width>$height)
		 {
			$modwidth = $frmwidth; 
			$modheight =  $modwidth *($height/$width);
			$mody=(abs(($modheight-$modwidth)/2));
			$modx=0;
		 }
		 elseif($width==$height)
		 {
			 $modwidth = $frmwidth; 
			 $modheight = $frmwidth; 
			 $modx=0;
			 $mody=0;
		 }
		 else
		 {
			 $modheight = $frmwidth; 
			$modwidth =  $modheight *($width/$height);
			$mody=0;
			$modx=(abs(($modwidth-$modheight)/2));
			//$modx=0;
		 }
		 
		 
	switch (exif_imagetype($tempfilename)) {
    case IMAGETYPE_GIF:
         $logo_image = imagecreatefromgif($tempfilename);
        break;
    case IMAGETYPE_PNG:
         $logo_image = imagecreatefrompng($tempfilename);
        break;
    case IMAGETYPE_JPEG:
        $logo_image = imagecreatefromjpeg($tempfilename);
        break;
    case IMAGETYPE_BMP:
        $logo_image = imagecreatefrombmp($tempfilename);
        break;
    default:
        break;
}
	 
	   imagecopyresampled($jpg_image, $logo_image, $modx, $mody, 0, 0, $modwidth,$modheight,  $width,$height ) ; 
	 // imagecopyresampled($jpg_image, $logo_image, 0, 0, 0, 0, 240,240,  $width,$height ) ; 
	 unlink($tempfilename);
  }
  else
  {
	  
  }
  
  // set dp
  //$dp= imagecreatefromjpeg('dp.jpg');
  //list($width, $height) = getimagesize('dp.jpg') ;
  // imagecopyresampled($jpg_image, $dp, 661, 68, 0, 0, 280,280,  $width,$height ) ; 
  imagecopyresampled($jpg_image, $png_image, 0, 0, 0, 0, $frmwidth,$frmheight,$frmwidth,$frmheight ) ; 
   // Allocate A Color For The Text
  $txtcolorw = imagecolorallocate($jpg_image, 255, 255, 255);
  $txtcolor = imagecolorallocate($jpg_image, 0, 10, 10);
  
  // Set Path to Font File
  $font_path   = __dir__.'/font/ARIALUNI.TTF';
  $font_path_e =  __dir__.'/font/Lobster-Regular.ttf';
  $font_path_h =  __dir__.'/font/MANGAL.ttf';
  
  function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {
    for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
   return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
}

  // Set Text to Be Printed On Image
  if(isset($_GET['text']) && isset($_GET['text2'])){
	 $text = substr($_GET['text'],0,56)."";
	 $text2 = substr($_GET['text2'],0,68)."";
  }
  elseif(isset($_GET['text']))
  {
	  $text = substr($_GET['text'],0,160)."...";
	  $text2 = "";
  }
  else
  {
	  $text = "Hello World!";
	  $text2 = "";
  }
  
  // find font-size for $txt_width = 80% of $img_width...
$font_size = 1; 
$txt_max_width = intval(0.8 * $frmwidth);    

do {        
    $font_size++;
    $p = imagettfbbox($font_size, 0, $font_path, $text);
    $txt_width = $p[2] - $p[0];
    // $txt_height=$p[1]-$p[7]; // just in case you need it
} while ($txt_width <= $txt_max_width);
$pc = imagettfbbox($font_size*0.4, 0, $font_path, $text2);
$txt2_width = $pc[2] - $pc[0];
// now center the text
$y = $frmheight * 0.9; // baseline of text at 90% of $img_height
$x = ($frmwidth - $txt_width) / 2;
$x2 = ($frmwidth - $txt2_width) / 2;

imagettftext($jpg_image, $font_size, 0, $x, $y, $txtcolorw, $font_path, $text);
 
imagettftext($jpg_image, $font_size*0.4, 0, $x2, $y*1.06, $txtcolorw, $font_path, $text2);

//$lines = explode('|', wordwrap($text, 62, '|'));
$lines2 = explode('|', wordwrap($text2, 34, '|'));
// Starting Y position
$y = 350;
$y2 = 370;

// Loop through the lines and place them on the image
/*
foreach ($lines as $line)
{
//imagettftext($image, $font_size, 0, 50, , $font_color, $font, $line);
// Print Text On Image
 // imagettftext($jpg_image, 20, 0, 671, $y+1, $txtcolorw, $font_path, $line);
  //imagettftext($jpg_image, 20, 0, 670, $y, $txtcolor, $font_path, $line);
  
imagettfstroketext($jpg_image, 20, 0, 20, $y, $txtcolor, $txtcolorw, $font_path, $line,  2);
  
// Increment Y so the next line is below the previous line
$y += 36;
}

// Loop through the lines and place them on the image
foreach ($lines2 as $line)
{
//imagettftext($image, $font_size, 0, 50, , $font_color, $font, $line);
// Print Text On Image
  
//imagettftext($jpg_image, 12, 0, 686, $y2+1, $txtcolorw, $font_path, $line);
//imagettftext($jpg_image, 12, 0, 685, $y2, $txtcolor, $font_path, $line);
imagettfstroketext($jpg_image, 15, 0, 20, $y, $txtcolorw, $txtcolor, $font_path, $line,  1);
$y2 += 18;
}
*/
  // Print Text On Image

 //resige image
 if(isset($_GET['width']))
 {
	 $finalwidth=$_GET['width'];
	 $finalheight =  $finalwidth *($frmheight/$frmwidth);
	 $tn = imagecreatetruecolor($finalwidth, $finalheight);
	 imagecopyresampled($tn, $jpg_image, 0, 0, 0, 0, $finalwidth,$finalheight,  $frmwidth, $frmheight ) ; 
	 // Send Image to Browser
  imagejpeg($tn);
 }
 else
 {
	// Send Image to Browser
  imagejpeg($jpg_image); 
 }
  

  // Clear Memory
  imagedestroy($jpg_image);
?>