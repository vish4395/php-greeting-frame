<?php
/**
 * @copyright 2005 Alessandro Pasotti 
 * @license GPL
 * @author  Alessandro Pasotti (some source grabbed somewhere)
 *
 * Read an image file and send a scaled thumbnail to the browser
 * default to 150 px width.
 *
 * This file can also be included, in this case, define vars in the calling script
 *
 * @param   string  $img_path image file path, relative to this script, if not
 *                            set, the next is checked on GET
 * @param   string  $img urlencoded image file path, relative to this script
 *                      (in vncms should be 2 level depth)
 * @param   integer $width max width
 * @param   integer $height max height
 * @param   string  $jpgfilename optional filename to store image in, if
 *                            not given, image is outputted to the browser
 *
 *
 * Example calls:
 *
 * getthumb.php?img=../../images/logo.jpg              --> default to max 150 (w or h)
 * getthumb.php?img=../../images/logo.jpg&height=200   --> resize to 200px height
 *
 *
 */


// Constants
define('DEF_WIDTH',     150);  // default
define('DEF_HEIGHT',    150);  // default
define('ALLOWED_WIDTH', 1024); // no tampering: set up a max
define('ALLOWED_HEIGHT',768);  // no tampering: set up a max
define('DEF_QUALITY',   90);   // default quality

define('DEBUG', false);


// I put this here to avoid any external dependency
if(!function_exists('__clean')) {
  function __clean($s, $len){
      if(!isset($s)) return null;
      $s = substr($s, 0, $len);
      if(ini_get('gpc_magic_quotes') != 1) $s = addslashes($s);
      $s = escapeshellcmd($s);
      return $s;
  }
}

// Get image location if not defined elsewhere
if(!isset($image_path))  $image_path = urldecode(stripslashes(__clean($_GET['img'], 256)));
if(!isset($width))       $width      = __clean($_GET['width'], 4);
if(!isset($height))      $height     = __clean($_GET['height'], 4);

// if both are not defined:
if(!$width && !$height) {
  $width = DEF_WIDTH;
  $height= DEF_HEIGHT;
}

if($width) $width   =  min(ALLOWED_WIDTH, $width);
else $width = ALLOWED_WIDTH;
if($height) $height =  min(ALLOWED_HEIGHT, $height);
else $height = ALLOWED_HEIGHT;


define('MAX_HEIGHT', $height);
define('MAX_WIDTH' , $width);


// Load image
$img = null;
$imginfo = getimagesize($image_path);
$imgtype = $imginfo[2];

$ext = strtolower(end(explode('.', $image_path)));
if ($imgtype == IMAGETYPE_JPEG) {
    $img = @imagecreatefromjpeg($image_path);
} else if ($imgtype == IMAGETYPE_PNG) {
    $img = @imagecreatefrompng($image_path);
    //echo "IMGEBASE " . IMAGE_BASE . ' path: ' .  $image_path; exit;
// Only if your version of GD includes GIF support
} else if ($imgtype == IMAGETYPE_GIF) {
    $img = @imagecreatefromgif($image_path);
}

// If an image was successfully loaded, test the image for size
if ($img) {

    // Get image size and scale ratio
    $width = imagesx($img);
    $height = imagesy($img);
    $scale = min(MAX_WIDTH/$width, MAX_HEIGHT/$height);
    if(defined('DEBUG') && DEBUG) {
      user_error("thumbnails.php - IMAGE: $image_path  WIDTH: $width HEIGHT: $height SCALE: $scale<hr />");
      exit;
    }

    // If the image is larger than max shrink it
    if ($scale < 1) {
        $new_width = floor($scale*$width);
        $new_height = floor($scale*$height);

        // Create a new temporary image
        $tmp_img = imagecreatetruecolor($new_width, $new_height);

        // Copy and resize old image into new image
        imagecopyresized($tmp_img, $img, 0, 0, 0, 0,
                         $new_width, $new_height, $width, $height);
        imagedestroy($img);
        $img = $tmp_img;
    }
}

// Create error image if necessary
if (!$img) {
    $img = imagecreate(DEF_WIDTH, DEF_HEIGHT);
    imagecolorallocate($img,255,255,255);
    $c2 = imagecolorallocate($img,255,0,0);
    imageline($img,0,0,DEF_WIDTH,DEF_HEIGHT,$c2);
    imageline($img,DEF_WIDTH,0,0,DEF_HEIGHT,$c2);
}

if(!$jpgfilename) {
  // Display the image
  header("Content-type: image/jpg");
  imagejpeg($img, null, DEF_QUALITY);
  exit;
} else {
   if(defined('DEBUG') && DEBUG) {
      echo "thumbnails.php - saving to $jpgfilename<hr>";
  }
  imagejpeg($img, $jpgfilename, DEF_QUALITY);
}
?>