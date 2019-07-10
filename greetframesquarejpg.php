<?php
  header('Content-type: image/jpeg');
  header('Content-Disposition: attachment; filename="'.uniqid('Greeting_').'.jpg"');
  // Create Image From Existing File
  if(isset($_GET['frame']))
  {
	  $jpg_image = imagecreatefromjpeg('Greetings/'.$_GET['frame'].'.jpg');
	  list($frmwidth, $frmheight) = getimagesize('Greetings/'.$_GET['frame'].'.jpg') ;
  }
  else
  {
  $jpg_image = imagecreatefromjpeg('Greetings/frame_rakhi_01.jpg');
  list($frmwidth, $frmheight) = getimagesize('Greetings/frame_rakhi_01.jpg') ;
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
			$modwidth = 121; 
			$modheight =  $modwidth *($height/$width);
			$mody=(-(($modheight-$modwidth)/2))+372;
			$modx=36;
		 }
		 elseif($width==$height)
		 {
			 $modwidth = 121; 
			 $modheight = 121; 
			 $modx=36;
			 $mody=372;
		 }
		 else
		 {
			 $modheight = 121; 
			$modwidth =  $modheight *($width/$height);
			$mody=372;
			$modx=(-(($modwidth-$modheight)/2))+36;
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
	 

    if(strpos($_GET['frame'],"sqr_lay")!=null)
        {
          $lay_id = explode('-',explode('_',$_GET['frame'])[2])[1];
          $lay_img = imagecreatefrompng('Layouts/sqr_lay_'.$lay_id.'.png');
          imagealphablending( $lay_img, false );
          imagesavealpha( $lay_img, true );
          imagecopyresampled($jpg_image, $lay_img, 0, 0, 0, 0, $frmwidth,$frmheight,$frmwidth,$frmheight ) ; 
        }

	   imagecopyresampled($jpg_image, $logo_image, $modx, $mody, 0, 0, $modwidth,$modheight,  $width,$height ) ; 
	 // imagecopyresampled($jpg_image, $logo_image, 0, 0, 0, 0, 240,240,  $width,$height ) ; 
	 unlink($tempfilename);
  }
  else
  {
	  
  }

// Print Text On Image
  // set dp
  //$dp= imagecreatefromjpeg('dp.jpg');
  //list($width, $height) = getimagesize('dp.jpg') ;
  // imagecopyresampled($jpg_image, $dp, 661, 68, 0, 0, 280,280,  $width,$height ) ; 
  
   // Allocate A Color For The Text
  $txtcolorw = imagecolorallocate($jpg_image, 255, 255, 255);
  $txtcolor = imagecolorallocate($jpg_image, 0, 10, 10);
  
  // Set Path to Font File
  $font_path   = __dir__.'/font/ARIALUNI.TTF';
  $font_path_e =  __dir__.'/font/Lobster-Regular.ttf';
  $font_path_h =  __dir__.'/font/MANGAL.ttf';
  
  
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
 
$lines = explode('|', wordwrap($text, 62, '|'));
$lines2 = explode('|', wordwrap($text2, 34, '|'));
// Starting Y position
$y = 434;
$y2 = 454;

// Loop through the lines and place them on the image
foreach ($lines as $line)
{
//imagettftext($image, $font_size, 0, 50, , $font_color, $font, $line);
  //$regex = '~^[a-zA-Z]+$~';
  $regex = '/[^A-Za-z0-9_ -]/';
  if (!preg_match($regex, $line))
  {
    $font_path_f = $font_path_e;
  }
  elseif(!preg_match('[^\\p{Devanagari}\\p{L}]', $line))
  {
    $font_path_f = $font_path_h;
  }
  else
  {
    $font_path_f = $font_path;
  }
// Print Text On Image
  imagettftext($jpg_image, 20, 0, 177, $y+1, $txtcolorw, $font_path_f, $line);
  imagettftext($jpg_image, 20, 0, 176, $y, $txtcolor, $font_path_f, $line);
  
// Increment Y so the next line is below the previous line
$y += 36;
}
// Loop through the lines and place them on the image
foreach ($lines2 as $line)
{
//imagettftext($image, $font_size, 0, 50, , $font_color, $font, $line);
// Print Text On Image
  
imagettftext($jpg_image, 12, 0, 177, $y2+1, $txtcolorw, $font_path, $line);
imagettftext($jpg_image, 12, 0, 176, $y2, $txtcolor, $font_path, $line);
$y2 += 18;
}
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